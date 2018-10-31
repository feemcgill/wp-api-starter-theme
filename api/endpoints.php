<?php
  // Concat data for primay /data/ endpoint
  function dg_api_main_data(){
    $data = array();
    $data['site_basics'] = dg_api_site_basics_data();
    $data['templates'] = wp_get_theme()->get_page_templates();
    $data['menus'] = dg_api_menu_data();                        
    $data['posts'] = array(
      'pages' => dg_api_page_data(),
    );
    return $data;
  }

  // Register custom endpoints
  function dg_api_setup_endpoints() {
    $namespace = 'api/v1';
    
    // primary data endpoint
    register_rest_route( $namespace, '/data/', array(
      'methods' => 'GET',
      'callback' => 'dg_api_main_data'
    ));
  }
  add_action( 'rest_api_init', 'dg_api_setup_endpoints' );
