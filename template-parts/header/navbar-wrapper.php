<?php
/**
 * Displays all the navigation areas in header
 *
 * @package Ras_Dashen
 *
 * @since 1.0.0
 */
?>
<nav id="site-navigation" class="navbar navbar-expand-lg ui-main-navbar">

    <!-- language switcher nav -->
    <?php 
      /**
      * Hook - ras_dashen_wpglobus_language_switcher
      *
      * @hooked ras_dashen_wpglobus_language_switcher_action
      */
      do_action( 'ras_dashen_wpglobus_language_switcher' );
    ?>

    <!-- navbar-brand.php -->
    <?php get_template_part( 'template-parts/header/navbar-brand' ); ?>

    <button class="navbar-toggler collapse-menu-button" type="button" data-toggle="collapse" data-target="#siteNavbarCollapse">
      <span class="ui-menu-toggler"></span>
    </button>

    <div class="collapse navbar-collapse" id="siteNavbarCollapse">

      	<?php get_template_part( 'template-parts/header/social-media-nav' ); ?>

      	<!-- secondary-bar -->
        <div class="secondary-bar">
          <!-- menu list without 'div' container -->
          <?php get_template_part( 'template-parts/header/secondary-nav' ); ?>

          <!-- the search box -->
          <div class="ui-searchbox">
            <?php get_search_form(); ?>
          </div>

        </div><!-- .secondary-bar -->

      	<!-- primary-bar -->
      	<?php

          // Primary mega nav menu using wp-bbotstrap-mega-navwalker
          get_template_part( 'template-parts/header/mega-menu' ); 
        ?>

    </div><!-- .collapse.navbar-collapse -->

</nav><!-- nav.ui-main-navbar -->