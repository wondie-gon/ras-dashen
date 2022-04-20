<?php 
/**
 * Class of shortcode to display tagged video posts list 
 * 
 * @since 1.0.1
 */
class RD_Tagged_Videos extends Ras_Dashen_Shortcode 
{
    /**
     * Name of shortcode
     * 
     */
    public $shortcode;

    /**
     * Constructor function
     * 
     * @param string $theme_name Name of theme
     */
    public function __construct( $shortcode, $theme_name )
    {
        $this->shortcode = $shortcode;
        parent::__construct( $theme_name );
    }

    // get default attributes
    public function get_default_atts() {
        $this->default_atts = array(
            'title'					=>	esc_html__( 'Related Video Posts', $this->theme_name ),
            'tag'					=>	'',
            'items_per_page'		=>	'3',
            'num_of_columns'		=>	'3',
        );
        return $this->default_atts;
    }

    /**
     * Method for self-closing tagged videos shortcode output
     * 
     * @param array  $atts    Shortcode attributes. Default empty.
     * @return mixed shortcode output for videos based on given tag
     */
    public function shortcode_callback( $atts, $content = null ) {
        // get final valid atts 
        $atts = $this->get_valid_atts( $atts );

        // get args for wp_Query
        $args = $this->get_post_args( $atts );

        // returning output
        ob_start();
        ?>
        <div class="container-fluid">

            <section class="video-collection-section mb-5">
                <?php 
                echo sprintf( 
                    '<h1 class="vid-section-title">%1$s</h1>', 
                    sprintf( __( '%s', $this->theme_name ), 
                        esc_html( $atts['title'] )
                    )
                );
                ?>
                <?php
                // quering posts
                $video_posts = new WP_Query( $args );
                
                if ( $video_posts->have_posts() ) { ?>
                <div class="row related-vid-posts">
                <?php
                    while ( $video_posts->have_posts() ) : $video_posts->the_post();
                    ?>

                    <div id="video-<?php the_ID(); ?>" <?php post_class( $this->get_responsive_bs_class( $atts ) ); ?>>
                        <div class="w-100">
                            <a class="media-holder video-link" href="<?php the_permalink(); ?>">
                            <?php echo ras_dashen_get_embedded_video( get_the_ID() ); ?>
                            </a>
                            <?php
                                // get title
                                echo sprintf( 
                                '<h5><a href="%1$s">%2$s</a></h5>', 
                                esc_url( get_permalink() ), 
                                sprintf( __( '%s', $this->theme_name ), 
                                    esc_html( get_the_title() )
                                    )
                                );
                            ?>
                            <div class="text-muted">
                                <?php echo ras_dashen_posted_on_stringified(); ?>
                            </div>
                        </div>
                    </div><!-- #video-<?php the_ID(); ?> -->
                    <?php 
                    endwhile; wp_reset_postdata(); 
                    ?>
                </div><!-- .row.row-cards -->
                <?php
                }
                ?>
	    	</section><!-- .video-collection-section -->
        </div><!-- .container-fluid -->
        <?php
        return ob_get_clean();
    }

    /**
     * ==For internal use==
     * Method to validate and get valid attributes
     * 
     * @param array  $atts    Shortcode attributes. Default empty.
     * @return array valid attributes
     */
    protected function get_valid_atts( $atts ) {
        // normalizing attribute keys to lower case
        $atts = array_change_key_case( (array) $atts, CASE_LOWER );
        // overriding default attributes with user defined
        $atts = shortcode_atts( $this->get_default_atts(), $atts, $this->shortcode );

        // valid atts
        $valid = array();

        /**
         * validating attributes values
         */
        $valid['title'] = $atts['title'];

        // post tags
        $tag_term = term_exists( $atts['tag'], 'post_tag' );
        if ( $tag_term !== 0 && $tag_term !== null ) {
            $valid['tag'] = $atts['tag'];
        } else {
            $valid['tag'] = '';
        }

        // number of Videos
        $valid['items_per_page'] = ! is_int( $atts['items_per_page'] ) ? ( int ) $atts['items_per_page'] : $atts['items_per_page'];

        // number of columns
        $valid['num_of_columns'] = ! is_int( $atts['num_of_columns'] ) ? ( int ) $atts['num_of_columns'] : $atts['num_of_columns'];

        // get valid atts
        return $valid;
    }

    /**
     * ==For internal use==
     * Method to retrieve the prepared post args
     * 
     * @param array $atts User defined attributes
     * @return array Outputs prepared args for post query
     */
    protected function get_post_args( $atts ) {
        // get current post
        $post = get_post( get_the_ID() );

        // get attributes array
        if ( ! is_array( $atts ) ) {
            $atts = ( array ) $atts;
        }

        $args = array(
            'post_type'         =>  'post',
            'posts_per_page'    =>  $atts['items_per_page'],
            'post_status'       =>  'publish',
            'orderby'           =>  'date',
            'order'           	=>  'DESC',
            'post__not_in'      =>  array( $post->ID ),
            'tax_query'         =>  array(
            	'relation' =>   'AND', 
                array(
                    'taxonomy'  =>  'post_tag',
                    'field'     =>  'slug',
                    'terms'     =>  $atts['tag']
                    ),
                array(
		            'taxonomy' 	=> 'post_format',
		            'field' 	=> 'slug',
		            'terms' => array( 'post-format-video' )
	           	),

            ),
        );

        // get post args
        return $args;
    }

} // End class