<?php
/**
* function hooks for Social media links, and share buttons
*
* @package Ras_Dashen 
* @since 1.0.0
*/

/** 
*   Function hook for social media links bar at header
*/
if ( ! function_exists( 'ras_dashen_header_social_media_links_action' ) ) :

    function ras_dashen_header_social_media_links_action() {

        // Get default customization
        $default = ras_dashen_get_default_mods();

        // Enable social media link navbar
        $ras_dashen_social_media_nav_enabled = get_theme_mod( 'enable_ras_dashen_social_media_link_nav', $default['enable_ras_dashen_social_media_link_nav'] );

        // Social media navbar at header
        $ras_dashen_social_media_at_header = get_theme_mod( 'ras_dashen_enable_social_media_on_header', $default['ras_dashen_enable_social_media_on_header'] );

        if ( false == $ras_dashen_social_media_nav_enabled ) {
            return;
        }

        if ( false != $ras_dashen_social_media_at_header ) :

            $link_to_facebook = get_theme_mod( 'ras_dashen_facebook_link_username', $default['ras_dashen_facebook_link_username'] );
            $link_to_twitter = get_theme_mod( 'ras_dashen_twitter_link_username', $default['ras_dashen_twitter_link_username'] );
            $link_to_googleplus = get_theme_mod( 'ras_dashen_googleplus_link_username', $default['ras_dashen_googleplus_link_username'] );
            $link_to_pinterest = get_theme_mod( 'ras_dashen_pinterest_link_username', $default['ras_dashen_pinterest_link_username'] );
            $link_to_linkedin = get_theme_mod( 'ras_dashen_linkedin_link_username', $default['ras_dashen_linkedin_link_username'] );
            $link_to_instagram = get_theme_mod( 'ras_dashen_instagram_link_username', $default['ras_dashen_instagram_link_username'] );
            $link_to_youtube = get_theme_mod( 'ras_dashen_youtube_link_username', $default['ras_dashen_youtube_link_username'] );

            ?>
            
            <div class="social-menu">

                <?php 
                if ( ! empty($link_to_facebook) ) : ?>
                    <a target="_blank" class="btn btn-socmedia-circle" href="https://www.facebook.com/<?php echo esc_attr( $link_to_facebook ); ?>">
                        <i class="d-block fab fa-facebook-f"></i>
                    </a>
                <?php

                endif;

                // Enabling twitter button
                if ( ! empty($link_to_twitter) ) :  
                ?>
                    <a target="_blank" class="btn btn-socmedia-circle ml-1" href="https://twitter.com/<?php echo esc_attr( $link_to_twitter ); ?>">
                        <i class="d-block fab fa-twitter"></i>
                    </a>
                <?php

                endif;

                // Enabling googleplus button
                if ( ! empty($link_to_googleplus) ) :  
                ?>
                    <a target="_blank" class="btn btn-socmedia-circle ml-1" href="https://plus.google.com/<?php echo esc_attr( $link_to_googleplus ); ?>">
                        <i class="d-block fab fa-google-plus-g"></i>
                    </a>
                <?php

                endif;

                // Enabling pinterest button
                if ( ! empty($link_to_pinterest) ) :  
                ?>
                    <a target="_blank" class="btn btn-socmedia-circle ml-1" href="https://www.pinterest.com/<?php echo esc_attr( $link_to_pinterest ); ?>">
                        <i class="d-block fab fa-pinterest-p"></i>
                    </a>
                <?php

                endif;

                // Enabling linkedin button
                if ( ! empty($link_to_linkedin) ) :  
                ?>
                    <a target="_blank" class="btn btn-socmedia-circle ml-1" href="https://www.linkedin.com/in/<?php echo esc_attr( $link_to_linkedin ); ?>">
                        <i class="d-block fab fa-linkedin-in"></i>
                    </a>
                <?php

                endif;

                // Enabling instagram button
                if ( ! empty($link_to_instagram) ) :  
                ?>
                    <a target="_blank" class="btn btn-socmedia-circle ml-1" href="https://www.instagram.com/<?php echo esc_attr( $link_to_instagram ); ?>">
                        <i class="d-block fab fa-instagram"></i>
                    </a>
                <?php

                endif;

                // Enabling youtube button
                if ( ! empty($link_to_youtube) ) :
                ?>
                    <a target="_blank" class="btn btn-socmedia-circle ml-1" href="https://www.youtube.com/<?php echo esc_attr( $link_to_youtube ); ?>">
                        <i class="d-block fab fa-youtube"></i>
                    </a>
                <?php

                endif;
                ?>
            </div>
 
    <?php
        endif;
    }

