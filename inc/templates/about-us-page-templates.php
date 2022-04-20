<?php
/**
 * about-us page different section templates action-hook functions
 *
 * Note: It is important to name the 'About us' page permalink as 'about-us.php' when page is created
 * 
 * @package Ras_Dashen
 */

// function hook to display mission, vision, values etc
if ( ! function_exists( 'ras_dashen_mission_vision_value_action' ) ) {
	
	function ras_dashen_mission_vision_value_action() {

		global $post;
		
		// args for about company posts
		$aboutus_args = array(
			'post_type'			=>	'post',
			'posts_per_page'	=>	3,
			'orderby'			=>	'date',
			'order'				=>	'ASC',
			'meta_query'		=>	array(
				'relation'		=>	'AND',
					array(
							'key'		=>	'_rd_posts_on_page_value_key',
							'value'	=>	'about-us',
							'compare'	=>	'='
						),
					array(
                        'relation' => 'OR',
                        array(
                                'key' => '_rd_posts_about_title_value_key',
                                'value' => 'mission',
                                'compare' => '=',
                        ),
                        array(
                                'key' => '_rd_posts_about_title_value_key',
                                'value' => 'vision',
                                'compare' => '=',
                        ),
                        array(
                                'key' => '_rd_posts_about_title_value_key',
                                'value' => 'values',
                                'compare' => '=',
                        ),
        			),
				),
	      );

	    $ras_dashen_about_us = new WP_Query( $aboutus_args );

	    if ( $ras_dashen_about_us->have_posts() ) : ?>
	    	<article class="ui-visionmissionvalue py-3 text-center text-white">
	    		<div class="container-fluid inner-container">
	    			<div class="row inner-row">
					    <?php

							while ( $ras_dashen_about_us->have_posts() ) : $ras_dashen_about_us->the_post();

							// column classes based on posts
							$abt_post_title_meta = get_post_meta( $post->ID, '_rd_posts_about_title_value_key', true );

							switch ( $abt_post_title_meta ) {

								case 'mission':
									
									$content_col_class = array('col-md-5 p-4 about-mission');

									break;

								case 'vision':

									$content_col_class = array('offset-md-2 col-md-5 p-4 about-vision');
									
									break;

								case 'values':

									$content_col_class = array('col-md-7 mx-auto p-4');
									
									break;
								
							}

						?>

							<div class="<?php echo esc_attr( implode( ' ', $content_col_class ) ); ?>">

								<?php
									// get title
							        echo sprintf( 
							          '<h1 class="abt-title mb-4">%1$s</h1>', 
							           sprintf( __( '%s', 'ras-dashen' ), 
							            esc_html( get_the_title() )
							            )
							          );
							    
							        // display content
					              	the_content( sprintf(
										wp_kses(
											/* translators: %s: Name of current post. Only visible to screen readers */
											__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ras-dashen' ),
											array(
												'span' => array(
													'class' => array(),
												),
											)
										),
										get_the_title()
									) ); 
					            ?>

							</div>
						<?php

							endwhile;

							wp_reset_postdata();
						?>
					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</article><!-- .ui-visionmissionvalue -->
		<?php 
			
	    endif;  //End ras_dashen_about_us

	}

}
add_action( 'ras_dashen_mission_vision_value', 'ras_dashen_mission_vision_value_action', 10 );


