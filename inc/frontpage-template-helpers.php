<?php
/**
* Custom helper functions for frontpage templates
*
* @package Ras_Dashen
*
* @since 1.0.0
*/

/**
* Custom function for column classes to achieve front latest pick blocks' staggering display
*
* @param string $blockPosition block's position number from the list of excerpt blocks
* @param array $divHolds string that tells content type held in the block, for ex, img or excerpt
*
* @return string Class name list of the wrapper div
*/
if ( ! function_exists( 'ras_dashen_get_latest_pick_staggered_cols_classes' ) ) :

  function ras_dashen_get_latest_pick_staggered_cols_classes( $blockPosition, $divHolds ) {

    $remainder = intval( $blockPosition ) % 2;

    if ( $remainder != 0 ) {
      $img_wrapper_class = array( 'col-md-5 order-1' );
      $excerpt_wrapper_class = array( 'col-md-7 excerpt-block order-2 py-3' );
    } else {
      $img_wrapper_class = array( 'col-md-5 order-1 order-md-2' );
      $excerpt_wrapper_class = array( 'col-md-7 excerpt-block order-2 order-md-1 py-3' );
    }

    /* prepare class lists to return based on given key name
    *  of $divHolds array param
    */
    if ( 'img' === $divHolds ) {
      $wrapper_class_list = implode( ' ', $img_wrapper_class );
    } else if ( 'excerpt' === $divHolds ) {
      $wrapper_class_list = implode( ' ', $excerpt_wrapper_class );
    }
    
    return $wrapper_class_list;

  }
  
endif;

/**
* Custom helper function to decide svg paths based on excerpt block position
*/
if ( ! function_exists( 'ras_dashen_get_svg_path_based_on_block_position' ) ) {
  function ras_dashen_get_svg_path_based_on_block_position( $blockIndex ) {
    // check if block index even or odd
    $mod = intval( $blockPosition ) % 2;

    $path = '<path d="M 0,150 V 0 L 1440,0 Z" />';

    if ( $mod = (int) 1 ) {
      $path = '<path d="M 0,0 L 1440,150 V 0 Z" />';
    }

    echo $path;
  }
}

/**
* Custom action function to render svg page devider on hero section
*/
if ( ! function_exists( 'ras_dashen_render_svg_hero_section_divider' ) ) {
  function ras_dashen_render_svg_hero_section_divider() {
    ?>
    <svg xmlns="http://www.w3.org/2000/svg" class="section-divider-svg" width="100%" height="100%" viewBox="0 0 1440 150">
      <g>
        <path
           d="M 0,150 V 76.439055 C 57.348,49.799055 124.308,37.835055 189.6,42.839055 C 274.032,49.283055 353.196,82.811055 437.76,87.839055 C 526.368,93.071055 614.808,67.583055 699.6,45.527055 C 782.724,23.927055 865.56,15.671055 950.88,29.831055 C 994.26,37.031055 1034.7,51.239055 1076.22,65.039055 C 1187.388,101.98705 1335.6,149.13505 1440,69.023055 V 150 Z"
           opacity="0.25" />
        <path
           d="M 0,150 V 113.01505 C 15.6,87.683055 33.168,63.755055 57.228,45.527055 C 119.292,-1.5369452 198,-1.2129452 269.496,22.091055 C 306.876,34.271055 341.604,53.375055 377.1,69.851055 C 426.204,92.651055 478.776,125.05105 534.096,129.45505 C 577.608,132.87505 619.176,118.15105 652.416,91.583055 C 690.54,61.115055 727.2,17.183055 776.772,3.9830548 C 825.3,-8.9649452 874.392,12.011055 919.728,33.119055 C 965.064,54.227055 1009.92,79.919055 1060.032,84.779055 C 1131.708,91.799055 1195.968,57.323055 1262.712,38.171055 C 1298.952,27.779055 1333.512,30.767055 1367.22,47.171055 C 1394.136,60.239055 1424.82,79.487055 1440,106.25905 V 150 Z"
           opacity="0.5" />
        <path
           d="M 0,150 V 125.23105 C 179.916,61.187055 376.908,46.403055 570.996,80.903055 C 622.596,90.071055 672.072,105.04705 724.128,112.65505 C 794.928,123.01105 859.104,97.967055 922.8,70.175055 C 993.516,39.323055 1063.2,17.699055 1141.44,23.987055 C 1245.276,32.387055 1348.392,78.839055 1440,125.75905 V 150 Z" />
      </g>
    </svg>
    <?php
  }
}

/**
* Custom action function to render svg page devider on primary_services section
*/
if ( ! function_exists( 'ras_dashen_render_svg_primary_services_section_divider' ) ) {
  function ras_dashen_render_svg_primary_services_section_divider() {
    ?>
    <svg xmlns="http://www.w3.org/2000/svg" class="section-divider-svg" width="100%" height="100%" viewBox="0 0 1440 200" preserveAspectRatio="none">
      <g transform="scale(1.2)">
        <path
           d="M 321.39,56.44 C 379.39,45.65 435.55,36.31 493.39,24.58 C 531.14152,16.918811 586.69581,11.745437 608.12376,11.745437 C 628.99152,11.745437 694.55791,13.616765 743.84,24.19 C 816.70893,42.767767 906.67,72 985.66,92.83 C 1055.71,111.31 1132.19,118.92 1200,95.83 V 0 H 0 V 27.35 C 102.46565,66.204159 213.61317,76.264464 321.39,56.44 Z" />
      </g>
    </svg>
    <?php
  }
}
