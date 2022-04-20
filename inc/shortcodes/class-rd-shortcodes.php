<?php 
class RD_Shortcodes
{
    public $theme_name;

    public function __construct( $theme_name )
    {
        $this->theme_name = $theme_name;

        // load shortcode classes
        $this->load_shortcode_classes();
    }

    // initialize all shortcodes
    public function init() {
       // hook each shortcode to init action
       add_action( 'init', array( $this, 'addShortcodes' ) );
    }

    public function load_shortcode_classes() {
        // load abstract 'Ras_Dashen_Shortcode'
        require get_template_directory() . '/inc/shortcodes/abstract-ras-dashen-shortcode.php';

        // load class for related posts shortcodes
        require get_template_directory() . '/inc/shortcodes/class-rd-related-posts.php';

        // load class 'RD_Audios_Collection' shortcodes
        require get_template_directory() . '/inc/shortcodes/class-rd-audios-collection.php';

        // load class 'RD_Videos_Collection' shortcodes
        require get_template_directory() . '/inc/shortcodes/class-rd-videos-collection.php';

        // load class 'RD_Tagged_Videos' shortcodes
        require get_template_directory() . '/inc/shortcodes/class-rd-tagged-videos.php';
    }

    // method to add shortcodes
    public function addShortcodes() {
        // instantiate 'RD_Related_Posts' shortcode class
        $related_posts = new RD_Related_Posts( 'rd_related_posts', $this->theme_name );
        // add shortcode
        $related_posts->add_shortcode();

        // instantiate 'RD_Audios_Collection' shortcode class
        $audios_collection = new RD_Audios_Collection( 'rd_audios_collection', $this->theme_name );
        // add shortcode
        $audios_collection->add_shortcode();

        // instantiate 'RD_Videos_Collection' shortcode class
        $videos_collection = new RD_Videos_Collection( 'rd_videos_collection', $this->theme_name );
        // add shortcode
        $videos_collection->add_shortcode();

        // instantiate 'RD_Tagged_Videos' shortcode class
        $tagged_videos = new RD_Tagged_Videos( 'rd_tagged_videos', $this->theme_name );
        // add shortcode
        $tagged_videos->add_shortcode();
    }

} // End class
