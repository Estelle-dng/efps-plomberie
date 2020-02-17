<?php

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array (
        'key' => 'group_5629071313890',
        'title' => 'Configuration de Newsletter (Recovered)',
        'fields' => array (
            array (
                'key' => 'field_5629073cae9de',
                'label' => 'Notification ?',
                'name' => 'newsletter_admin_notify',
                'type' => 'select',
                'instructions' => 'Notifier l\'administrateur lors d\'une inscription ?',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array (
                    0 => 'Non',
                    1 => 'Oui',
                ),
                'default_value' => array (
                    0 => 0,
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'ajax' => 0,
                'placeholder' => '',
                'disabled' => 0,
                'readonly' => 0,
            ),
            array (
                'key' => 'field_562907e7ae9df',
                'label' => 'Emails',
                'name' => 'newsletter_notify_list',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => array (
                    array (
                        array (
                            'field' => 'field_5629073cae9de',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'min' => 1,
                'max' => '',
                'layout' => 'row',
                'button_label' => 'Ajouter un email',
                'sub_fields' => array (
                    array (
                        'key' => 'field_5629085eae9e0',
                        'label' => 'Adresse de contact',
                        'name' => 'email',
                        'type' => 'email',
                        'instructions' => '',
                        'required' => 1,
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
                    ),
                ),
            ),
            array (
                'key' => 'field_56290872ae9e1',
                'label' => 'Message',
                'name' => 'newsletter_notify_message',
                'type' => 'textarea',
                'instructions' => 'Utilisez le code : [[email]] afin d\'afficher l\'email de l\'utilisateur inscrit.',
                'required' => 1,
                'conditional_logic' => array (
                    array (
                        array (
                            'field' => 'field_5629073cae9de',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'Un utilisateur vient de s\'inscrire à la newsletter du site.
[[email]]',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => '',
                'new_lines' => 'br',
                'readonly' => 0,
                'disabled' => 0,
            ),
            array (
                'key' => 'field_564da1c6ccc3f',
                'label' => 'Afficher un formulaire complémentaire ?',
                'name' => 'form_next',
                'type' => 'select',
                'instructions' => 'Afficher un second formulaire après la saisie de l\'adresse email ?',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array (
                    0 => 'Non',
                    1 => 'Oui',
                ),
                'default_value' => array (
                    0 => 'Non',
                ),
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'ajax' => 0,
                'placeholder' => '',
                'disabled' => 0,
                'readonly' => 0,
            ),
            array (
                'key' => 'field_564db801cb87f',
                'label' => 'Page du formulaire de Newsletter',
                'name' => 'newsletter_form_page',
                'type' => 'page_link',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => array (
                    array (
                        array (
                            'field' => 'field_564da1c6ccc3f',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array (
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array (
                    0 => 'page',
                ),
                'taxonomy' => array (
                ),
                'allow_null' => 0,
                'multiple' => 0,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'newsletter-settings',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

endif;