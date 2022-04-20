<?php
/**
* Function hooks for custom frontpage functions
*
* @package Ras_Dashen
*
* @since 1.0.0
*/

// front hero section title
if ( ! function_exists( 'ras_dashen_display_hero_section_title_action' ) ) :

  function ras_dashen_display_hero_section_title_action() {

    // Get default customization
    $default = ras_dashen_get_default_mods();

    // get the section title
    $hero_section_title = esc_attr( get_theme_mod( 'ras_dashen_front_hero_section_heading', $default['ras_dashen_front_hero_section_heading'] ) );

    if ( '' !== $hero_section_title ) { 
    ?>
      <div class="col-12">
        <h1 class="section-title mb-3">
          <?php echo sprintf( esc_html__( '%s', 'ras-dashen' ), $hero_section_title ); ?>
        </h1>
      </div>
    <?php 
    }

  }
  
endif;

/**
* Display frontpage custom hero from theme customizer
*/
if ( ! function_exists( 'ras_dashen_display_front_custom_hero_action' ) ) :

  function ras_dashen_display_front_custom_hero_action() {

    // Get default customization
    $default = ras_dashen_get_default_mods();

    $custom_img_class = array( 'hero-img' );

    // get the section title
    $hero_section_title = esc_attr( get_theme_mod( 'ras_dashen_front_hero_section_heading', $default['ras_dashen_front_hero_section_heading'] ) );

    // get excerpt heading
    $hero_heading = esc_attr( get_theme_mod( 'ras_dashen_front_hero_heading', $default['ras_dashen_front_hero_heading'] ) );

    // get custom excerpt text
    $custom_hero_text = esc_attr( get_theme_mod( 'ras_dashen_front_hero_text', $default['ras_dashen_front_hero_text'] ) );

    // custom image
    $custom_hero_img = get_theme_mod( 'ras_dashen_front_hero_custom_image' );

    $custom_img_url = wp_get_attachment_url( $custom_hero_img );

    // primary btn
    $primary_custom_btn_text = esc_attr( get_theme_mod( 'ras_dashen_front_hero_primary_custom_btn_text', $default['ras_dashen_front_hero_primary_custom_btn_text'] ) );
    $primary_custom_btn_link = get_theme_mod( 'ras_dashen_front_hero_primary_custom_btn_link' );

    // secondary btn
    $secondary_custom_btn_text = esc_attr( get_theme_mod( 'ras_dashen_front_hero_secondary_custom_btn_text', $default['ras_dashen_front_hero_secondary_custom_btn_text'] ) );
    $secondary_custom_btn_link = get_theme_mod( 'ras_dashen_front_hero_secondary_custom_btn_link' );

    ?>
    <div class="col-md-6 order-md-2">
      <?php
        // get custom image
        if ( $custom_img_url ) :
      ?>
          <img src="<?php echo esc_url( $custom_img_url ); ?>" class="<?php echo esc_attr( implode( ' ', $custom_img_class ) ); ?>" alt="<?php echo sprintf( esc_html__( '%s', 'ras-dashen' ), $hero_heading ); ?>">
      <?php
        endif;
      ?>
    </div>

    <div class="col-md-6 order-md-1 excerpt-block">
      <?php if ( '' !== $hero_section_title ) { ?>
        <h1 class="section-title mb-3">
          <?php echo sprintf( esc_html__( '%s', 'ras-dashen' ), $hero_section_title ); ?>
        </h1>
      <?php 
        }
        if ( '' !== $hero_heading ) { 
      ?>
        <h2 class="block-title display-5 mb-3">
          <?php echo sprintf( esc_html__( '%s', 'ras-dashen' ), $hero_heading ); ?>
        </h2>
      <?php
        }

        // custom excerpt
        if ( '' !== $custom_hero_text ) { 
      ?>
        <p class="lead">
          <?php echo sprintf( esc_html__( '%s', 'ras-dashen' ), $custom_hero_text ); ?>
        </p>
      <?php } ?>
        <div class="d-flex justify-content-start">
      <?php
        // primary btn
        if ( '' !== $primary_custom_btn_text ) {
          $primary_btn = sprintf(
            '<a class="btn-main-dark" href="%1$s">%2$s</a>',
            esc_url( $primary_custom_btn_link ),
            sprintf(
              /* translators:*/
              esc_html__( '%s ', 'ras-dashen' ),
              $primary_custom_btn_text
            )
          );

          echo $primary_btn;
        }

        // secondary btn
        if ( '' !== $secondary_custom_btn_text ) {
          $secondary_btn = sprintf(
            '<a class="light-outline-btn" href="%1$s">%2$s</a>',
            esc_url( $secondary_custom_btn_link ),
            sprintf(
              /* translators:*/
              esc_html__( '%s ', 'ras-dashen' ),
              $secondary_custom_btn_text
            )
          );

          echo $secondary_btn;
        }
      ?>
        </div>
    </div><!-- .excerpt-block -->
    <?php

  }
  
endif;

/**
* template function for front about_site content
*
*/
if ( ! function_exists( 'ras_dashen_front_about_site_content_action' ) ) {
  function ras_dashen_front_about_site_content_action() {
    // card content selected
    $about_site_content = esc_attr( get_theme_mod( 'ras_dashen_about_site_excerpt_blocks_content_type' ) );

    if ( '' !== $about_site_content ) :

      if ( 'custom_cards' !== $about_site_content ) {

       if ( 'post' === $about_site_content ) {
         /**
        * Hook - ras_dashen_front_about_site_post_excerpt_blocks.
        *
        * @hooked ras_dashen_front_about_site_post_excerpt_blocks_action - 10
        */
        do_action( 'ras_dashen_front_about_site_post_excerpt_blocks' );
       } elseif ( 'page' === $about_site_content ) {
         /**
        * Hook - ras_dashen_front_about_site_page_excerpt_blocks.
        *
        * @hooked ras_dashen_front_about_site_page_excerpt_blocks_action - 10
        */
        do_action( 'ras_dashen_front_about_site_page_excerpt_blocks' );
       }
       
        
      } else {

        /**
        * Hook - ras_dashen_front_custom_about_site_excerpt_blocks.
        *
        * @hooked ras_dashen_front_custom_about_site_excerpt_blocks_action - 10
        */
        do_action( 'ras_dashen_front_custom_about_site_excerpt_blocks' );

      }

    endif;
  }
}

/**
* about_site from selected posts
*/
if ( ! function_exists( 'ras_dashen_front_about_site_post_excerpt_blocks_action' ) ) :

  function ras_dashen_front_about_site_post_excerpt_blocks_action() {

    // Get default customization
    $default = ras_dashen_get_default_mods();

    // num of blocks
    $num_of_blocks = absint( get_theme_mod( 'ras_dashen_num_of_about_site_excerpt_blocks', $default['ras_dashen_num_of_about_site_excerpt_blocks'] ) );

    // link btn text
    $blocks_btn_txt = __( 'Learn More ', 'ras-dashen' );

    // class for block imgs
    $block_img_classes = array( 'img-contracted-50 irregular-border-rad' );

    // selected posts
    // $p_arr = array();

    for ( $i = 0; $i < $num_of_blocks; $i++ ) {

      // $selected_p_list = get_theme_mod( 'ras_dashen_about_site_excerpt_block_post_' . $i );
      $selected_pst = ( get_theme_mod( 'ras_dashen_about_site_excerpt_block_post_' . $i ) ) ? get_theme_mod( 'ras_dashen_about_site_excerpt_block_post_' . $i ) : '' ;

      if ( '' !== $selected_pst ) :
        // title 
        $pst_title = get_the_title( $selected_pst );

        // link 
        $pst_link = get_permalink( $selected_pst );

        // excerpt 
        $pst_excerpt = get_the_excerpt( $selected_pst );
    ?>
          <div class="col about-site-col">
            <?php  
              if ( has_post_thumbnail( $selected_pst ) ) {
                
                echo get_the_post_thumbnail( $selected_pst, 'ras-dashen-featured-img-min', 
                      array(
                        'class' =>  esc_attr( implode( ' ', $block_img_classes ) ),
                        'alt'   =>  the_title_attribute( array(
                        'echo'  =>  false
                        ) ),
                      ) 
                    );  
              }
            ?>
            <h2 class="block-title">
              <a href="<?php echo esc_url( $pst_link ); ?>">
                <?php  
                  // displaying title
                  echo sprintf( esc_html__( '%s', 'ras-dashen' ), $pst_title );
                ?>
              </a>
            </h2>
            <div class="w-100 excerpt-block p-3">
              <p>
                <?php  
                  // displaying excerpt
                  echo sprintf( esc_html__( '%s', 'ras-dashen' ), $pst_excerpt );
                ?>
              </p>
              <a class="btn-main-light" href="<?php echo esc_url( $pst_link ); ?>"><?php echo $blocks_btn_txt; ?><i class="fa fa-arrow-right"></i></a>
            </div>
          </div>
    <?php
      endif;
    } // end for loop

  }