endif;

add_action( 'ras_dashen_header_social_media_links', 'ras_dashen_header_social_media_links_action', 10 );

/** 
*   Function hook for social media links bar at footer
*/
if ( ! function_exists( 'ras_dashen_footer_social_media_links_action' ) ) :

    function ras_dashen_footer_social_media_links_action() {

        // Get default customization
        $default = ras_dashen_get_default_mods();

        // Get enabler of social media link navbar
        $ras_dashen_social_media_nav_enabled = get_theme_mod( 'enable_ras_dashen_social_media_link_nav', $default['enable_ras_dashen_social_media_link_nav'] );

        // Get enabler of social media navbar at footer
        $ras_dashen_social_media_at_footer = get_theme_mod( 'ras_dashen_enable_social_media_on_footer', $default['ras_dashen_enable_social_media_on_footer'] );

        if ( false == $ras_dashen_social_media_nav_enabled ) {

            return;
            
        }

        if ( false != $ras_dashen_social_media_at_footer ) :

            $link_to_facebook = get_theme_mod( 'ras_dashen_facebook_link_username', $default['ras_dashen_facebook_link_username'] );
            $link_to_twitter = get_theme_mod( 'ras_dashen_twitter_link_username', $default['ras_dashen_twitter_link_username'] );
            $link_to_googleplus = get_theme_mod( 'ras_dashen_googleplus_link_username', $default['ras_dashen_googleplus_link_username'] );
            $link_to_pinterest = get_theme_mod( 'ras_dashen_pinterest_link_username', $default['ras_dashen_pinterest_link_username'] );
            $link_to_linkedin = get_theme_mod( 'ras_dashen_linkedin_link_username', $default['ras_dashen_linkedin_link_username'] );
            $link_to_instagram = get_theme_mod( 'ras_dashen_instagram_link_username', $default['ras_dashen_instagram_link_username'] );
            $link_to_youtube = get_theme_mod( 'ras_dashen_youtube_link_username', $default['ras_dashen_youtube_link_username'] );

            ?>

            <div class="row ui-footer-social">
                <div class="col-md-6 justify-content-between my-2">
                    <?php 
                    if ( ! empty($link_to_facebook) ) : ?>
                        <a target="_blank" class="btn btn-sm btn-socmedia-circle ml-1" href="https://www.facebook.com/<?php echo esc_attr( $link_to_facebook ); ?>">
                            <i class="d-block fab fa-facebook-f"></i>
                        </a>
                    <?php

                    endif;

                    // Enabling twitter button
                    if ( ! empty($link_to_twitter) ) :  
                    ?>

                        <a target="_blank" class="btn btn-sm btn-socmedia-circle ml-1" href="https://twitter.com/<?php echo esc_attr( $link_to_twitter); ?>">
                            <i class="d-block fab fa-twitter"></i>
                        </a>

                    <?php

                    endif;

                    // Enabling googleplus button
                    if ( ! empty($link_to_googleplus) ) :  
                    ?>
                        <a target="_blank" class="btn btn-sm btn-socmedia-circle ml-1" href="https://plus.google.com/<?php echo esc_attr( $link_to_googleplus); ?>">
                            <i class="d-block fab fa-google-plus-g"></i>
                        </a>

                    <?php

                    endif;

                    // Enabling pinterest button
                    if ( ! empty($link_to_pinterest) ) :  
                    ?>
                        <a target="_blank" class="btn btn-sm btn-socmedia-circle ml-1" href="https://www.pinterest.com/<?php echo esc_attr( $link_to_pinterest); ?>">
                            <i class="d-block fab fa-pinterest-p"></i>
                        </a>

                    <?php

                    endif;

                    // Enabling linkedin button
                    if ( ! empty($link_to_linkedin) ) :  
                    ?>
                        <a target="_blank" class="btn btn-sm btn-socmedia-circle ml-1" href="https://www.linkedin.com/in/<?php echo esc_attr( $link_to_linkedin); ?>">
                            <i class="d-block fab fa-linkedin-in"></i>
                        </a>
                    <?php

                    endif;

                    // Enabling instagram button
                    if ( ! empty($link_to_instagram) ) :  
                    ?>
                        <a target="_blank" class="btn btn-sm btn-socmedia-circle ml-1" href="https://www.instagram.com/<?php echo esc_attr( $link_to_instagram); ?>">
                            <i class="d-block fab fa-instagram"></i>
                        </a>
                    <?php

                    endif;

                    // Enabling youtube button
                    if ( ! empty($link_to_youtube) ) :
                    ?>
                        <a target="_blank" class="btn btn-sm btn-socmedia-circle ml-1" href="https://www.youtube.com/<?php echo esc_attr( $link_to_youtube); ?>">
                            <i class="d-block fab fa-youtube"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div><!-- .row.ui-footer-social -->
    <?php
        endif;
     }

