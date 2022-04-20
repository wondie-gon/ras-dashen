<?php
/**
 * Custom control for alpha color picker
 *
 * 
 * @package Ras_Dashen
 */
/**
 * Thanks to
 *
 * @author Anthony Hortin <http://maddisondesigns.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 * @link https://github.com/maddisondesigns
 *
 * Props @kallookoo for WPColorPicker script with Alpha Channel support
 *
 * @author Sergio <https://github.com/kallookoo>
 * @license http://www.gnu.org/licenses/gpl-3.0.html
 * @link https://github.com/kallookoo/wp-color-picker-alpha
 */
if ( ! class_exists( 'Ras_Dashen_Custom_Alpha_Color_Control' ) ) :
	
	class Ras_Dashen_Custom_Alpha_Color_Control extends WP_Customize_Control {
		/**
		 * The type of control being rendered
		 */
		public $type = 'wpcolorpicker-alpha-color';
		/**
		 * ColorPicker Attributes
		 */
		public $attributes = "";
		/**
		 * Color palette defaults
		 */
		public $defaultPalette = array(
			'#000000',
			'#ffffff',
			'#a0ebff',
			'#83c8e7',
			'#e1faff',
			'#0091c8',
			'#41b2e2',
			'#f7cb46',
		);
		/**
		 * Constructor
		 */
		public function __construct( $manager, $id, $args = array(), $options = array() ) {
			parent::__construct( $manager, $id, $args );
			$this->attributes .= 'data-default-color="' . esc_attr( $this->value() ) . '"';
			$this->attributes .= 'data-alpha="true"';
			$this->attributes .= 'data-reset-alpha="' . ( isset( $this->input_attrs['resetalpha'] ) ? $this->input_attrs['resetalpha'] : 'true' ) . '"';
			$this->attributes .= 'data-custom-width="0"';
		}
		/**
		 * Enqueue our scripts and styles
		 */
		public function enqueue() {
			wp_enqueue_style( 'ras-dashen-custom-controls-css', trailingslashit( get_template_directory_uri() ) . 'assets/css/customizer.css', array(), _S_VERSION, 'all' );
			wp_enqueue_script( 'wp-color-picker-alpha', trailingslashit( get_template_directory_uri() ) . 'assets/js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), _S_VERSION, true );
			wp_enqueue_style( 'wp-color-picker' );
		}
		/**
		 * Pass our Palette colours to JavaScript
		 */
		public function to_json() {
			parent::to_json();
			$this->json['colorpickerpalette'] = isset( $this->input_attrs['palette'] ) ? $this->input_attrs['palette'] : $this->defaultPalette;
		}
		/**
		 * Render the control in the customizer
		 */
		public function render_content() {
		?>
		  <div class="wpcolorpicker_alpha_color_control">
				<?php if( !empty( $this->label ) ) { ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php } ?>
				<?php if( !empty( $this->description ) ) { ?>
					<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php } ?>
				<input type="text" class="wpcolorpicker-alpha-color-picker" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize-control-colorpicker-alpha-color" <?php echo $this->attributes; ?> <?php $this->link(); ?> />
			</div>
		<?php
		}
	}

endif;