endif;
add_action( 'ras_dashen_front_about_site_post_excerpt_blocks', 'ras_dashen_front_about_site_post_excerpt_blocks_action', 10 );


/**
* about_site from selected pages
*/
if ( ! function_exists( 'ras_dashen_front_about_site_page_excerpt_blocks_action' ) ) :

  function ras_dashen_front_about_site_page_excerpt_blocks_action() {

    // Get default customization
    $default = ras_dashen_get_default_mods();

    // num of blocks
    $num_of_blocks = absint( get_theme_mod( 'ras_dashen_num_of_about_site_excerpt_blocks', $default['ras_dashen_num_of_about_site_excerpt_blocks'] ) );

    // link btn text
    $blocks_btn_txt = __( 'Learn More ', 'ras-dashen' );

    // class for block imgs
    $block_img_classes = array( 'img-contracted-50 irregular-border-rad' );

    // selected posts
    // $p_arr = array();

    for ( $i = 0; $i < $num_of_blocks; $i++ ) {

      // selected pages
      $selected_pg = ( get_theme_mod( 'ras_dashen_about_site_excerpt_block_page_' . $i ) ) ? get_theme_mod( 'ras_dashen_about_site_excerpt_block_page_' . $i ) : '' ;

      // custom imgs
      $intro_pg_img = ( get_theme_mod( 'ras_dashen_about_site_img_page_' . $i ) ) ? get_theme_mod( 'ras_dashen_about_site_img_page_' . $i ) : '' ;

      if ( '' !== $selected_pg ) :
        // title 
        $intro_pg_title = get_the_title( $selected_pg );

        // link 
        $intro_pg_link = get_permalink( $selected_pg );

        // excerpt 
        // $intro_pg_excerpt = get_the_excerpt( $selected_pg );
    ?>
          <div class="col about-site-col">
            <?php  
              if ( $intro_pg_img ) {
                // display image
                $custom_img_src = wp_get_attachment_url( $intro_pg_img );

                // page custom image
                $pg_custom_img = sprintf( 
                  '<img src="%1$s" alt="%2$s" class="' . esc_attr( implode( ' ', $block_img_classes ) ) . '" />', 
                  esc_url( $custom_img_src ), 
                  sprintf( esc_html__( '%s', 'ras-dashen' ), $intro_pg_title ) 
                );
                
                echo $pg_custom_img;
              }
            ?>
            <h2 class="block-title">
              <a href="<?php echo esc_url( $intro_pg_link ); ?>">
                <?php  
                  // displaying title
                  echo sprintf( esc_html__( '%s', 'ras-dashen' ), $intro_pg_title );
                ?>
              </a>
            </h2>
            <p></p>
            <a class="btn-main-light" href="<?php echo esc_url( $intro_pg_link ); ?>"><?php echo $blocks_btn_txt; ?><i class="fa fa-arrow-right"></i></a>
          </div>
    <?php
      endif;
    } // end for loop
 
  }

endif;
add_action( 'ras_dashen_front_about_site_page_excerpt_blocks', 'ras_dashen_front_about_site_page_excerpt_blocks_action', 10 );


// ras_dashen_front_custom_about_site_excerpt_blocks
if ( ! function_exists( 'ras_dashen_front_custom_about_site_excerpt_blocks_action' ) ) :

  function ras_dashen_front_custom_about_site_excerpt_blocks_action() {

    // Get default customization
    $default = ras_dashen_get_default_mods();

    // num of blocks
    $num_of_blocks = absint( get_theme_mod( 'ras_dashen_num_of_about_site_excerpt_blocks', $default['ras_dashen_num_of_about_site_excerpt_blocks'] ) );

    // link btn text
    $blocks_btn_txt = 'Learn More';

    $blocks = array();

        for ( $c = 0; $c < $num_of_blocks; $c++ ) {

            // title for block content
            $blocks['title'] = esc_attr( get_theme_mod( 'ras_dashen_custom_about_site_excerpt_block_title_' . $c, $default['ras_dashen_custom_about_site_excerpt_block_title'] ) );

            // desc for block content
            $blocks['desc'] = esc_attr( get_theme_mod( 'ras_dashen_custom_about_site_excerpt_block_description_' . $c, $default['ras_dashen_custom_about_site_excerpt_block_description'] ) );

            // desc for block content
            $blocks['link'] = esc_url( get_theme_mod( 'ras_dashen_custom_about_site_link_' . $c ) );


            // custom image
            $blocks['img'] = get_theme_mod( 'ras_dashen_about_site_img_custom_excerpt_block_' . $c );

            $block_img_url = wp_get_attachment_url( $blocks['img'] );


            // check for not empty custom content
            if ( $blocks ) {
            ?>

              <div id="custom-post-<?php echo $c; ?>" class="col about-site-col">
                <?php
                  
                  $block_img_classes = array( 'img-contracted-50 irregular-border-rad' );

                  // get custom images
                  if ( $block_img_url ) :
                ?>
                    <img src="<?php echo esc_url( $block_img_url ); ?>" class="<?php echo esc_attr( implode( ' ', $block_img_classes ) ); ?>" alt="<?php echo sprintf( esc_html__( '%s', 'ras-dashen' ), $blocks['title'] ); ?>">
                <?php
                  endif;
                ?>

                <?php if ( $blocks['title'] ) : ?>
                  <h2 class="block-title">
                  <?php if ( $blocks['link'] ) { ?>
                    <a href="<?php echo esc_url( $blocks['link'] ); ?>">
                    <?php echo sprintf( esc_html__( '%s', 'ras-dashen' ), $blocks['title'] ); ?>
                    </a>
                  <?php 
                      } else {
                        echo sprintf( esc_html__( '%s', 'ras-dashen' ), $blocks['title'] );
                      } 
                  ?>
                  </h2>
                <?php endif; ?>

                <?php if ( $blocks['desc'] ) { ?>
                  <p>
                    <?php echo sprintf( esc_html__( '%s', 'ras-dashen' ), $blocks['desc'] ); ?>
                  </p>
                <?php } ?>

                <?php  
                  // the btn link
                  $block_btn_link = sprintf(
                    '<a class="btn-main-light" href="%1$s">%2$s<i class="fa fa-arrow-right"></i></a>',
                    esc_url( $blocks['link'] ),
                    sprintf(
                      /* translators:*/
                      esc_html__( '%s ', 'ras-dashen' ),
                      $blocks_btn_txt
                    )
                  );

                  echo $block_btn_link;
                ?>
              </div><!-- .col-sm-4 -->

            <?php
            } // if ( $blocks )

        } // end for()
  }
  
endif;
add_action( 'ras_dashen_front_custom_about_site_excerpt_blocks', 'ras_dashen_front_custom_about_site_excerpt_blocks_action', 10 );



// front latest_picks section title
if ( ! function_exists( 'ras_dashen_display_latest_picks_section_heading_action' ) ) :

  function ras_dashen_display_latest_picks_section_heading_action() {

    // Get default customization
    $default = ras_dashen_get_default_mods();

    // get the section title
    $latest_picks_section_heading = esc_attr( get_theme_mod( 'ras_dashen_front_latest_picks_section_heading', $default['ras_dashen_front_latest_picks_section_heading'] ) );

    if ( '' !== $latest_picks_section_heading ) { 
    ?>
      <h1 class="section-title mb-3">
        <?php echo sprintf( esc_html__( '%s', 'ras-dashen' ), $latest_picks_section_heading ); ?>
      </h1>
    <?php 
    }

  }
  
endif;


