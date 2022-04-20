<?php
/**
* svg shapes for sections of different pages
*
*/
$section_shape_svgs = array(
                'clipped_to_btmRight'  => '
                            <svg width="0" height="0" class="section-svg">
                              <defs>
                                <clipPath id="diagonal-to-bottomright" clipPathUnits="objectBoundingBox">
                                  <polygon points="0 0, 1 0, 1 0.95, 0 1" />
                                </clipPath>
                              </defs>
                            </svg>', 
                'trapezoid_to_right'  => '
                            <svg width="0" height="0" class="section-svg">
                              <defs>
                                <clipPath id="trapezoid-to-right" clipPathUnits="objectBoundingBox">
                                  <polygon points="0 0.05, 1 0, 1 1, 0 0.95" />
                                </clipPath>
                              </defs>
                            </svg>', 
                'clipped_to_topRight'  => '
                            <svg width="0" height="0" class="section-svg">
                              <defs>
                                <clipPath id="diagonal-to-topright" clipPathUnits="objectBoundingBox">
                                  <polygon points="0 0, 1 0.05, 1 1, 0 1" />
                                </clipPath>
                              </defs>
                            </svg>',
	 
                        );