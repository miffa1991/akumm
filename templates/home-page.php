<?php
/**
 * Template name: Главная
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package akumm
 */

get_header();
?>
<div class="slider-present">
    <?php the_field( 'main_slide' ); ?>
</div>
<div class="container">
    <div class="section-header">
    	<?php the_field( 'popular_tver_main' ); ?>
    </div>
    <?php the_field( 'short_product_main' ); ?>
    <div class="show-all"><a class="button button_sct" href="/shop/">Смотреть весь каталог</a></div>
</div>
<div class="container container_full">
    <div class="brands my title">
        <div class="section-header">
        	<?php the_field( 'brend_work_main' ); ?>
        </div>
        <?php   wp_nav_menu( array(
            'theme_location' => 'menu-brend-home',
            'walker'=> new True_Walker_Nav_Menu_Home()
        ) ); ?>
    </div>
</div>

<div class="container">
    <div class="aboutus">
        <div class="aboutus__content">
            <div class="aboutus__text">
                <?php the_content(); ?>
            </div><a class="aboutus__act" href="/o-kompanii/">Подробнее</a>
            <div class="aboutus__image"><img src="/wp-content/themes/akumm/assets/img/mhnc.png" alt="" /></div>
        </div>
    </div>
</div>





<?php
get_footer();
