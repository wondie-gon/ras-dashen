<?php
/**
* Custom helper functions
*
* @package Ras_Dashen
*
* @since 1.0.0
*/

/**
* Function to get svg code for section bg img
*
* @param string $svg_name Name (key) of svg shape needed from the array type
*
* @return shape svg code
*/
if ( ! function_exists( 'ras_dashen_get_svg_for_section_bg_img' ) ) :

	function ras_dashen_get_svg_for_section_bg_img( $svg_name ) {

		// get file for list of svgs  
		// require_once get_template_directory() . '/assets/svg/background-svgs.php';

		// include( get_stylesheet_directory() . '/assets/svg/background-svgs.php' );

		include( get_theme_file_path( '/assets/svg/background-svgs.php' ) );

		$section_bg_svg = '';

		// if the required svg is found
		if ( $background_svgs[$svg_name] ) {
			$section_bg_svg .= $background_svgs[$svg_name];
		}

		echo $section_bg_svg;

	}
	
endif;

/**
* Function to get svg codes for card shapes
*
* @param string $svg_name Name (key) of svg shape needed from the array type
*
* @return shape svg code
*/
if ( ! function_exists( 'ras_dashen_get_svg_for_card_shape' ) ) :

	function ras_dashen_get_svg_for_card_shape( $svg_name ) {

		// get file for list of svgs  
		require_once get_template_directory() . '/assets/svg/card-shape-clippers.php';

		$card_shape_svg = '';

		// if the required svg is found
		if ( $card_shape_svgs[$svg_name] ) {
			$card_shape_svg .= $card_shape_svgs[$svg_name];
		}

		echo $card_shape_svg;

	}
	
endif;

/**
* Function to get svg codes for section shapes
*
* @param string $svg_name Name (key) of svg shape needed from the array type
*
* @return shape svg code
*/
if ( ! function_exists( 'ras_dashen_get_svg_for_section_shape' ) ) :

	function ras_dashen_get_svg_for_section_shape( $svg_name ) {

		// get file for list of svgs  
		require get_template_directory() . '/assets/svg/section-shapes.php';
		
		$section_shape_svg = '';

		// if the required svg is found
		if ( $section_shape_svgs[$svg_name] ) {
			$section_shape_svg .= $section_shape_svgs[$svg_name];
		}

		echo $section_shape_svg;

	}
	
endif;

/**
* Function to get svg codes for img radio buttons
*
* @param string $svg_name Name (key) of svg shape needed from the array type
*
* @return shape svg code
*/
if ( ! function_exists( 'ras_dashen_get_svg_for_img_radio_btn' ) ) :

	function ras_dashen_get_svg_for_img_radio_btn( $svg_name ) {

		// get file for list of svgs  
		require_once get_template_directory() . '/assets/svg/img-radio-button-svgs.php';
		
		$img_radio_btn_svg = '';

		// if the required svg is found
		if ( $img_radio_button_svgs[$svg_name] ) {
			$img_radio_btn_svg .= $img_radio_button_svgs[$svg_name];
		}

		echo $img_radio_btn_svg;

	}
	
endif;

/**
* Function to get svg elements for image clipping shapes
*
* @param string $svg_name Name (key) of svg shape needed from the array type
*
* @return shape svg code
*/
if ( ! function_exists( 'ras_dashen_get_svg_for_img_shape' ) ) :

	function ras_dashen_get_svg_for_img_shape( $svg_name ) {

		// get file for list of svgs  
		require_once get_template_directory() . '/assets/svg/image-shape-clippers.php';
		
		$img_shape_svg = '';

		// if the required svg is found
		if ( $img_shape_svgs[$svg_name] ) {
			$img_shape_svg .= $img_shape_svgs[$svg_name];
		}

		echo $img_shape_svg;

	}
	
endif;

