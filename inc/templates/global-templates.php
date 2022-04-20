<?php
/**
 * different global templates action-hook functions
 *
 * Including 
 * -> related posts
 * -> Manager's message
 * 
 * @package Ras_Dashen
 */

/**
* template function to display "General Manager's message"
*/
if ( ! function_exists( 'ras_dashen_general_director_message_action' ) ) {
	
	function ras_dashen_general_director_message_action() {

		// img class list
		$director_img_class = array( 'img-fitBox rounded-diagonal img-shadow' );

		// link btn text
    	$msg_link_txt = __( 'Read All ', 'ras-dashen' );
		
		// args for manager message
		$msg_args = array(
			'post_type'			=>	'post',
			'posts_per_page'	=>	1,
			'meta_query'		=>	array(
					array(
						'key'		=>	'_rd_posts_about_title_value_key',
						'value'		=>	'director-message',
						'compare'	=>	'='
					)
				)
	      );

	    $gen_director_msg = new WP_Query( $msg_args );

	    if ( $gen_director_msg->have_posts() ) : 
			while ( $gen_director_msg->have_posts() ) : $gen_director_msg->the_post();

				// get permalink
				$dir_msg_link = esc_url( get_permalink() );

    			if ( has_post_thumbnail() ) {
    				
    				// get img
					$director_img = get_the_post_thumbnail( get_the_ID(), 
						'ras-dashen-featured-img-min', 
						array( 
							'alt'	=> the_title_attribute( array( 'echo' => 0 ) ),
							'class' => esc_attr( implode( ' ', $director_img_class ) ) 
						) 
					);

    			} else {
    				// no post thumbnail
					$company_logo = get_template_directory_uri() . '/assets/images/logo.png';

					// display stored img
					$director_img = sprintf( 
					  '<img src="%1$s" alt="%2$s" class="%3$s" />', 
					  esc_url( $company_logo ), 
					  __( 'Company brand and logo', 'ras-dashen' ), 
					  esc_attr( implode( ' ', $director_img_class ) ) 
					);
    			}
		?>

				<div id="post-<?php the_ID(); ?>" <?php post_class( 'd-flex flex-column flex-md-row dir-message' ); ?>>

					<div class="col-md-5 col-8">
			            <a href="<?php echo $dir_msg_link; ?>">
		            		<?php  
		            			// display img
		            			echo $director_img;
		          			
		            		?>
						</a>
		            </div><!-- .col-md-5.img-column -->

					<div class="col-md-6 p-4">
						<?php
						// get title
				        echo sprintf( 
		                  '<h1 class="abt-title"><a href="%1$s">%2$s</a></h1>', 
		                   $dir_msg_link, 
		                   sprintf( __( '%s', 'ras-dashen' ), 
		                    esc_html( get_the_title() )
		                    )
		                  );
					    
				        // get excerpt
		              	$director_msg_excerpt = get_the_excerpt(); ?>
			            <p><?php echo sprintf( __( '%s', 'ras-dashen' ), $director_msg_excerpt ); ?></p>

			            <a class="btn-main-dark" href="<?php echo $dir_msg_link; ?>"><?php echo $msg_link_txt; ?><i class="fa fa-arrow-right"></i></a>

					</div><!-- .col-md-6.text-column -->
					
				</div>
		<?php
			endwhile; wp_reset_postdata();
				
	    endif;  //End gen_director_msg
	}

}
add_action( 'ras_dashen_general_director_message', 'ras_dashen_general_director_message_action', 10 );


