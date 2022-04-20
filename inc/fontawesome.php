<?php
/**
* Font Awesome CDN Setup Webfont
*
* This is a function provided by fontawesome for enqueueing it in WordPress
*
* For further info, see
* @link https://fontawesome.com/v5.15/how-to-use/customizing-wordpress/snippets/setup-cdn-webfont
*
* Lay the Foundation
* First we’ll lay a foundation with this function that you’ll call one or more times to set up 
* the bits and pieces of Font Awesome that you choose.
*
* This will load Font Awesome from the Font Awesome Free or Pro CDN.
*/
if ( ! function_exists( 'ras_dashen_fa_custom_setup_cdn_webfont' )  ) {
  function ras_dashen_fa_custom_setup_cdn_webfont( $cdn_url = '', $integrity = null ) {
    $matches = [];
    $match_result = preg_match( '|/([^/]+?)\.css$|', $cdn_url, $matches );
    $resource_handle_uniqueness = ( $match_result === 1 ) ? $matches[1] : md5( $cdn_url );
    $resource_handle = "font-awesome-cdn-webfont-$resource_handle_uniqueness";

    foreach ( [ 'wp_enqueue_scripts', 'admin_enqueue_scripts', 'login_enqueue_scripts' ] as $action ) {
      add_action(
        $action,
        function () use ( $cdn_url, $resource_handle ) {
          wp_enqueue_style( $resource_handle, $cdn_url, [], null );
        }
      );
    }

    if( $integrity ) {
      add_filter(
        'style_loader_tag',
        function( $html, $handle ) use ( $resource_handle, $integrity ) {
          if ( in_array( $handle, [ $resource_handle ], true ) ) {
            return preg_replace(
              '/\/>$/',
              'integrity="' . $integrity .
              '" crossorigin="anonymous" />',
              $html,
              1
            );
          } else {
            return $html;
          }
        },
        10,
        2
      );
    }
  }
}