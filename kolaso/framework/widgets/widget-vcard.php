<?php
/**
 * The widget for displaying about data
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

class kolaso_Vcard_Widget extends WP_Widget
{

    /**
     * Sets up the widgets name etc
     */
    public function __construct()
    {
        // widget actual processes
        parent::__construct(
            'vcard', // Base ID
            ZYT_THEME_NAME . __(' Vcard', 'kolaso'), // Name
            array('description' => __('Display about info data', 'kolaso')) // Args
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

        $logo = $instance['logo'];
        $desc = $instance['desc'];
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $youtube = $instance['youtube'];
        $google = $instance['google'];
        $linkedin = $instance['linkedin'];
        $rss = $instance['rss'];
        $dribbble = $instance['dribbble'];
        $vimeo = $instance['vimeo'];
        $skype = $instance['skype'];
        $yelp = $instance['yelp'];
        $pinterest = $instance['pinterest'];
        $tumblr = $instance['tumblr'];
        $tripadvisor = $instance['tripadvisor'];
        $spotify = $instance['spotify'];
        $soundcloud = $instance['soundcloud'];
        $behance = $instance['behance'];
        $vk = $instance['vk'];
        $wordpress = $instance['wordpress'];
        $instagram = $instance['instagram'];

        // Before widget code, if any
        echo (isset($before_widget) ? $before_widget : '');

        // PART 2: The title and the text output
        if (!empty($title)) {
            echo '' . $before_title . $title . $after_title;
        }

        echo '<div class="vcard-container">';
        echo '<div class="widget-about">';
        if ($logo):
            echo '<img class="footer-logo" src="' . esc_attr($logo) . '" alt="' . get_bloginfo('name') . '">';
        endif;
        if ($desc):
            echo '<p>' . esc_html($desc) . '</p>';
        endif;
        echo '<div class="social--icons">';
        if ($facebook):
            echo '<a class="facebook" href="' . esc_url(kolaso_get_option('social_links_facebook')) . '"><i class="fa fa-facebook"></i></a>';
        endif;

        if ($twitter):
            echo '<a class="twitter" href="' . esc_url(kolaso_get_option('social_links_twitter')) . '"><i class="fa fa-twitter"></i></a>';
        endif;

        if ($youtube):
            echo '<a class="youtube" href="' . esc_url(kolaso_get_option('social_links_youtube')) . '"><i class="fa fa-youtube"></i></a>';
        endif;

        if ($google):
            echo '<a class="google" href="' . esc_url(kolaso_get_option('social_links_google')) . '"><i class="fa fa-google"></i></a>';
        endif;

        if ($linkedin):
            echo '<a class="linkedin" href="' . esc_url(kolaso_get_option('social_links_linkedin')) . '"><i class="fa fa-linkedin"></i></a>';
        endif;

        if ($instagram):
            echo '<a class="instagram" href="' . esc_url(kolaso_get_option('social_links_instagram')) . '"><i class="fa fa-instagram"></i></a>';
        endif;

        if ($dribbble):
            echo '<a class="dribbble" href="' . esc_url(kolaso_get_option('social_links_dribbble')) . '"><i class="fa fa-dribbble"></i></a>';
        endif;

        if ($rss):
            echo '<a class="rss" href="' . esc_url(kolaso_get_option('social_links_rss')) . '"><i class="fa fa-rss"></i></a>';
        endif;

        if ($vimeo):
            echo '<a class="vimeo" href="' . esc_url(kolaso_get_option('social_links_vimeo')) . '"><i class="fa fa-vimeo"></i></a>';
        endif;
        if ($skype):
            echo '<a class="skype" href="' . esc_url(kolaso_get_option('social_links_skype')) . '"><i class="fa fa-skype"></i></a>';
        endif;
        if ($pinterest):
            echo '<a class="pinterest" href="' . esc_url(kolaso_get_option('social_links_pinterest')) . '"><i class="fa fa-pinterest"></i></a>';
        endif;
        if ($yelp):
            echo '<a class="yelp" href="' . esc_url(kolaso_get_option('social_links_yelp')) . '"><i class="fa fa-yelp"></i></a>';
        endif;
        if ($tumblr):
            echo '<a class="tumblr" href="' . esc_url(kolaso_get_option('social_links_tumblr')) . '"><i class="fa fa-tumblr"></i></a>';
        endif;
        if ($tripadvisor):
            echo '<a class="tripadvisor" href="' . esc_url(kolaso_get_option('social_links_tripadvisor')) . '"><i class="fa fa-tripadvisor"></i></a>';
        endif;
        if ($spotify):
            echo '<a class="spotify" href="' . esc_url(kolaso_get_option('social_links_spotify')) . '"><i class="fa fa-spotify"></i></a>';
        endif;
        if ($soundcloud):
            echo '<a class="soundcloud" href="' . esc_url(kolaso_get_option('social_links_soundcloud')) . '"><i class="fa fa-soundcloud"></i></a>';
        endif;
        if ($behance):
            echo '<a class="behance" href="' . esc_url(kolaso_get_option('social_links_behance')) . '"><i class="fa fa-behance"></i></a>';
        endif;
        if ($vk):
            echo '<a class="vk" href="' . esc_url(kolaso_get_option('social_links_vk')) . '"><i class="fa fa-vk"></i></a>';
        endif;
        if ($wordpress):
            echo '<a class="wordpress" href="' . esc_url(kolaso_get_option('social_links_wordpress')) . '"><i class="fa fa-wordpress"></i></a>';
        endif;
        echo '</div>';
        echo '</div>';
        echo '</div>';

        // After widget code, if any
        echo (isset($after_widget) ? $after_widget : '');
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
        $instance['logo'] = strip_tags($new_instance['logo']);
        $instance['desc'] = strip_tags($new_instance['desc']);
        $instance['facebook'] = strip_tags($new_instance['facebook']);
        $instance['twitter'] = strip_tags($new_instance['twitter']);
        $instance['youtube'] = strip_tags($new_instance['youtube']);
        $instance['google'] = strip_tags($new_instance['google']);
        $instance['linkedin'] = strip_tags($new_instance['linkedin']);
        $instance['instagram'] = strip_tags($new_instance['instagram']);
        $instance['rss'] = strip_tags($new_instance['rss']);
        $instance['dribbble'] = strip_tags($new_instance['dribbble']);
        $instance['skype'] = strip_tags($new_instance['skype']);
        $instance['pinterest'] = strip_tags($new_instance['pinterest']);
        $instance['yelp'] = strip_tags($new_instance['yelp']);
        $instance['tumblr'] = strip_tags($new_instance['tumblr']);
        $instance['tripadvisor'] = strip_tags($new_instance['tripadvisor']);
        $instance['spotify'] = strip_tags($new_instance['spotify']);
        $instance['soundcloud'] = strip_tags($new_instance['soundcloud']);
        $instance['behance'] = strip_tags($new_instance['behance']);
        $instance['vk'] = strip_tags($new_instance['vk']);
        $instance['wordpress'] = strip_tags($new_instance['wordpress']);
        $instance['vimeo'] = strip_tags($new_instance['vimeo']);

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
        $instance = wp_parse_args((array) $instance, array('title' => '', 'logo' => '', 'desc' => '', 'facebook' => '', 'twitter' => '', 'youtube' => '', 'google' => '', 'linkedin' => '', 'instagram' => '', 'rss' => '', 'dribbble' => '', 'vimeo' => '', 'skype' => '', 'pinterest' => '', 'yelp' => '', 'tumblr' => '', 'tripadvisor' => '', 'spotify' => '', 'soundcloud' => '', 'behance' => '', 'vk' => '', 'wordpress' => ''));

        $title = isset($instance['title']) ? $instance['title'] : '';
        $logo = isset($instance['logo']) ? $instance['logo'] : '';
        $desc = isset($instance['desc']) ? $instance['desc'] : '';
        $facebook = isset($instance['facebook']) ? $instance['facebook'] : '';
        $twitter = isset($instance['twitter']) ? $instance['twitter'] : '';
        $youtube = isset($instance['youtube']) ? $instance['youtube'] : '';
        $google = isset($instance['google']) ? $instance['google'] : '';
        $linkedin = isset($instance['linkedin']) ? $instance['linkedin'] : '';
        $instagram = isset($instance['instagram']) ? $instance['instagram'] : '';
        $rss = isset($instance['rss']) ? $instance['rss'] : '';
        $dribbble = isset($instance['dribbble']) ? $instance['dribbble'] : '';
        $vimeo = isset($instance['vimeo']) ? $instance['vimeo'] : '';
        $skype = isset($instance['skype']) ? $instance['skype'] : '';
        $pinterest = isset($instance['pinterest']) ? $instance['pinterest'] : '';
        $yelp = isset($instance['yelp']) ? $instance['yelp'] : '';
        $tumblr = isset($instance['tumblr']) ? $instance['tumblr'] : '';
        $tripadvisor = isset($instance['tripadvisor']) ? $instance['tripadvisor'] : '';
        $spotify = isset($instance['spotify']) ? $instance['spotify'] : '';
        $soundcloud = isset($instance['soundcloud']) ? $instance['soundcloud'] : '';
        $behance = isset($instance['behance']) ? $instance['behance'] : '';
        $vk = isset($instance['vk']) ? $instance['vk'] : '';
        $wordpress = isset($instance['wordpress']) ? $instance['wordpress'] : '';

        ?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'kolaso');?>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</label>
		</p>

        <p>
		<label for="<?php echo esc_attr($this->get_field_id('logo')); ?>"><?php esc_html_e('Logo URL:', 'kolaso');?>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('logo')); ?>" name="<?php echo esc_attr($this->get_field_name('logo')); ?>" type="text" value="<?php echo esc_attr($logo); ?>" />
		</label>
        </p>

        <p>
		<label for="<?php echo esc_attr($this->get_field_id('desc')); ?>"><?php esc_html_e('Description:', 'kolaso');?>
			<textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('desc')); ?>" name="<?php echo esc_attr($this->get_field_name('desc')); ?>" ><?php echo esc_attr($desc); ?></textarea>
		</label>
        </p>
        <p><?php esc_html_e('Select Social Account To Display:', 'kolaso');?></p>
        <p>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" type="checkbox" value="1" <?php checked($instance['facebook'], 1);?>/>
            <span><?php esc_html_e('Facebook Account', 'kolaso');?></span>
        </p>

        <p>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" type="checkbox"  value="1" <?php checked($instance['twitter']);?>/>
            <span><?php esc_html_e('Twitter Account', 'kolaso');?></span>
        </p>

        <p>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" type="checkbox" value="1" <?php checked($instance['youtube']);?>/>
            <span><?php esc_html_e('Youtube Account', 'kolaso');?></span>
        </p>

        <p>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('google')); ?>" name="<?php echo esc_attr($this->get_field_name('google')); ?>" type="checkbox" value="1" <?php checked($instance['google']);?>/>
            <span><?php esc_html_e('Google+ Account', 'kolaso');?></span>
        </p>

        <p>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('linkedin')); ?>" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" type="checkbox" value="1" <?php checked($instance['linkedin']);?>/>
            <span><?php esc_html_e('Linkedin Account', 'kolaso');?></span>
        </p>

        <p>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('instagram')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" type="checkbox" value="1" <?php checked($instance['instagram']);?>/>
            <span><?php esc_html_e('Instagram Account', 'kolaso');?></span>
        </p>

        <p>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('rss')); ?>" name="<?php echo esc_attr($this->get_field_name('rss')); ?>" type="checkbox" value="1" <?php checked($instance['rss']);?>/>
            <span><?php esc_html_e('Rss Account', 'kolaso');?></span>
        </p>

        <p>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('dribbble')); ?>" name="<?php echo esc_attr($this->get_field_name('dribbble')); ?>" type="checkbox" value="1" <?php checked($instance['dribbble']);?>/>
            <span><?php esc_html_e('Dribbble Account', 'kolaso');?></span>
        </p>

        <p>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('vimeo')); ?>" name="<?php echo esc_attr($this->get_field_name('vimeo')); ?>" type="checkbox" value="1" <?php checked($instance['vimeo']);?>/>
            <span><?php esc_html_e('Vimeo Account', 'kolaso');?></span>
        </p>

        <p>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" type="checkbox" value="1" <?php checked($instance['pinterest']);?>/>
            <span><?php esc_html_e('Pinterest Account', 'kolaso');?></span>
        </p>

        <p>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('yelp')); ?>" name="<?php echo esc_attr($this->get_field_name('yelp')); ?>" type="checkbox" value="1" <?php checked($instance['yelp']);?>/>
            <span><?php esc_html_e('Yelp Account', 'kolaso');?></span>
        </p>
        <p>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('tumblr')); ?>" name="<?php echo esc_attr($this->get_field_name('tumblr')); ?>" type="checkbox" value="1" <?php checked($instance['tumblr']);?>/>
            <span><?php esc_html_e('Tumblr Account', 'kolaso');?></span>
        </p>

        <p>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('tripadvisor')); ?>" name="<?php echo esc_attr($this->get_field_name('tripadvisor')); ?>" type="checkbox"  value="1" <?php checked($instance['tripadvisor']);?>/>
            <span><?php esc_html_e('Tripadvisor Account', 'kolaso');?></span>
        </p>

        <p>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('skype')); ?>" name="<?php echo esc_attr($this->get_field_name('skype')); ?>" type="checkbox" value="1" <?php checked($instance['skype']);?>/>
            <span><?php esc_html_e('Skype Account', 'kolaso');?></span>
        </p>

        <p>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('spotify')); ?>" name="<?php echo esc_attr($this->get_field_name('spotify')); ?>" type="checkbox" value="1" <?php checked($instance['spotify']);?>/>
            <span><?php esc_html_e('Spotify Account', 'kolaso');?></span>
        </p>

        <p>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('soundcloud')); ?>" name="<?php echo esc_attr($this->get_field_name('soundcloud')); ?>" type="checkbox" value="1" <?php checked($instance['soundcloud']);?>/>
            <span><?php esc_html_e('Soundcloud Account', 'kolaso');?></span>
        </p>

        <p>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('wordpress')); ?>" name="<?php echo esc_attr($this->get_field_name('wordpress')); ?>" type="checkbox"  value="1" <?php checked($instance['wordpress']);?>/>
            <span><?php esc_html_e('WordPress Account', 'kolaso');?></span>
        </p>

        <p>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('behance')); ?>" name="<?php echo esc_attr($this->get_field_name('behance')); ?>" type="checkbox" value="1" <?php checked($instance['behance']);?>/>
            <span><?php esc_html_e('Behance Account', 'kolaso');?></span>
        </p>

        <p>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('vk')); ?>" name="<?php echo esc_attr($this->get_field_name('vk')); ?>" type="checkbox" value="1" <?php checked($instance['vk']);?>/>
            <span><?php esc_html_e('VK Account', 'kolaso');?></span>
        </p>

		<?php
}
}

// Registersion Widget
function kolaso_vcard_widget()
{
    if (function_exists('zytheme_load_widget')):
        zytheme_load_widget('kolaso_Vcard_Widget');
    endif;
}
add_action('widgets_init', 'kolaso_vcard_widget');