<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = wp_get_theme(get_stylesheet_directory() . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	$themename = 'craft';
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
	
	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
	
	// Multicheck Array
	$comment_page_array = array("on" => "on","off" => "off");
	
	// Background Defaults
	
	$background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat','position' => 'top center','attachment'=>'scroll');
	
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_stylesheet_directory_uri() . '/images/';
		
	$options = array();
		
	$options[] = array( "name" => "메인 페이지 설정",
						"type" => "heading");										 
						
	$options[] = array( "name" => "메인 하단 배너 1 이미지",
						"desc" => "홈페이지 메인 하단의 배너 이미지를 선택합니다. ",
						"id" => "box_image1",
						"type" => "upload");						
						
	$options[] = array( "name" => "메인 하단 배너 1 link",
						"desc" => "배너 클릭시 이동할 링크를 입력합니다.",
						"id" => "box_link1",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "메인 하단 배너 2 이미지",
						"desc" => "홈페이지 메인 하단의 배너 이미지를 선택합니다. ",
						"id" => "box_image2",
						"type" => "upload");						
						
	$options[] = array( "name" => "메인 하단 배너 2 link",
						"desc" => "배너 클릭시 이동할 링크를 입력합니다.",
						"id" => "box_link2",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => "메인 하단 배너 3 이미지",
						"desc" => "홈페이지 메인 하단의 배너 이미지를 선택합니다. ",
						"id" => "box_image3",
						"type" => "upload");						
						
	$options[] = array( "name" => "메인 하단 배너 3 link",
						"desc" => "배너 클릭시 이동할 링크를 입력합니다.",
						"id" => "box_link3",
						"std" => "",
						"type" => "text");		
																									
	$options[] = array( "name" => "메인 하단 배너 4 이미지",
						"desc" => "홈페이지 메인 하단의 배너 이미지를 선택합니다. ",
						"id" => "box_image4",
						"type" => "upload");						
						
	$options[] = array( "name" => "메인 하단 배너 4 link",
						"desc" => "배너 클릭시 이동할 링크를 입력합니다.",
						"id" => "box_link3",
						"std" => "",
						"type" => "text");	
												
	$options[] = array( "name" => "Slider Settings",
						"type" => "heading");

	$options[] = array( "name" => "Slider caption 1",
						"desc" => "Caption for the slider.",
						"id" => "slider_head1",
						"std" => "",
						"type" => "text");		
						
	$options[] = array( "name" => "Slider image 1",
						"desc" => "1098px x 400px exact. Upload your image for homepage slider.",
						"id" => "slider_image1",
						"type" => "upload");
						
	$options[] = array( "name" => "Slider image link",
						"desc" => "Paste here the link of the page or post.",
						"id" => "slider_link1",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Slider caption 2",
						"desc" => "Caption for the slider.",
						"id" => "slider_head2",
						"std" => "",
						"type" => "text");						
						
	$options[] = array( "name" => "Slider image 2",
						"desc" => "1098px x 400px exact. Upload your image for homepage slider.",
						"id" => "slider_image2",
						"type" => "upload");
						
	$options[] = array( "name" => "Slider image link",
						"desc" => "Paste here the link of the page or post.",
						"id" => "slider_link2",
						"std" => "",
						"type" => "text");						
						
	$options[] = array( "name" => "Footer Settings",
						"type" => "heading");
						
	$options[] = array( "name" => "Footer copyright text",
						"desc" => "Enter your company name here.",
						"id" => "footer_cr",
						"std" => "",
						"type" => "text");								
	return $options;
}