endif;

add_action( 'ras_dashen_footer_social_media_links', 'ras_dashen_footer_social_media_links_action', 10 );

/** 
*   social media sharing for standard posts
*/
if ( ! function_exists( 'ras_dashen_post_social_media_share_action' ) ) :

    function ras_dashen_post_social_media_share_action() {

        global $post;

        // Get default customization
        $default = ras_dashen_get_default_mods();

        $ras_dashen_enable_post_share = get_theme_mod( 'enable_ras_dashen_social_media_sharing', $default['enable_ras_dashen_social_media_sharing'] );

        if ( false == $ras_dashen_enable_post_share ) {

        	return;

        }

        $share_to_facebook = get_theme_mod( 'ras_dashen_select_facebook_to_share_post', $default['ras_dashen_select_facebook_to_share_post'] );
        $share_to_twitter = get_theme_mod( 'ras_dashen_select_twitter_to_share_post', $default['ras_dashen_select_twitter_to_share_post'] );
        $share_to_googleplus = get_theme_mod( 'ras_dashen_select_googleplus_to_share_post', $default['ras_dashen_select_googleplus_to_share_post'] );
        $share_to_pinterest = get_theme_mod( 'ras_dashen_select_pinterest_to_share_post', $default['ras_dashen_select_pinterest_to_share_post'] );
        $share_to_linkedin = get_theme_mod( 'ras_dashen_select_linkedin_to_share_post', $default['ras_dashen_select_linkedin_to_share_post'] );

        ?>          
        <div class="col-12">
            <ul class="nav ras-dashen-nav-pills">
                <li class="nav-item ras_dashen_social_item">
                    <i class="fa fa-share-alt"></i>
                </li>
            <?php

                if ( $share_to_facebook != false )  :
            ?>
                <li class="nav-item ras_dashen_social_item"> 
                    <a title="Share on Facebook" href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>&t=<?php echo get_the_title() . ' - '; bloginfo( 'name' ); ?>" class="nav-link social_share_link social_facebook" data-toggle="pill"><i class="d-block fab fa-facebook-f"></i></a> 
                </li>
            <?php

                endif;  
            
                if ( $share_to_twitter != false ) :
            ?>
                <li class="nav-item ras_dashen_social_item"> 
                    <a title="Share on Twitter" href="https://twitter.com/intent/tweet?text=<?php echo get_the_title() . ' - '; bloginfo( 'name' ); echo ' Check this out!'; ?>&url=<?php echo get_permalink(); ?>" class="nav-link social_share_link social_twitter" data-toggle="pill"><i class="d-block fab fa-twitter"></i></a> 
                </li>
            <?php

                endif;  
            
                if ( $share_to_googleplus != false ) :
            ?>
                <li class="nav-item ras_dashen_social_item"> 
                    <a title="Share on Google+" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" class="nav-link social_share_link social_gplus" data-toggle="pill"><i class="d-block fab fa-google-plus-g"></i></a> 
                </li>
            <?php

                endif;  
            
                if ( $share_to_pinterest != false ) :
            ?>
                <li class="nav-item ras_dashen_social_item"> 
                    <a title="Share on Pinterest" href="https://www.pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&media=<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>&description=<?php echo get_the_title() . ' - '; bloginfo( 'name' ); ?>" class="nav-link social_share_link social_pinterest" data-toggle="pill"><i class="d-block fab fa-pinterest-p"></i></a> 
                </li>
            <?php

                endif;  
            
                if ( $share_to_linkedin != false )  :
            ?>
                <li class="nav-item ras_dashen_social_item"> 
                    <a title="Share on LinkedIn" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>&title=<?php echo get_the_title() . ' - '; bloginfo( 'name' ); ?>&summary=<?php echo get_the_title() . ' - '; bloginfo( 'name' ); ?>" class="nav-link social_share_link social_linkden" data-toggle="pill"><i class="d-block fab fa-linkedin-in"></i></a> 
                </li>
            <?php

                endif;  
            
            ?>
            </ul>
        </div>

    <?php

     }

