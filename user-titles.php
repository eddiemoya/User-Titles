<?php
/*
Plugin Name: User Titles
Plugin URI: http://joeboydston.com/user-titles/
Description: Plugin is for adding a user title to the WP user profile
Author: Don Kukral
Version: 1.0.1
Author URI: http://d0nk.com
*/
add_action('show_user_profile', 'user_title_field');
add_action('edit_user_profile', 'user_title_field');

function user_title_field ($user) { ?>
    <h3><?php _e("User Title", "blank"); ?></h3>
    <table class="form-table">
    <tr>
    <th><label for="title"><?php _e("Title"); ?></label></th>
    <td>
    <input type="text" name="title" id="title" value="<?php echo esc_attr(get_user_meta($user->id, "user_title", True)); ?>" class="regular-text"/><br/>
    <span class="description"><?php _e("Please enter user title"); ?></span>
    </td>
    </tr>
    </table>
<?php }

add_action('personal_options_update', 'save_user_title_field');
add_action('edit_user_profile_update', 'save_user_title_field');

function save_user_title_field($user_id) {
    if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }
    
    update_user_meta($user_id, 'user_title', $_POST['title']);
}
?>
