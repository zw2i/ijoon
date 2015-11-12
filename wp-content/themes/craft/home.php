<?php get_header(); ?>

<?php if(!is_front_page()) { ?>

	<div id="subhead_container">
		
		<div class="row">

		<div class="large-12 columns">
	
			
<h1><?php if ( is_category() ) {
		single_cat_title();
		} elseif (is_tag() ) {
		echo (__( 'Archives for ', 'craft' )); single_tag_title();
		} elseif (is_author() ) {
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));		
		echo (__( 'Archives for ', 'craft' )); echo $curauth->nickname;		
	} elseif (is_archive() ) {
		echo (__( 'Archives for ', 'craft' )); single_month_title(' ', true);
	} else {
		wp_title('',true);
	} ?></h1>
			
			</div>	
			
	</div></div>
	
<?php } ?>

<!-- slider -->
<?php if(is_front_page()) { ?>

<div id="slider_container">

	<div class="row">

		<div class="twelve columns">
	
			<?php get_template_part( 'element-slider', 'index' ); ?>

		</div>
	</div>
</div>

<?php } ?> <!-- slider end -->

<?php if(is_front_page()) { ?>

		<!--boxes-->
		<div id="box_container">
		
	<div class="row">		
				
		<?php get_template_part( 'element-boxes', 'home' ); ?>
		
</div><!--row end-->			
		
		</div><!--box-container end-->
			
			<div class="clear"></div>

				
	<?php } ?> 
<!--content-->

		<div class="row" id="content_container">
				
	<!--left col--><div class="large-8 columns">
	
		<div id="left-col">
			
			<?php get_template_part( 'loop', 'home' ); ?>

	</div> <!--left-col end-->
</div> <!--column end-->

<?php get_sidebar(); ?>

</div>
<!--content end-->			
		

<?php get_footer(); ?>