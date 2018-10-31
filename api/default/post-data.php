<?php
  /* 
  Returns formatted data for any single of any post type
  Accepts a post object for the first ($post) argument and content data as the second ($content) argument
  If no $content argument is passed, this will retun basic WP the_content() data
  */
  function dg_api_post_data($post, $content = null) {
    $template_name = get_post_meta( $post->ID, '_wp_page_template', true );
    $template = dg_api_get_template($template_name);
    $permalink = get_permalink($post->ID);
    if (is_null($content)) {
      $content = dg_api_format_content($post->post_content);
    }
    return array(
      'id' => $post->ID,
      'title' => $post->post_title,
      'slug' => $post->post_name,
      'thumbnail' => get_the_post_thumbnail_url($post->ID),
      'is_home' => dg_api_check_is_home($post->ID),
      'template' => $template,
      'content' => $content,
    );
  }
?>
