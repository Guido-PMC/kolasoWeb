<?php
/**
 * The widget for displaying contact info data
 *
 * @link       zytheme.com
 * @since      1.1.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */
 if ( !defined( 'ABSPATH' ) ) exit;

class kolaso_Contact_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		// widget actual processes
		parent::__construct(
			'contact', // Base ID
			ZYT_THEME_NAME .__( ' Contact Info', 'kolaso' ), // Name
			array( 'description' => __( 'Display contact info data', 'kolaso' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {

		extract($args);
		$title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);

        $phone = $instance['phone'];
        $email = $instance['email'];
        $address = $instance['address'];
        $hours = $instance['hours'];
		
		  // Before widget code, if any
		  echo (isset($before_widget)?$before_widget:'');

		
		  // PART 2: The title and the text output
		  if (!empty($title))
			echo ''. $before_title . $title . $after_title;
			
			
			echo '<div class="contact-container">';
                echo ' <div class="widget--contact-info">';
                    echo '<ul>';
                        if($phone):
                        	echo '<li class="contact-phone"><span>'.__('Phone:', 'kolaso').' </span><a href="tel:'.esc_html($phone).'">'.esc_html($phone).'</a></li>';
                        endif;
                        if($email):
                            echo '<li class="contact-email"><span>'.__('Email:', 'kolaso').' </span><a href="mailto:'.esc_html($email).'">'.esc_html($email).'</a></li>';
                        endif;
                        if($hours):
                            echo '<li class="contact-hour"><span>'.__('Hours:', 'kolaso').' </span>'.$hours.'</li>';
                        endif;
                        if($address):
                            echo '<li class="contact-address"><span>'.__('Address:', 'kolaso').' </span>'.$address.'</li>';
                        endif;
                    echo '</ul>';
                echo ' </div>';
		   echo '</div>';
		
		  // After widget code, if any  
		  echo (isset($after_widget)?$after_widget:'');
	}


	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	 public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['phone'] = strip_tags($new_instance['phone']);
        $instance['email'] = strip_tags($new_instance['email']);
        $instance['address'] = strip_tags($new_instance['address']);
        $instance['hours'] = strip_tags($new_instance['hours']);
		return $instance;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'phone' => '', 'email' => '', 'address' => '', 'hours' => '') );
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
        $phone = isset( $instance['phone'] ) ? $instance['phone'] : '';
        $email = isset( $instance['email'] ) ? $instance['email'] : '';
        $address = isset( $instance['address'] ) ? $instance['address'] : '';
        $hours = isset( $instance['hours'] ) ? $instance['hours'] : '';
		
		?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','kolaso');?>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" 
					name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" 
					value="<?php echo esc_attr($title); ?>" />
		</label>
		</p>

        <p>
		<label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone Number:','kolaso');?>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('phone')); ?>" 
					name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" 
					value="<?php echo esc_attr($phone); ?>" />
		</label>
        </p>
        
        <p>
		<label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email:','kolaso');?>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" 
					name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" 
					value="<?php echo esc_attr($email); ?>" />
		</label>
        </p>
        
        <p>
		<label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:','kolaso');?>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" 
					name="<?php echo esc_attr($this->get_field_name('address')); ?>" type="text" 
					value="<?php echo esc_attr($address); ?>" />
		</label>
        </p>
        
        <p>
		<label for="<?php echo esc_attr($this->get_field_id('hours')); ?>"><?php esc_html_e('Work Hours:','kolaso');?>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('hours')); ?>" 
					name="<?php echo esc_attr($this->get_field_name('hours')); ?>" type="text" 
					value="<?php echo esc_attr($hours); ?>" />
		</label>
		</p>
		
		<?php
	}	
}

// Registersion Widget
function kolaso_contact_widget(){
	if(function_exists('zytheme_load_widget')):
		zytheme_load_widget('kolaso_Contact_Widget');
	endif;
}
add_action( 'widgets_init', 'kolaso_contact_widget');