<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package akumm
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('preview'); ?>>

	<div class="preview__top">

		<a href="<?php the_permalink(); ?>">
			<?php the_title( '<div class="preview__name">', '</div>' ); ?>
		</a>
		<div class="preview__img"><?php akumm_post_thumbnail(); ?></div>

		<div class="preview__about"><?php the_excerpt(); ?></div>
	</div>
	<div class="preview__act"><a class="tohref" href="<?php the_permalink(); ?>"> <svg class="icon_arrow-right" xmlns="http://www.w3.org/2000/svg">
		<use xlink:href="#icon_arrow-right"></use>
	</svg><span>Подробнее</span></a></div>

</article><!-- #post-<?php the_ID(); ?> -->