endif;

add_action( 'ras_dashen_post_social_media_share', 'ras_dashen_post_social_media_share_action', 10 );

/** 
*   Media post's social media sharing feature
*/
if ( ! function_exists( 'ras_dashen_media_posts_social_sharing_feature_action' ) ) :

    function ras_dashen_media_posts_social_sharing_feature_action() {

        global $post;

        // Get default customization
        $default = ras_dashen_get_default_mods();

        $type = get_post_format($post->ID);

        $ras_dashen_enable_media_post_share = boolval( get_theme_mod( 'ras_dashen_enable_media_posts_social_sharing_feature', $default['ras_dashen_enable_media_posts_social_sharing_feature'] ) );

        if ( false != $ras_dashen_enable_media_post_share ) :


        $share_to_facebook = boolval( get_theme_mod( 'ras_dashen_select_facebook_for_media_posts', $default['ras_dashen_select_facebook_for_media_posts'] ) );
        $share_to_twitter = boolval( get_theme_mod( 'ras_dashen_select_twitter_for_media_posts', $default['ras_dashen_select_twitter_for_media_posts'] ) );
        $share_to_googleplus = boolval( get_theme_mod( 'ras_dashen_select_googleplus_for_media_posts', $default['ras_dashen_select_googleplus_for_media_posts'] ) );
        $share_to_pinterest = boolval( get_theme_mod( 'ras_dashen_select_pinterest_for_media_posts', $default['ras_dashen_select_pinterest_for_media_posts'] ) );
        $share_to_linkedin = boolval( get_theme_mod( 'ras_dashen_select_linkedin_for_media_posts', $default['ras_dashen_select_linkedin_for_media_posts'] ) );
       

        ?>          
        <div class="d-flex justify-content-between align-items-center mt-1 entry-footer">
            <div class="btn-group media-share-btns">
                <button type="button" class="btn btn-social-share" title="<?php sprintf(esc_html__( 'Share %1$s', 'ras-dashen' ), $type); ?>"><i class="fa fa-share"></i></button>

                <div class="media-sharer-group" role="group">
                    <?php
                        if ( $share_to_facebook != false )  :
                    ?> 
                            <a title="Share on Facebook" href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink(); ?>&t=<?php echo get_the_title() . ' - '; bloginfo( 'name' ); ?>" class="btn media-sharing-btn social_share_link"><i class="fab fa-facebook-f"></i></a> 
                    <?php

                        endif;  

                        if ( $share_to_twitter != false ) :
                    ?> 
                            <a title="Share on Twitter" href="https://twitter.com/intent/tweet?text=<?php echo get_the_title() . ' - '; bloginfo( 'name' ); echo ' Check this out!'; ?>&url=<?php echo get_permalink(); ?>" class="btn media-sharing-btn social_share_link"><i class="fab fa-twitter"></i></a> 
                    <?php

                        endif;

                        if ( $share_to_pinterest != false ) :
                    ?> 
                            <a title="Pin" href="https://www.pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&media=<?php echo esc_url(ras_dashen_display_embedded_media(array($type, 'iframe' ))); ?>&description=<?php get_the_title() . ' - '; bloginfo( 'name' ); ?>" class="btn media-sharing-btn social_share_link"><i class="fab fa-pinterest-p"></i></a> 
                    <?php

                        endif;  

                        if ( $share_to_linkedin != false )  :
                    ?> 
                            <a title="Share on LinkedIn" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>&title=<?php echo get_the_title() . ' - '; bloginfo( 'name' ); ?>&summary=<?php echo get_the_title() . ' - '; bloginfo( 'name' ); ?>" class="btn media-sharing-btn social_share_link"><i class="fab fa-linkedin-in"></i></a> 
                    <?php

                        endif;  

                        if ( $share_to_googleplus != false ) :
                    ?> 
                            <a title="Share on Google+" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" class="btn media-sharing-btn social_share_link"><i class="fab fa-google-plus-g"></i></a> 
                    <?php

                        endif;  
                    ?>
                </div>
            </div>
        </div>

    <?php
        endif;
     }

endif;

add_action( 'ras_dashen_media_posts_social_sharing_feature', 'ras_dashen_media_posts_social_sharing_feature_action', 10 );