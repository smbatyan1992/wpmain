<?php
/* WYSIWYG defaults */
/** change tinymce's paste-as-text functionality */
function paste_as_text($mceInit, $editor_id) {
	//turn on paste_as_text by default
	//NB this has no effect on the browser's right-click context menu's paste!
	$mceInit["paste_as_text"] = true;
	return $mceInit;
}
add_filter("tiny_mce_before_init", "paste_as_text", 1, 2);

/** Set the Attachment Display Settings, This function is attached to the 'after_setup_theme' action hook. */
function default_attachment_display_setting() {
	update_option("image_default_align", "left");
	update_option("image_default_link_type", "none");
	update_option("image_default_size", "large");
}
add_action("after_setup_theme", "default_attachment_display_setting");

// CUSTOM MENUS
function custom_menus() {
	register_nav_menus(
		[
			"primary-menu" => __("Primary Menu"),
			"secondary-menu" => __("Secondary Menu"),
			"footer-menu" => __("Footer Menu"),
		]
	);
}
add_action("init", "custom_menus");


// Add the custom columns to the Services post type:
// add_filter( 'manage_cpt_services_posts_columns', 'set_custom_edit_cpt_services_columns' );
// function set_custom_edit_cpt_services_columns($columns) {
//     $columns['featured'] = __( 'Featured', 'your_text_domain' );
//     return $columns;
// }

// Add the data to the custom columns for the book post type:
// add_action( 'manage_cpt_services_posts_custom_column' , 'custom_cpt_services_column', 10, 2 );
// function custom_cpt_services_column( $column, $post_id ) {
// 	$column_field = 'make_this_service_featured';
//     switch ( $column ) {
// 		case 'featured' : 
// 			$post_meta = get_field($column_field,$post_id);
// 			if ($post_meta) {
// 				echo "Yes";
// 			}else {
// 				echo "No";
// 			}
// 		break;

//     }
// }


// Get Formidable Forms in a ACF filed
// function acf_load_color_field_choices( $field ) {
// 	global $wpdb;
// 	$forms = $wpdb->get_results('SELECT * FROM wp_frm_forms WHERE status="published"');
// 	$ids = array();
// 	$values = array();
// 	$i=0;
// 	if ( $forms != NULL ) {
// 		foreach($forms as $form){
// 			$ids[$i] = $form->id;
// 			$values[$i] = $form->name;
// 			$i++;
// 		}
// 		$form_assoc = array_combine($ids, $values);
// 		if( is_array($form_assoc) ){
// 			foreach( $form_assoc as $key=>$match ){
// 					$field["choices"][ $key ] = $match;
// 			}
// 		}
// 		// return the field
// 		return $field;
// 	} else {
// 		return false;
// 	}
    
// }

// Enter the fild key below
// add_filter("acf/load_field/key=field_5ce6e312e7c38", "acf_load_color_field_choices");



// create an ID from a user entered string and removing any unwanted symbols
function create_id($string) {
	$new_id = preg_replace('/[^a-zA-Z]/', '', $string);
	$new_id = strtolower(str_replace(" ", "", $new_id));
	return $new_id;
}

function post_back_link() {
	if (wp_get_referer()) {
		$prev_url = $_SERVER['HTTP_REFERER'];
		return "<a href='". $prev_url ."' class='back-link'><svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' aria-hidden='true' focusable='false' style='-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);' preserveAspectRatio='xMidYMid meet' viewBox='0 0 512 512'><path d='M216.4 163.7c5.1 5 5.1 13.3.1 18.4L155.8 243h231.3c7.1 0 12.9 5.8 12.9 13s-5.8 13-12.9 13H155.8l60.8 60.9c5 5.1 4.9 13.3-.1 18.4-5.1 5-13.2 5-18.3-.1l-82.4-83c-1.1-1.2-2-2.5-2.7-4.1-.7-1.6-1-3.3-1-5 0-3.4 1.3-6.6 3.7-9.1l82.4-83c4.9-5.2 13.1-5.3 18.2-.3z'></path><rect x='0' y='0' width='512' height='512' fill='rgba(0, 0, 0, 0)'></rect></svg></a>";
	}

}

/* ACF Flexible Content Hover Module Effect */
function my_acf_admin_head() {
	$templateURL = get_template_directory_uri(); ?>
	<style type="text/css">
		.imagePreview {
			position: absolute;
			right: 100%;
			top: 0px;
			z-index: 999999;
			border: 1px solid #f2f2f2;
			box-shadow: 0px 0px 3px #b6b6b6;
			background-color: #fff;
			padding: 20px;
		}

		.imagePreview img {
			width: 300px;
			height: auto;
			display: block;
		}

		.acf-tooltip li:hover {
			background-color: #0074a9;
		}

		.taxonomy-product_cat #edittag {
			max-width: 100%;
		}
	</style>
	<script>
		jQuery(document).ready(function($) {
			$('a[data-name=add-layout]').click(function() {
				waitForEl('.acf-tooltip li', function() {
					$('.acf-tooltip li a').hover(function() {
						imageTP = $(this).attr('data-layout');
						$('.acf-tooltip').append('<div class="imagePreview"><img src="<?php echo $templateURL; ?>/img/prev/' + imageTP + '.png"></div>');
					}, function() {
						$('.imagePreview').remove();
					});
				});
			})
			var waitForEl = function(selector, callback) {
				if (jQuery(selector).length) {
					callback();
				} else {
					setTimeout(function() {
						waitForEl(selector, callback);
					}, 100);
				}
			};
		})
	</script>
	<?php
}
add_action('acf/input/admin_head', 'my_acf_admin_head');