/**
* template function to display "what we do" on about us page
*/
if ( ! function_exists( 'ras_dashen_about_what_we_do_action' ) ) {
	
	function ras_dashen_about_what_we_do_action() {

		global $post;
		
		// args for what we do posts
		$what_we_do_args = array(
			'post_type'			=>	'post',
			'posts_per_page'	=>	-1,
			'orderby'			=>	'date',
			'order'				=>	'ASC',
			'meta_query'		=>	array(
				'relation'		=>	'AND',
					array(
							'key'		=>	'_rd_posts_on_page_value_key',
							'value'		=>	'about-us',
							'compare'	=>	'='
						),
					array(
							'key'		=>	'_rd_posts_about_title_value_key',
							'value'		=>	'what we do',
							'compare'	=>	'='
						)
				)
	      );

	    $about_what_we_do = new WP_Query( $what_we_do_args );

	    if ( $about_what_we_do->have_posts() ) : ?>
	    	<div class="ui-whatwedo py-3 text-center">
	    		<div class="container-fluid">
	    			<div class="row">
			            <div class="col-12 text-center">
			              <h1 class="abt-title"><?php _e( 'What we do', 'ras-dashen' ); ?></h1>
			            </div>
			        </div>
			        <div class="row justify-content-center">
				    <?php
						while ( $about_what_we_do->have_posts() ) : $about_what_we_do->the_post();
						?>

						<div id="whatwedo-<?php the_ID(); ?>" <?php post_class( 'col-sm-6 col-md-3 my-5' ); ?>>
							<?php
							// display image
			                if ( has_post_thumbnail() ) { ?>
			                	<div class="hexagon-bordered">
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
		                </div><!-- .hexagon-bordered -->
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
			              	$what_we_do_excerpt = get_the_excerpt(); ?>
				            <p><?php echo sprintf( __( '%s', 'ras-dashen' ), $what_we_do_excerpt ); ?></p>

				            <a class="btn-main-dark my-2" href="<?php the_permalink(); ?>"><?php _e( 'Learn More', 'ras-dashen' ); ?>
								<i class="fa fa-arrow-right"></i>
							</a>

						</div>
						<?php
						endwhile;
						wp_reset_postdata();
					?>
					</div><!-- .row -->
				</div><!-- .container-fluid -->
			</div><!-- .ui-whatwedo -->
		<?php 
	    endif;  //End about_what_we_do
	}

}
add_action( 'ras_dashen_about_what_we_do', 'ras_dashen_about_what_we_do_action', 10 );

/**
* template function to display "who we are" on about us page
*/
if ( ! function_exists( 'ras_dashen_about_who_we_are_action' ) ) {
	
	function ras_dashen_about_who_we_are_action() {

		global $post;

		// img class list
		$comp_img_class = array( 'img-fitBox rounded-diagonal img-shadow' );
		
		// args for who we are posts
		$who_we_are_args = array(
			'post_type'			=>	'post',
			'posts_per_page'	=>	1,
			'meta_query'		=>	array(
				'relation'		=>	'AND',
					array(
							'key'		=>	'_rd_posts_on_page_value_key',
							'value'		=>	'about-us',
							'compare'	=>	'='
						),
					array(
							'key'		=>	'_rd_posts_about_title_value_key',
							'value'		=>	'who we are',
							'compare'	=>	'='
						)
				)
	      );

	    $about_who_we_are = new WP_Query( $who_we_are_args );

	    if ( $about_who_we_are->have_posts() ) : ?>
	    	<div class="ui-who_we_are py-5">
	    		<div class="container-fluid">
			    <?php
					while ( $about_who_we_are->have_posts() ) : $about_who_we_are->the_post();

						// get permalink
						$pst_link = esc_url( get_permalink() );

            			if ( has_post_thumbnail() ) {
            				
            				// get img
            				/*
							$company_img = wp_get_attachment_image( 
							    get_post_thumbnail_id( get_the_ID() ), 
							    'ras-dashen-featured-img-min', 
							    array( 
							      'class' => array( 'img-fitBox rounded-65' ),
							      'alt'   =>  the_title_attribute( 
							          array(
							            'echo'  =>  false
							          ) 
							        )
							    ) 
							);
							*/
							$company_img = get_the_post_thumbnail( get_the_ID(), 
								'ras-dashen-featured-img-min', 
								array( 
									'alt'	=> the_title_attribute( array( 'echo' => 0 ) ),
									'class' => esc_attr( implode( ' ', $comp_img_class ) ) 
								) 
							);

            			} else {
            				// no post thumbnail
							$company_logo = get_template_directory_uri() . '/assets/images/logo.png';

							// display stored img
							$company_img = sprintf( 
							  '<img src="%1$s" alt="%2$s" class="%3$s" />', 
							  esc_url( $company_logo ), 
							  __( 'Company brand and logo', 'ras-dashen' ), 
							  esc_attr( implode( ' ', $comp_img_class ) ) 
							);
            			}
          			
            		?>

						<div id="whoweare-<?php the_ID(); ?>" <?php post_class( 'row py-2' ); ?>>
							<div class="col-md-6 p-4 d-flex justify-content-center flex-column text-column">
								<?php
								// get title
						        echo sprintf( 
				                  '<h1 class="abt-title"><a href="%1$s">%2$s</a></h1>', 
				                   $pst_link, 
				                   sprintf( __( '%s', 'ras-dashen' ), 
				                    esc_html( get_the_title() )
				                    )
				                  );
							    
						        // get excerpt
				              	$who_we_are_excerpt = get_the_excerpt(); ?>
					            <p><?php echo sprintf( __( '%s', 'ras-dashen' ), $who_we_are_excerpt ); ?></p>

					            <?php  
					            	
					            	/*
					            	* Organization history
									* Hook - ras_dashen_company_history
									*
									* @hooked ras_dashen_company_history_action - 10
									*/
					            	do_action( 'ras_dashen_company_history' );

					            	/*
					            	* Organization legal establishment
									* Hook - ras_dashen_company_establishment
									*
									* @hooked ras_dashen_company_establishment_action - 10
									*/
					            	do_action( 'ras_dashen_company_establishment' );
					            ?>

							</div><!-- .col-md-6.text-column -->

							<div class="col-md-5 col-8 mx-auto d-flex justify-content-center flex-column img-column"> 
					            <a href="<?php echo $pst_link; ?>">
				            		<?php  
				            			// display img
				            			echo $company_img;
				          			
				            		?>
								</a>
				            </div><!-- .col-md-5.img-column -->
						</div>
					<?php
					endwhile; wp_reset_postdata();
				?>
				</div><!-- .container-fluid -->
			</div><!-- .ui-who_we_are -->
		<?php 
	    endif;  //End about_who_we_are
	}

}
add_action( 'ras_dashen_about_who_we_are', 'ras_dashen_about_who_we_are_action', 10 );


/**
* template function to display company history snap on "who we are" section
*/
if ( ! function_exists( 'ras_dashen_company_history_action' ) ) {
	
	function ras_dashen_company_history_action() {

		global $post;

		// class of images
		$rounded_img_class = array( 'img-fluid d-block border-circle img-shadow' );
		
		// args for history post
		$history_args = array(
			'post_type'			=>	'post',
			'posts_per_page'	=>	1,
			'meta_query'		=>	array(
				'relation'		=>	'AND',
					array(
							'key'		=>	'_rd_posts_on_page_value_key',
							'value'		=>	'about-us',
							'compare'	=>	'='
						),
					array(
							'key'		=>	'_rd_posts_about_title_value_key',
							'value'		=>	'history',
							'compare'	=>	'='
						)
				)
	      );

	    $about_history = new WP_Query( $history_args );

	    if ( $about_history->have_posts() ) : 

			while ( $about_history->have_posts() ) : $about_history->the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class( 'row my-2' ); ?>>
					
		            <div class="col-3">
		            	<a href="<?php the_permalink(); ?>">
		            		<?php  
		            			if ( has_post_thumbnail() ) {
		            				
		            				// get img
									$history_img = get_the_post_thumbnail( get_the_ID(), 
										'ras-dashen-img-tiny', 
										array( 
											'alt'	=> the_title_attribute( array( 'echo' => 0 ) ),
											'class' => esc_attr( implode( ' ', $rounded_img_class ) ) 
										) 
									);


		            			} else {
		            				// no post thumbnail
									$stored_img = get_template_directory_uri() . '/assets/images/logo.png';

									// display stored img
									$history_img = sprintf( 
									  '<img src="%1$s" alt="%2$s" class="%3$s" />', 
									  esc_url( $stored_img ), 
									  __( 'Company logo', 'ras-dashen' ), 
									  esc_attr( implode( ' ', $rounded_img_class ) ) 
									);
		            			}

		            			// display img
		            			echo $history_img;
		          			
		            		?>
						</a>
		            </div>

		            <?php  
		            	// get excerpt
		              	$history_excerpt = get_the_excerpt();
		            ?>
		            <div class="col-8 d-flex align-items-center">
		              <p><?php echo sprintf( __( '%s', 'ras-dashen' ), $history_excerpt ); ?></p>
		            </div>

	          	</div>
          	<?php endwhile; wp_reset_postdata(); ?>
		<?php 
	    endif;  //End about_who_we_are
	}

}
add_action( 'ras_dashen_company_history', 'ras_dashen_company_history_action', 10 );


/**
* template function to display company establishment snap on "who we are" section
*/
if ( ! function_exists( 'ras_dashen_company_establishment_action' ) ) {
	
	function ras_dashen_company_establishment_action() {

		global $post;

		// class of image
		$rounded_img_class = array( 'img-fluid d-block border-circle img-shadow' );
		
		// args for establishment post
		$establishment_args = array(
			'post_type'			=>	'post',
			'posts_per_page'	=>	1,
			'meta_query'		=>	array(
				'relation'		=>	'AND',
					array(
							'key'		=>	'_rd_posts_on_page_value_key',
							'value'		=>	'about-us',
							'compare'	=>	'='
						),
					array(
							'key'		=>	'_rd_posts_about_title_value_key',
							'value'		=>	'establishment',
							'compare'	=>	'='
						)
				)
	      );

	    $about_establishment = new WP_Query( $establishment_args );

	    if ( $about_establishment->have_posts() ) :

			while ( $about_establishment->have_posts() ) : $about_establishment->the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class( 'row my-2' ); ?>>
					
		            <div class="col-3 order-1 order-md-2">
		            	<a href="<?php the_permalink(); ?>">
		            		<?php  
		            			if ( has_post_thumbnail() ) {
		            				
		            				// get img
									$establishment_img = get_the_post_thumbnail( get_the_ID(), 
										'ras-dashen-img-tiny', 
										array( 
											'alt'	=> the_title_attribute( array( 'echo' => 0 ) ),
											'class' => esc_attr( implode( ' ', $rounded_img_class ) ) 
										) 
									);


		            			} else {
		            				// no post thumbnail
									$stored_img = get_template_directory_uri() . '/assets/images/logo.png';

									// display stored img
									$establishment_img = sprintf( 
									  '<img src="%1$s" alt="%2$s" class="%3$s" />', 
									  esc_url( $stored_img ), 
									  __( 'Establishment of Company image logo', 'ras-dashen' ), 
									  esc_attr( implode( ' ', $rounded_img_class ) ) 
									);
		            			}

		            			// display img
		            			echo $establishment_img;
		          			
		            		?>
						</a>
		            </div>

		            <?php  
		            	// get excerpt
		              	$establishment_excerpt = get_the_excerpt();
		            ?>
		            <div class="col-8 d-flex align-items-center order-2 order-md-1">
		              <p><?php echo sprintf( __( '%s', 'ras-dashen' ), $establishment_excerpt ); ?></p>
		            </div>

	          	</div>
          	<?php endwhile; wp_reset_postdata(); ?>
		<?php 
	    endif;  //End about_who_we_are
	}

}
add_action( 'ras_dashen_company_establishment', 'ras_dashen_company_establishment_action', 10 );


/**
* template function to display "General Manager's message" on about page
*/
if ( ! function_exists( 'ras_dashen_director_message_on_about_page_action' ) ) {
	
	function ras_dashen_director_message_on_about_page_action() {

		?>
    	<div class="ui-director_msg">
    		<div class="container-fluid">
		    <?php  
		    	/*
            	* General director message
				* Hook - ras_dashen_general_director_message
				*
				* @hooked ras_dashen_general_director_message_action - 10
				*/
            	do_action( 'ras_dashen_general_director_message' );
		    ?>
			</div><!-- .container-fluid -->
		</div><!-- .ui-director_msg -->
		<?php 
	}

}
add_action( 'ras_dashen_director_message_on_about_page', 'ras_dashen_director_message_on_about_page_action', 10 );