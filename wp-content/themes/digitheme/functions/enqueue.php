<?php
function enqueue_assets() {
	wp_enqueue_style("bootstrap-style", "//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css", [], "", "all"); 
	wp_style_add_data( 'bootstrap-style', array( 'integrity', 'crossorigin' ) , array( 'sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC', 'anonymous' ) );
	wp_enqueue_style("font-awesome-6", "//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css", [], "", "all"); 
	wp_style_add_data( 'font-awesome-6', array( 'integrity', 'crossorigin' ) , array( 'sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU', 'anonymous' ) );
	
	// if (have_rows('page_builder')) :
    //     while (have_rows('page_builder')) : the_row();
	// 	// Check if the current Flexible Content block is the desired one
	// 	if ( get_row_layout() == 'team_members' ) {
	// 		wp_enqueue_style('owl-carousel-css', get_template_directory_uri() . '/css/owl.carousel.min.css','','',false);
	// 		wp_enqueue_style('owl-carousel-css-def', get_template_directory_uri() . '/css/owl.theme.default.min.css','','',false);
	// 	}
	// endwhile;
	// endif; wp_reset_postdata();

	wp_enqueue_style("stylecss", get_stylesheet_uri());
	
	wp_enqueue_script("jquery");

	// if (have_rows('page_builder')) :
    //     while (have_rows('page_builder')) : the_row();
	// 	// Check if the current Flexible Content block is the desired one
	// 	if ( get_row_layout() == 'team_members' ) {
	// 			wp_enqueue_script('owl-carousel-js', get_template_directory_uri() . '/js/owl.carousel.min.js', '', '', true);
	// 		}
	// 	endwhile;
	// endif; wp_reset_postdata();

	//wp_enqueue_script("jquery-js", "//code.jquery.com/jquery-3.3.1.slim.min.js", "", "", true);
	//wp_script_add_data( 'jquery-js', array( 'integrity', 'crossorigin' ) , array( 'sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo', 'anonymous' ) );
	wp_enqueue_script( 'gsap-js', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js', array(), false, true );
    // ScrollTrigger - with gsap.js passed as a dependency
    wp_enqueue_script( 'gsap-st', 'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js', array('gsap-js'), false, true );
    // Your animation code file - with gsap.js passed as a dependency
    wp_enqueue_script( 'gsap-js2', get_template_directory_uri() . 'js/app.js', array('gsap-js'), false, true );
	wp_enqueue_script("bootstrap-5", "//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js", "", "", true);
    wp_script_add_data( 'bootstrap-5', array( 'integrity', 'crossorigin' ) , array( 'sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM', 'anonymous' ) );

	wp_enqueue_script("functions", get_template_directory_uri() . "/js/functions.js", "", "", true);
	
	wp_localize_script("functions", "wp_var",
		[
			"ajax_url" => admin_url("admin-ajax.php"),
		]
	);
}
add_action("wp_enqueue_scripts", "enqueue_assets");
