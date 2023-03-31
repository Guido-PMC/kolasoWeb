<?php
/**
 * The widget for displaying facebook box
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */
 if ( !defined( 'ABSPATH' ) ) exit;

class kolaso_Facebook_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		// widget actual processes
		parent::__construct(
			'facebook', // Base ID
			ZYT_THEME_NAME .__( ' Facebook Box', 'kolaso' ), // Name
			array( 'description' => __( 'display facebook page like box', 'kolaso' ), ) // Args
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

		$facebook = $instance['facebook'];
		
		  // Before widget code, if any
		  echo (isset($before_widget)?$before_widget:'');

		
		  // PART 2: The title and the text output
		  if (!empty($title))
			echo ''. $before_title . $title . $after_title;
			
			
			echo '<div class="facebook-container">';

			echo  do_shortcode('[iframe_facebok src="'.$facebook.'"]');
					
          // echo '<iframe src="https://www.facebook.com/plugins/page.php?href='.$facebook.'&tabs&width=270&height=181&small_header=false&adapt_container_width=true&hide_cover=true&show_facepile=true&appId" width="340" height="181" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>';
		   
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
		$instance['facebook'] = strip_tags($new_instance['facebook']);
		return $instance;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'facebook' => '') );
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		$facebook = isset( $instance['facebook'] ) ? $instance['facebook'] : '';
		
		?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','kolaso');?>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" 
					name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" 
					value="<?php echo esc_attr($title); ?>" />
		</label>
		</p>

        <p>
		<label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>"><?php esc_html_e('Facebook Page URL:','kolaso');?>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" 
					name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" type="text" 
					value="<?php echo esc_attr($facebook); ?>" />
		</label>
		</p>
		
		<?php
	}	

}

// Registersion Widget
function kolaso_facebook_widget(){
	if(function_exists('zytheme_load_widget')):
		zytheme_load_widget('kolaso_Facebook_Widget');
	endif;
}
add_action( 'widgets_init', 'kolaso_facebook_widget');