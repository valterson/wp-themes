<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
add_action( 'init', 'remove_actions_parent_theme');
add_action( 'init', 'add_actions_parent_theme');

function theme_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

function remove_actions_parent_theme() {
  // FOOTER
  remove_action( 'storefront_footer', 'storefront_credit', 20 );

  // HEADER
  remove_action( 'storefront_header', 'storefront_skip_links', 0 );
  remove_action( 'storefront_header', 'storefront_site_branding', 20 );
  remove_action( 'storefront_header', 'storefront_secondary_navigation', 30 );
  remove_action( 'storefront_header', 'storefront_product_search', 40 );
  remove_action( 'storefront_header', 'storefront_primary_navigation', 50 );
};

function add_actions_parent_theme() {
  add_action( 'storefront_header', 'storefront_primary_navigation', 0 );
  add_action( 'storefront_header', 'storefront_product_search', 10 );
}
?>