/**
* Display excerpt blocks of frontpage latest_picks section based on selected posts in theme customizer
*/
if ( ! function_exists( 'ras_dashen_display_front_post_latest_picks_action' ) ) :

  function ras_dashen_display_front_post_latest_picks_action() {

    // Get default customization
    $default = ras_dashen_get_default_mods();

    // num of excerpt blocks
    $num_of_blocks = absint( get_theme_mod( 'ras_dashen_num_of_latest_pick_excerpt_blocks', $default['ras_dashen_num_of_latest_pick_excerpt_blocks'] ) );

    // link btn text
    $latest_pick_block_btn_txt = 'Learn More';

    $latest_pick_img_class = array( 'latest-picks-image img-fluid mx-auto' );


    for ( $j = 0; $j < $num_of_blocks; $j++ ) { 

      // get the selected post
      $selected_latest_pick_post = ( get_theme_mod( 'ras_dashen_latest_pick_block_post_' . $j ) ) ? get_theme_mod( 'ras_dashen_latest_pick_block_post_' . $j ) : '' ;

      // get blok's position
      $blockPosition = $j + 1;

      if ( '' !== $selected_latest_pick_post ) {
        $latest_pick_post_title = get_the_title( $selected_latest_pick_post );
        $latest_pick_post_link = get_permalink( $selected_latest_pick_post );
        $latest_pick_post_excerpt = get_the_excerpt( $selected_latest_pick_post );
      }

      ?>
      <div id="latest-pick-<?php echo $selected_latest_pick_post; ?>" class="row latest-picks">
          <?php  
            // get excerpt wrapper class list
            $excerpt_div_class = ras_dashen_get_latest_pick_staggered_cols_classes( $blockPosition, 'excerpt' );
          ?>
          <div class="<?php echo esc_attr( $excerpt_div_class ); ?>">
            <?php
              // card title;
              $latest_pick_card_title = sprintf(
                '<h2 class="block-title"><a href="%1$s">%2$s</a></h2>',
                esc_url( $latest_pick_post_link ),
                sprintf(
                  /* translators:*/
                  esc_html__( '%s', 'ras-dashen' ),
                  $latest_pick_post_title
                )
              );

              echo $latest_pick_card_title;
            ?>

            <?php  
              // getting the excerpt
              echo sprintf(
                wp_kses(
                  __( '<p class="lead">%s</p>', 'ras-dashen' ),
                  array(
                    'p' => array(
                      'class' => array(),
                    ),
                  )
                ),
                wp_kses_post( $latest_pick_post_excerpt )
              );

              // the btn link
              $latest_pick_link_btn = sprintf(
                '<a class="btn-main-dark" href="%1$s">%2$s<i class="fa fa-arrow-right"></i></a>',
                esc_url( $latest_pick_post_link ),
                sprintf(
                  /* translators:*/
                  esc_html__( '%s ', 'ras-dashen' ),
                  $latest_pick_block_btn_txt
                )
              );

              echo $latest_pick_link_btn;
            ?>
          </div>
          <?php

            // get img wrapper div class
            $img_div_class = ras_dashen_get_latest_pick_staggered_cols_classes( $blockPosition, 'img' );
          ?>
          <div class="<?php echo esc_attr( $img_div_class ); ?>">
            <?php  
              if ( has_post_thumbnail( $selected_latest_pick_post ) ) {
            
                echo get_the_post_thumbnail( $selected_latest_pick_post, 'ras-dashen-featured-img-min', 
                  array(
                    'class' =>  esc_attr( implode( ' ', $latest_pick_img_class ) ),
                    'alt'   =>  the_title_attribute( array(
                    'echo'  =>  false
                    ) ),
                  ) 
                );  
              }
            ?>
          </div>
         
        </div><!-- .latest-picks -->
        <hr class="in-section-divider my-3">
      <?php

    } // --------------------------------------end for loop

  }
  
endif;

/**
* ------------------------------------------------------------------------------------
* Functions for frontpage primary_feature section
* ------------------------------------------------------------------------------------ 
*/

/**
* template function for front prmary feature section content
*
*/
if ( ! function_exists( 'ras_dashen_front_primary_features_content_action' ) ) {
  function ras_dashen_front_primary_features_content_action() {

    // block content selected
    $primary_features_content = esc_attr( get_theme_mod( 'ras_dashen_primary_feature_highlight_blocks_content_type' ) );

    if ( '' !== $primary_features_content ) :

      if ( 'custom_cards' !== $primary_features_content ) {

       if ( 'post' === $primary_features_content ) {
         /**
        * Hook - ras_dashen_primary_feature_post_excerpt_blocks.
        *
        * @hooked ras_dashen_primary_feature_post_excerpt_blocks_action - 10
        */
        do_action( 'ras_dashen_primary_feature_post_excerpt_blocks' );
       } elseif ( 'page' === $primary_features_content ) {
         /**
        * Hook - ras_dashen_primary_feature_page_excerpt_blocks.
        *
        * @hooked ras_dashen_primary_feature_page_excerpt_blocks_action - 10
        */
        do_action( 'ras_dashen_primary_feature_page_excerpt_blocks' );
       }
       
        
      } else {

        /**
        * Hook - ras_dashen_primary_feature_custom_excerpt_blocks.
        *
        * @hooked ras_dashen_primary_feature_custom_excerpt_blocks_action - 10
        */
        do_action( 'ras_dashen_primary_feature_custom_excerpt_blocks' );

      }

    endif;
  }
}

/**
* display primary features highlight section
*/
if ( ! function_exists( 'ras_dashen_primary_feature_section_header_action' ) ) :

  function ras_dashen_primary_feature_section_header_action() {

    // Get default customization
    $default = ras_dashen_get_default_mods();

    // section title
    $pimary_feature_section_title = get_theme_mod( 'ras_dashen_front_primary_feature_section_heading', $default['ras_dashen_front_primary_feature_section_heading'] );

    if ( $pimary_feature_section_title ) :
    ?>
      <div class="col-12 py-3 sectionhead-wrap">  
        <h1 class="section-title mb-3"><?php echo apply_filters( 'the_title', $pimary_feature_section_title ); ?></h1>
      </div><!-- .sectionhead-wrap -->
    <?php 
    endif;
  }
  
endif;


/**
* primary_feature excerpt blocks from selected posts
*/
if ( ! function_exists( 'ras_dashen_primary_feature_post_excerpt_blocks_action' ) ) :

  function ras_dashen_primary_feature_post_excerpt_blocks_action() {

    // Get default customization
    $default = ras_dashen_get_default_mods();

    // num of excerpt blocks
    $feature_excerpt_block_num = absint( get_theme_mod( 'ras_dashen_primary_feature_num_of_excerpt_blocks', $default['ras_dashen_primary_feature_num_of_excerpt_blocks'] ) );

    // link btn text
    $feature_excerpt_block_btn_txt = __( 'Learn More ', 'ras-dashen' );

    // selected posts
    for ( $i = 0; $i < $feature_excerpt_block_num; $i++ ) {

      $pimary_feature_pst = ( get_theme_mod( 'ras_dashen_primary_feature_highlight_block_post_' . $i ) ) ? get_theme_mod( 'ras_dashen_primary_feature_highlight_block_post_' . $i ) : '' ;

      if ( '' !== $pimary_feature_pst ) :
        // title 
        $pimary_feature_pst_title = get_the_title( $pimary_feature_pst );

        // link 
        $pimary_feature_pst_link = get_permalink( $pimary_feature_pst );

        // excerpt 
        $pimary_feature_pst_excerpt = get_the_excerpt( $pimary_feature_pst );
      endif;
    ?>
      <div class="col-md-3 col-sm-6 primary-feature">
        <h2 class="featured-title">
          <a href="<?php echo esc_url( $pimary_feature_pst_link ); ?>">
            <?php  
              // displaying title
              echo sprintf( esc_html__( '%s', 'ras-dashen' ), $pimary_feature_pst_title );
            ?>
          </a>
        </h2>
        <p class="featured-text">
          <?php  
            // displaying excerpt
            echo sprintf( esc_html__( '%s', 'ras-dashen' ), $pimary_feature_pst_excerpt );
          ?>
        </p>
        <a class="btn-main-dark" href="<?php echo esc_url( $pimary_feature_pst_link ); ?>"><?php echo $feature_excerpt_block_btn_txt; ?><i class="fa fa-arrow-right"></i></a>
      </div><!-- .primary-feature -->
    <?php
    } // end for loop

  }

endif;
add_action( 'ras_dashen_primary_feature_post_excerpt_blocks', 'ras_dashen_primary_feature_post_excerpt_blocks_action', 10 );


