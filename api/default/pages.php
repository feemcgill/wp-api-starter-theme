<?php
  // MODULE FOR WORDPRESS PAGES
  function dg_api_page_data(){
    $pages = get_pages();
    $post_array = array();
    foreach ($pages as $post) {
      $data[] = dg_api_post_data($post);
    }
    return $data;
  }
?>