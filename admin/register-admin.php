<?php



function single_mailchimp_menu(){
    add_options_page('Single Mailchimp', 'Single Mailchimp', 'manage_options', 'single-mailchimp-menu', 'single_mailchimp_options');

    //call register settings function
	add_action( 'admin_init', 'register_settings' );

}

function single_mailchimp_options(){
    include('single-mailchimp-admin.php');
}

function register_settings() {
	register_setting( 'super-settings-group', 'sm_api_key' );
	register_setting( 'super-settings-group', 'sm_list_id' );
	register_setting( 'super-settings-group', 'sm_single_opt_in' );
}




add_action('admin_menu','single_mailchimp_menu');



?>