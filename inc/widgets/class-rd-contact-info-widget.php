<?php
/**
* Widget for office contact info display
*
* refer in wp-includes/class-wp-widget.php
*/
class RD_Contact_Info_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'rd_contact_info_widget',
			'description' => 'Widget for contact information details',
		);
		// parent::__construct( 'rd_contact_info_widget', 'Contact Info Widget', $widget_ops, $control_ops );
		parent::__construct( 'rd_contact_info_widget', 'Contact Info Widget', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		// get current language
		$lang = get_locale();

		// if language amharic and amharic location name exists
		if ( $lang == 'am_ET' && ! empty( $instance['title_am'] ) ) {

			$loc_name_am = $instance['title_am'];
			if ( isset( $instance['display_title'] ) && 'on' === $instance['display_title'] ) : ?>
			
				<h6 class="widget-title"><?php printf( esc_attr__( '%s', 'ras-dashen' ), $loc_name_am ); ?></h6>

			<?php 
			endif;

		} else {

			// displaying title english
			if ( ! empty( $instance['title'] ) ) {

				$loc_name = $instance['title'];
				if ( isset( $instance['display_title'] ) && 'on' === $instance['display_title'] ) : ?>
				
					<h6 class="widget-title"><?php printf( esc_attr__( '%s', 'ras-dashen' ), $loc_name ); ?></h6>

				<?php 
				endif;

			}

		}

		?>

		<?php
		// language amharic and amharuc location address exists
		if ( $lang == 'am_ET' && ! empty( $instance['location_address_am'] ) ) { 
			$loc_address_am = $instance['location_address_am'];
			?>
			<span class="d-block"><i class="fa fa-map-marker mr-2"></i><?php printf( esc_attr__( '%s', 'ras-dashen' ), $loc_address_am ); ?></span>
		<?php } else {
			if ( ! empty( $instance['location_address'] ) ) { 
				$loc_address = $instance['location_address'];
				?>
				<span class="d-block"><i class="fa fa-map-marker mr-2"></i><?php printf( esc_attr__( '%s', 'ras-dashen' ), $loc_address ); ?></span>
		<?php 
			}
		}
		?>

		<?php if ( ! empty( $instance['email_addr'] ) ) { ?>
			<span class="d-block"><i class="fa fa-envelope mr-2"></i><a href="mailto:<?php echo $instance['email_addr']; ?>"><?php echo $instance['email_addr']; ?></a></span>
		<?php } ?>

		<?php if ( ! empty( $instance['postal_code'] ) ) { ?>
			<span class="d-block"><i class="fa fa-envelope-open mr-2"></i><?php echo $instance['postal_code']; ?></span>
		<?php } ?>

		<?php if ( ! empty( $instance['phone_num_1'] ) ) { ?>
			<span class="d-block"><i class="fa fa-phone mr-2"></i><a href="tel:<?php echo $instance['phone_num_1']; ?>"><?php echo $instance['phone_num_1']; ?></a></span>
		<?php } ?>

		<?php if ( ! empty( $instance['phone_num_2'] ) ) { ?>
			<span class="d-block"><i class="fa fa-phone mr-2"></i><a href="tel:<?php echo $instance['phone_num_2']; ?>"><?php echo $instance['phone_num_2']; ?></a></span>
		<?php } ?>


		<?php
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {

		$instance = wp_parse_args( $instance, 
			array(
				'title'						=>	'',
				'title_am'					=>	'',
				'location_address'			=>	'',
				'location_address_am'		=>	'',
				'email_addr'				=>	'',
				'postal_code'				=>	'',
				'phone_num_1'				=>	'',
				'phone_num_2'				=>	'',
				'display_title'				=>	'',
			) 
		);

		// // extracting options
		// extract( $instance );
		?>
		<div class="widget-content">
			<?php  
				$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
			?>
		    <p>
		    	<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Company name:', 'ras-dashen' ); ?></label>
		        <input
		            type="text"
		            id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
		            name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
		            value="<?php echo esc_attr( $title ); ?>" 
		            placeholder="<?php esc_html_e( 'Add new company name', 'ras-dashen' ); ?>" 
		            class="widefat"
		        />
		    </p>

		    <?php  
				$title_am = ! empty( $instance['title_am'] ) ? $instance['title_am'] : '';
			?>
		    <p>
		    	<label for="<?php echo esc_attr( $this->get_field_id( 'title_am' ) ); ?>"><?php esc_attr_e( 'የድርጅቱ ስም:', 'ras-dashen' ); ?></label>
		        <input
		            type="text"
		            id="<?php echo esc_attr( $this->get_field_id( 'title_am' ) ); ?>"
		            name="<?php echo esc_attr( $this->get_field_name( 'title_am' ) ); ?>"
		            value="<?php echo esc_attr( $title_am ); ?>" 
		            placeholder="<?php esc_html_e( 'አዲስ የድርጅት ስም ያስገቡ', 'ras-dashen' ); ?>"
		            class="widefat"
		        />
		    </p>

		    <?php  
				$location_address = ! empty( $instance['location_address'] ) ? $instance['location_address'] : '';
			?>
		    <p>
		    	<label for="<?php echo esc_attr( $this->get_field_id( 'location_address' ) ); ?>"><?php esc_attr_e( 'Company Address:', 'ras-dashen' ); ?></label>
		        <input
		            type="text"
		            id="<?php echo esc_attr( $this->get_field_id( 'location_address' ) ); ?>"
		            name="<?php echo esc_attr( $this->get_field_name( 'location_address' ) ); ?>"
		            value="<?php echo esc_attr( $location_address ); ?>"
		            placeholder="<?php esc_html_e( 'Add new address', 'ras-dashen' ); ?>"
		            class="widefat"
		        />
		    </p>

		    <?php  
				$location_address_am = ! empty( $instance['location_address_am'] ) ? $instance['location_address_am'] : '';
			?>
		    <p>
		    	<label for="<?php echo esc_attr( $this->get_field_id( 'location_address_am' ) ); ?>"><?php esc_attr_e( 'የድርጅቱ አድራሻ:', 'ras-dashen' ); ?></label>
		        <input
		            type="text"
		            id="<?php echo esc_attr( $this->get_field_id( 'location_address_am' ) ); ?>"
		            name="<?php echo esc_attr( $this->get_field_name( 'location_address_am' ) ); ?>"
		            value="<?php echo esc_attr( $location_address_am ); ?>"
		            placeholder="<?php esc_html_e( 'አዲስ አድራሻ ያስገቡ', 'ras-dashen' ); ?>"
		            class="widefat"
		        />
		    </p>


		    <?php  
				$email_addr = ! empty( $instance['email_addr'] ) ? $instance['email_addr'] : '';
			?>
		    <p>
		    	<label for="<?php echo esc_attr( $this->get_field_id( 'email_addr' ) ); ?>"><?php esc_attr_e( 'Email:', 'ras-dashen' ); ?></label>
		        <input
		            type="email"
		            id="<?php echo esc_attr( $this->get_field_id( 'email_addr' ) ); ?>"
		            name="<?php echo esc_attr( $this->get_field_name( 'email_addr' ) ); ?>"
		            value="<?php echo esc_attr( $email_addr ); ?>"
		            placeholder="email@example.com" 
		            class="widefat"
		        />
		    </p>

		    <?php  
				$postal_code = ! empty( $instance['postal_code'] ) ? $instance['postal_code'] : '';
			?>
		    <p>
		    	<label for="<?php echo esc_attr( $this->get_field_id( 'postal_code' ) ); ?>"><?php esc_attr_e( 'Postal Code:', 'ras-dashen' ); ?></label>
		        <input
		            type="text"
		            id="<?php echo esc_attr( $this->get_field_id( 'postal_code' ) ); ?>"
		            name="<?php echo esc_attr( $this->get_field_name( 'postal_code' ) ); ?>"
		            value="<?php echo esc_attr( $postal_code ); ?>"
		            placeholder="1000" 
		            class="widefat"
		        />
		    </p>


		    <?php  
				$phone_num_1 = ! empty( $instance['phone_num_1'] ) ? $instance['phone_num_1'] : '';
			?>
		    <p>
		    	<label for="<?php echo esc_attr( $this->get_field_id( 'phone_num_1' ) ); ?>"><?php esc_attr_e( 'Phone Number 1:', 'ras-dashen' ); ?></label>
		        <input
		            type="text"
		            id="<?php echo esc_attr( $this->get_field_id( 'phone_num_1' ) ); ?>"
		            name="<?php echo esc_attr( $this->get_field_name( 'phone_num_1' ) ); ?>"
		            value="<?php echo esc_attr( $phone_num_1 ); ?>"
		            placeholder="+25158000000"
		            class="widefat"
		        />
		    </p>

		    <?php  
				$phone_num_2 = ! empty( $instance['phone_num_2'] ) ? $instance['phone_num_2'] : '';
			?>
		    <p>
		    	<label for="<?php echo esc_attr( $this->get_field_id( 'phone_num_2' ) ); ?>"><?php esc_attr_e( 'Phone Number 2:', 'ras-dashen' ); ?></label>
		        <input
		            type="text"
		            id="<?php echo esc_attr( $this->get_field_id( 'phone_num_2' ) ); ?>"
		            name="<?php echo esc_attr( $this->get_field_name( 'phone_num_2' ) ); ?>"
		            value="<?php echo esc_attr( $phone_num_2 ); ?>"
		            placeholder="+251581111111"
		            class="widefat"
		        />
		    </p>

		    <?php  
				$display_title = ! empty( $instance['display_title'] ) ? $instance['display_title'] : '';
			?>
		    <p>
		        <input
		            type="checkbox"
		            value="<?php echo esc_attr( $display_title ); ?>"
		            name="<?php echo esc_attr( $this->get_field_name( 'display_title' ) ); ?>"
		            id="<?php echo esc_attr( $this->get_field_id( 'display_title' ) ); ?>"
		            <?php checked( 'on', $display_title, true ); ?>
		            class="checkbox"
		        />
		        <label for="<?php echo esc_attr( $this->get_field_id( 'display_title' ) ); ?>"><?php _e( 'Display Title?', 'ras-dashen' ); ?></label>
		    </p>
		</div><!-- .widget-content -->
		<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = array();

		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['title_am'] = ( ! empty( $new_instance['title_am'] ) ) ? sanitize_text_field( $new_instance['title_am'] ) : '';
		$instance['location_address'] = ( ! empty( $new_instance['location_address'] ) ) ? sanitize_text_field( $new_instance['location_address'] ) : '';
		$instance['location_address_am'] = ( ! empty( $new_instance['location_address_am'] ) ) ? sanitize_text_field( $new_instance['location_address_am'] ) : '';
		$instance['email_addr'] = ( ! empty( $new_instance['email_addr'] ) ) ? sanitize_email( $new_instance['email_addr'] ) : '';
		$instance['postal_code'] = ( ! empty( $new_instance['postal_code'] ) ) ? sanitize_text_field( $new_instance['postal_code'] ) : '';
		$instance['phone_num_1'] = ( ! empty( $new_instance['phone_num_1'] ) ) ? sanitize_text_field( $new_instance['phone_num_1'] ) : '';
		$instance['phone_num_2'] = ( ! empty( $new_instance['phone_num_2'] ) ) ? sanitize_text_field( $new_instance['phone_num_2'] ) : '';
		$instance['display_title'] = isset( $new_instance['display_title'] ) ? 'on' : '';

		return $instance;
	}
}




