<?php  
/**
* Sanitize callback function for theme customization
*
* @package Ras_Dashen
* 
* @since 1.0.0
*/
/**
 * Sanitization: html
 * Control: textarea
 *
 * Sanitization callback for 'html' type text inputs. This
 * callback sanitizes $input for HTML allowable in posts.
 *
 * https://codex.wordpress.org/Function_Reference/wp_kses
 * https://gist.github.com/adamsilverstein/10783774
 * https://github.com/devinsays/options-framework-plugin/blob/master/options-check/functions.php#L69
 * http://ottopress.com/2010/wp-quickie-kses/
 * 
 * @uses	wp_filter_post_kses()	https://developer.wordpress.org/reference/functions/wp_filter_post_kses/
 * @uses	wp_kses()	https://developer.wordpress.org/reference/functions/wp_kses/
 */
if ( ! function_exists( 'ras_dashen_sanitize_html' ) ) {
	function ras_dashen_sanitize_html( $input ) {
		global $allowedposttags;

		return wp_kses( $input, $allowedposttags );
	}
}


/**
 * Sanitization: css 
 * Control: text, textarea 
 * 
 * Sanitization callback for 'css' type textarea inputs. This 
 * callback sanitizes $input for valid CSS.
 * 
 * NOTE: wp_strip_all_tags() can be passed directly as 
 * $wp_customize->add_setting() 'sanitize_callback'. It 
 * is wrapped in a callback here merely for example 
 * purposes.
 * 
 * @uses	wp_strip_all_tags()	https://developer.wordpress.org/reference/functions/wp_strip_all_tags/
 */
if ( ! function_exists( 'ras_dashen_sanitize_css' ) ) {
	function ras_dashen_sanitize_css( $input ) {
		return wp_strip_all_tags( $input );
	}
}

/**
 * HEX Color sanitization callback example.
 *
 * - Sanitization: hex_color
 * - Control: text, WP_Customize_Color_Control
 *
 */
if ( ! function_exists( 'ras_dashen_sanitize_hex_color' ) ) {
	function ras_dashen_sanitize_hex_color( $hex_color, $setting ) {
		// Sanitize $input as a hex value without the hash prefix.
		$hex_color = sanitize_hex_color( $hex_color );
		
		// If $input is a valid hex value, return it; otherwise, return the default.
		return ( ! is_null( $hex_color ) ? $hex_color : $setting->default );
	}
}

/**
 * Alpha Color (Hex, RGB & RGBa) sanitization
 *
 * @param  string	Input to be sanitized
 * @return string	Sanitized input
 */
