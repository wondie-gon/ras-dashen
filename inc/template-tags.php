<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Ras_Dashen
 *
 * @since 1.0.0
 */
// template tag to show post date
if ( ! function_exists( 'ras_dashen_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function ras_dashen_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'ras-dashen' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on mr-3">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

// template tag to display author name
if ( ! function_exists( 'ras_dashen_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function ras_dashen_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'ras-dashen' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

// template tag function to display post category badges
if ( ! function_exists( 'ras_dashen_post_category' ) ) {

	function ras_dashen_post_category() {

		// hiding category badge list for pages
		if ( 'post' !== get_post_type() ) {
			return;
		}

		// check post has category
		// if ( has_category() ) {}
			
		/* translators: used between list items, there is a space before and after the separator */
		$ras_dashen_cat_list = get_the_category_list( esc_html__( ' | ', 'ras-dashen' ) );

		if ( $ras_dashen_cat_list ) {

			/* translators: 1: list of categories. */
			echo sprintf( 
					'<span class="cat-links badge-rounded tax-badge"><i class="fa fa-list-alt mr-2"></i>%1$s</span>', 
					 sprintf( 
					 	esc_html__( '%s', 'ras-dashen' ), 
					 	$ras_dashen_cat_list 
					 )
				);// phpcs:ignore WordPress.Security.EscapeOutput
		}
	
	}

}

// template tag function to display post tag badges in columns
if ( ! function_exists( 'ras_dashen_post_tags' ) ) {

    function ras_dashen_post_tags() {

		// hiding tag badges list for pages
		if ( 'post' !== get_post_type() ) {
			return;
		}

		/* translators: used between list items, there is a space after the comma. */
		$ras_dashen_tags_list = get_the_tag_list( '', ' | ' );

		if ( $ras_dashen_tags_list ) {
			echo sprintf( 
					'<span class="tags-links badge-rounded tax-badge"><i class="fa fa-tag mr-2"></i>%1$s</span>',  
					 sprintf( 
					 	esc_html__( '%s', 'ras-dashen' ), 
					 	$ras_dashen_tags_list 
					 )
				);// phpcs:ignore WordPress.Security.EscapeOutput
		}
	}
}

// template tag to display post taxonomy lists
if ( ! function_exists( 'ras_dashen_get_post_taxonomies' ) ) {
	
	function ras_dashen_get_post_taxonomies() {

		// check post has taxonomies
		if ( has_category() || has_tag() ) {
			?>

			<div class="col-md-6 py-2"><?php echo ras_dashen_post_category(); ?></div>

			<div class="col-md-6 py-2"><?php echo ras_dashen_post_tags(); ?></div>

			<?php

		}

	}

}

// template tag function to display content footer of posts
if ( ! function_exists( 'ras_dashen_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function ras_dashen_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			
			$ras_dashen_cat_list = get_the_category_list( ' | ' );
			if ( $ras_dashen_cat_list ) {
				/* translators: 1: list of categories. */
				echo sprintf( 
						'<span class="cat-links badge-rounded tax-badge mr-4"><i class="fa fa-list-alt mr-2"></i>%1$s</span>', 
						 sprintf( 
						 	esc_html__( '%s', 'ras-dashen' ), 
						 	$ras_dashen_cat_list 
						 )
					);// WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$ras_dashen_tags_list = get_the_tag_list( '', esc_html_x( ' | ', 'list item separator', 'ras-dashen' ) );
			if ( $ras_dashen_tags_list ) {
				/* translators: 1: list of tags. */
				echo sprintf( 
					'<span class="tags-links badge-rounded tax-badge mr-4"><i class="fa fa-tag mr-2"></i>%1$s</span>',  
					 sprintf( 
					 	esc_html__( '%s', 'ras-dashen' ), 
					 	$ras_dashen_tags_list 
					 )
				);// WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link badge-rounded">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'ras-dashen' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'ras-dashen' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

/**
 * Display navigation to next/previous post when applicable.
 * For example on single post pages
 */

if ( ! function_exists ( 'ras_dashen_post_nav' ) ) {
	function ras_dashen_post_nav() {

		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
		<nav class="container navigation post-navigation">
			<h2 class="sr-only"><?php esc_html_e( 'Post navigation', 'ras-dashen' ); ?></h2>
			<div class="d-flex flex-column flex-md-row nav-links">
				<?php
				if ( get_previous_post_link() ) {
					previous_post_link( '<span class="nav-previous">%link</span>', _x( '&#10094;&nbsp;%title', 'Previous post link', 'ras-dashen' ) );
				}
				if ( get_next_post_link() ) {
					next_post_link( '<span class="nav-next">%link</span>', _x( '%title&nbsp;&#10095;', 'Next post link', 'ras-dashen' ) );
				}
				?>
			</div><!-- .nav-links -->
		</nav><!-- .navigation -->
		<?php
	}
}

// template tag to display post image
if ( ! function_exists( 'ras_dashen_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function ras_dashen_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		// classes for image
		$thumbnail_img_classes = array( 'img-fitBox rounded-65' );

		if ( is_single() ) :
            the_post_thumbnail( 
              'ras-dashen-featured-img-mid', 
              array(
                'class' =>  esc_attr( implode( ' ', $thumbnail_img_classes ) ),
                'alt'   =>  the_title_attribute( 
                  	array(
                    	'echo'  =>  false
                  	) 
                ),
              ) 
            );
        ?>

        <?php else : ?>

		<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
		<?php
			the_post_thumbnail(
				'ras-dashen-featured-img-min',
				array(
	                'class' =>  esc_attr( implode( ' ', $thumbnail_img_classes ) ),
	                'alt'   =>  the_title_attribute( 
	                  	array(
	                    	'echo'  =>  false
	                  	) 
	                ),
            	)
			);
		?>
		</a>

		<?php
		endif; 
	}
endif;

/**
* post thumbnail url
* 
* @param int $post_id post ID,
*		 $img_size definined image size
*/
if ( ! function_exists( 'ras_dashen_get_thumbnail_url' ) ) {

	function ras_dashen_get_thumbnail_url( $post_id, $img_size = 'thumbnail' ) {

		if ( has_post_thumbnail( $post_id ) ) {

			$rd_thumbnail_id = get_post_thumbnail_id( $post_id );

			$rd_thumbnail_attributes = wp_get_attachment_image_src( $rd_thumbnail_id, $img_size );

			$rd_thumbnail_url = $rd_thumbnail_attributes[0];
		}

		return $rd_thumbnail_url;

	}
}

/**
* Function for getting attachement, including featured image with img tag
*
* @param $num Number of attachments needed
*		 $img_size Size of image you want the img to have from one of the added image sizes
*/

function ras_dashen_get_attachment( $num = 1, $img_size = 'thumbnail' ) {

	$output = '';

    if ( has_post_thumbnail() && $num == 1 ) :

        $output = wp_get_attachment_image( get_post_thumbnail_id( get_the_ID() ), $img_size, array( "class" => "img-fitBox" ) );
        
    else:
        $ras_dashen_attachments = get_posts( array(
            'post_type'       	=>    'attachment',
            'numberposts'		=>    $num,
            'post_parent'     	=>    get_the_ID(),   
        ) );

        // if attachments exist
        if ( $ras_dashen_attachments && $num == 1 ) {
        	foreach ( $ras_dashen_attachments as $attachment ) {
        		$output = wp_get_attachment_image( $attachment->ID, $img_size, array( "class" => "img-fitBox" ) );
        	}
        } elseif ( $ras_dashen_attachments && $num > 1 ) {
        	
        	$output = $ras_dashen_attachments;
        	
        }

        wp_reset_postdata();

    endif;

    return $output;
}

/**
* Function for getting url of attachement, including featured image with img tag
*
* @param $num Number of attachments needed
*/

function ras_dashen_get_attachment_url( $num = 1 ) {

	$output = '';

    if ( has_post_thumbnail() && $num == 1 ) :

        $output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
        
    else:
        $ras_dashen_attachments = get_posts( array(
            'post_type'       	=>    'attachment',
            'numberposts'		=>    $num,
            'post_parent'     	=>    get_the_ID(),   
        ) );

        // if attachments exist
        if ( $ras_dashen_attachments && $num == 1 ) {
        	foreach ( $ras_dashen_attachments as $attachment ) {
        		$output = wp_get_attachment_url( $attachment->ID );
        	}
        } elseif ( $ras_dashen_attachments && ( $num > 1 || $num == -1 ) ) {
        	
        	$output = $ras_dashen_attachments;
        }

        wp_reset_postdata();

    endif;

    return $output;
}

/**
* get attachment caption
*/
function ras_dashen_get_attachment_caption( $attachment_id ) {

	$output = '';

	// $attachment_id = intval( $attachment_id );

	$post = get_post( $attachment_id );

	// $attachement_caption = $post->post_excerpt;

	if ( $post->post_excerpt ) {
		$output = sprintf( '<h4 class="wp-caption-text">%1$s</h4>', sprintf( esc_html__( '%s', 'ras-dashen' ), $post->post_excerpt ) );
	}
	
	return $output;

}

// template tag open body
if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

/**
 * display attachment
 *
 *
 * @param int $attachment_id Attachment ID.
 */
if ( ! function_exists( 'ras_dashen_display_an_attachment' ) ) {
	function ras_dashen_display_an_attachment( $attachment_id ) {

		$attachment_id = (int) $attachment_id;

		$post = get_post( $attachment_id );

		$img_atts = wp_get_attachment_image_src( $post->ID, 'ras-dashen-featured-img-mid' );
	 
	    if ( $img_atts ) {
    	?>
            <img src="<?php echo esc_url( $img_atts[0] ); ?>" width="<?php echo esc_attr( $img_atts[1] ); ?>" height="<?php echo esc_attr( $img_atts[2] ); ?>" class="img-fitBox" alt="<?php esc_attr( $post->post_excerpt ); ?>" />
        <?php
	    }
	}
}


/**
 * Show the first image associated with a post
 *
 * Echo first image (if available).
 * This can be used to display for first image of a gallery
 *
 * @param int $post_id Post ID.
 */
if ( ! function_exists( 'ras_dashen_display_first_of_multiple_images' ) ) {
	function ras_dashen_display_first_of_multiple_images( $post_id ) {
	    $args = array(
	    	'post_parent'    	=>	$post_id,
	    	'post_type'      	=>	'attachment',
	    	'post_mime_type' 	=>	'image',
	        'posts_per_page' 	=>	1,
	        'orderby'			=>	'date',
	        'order'          	=>	'ASC',
	    );
	 
	    $attachments = get_children( $args );
	 
	    if ( $attachments ) {
	        
	    	echo '<img src="' . wp_get_attachment_thumb_url( $attachments[0]->ID ) . '" class="img-fitBox" />';
	    }
	}
}


/* 
* Function to display embedded media
*/
function ras_dashen_display_embedded_media( $type = array() ) {

	if ( ! function_exists( 'get_media_embedded_in_content' ) ) { 
	    require_once ABSPATH . WPINC . '/media.php'; 
	}

    $ras_dashen_embeded = array();

    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );

    $ras_dashen_embeded = get_media_embedded_in_content( $content, $type );

    if ( in_array( 'audio', $type ) ) {

        $output = str_replace( '?visual=true', '?visual=false', $ras_dashen_embeded[0] );

    } else {

        $output = $ras_dashen_embeded[0];

    }

    return $output;

}

/* 
* Function to display embedded video
*/
if ( ! function_exists( 'ras_dashen_get_embedded_video' ) ) {
	function ras_dashen_get_embedded_video( $post_id ) {

		if ( ! function_exists( 'get_media_embedded_in_content' ) ) { 
		    require_once ABSPATH . WPINC . '/media.php'; 
		}

		$post = get_post( $post_id );
		$content = do_shortcode( apply_filters( 'the_content', $post->post_content ) );
     	$embedded_vids = get_media_embedded_in_content( $content );

     	// check if there is embedded vid
     	if ( ! empty( $embedded_vids ) ) {
     		foreach ( $embedded_vids as $embedded_vid ) {
     			if ( strpos( $embedded_vid, 'video' ) || strpos( $embedded_vid, 'youtube' ) || strpos( $embedded_vid, 'vimeo' ) ) {
     				return $embedded_vid;
     			}
     		}
     	} else {
     		return;
     	}

	}
}

/* 
* Function to display embedded audio
*/
if ( ! function_exists( 'ras_dashen_get_embedded_audio' ) ) {
	function ras_dashen_get_embedded_audio( $post_id ) {

		if ( ! function_exists( 'get_media_embedded_in_content' ) ) { 
		    require_once ABSPATH . WPINC . '/media.php'; 
		}

		$output = '';

		$post = get_post( $post_id );
		$content = do_shortcode( apply_filters( 'the_content', $post->post_content ) );
     	$audios = get_media_embedded_in_content( $content, array( 'audio', 'iframe' ) );

     	// check if there is embedded audio
     	if ( ! empty( $audios ) ) {
     		$output = str_replace( '?visual=true', '?visual=false', $audios[0] );
     	}

     	return $output;

	}
}

// url of an attachment
function ras_dashen_get_attachment_full_url( $attachment ) {
	/*
	$upload_dir = wp_upload_dir();
	$attachment_metadata = wp_get_attachment_metadata( $attachment_id );
	$attachment_url = var_dump( $upload_dir['url'] . '/' . $attachment_metadata['sizes']['medium_large']['file'] );
	*/
	$url = '';
	if( false != wp_get_attachment_url( $attachment->ID ) ) {
		$parsed = parse_url( wp_get_attachment_url( $attachment->ID ) );
		$url = dirname( $parsed [ 'path' ] ) . '/' . rawurlencode( basename( $parsed[ 'path' ] ) );
	}

	return $url;
}
