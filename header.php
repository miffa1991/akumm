<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package akumm
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="mobmenu">
		<div class="mobmenu__darken"></div>
		<div class="mobmenu__content">
			<div class="mobmenu__insd">
				<div class="mobmenu__close">
					<svg class="icon_cross" xmlns="http://www.w3.org/2000/svg">
						<use xlink:href="#icon_cross"></use>
					</svg>
				</div>
				<div class="mobmenu__search">
					<input type="text" placeholder="Поиск по каталогу" />
					<button><svg class="icon_search" xmlns="http://www.w3.org/2000/svg">
						<use xlink:href="#icon_search"></use>
					</svg></button>
				</div>
				<div class="mobmenu__location">
					<a href="">
						<svg class="icon_location" xmlns="http://www.w3.org/2000/svg">
							<use xlink:href="#icon_location"></use>
						</svg>
						<span>Наши магазины</span>
					</a>
				</div>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-mob',
				) );
				
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
				) );
				?>
				<div class="mobmenu__langs" style="display: none;">
					<?php wp_nav_menu( array(
						'theme_location' => 'menu-lang',
					) ); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="top">
		<div class="container">
			<div class="top__content <?php if ( is_front_page() ){echo 'top__content_lighhome';} ?>">
				<div class="top__list">
					<div class="top__location"><a href=""><svg class="icon_location" xmlns="http://www.w3.org/2000/svg">
						<use xlink:href="#icon_location"></use>
					</svg><span>Наши магазины</span></a></div>

					<?php dynamic_sidebar( 'sidebar-header-phone' ); ?>
					
					<div class="top__langs" style="display: none;">
						<?php wp_nav_menu( array(
							'theme_location' => 'menu-lang',
						) ); ?>
					</div>
				</div>
				<div class="top__search">
					<?php dynamic_sidebar( 'sidebar-search' ); ?>
				</div>
			</div>
		</div>
	</div>
	<header class="header <?php if ( !is_front_page() ){echo 'header_wh';} ?>">

		<div class="container">
			<div class="header__container">
				<div class="header__logo">
					<?php the_custom_logo(); ?>
				</div>

				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
				) );
				?>
				<div class="hamburg"><span></span></div>
			</div>
		</div>
	</header>
	


