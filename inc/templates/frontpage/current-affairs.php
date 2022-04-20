<?php
/**
 * Template part to display current affairs on frontpage 
 *
 *
 * @package Ras_Dashen
 *
 * @since 1.0.0
 */
// Get default customization
$default = ras_dashen_get_default_mods();

// check if enabled
$current_affairs_enabled = get_theme_mod( 'ras_dashen_front_current_affairs_enabled' );

if ( $current_affairs_enabled == false ) {
  return;
}
?>
<div class="row ui-front-currentaffairs py-2 has-scroll-anim">

<?php  
	/**
	* Hook - ras_dashen_front_current_affairs_section_title.
	*
	* @hooked ras_dashen_front_current_affairs_section_title_action - 10
	*/
	do_action( 'ras_dashen_front_current_affairs_section_title' );

	/**
	* Hook - ras_dashen_front_current_affairs_display.
	*
	* @hooked ras_dashen_front_current_affairs_display_action - 10
	*/
	do_action( 'ras_dashen_front_current_affairs_display' );
?>

    <!-- svg to clip caption -->
    <svg width="0" height="0">
      <defs>
        <clipPath id="clip-arrow-right" clipPathUnits="objectBoundingBox">
          <polygon points="0 0.1, 0.6 0.1, 0.6 0, 1 0.5, 0.6 1, 0.6 0.9, 0 0.9" />
        </clipPath>
      </defs>
    </svg>

    <!-- svg to clip img -->
    <svg width="0" height="0">
      <defs>
        <clipPath id="penta-pointed-right" clipPathUnits="objectBoundingBox">
          <polygon points="0 0, 0.75 0, 1 0.5, 0.75 1, 0 1" />
        </clipPath>
      </defs>
    </svg>
</div><!-- .ui-front-currentaffairs Frontpage section for latest news -->