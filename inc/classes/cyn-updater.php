<?php

class GithubUpdater {
	private $theme_slug;
	private $repo_owner; // نام کاربری شما در GitHub
	private $repo_name;  // نام ریپازیتوری شما
	private $current_version;

	public function __construct( $theme_slug, $repo_owner, $repo_name ) {
		$this->theme_slug = $theme_slug; // نام تم را به عنوان پارامتر دریافت می‌کند
		$this->repo_owner = $repo_owner;
		$this->repo_name = $repo_name; // نام ریپازیتوری
		$this->current_version = wp_get_theme( $this->theme_slug )->get( 'Version' );

		add_filter( 'pre_set_site_transient_update_themes', [ $this, 'check_for_update' ] );
		add_filter( 'themes_api', [ $this, 'themes_api_call' ], 10, 3 );
	}

	public function check_for_update( $transient ) {

		var_dump( $transient );

		// چک می‌کنیم که آیا اطلاعات موجود است یا خیر
		if ( empty( $transient->checked ) ) {
			return $transient;
		}

		// دریافت اطلاعات آخرین ریلیز از GitHub
		$remote = wp_remote_get( 'https://api.github.com/repos/' . $this->repo_owner . '/' . $this->repo_name . '/releases/latest' );

		if ( ! is_wp_error( $remote ) ) {
			$remote_data = json_decode( wp_remote_retrieve_body( $remote ), true );


			// بررسی وجود داده‌ها و ورژن جدید
			if ( version_compare( $this->current_version, $remote_data['tag_name'], '<' ) ) {
				$response = [];
				$response['slug'] = $this->theme_slug;
				$response['new_version'] = $remote_data['tag_name'];
				$response['package'] = $remote_data['zipball_url']; // آدرس دانلود
				$transient->response[ $this->theme_slug ] = $response;
			}
		}

		return $transient;
	}

	public function themes_api_call( $false, $action, $response ) {

		// در صورت درخواست اطلاعات اضافی برای تم
		if ( is_object( $response ) && isset( $response->slug ) && $response->slug === $this->theme_slug ) {
			$remote = wp_remote_get( 'https://api.github.com/repos/' . $this->repo_owner . '/' . $this->repo_name . '/releases/latest' );

			if ( ! is_wp_error( $remote ) ) {
				$remote_data = json_decode( wp_remote_retrieve_body( $remote ), true );

				if ( isset( $remote_data['tag_name'] ) ) {
					$response->new_version = $remote_data['tag_name'];
					$response->package = $remote_data['zipball_url'];
				}
			}
		}

		return $response;
	}
}
