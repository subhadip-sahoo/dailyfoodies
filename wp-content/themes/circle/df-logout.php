<?php
    /* Template Name: Logout */
    if(!is_user_logged_in()){
        wp_safe_redirect(home_url());
        exit();
    }
    require_once ABSPATH.'wp-includes/pluggable.php';
    wp_logout();
    wp_safe_redirect( site_url() );
    exit();
?>