/**
* Function to return background svgs
*
* @param string $svg_type Type of svg shape needed, the array name
* @param string $svg_name Name (key) of svg shape needed from the array type
*
* @return svg shape
*/
if ( ! function_exists( 'ras_dashen_get_section_svg_bg' ) ) :

	function ras_dashen_get_section_svg_bg( $svg_type, $svg_name ) {

		switch ( $svg_type ) {

			case 'section_background':

				// get array of section background image svgs
				require_once trailingslashit( get_template_directory() ) . 'assets/svg/background-svgs.php';

				$retSvg = $background_svgs[$svg_name];

				break;

			case 'card_shape':

				// get array of card shape clipper svgs
				require_once trailingslashit( get_template_directory() ) . 'assets/svg/card-shape-clippers.php';

				$retSvg = $card_shape_svgs[$svg_name];

				break;

			case 'section_shape':

				// get array of section shape clipper svgs
				require_once trailingslashit( get_template_directory() ) . 'assets/svg/section-shapes.php';

				$retSvg = $section_shape_svgs[$svg_name];

				break;
			case 'visual_radio_buttons':

				// get array of svgs for theme customizer custom image radio button controls
				require_once trailingslashit( get_template_directory() ) . 'assets/svg/img-radio-button-svgs.php';

				$retSvg = $img_radio_button_svgs[$svg_name];

				break;
			
		}

		$the_svg = '';

		// get if the required svg exists
		if ( ! empty( $retSvg ) ) {
			
			$the_svg .= $retSvg;

		}

		return $the_svg;	

	}
	
endif;

/**
* Function to return image clipping svg shapes
*
* @param string $svg_type Type of svg shape needed, the array name
* @param string $svg_name Name (key) of svg shape needed from the array type
*
* @return svg shape
*/
if ( ! function_exists( 'ras_dashen_img_shape_clipper_svg' ) ) :

	function ras_dashen_img_shape_clipper_svg( $svg_type = 'img_shape', $svg_name ) {

		// access array of image shape clipper svgs
		require_once trailingslashit( get_template_directory() ) . 'assets/svg/image-shape-clippers.php';

		$imgClipperSvg = '';

		// get the svg
		if ( '' !== $svg_name ) {
			$imgClipperSvg .= $img_shape_svgs[$svg_name];
		}

		return $imgClipperSvg;	

	}
	
endif;

// get the svg and set its clippath id
if ( ! function_exists( 'ras_dashen_get_svg' ) ) :

	function ras_dashen_get_img_shape_svg( $svg_name, $id ) {

		// get the svg
		$svg_elm = ras_dashen_img_shape_clipper_svg( 'img_shape', $svg_name );

		// create new DOMDocument
		$dom = new DOMDocument;	

		// load the svg
		$dom->loadXML( $svg_elm );

		$dom->encoding = "utf-8";

		// get the svg element
		$clipPaths = $dom->getElementsByTagName( "clipPath" );

		// set id attribute
		$clipPaths[0]->setAttribute( "id", $id );

		// printing the svg
		echo $dom->saveXML();
		
	}
	
endif;

/**
 * Function to retrieve various stored svgs
 *
 * @param string $args Arguments needed to retrieve svg codes
 * @param string $key Not in use.
 * @param null   $value Not in use.
 *
 * @return svg
 */
if ( ! function_exists( 'ras_dashen_get_miscellaneous_svgs' ) ) :

	function ras_dashen_get_miscellaneous_svgs( $args, $key, $value ) {

		// include to get the svgs from
		require_once get_template_directory() . '/assets/svg/miscellaneous.php';

		$args = array();

		if ( in_array( 'device', $args ) ) {
			
			switch ( $args['device'] ) {
				case 'mobile':
					$args['viewBox'] = array( '0 0 576 150' );
					$args['v1'] = '';
					$args['h'] = '';
					$args['v2'] = '';
					break;
				case 'tablet':
					$args['viewBox'] = array( '0 0 768 200' );
					$args['v1'] = '';
					$args['h'] = '';
					$args['v2'] = '';
					break;
				
				default:
					$args['viewBox'] = array( '0 0 1440 250' );
					$args['v1'] = '';
					$args['h'] = '';
					$args['v2'] = '';
					break;
			}

		}


		return $args;

	}
	
