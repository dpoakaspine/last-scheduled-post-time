<?php
/**
 * @package   last-scheduled-post-time
 * @author    Stefan Böttcher
 *
 * @wordpress-plugin
 * Plugin Name: last scheduled post-time
 * Description: Shows the date & time of the last scheduled post in the publish box.
 * Version:     1.0
 * Author:      wp-hotline.com ~ Stefan
 * License: GPLv2 or later
 */


add_action( 'post_submitbox_misc_actions', 'reblog_add_button_html' );
function reblog_add_button_html(){
  global $post;
  $args = array(
    'posts_per_page' => 1,
    'post_status' => 'future'
  );
  $last_id = get_posts( $args );

  //var_dump( $last_id );
  if( !empty($last_id) ) {
    ?>
    <div>
        <hr />
        <div class="misc-pub-section misc-pub-revisions">
        	<?php echo date_i18n( 'd. M Y @ H:i', strtotime( $last_id[0]->post_date ) );  ?> <?php echo __('last scheduled post'); ?>
        </div>

    </div>
    <?php
    }
}
