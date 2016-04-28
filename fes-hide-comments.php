<?php
/**
 * Plugin Name: Hide comments
 * Plugin URI: https://github.com/fiveeightsix/fes-hide-comments
 * Description: Hides wordpress comment functionality in the administration interface, including menu items and admin bar links. Note: Does not alter comment settings, or remove comment code from templates.
 * Author: Karl Inglis
 * Author URI: http://web.karlinglis.net
 * Version: 1.1.0
 */


/**
 * Hide wordpress comment functionality
 */

// from post, pages and attachments
function fes_remove_comment_support() {
  remove_post_type_support( 'post', 'comments' );
  remove_post_type_support( 'page', 'comments' );
  remove_post_type_support( 'attachment', 'comments' );
}

add_action( 'admin_menu', 'fes_remove_comment_support' );

// from admin menu
function fes_remove_comment_admin_menus() {
  remove_menu_page( 'edit-comments.php' );
  remove_submenu_page( 'options-general.php', 'options-discussion.php' );
}

add_action( 'admin_menu', 'fes_remove_comment_admin_menus' );

// from admin bar
function fes_remove_comment_admin_bar() {
  global $wp_admin_bar;  
  $wp_admin_bar->remove_menu( 'comments' );  
}  

add_action( 'wp_before_admin_bar_render', 'fes_remove_comment_admin_bar' );  

?>
