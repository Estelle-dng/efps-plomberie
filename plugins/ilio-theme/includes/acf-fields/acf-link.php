<?php 
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
    'key' => 'group_5a05704e668eb',
    'title' => 'Lien',
    'fields' => array (
        array (
            'key' => 'field_5a0570582025e',
            'label' => 'Label',
            'name' => 'label',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ),
        array (
            'key' => 'field_5a0570642025f',
            'label' => 'Type',
            'name' => 'type',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array (
                'internal' => 'Interne',
                'external' => 'Externe',
            ),
            'default_value' => array (
            ),
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'ajax' => 0,
            'return_format' => 'value',
            'placeholder' => '',
        ),
        array (
            'key' => 'field_5a05707f20260',
            'label' => 'Lien',
            'name' => 'link_internal',
            'type' => 'page_link',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field' => 'field_5a0570642025f',
                        'operator' => '==',
                        'value' => 'internal',
                    ),
                ),
            ),
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'post_type' => array (
            ),
            'taxonomy' => array (
            ),
            'allow_null' => 1,
            'allow_archives' => 1,
            'multiple' => 0,
        ),
        array (
            'key' => 'field_5a0570a020261',
            'label' => 'Lien',
            'name' => 'link_external',
            'type' => 'url',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => array (
                array (
                    array (
                        'field' => 'field_5a0570642025f',
                        'operator' => '==',
                        'value' => 'external',
                    ),
                ),
            ),
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
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