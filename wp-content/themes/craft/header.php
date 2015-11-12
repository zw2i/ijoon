<!doctype html>
<!--[if lt IE 7 ]> <html class="no-js ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>

<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<![endif]-->
<title><?php wp_title(); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
			
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_uri(); ?>" />

	
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!--headercontainer-->
<div id="wrapper">
		<div class="row wrapper-inner">	

	<!--headercontainer-->
	<div id="header_container">
	
		<div class="row">	
			<div class="large-12 columns">
		
		<!--header-->
		<div id="header2">
        	<div id="topmenu">
            	<font style="color:Gray;font-size:10px;">
                <a href="">LOGIN</a>
                <a href="">CONTACT US</a>
                <a href="">SITE MAP</a>
           		</font>
            </div>
        
        
        
	
<?php $header_image = get_header_image();
	if ( ! empty( $header_image ) ) { ?>
		<div id="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
		</a></div><!--logo end-->
	<?php } else { ?>
			<div id="logo2">
			<a href="<?php echo esc_url(home_url()); ?>" title="<?php bloginfo('description'); ?>" style='text-decoration:none;font-size:30pt;font-weight:bold;font-family:맑은 고딕;'>				
									<font style='color:red;'>i</font><font style='color:black;'>Joon</font>
			</a>
			<!--
			<a href="<?php echo esc_url(home_url()); ?>" title="<?php bloginfo('description'); ?>"><?php bloginfo( 'name' ); ?>
			</a>
			-->
			</div><!--logo end-->
	<?php } ?>	
			
			<!--menu-->
			
		<div id="menubar">
	
	<?php $navcheck = '' ; ?>
	
	<?php $navcheck = wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary', 'menu_id' => 'nav' ,'fallback_cb' => '', 'echo' => false ) );  ?>
	
	 <?php  if ($navcheck == '') { ?>
	
	<ul id="nav">
		
		<?php wp_list_pages('title_li=&sort_column=menu_order'); ?>

	</ul>
<?php } else echo($navcheck); ?> 

	</div>
		
	
	<!--menu end-->
			
			<div class="clear"></div>			
			
		</div><!-- header end-->


		</div>
		</div>
		
	</div><!--header container end-->	
		