/**
* Function hook for dislaying related posts
*/
if ( ! function_exists( 'ras_dashen_related_posts_below_single_post_action' ) ) :

  function ras_dashen_related_posts_below_single_post_action() {

    global $post;

    // get category name
    $cat_name  = wp_get_object_terms( $post->ID, 'category', array( 'fields' =>  'ids' ) );

    // get the tag
    $tag_name  = wp_get_object_terms( $post->ID, 'post_tag', array( 'fields' =>  'ids' ) );

    $args = array(
            'post_type'         =>  'post',
            'posts_per_page'    =>  3,
            'post_status'       =>  'publish',
            'orderby'           =>  'rand',
            'post__not_in'      =>  array( $post->ID ),
            'tax_query'         =>  array(
            	'relation'	=>	'OR', 
            	array(
            		'relation' =>   'AND', 
	                array(
	                    'taxonomy'  =>  'post_tag',
	                    'field'     =>  'id',
	                    'terms'     =>  $tag_name
	                    ),
	                array(
			            'taxonomy' 	=> 'post_format',
			            'field' 	=> 'slug',
			            'terms' => array( 'post-format-aside', 'post-format-gallery', 'post-format-link', 'post-format-image', 'post-format-quote', 'post-format-status', 'post-format-audio', 'post-format-chat', 'post-format-video' ),
			            'operator' => 'NOT IN'
		           	),
            	),
            	array(
            		'relation' =>   'AND', 
	                array(
	                    'taxonomy'  =>  'category',
	                    'field'     =>  'id',
	                    'terms'     =>  $cat_name
	                    ),
	                array(
			            'taxonomy' 	=> 'post_format',
			            'field' 	=> 'slug',
			            'terms' => array( 'post-format-aside', 'post-format-gallery', 'post-format-link', 'post-format-image', 'post-format-quote', 'post-format-status', 'post-format-audio', 'post-format-chat', 'post-format-video' ),
			            'operator' => 'NOT IN'
		           	),
            	),

            ),
        );

    $ras_dashen_related_psts = new WP_Query( $args );
    
    if ( $ras_dashen_related_psts->have_posts() ) {
      ?>
	  	<div class="row py-3">
	        <div class="col-12">
	          <h1 class="related-title"><?php _e( 'Related Posts', 'ras-dashen' ); ?></h1>
	        </div>
	    </div>
		<div class="row">
	    <?php
			while ( $ras_dashen_related_psts->have_posts() ) : $ras_dashen_related_psts->the_post();
			?>

			<div id="related-<?php the_ID(); ?>" <?php post_class( 'col-sm-6 col-md-4 my-5' ); ?>>
				<?php
				// display image
                if ( has_post_thumbnail() ) { ?>
                	<div class="img-holder w-100">
	                <?php

	                  	$img_class = array( 'img-fitBox' );

	                  	the_post_thumbnail( 
		                    'ras-dashen-featured-img-min', 
		                    array(
		                      'class' =>  esc_attr( implode( ' ', $img_class ) ),
		                      'alt'   =>  the_title_attribute( 
		                        array(
		                          'echo'  =>  false
		                        ) 
		                      ),
		                    ) 
	                  	); 
            		?> 
            		</div><!-- .img-holder -->
           		<?php } ?>
				<?php
					// get title
			        echo sprintf( 
	                  '<h4><b><a href="%1$s">%2$s</a></b></h4>', 
	                   esc_url( get_permalink() ), 
	                   sprintf( __( '%s', 'ras-dashen' ), 
	                    esc_html( get_the_title() )
	                    )
	                  );
			    
		        // get excerpt
              	$related_post_excerpt = get_the_excerpt(); ?>
	            <p><?php echo sprintf( __( '%s', 'ras-dashen' ), $related_post_excerpt ); ?></p>

	            <a class="btn-main-dark my-2" href="<?php the_permalink(); ?>"><?php _e( 'Learn More', 'ras-dashen' ); ?>
					<i class="fa fa-arrow-right"></i>
				</a>

			</div>
			<?php
			endwhile;
			wp_reset_postdata();
		?>
		</div><!-- .row -->
      <?php
        
    }

  }
endif;
add_action( 'ras_dashen_related_posts_below_single_post', 'ras_dashen_related_posts_below_single_post_action', 10 );

/*
*   Adding related posts under single post
*/
if ( !function_exists( 'ras_dashen_show_related_posts_action' ) ) :

    function ras_dashen_show_related_posts_action( $post_id ) {
        /**
        * Hook - ras_dashen_related_posts_below_single_post.
        *
        * @hooked ras_dashen_related_posts_below_single_post_action - 10
        */  
        do_action( 'ras_dashen_related_posts_below_single_post' );
            
    }

