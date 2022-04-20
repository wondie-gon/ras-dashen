<?php
/**
* Functions to be hooked for inner bottom row footer widget areas
*
* @package Ras_Dashen 
* @since 1.0.0
*
*/

/*
* Function hook to display bottom footer row layout
*/
if ( ! function_exists( 'ras_dashen_bottom_extra_footer_action' ) ) :

	function ras_dashen_bottom_extra_footer_action() {

		$ras_dashen_footer_page_link_1 = get_theme_mod( 'ras_dashen_extra_bottom_footer_page_link_1' );

		$ras_dashen_footer_page_link_2 = get_theme_mod( 'ras_dashen_extra_bottom_footer_page_link_2' );

		if ( ! empty($ras_dashen_footer_page_link_1) ) :

            $ras_dashen_footer_page_link_1 = absint( $ras_dashen_footer_page_link_1 );

            ?>

            <div class="col-lg-4 col-6">
		      <p class="mb-0 mt-2"><a href="<?php echo get_permalink( $ras_dashen_footer_page_link_1 ); ?>"><?php echo get_the_title( $ras_dashen_footer_page_link_1 ); ?></a></p>
		    </div>

            <?php

        endif;

        if ( ! empty($ras_dashen_footer_page_link_2) ) :

            $ras_dashen_footer_page_link_2 = absint( $ras_dashen_footer_page_link_2 );

        	?>

        	<div class="col-lg-4 col-6">
		      <p class="mb-0 mt-2"><a href="<?php echo get_permalink( $ras_dashen_footer_page_link_2 ); ?>"><?php echo get_the_title( $ras_dashen_footer_page_link_2 ); ?></a></p>
		    </div>

        	<?php

        endif;

	}
endif;
add_action( 'ras_dashen_bottom_extra_footer', 'ras_dashen_bottom_extra_footer_action', 10 );


/*
* Function for bottom footer copyright notice and related
*/
if ( ! function_exists( 'ras_dashen_bottom_footer_copyright_related_action' ) ) :

    function ras_dashen_bottom_footer_copyright_related_action() {

        // Get default customization
        $default = ras_dashen_get_default_mods();

        // developer company
        $dev_auth_name = esc_attr( 'Wondwossen B.' );
        $dev_comp_name = esc_attr( 'Wonsa Tech PLC' );
        $dev_comp_email = esc_attr( 'wonwosbr@yahoo.com' );
        $dev_comp_phone_disp = esc_attr( '+251-912-16-37-20' );
        $dev_comp_tel_link = esc_attr( '+251912163720' );
        
        // copyright notice
        $ras_dashen_copyright_notice = esc_attr( get_theme_mod( 'ras_dashen_bottom_footer_copyright_text', $default['ras_dashen_bottom_footer_copyright_text'] ) );
        ?>
        <div class="col-md-6">
            <p>          
            <?php

                // the theme
                $theme = wp_get_theme();

                if ( ! empty($ras_dashen_copyright_notice) ) :
                    echo $ras_dashen_copyright_notice;
                else:

                    echo '&copy;' . get_the_date( 'Y' );

                endif;

                $ras_dashen_footer_site_name = get_theme_mod( 'ras_dashen_enable_bottom_footer_site_name', $default['ras_dashen_enable_bottom_footer_site_name'] );

                $ras_dashen_footer_powered_by = get_theme_mod( 'ras_dashen_enable_bottom_footer_powered_by', $default['ras_dashen_enable_bottom_footer_powered_by'] );

                if ( false == $ras_dashen_footer_site_name ) :

                    echo '&nbsp;&nbsp;';

                else:
            ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php bloginfo( 'name' ); ?>
                </a>

                <span class="ml-3"><?php _e( 'All Rights Reserved.', 'ras-dashen' ); ?></span>
            <?php endif; ?>
            </p>
        </div>
        <div class="col-md-6">
            <p>
                <?php 
                // displaying theme name
                if ( false != $ras_dashen_footer_powered_by ) : ?>
                <span class="mr-2">
                <?php 
                    /* translators: %s: CMS name, i.e. WordPress. */
                    printf( esc_html__( 'Powered by %s and ', 'ras-dashen' ), 'WordPress' ); 
                ?>
                </span>
                <span class="mr-2 them-name">
                <?php echo $theme->Name; ?>
                <?php esc_html_e(' theme', 'ras-dashen' ); ?>
                </span>

                <?php 
                echo esc_attr( ' | ' );
                // displaying developer and addr
                esc_html_e( 'Developed by: ', 'ras-dashen' ); ?>
                <span class="dev-auth"><a href="mailto:<?php echo $dev_comp_email; ?>"><?php echo $dev_auth_name; ?></a></span>
                <?php esc_html_e( 'at ', 'ras-dashen' ); ?>
                <span class="mr-2 comp-name"><a href="mailto:<?php echo $dev_comp_email; ?>"><?php echo $dev_comp_name; ?></a></span>
                <span class="comp-tel"><a href="tel:<?php echo $dev_comp_tel_link; ?>"><i class="fa fa-phone mr-2"></i><?php echo $dev_comp_phone_disp; ?></a></span>
                <?php endif; ?>
            </p>
        </div>
        <?php
    }

endif;
add_action( 'ras_dashen_bottom_footer_copyright_related', 'ras_dashen_bottom_footer_copyright_related_action', 10 );


/*
* Function to add scroll to top feature
*/
if ( ! function_exists( 'ras_dashen_scroll_to_top_feature_action' ) ) :

    function ras_dashen_scroll_to_top_feature_action() {

        // Get default customization
        $default = ras_dashen_get_default_mods();
        
        $ras_dashen_scroll_top = get_theme_mod( 'ras_dashen_enable_scroll_to_top_button', $default['ras_dashen_enable_scroll_to_top_button'] );

            if ( false == $ras_dashen_scroll_top ) {
              return;
            }
        ?>
            <span class="btn-scroll-up">&#10162;</span>
        <?php
    }

endif;
add_action( 'ras_dashen_scroll_to_top_feature', 'ras_dashen_scroll_to_top_feature_action', 10 );