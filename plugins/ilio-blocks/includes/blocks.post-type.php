<?php

register_post_type( "blocks", array (
  'labels' =>
  array (
    'name' => pll__('Blocks'),
    'singular_name' => 'blocks',
    'add_new' => 'Ajouter une blocks',
    'add_new_item' => 'Ajouter',
    'edit_item' => 'Editer la blocks',
    'new_item' => 'Nouvelle blocks',
    'view_item' => 'Voir la blocks',
    'search_items' => 'Recherche',
    'not_found' => 'Aucune blocks trouvée',
    'not_found_in_trash' => 'Aucune blocks trouvée dans la corbeille',
    'parent_item_colon' => '',
  ),
  'description' => '',
  'publicly_queryable' => true,
  'exclude_from_search' => false,
  'map_meta_cap' => true,
  'capability_type' => 'blocks',
  'public' => true,
  'hierarchical' => false,
  'rewrite' =>
  array (
    'slug' => 'blocks',
    'with_front' => true,
    'pages' => true,
    'feeds' => false,
  ),
  'has_archive' => 'blocks-page',
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
