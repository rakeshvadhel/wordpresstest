<?php
$args = array(
  'numberposts' => 3,
  'post_type'   => 'post'
);
 
$blog_lists = get_posts( $args );
?>
		<section class="banner-sec">
			<div class="container">
				<div class="banner-slider">
				<?php 
				foreach($blog_lists as $blog_list){
					$featured_img_url = get_the_post_thumbnail_url($blog_list->ID, 'full'); 
					$post_date = get_the_date( 'j, F Y',$blog_list->ID );
					
					?>
					<div class="banner-slide">
						<div class="row">
							<div class="col-lg-5">
								<div class="banner-info">
									<span><img src="<?php echo home_url()?>/wp-content/themes/test/dev/images/clock.png" alt=""><?php echo $post_date; ?></span>
									<h2><?php echo $blog_list->post_title; ?></h2>
									<a href="<?php echo esc_url( get_permalink( $blog_list->ID ) ); ?>" title="" class="lnk-default">Read More</a>
								</div><!--banner-info end-->
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img src="<?php echo $featured_img_url; ?>" alt="feature image">
								</div><!--banner-img end-->
							</div>
						</div>
					</div>
				<?php } ?>
				</div><!--banner-slider end-->
			</div>
		</section><!--banner-sec end-->

		<section class="main-content">
			<div class="container">
				<div class="about-us">
					<h3><?php the_field("about_section_title"); ?></h3>
					<div><?php the_field("about_content"); ?></div> 
				</div><!--about-us end-->
				<div class="blog-section">
					<h3>Our News</h3>
					<?php
						$newsargs = array(
						  'numberposts' => 2,
						  'post_type'   => 'news'
						);
						 
						$news_lists = get_posts( $newsargs );
						?>
					<div class="blog-posts">
						<?php 
					foreach($news_lists as $news_list){
						$featured_newsimg_url = get_the_post_thumbnail_url($news_list->ID, 'full'); 
						$news_date = get_the_date( 'j, F Y',$blog_list->ID ); ?>
						<div class="blog-post">
								<div class="post-img">
									<img src="<?php echo $featured_newsimg_url; ?>" alt="">
								</div><!--post-img end-->
								<div class="post-info">
									<span class="posted-date"><?php echo $news_date; ?></span>
									<p><?php echo $news_list->post_title; ?></p>
								</div><!--post-info end-->
							</div><!--blog-post end-->
					<?php } ?>
					
					</div><!--blog-posts end-->
				</div><!--blog-section end-->
				<div class="clearfix"></div>
			</div>
		</section><!--main-content end-->
		<section class="main-content">
			<div class="container">
		<?php echo do_shortcode('[TestPluginShortcode]'); ?>
		</div>
		</section>