/**
* primary_features excerpt blocks from selected pages
*/
if ( ! function_exists( 'ras_dashen_primary_feature_page_excerpt_blocks_action' ) ) :

  function ras_dashen_primary_feature_page_excerpt_blocks_action() {

    // Get default customization
    $default = ras_dashen_get_default_mods();

    // num of excerpt blocks
    $feature_excerpt_block_num = absint( get_theme_mod( 'ras_dashen_primary_feature_num_of_excerpt_blocks', $default['ras_dashen_primary_feature_num_of_excerpt_blocks'] ) );

    // selected pages loop
    for ( $i = 0; $i < $feature_excerpt_block_num; $i++ ) {

      // selected pages
      $pimary_feature_pg = ( get_theme_mod( 'ras_dashen_primary_feature_highlight_block_page_' . $i ) ) ? get_theme_mod( 'ras_dashen_primary_feature_highlight_block_page_' . $i ) : '' ;

      // custom imgs
      $pimary_feature_pg_img = ( get_theme_mod( 'ras_dashen_primary_feature_highlight_img_page_' . $i ) ) ? get_theme_mod( 'ras_dashen_primary_feature_highlight_img_page_' . $i ) : '' ;

      if ( '' !== $pimary_feature_pg ) :
        // title 
        $pimary_feature_pg_card_title = get_the_title( $pimary_feature_pg );

        // link 
        $pimary_feature_pg_card_link = get_permalink( $pimary_feature_pg );

      endif;
    ?>
      <div class="col-md-3 col-sm-6 primary-feature">
        <?php  
          if ( $pimary_feature_pg_img ) {
            // display image
            echo wp_get_attachment_image( 
              $pimary_feature_pg_img, 
              'ras-dashen-featured-img-min', 
              array( 
                'class' => esc_attr( 'card-img-top'),
                'alt'   => sprintf( esc_html__( '%s', 'ras-dashen' ), $pimary_feature_pg_card_title ) 
              ) 
            );
          }
        ?>
        <h2 class="featured-title">
          <a href="<?php echo esc_url( $pimary_feature_pg_card_link ); ?>">
            <?php  
              // displaying title
              echo sprintf( esc_html__( '%s', 'ras-dashen' ), $pimary_feature_pg_card_title );
            ?>
          </a>
        </h2>
      </div><!-- .primary-feature -->
    <?php
      
    } // end for loop
 
  }

endif;
add_action( 'ras_dashen_primary_feature_page_excerpt_blocks', 'ras_dashen_primary_feature_page_excerpt_blocks_action', 10 );


/**
* primary_features excerpt blocks from selected pages
*/
if ( ! function_exists( 'ras_dashen_primary_feature_custom_excerpt_blocks_action' ) ) :

  function ras_dashen_primary_feature_custom_excerpt_blocks_action() {

    // Get default customization
    $default = ras_dashen_get_default_mods();

    // num of excerpt blocks
    $feature_excerpt_block_num = absint( get_theme_mod( 'ras_dashen_primary_feature_num_of_excerpt_blocks', $default['ras_dashen_primary_feature_num_of_excerpt_blocks'] ) );

    // link btn text
    $feature_excerpt_block_btn_txt = 'Learn More';

    $feature_excerpt_block = array();

    for ( $i = 0; $i < $feature_excerpt_block_num; $i++ ) {

      // title for card content
      $feature_excerpt_block['title'] = get_theme_mod( 'ras_dashen_custom_primary_feature_highlight_block_title_' . $i, $default['ras_dashen_custom_primary_feature_highlight_block_title'] );

      // desc for card content
      $feature_excerpt_block['desc'] = get_theme_mod( 'ras_dashen_custom_primary_feature_highlight_block_description_' . $i, $default['ras_dashen_custom_primary_feature_highlight_block_description'] );

      // desc for card content
      $feature_excerpt_block['link'] = get_theme_mod( 'ras_dashen_custom_primary_feature_highlight_link_' . $i );


      // custom image
      $feature_excerpt_block['img'] = get_theme_mod( 'ras_dashen_primary_feature_highlight_img_custom_card_' . $i );

      $feature_block_img_url = wp_get_attachment_url( $feature_excerpt_block['img'] );


      // check for not empty custom content
      if ( $feature_excerpt_block ) {
      ?>
      <div class="col-md-3 col-sm-6 primary-feature">
        <?php
          // get custom images
          if ( $feature_block_img_url ) :
        ?>
            <img src="<?php echo esc_url( $feature_block_img_url ); ?>" class="card-img-top" alt="<?php echo sprintf( esc_html__( '%s', 'ras-dashen' ), $feature_excerpt_block['title'] ); ?>">
        <?php
          endif;
        ?>
        <?php if ( $feature_excerpt_block['title'] ) : ?>
          <h2 class="featured-title">
          <?php if ( $feature_excerpt_block['link'] ) { ?>
            <a href="<?php echo esc_url( $feature_excerpt_block['link'] ); ?>">
            <?php echo sprintf( esc_html__( '%s', 'ras-dashen' ), $feature_excerpt_block['title'] ); ?>
            </a>
          <?php 
              } else {
                echo sprintf( esc_html__( '%s', 'ras-dashen' ), $feature_excerpt_block['title'] );
              } 
          ?>
          </h2>
        <?php endif; ?>
        <?php if ( $feature_excerpt_block['desc'] ) { ?>
          <p class="featured-text">
            <?php echo sprintf( esc_html__( '%s', 'ras-dashen' ), $feature_excerpt_block['desc'] ); ?>
          </p>
        <?php } ?>

        <?php  
          // the btn link
          $feature_block_btn_link = sprintf(
            '<a class="btn-main-dark" href="%1$s">%2$s<i class="fa fa-arrow-right"></i></a>',
            esc_url( $feature_excerpt_block['link'] ),
            sprintf(
              /* translators:*/
              esc_html__( '%s ', 'ras-dashen' ),
              $feature_excerpt_block_btn_txt
            )
          );

          echo $feature_block_btn_link;
        ?>
      </div><!-- .primary-feature -->

      <?php
      } // if ( $feature_excerpt_block )

    } // end for()
  }
  
endif;
add_action( 'ras_dashen_primary_feature_custom_excerpt_blocks', 'ras_dashen_primary_feature_custom_excerpt_blocks_action', 10 );

/**
* ------------------------------------------------------------------------------------
* Functions for frontpage primary_services section
* ------------------------------------------------------------------------------------ 
*/

/**
* template function of front primary_services section based on selected content type
* in theme customizer
*
*/
if ( ! function_exists( 'ras_dashen_front_primary_services_content_blocks_action' ) ) {
  function ras_dashen_front_primary_services_content_blocks_action() {

    // block content selected
    $primary_services_content = esc_attr( get_theme_mod( 'ras_dashen_primary_services_highlight_cards_content_type' ) );

    if ( '' !== $primary_services_content ) :

      if ( 'custom_cards' !== $primary_services_content ) {

       if ( 'post' === $primary_services_content ) {
         /**
        * Hook - ras_dashen_front_display_primary_services_post_cards
        *
        * @hooked ras_dashen_front_display_primary_services_post_cards_action - 10
        */
        do_action( 'ras_dashen_front_display_primary_services_post_cards' );
       } elseif ( 'page' === $primary_services_content ) {
         /**
        * Hook - ras_dashen_front_display_primary_services_page_cards
        *
        * @hooked ras_dashen_front_display_primary_services_page_cards_action - 10
        */
        do_action( 'ras_dashen_front_display_primary_services_page_cards' );
       }
       
        
      } else {

        /**
        * Hook - ras_dashen_front_display_primary_services_custom_cards
        *
        * @hooked ras_dashen_front_display_primary_services_custom_cards_action - 10
        */
        do_action( 'ras_dashen_front_display_primary_services_custom_cards' );

      }

    endif;
  }
}

/**
* display primary_services highlight section
*/
if ( ! function_exists( 'ras_dashen_front_primary_services_section_header_action' ) ) :

  function ras_dashen_front_primary_services_section_header_action() {

    // Get default customization
    $default = ras_dashen_get_default_mods();

    // section title
    $prime_service_title = get_theme_mod( 'ras_dashen_front_primary_services_highlight_section_heading', $default['ras_dashen_front_primary_services_highlight_section_heading'] );
    // section intro text
    $prime_service_intro_content = get_theme_mod( 'ras_dashen_front_primary_services_highlight_section_txt', $default['ras_dashen_front_primary_services_highlight_section_txt'] );

    if ( $prime_service_title || $prime_service_intro_content ) { ?>
      <div class="col-12 sectionhead-wrap">
      <?php
      if ( $prime_service_title ) :
      ?>  
        <h1 class="section-title"><?php echo apply_filters( 'the_title', $prime_service_title ); ?></h1>
      <?php endif; ?>

      <?php if ( $prime_service_intro_content ) : ?>
        <p class="section-description"><?php echo apply_filters( 'the_content', $prime_service_intro_content ); ?></p>
      <?php 
      endif; 
    
      ?>
      </div><!-- .sectionhead-wrap -->
      <?php
    }
  }
  
