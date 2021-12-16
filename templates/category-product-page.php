<?php
/**
 * Template name: Каталог товаров
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
<!--main-->
<div id="main" class="clearfix">
    <div class="container">
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb( '<ul id="breadcrumbs" class="breadcrumb">','</ul>' );
            the_title( '<h1 class="breadcrumb__current">','</h1>' );
        }
        ?>
        <div class="categories">
            <?php
            $args = array(
                'taxonomy' => 'product_cat',
                'orderby'    => 'count',
                'order'      => 'DESC',
                'hide_empty' => false
            );

            $product_categories = get_terms( $args );

            $count = count($product_categories);

            if ( $count > 0 ){
                foreach ( $product_categories as $product_category ) {
                    if( $product_category->term_id != 15 ){
                        $thumbnail_id = get_woocommerce_term_meta( $product_category->term_id, 'thumbnail_id', true );
                        $item = '<a href="' . get_term_link( $product_category ) . '" class="categories__item">';
                        $item .= '<div class="categories__img" style="background-image: url('.  wp_get_attachment_url( $thumbnail_id ) .')"></div>';
                        $item .= '<div class="categories__name">' . $product_category->name . '</div>';
                        $item .= '</a>';
                        echo $item;
                    }
                }
            }
            ?>
        </div>
        <div class="article">
            <?php the_content(); ?>
        </div>
    </div>
</div>




<?php
get_footer();

