		
		
		
		
		<?php 
		/*
			홈페이지 메인화면의 배너를 설정하는 구간. 기본은 4개의 배너가 설정되고 large-3를 적용하여 25%씩 넓이를 차지함. 
			양쪽 패딩을 일부러 0으로 주어 이미지 크기에 딱맞게 설정함. 
			
			4개 기준으로 이미지 크기는 250 x 70 이며 이는 수정이 가능하다.
		
		*/
		for ($i = 1; $i <= 4; $i++) { ?>
		
		<div class="large-3 columns" style="padding-left:0px;padding-right:0px;padding-bottom:0px;">		
		
				<div class="boxes <?php if ($i == 1) {echo "box1";} ?><?php if($i == 2) {echo "box2";} ?> <?php if($i == 3) {echo "box3";} ?><?php if($i == 4) {echo "box4";} ?>">
						<div class="box-head">
								
				<a href="
				<?php 
						echo esc_url(of_get_option('box_link' . $i)); ?>
        		">
				<img src="
				<?php 
					if(esc_url(of_get_option('box_image' . $i)) != NULL){ 
						echo esc_url(of_get_option('box_image' . $i));
					} 
					else echo get_template_directory_uri() . '/images/banner' .$i. '.png' ?>" alt="<?php echo esc_html(of_get_option('box_head' . $i)); ?>" 
				/>
                </a>
					</div> <!--box-head close-->

				</div><!--boxes  end-->
				
		</div><!--col end-->				

		<?php } ?>