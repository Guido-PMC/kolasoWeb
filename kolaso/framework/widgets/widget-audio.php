<?php
/**
 * The widget for displaying Audio Oembed
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */
 if ( !defined( 'ABSPATH' ) ) exit;

class kolaso_Audio_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		// widget actual processes
		parent::__construct(
			'audio-oembed', // Base ID
			ZYT_THEME_NAME .__( ' Audio OEmbed', 'kolaso' ), // Name
			array( 'description' => __( 'display audio with oEmbed', 'kolaso' ), ) // Args
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

        $audio = $instance['audio'];
        
        $width = $instance['width'];
		
		  // Before widget code, if any
		  echo (isset($before_widget)?$before_widget:'');

		
		  // PART 2: The title and the text output
		  if (!empty($title))
			echo ''. $before_title . $title . $after_title;
			
			
			echo '<div class="audio-container">';
                    
            if($width>0 ):
                echo  wp_oembed_get($audio, array('width'=>$width));
            else:
                wp_oembed_get($audio);
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
        $instance['audio'] = $new_instance['audio'];
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
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'audio' => '', 'width' => '270') );
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
        $audio = isset( $instance['audio'] ) ? $instance['audio'] : '';
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
		<label for="<?php echo esc_attr($this->get_field_id('audio')); ?>"><?php esc_html_e('Audio URL:','kolaso');?>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('audio')); ?>" 
					name="<?php echo esc_attr($this->get_field_name('audio')); ?>" type="text" 
					value="<?php echo esc_attr($audio); ?>" />
		</label>
        </p>
        
        <p>
		<label for="<?php echo esc_attr($this->get_field_id('width')); ?>"><?php esc_html_e('Audio Width:','kolaso');?>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('width')); ?>" 
					name="<?php echo esc_attr($this->get_field_name('width')); ?>" type="text" 
					value="<?php echo esc_attr($width); ?>" />
		</label>
		</p>
		
		<?php
	}	

	
}

// Registersion Widget
function kolaso_audio_widget(){

	if(function_exists('zytheme_load_widget')){
		zytheme_load_widget('kolaso_Audio_Widget');
	}
}
add_action( 'widgets_init', 'kolaso_audio_widget');