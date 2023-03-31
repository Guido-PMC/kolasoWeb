<?php
/**
 * The widget for displaying recent portfolio items
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */
 if ( !defined( 'ABSPATH' ) ) exit;

class kolaso_Recent_Work_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		// widget actual processes
		parent::__construct(
			'recent-work', // Base ID
			ZYT_THEME_NAME .__( ' Recent Work', 'kolaso' ), // Name
			array( 'description' => __( 'display recent work from portfolio', 'kolaso' ), ) // Args
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

		$postcount = $instance['postcount'];
		
		  // Before widget code, if any
		  echo (isset($before_widget)?$before_widget:'');

		
		  // PART 2: The title and the text output
		  if (!empty($title))
			echo ''. $before_title . $title . $after_title;
			
			$args = array(
				'post_status'						=> 'publish',
				'posts_per_page' 				=> $postcount,
				'ignore_sticky_posts' 	=> true,
				'post_type' 						=> 'portfolio',
			);

			// Enqueue Styles and Scripts
			wp_enqueue_script('zyt-magnific' );
			wp_enqueue_style('zyt-magnific');

			$postsQuery = new WP_Query($args );
			global $post;

			echo '<div class="portolfio-standard">';
					
			while ($postsQuery->have_posts()) : $postsQuery->the_post(); ?>

			<div id="portfolio-<?php the_ID(); ?>" <?php post_class( 'portfolio-item' ); ?>>
				<div class="portfolio-item-container">
					<div class="portfolio-img">
						<?php kolaso_post_thumbnail('medium');?>
						<div class="portfolio-hover">
							<div class="portfolio-action">
								<div class="portfolio-zoom">
									<a class="img-gallery-item" href="<?php echo esc_url( get_permalink());?>" title="<?php the_title();?>"></a>
								</div>
							</div>
							<!-- .portfolio-action end -->
						</div>
						<!-- .portfolio-hover end -->
					</div>
					<!-- .portfolio-img end -->
					<div class="portfolio-content">
						<div class="portfolio-title">
							<?php
							the_title( '<h4><a href="' . esc_url( get_permalink()) . '" rel="bookmark">', '</a></h4>');
							?>
						</div>
						<div class="portfolio-cat">
							<?php echo get_the_term_list( $post->ID, 'portfolio_category', ' ', ',', ' ' ); ?>	
						</div>
					</div> <!-- .portfolio-content end -->
				</div>
			</div><!-- .portfolio-item end -->

		   <?php endwhile;
		   
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
		$instance['postcount'] = strip_tags($new_instance['postcount']);
		return $instance;
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'postcount' => '') );
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		$postcount = isset( $instance['postcount'] ) ? $instance['postcount'] : '3';
		
		?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','kolaso');?>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" 
					name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" 
					value="<?php echo esc_attr($title); ?>" />
		</label>
		</p>

		<p>
		<label for="<?php echo esc_attr($this->get_field_id('postcount')); ?>"><?php esc_html_e('Number Of Items Show:','kolaso');?>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('postcount')); ?>" 
					name="<?php echo esc_attr($this->get_field_name('postcount')); ?>" type="number" 
					value="<?php echo esc_attr($postcount); ?>" />
		</label>
		</p>
		
		<?php
	}	

	
}

// Registersion Widget
function kolaso_recent_work_widget(){
	if(function_exists('zytheme_load_widget')):
		zytheme_load_widget('kolaso_Recent_Work_Widget');
	endif;
}
add_action( 'widgets_init', 'kolaso_recent_work_widget');