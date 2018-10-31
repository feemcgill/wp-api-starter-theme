<?php
  function dg_api_menu_data(){
    // LOOP THROUGH MENUS
    function dg_api_external_link($object) {
      if ($object == 'custom') {
        return true;
      } else {
        return false;
      }
    }

    
    function dg_api_return_menus() { 
      $menu_array = array();
      $menus = get_registered_nav_menus();
      foreach($menus as $menu_item){
        $menu= array();
        $menu['menu_name'] = $menu_item;
        $items_raw = wp_get_nav_menu_items($menu_item);
        $items = array();
        if ($items_raw) {
          foreach ($items_raw as $item) {
            $item_id = $item->object_id;
            $item_post_data = get_post($item_id); 
            $i = new stdClass();
            $i->id = $item_id;
            $i->title = $item->title;
            $i->url = $item->url;
            $i->slug = $item_post_data->post_name;
            $i->is_home = dg_api_check_is_home($item_id);
            $i->external_link = dg_api_external_link($item->object);
            $items[] = $i;
          }
        }
        $menu['items'] = $items;
        //$menu['raw'] = $items_raw;
        $menu_array[] = $menu;
      }
      return $menu_array;
    }
    return dg_api_return_menus();
  }
?>