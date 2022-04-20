<?php
/**
* Footer widget to display office contact info
*
* refer in wp-includes/class-wp-widget.php
*/
class Ras_Dashen_Contact_Info_Footer_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'footer_contact_info_widget',
			'description' => 'Footer widget for contact information details',
		);
		
		parent::__construct( 'footer_contact_info_widget', 'Footer Contact Info Widget', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {

		// get current language
		$lang = get_locale();

		echo $args['before_widget'];

		// displaying title
		if ( isset( $instance['display_site_name'] ) && 'on' === $instance['display_site_name'] ) : 
		?>
			<div class="widget-title">
				<h3 class="foot-widget-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
	                    <?php bloginfo( 'name' ); ?>
	                </a>
				</h3>
			</div>
		<?php 
		endif;
		?>
		<ul class="contact-info">
		<?php
			// company location

			// language is not english
			if ( $lang == 'am_ET' && ! empty( $instance['city_country_am'] ) ) {

				$city_country_am = $instance['city_country_am'];
					?>
					<li><i class="fa fa-map mr-2"></i><?php echo $city_country_am; ?></li>
		
		<?php } else {
				if ( ! empty( $instance['city_country'] ) ) { 
					$city_country = $instance['city_country'];
					?>
					<li><i class="fa fa-map mr-2"></i><?php echo $city_country; ?></li>
				<?php }
			}

			// company address

			// when lang not english
			if ( $lang == 'am_ET' && ! empty( $instance['location_address_am'] ) ) {
				
				$loc_address_am = $instance['location_address_am'];
					?>
					<li><i class="fa fa-map-marker mr-2"></i><?php echo $loc_address_am; ?></li>

		<?php } else {
				if ( ! empty( $instance['location_address'] ) ) { 
					$loc_address = $instance['location_address'];
					?>
					<li><i class="fa fa-map-marker mr-2"></i><?php echo $loc_address; ?></li>
				<?php 
				} 
			}

			// email address
			if ( ! empty( $instance['email_addr'] ) ) { ?>
				<li><i class="fa fa-envelope mr-2"></i><a href="mailto:<?php echo $instance['email_addr']; ?>"><?php echo $instance['email_addr']; ?></a></li>
			<?php } ?>

			<?php if ( ! empty( $instance['phone_num_1'] ) ) { ?>
				<li><i class="fa fa-phone mr-2"></i><a href="tel:<?php echo $instance['phone_num_1']; ?>"><?php echo $instance['phone_num_1']; ?></a></li>
			<?php } ?>

			<?php if ( ! empty( $instance['phone_num_2'] ) ) { ?>
				<li><i class="fa fa-phone mr-2"></i><a href="tel:<?php echo $instance['phone_num_2']; ?>"><?php echo $instance['phone_num_2']; ?></a></li>
			<?php } ?>

			<?php if ( ! empty( $instance['fax'] ) ) { ?>
				<li><i class="fa fa-fax mr-2"></i><?php echo $instance['fax']; ?></li>
			<?php } ?>

			<?php if ( ! empty( $instance['postal_code'] ) ) { ?>
				<li><i class="fa fa-envelope-open mr-2"></i><?php echo $instance['postal_code']; ?></li>
			<?php } ?>
		</ul>
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
				'city_country'				=>	'',
				'city_country_am'			=>	'',
				'location_address'			=>	'',
				'location_address_am'		=>	'',
				'email_addr'				=>	'',
				'phone_num_1'				=>	'',
				'phone_num_2'				=>	'',
				'fax'						=>	'',
				'postal_code'				=>	'',
				'display_site_name'			=>	'',
			) 
		);

		?>
		<div class="widget-content">
			<?php  
				$city_country = ! empty( $instance['city_country'] ) ? $instance['city_country'] : '';
			?>
		    <p>
		    	<label for="<?php echo esc_attr( $this->get_field_id( 'city_country' ) ); ?>"><?php esc_attr_e( 'Company location:', 'ras-dashen' ); ?></label>
		        <input
		            type="text"
		            id="<?php echo esc_attr( $this->get_field_id( 'city_country' ) ); ?>"
		            name="<?php echo esc_attr( $this->get_field_name( 'city_country' ) ); ?>"
		            value="<?php echo esc_attr( $city_country ); ?>" 
		            placeholder="<?php esc_html_e( 'City, Country', 'ras-dashen' ); ?>"
		            class="widefat"
		        />
		    </p>

		    <?php  
				$city_country_am = ! empty( $instance['city_country_am'] ) ? $instance['city_country_am'] : '';
			?>
		    <p>
		    	<label for="<?php echo esc_attr( $this->get_field_id( 'city_country_am' ) ); ?>"><?php esc_attr_e( 'የድርጅቱ መገኛ ቦታ:', 'ras-dashen' ); ?></label>
		        <input
		            type="text"
		            id="<?php echo esc_attr( $this->get_field_id( 'city_country_am' ) ); ?>"
		            name="<?php echo esc_attr( $this->get_field_name( 'city_country_am' ) ); ?>"
		            value="<?php echo esc_attr( $city_country_am ); ?>" 
		            placeholder="<?php esc_html_e( 'የከተማ ስም፣ ሀገር', 'ras-dashen' ); ?>"
		            class="widefat"
		        />
		    </p>

		    <?php  
				$location_address = ! empty( $instance['location_address'] ) ? $instance['location_address'] : '';
			?>
		    <p>
		    	<label for="<?php echo esc_attr( $this->get_field_id( 'location_address' ) ); ?>"><?php esc_attr_e( 'Company Address: ', 'ras-dashen' ); ?></label>
		        <input
		            type="text"
		            id="<?php echo esc_attr( $this->get_field_id( 'location_address' ) ); ?>"
		            name="<?php echo esc_attr( $this->get_field_name( 'location_address' ) ); ?>"
		            value="<?php echo esc_attr( $location_address ); ?>"
		            placeholder="<?php esc_html_e( 'Company specific address', 'ras-dashen' ); ?>"
		            class="widefat"
		        />
		    </p>

		    <?php  
				$location_address_am = ! empty( $instance['location_address_am'] ) ? $instance['location_address_am'] : '';
			?>
		    <p>
		    	<label for="<?php echo esc_attr( $this->get_field_id( 'location_address_am' ) ); ?>"><?php esc_attr_e( 'የድርጅቱ አድራሻ: ', 'ras-dashen' ); ?></label>
		        <input
		            type="text"
		            id="<?php echo esc_attr( $this->get_field_id( 'location_address_am' ) ); ?>"
		            name="<?php echo esc_attr( $this->get_field_name( 'location_address_am' ) ); ?>"
		            value="<?php echo esc_attr( $location_address_am ); ?>"
		            placeholder="<?php esc_html_e( 'የድርጅቱ ልዩ አድራሻ', 'ras-dashen' ); ?>"
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
				$phone_num_1 = ! empty( $instance['phone_num_1'] ) ? $instance['phone_num_1'] : '';
			?>
		    <p>
		    	<label for="<?php echo esc_attr( $this->get_field_id( 'phone_num_1' ) ); ?>"><?php esc_attr_e( 'Phone Number 1:', 'ras-dashen' ); ?></label>
		        <input
		            type="text"
		            id="<?php echo esc_attr( $this->get_field_id( 'phone_num_1' ) ); ?>"
		            name="<?php echo esc_attr( $this->get_field_name( 'phone_num_1' ) ); ?>"
		            value="<?php echo esc_attr( $phone_num_1 ); ?>"
		            placeholder="+251581111111" 
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
		            placeholder="+251582222222" 
		            class="widefat"
		        />
		    </p>

		    <?php  
				$fax = ! empty( $instance['fax'] ) ? $instance['fax'] : '';
			?>
		    <p>
		    	<label for="<?php echo esc_attr( $this->get_field_id( 'fax' ) ); ?>"><?php esc_attr_e( 'Fax Number:', 'ras-dashen' ); ?></label>
		        <input
		            type="text"
		            id="<?php echo esc_attr( $this->get_field_id( 'fax' ) ); ?>"
		            name="<?php echo esc_attr( $this->get_field_name( 'fax' ) ); ?>"
		            value="<?php echo esc_attr( $fax ); ?>"
		            placeholder="0582222222" 
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
				$display_site_name = ! empty( $instance['display_site_name'] ) ? $instance['display_site_name'] : '';
			?>
		    <p>
		        <input
		            type="checkbox"
		            value="<?php echo esc_attr( $display_site_name ); ?>"
		            name="<?php echo esc_attr( $this->get_field_name( 'display_site_name' ) ); ?>"
		            id="<?php echo esc_attr( $this->get_field_id( 'display_site_name' ) ); ?>"
		            <?php checked( 'on', $display_site_name, true ); ?>
		            class="checkbox"
		        />
		        <label for="<?php echo esc_attr( $this->get_field_id( 'display_site_name' ) ); ?>"><?php _e( 'Display site name?', 'ras-dashen' ); ?></label>
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

		$instance['city_country'] = ( ! empty( $new_instance['city_country'] ) ) ? sanitize_text_field( $new_instance['city_country'] ) : '';

		$instance['city_country_am'] = ( ! empty( $new_instance['city_country_am'] ) ) ? sanitize_text_field( $new_instance['city_country_am'] ) : '';

		$instance['location_address'] = ( ! empty( $new_instance['location_address'] ) ) ? sanitize_text_field( $new_instance['location_address'] ) : '';

		$instance['location_address_am'] = ( ! empty( $new_instance['location_address_am'] ) ) ? sanitize_text_field( $new_instance['location_address_am'] ) : '';

		$instance['email_addr'] = ( ! empty( $new_instance['email_addr'] ) ) ? sanitize_email( $new_instance['email_addr'] ) : '';
		
		$instance['phone_num_1'] = ( ! empty( $new_instance['phone_num_1'] ) ) ? sanitize_text_field( $new_instance['phone_num_1'] ) : '';

		$instance['phone_num_2'] = ( ! empty( $new_instance['phone_num_2'] ) ) ? sanitize_text_field( $new_instance['phone_num_2'] ) : '';

		$instance['fax'] = ( ! empty( $new_instance['fax'] ) ) ? sanitize_text_field( $new_instance['fax'] ) : '';

		$instance['postal_code'] = ( ! empty( $new_instance['postal_code'] ) ) ? sanitize_text_field( $new_instance['postal_code'] ) : '';

		$instance['display_site_name'] = isset( $new_instance['display_site_name'] ) ? 'on' : '';

		return $instance;
	}
}




