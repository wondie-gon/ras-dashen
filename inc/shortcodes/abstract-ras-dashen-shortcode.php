<?php
/**
 * Class for shortcode
 * 
 * @since 1.0.1
 */
abstract class Ras_Dashen_Shortcode
{
    /**
     * Name of theme
     */
    public $theme_name;
    /**
     * Name of shortcode
     * 
     */
    protected $shortcode;
    /**
     * attributes of shortcode
     * 
     */
    protected $default_atts = array();

    // constructor function for initializing instance
    /**
     * @param string $theme_name    Name (slug) of theme
     */
    public function __construct( $theme_name )
    {
        $this->theme_name = $theme_name;
        
    }

    // get default attributes
    public function get_default_atts() {
        return $this->default_atts;
    }
    // register shortcode
    public function add_shortcode() {
        // Register callback to shortcode
        add_shortcode( $this->shortcode, array( $this, 'shortcode_callback' ), 10, 2 );
    }

    /**
     * Abstract method for shortcode output
     * 
     * @param array  $atts    Shortcode attributes. Default empty.
     * @return mixed shortcode output
     */
    abstract public function shortcode_callback( $atts, $content );
    
    /**
     * ==Helper method==
     * Get responsive bootstrap class name to 
     * be used for each post box
     * 
     * @param array $atts User defined attributes
     * @return string Bootstrap class name for post blocks
     */
    public function get_responsive_bs_class( $atts ) {
        // get postfix num of column class
	    $postfix = 12 / $atts['num_of_columns'];

        // concating with bs grid class
        $classes = esc_attr( 'my-5 col-sm-6 col-md-' . $postfix );
        // give space for each class name
        $col_class = explode( ' ', $classes );

        return $col_class;
    }

} // class end
