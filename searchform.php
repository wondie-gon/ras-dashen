<?php
/**
 * The template file for displaying the search form in Ras Dashen WordPress theme
 * anywhere when get_search() is called.
 *
 * @package Ras_Dashen
 *
 * @since 1.0.0
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<form method="get" id="searchform" class="form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
    <input class="form-control" type="text" id="s" name="s" placeholder="<?php _e( 'search', 'ras-dashen' ); ?>" aria-label="Search" value="<?php the_search_query(); ?>">
    <button class="submit btn ui-search-btn" id="searchsubmit" name="submit" type="submit"><i class="fa fa-search"></i></button>
</form>