endif;

/**
 * Function to get svg dasharray lines
 *
 * @param string $cardPosition Card position number from the list of cards
 * 
 *
 * @return svg
 */
if ( ! function_exists( 'ras_dashen_get_svg_dasharray_lines' ) ) :

	function ras_dashen_get_svg_dasharray_lines( $cardPosition ) {

		// include to get the svgs from
		require get_template_directory() . '/assets/svg/miscellaneous.php';

		// $row_connecters_dashed_lines = array();
			
		switch ( $cardPosition ) {
			case '1':
				$dash_lines = '';
				break;
			case '2':
				$dash_lines = $row_connecters_dashed_lines['lr_250_950'];
				break;
			case '3':
				$dash_lines = $row_connecters_dashed_lines['rl_950_350'];
				break;
			case '4':
				$dash_lines = $row_connecters_dashed_lines['lr_350_1150'];
				break;
		}

		return $dash_lines;

	}
	
endif;

/**
* Custom function for column classes to achieve front major service cards staggering display
*
* @param string $cardPosition Card position number from the list of cards
* @param array $divHolds Array that contains content types wrapped or holded by the div, for ex, img or excerpt
*
* @return string Class name list of the wrapper div
*/
if ( ! function_exists( 'ras_dashen_get_major_service_staggered_cols_classes' ) ) :

	function ras_dashen_get_major_service_staggered_cols_classes( $cardPosition, $divHolds ) {

		// $divHolds = array();

		switch ( $cardPosition ) {

			case '1':

				$img_wrapper_class = array( 'col-md-4 img-wrapper order-1' );
				$excerpt_wrapper_class = array( 'col-md-4 text-wrapper text-center py-4 order-2' );

				break;

			case '2':

				$img_wrapper_class = array( 'col-md-4 img-wrapper order-1 order-md-2' );
				$excerpt_wrapper_class = array( 'col-md-4 text-wrapper text-center offset-md-2 py-4 order-2 order-md-1' );

				break;

			case '3':

				$img_wrapper_class = array( 'col-md-4 img-wrapper offset-md-1 order-1' );
				$excerpt_wrapper_class = array( 'col-md-4 text-wrapper text-center py-4 order-2' );

				break;

			case '4':

				$img_wrapper_class = array( 'col-md-4 img-wrapper order-1 order-md-2' );
				$excerpt_wrapper_class = array( 'col-md-4 text-wrapper text-center offset-md-4 py-4 order-2 order-md-1' );

				break;
				
			case '5':

				$img_wrapper_class = array( 'col-md-4 img-wrapper offset-md-1 order-1' );
				$excerpt_wrapper_class = array( 'col-md-4 text-wrapper text-center py-4 order-2' );

				break;

			case '6':

				$img_wrapper_class = array( 'col-md-4 img-wrapper order-1 order-md-2' );
				$excerpt_wrapper_class = array( 'col-md-4 text-wrapper text-center offset-md-2 py-4 order-2 order-md-1' );

				break;

			case '7':

				$img_wrapper_class = array( 'col-md-4 img-wrapper order-1' );
				$excerpt_wrapper_class = array( 'col-md-4 text-wrapper text-center py-4 order-2' );

				break;

			default:

				$img_wrapper_class = array( 'col-md-4 img-wrapper order-1' );
				$excerpt_wrapper_class = array( 'col-md-4 text-wrapper text-center py-4 order-2' );

				break;
			
		}

		/* prepare class lists to return based on given key name
		*  of $divHolds array param
		*/
		if ( 'img' === $divHolds ) {
			$wrapper_class_list = implode( ' ', $img_wrapper_class );
		} else if ( 'excerpt' === $divHolds ) {
			$wrapper_class_list = implode( ' ', $excerpt_wrapper_class );
		}
		
		return $wrapper_class_list;

	}
	
endif;