endif;



/**
* primary_services cards from selected posts
*/
if ( ! function_exists( 'ras_dashen_front_display_primary_services_post_cards_action' ) ) :

  function ras_dashen_front_display_primary_services_post_cards_action() {

    // Get default customization
    $default = ras_dashen_get_default_mods();

    // num of cards
    $prime_service_cards_num = absint( get_theme_mod( 'ras_dashen_primary_services_num_of_highlight_cards', $default['ras_dashen_primary_services_num_of_highlight_cards'] ) );

    // link btn text
    $prime_service_cards_btn_txt = __( 'Learn More ', 'ras-dashen' );

    // selected posts
    for ( $e = 0; $e < $prime_service_cards_num; $e++ ) {

      $prime_service_pst = ( get_theme_mod( 'ras_dashen_primary_services_highlight_card_post_' . $e ) ) ? get_theme_mod( 'ras_dashen_primary_services_highlight_card_post_' . $e ) : '' ;

      if ( '' !== $prime_service_pst ) :
        // title 
        $prime_service_pst_title = get_the_title( $prime_service_pst );

        // link 
        $prime_service_pst_link = get_permalink( $prime_service_pst );

        // excerpt 
        $prime_service_pst_excerpt = get_the_excerpt( $prime_service_pst );
      endif;
    ?>
      <div id="prime-service-<?php echo $prime_service_pst; ?>" class="col primary-service-col">
        <div class="card service-card">
          <?php  
            if ( has_post_thumbnail( $prime_service_pst ) ) {
              
              echo get_the_post_thumbnail( $prime_service_pst, 'ras-dashen-featured-img-min', 
                    array(
                      'class' =>  esc_attr( 'card-img-top' ),
                      'alt'   =>  the_title_attribute( array(
                      'echo'  =>  false
                      ) ),
                    ) 
                  );  
            }
          ?>
          <div class="card-body">
            <h2 class="card-title">
              <a href="<?php echo esc_url( $prime_service_pst_link ); ?>">
                <?php  
                  // displaying title
                  echo sprintf( esc_html__( '%s', 'ras-dashen' ), $prime_service_pst_title );
                ?>
              </a>
            </h2>
            <p class="card-text">
              <?php  
                // displaying excerpt
                echo sprintf( esc_html__( '%s', 'ras-dashen' ), $prime_service_pst_excerpt );
              ?>
            </p>
            <a class="btn-main-dark" href="<?php echo esc_url( $prime_service_pst_link ); ?>"><?php echo $prime_service_cards_btn_txt; ?><i class="fa fa-arrow-right"></i></a>
          </div>
        </div><!-- .card -->
      </div><!-- #prime-service-<?php echo $prime_service_pst; ?> -->
    <?php
    } // end for loop

  }

endif;
add_action( 'ras_dashen_front_display_primary_services_post_cards', 'ras_dashen_front_display_primary_services_post_cards_action', 10 );


/**
* primary_services cards from selected pages
*/
if ( ! function_exists( 'ras_dashen_front_display_primary_services_page_cards_action' ) ) :

  function ras_dashen_front_display_primary_services_page_cards_action() {

    // Get default customization
    $default = ras_dashen_get_default_mods();

    // num of cards
    $prime_service_cards_num = absint( get_theme_mod( 'ras_dashen_primary_services_num_of_highlight_cards', $default['ras_dashen_primary_services_num_of_highlight_cards'] ) );

    // selected pages loop
    for ( $e = 0; $e < $prime_service_cards_num; $e++ ) {

      // selected pages
      $prime_service_pg = ( get_theme_mod( 'ras_dashen_primary_services_highlight_card_page_' . $e ) ) ? get_theme_mod( 'ras_dashen_primary_services_highlight_card_page_' . $e ) : '' ;

      // custom imgs
      $prime_service_pg_img = ( get_theme_mod( 'ras_dashen_primary_services_highlight_img_page_' . $e ) ) ? get_theme_mod( 'ras_dashen_primary_services_highlight_img_page_' . $e ) : '' ;

      if ( '' !== $prime_service_pg ) :
        // title 
        $prime_service_pg_card_title = get_the_title( $prime_service_pg );

        // link 
        $prime_service_pg_card_link = get_permalink( $prime_service_pg );

        // excerpt 
        // $prime_service_pg_card_excerpt = get_the_excerpt( $prime_service_pg );
      endif;
    ?>
      <div id="prime-service-<?php echo $prime_service_pg; ?>" class="col primary-service-col">
        <div class="card service-card">
          <?php  
            if ( $prime_service_pg_img ) {
              // display image
              echo wp_get_attachment_image( 
                $prime_service_pg_img, 
                'ras-dashen-featured-img-min', 
                array( 
                  'class' => esc_attr( 'card-img-top'),
                  'alt'   => sprintf( esc_html__( '%s', 'ras-dashen' ), $prime_service_pg_card_title ) 
                ) 
              );
            }
          ?>
          <div class="card-body">
            <h2 class="card-title">
              <a href="<?php echo esc_url( $prime_service_pg_card_link ); ?>">
                <?php  
                  // displaying title
                  echo sprintf( esc_html__( '%s', 'ras-dashen' ), $prime_service_pg_card_title );
                ?>
              </a>
            </h2>
          </div>
        </div><!-- .card -->
      </div><!-- #prime-service-<?php echo $prime_service_pg; ?> -->
    <?php
      
    } // end for loop
 
  }

endif;
add_action( 'ras_dashen_front_display_primary_services_page_cards', 'ras_dashen_front_display_primary_services_page_cards_action', 10 );


/**
* primary_services cards from selected pages
*/
if ( ! function_exists( 'ras_dashen_front_display_primary_services_custom_cards_action' ) ) :

  function ras_dashen_front_display_primary_services_custom_cards_action() {

    // Get default customization
    $default = ras_dashen_get_default_mods();

    // num of cards
    $prime_service_cards_num = absint( get_theme_mod( 'ras_dashen_primary_services_num_of_highlight_cards', $default['ras_dashen_primary_services_num_of_highlight_cards'] ) );

    // link btn text
    $prime_service_cards_btn_txt = 'Learn More';

    $prime_service_cards = array();

    for ( $e = 0; $e < $prime_service_cards_num; $e++ ) {

      // title for card content
      $prime_service_cards['title'] = get_theme_mod( 'ras_dashen_custom_primary_services_highlight_card_title_' . $e, $default['ras_dashen_custom_primary_services_highlight_card_title'] );

      // desc for card content
      $prime_service_cards['desc'] = get_theme_mod( 'ras_dashen_custom_primary_services_highlight_card_description_' . $e, $default['ras_dashen_custom_primary_services_highlight_card_description'] );

      // desc for card content
      $prime_service_cards['link'] = get_theme_mod( 'ras_dashen_custom_primary_services_highlight_link_' . $e );


      // custom image
      $prime_service_cards['img'] = get_theme_mod( 'ras_dashen_primary_services_highlight_img_custom_card_' . $e );

      $card_img_url = wp_get_attachment_url( $prime_service_cards['img'] );


      // check for not empty custom content
      if ( $prime_service_cards ) {
      ?>
      <div id="prime-service-<?php echo $e; ?>" class="col primary-service-col">
        <div class="card service-card">
          <?php
            // get custom images
            if ( $card_img_url ) :
          ?>
              <img src="<?php echo esc_url( $card_img_url ); ?>" class="card-img-top" alt="<?php echo sprintf( esc_html__( '%s', 'ras-dashen' ), $prime_service_cards['title'] ); ?>">
          <?php
            endif;
          ?>
          <div class="card-body">
          <?php if ( $prime_service_cards['title'] ) : ?>
            <h2 class="card-title">
            <?php if ( $prime_service_cards['link'] ) { ?>
              <a href="<?php echo esc_url( $prime_service_cards['link'] ); ?>">
              <?php echo sprintf( esc_html__( '%s', 'ras-dashen' ), $prime_service_cards['title'] ); ?>
              </a>
            <?php 
                } else {
                  echo sprintf( esc_html__( '%s', 'ras-dashen' ), $prime_service_cards['title'] );
                } 
            ?>
            </h2>
          <?php endif; ?>
          <?php if ( $prime_service_cards['desc'] ) { ?>
            <p class="card-text">
              <?php echo sprintf( esc_html__( '%s', 'ras-dashen' ), $prime_service_cards['desc'] ); ?>
            </p>
          <?php } ?>

          <?php  
            // the btn link
            $card_btn_link = sprintf(
              '<a class="btn-main-dark" href="%1$s">%2$s<i class="fa fa-arrow-right"></i></a>',
              esc_url( $prime_service_cards['link'] ),
              sprintf(
                /* translators:*/
                esc_html__( '%s ', 'ras-dashen' ),
                $prime_service_cards_btn_txt
              )
            );

            echo $card_btn_link;
          ?>
          </div>
        </div><!-- .card -->
      </div><!-- #prime-service-<?php echo $e; ?> -->

      <?php
      } // if ( $prime_service_cards )

    } // end for()
  }
  
