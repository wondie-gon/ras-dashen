<?php
/**
* function hooks for different purposes
*
* @package Ras_Dashen 
* @since 1.0.0
*/
// svg shape code for header and nav styling
if ( ! function_exists( 'ras_dashen_header_nav_bg_svgs_action' ) ) :

  function ras_dashen_header_nav_bg_svgs_action() {
    ?>
    <svg id="nav-cloud" class="header-bg-svg" viewBox="0 0 1122.52 793.7" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg">
		<g transform="translate(0,-87.000001)">
			<path d="m 100.06771,673.42773 c 4.19581,29.31155 844.79957,23.7487 936.93659,3.9932 -0.8695,0.27236 23.6978,-10.32618 4.8961,-31.93331 -11.1299,-12.79064 -26.3208,-10.32029 -32.1144,-14.11749 0,0 2.0937,-20.23632 -13.6091,-30.61865 -15.70283,-10.38232 -43.96798,-4.79183 -43.96798,-4.79183 4.97019,5.62668 -8.95736,-22.04418 -53.38971,-31.9456 -26.20006,-5.83849 -51.29597,0.79864 -51.29597,0.79864 0.95983,1.40612 1.26106,-14.36739 -27.61223,-29.15845 -9.86625,-5.05423 -51.46597,-10.34247 -60.32372,1.20606 -3.65108,4.76021 3.8213,-14.78062 -22.28901,-21.81126 -27.64421,-7.44367 -41.83121,1.0466 -42.61612,1.0466 2.07871,-1.5858 -39.08047,-30.01263 -82.70163,-31.14694 -45.58193,-1.1853 -100.92738,19.74454 -103.63882,27.95239 0,0 -21.77903,-19.80963 -68.04568,-9.58368 -40.68268,8.99178 -39.78052,26.35511 -39.78052,26.35511 0.44764,0.32094 -30.29304,-14.91629 -68.04568,4.79185 -29.3438,15.31844 -22.65055,28.60598 -25.12457,29.54968 2.65714,-1.52032 -48.14187,-7.94124 -67.55607,7.50967 -17.43087,11.86663 -15.89093,14.81869 -23.52047,30.82505 0.0629,0.048 -26.66351,-10.38159 -49.47278,-0.27032 -16.53244,7.32876 -18.6509,21.09451 -19.61971,21.8336 0.5151,0.65493 -36.01207,4.79156 -47.10852,21.56328 -15.212254,22.99251 0,27.9524 0,27.9524 z" />
		</g>
	</svg>
    <?php
  }
  
endif;
add_action( 'ras_dashen_header_nav_bg_svgs', 'ras_dashen_header_nav_bg_svgs_action', 10 );

// svg shape code for welcoming section clip path
if ( ! function_exists( 'ras_dashen_clip_trapezoid_to_right_action' ) ) :

  function ras_dashen_clip_trapezoid_to_right_action() {
    ?>
    <svg width="0" height="0">
	  <defs>
	    <clipPath id="trapezoid-to-right" clipPathUnits="objectBoundingBox">
	      <polygon points="0 0.05, 1 0, 1 1, 0 0.95" />
	    </clipPath>
	  </defs>
	</svg>
    <?php
  }
  
endif;
add_action( 'ras_dashen_clip_trapezoid_to_right', 'ras_dashen_clip_trapezoid_to_right_action', 10 );

// svg shape code for top slider section clip path
if ( ! function_exists( 'ras_dashen_clip_to_bottom_right_action' ) ) :

  function ras_dashen_clip_to_bottom_right_action() {
    ?>
    <svg width="0" height="0">
	  <defs>
	    <clipPath id="clipped-to-bottomright" clipPathUnits="objectBoundingBox">
	      <polygon points="0 0, 1 0, 1 0.95, 0 1" />
	    </clipPath>
	  </defs>
	</svg>
    <?php
  }
  
endif;
add_action( 'ras_dashen_clip_to_bottom_right', 'ras_dashen_clip_to_bottom_right_action', 10 );