<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package test
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header>
			<div class="container">
				<div class="logo">
					<?php the_custom_logo(); ?>
				</div><!--logo end-->
				<div class="contact-info">
					<h3><?php the_field('mobile_number','option');?></h3>	
				</div><!--contact-info end-->
				<div class="menu-btn">
                    <a href="#" title="">
                        <span class="bar1"></span>
                        <span class="bar2"></span>
                        <span class="bar3"></span>
                    </a>
                </div><!--menu-btn end-->
				<div class="clearfix"></div>
			</div>
		</header>
	<header id="masthead" class="site-header navi-sec">
	
		<div class="container">
		<?php  dynamic_sidebar('head_search'); ?>
		<nav id="site-navigation" class="main-navigation">
			
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav><!-- #site-navigation -->
	</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
