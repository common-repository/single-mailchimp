<?php 
 
/*
Plugin Name: Single Mailchimp
Plugin URI: 
Description: Mailchimp Newsletterform with Single-Opt-In
Version: 1.4
Author: Jonathan Robrecht
Author URI: http://www.jonathanrobrecht.com
*/


include('admin/register-admin.php');



// Mailchimp API
require plugin_dir_path( __FILE__ )."inc/MCAPI.php";


// Mailchimp subscribe
function subscribe() {
    $subscriber 			= $_POST['email'];
    $listId     			= get_option('sm_list_id');
    $sm_single_opt_in 		= get_option('sm_single_opt_in');

    if ($sm_single_opt_in == '1'){
    	$optin = false; 
    } else{
    	$optin = true; 
    }


    $mcApi = new MCAPI(get_option('sm_api_key'));
    $response = $mcApi->listSubscribe( $listId, $subscriber, null, null, $optin );

    echo $response;
    die();
}





// Enqueue Styles and Scripts
function single_mailchimp_scripts_styles() {
    if (!is_admin()) {
        wp_register_style( 'single-mailchimp-css', '/wp-content/plugins/single-mailchimp/css/single-mailchimp.css' );
        wp_register_style( 'jquery', '/wp-content/plugins/single-mailchimp/css/single-mailchimp.css' );
        wp_enqueue_style( 'single-mailchimp-css' );
    } else{
    	wp_enqueue_script( 'admin-js', '/wp-content/plugins/single-mailchimp/admin/admin.js',array(),'1.0',true);

    	wp_register_style( 'admin-css', '/wp-content/plugins/single-mailchimp/admin/admin.css' );
    	wp_enqueue_style( 'admin-css' );
    }
}


// Get Shortcodes
require_once plugin_dir_path( __FILE__ ) . '/shortcodes.php';

// Widgets
require_once plugin_dir_path( __FILE__ ) . '/widget.php';




// Mailchimp JS
function single_mailchimp_javascript() { ?>
	<script type="text/javascript" >
		jQuery(function($) {
			$(".single-mailchimp-form").submit(function(event){
			    event.preventDefault();

			    var that    = this;
			    var email   = $(this).find("input").val(),
			        ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";

			    if (email == ""){
			      $(this).find("input").focus();
			    }
			    else {  
			      $.post(ajaxurl, { action: "subscribe", email: email }, function(output) {
			          $(that).find("input").val("");
			          if (output != ''){
			          	$(that).find(".alert").hide();
			          	$(that).find(".alert-success").show();
			          } else {
			          	$(that).find(".alert").hide();
			          	$(that).find(".alert-danger").show();
			          }
			          
			          
			      });
			    }
			});
		});
	</script> <?php
}

/******
	ADD ACTIONS
****/


//add shortcodes
add_action( 'init', 'single_mailchimp_add_shortcodes'); 

// init widget
add_action( 'widgets_init', 'Single_Mailchimp_load_widget' );


// Add Subscribe Functio
add_action('wp_ajax_subscribe', 'subscribe');
add_action('wp_ajax_nopriv_subscribe', 'subscribe');

// Add Single Mailchimp JS to Footer
add_action( 'wp_footer', 'single_mailchimp_javascript', 120 );

// Load Scripts and Style
add_action( 'wp_enqueue_scripts', 'single_mailchimp_scripts_styles', 100 );
add_action( 'admin_enqueue_scripts', 'single_mailchimp_scripts_styles', 100 );




