<?php

register_post_type( "blank", array (
  'labels' =>
  array (
    'name' => pll__('Blank'),
    'singular_name' => 'blank',
    'add_new' => 'Ajouter une blank',
    'add_new_item' => 'Ajouter',
    'edit_item' => 'Editer la blank',
    'new_item' => 'Nouvelle blank',
    'view_item' => 'Voir la blank',
    'search_items' => 'Recherche',
    'not_found' => 'Aucune blank trouvée',
    'not_found_in_trash' => 'Aucune blank trouvée dans la corbeille',
    'parent_item_colon' => '',
  ),
  'description' => '',
  'publicly_queryable' => true,
  'exclude_from_search' => false,
  'map_meta_cap' => true,
  'capability_type' => 'blank',
  'public' => true,
  'hierarchical' => false,
  'rewrite' =>
  array (
    'slug' => 'blank',
    'with_front' => true,
    'pages' => true,
    'feeds' => false,
  ),
  'has_archive' => 'blank-page',
  'query_var' => true,
  'supports' =>
  array (
    0 => 'title',
    1 => 'editor',
    2 => 'thumbnail',
    3 => 'revisions'
  ),
  'taxonomies' =>
  array (
    0 => 'type',
  ),
  'show_ui' => true,
  'menu_position' => 30,
  'menu_icon' => 'dashicons-format-aside',
  'can_export' => true,
  'show_in_nav_menus' => true,
  'show_in_menu' => true,
) );
