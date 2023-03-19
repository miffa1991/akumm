<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package akumm
 */

?>

<footer class="footer">
  <div class="container">
    <div class="footer__content footer__content_ligh">
      <div class="footer__nav">
        <div class="footer__navlists">
          <?php
                    wp_nav_menu( array(
                        'theme_location' => 'menu-foot-1',
                    ) );
                    wp_nav_menu( array(
                        'theme_location' => 'menu-foot-2',
                    ) );
                    ?>
        </div>
        <div class="footer__copy">© 2019 Все права защищены.<br />Создание сайта: <a href="#">InfoRegion,LTD</a></div>
      </div>

      <div class="footer__contacts">
        <div class="footer__contacts-content">
          <?php dynamic_sidebar( 'sidebar-phone-footer' ); ?>
        </div>
      </div>
    </div>
  </div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>