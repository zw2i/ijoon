<?php if ( 'posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
} else { ?>

<?php get_header(); ?>

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


		<!--boxes-->
		<div id="box_container">
		
	<div class="row">		
				
		<?php get_template_part( 'element-boxes', 'index' ); ?>
		
</div><!--row end-->			
		
		</div><!--box-container end-->
			
			<div class="clear"></div>
			

<?php get_footer(); ?>

<?php } ?>