endif;
add_action( 'ras_dashen_front_display_primary_services_custom_cards', 'ras_dashen_front_display_primary_services_custom_cards_action', 10 );

/**
* ------------------------------------------------------------------------------------
* Functions for frontpage featured_products section
* ------------------------------------------------------------------------------------ 
*/

/**
* display featured products section title and description
*
*/
if ( ! function_exists( 'ras_dashen_front_featured_products_section_header_action' ) ) :

  function ras_dashen_front_featured_products_section_header_action() {

    // Get default customization
    $default = ras_dashen_get_default_mods();

    // section title
    $section_title = get_theme_mod( 'ras_dashen_front_featured_products_list_section_heading', $default['ras_dashen_front_featured_products_list_section_heading'] );

    // section intro text
    $section_description = get_theme_mod( 'ras_dashen_front_featured_products_list_section_txt', $default['ras_dashen_front_featured_products_list_section_txt'] );

    if ( $section_title || $section_description ) { ?>
      <div class="row">
        <div class="col-12 sectionhead-wrap">
        <?php
        if ( $section_title ) :
        ?>  
          <h1 class="section-title"><?php echo apply_filters( 'the_title', $section_title ); ?></h1>
        <?php endif; ?>

        <?php if ( $section_description ) : ?>
          <p class="section-description"><?php echo apply_filters( 'the_content', $section_description ); ?></p>
        <?php 
        endif; 
      
        ?>
        </div><!-- .sectionhead-wrap -->
      </div>
      <?php
    }

  }
  
endif;


/**
* template function to display selected featured products
*/
if ( ! function_exists( 'ras_dashen_display_selected_front_featured_products_action' ) ) :

  function ras_dashen_display_selected_front_featured_products_action() {

    // Get default customization
    $default = ras_dashen_get_default_mods();

    // num of posts
    $num_of_posts = absint( get_theme_mod( 'ras_dashen_number_of_featured_products_cards', $default['ras_dashen_number_of_featured_products_cards'] ) );

    // link btn text
    $btn_text = __( 'View', 'ras-dashen' );

    ?>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 content-wrap-row">
    <?php

    // selected posts
    for ( $i = 0; $i < $num_of_posts; $i++ ) {

      $selected_post = ( get_theme_mod( 'ras_dashen_featured_products_list_post_' . $i ) ) ? get_theme_mod( 'ras_dashen_featured_products_list_post_' . $i ) : '' ;

      if ( '' !== $selected_post ) :
        // title 
        $selected_post_title = get_the_title( $selected_post );

        // link 
        $selected_post_link = get_permalink( $selected_post );

        // excerpt 
        $selected_post_excerpt = get_the_excerpt( $selected_post );

      endif;
    ?>
      <div id="featured-product-<?php echo $selected_post; ?>" class="col product-col">
        <div class="card product-card">
          <?php  
            if ( has_post_thumbnail( $selected_post ) ) {
              
              echo get_the_post_thumbnail( $selected_post, 'ras-dashen-featured-img-min', 
                    array(
                      'class' =>  esc_attr( 'card-img img-fit-box' ),
                      'alt'   =>  the_title_attribute( array(
                      'echo'  =>  false
                      ) ),
                    ) 
                  );  
            }
          ?>
          <div class="card-img-overlay">
            <h2 class="card-title">
              <a href="<?php echo esc_url( $selected_post_link ); ?>">
                <?php  
                  // displaying title
                  echo sprintf( esc_html__( '%s', 'ras-dashen' ), $selected_post_title );
                ?>
              </a>
            </h2>

            <div class="flex-horiz-justified-bottom interactive-elems">
              <a class="light-outline-btn mr-auto" href="<?php echo esc_url( $selected_post_link ); ?>"><?php echo $btn_text; ?></a>
            </div>
            
          </div>
        </div><!-- .card -->
      </div><!-- #featured-product-<?php echo $selected_post; ?> -->
    <?php
      
    } // end for loop
    ?>
    </div><!-- .content-wrap-row -->
    <?php

  }

endif;

/**
* ------------------------------------------------------------------------------------
* Functions for frontpage secondary_services section
* ------------------------------------------------------------------------------------ 
*/

/**
* template function of front secondary_services section based on selected content type
* in theme customizer
*
*/
if ( ! function_exists( 'ras_dashen_front_secondary_services_content_blocks_action' ) ) {
  function ras_dashen_front_secondary_services_content_blocks_action() {

    // block content selected
    $secondary_services_content = esc_attr( get_theme_mod( 'ras_dashen_secondary_services_highlight_cards_content_type' ) );

    if ( '' !== $secondary_services_content ) :

      if ( 'custom_cards' !== $secondary_services_content ) {

       if ( 'post' === $secondary_services_content ) {
         /**
        * Hook - ras_dashen_front_display_secondary_services_post_cards
        *
        * @hooked ras_dashen_front_display_secondary_services_post_cards_action - 10
        */
        do_action( 'ras_dashen_front_display_secondary_services_post_cards' );
       } elseif ( 'page' === $secondary_services_content ) {
         /**
        * Hook - ras_dashen_front_display_secondary_services_page_cards
        *
        * @hooked ras_dashen_front_display_secondary_services_page_cards_action - 10
        */
        do_action( 'ras_dashen_front_display_secondary_services_page_cards' );
       }
       
        
      } else {

        /**
        * Hook - ras_dashen_front_display_secondary_services_custom_cards
        *
        * @hooked ras_dashen_front_display_secondary_services_custom_cards_action - 10
        */
        do_action( 'ras_dashen_front_display_secondary_services_custom_cards' );

      }

    endif;
  }
}

/**
* display secondary services highlight section
*/
if ( ! function_exists( 'ras_dashen_front_secondary_services_section_header_action' ) ) :

  function ras_dashen_front_secondary_services_section_header_action() {

    // Get default customization
    $default = ras_dashen_get_default_mods();

    // section title
    $sec_service_title = get_theme_mod( 'ras_dashen_front_secondary_services_highlight_section_heading', $default['ras_dashen_front_secondary_services_highlight_section_heading'] );

    // section intro text
    $sec_service_intro_content = get_theme_mod( 'ras_dashen_front_secondary_services_highlight_section_txt', $default['ras_dashen_front_secondary_services_highlight_section_txt'] );

    if ( $sec_service_title || $sec_service_intro_content ) { ?>
      <div class="col-12 sectionhead-wrap">
      <?php
      if ( $sec_service_title ) :
      ?>  
        <h1 class="section-title"><?php echo apply_filters( 'the_title', $sec_service_title ); ?></h1>
      <?php endif; ?>

      <?php if ( $sec_service_intro_content ) : ?>
        <p class="section-description"><?php echo apply_filters( 'the_content', $sec_service_intro_content ); ?></p>
      <?php 
      endif; 
    
      ?>
      </div><!-- .sectionhead-wrap -->
      <?php
    }

  }
  
endif;



