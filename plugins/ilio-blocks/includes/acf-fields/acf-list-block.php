<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_59bfec056605a',
	'title' => 'Liste blocs',
	'fields' => array (
		array (
			'key' => 'field_59bfec9d10485',
			'label' => 'blocs',
			'name' => 'ilio_blocs',
			'type' => 'flexible_content',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layouts' => array (
				'59bfecb33f234' => array (
					'key' => '59bfecb33f234',
					'name' => 'block_text',
					'label' => 'bloc texte',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_59bfec0b25300',
							'label' => 'Champs',
							'name' => 'fields',
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
								0 => 'group_59bfeb31ba751',
							),
							'display' => 'group',
							'layout' => 'row',
							'prefix_label' => 0,
							'prefix_name' => 1,
						),
					),
					'min' => '',
					'max' => '',
				),
				'5a03162d56ded' => array (
					'key' => '5a03162d56ded',
					'name' => 'block_slider',
					'label' => 'bloc slider',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_5a03163f56dee',
							'label' => 'Champs',
							'name' => 'fields',
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
								0 => 'group_5a03120e9ea2c',
							),
							'display' => 'group',
							'layout' => 'row',
							'prefix_label' => 0,
							'prefix_name' => 1,
						),
					),
					'min' => '',
					'max' => '',
				),
				'5a05757c25689' => array (
					'key' => '5a05757c25689',
					'name' => 'block_info',
					'label' => 'bloc informations',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_5a0575902568a',
							'label' => 'Champs',
							'name' => 'fields',
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
								0 => 'group_5a0574b3bb904',
							),
							'display' => 'group',
							'layout' => 'block',
							'prefix_label' => 0,
							'prefix_name' => 1,
						),
					),
					'min' => '',
					'max' => '',
				),
				'5a09a52e55a0d' => array (
					'key' => '5a09a52e55a0d',
					'name' => 'block_quote',
					'label' => 'bloc citation',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_5a09a53755a0e',
							'label' => 'Champs',
							'name' => 'fields',
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
								0 => 'group_59bfeb31ba775',
							),
							'display' => 'group',
							'layout' => 'block',
							'prefix_label' => 0,
							'prefix_name' => 1,
						),
					),
					'min' => '',
					'max' => '',
				),
				'5a058ac24a68d' => array (
					'key' => '5a058ac24a68d',
					'name' => 'block_actus',
					'label' => 'bloc actualités',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_5a058ace4a68e',
							'label' => 'Champs',
							'name' => 'fields',
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
								0 => 'group_5a0589b2d7961',
							),
							'display' => 'group',
							'layout' => 'block',
							'prefix_label' => 0,
							'prefix_name' => 1,
						),
					),
					'min' => '',
					'max' => '',
				),
				'7a4596c55a68d' => array (
					'key' => '7a4596c55a68d',
					'name' => 'block_pictos',
					'label' => 'bloc pictos',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_44058ace4a77e',
							'label' => 'Champs',
							'name' => 'fields',
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
								0 => 'group_5a099f9c4295e',
							),
							'display' => 'group',
							'layout' => 'row',
							'prefix_label' => 0,
							'prefix_name' => 1,
						),
					),
					'min' => '',
					'max' => '',
				),
				'456fbb6c55a68d' => array (
					'key' => '456fbb6c55a68d',
					'name' => 'block_ref',
					'label' => 'bloc reference',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_654fface4a77e',
							'label' => 'Champs',
							'name' => 'fields',
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
								0 => 'group_5a09aa3ec3003',
							),
							'display' => 'group',
							'layout' => 'row',
							'prefix_label' => 0,
							'prefix_name' => 1,
						),
					),
					'min' => '',
					'max' => '',
				),
				'dddfbb6c55a68d' => array (
					'key' => '54ddbb6c55a68d',
					'name' => 'block_contact',
					'label' => 'bloc contact',
					'display' => 'block',
					'sub_fields' => array (
						array (
							'key' => 'field_114fface4a77e',
							'label' => 'Champs',
							'name' => 'fields',
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
								0 => 'group_5a15369f33a19',
							),
							'display' => 'group',
							'layout' => 'row',
							'prefix_label' => 0,
							'prefix_name' => 1,
						),
					),
					'min' => '',
					'max' => '',
				),
			),
			'button_label' => 'Ajouter un élément',
			'min' => '',
			'max' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		)
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
