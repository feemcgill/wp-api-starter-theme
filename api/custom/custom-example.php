<?php
/*
Here's an example that gets data for a custom post type "cpt" with custom fields
Passes in a custom data array for the $content argument of dg_api_post_data
*/

function dg_api_get_cpt_content($id) {
  return array(
    'custom_text_field_1' => get_field('custom_text_field_1', $id),
    'custom_text_field_2' => get_field('custom_text_field_2', $id)
  );
}

function dg_api_cpt_data(){
  $cpts = dg_api_all_posts('cpt');
  $d = [];
  foreach ($cpts as $cp) {
    $content = dg_api_get_cpt_content($cp->ID);
    $d[] = dg_api_post_data($cp, $content);
  }
  return $d;
}