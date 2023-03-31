<?php
/**
 * The widget for displaying login form
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */
 if ( !defined( 'ABSPATH' ) ) exit;

class kolaso_Login_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		// widget actual processes
		parent::__construct(
			'login', // Base ID
			ZYT_THEME_NAME .__( ' Login Form', 'kolaso' ), // Name
			array( 'description' => __( 'Display login WordPress from', 'kolaso' ), ) // Args
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
		
		  // Before widget code, if any
		  echo (isset($before_widget)?$before_widget:'');

		
		  // PART 2: The title and the text output
		  if (!empty($title))
			echo ''. $before_title . $title . $after_title;
			
			
            echo '<div class="login-container">';
            
            if ( is_user_logged_in() ) :
                echo __('Welcome, you are logged,', 'kolaso') .'<a href="'.admin_url().'">'.__('Go To Dashaboard', 'kolaso').'</a>';
            else :
                wp_login_form();
            endif;
        
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
		return $instance;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		
		?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','kolaso');?>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" 
					name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" 
					value="<?php echo esc_attr($title); ?>" />
		</label>
		</p>

		<?php
	}
}

// Registersion Widget
function kolaso_login_widget(){
	if(function_exists('zytheme_load_widget')):
		zytheme_load_widget('kolaso_Login_Widget');
	endif;
}
add_action( 'widgets_init', 'kolaso_login_widget');