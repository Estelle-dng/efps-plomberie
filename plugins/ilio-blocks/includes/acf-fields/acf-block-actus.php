<?php 
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
    'key' => 'group_5a0589b2d7961',
    'title' => 'block actus',
    'fields' => array (
        array (
            'key' => 'field_5a0589b574f9a',
            'label' => 'Actualités',
            'name' => 'actus',
            'type' => 'relationship',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'post_type' => array (
                0 => 'post',
            ),
            'taxonomy' => array (
            ),
            'filters' => array (
                0 => 'search',
                1 => 'post_type',
                2 => 'taxonomy',
            ),
            'elements' => '',
            'min' => '',
            'max' => 3,
            'return_format' => 'object',
        ),
    ),
    'location' => array (
        array (
            array (
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'post',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 0,
    'description' => '',
));

endif;