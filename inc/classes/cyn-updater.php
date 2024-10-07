<?php

class GithubUpdater {
	private $theme;
	private $basename;
	private $active;
	private $repository; // نام متغیر جدید برای مخزن


	public function __construct( $theme, $repository ) {
		$this->theme = $theme;
		$this->repository = $repository;

		if ( ! function_exists( 'wp_get_theme' ) ) {
			require_once( ABSPATH . 'wp-includes/theme.php' );
		}

		$this->basename = wp_get_theme( $this->theme )->get_template();
		$this->active = wp_get_theme( $this->theme )->is_allowed();

		add_filter( 'pre_set_site_transient_update_themes', [ $this, 'check_for_update' ] );
		add_filter( 'themes_api', [ $this, 'themes_api_call' ], 10, 3 );
		add_filter( 'upgrader_post_install', [ $this, 'after_install' ], 10, 3 );
	}

	public function check_for_update( $transient ) {
		if ( empty( $transient->checked ) ) {
			return $transient;
		}

		// GitHub API URL
		$remote = wp_remote_get( 'https://api.github.com/repos/' . $this->repository . '/releases/latest' );

		if ( ! is_wp_error( $remote ) ) {
			$remote = json_decode( wp_remote_retrieve_body( $remote ) );
			if ( $remote && version_compare( wp_get_theme( $this->theme )->get( 'Version' ), $remote->tag_name, '<' ) ) {
				$response = new \stdClass();
				$response->slug = $this->basename;
				$response->new_version = $remote->tag_name;
				$response->package = $remote->zipball_url;
				$transient->response[ $this->basename ] = $response;
			}
		}

		return $transient;
	}

	public function themes_api_call( $false, $action, $response ) {
		if ( is_object( $response ) && isset( $response->slug ) && $response->slug === $this->basename ) {
			$remote = wp_remote_get( 'https://api.github.com/repos/' . $this->repository );

			if ( ! is_wp_error( $remote ) ) {
				$remote_body = wp_remote_retrieve_body( $remote );
				$remote_data = json_decode( $remote_body );

				if ( isset( $remote_data->tag_name ) && isset( $remote_data->zipball_url ) ) {
					$response->new_version = $remote_data->tag_name;
					$response->package = $remote_data->zipball_url;
				} else {
					error_log( 'Invalid response structure from GitHub API' );
				}
			} else {
				error_log( 'Error fetching data from GitHub: ' . $remote->get_error_message() );
			}
		}

		return $response;
	}

	public function after_install( $response, $hook_extra, $result ) {
		global $wp_filesystem;
		$install_dir = get_theme_root() . '/' . $this->basename;
		$wp_filesystem->move( $result['destination'], $install_dir );
		$result['destination'] = $install_dir;

		if ( $this->active ) {
			switch_theme( $this->basename );
		}

		return $result;
	}
}
