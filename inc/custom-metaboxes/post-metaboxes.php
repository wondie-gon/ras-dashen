<?php

/**
* 
* -------------------------------------------------------------------
* custom meta boxes
* -------------------------------------------------------------------
* @package Ras_Dashen
* @since 1.0.0
*/
//Add default metaboxes to posts

// hook meta box action
add_action( 'add_meta_boxes', 'ras_dashen_posts_custom_meta_box' );

// adding meta box for posts
if ( ! function_exists(	'ras_dashen_posts_custom_meta_box' ) ) {
	
	function ras_dashen_posts_custom_meta_box() {

		// add meta box
		add_meta_box( 'rd_posts_custom_meta', __( 'Post meta', 'ras-dashen' ), 'rd_posts_custom_meta_box_callback', 'post', 'normal' ); 

	}

}

// post details meta box callback
if ( ! function_exists(	'rd_posts_custom_meta_box_callback' ) ) :
	
	function rd_posts_custom_meta_box_callback( $post ) {

		wp_nonce_field( 'rd_posts_save_custom_meta', 'rd_posts_custom_meta_nonce' );

		$rd_posts_on_page = esc_html( get_post_meta( $post->ID, '_rd_posts_on_page_value_key', true ) );

		$rd_posts_about_title = esc_html( get_post_meta( $post->ID, '_rd_posts_about_title_value_key', true ) );

		// Featured
		$rd_posts_featured = get_post_meta( $post->ID, '_rd_posts_featured_value_key', true );

		// about us themes array
		$posts_themes_arr = array(
			'mission'			=>	esc_html__( 'Company&#39;s mission', 'ras-dashen' ),
			'vision'			=>	esc_html__( 'Company&#39;s vision', 'ras-dashen' ),
			'values'			=>	esc_html__( 'Company&#39;s values', 'ras-dashen' ),
			'what we do'		=>	esc_html__( 'Company&#39;s &#34;What we do&#34;', 'ras-dashen' ),
			'who we are'		=>	esc_html__( 'Company&#39;s &#34;Who we are&#34;', 'ras-dashen' ),
			'history'			=>	esc_html__( 'Company&#39;s history', 'ras-dashen' ),
			'establishment'		=>	esc_html__( 'Company&#39;s legal establishment', 'ras-dashen' ),
			'director-message'	=>	esc_html__( 'Company&#39;s &#34;General director&#39;s message&#34;', 'ras-dashen' ),
			'organogram'		=>	esc_html__( 'Company&#39;s organizational structure', 'ras-dashen' ),
			);
		?>

		<table class="cpt-meta-table">
			<tbody>

				<tr>
					<td class="label-td"><label for="rd_posts_about_title"><?php _e( 'This post&#39;s theme: ', 'ras-dashen' ); ?></label></td>
					<td class="input-td" colspan="3">
						<select id="rd_posts_about_title" name="rd_posts_about_title">
							<option value="">
								<?php echo esc_attr( __( 'Select post&#39;s theme', 'ras-dashen' ) ); ?>
							</option>
							<?php
							 
								foreach ( $posts_themes_arr as $key => $value ) {
									echo sprintf( '<option value="%1$s" %2$s>%3$s</option>', $key, selected( $rd_posts_about_title, $key, false ), $value );
								}
							
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<span class="description"><?php _e( 'Select the page where you want the post to be displayed.', 'ras-dashen' ); ?></span>
					</td>
				</tr>

				<tr>
					<td class="label-td"><label for="rd_posts_on_page"><?php _e( 'Display post on: ', 'ras-dashen' ); ?></label></td>
					<td class="input-td" colspan="3">
						<select id="rd_posts_on_page" name="rd_posts_on_page">
							<option value="">
								<?php echo esc_attr( __( 'Select page', 'ras-dashen' ) ); ?>
							</option>
							<?php
								// select specific page to display post
								$pages_list = get_pages();

								foreach ( $pages_list as $page ) {
									echo sprintf( '<option value="%1$s" %2$s>%3$s</option>', $page->post_name, selected( $rd_posts_on_page, $page->post_name, false ), $page->post_title );
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<span class="description"><?php _e( 'Select page you want to access this post.', 'ras-dashen' ); ?></span>
					</td>
				</tr>

				<tr>
					<td>
						<label for="rd_posts_featured">
							<input type="checkbox" name="rd_posts_featured" id="rd_posts_featured" class="selectit" value="yes" <?php if ( isset ( $rd_posts_featured['rd_posts_featured'] ) ) checked( $rd_posts_featured['rd_posts_featured'][0], 'yes' ); ?> /><?php _e( 'Featured', 'ras-dashen' ); ?>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<span class="description"><?php _e( 'Check if you want the post to be featured and displayed on front page top slider', 'ras-dashen' ); ?></span>
					</td>
				</tr>

			</tbody>
		</table>

		<?php


	}

endif;

// hook function to saving action
add_action( 'save_post', 'rd_posts_save_custom_meta' );

// save action of post general details meta box value
if ( ! function_exists( 'rd_posts_save_custom_meta' ) ) :
	
	function rd_posts_save_custom_meta( $post_id ) {

		global $post;

		// get the post type
		// $post_type = get_post_type_object( $post->post_type );

		// verify if this is an autosave routine
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		// check if nonce not set or verify if this came from the screen and with proper authorization
		if ( ! isset( $_POST['rd_posts_custom_meta_nonce'] ) || ! wp_verify_nonce( $_POST['rd_posts_custom_meta_nonce'], 'rd_posts_save_custom_meta' ) ) {
			return;
		}

		// if user has no permission to edit post
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		$metadata['_rd_posts_about_title_value_key'] = ( isset( $_POST['rd_posts_about_title'] ) ? sanitize_text_field( $_POST['rd_posts_about_title'] ) : '' );

		$metadata['_rd_posts_featured_value_key'] = ( isset( $_POST['rd_posts_featured'] ) ? 'yes' : '' );

		$metadata['_rd_posts_on_page_value_key'] = ( isset( $_POST['rd_posts_on_page'] ) ? sanitize_text_field( $_POST['rd_posts_on_page'] ) : '' );


		// update records from the input fields
		foreach ( $metadata as $key => $value ) {
			
			// get current value from each input
			$current_value = get_post_meta( $post_id, $key, true );

			if ( $value && '' == $current_value ) {

				add_post_meta( $post_id, $key, $value, true );

			} elseif ( $value && $value != $current_value ) {

				update_post_meta( $post_id, $key, $value );

			} elseif ( '' == $value && $current_value ) {

				delete_post_meta( $post_id, $key, $current_value );

			}
		}


	}

endif;

// interaction messages for post custom post type
if ( ! function_exists( 'ras_dashen_rd_posts_updated_messages' ) ) :
	
	function ras_dashen_rd_posts_updated_messages( $messages ) {

		global $post, $post_ID;

		$messages['post'] = array(
			0	=>	'',
			1	=>	sprintf( __( 'Post updated. <a href="%s">View post</a>', 'ras-dashen' ), esc_url( get_permalink( $post_ID ) ) ),
			2	=>	__( 'Custom field updated', 'ras-dashen' ),
			3	=>	__( 'Custom field deleted', 'ras-dashen' ),
			4	=>	__( 'Post updated', 'ras-dashen' ),
			5	=>	isset( $_GET['revision'] ) ? sprintf( __( 'Post restored to revision from %s', 'ras-dashen' ), wp_post_revision_title( ( int ) $_GET['revision'], false ) ) : false,
			6	=>	sprintf( __( 'Post published. <a href="%s">View Post</a>', 'ras-dashen' ), esc_url( get_permalink( $post_ID ) ) ),
			7	=>	__( 'Post saved', 'ras-dashen' ),
			8	=>	sprintf( __( 'Post submitted. <a target="_blank" href="%s">Preview post</a>', 'ras-dashen' ), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
			9	=>	sprintf( __( 'Post scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview post</a>', 'ras-dashen' ), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
			10	=>	sprintf( __( 'Post draft updated. <a target="_blank" href="%s">Preview post</a>', 'ras-dashen' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
			);

		return $messages;

	}

endif;