/**
* secondary services cards from selected posts
*/
if ( ! function_exists( 'ras_dashen_front_display_secondary_services_post_cards_action' ) ) :

  function ras_dashen_front_display_secondary_services_post_cards_action() {

    // Get default customization
    $default = ras_dashen_get_default_mods();

    $sec_service_cards_num = absint( get_theme_mod( 'ras_dashen_secondary_services_num_of_highlight_cards', $default['ras_dashen_secondary_services_num_of_highlight_cards'] ) );

    // link btn text
    $sec_service_cards_btn_txt = __( 'Learn More ', 'ras-dashen' );

    // selected posts
    for ( $f = 0; $f < $sec_service_cards_num; $f++ ) {

      $sec_service_pst = ( get_theme_mod( 'ras_dashen_secondary_services_highlight_card_post_' . $f ) ) ? get_theme_mod( 'ras_dashen_secondary_services_highlight_card_post_' . $f ) : '' ;

      if ( '' !== $sec_service_pst ) :
        // title 
        $sec_service_pst_title = get_the_title( $sec_service_pst );

        // link 
        $sec_service_pst_link = get_permalink( $sec_service_pst );

        // excerpt 
        $sec_service_pst_excerpt = get_the_excerpt( $sec_service_pst );
      endif;
    ?>
      <div id="secondary-service-<?php echo $sec_service_pst; ?>" class="col secondary-service-col">
        <div class="card service-card">
          <?php  
            if ( has_post_thumbnail( $sec_service_pst ) ) {
              
              echo get_the_post_thumbnail( $sec_service_pst, 'ras-dashen-featured-img-min', 
                    array(
                      'class' =>  esc_attr( 'card-img-top' ),
                      'alt'   =>  the_title_attribute( array(
                      'echo'  =>  false
                      ) ),
                    ) 
                  );  
            }
          ?>
          <div class="card-body">
            <h2 class="card-title">
              <a href="<?php echo esc_url( $sec_service_pst_link ); ?>">
                <?php  
                  // displaying title
                  echo sprintf( esc_html__( '%s', 'ras-dashen' ), $sec_service_pst_title );
                ?>
              </a>
            </h2>
            <p class="card-text">
              <?php  
                // displaying excerpt
                echo sprintf( esc_html__( '%s', 'ras-dashen' ), $sec_service_pst_excerpt );
              ?>
            </p>
            <a class="btn-main-dark" href="<?php echo esc_url( $sec_service_pst_link ); ?>"><?php echo $sec_service_cards_btn_txt; ?><i class="fa fa-arrow-right"></i></a>
          </div>
        </div><!-- .card -->
      </div><!-- #secondary-service-<?php echo $sec_service_pst; ?> -->
    <?php
      
    } // end for loop

  }

endif;
add_action( 'ras_dashen_front_display_secondary_services_post_cards', 'ras_dashen_front_display_secondary_services_post_cards_action', 10 );


/**
* secondary services cards from selected pages
*/
if ( ! function_exists( 'ras_dashen_front_display_secondary_services_page_cards_action' ) ) :

  function ras_dashen_front_display_secondary_services_page_cards_action() {

    // Get default customization
    $default = ras_dashen_get_default_mods();

    // num of cards
    $sec_service_cards_num = absint( get_theme_mod( 'ras_dashen_secondary_services_num_of_highlight_cards', $default['ras_dashen_secondary_services_num_of_highlight_cards'] ) );

    // selected pages loop
    for ( $f = 0; $f < $sec_service_cards_num; $f++ ) {

      // selected pages
      $sec_service_pg = ( get_theme_mod( 'ras_dashen_secondary_services_highlight_card_page_' . $f ) ) ? get_theme_mod( 'ras_dashen_secondary_services_highlight_card_page_' . $f ) : '' ;

      // custom imgs
      $sec_service_pg_img = ( get_theme_mod( 'ras_dashen_secondary_services_highlight_img_page_' . $f ) ) ? get_theme_mod( 'ras_dashen_secondary_services_highlight_img_page_' . $f ) : '' ;

      if ( '' !== $sec_service_pg ) :
        // title 
        $sec_service_pg_card_title = get_the_title( $sec_service_pg );

        // link 
        $sec_service_pg_card_link = get_permalink( $sec_service_pg );

        // excerpt 
        // $sec_service_pg_card_excerpt = get_the_excerpt( $sec_service_pg );
      endif;
    ?>
      <div id="secondary-service-<?php echo $sec_service_pg; ?>" class="col secondary-service-col">
        <div class="card service-card">
          <?php  
            if ( $sec_service_pg_img ) {
              // display image
              echo wp_get_attachment_image( 
                $sec_service_pg_img, 
                'ras-dashen-featured-img-min', 
                array( 
                  'class' => esc_attr( 'card-img-top'),
                  'alt'   => sprintf( esc_html__( '%s', 'ras-dashen' ), $sec_service_pg_card_title ) 
                ) 
              );
            }
          ?>
          <div class="card-body">
            <h2 class="card-title">
              <a href="<?php echo esc_url( $sec_service_pg_card_link ); ?>">
                <?php  
                  // displaying title
                  echo sprintf( esc_html__( '%s', 'ras-dashen' ), $sec_service_pg_card_title );
                ?>
              </a>
            </h2>
          </div>
        </div><!-- .card -->
      </div><!-- #secondary-service-<?php echo $sec_service_pg; ?> -->
    <?php
      
    } // end for loop
 
  }

endif;
add_action( 'ras_dashen_front_display_secondary_services_page_cards', 'ras_dashen_front_display_secondary_services_page_cards_action', 10 );


/**
* secondary services custom cards from theme customizer
*/
if ( ! function_exists( 'ras_dashen_front_display_secondary_services_custom_cards_action' ) ) :

  function ras_dashen_front_display_secondary_services_custom_cards_action() {

    // Get default customization
    $default = ras_dashen_get_default_mods();

    // num of cards
    $sec_service_cards_num = absint( get_theme_mod( 'ras_dashen_secondary_services_num_of_highlight_cards', $default['ras_dashen_secondary_services_num_of_highlight_cards'] ) );

    // link btn text
    $sec_service_cards_btn_txt = 'Learn More';

    $sec_service_cards = array();

        for ( $f = 0; $f < $sec_service_cards_num; $f++ ) {

            // title for card content
            $sec_service_cards['title'] = get_theme_mod( 'ras_dashen_custom_secondary_services_highlight_card_title_' . $f, $default['ras_dashen_custom_secondary_services_highlight_card_title'] );

            // desc for card content
            $sec_service_cards['desc'] = get_theme_mod( 'ras_dashen_custom_secondary_services_highlight_card_description_' . $f, $default['ras_dashen_custom_secondary_services_highlight_card_description'] );

            // desc for card content
            $sec_service_cards['link'] = get_theme_mod( 'ras_dashen_custom_secondary_services_highlight_link_' . $f );


            // custom image
            $sec_service_cards['img'] = get_theme_mod( 'ras_dashen_secondary_services_highlight_img_custom_card_' . $f );

            $card_img_url = wp_get_attachment_url( $sec_service_cards['img'] );


            // check for not empty custom content
            if ( $sec_service_cards ) {
            ?>
            <div id="secondary-service-<?php echo $f; ?>" class="col secondary-service-col">
              <div class="card service-card">
                <?php
                  // get custom images
                  if ( $card_img_url ) :
                ?>
                    <img src="<?php echo esc_url( $card_img_url ); ?>" class="card-img-top" alt="<?php echo sprintf( esc_html__( '%s', 'ras-dashen' ), $sec_service_cards['title'] ); ?>">
                <?php
                  endif;
                ?>
                <div class="card-body">
                <?php if ( $sec_service_cards['title'] ) : ?>
                  <h2 class="card-title">
                  <?php if ( $sec_service_cards['link'] ) { ?>
                    <a href="<?php echo esc_url( $sec_service_cards['link'] ); ?>">
                    <?php echo sprintf( esc_html__( '%s', 'ras-dashen' ), $sec_service_cards['title'] ); ?>
                    </a>
                  <?php 
                      } else {
                        echo sprintf( esc_html__( '%s', 'ras-dashen' ), $sec_service_cards['title'] );
                      } 
                  ?>
                  </h2>
                <?php endif; ?>
                <?php if ( $sec_service_cards['desc'] ) { ?>
                  <p class="card-text">
                    <?php echo sprintf( esc_html__( '%s', 'ras-dashen' ), $sec_service_cards['desc'] ); ?>
                  </p>
                <?php } ?>

                <?php  
                  // the btn link
                  $card_btn_link = sprintf(
                    '<a class="btn-main-dark" href="%1$s">%2$s<i class="fa fa-arrow-right"></i></a>',
                    esc_url( $sec_service_cards['link'] ),
                    sprintf(
                      /* translators:*/
                      esc_html__( '%s ', 'ras-dashen' ),
                      $sec_service_cards_btn_txt
                    )
                  );

                  echo $card_btn_link;
                ?>
                </div>
              </div><!-- .card -->
            </div><!-- #secondary-service-<?php echo $f; ?> -->
          <?php
          } // if ( $sec_service_cards )

        } // end for()
  }
  