if ( ! function_exists( 'ras_dashen_hex_rgba_sanitization' ) ) {
	function ras_dashen_hex_rgba_sanitization( $input, $setting ) {
		if ( empty( $input ) || is_array( $input ) ) {
			return $setting->default;
		}

		if ( false === strpos( $input, 'rgb' ) ) {
			// If string doesn't start with 'rgb' then santize as hex color
			$input = sanitize_hex_color( $input );
		} else {
			if ( false === strpos( $input, 'rgba' ) ) {
				// Sanitize as RGB color
				$input = str_replace( ' ', '', $input );
				sscanf( $input, 'rgb(%d,%d,%d)', $red, $green, $blue );
				$input = 'rgb(' . ras_dashen_in_range( $red, 0, 255 ) . ',' . ras_dashen_in_range( $green, 0, 255 ) . ',' . ras_dashen_in_range( $blue, 0, 255 ) . ')';
			}
			else {
				// Sanitize as RGBa color
				$input = str_replace( ' ', '', $input );
				sscanf( $input, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
				$input = 'rgba(' . ras_dashen_in_range( $red, 0, 255 ) . ',' . ras_dashen_in_range( $green, 0, 255 ) . ',' . ras_dashen_in_range( $blue, 0, 255 ) . ',' . ras_dashen_in_range( $alpha, 0, 1 ) . ')';
			}
		}
		return $input;
	}
}

/**
 * Sanitization: select  
 * Control: select, radio 
 * 
 * Sanitization callback for 'select' and 'radio' type controls. 
 * This callback sanitizes $input as a slug, and then validates
 * $input against the choices defined for the control.
 * 
 * @uses	sanitize_key()			https://developer.wordpress.org/reference/functions/sanitize_key/
 * @uses	$wp_customize->get_control()	
 * https://developer.wordpress.org/reference/classes/wp_customize_manager/get_control/
 */
if ( ! function_exists( 'ras_dashen_sanitize_select' ) ) {
	function ras_dashen_sanitize_select( $input, $setting ) {
	
		// Ensure input is a slug.
		$input = sanitize_key( $input );
		
		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;
		
		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
}

/**
 * Sanitization Function - Multiple Categories
 * 
 * @param $input, $setting
 * @return $input
 */
if ( !function_exists( 'ras_dashen_sanitize_multiple_cat_select' ) ) {

    function ras_dashen_sanitize_multiple_cat_select( $input, $setting ) {

        if ( ! empty( $input ) ) {

            $input = array_map( 'sanitize_text_field', $input );
        }

        return $input;
    } 
}

/**
 * Sanitization Number
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 *
 */
if ( !function_exists( 'ras_dashen_sanitize_number' ) ) {

    function ras_dashen_sanitize_number( $input, $setting ) {
        
        $number = absint( $input );
        // If the input is a positibe number, return it; otherwise, return the default.
        return ( $number ? $number : $setting->default );
    }
}

/**
 * Sanitize checkbox.
 *
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
if ( ! function_exists( 'ras_dashen_sanitize_checkbox' ) ) :

	function ras_dashen_sanitize_checkbox( $checked ) {

		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

endif;

/**
 * Drop-down Pages sanitization callback example.
 *
 * - Sanitization: dropdown-pages
 * - Control: dropdown-pages
 * 
 */
/*
if ( ! function_exists( 'ras_dashen_sanitize_dropdown_pages' ) ) {

	function ras_dashen_sanitize_dropdown_pages( $page_id, $setting ) {
		// Ensure $input is an absolute integer.
		$page_id = absint( $page_id );
		
		// If $page_id is an ID of a published page, return it; otherwise, return the default.
		return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

}
*/
if ( ! function_exists( 'ras_dashen_sanitize_dropdown_pages' ) ) {

	function ras_dashen_sanitize_dropdown_pages( $input ) {
		// Ensure $input integer
		if ( is_numeric( $input ) ) {
			return intval( $input );
		}
	}

}

/**
 * Only allow values between a certain minimum & maxmium range
 *
 * @param  number	Input to be sanitized
 * @return number	Sanitized input
 */
if ( ! function_exists( 'ras_dashen_in_range' ) ) {
	function ras_dashen_in_range( $input, $min, $max ) {
		if ( $input < $min ) {
			$input = $min;
		}
		if ( $input > $max ) {
			$input = $max;
		}
		return $input;
	}
}

/**
 * Sanitization: number_range 
 * Control: number, tel 
 * 
 * Sanitization callback for 'number' or 'tel' type text inputs. This 
 * callback sanitizes $input as an absolute integer within a defined 
 * min-max range.
 * 
 * @uses	absint()	https://developer.wordpress.org/reference/functions/absint/ 
 * @link	is_int()	http://php.net/manual/en/function.is-int.php
 */
if ( ! function_exists( 'ras_dashen_sanitize_number_range' ) ) {
	function ras_dashen_sanitize_number_range( $number, $setting ) {
	
		// Ensure input is an absolute integer
		$input = absint( $input );
		
		// Get the input attributes
		// associated with the setting
		$atts = $setting->manager->get_control( $setting->id )->input_attrs;
		
		// Get min 
		$min = ( isset( $atts['min'] ) ? $atts['min'] : $input );
		
		// Get max 
		$max = ( isset( $atts['max'] ) ? $atts['max'] : $input );
		
		// Get Step
		$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
		
		// If the input is within the valid range, 
		// return it; otherwise, return the default
		return ( $min <= $input && $input <= $max && is_int( $input / $step ) ? $input : $setting->default );
	}
}



/**
 * Sanitization: image
 * Control: text, WP_Customize_Image_Control
 *
 * Sanitization callback for images.
 *
 * @uses	ras_dashen_validate_image()		
 * @uses	esc_url_raw()				http://codex.wordpress.org/Function_Reference/esc_url_raw
 */
if ( ! function_exists( 'ras_dashen_sanitize_image' ) ) :

	function ras_dashen_sanitize_image( $input, $setting ) {

		return esc_url_raw( ras_dashen_validate_image( $input, $setting->default ) );

	}

endif;



/**
 * Validation: image
 * Control: text, WP_Customize_Image_Control
 *
 * @uses	wp_check_filetype()		https://developer.wordpress.org/reference/functions/wp_check_filetype/
 * @uses	in_array()				http://php.net/manual/en/function.in-array.php
 */
if ( ! function_exists( 'ras_dashen_validate_image' ) ) :

	function ras_dashen_validate_image( $input, $default = '' ) {
		// Array of valid image file types
		// The array includes image mime types
		// that are included in wp_get_mime_types()
		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png',
			'bmp'          => 'image/bmp',
			'tif|tiff'     => 'image/tiff',
			'ico'          => 'image/x-icon',
			'svg'          => 'image/svg+xml',
		);
		// Return an array with file extension
		// and mime_type
		$file = wp_check_filetype( $input, $mimes );
		// If $input has a valid mime_type,
		// return it; otherwise, return
		// the default.
		return ( $file['ext'] ? $input : $default );
	}

endif;




// validate date input
function ras_dashen_sanitize_date_input( $date_input ) {

	$now = wp_date( get_option( 'date_format' ) );

	if ( $date_input < $now ) {
		$date_input = $now;
	}

	return wp_date( sanitize_option( 'date_format', wp_unslash( $date_input ) ) );
}
