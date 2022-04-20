<?php
/**
 * Custom svg radio button control for theme customizer
 *
 * 
 * @package Ras_Dashen
 *
 * @since 1.0.0
 *
 * @see WP_Customize_Control
 */
if ( ! class_exists( 'WP_Customize_Control' ) ) {
    return NULL;
}

if ( ! class_exists( 'Ras_Dashen_Svg_Radio_Button_Control' ) ) :
	
	class Ras_Dashen_Svg_Radio_Button_Control extends WP_Customize_Control {

		/**
		 *
		 * @var string
		 */
		public $type = 'svg-radio';

		/**
		 * Render content.
		 *
		 * @since 1.0.0
		 */
		public function render_content() {

			if ( empty( $this->choices ) ) {
				return;
			}

			$name = '_customize-radio-' . $this->id;

		?>
		<label>
			<?php if ( ! empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif; ?>
			<?php if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>

			<?php echo list_svgs( esc_attr( $this->value() ) ); ?>

			<input type="hidden" id="selected_svg" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
		</label>
	    <?php
		}
	}
endif;