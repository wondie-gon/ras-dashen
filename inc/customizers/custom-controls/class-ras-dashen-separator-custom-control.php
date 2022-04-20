<?php
/**
* Separator custom control
*
* @package Ras_Dashen
* 
* @since 1.0.0
*/
if ( ! class_exists( 'Ras_Dashen_Separator_Custom_Control' ) ) :

	class Ras_Dashen_Separator_Custom_Control extends WP_Customize_Control {
		/**
		 * Control type
		 *
		 */
		public $type = 'ras-dashen-separator';
		/**
		 * Control method
		 *
		 */
		public function render_content() {
			?>
			<p><hr style="border-color: #0091c8; opacity: 0.2;"></p>
			<?php
		}
	}
	
endif;