<?php
  // Returns formatted image object
  // Accepts wp image object
  function dg_api_return_image($image){
    $formatImg = array(
      'large' => $image['url'],
      'medium' => $image['sizes']['large'],
      'small' => $image['sizes']['medium'],
      'id' => $image['ID']
    );
    return $formatImg;
  }
  
  // Returns categories attached to a post
  // Accepts post ID
  function dg_api_return_categories($post_id) {
    $post_categories = wp_get_post_categories( $post_id );
    $cats = array();
    foreach($post_categories as $c){
      $cat = get_category( $c );
      $cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug );
    }
    return $cats;
  }

  // Returns true if page has been set as the homepage in WP
  // Accepts page ID
  function dg_api_check_is_home($id) {
    $hp_id = get_option( 'page_on_front' );
    if ($id == $hp_id) {
      return true;
    } 
    return false;
  }

  // Returns all posts of post type
  // Accepts post type string
  function dg_api_all_posts($type){
    $args = array(
      'post_type' => $type,
      'posts_per_page' => -1
    );
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ) :
      $data = array();
      while ($the_query->have_posts()) : $the_query->the_post();
        $post = $the_query->post;
        $data[] = $post;
      endwhile;
    endif;
    return $data;
  }

  // Returns HTML formatted content
  // Accepts WP content object
  function dg_api_format_content($content) {
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;   
  }

  // Returns template name or 'default'
  // Accepts template path/filename available from '_wp_page_template' in post_meta
  function dg_api_get_template($input_template = false, $post_type = 'page'){
    $all_templates = wp_get_theme()->get_page_templates(null, $post_type);
    foreach ( $all_templates as $key => $val ) {
      if ($input_template == $key) {
        return $val;
      }
    }
    return 'default';
  }