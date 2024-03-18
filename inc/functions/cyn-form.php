<?php

/**
 * register forms
 * 
 * 
 */

add_action('wp_ajax_cyn_contact_us_form', 'cyn_contact_us_form');
add_action('wp_ajax_nopriv_cyn_contact_us_form', 'cyn_contact_us_form');

function cyn_contact_us_form()
{
	list(
		'describe' => $describe,
		'email' => $email,
		'name' => $name,
		'family' => $family,
		'_nonce' => $_nonce,
	) = $_POST;

	$created_post = wp_insert_post([
		'post_type' => 'form',
		'post_title' => $name,
		'tax_input' => ['form-cat' => [
			get_term_by('slug', 'contact-us', 'form-cat')->term_id
		]],
	]);

	add_post_meta($created_post, 'name', sanitize_text_field($name));
	add_post_meta($created_post, 'family', sanitize_text_field($family));
	add_post_meta($created_post, 'email', sanitize_email($email));
	add_post_meta($created_post, 'describe', sanitize_textarea_field($describe));
	isset($file_link) && add_post_meta($created_post, 'file_link', $file_link);
}
