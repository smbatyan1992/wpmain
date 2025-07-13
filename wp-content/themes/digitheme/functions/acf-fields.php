<?php
if (function_exists("acf_add_options_page")) {
	acf_add_options_page([
		"page_title"    => "Options",
		"menu_title"    => "Theme Settings",
		"menu_slug"     => "theme-general-settings",
		"icon_url"      => "dashicons-images-alt2",
		"capability"    => "edit_posts",
		"redirect"      => false
	]);
}

function add_acf_fields() {
	if (function_exists("acf_add_local_field_group")) :
		acf_add_local_field_group([
			"key" => "settings",
			"title" => "Settings",
			"fields" => [
				[
					"key" => "social_links",
					"label" => "Social Links",
					"name" => "social_links",
					"type" => "repeater",
					"sub_fields" => [
						[
							"key" => "field_5ddf758422dd7",
							"label" => "Icon",
							"name" => "icon",
							"type" => "font-awesome",
						],
						[
							"key" => "field_545758422dd7",
							"label" => "Link",
							"name" => "link",
							"type" => "url",
						],
					]
				]
			],
			"location" => [
				[
					[
						"param" => "options_page",
						"operator" => "==",
						"value" => "theme-general-settings",
					],
				],
			],
		]);
	endif;
}
add_action("acf/init", "add_acf_fields");

// // change the color of the flex content header or add any other styles
// function my_acf_admin_head() {
	// add any styles withing a style tag.
// }
// add_action('acf/input/admin_head', 'my_acf_admin_head');