<?php
/**
 * The widget for displaying recent posts
 *
 * @link       zytheme.com
 * @since      1.0.0
 *
 * @package    Zytheme
 * @subpackage Kolaso
 */
if (!defined('ABSPATH')) {
    exit;
}

class kolaso_Query_Posts_Widget extends WP_Widget
{

    /**
     * Sets up the widgets name etc
     */
    public function __construct()
    {
        // widget actual processes
        parent::__construct(
            'query-posts', // Base ID
            ZYT_THEME_NAME . __(' Posts', 'kolaso'), // Name
            array('description' => __('display blog posts', 'kolaso')) // Args
        );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {

        extract($args);
        $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);

        $postcount = $instance['postcount'];

        $thumb = $instance['thumb'];

        $order = $instance['order'];

        $orderby = $instance['orderby'];

        $showmeta = $instance['showmeta'];

        // Before widget code, if any
        echo ('' . isset($before_widget) ? $before_widget : '');

        // PART 2: The title and the text output
        if (!empty($title)) {
            echo '' . $before_title . $title . $after_title;
        }

        $args = array(
            'post_status' => 'publish',
            'posts_per_page' => $postcount,
            'ignore_sticky_posts' => true,
            'post_type' => 'post',
            'order' => $order,
            'orderby' => $orderby,
        );

        $postsQuery = new WP_Query($args);

        while ($postsQuery->have_posts()): $postsQuery->the_post();?>

							<div class="entry entry-<?php echo esc_html($thumb); ?>">
								<?php if ($thumb !== 'thumb-none'): ?>
									<div class="entry-img <?php echo esc_html($thumb); ?>">
										<a href="<?php echo esc_url(get_permalink()); ?>">
											<?php
                                            ($thumb == 'thumb-big') ? $size = 'medium' : $size = 'thumbnail';
                                                    kolaso_post_thumbnail($size);
                                            ?>
										</a>
									</div>
								<?php endif;?>
                <div class="entry-desc">
                    <div class="entry-title">
						<?php the_title('<a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a>');
        ?>
					</div>
					<div class="entry-meta">
						<?php
if ($showmeta == 'date') {
            kolaso_posted_on(false);
        }

        if ($showmeta == 'comments') {
            kolaso_entry_comments();
        }

        if ($showmeta == 'read') {
            kolaso_reading_time();
        }

        if ($showmeta == 'category') {
            kolaso_entry_cat();
        }

        if ($showmeta == 'author') {
            echo '<span> ' . get_the_author() . '</span>';
        }

        ?>
                    </div>
                </div>
            </div>
			<?php endwhile;

        wp_reset_query();

        // After widget code, if any
        echo ('' . isset($after_widget) ? $after_widget : '');
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
    public function update($new_instance, $old_instance)
    {
        // processes widget options to be saved
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['postcount'] = strip_tags($new_instance['postcount']);
        $instance['thumb'] = strip_tags($new_instance['thumb']);
        $instance['order'] = strip_tags($new_instance['order']);
        $instance['orderby'] = strip_tags($new_instance['orderby']);
        $instance['showmeta'] = strip_tags($new_instance['showmeta']);
        return $instance;
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form($instance)
    {
        // outputs the options form on admin
        $instance = wp_parse_args((array) $instance, array('title' => '', 'postcount' => '', 'thumb' => '', 'order' => '', 'orderby' => '', 'showmeta' => ''));
        $title = isset($instance['title']) ? $instance['title'] : '';
        $postcount = isset($instance['postcount']) ? $instance['postcount'] : '3';
        $thumb = isset($instance['thumb']) ? $instance['thumb'] : '';
        $order = isset($instance['order']) ? $instance['order'] : '';
        $orderby = isset($instance['orderby']) ? $instance['orderby'] : '';
        $showmeta = isset($instance['showmeta']) ? $instance['showmeta'] : '';

        ?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'kolaso');?>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
					name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
					value="<?php echo esc_attr($title); ?>" />
		</label>
		</p>

		<p>
		<label for="<?php echo esc_attr($this->get_field_id('postcount')); ?>"><?php esc_html_e('Number Of Posts Show:', 'kolaso');?>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('postcount')); ?>"
					name="<?php echo esc_attr($this->get_field_name('postcount')); ?>" type="number"
					value="<?php echo esc_attr($postcount); ?>" />
		</label>
		</p>

		<p>
		<label for="<?php echo esc_attr($this->get_field_id('thumb')); ?>"><?php esc_html_e('Thumbinals Display:', 'kolaso');?>
			<select class="widefat" id="<?php echo esc_attr($this->get_field_id('thumb')); ?>"  name="<?php echo esc_attr($this->get_field_name('thumb')); ?>">
				<option value='thumb-big' <?php echo ('' . $instance['thumb'] == 'thumb-big') ? 'selected="selected"' : ''; ?>><?php esc_html_e('Big Thumbinal', 'kolaso');?></option>
				<option value='thumb-small' <?php echo ('' . $instance['thumb'] == 'thumb-small') ? 'selected="selected"' : ''; ?>><?php esc_html_e('Small Thumbinal', 'kolaso');?></option>
				<option value='thumb-none' <?php echo ('' . $instance['thumb'] == 'thumb-none') ? 'selected="selected"' : ''; ?>><?php esc_html_e('None Thumbinal', 'kolaso');?></option>
			</select>
		</label>
		</p>


		<p>
		<label for="<?php echo esc_attr($this->get_field_id('order')); ?>"><?php esc_html_e('Order:', 'kolaso');?>
			<select class="widefat" id="<?php echo esc_attr($this->get_field_id('order')); ?>"  name="<?php echo esc_attr($this->get_field_name('order')); ?>">
				<option value='ASC' <?php echo ('' . $instance['order'] == 'ASC') ? 'selected="selected"' : ''; ?>><?php esc_html_e('Ascending  Order', 'kolaso');?></option>
				<option value='DESC' <?php echo ('' . $instance['order'] == 'DESC') ? 'selected="selected"' : ''; ?>><?php esc_html_e('Descending Order', 'kolaso');?></option>
			</select>
		</label>
		</p>

		<p>
		<label for="<?php echo esc_attr($this->get_field_id('orderby')); ?>"><?php esc_html_e('Order By:', 'kolaso');?>
			<select class="widefat" id="<?php echo esc_attr($this->get_field_id('orderby')); ?>"  name="<?php echo esc_attr($this->get_field_name('orderby')); ?>">
				<option value='none' <?php echo ('' . $instance['orderby'] == 'none') ? 'selected="selected"' : ''; ?>><?php esc_html_e('None', 'kolaso');?></option>
				<option value='ID' <?php echo ('' . $instance['orderby'] == 'ID') ? 'selected="selected"' : ''; ?>><?php esc_html_e('Post ID', 'kolaso');?></option>
				<option value='title' <?php echo ('' . $instance['orderby'] == 'title') ? 'selected="selected"' : ''; ?>><?php esc_html_e('Title (Alphabetically)', 'kolaso');?></option>
				<option value='date' <?php echo ('' . $instance['orderby'] == 'date') ? 'selected="selected"' : ''; ?>><?php esc_html_e('Date', 'kolaso');?></option>
				<option value='modified' <?php echo ('' . $instance['orderby'] == 'modified') ? 'selected="selected"' : ''; ?>><?php esc_html_e('Date Modified', 'kolaso');?></option>
				<option value='rand' <?php echo ('' . $instance['orderby'] == 'rand') ? 'selected="selected"' : ''; ?>><?php esc_html_e('Random', 'kolaso');?></option>
				<option value='comment_count' <?php echo ('' . $instance['orderby'] == 'comment_count') ? 'selected="selected"' : ''; ?>><?php esc_html_e('Number of Comments', 'kolaso');?></option>
			</select>
		</label>
		</p>

		<p>
		<label for="<?php echo esc_attr($this->get_field_id('showmeta')); ?>"><?php esc_html_e('Display Meta:', 'kolaso');?>
			<select class="widefat" id="<?php echo esc_attr($this->get_field_id('showmeta')); ?>"  name="<?php echo esc_attr($this->get_field_name('showmeta')); ?>">
				<option value='date' <?php echo ('' . $instance['showmeta'] == 'date') ? 'selected="selected"' : ''; ?>><?php esc_html_e('Date Meta', 'kolaso');?></option>
				<option value='author' <?php echo ('' . $instance['showmeta'] == 'author') ? 'selected="selected"' : ''; ?>><?php esc_html_e('Author', 'kolaso');?></option>
				<option value='comments' <?php echo ('' . $instance['showmeta'] == 'comments') ? 'selected="selected"' : ''; ?>><?php esc_html_e('Number of Comments', 'kolaso');?></option>
				<option value='read' <?php echo ('' . $instance['showmeta'] == 'read') ? 'selected="selected"' : ''; ?>><?php esc_html_e('Read Time', 'kolaso');?></option>
				<option value='category' <?php echo ('' . $instance['showmeta'] == 'category') ? 'selected="selected"' : ''; ?>><?php esc_html_e('Category', 'kolaso');?></option>
				<option value='none' <?php echo ('' . $instance['showmeta'] == 'none') ? 'selected="selected"' : ''; ?>><?php esc_html_e('None Meta', 'kolaso');?></option>
			</select>
		</label>
		</p>

		<?php
}
}

// Registersion Widget
function kolaso_query_posts_widget()
{
    if (function_exists('zytheme_load_widget')):
        zytheme_load_widget('kolaso_Query_Posts_Widget');
    endif;
}
add_action('widgets_init', 'kolaso_query_posts_widget');