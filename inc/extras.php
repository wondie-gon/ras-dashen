<?php
/**
* Custom functions that add features by enhancing core WP functionalities 
*
* They could be replaced by core WP functions
*
* @package Ras_Dashen
* @since 1.0.0
*/

/**
* 
* To customize logo at login page
*
* @package Ras_Dashen
*/
function ras_dashen_filter_custom_login_logo() {

    if ( has_custom_logo() ) :

        $cstm_logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
        ?>
        <style type="text/css">
            .login h1 a {
                background-image: url(<?php echo esc_url( $cstm_logo[0] ); ?>);
                -webkit-background-size: <?php echo absint( $cstm_logo[1] )?>px;
                background-size: <?php echo absint( $cstm_logo[1] ) ?>px;
                height: <?php echo absint( $cstm_logo[2] ) ?>px;
                width: <?php echo absint( $cstm_logo[1] ) ?>px;
                display:block;
                padding-bottom: 30px;
            }
        </style>
        <?php
    else:
        $stored_logo_addr = get_stylesheet_directory_uri() . '/assets/images/logo.svg';
        ?>
        <style>
            .login h1 a { 
                background-image: url(<?php echo esc_url( $stored_logo_addr ); ?>); 
                -webkit-background-size: 250px 150px; 
                background-size: 250px 150px; 
                width:250px; 
                height:150px; 
                display:block;
                padding-bottom: 30px; 
            }
        </style>
        <?php
    endif;
}

add_action( 'login_head', 'ras_dashen_filter_custom_login_logo', 10 );

// change login logo url to your website
function ras_dashen_filter_login_logo_url() {
    return home_url();
}
add_filter('login_headerurl', 'ras_dashen_filter_login_logo_url');

/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class based on post formats, and other factors
 *
 * @since Twenty Fourteen 1.0
 *
 * @param array $classes A list of existing post class values.
 * @return array The filtered post class list.
 */
function ras_dashen_post_classes( $classes ) {
    if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
        $classes[] = 'has-post-thumbnail';
    }

    // post format video, gallery, audio
    if ( has_post_format( 'video' ) || has_post_format( 'audio' ) || has_post_format( 'gallery' ) ) {
        if ( is_single() ) {
            $classes[] = 'col-12';
        } elseif ( is_archive() ) {
            $classes[] = 'col-md-6';
        }
    }
    

    return $classes;
}
add_filter( 'post_class', 'ras_dashen_post_classes' );

// template for single attachments
// add_filter( 'single_template', 'ras_dashen_use_post_formats_single_template' );
add_filter( 'template_include', 'ras_dashen_use_post_formats_single_template' );
function ras_dashen_use_post_formats_single_template( $template ) {

	// global $post;
    if ( is_single() && has_post_format() ) {

    	if ( has_post_format( array( 'gallery' ) ) ) {
    		
    		$post_format_template = locate_template( 'custom-single-gallery.php' );

	    	if ( $post_format_template ) {
	    		
	    		$template = $post_format_template;

	    	}

    	}
    }
 
    return $template;
}


/**
* This function will change time to a custom string
* @param (int) $time in seconds
* --Examples--
* echo ras_dashen_elapsed_time_to_nice_time(94672800);
*
* @since 1.0.0
*/
function ras_dashen_elapsed_time_to_nice_time( $time ) {

    // nice time units in seconds
    $one_minute = 60;
    $one_hour = 60 * 60; // 3600
    $one_day = 24 * 60 * 60; // 86400
    $one_week = 7 * 24 * 60 * 60; // 604800
    // $one_month = 30 * 24 * 60 * 60; // but different months have d/t num of days
    $one_year = 365 * 24 * 60 * 60; // 31557600

    $suffix_str = esc_html__( 'ago', 'ras-dashen' );
    $rounded_time = 0;
    $time_unit = '';

    // construct output, compare time
    if ( $time <= 5 * $one_minute ) {

        $nice_time = esc_html__( 'Now', 'ras-dashen' );

    } else {
        
        if ( ( $time > 5 * $one_minute ) && ( $time < $one_hour ) ) {

            $rounded_time = intdiv( $time, $one_minute );

            $time_unit = ( $rounded_time == 1 ) ? esc_html__( 'minute', 'ras-dashen' ) : esc_html__( 'minutes', 'ras-dashen' );

        } elseif ( ( $time >= $one_hour ) && ( $time < $one_day ) ) {

            $rounded_time = intdiv( $time, $one_hour );

            $time_unit = ( $rounded_time == 1 ) ? esc_html__( 'hour', 'ras-dashen' ) : esc_html__( 'hours', 'ras-dashen' );

        } elseif ( ( $time >= $one_day ) && ( $time < $one_week ) ) {

            $rounded_time = intdiv( $time, $one_day );

            $time_unit = ( $rounded_time == 1 ) ? esc_html__( 'day', 'ras-dashen' ) : esc_html__( 'days', 'ras-dashen' );

        } elseif ( ( $time >= $one_week ) && ( $time < $one_year ) ) {

            $rounded_time = intdiv( $time, $one_week );

            $time_unit = ( $rounded_time == 1 ) ? esc_html__( 'week', 'ras-dashen' ) : esc_html__( 'weeks', 'ras-dashen' );

        } elseif ( $time >= $one_year ) {

            $rounded_time = intdiv( $time, $one_year );

            $time_unit = ( $rounded_time == 1 ) ? esc_html__( 'year', 'ras-dashen' ) : esc_html__( 'years', 'ras-dashen' );

        }

        $nice_time = $rounded_time . '&nbsp;' . $time_unit . '&nbsp;' . $suffix_str;

    }

    return $nice_time;

}

/**
* function to change published time to a text of rounded elapsed time 
* after post published
* 
* @since 1.0.0
*/
function ras_dashen_posted_on_stringified() {

    /*
    * current Unix timestamp
    */
    $time_now = time();

    /*
    * published Unix timestamp
    */
    $publishedtimestamp = get_post_timestamp();

    // elapsed time
    $time_since_published = $time_now - $publishedtimestamp;

    // changing time to a custom string 
    $time_stringified = ras_dashen_elapsed_time_to_nice_time( $time_since_published );

    $nice_time_output = '<span class="posted-on mr-3">' . $time_stringified . '</span>';

    return $nice_time_output;
}


// pagination area
require get_template_directory() . '/inc/pagination.php';

/**
* custom commment area
*/
require get_template_directory() . '/inc/custom-comments.php';
