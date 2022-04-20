<?php
/**
 * Displaying social media links and language switcher
 *
 * @package Ras_Dashen
 *
 * @since 1.0.0
 */
?>
<!-- social media nav -->
<div class="ui-social-nav">
  	<?php 
      /**
      * Hook - ras_dashen_header_social_media_links
      *
      * @hooked ras_dashen_header_social_media_links_action - 10
      */
      do_action( 'ras_dashen_header_social_media_links' );
    ?>

</div><!-- .ui-social-nav -->