endif;
add_action( 'ras_dashen_show_related_posts', 'ras_dashen_show_related_posts_action', 10, 1 );

//----------------------------------------------------------------------------------------------

/**
* Function hook for dislaying related video posts
*/
if ( ! function_exists( 'ras_dashen_related_video_posts_action' ) ) :

  function ras_dashen_related_video_posts_action() {

    global $post;

    // get category name
    $cat_name  = wp_get_object_terms( $post->ID, 'category', array( 'fields' =>  'ids' ) );

    // get the tag
    $tag_name  = wp_get_object_terms( $post->ID, 'post_tag', array( 'fields' =>  'ids' ) );

    $args = array(
            'post_type'         =>  'post',
            'posts_per_page'    =>  3,
            'post_status'       =>  'publish',
            'orderby'           =>  'date',
            'order'           	=>  'DESC',
            'post__not_in'      =>  array( $post->ID ),
            'tax_query'         =>  array(
            	'relation'	=>	'OR', 
            	array(
            		'relation' =>   'AND', 
	                array(
	                    'taxonomy'  =>  'post_tag',
	                    'field'     =>  'id',
	                    'terms'     =>  $tag_name
	                    ),
	                array(
			            'taxonomy' 	=> 'post_format',
			            'field' 	=> 'slug',
			            'terms' => array( 'post-format-video' )
		           	),
            	),
            	array(
            		'relation' =>   'AND', 
	                array(
	                    'taxonomy'  =>  'category',
	                    'field'     =>  'id',
	                    'terms'     =>  $cat_name
	                    ),
	                array(
			            'taxonomy' 	=> 'post_format',
			            'field' 	=> 'slug',
			            'terms' => array( 'post-format-video' )
		           	),
            	),

            ),
        );

    $ras_dashen_related_vid_psts = new WP_Query( $args );
    
    if ( $ras_dashen_related_vid_psts->have_posts() ) {
      ?>
	  	<div class="row py-3">
	        <div class="col-12">
	          <h1 class="related-title"><?php _e( 'Related Videos', 'ras-dashen' ); ?></h1>
	        </div>
	    </div>
		<div class="row">
	    <?php
			while ( $ras_dashen_related_vid_psts->have_posts() ) : $ras_dashen_related_vid_psts->the_post();
			?>

			<div id="related-<?php the_ID(); ?>" <?php post_class( 'col-sm-6 col-md-4 my-5' ); ?>>
				
            	<div class="w-100">
	                <a class="media-holder video-link" href="<?php the_permalink(); ?>">
				        <?php echo ras_dashen_get_embedded_video( get_the_ID() ); ?>
			        </a> 
        		</div><!-- .img-holder -->
           		
				<?php
					// get title
			        echo sprintf( 
	                  '<h4><b><a href="%1$s">%2$s</a></b></h4>', 
	                   esc_url( get_permalink() ), 
	                   sprintf( __( '%s', 'ras-dashen' ), 
	                    esc_html( get_the_title() )
	                    )
	                  );
			    
		        ?>

			</div>
			<?php
			endwhile;
			wp_reset_postdata();
		?>
		</div><!-- .row -->
      <?php
        
    }

  }
endif;
add_action( 'ras_dashen_related_video_posts', 'ras_dashen_related_video_posts_action', 10 );

/*
*   Adding related video posts under single post
*/
if ( !function_exists( 'ras_dashen_show_related_video_posts_action' ) ) :

    function ras_dashen_show_related_video_posts_action( $post_id ) {
        /**
        * Hook - ras_dashen_related_video_posts.
        *
        * @hooked ras_dashen_related_video_posts_action - 10
        */  
        do_action( 'ras_dashen_related_video_posts' );
            
    }

endif;
add_action( 'ras_dashen_show_related_video_posts', 'ras_dashen_show_related_video_posts_action', 10, 1 );


