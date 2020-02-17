<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_58e3a3f732243',
	'title' => 'Menu footer',
	'fields' => array (
		array (
			'key' => 'field_5a0f01bac1ba3',
			'label' => 'Footer menu',
			'name' => 'footer_menu',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 1,
			'max' => 1,
			'layout' => 'block',
			'button_label' => '',
			'sub_fields' => array (
				array (
					'key' => 'field_5a0f043633c2a',
					'label' => 'List 1',
					'name' => 'list_1',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 1,
					'max' => 1,
					'layout' => 'block',
					'button_label' => '',
					'sub_fields' => array (
						array (
							'key' => 'field_5a0f043633c2b',
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
							'key' => 'field_5a0f043633c2c',
							'label' => 'Items list',
							'name' => 'menu-footer-items',
							'type' => 'repeater',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'collapsed' => '',
							'min' => 0,
							'max' => 0,
							'layout' => 'table',
							'button_label' => 'Add Row',
							'sub_fields' => array (
								array (
									'key' => 'field_5a0f043633c2d',
									'label' => 'Lien',
									'name' => 'link',
									'type' => 'clone',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'clone' => array (
										0 => 'group_5a05704e668eb',
									),
									'display' => 'group',
									'layout' => 'block',
									'prefix_label' => 0,
									'prefix_name' => 1,
								),
							),
						),
					),
				),
				array (
					'key' => 'field_5a0f0272de69f',
					'label' => 'List 2',
					'name' => 'list_2',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 1,
					'max' => 1,
					'layout' => 'block',
					'button_label' => '',
					'sub_fields' => array (
						array (
							'key' => 'field_5a0f0273de6a0',
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
							'key' => 'field_5a0f0273de6a1',
							'label' => 'Items list',
							'name' => 'menu-footer-items',
							'type' => 'repeater',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'collapsed' => '',
							'min' => 0,
							'max' => 0,
							'layout' => '',
							'button_label' => 'Add Row',
							'sub_fields' => array (
								array (
									'key' => 'field_5a0f03fece67e',
									'label' => 'Lien',
									'name' => 'link',
									'type' => 'clone',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'clone' => array (
										0 => 'group_5a05704e668eb',
									),
									'display' => 'group',
									'layout' => 'block',
									'prefix_label' => 0,
									'prefix_name' => 1,
								),
							),
						),
					),
				),
				array (
					'key' => 'field_5a0f043f33c2e',
					'label' => 'List 3',
					'name' => 'list_3',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => '',
					'min' => 1,
					'max' => 1,
					'layout' => 'block',
					'button_label' => '',
					'sub_fields' => array (
						array (
							'key' => 'field_5a0f044033c2f',
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
							'key' => 'field_5a0f044033c30',
							'label' => 'Items list',
							'name' => 'menu-footer-items',
							'type' => 'repeater',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array (
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'collapsed' => '',
							'min' => 0,
							'max' => 0,
							'layout' => 'table',
							'button_label' => 'Add Row',
							'sub_fields' => array (
								array (
									'key' => 'field_5a0f044033c31',
									'label' => 'Lien',
									'name' => 'link',
									'type' => 'clone',
									'instructions' => '',
									'required' => 0,
									'conditional_logic' => 0,
									'wrapper' => array (
										'width' => '',
										'class' => '',
										'id' => '',
									),
									'clone' => array (
										0 => 'group_5a05704e668eb',
									),
									'display' => 'group',
									'layout' => 'block',
									'prefix_label' => 0,
									'prefix_name' => 1,
								),
							),
						),
					),
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'footer-settings_option_lang',
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