endif;
add_action( 'ras_dashen_front_display_secondary_services_custom_cards', 'ras_dashen_front_display_secondary_services_custom_cards_action', 10 );


/**
* ------------------------------------------------------------------------------------
* Functions for frontpage featured_resources section
* ------------------------------------------------------------------------------------ 
*/

/**
* display featured resources section title and description
*
*/
if ( ! function_exists( 'ras_dashen_front_featured_resources_section_header_action' ) ) :

  function ras_dashen_front_featured_resources_section_header_action() {

    // Get default customization
    $default = ras_dashen_get_default_mods();

    // section title
    $section_title = get_theme_mod( 'ras_dashen_front_featured_resources_highlight_section_heading', $default['ras_dashen_front_featured_resources_highlight_section_heading'] );

    // section intro text
    $section_description = get_theme_mod( 'ras_dashen_front_featured_resources_highlight_section_txt', $default['ras_dashen_front_featured_resources_highlight_section_txt'] );

    if ( $section_title || $section_description ) { ?>
      <div class="col-12 sectionhead-wrap">
      <?php
      if ( $section_title ) :
      ?>  
        <h1 class="section-title"><?php echo apply_filters( 'the_title', $section_title ); ?></h1>
      <?php endif; ?>

      <?php if ( $section_description ) : ?>
        <p class="section-description"><?php echo apply_filters( 'the_content', $section_description ); ?></p>
      <?php 
      endif; 
    
      ?>
      </div><!-- .sectionhead-wrap -->
      <?php
    }

  }
  
endif;


/**
* template function to display selected featured resources
*/
if ( ! function_exists( 'ras_dashen_display_selected_front_featured_resources_action' ) ) :

  function ras_dashen_display_selected_front_featured_resources_action() {

    // Get default customization
    $default = ras_dashen_get_default_mods();

    // num of posts
    $num_of_posts = absint( get_theme_mod( 'ras_dashen_featured_resources_num_of_highlight_cards', $default['ras_dashen_featured_resources_num_of_highlight_cards'] ) );

    // link btn text
    $btn_text = __( 'Learn More ', 'ras-dashen' );

    // selected posts
    for ( $i = 0; $i < $num_of_posts; $i++ ) {

      $selected_post = ( get_theme_mod( 'ras_dashen_featured_resources_highlight_card_post_' . $i ) ) ? get_theme_mod( 'ras_dashen_featured_resources_highlight_card_post_' . $i ) : '' ;

      if ( '' !== $selected_post ) :
        // title 
        $selected_post_title = get_the_title( $selected_post );

        // link 
        $selected_post_link = get_permalink( $selected_post );

        // excerpt 
        $selected_post_excerpt = get_the_excerpt( $selected_post );
      endif;
    ?>
      <div id="featured-resource-<?php echo $selected_post; ?>" class="col resource-col">
        <div class="card resource-card">
          <div class="card-body">
            <h2 class="card-title">
              <a href="<?php echo esc_url( $selected_post_link ); ?>">
                <?php  
                  // displaying title
                  echo sprintf( esc_html__( '%s', 'ras-dashen' ), $selected_post_title );
                ?>
              </a>
            </h2>
            <p class="card-text">
              <?php  
                // displaying excerpt
                echo sprintf( esc_html__( '%s', 'ras-dashen' ), $selected_post_excerpt );
              ?>
            </p>
            <a class="btn-main-dark" href="<?php echo esc_url( $selected_post_link ); ?>"><?php echo $btn_text; ?><i class="fa fa-arrow-right"></i></a>
          </div>
          <?php  
            if ( has_post_thumbnail( $selected_post ) ) {
              
              echo get_the_post_thumbnail( $selected_post, 'ras-dashen-featured-img-min', 
                    array(
                      'class' =>  esc_attr( 'card-img-bottom' ),
                      'alt'   =>  the_title_attribute( array(
                      'echo'  =>  false
                      ) ),
                    ) 
                  );  
            }
          ?>
        </div><!-- .card -->
      </div><!-- #featured-resource-<?php echo $selected_post; ?> -->
    <?php
      
    } // end for loop

  }

endif;


/**
* current_affairs on frontpage
*/
if ( ! function_exists( 'ras_dashen_front_current_affairs_display_action' ) ) {
  function ras_dashen_front_current_affairs_display_action() {

    // Get selected category
    $selected_cat = get_theme_mod( 'ras_dashen_front_current_affairs_category', 0 );

    // number of posts to display
    $num_posts = get_theme_mod( 'ras_dashen_num_of_current_affairs_posts', 4 );

    $affairs_args = array(
      'post_type'       =>  'post',
      'cat'             =>  $selected_cat,
      'posts_per_page'  =>  $num_posts,
      'post_status'     =>  'publish',
      'orderby'         =>  'date',
      'order'           =>  'DESC',
      );

    $current_affairs = new WP_Query( $affairs_args );
    ?>
    <div class="offset-md-2 col-md-8 offseted-carousel">
    <?php
    if ( $current_affairs->have_posts() ) {
      $j = 0;
    ?>
      <div id="currentAffairsCar" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        <?php  
        while ( $current_affairs->have_posts() ) { $current_affairs->the_post();
          
          $car_item_class[$j] = ( $j == 0 ) ? array( 'carousel-item active' ) : array( 'carousel-item' ) ;
        ?>
            <div id="latest-affair-<?php the_ID(); ?>" class="<?php echo esc_attr( implode( ' ', $car_item_class[$j] ) ); ?>">

              <?php
              if ( has_post_thumbnail() ) {

                $carousel_img_class = array( 'd-block w-50 clipped-pointed-r' );

                the_post_thumbnail( 
                  'ras-dashen-featured-img-min', 
                  array(
                    'class' =>  esc_attr( implode( ' ', $carousel_img_class ) ),
                    'alt'   =>  the_title_attribute( 
                      array(
                        'echo'  =>  false
                      ) 
                    ),
                  ) 
                );  
              } 
            ?>
              <div class="carousel-caption clipped-arrow-r">
                  <?php
                    // display title 
                  echo sprintf( 
                    '<h2 class="entry-title"><a href="%1$s" rel="bookmark">%2$s</a></h2>', 
                     esc_url( get_permalink() ), 
                     sprintf( __( '%s', 'ras-dashen' ), 
                      esc_html( get_the_title() )
                      )
                    );

                  // display excerpt
                  // echo sprintf( '<p>%1$s</p>', sprintf( esc_html__( '%s', 'ras-dashen' ), get_the_excerpt() ) );
              ?>
              </div>
            </div>
        <?php
          $j++; 
        }
        wp_reset_postdata(); 
        ?>
          
        </div><!-- .carousel-inner -->

        <a class="carousel-control-prev" href="#currentAffairsCar" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#currentAffairsCar" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div><!-- #currentAffairsCar -->
    <?php
    } // end if
    ?>
    </div>
    <?php
  }
}
add_action( 'ras_dashen_front_current_affairs_display', 'ras_dashen_front_current_affairs_display_action', 10 );

// current_affairs section title
if ( ! function_exists( 'ras_dashen_front_current_affairs_section_title_action' ) ) {
  function ras_dashen_front_current_affairs_section_title_action() {

    // Get default customization
    $default = ras_dashen_get_default_mods();

    // get the section title
    $section_title = esc_attr( get_theme_mod( 'ras_dashen_front_current_affairs_section_heading', $default['ras_dashen_front_current_affairs_section_heading'] ) );

    if ( '' !== $section_title ) :
    ?>
    <div class="col-12 ui-front-heading">
      <h1 class="heading-title"><?php echo sprintf( esc_html__( '%s', 'ras-dashen' ), $section_title ); ?></h1>
    </div>
    <?php
    endif;
  }
}
add_action( 'ras_dashen_front_current_affairs_section_title', 'ras_dashen_front_current_affairs_section_title_action', 10 );

// frontpage template helper functions
require get_template_directory() . '/inc/frontpage-template-helpers.php';