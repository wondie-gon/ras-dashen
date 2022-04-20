<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Ras_Dashen
 *
 * @since 1.0.0
 */

/*
* Checks static frontpage 
*/
function ras_dashen_static_frontpage() {
	return ( is_front_page() && ! is_home() );
}

/*
* Checks latest posts frontpage
*/
function ras_dashen_latest_posts_frontpage() {
	return ( is_front_page() && is_home() );
}

/*
* Checks to see if Static Front Page is set to "Posts page".
*/
function ras_dashen_is_blogs_home() {
	return ( is_home() && ! is_front_page() );
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ras_dashen_body_classes( $classes ) {
	// add frontpage class
	if ( ras_dashen_static_frontpage() || ras_dashen_latest_posts_frontpage() ) {
		$classes[] = 'ui-frontpage';
	}
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'ras_dashen_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function ras_dashen_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'ras_dashen_pingback_header' );

// document <title> separator
function ras_dashen_document_title_separator( $sep ) {
	
	// Change separator for singular blog post
	if( is_singular( 'post' ) ) {
		$sep = '|';
	}
	
	return $sep;
	
}
add_filter( 'document_title_separator', 'ras_dashen_document_title_separator', 10, 1 );

// set custom excerpt length
function ras_dashen_custom_excerpt_length( $number ) {

	if ( has_post_thumbnail() && ( has_post_format( 'image' ) || has_post_format( 'gallery' ) ) ) {
		return 20;
	} else if ( ( has_post_thumbnail() && ! has_post_format( 'aside' ) ) || has_post_format( 'link' ) || has_post_format( 'video' ) ) {
		return 25;
	} else if ( has_post_format( 'aside' ) ) {
		return 30;
	} else {
		return 25;
	}
	
}
add_filter( 'excerpt_length', 'ras_dashen_custom_excerpt_length', 999 );

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function ras_dashen_excerpt_more( $more ) {
    return '';
}
add_filter( 'excerpt_more', 'ras_dashen_excerpt_more' );

/**
* PURPOSE: gets the post type from the global $wp_query object
* @params ''
* @return String|Boolean  The archive post type name or false if not in an archive page.
*
* NOTE: if query was in archive page, the following could be used
*       is_archive() ? get_queried_object()->name : false;
*/
if ( ! function_exists( 'ras_dashen_get_the_queried_post_type' ) ) {
  function ras_dashen_get_the_queried_post_type() {

    $post_type = false;

    global $wp_query;

    if ( isset( $wp_query->query['post_type'] ) ) {
      $post_type = $wp_query->query['post_type'];
    }

    return $post_type;
  }
}

// conditional login redirect
function ras_dashen_user_login_redirect( $redirect_to, $requested_redirect_to, $user ) {
	
	if ( isset( $user->roles ) && is_array( $user->roles ) ) {
	
		if ( in_array( 'subscriber', $user->roles ) ) {
	
			// subscriber role redirected to homepage
			return home_url();
	
		} else {
	
			// other roles redirected to the original destination URL
			return $redirect_to;
	
		}
	
	}
	
	return $redirect_to;
	
}
add_filter( 'login_redirect', 'ras_dashen_user_login_redirect', 10, 3 );

// remove admin menus for low privilage users
function ras_dashen_hide_admin_menus( $context ) {
	
	// Hide from users with low privilege 
	if ( ! current_user_can( 'manage_options' ) ) {
	
		// Core Menus
		remove_menu_page( 'index.php' );               //Dashboard
		remove_menu_page( 'edit.php' );                //Posts
		remove_menu_page( 'upload.php' );              //Media
		remove_menu_page( 'edit.php?post_type=page' ); //Pages
		remove_menu_page( 'edit-comments.php' );       //Comments
		remove_menu_page( 'themes.php' );              //Appearance
		remove_menu_page( 'plugins.php' );             //Plugins
		remove_menu_page( 'users.php' );               //Users
		remove_menu_page( 'tools.php' );               //Tools
		remove_menu_page( 'options-general.php' );     //Settings
	
		// Plugins
		remove_menu_page( 'jetpack' );                 //Jetpack
	
	}
	
}
add_action( 'admin_menu', 'ras_dashen_hide_admin_menus', 10, 1 );

/**
* Add custom excerpt to pages
*/
 
function ras_dashen_add_page_excerpt() {
    add_post_type_support( 'page', array( 'excerpt' ) );
}
add_action( 'init', 'ras_dashen_add_page_excerpt' );

/**
 * Add Open Graph Meta Tags
 */

function ras_dashen_meta_og() {
    global $post;

    if ( is_single() ) {

    	// url of 1 attachment such as image
        $atchmnt_url = ras_dashen_get_attachment_url( 1 ); 

        $excerpt = strip_tags( $post->post_content );
        $excerpt_more = '';
        if ( strlen($excerpt ) > 155) {
            $excerpt = substr( $excerpt,0,155 );
            $excerpt_more = ' ...';
        }
        $excerpt = str_replace( '"', '', $excerpt );
        $excerpt = str_replace( "'", '', $excerpt );
        $excerptwords = preg_split( '/[\n\r\t ]+/', $excerpt, -1, PREG_SPLIT_NO_EMPTY );
        array_pop( $excerptwords );
        $excerpt = implode( ' ', $excerptwords ) . $excerpt_more;

        // translate ready excerpt
        $excerpt_ready = sprintf( esc_html__( '%s', 'ras-dashen' ), $excerpt );

        // translate ready title
        $title_ready = sprintf( esc_html__( '%s', 'ras-dashen' ), get_the_title() );

        // translate ready site name
        $site_name_ready = sprintf( esc_html__( '%s', 'ras-dashen' ), get_bloginfo( 'name' ) );
        ?>
<meta name="author" content="<?php esc_html( get_the_author() ); ?>">
<meta name="description" content="<?php echo $excerpt_ready; ?>">
<meta property="og:title" content="<?php echo $title_ready; ?>">
<meta property="og:description" content="<?php echo $excerpt_ready; ?>">
<meta property="og:type" content="article">
<meta property="og:url" content="<?php echo get_permalink(); ?>">
<meta property="og:site_name" content="<?php echo $site_name_ready; ?>">
<meta property="og:image" content="<?php echo esc_url( $atchmnt_url ); ?>">
<meta name="twitter:card" content="summary" />
<meta name="twitter:description" content="<?php echo $excerpt_ready; ?>" />
<meta name="twitter:title" content="<?php echo $title_ready; ?>" />
<meta name="twitter:site" content="<?php echo $site_name_ready; ?>" />
<meta name="twitter:image" content="<?php echo esc_url( $atchmnt_url ); ?>" />
<?php
    } else {
        return;
    }
}
add_action( 'wp_head', 'ras_dashen_meta_og', 5 );

/**
* Exclude some custom post types from search
*/

function ras_dashen_exclude_custom_post_from_search( $query ) {
	if ( $query->is_search ) {

	    $query->set( 'post_type', 'post' );

	}
    return $query;
}
add_filter( 'pre_get_posts','ras_dashen_exclude_custom_post_from_search' );

/**
* To get rid of the “Category:”, “Tag:”, “Author:”, “Archives:” 
* and “Other taxonomy name:” in the archive title
*/
if ( ! function_exists( 'ras_dashen_modified_archive_title' ) ) {
	function ras_dashen_modified_archive_title( $title ) {
	    if ( is_category() ) {
	        $title = single_cat_title( '', false );
	    } elseif ( is_tag() ) {
	        $title = single_tag_title( '', false );
	    } elseif ( is_author() ) {
	        $title = '<span class="vcard">' . get_the_author() . '</span>';
	    } elseif ( is_post_type_archive() ) {
	        $title = post_type_archive_title( '', false );
	    } elseif ( is_tax() ) {
	        $title = single_term_title( '', false );
	    }
	  
	    return $title;
	}
}
add_filter( 'get_the_archive_title', 'ras_dashen_modified_archive_title' );

/**
 * Sanitize custom meta box checkbox.
 *
 *
 * @param string $checked Whether the checkbox is checked.
 * @return string Whether the checkbox is checked.
 */
if ( ! function_exists( 'ras_dashen_sanitize_meta_checkbox' ) ) :

	function ras_dashen_sanitize_meta_checkbox( $checked ) {

		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

endif;

/**
* Validate and sanitize date input
*/
if ( ! function_exists( 'ras_dashen_sanitize_validate_date' ) ) :

	function ras_dashen_sanitize_validate_date( $date, $format = 'm-d-Y' ) {

		$date = sanitize_text_field( $date );

		$d = DateTime::createFromFormat( $format, $date );

		if ( $d && $d->format( $format ) ) {

			// $new_format = 'F j, Y';

			// $date = DateTime::createFromFormat( $new_format, $date );

			// $date = date( 'F j, Y', strtotime( $date ) );
			$date = wp_date( 'F j, Y', strtotime( $date ) );

		}
		return $date;
	}

endif;
