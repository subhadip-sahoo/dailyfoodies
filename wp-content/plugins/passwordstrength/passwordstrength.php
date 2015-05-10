<?php
/*
Plugin Name: Password Strength Meter
Description: Adds password strength meter to register form
Version: 0.01
Author: Brad Trivers
Author URI: http://sunriseweb.ca
*/

add_action('template_redirect', 'psm_register');
function psm_register() {
  wp_register_script( 'psm_user-profile', plugins_url('user-profile.js', __FILE__), array( 'jquery' ));
  
  wp_register_script( 'psm_password-strength-meter', plugins_url( 'password-strength-meter.js', __FILE__ ), array( 'jquery', 'psm_user-profile' ));
  
  wp_register_style( 'psm_css', plugins_url( 'psm.css', __FILE__ ) );
  wp_enqueue_style( 'psm_css' );    
}

add_action('psm_register_form','psm_add_strength_div');
function psm_add_strength_div() {
  wp_enqueue_script('psm_user-profile');
  wp_enqueue_script('psm_password-strength-meter');
  echo '<div id="psm-pass-strength-result"></div>';
}
?>
