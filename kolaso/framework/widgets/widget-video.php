<?php
/**
 * The widget for displaying video oembed
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */
 if ( !defined( 'ABSPATH' ) ) exit;

class kolaso_Video_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		// widget actual processes
		parent::__construct(
			'video-oembed', // Base ID
			ZYT_THEME_NAME .__( ' video OEmbed', 'kolaso' ), // Name
			array( 'description' => __( 'display video with oEmbed', 'kolaso' ), ) // Args
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

        $video = $instance['video'];
        
        $width = $instance['width'];
		
		  // Before widget code, if any
		  echo (isset($before_widget)?$before_widget:'');

		
		  // PART 2: The title and the text output
		  if (!empty($title))
			echo ''. $before_title . $title . $after_title;
			
			
			echo '<div class="video-container">';
                    
            if($width>0 ):
                echo  wp_oembed_get($video, array('width'=>$width));
            else:
                wp_oembed_get($video);
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
        $instance['video'] = $new_instance['video'];
        $instance['width'] = strip_tags($new_instance['width']);
		return $instance;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'video' => '', 'width' => '270') );
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
        $video = isset( $instance['video'] ) ? $instance['video'] : '';
        $width = isset( $instance['width'] ) ? $instance['width'] : '270';
		
		?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','kolaso');?>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" 
					name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" 
					value="<?php echo esc_attr($title); ?>" />
		</label>
		</p>

        <p>
		<label for="<?php echo esc_attr($this->get_field_id('video')); ?>"><?php esc_html_e('Video URL:','kolaso');?>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('video')); ?>" 
					name="<?php echo esc_attr($this->get_field_name('video')); ?>" type="text" 
					value="<?php echo esc_attr($video); ?>" />
		</label>
        </p>
        
        <p>
		<label for="<?php echo esc_attr($this->get_field_id('width')); ?>"><?php esc_html_e('Video Width:','kolaso');?>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('width')); ?>" 
					name="<?php echo esc_attr($this->get_field_name('width')); ?>" type="text" 
					value="<?php echo esc_attr($width); ?>" />
		</label>
		</p>
		
		<?php
	}	

	
}

// Registersion Widget
function kolaso_video_widget(){

	if(function_exists('zytheme_load_widget')):
		zytheme_load_widget('kolaso_Video_Widget');
	endif;
}
add_action( 'widgets_init', 'kolaso_video_widget');