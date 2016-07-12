<?php
function fb_add_custom_user_profile_fields( $user ) {
?>
	<h3><?php _e('Extra Profile Socials', 'brado'); ?></h3>
	
	<table class="form-table">
		<tr>
			<th><label for="facebook"><?php _e('Facebook', 'brado'); ?></label></th>
			<td>
				<input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" />
			</td>
		</tr>
		<tr>
			<th><label for="twitter"><?php _e('Twitter', 'brado'); ?></label></th>
			<td>
				<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" />
			</td>
		</tr>
		<tr>
			<th><label for="google"><?php _e('Google Plus', 'brado'); ?></label></th>
			<td>
				<input type="text" name="google" id="google" value="<?php echo esc_attr( get_the_author_meta( 'google', $user->ID ) ); ?>" class="regular-text" />
			</td>
		</tr>
		<tr>
			<th><label for="pinterest"><?php _e('Pinterest', 'brado'); ?></label></th>
			<td>
				<input type="text" name="pinterest" id="pinterest" value="<?php echo esc_attr( get_the_author_meta( 'pinterest', $user->ID ) ); ?>" class="regular-text" />
			</td>
		</tr>
	</table>
<?php }

function fb_save_custom_user_profile_fields( $user_id ) {
	if ( !current_user_can( 'edit_user', $user_id ) )
	return FALSE;
	update_usermeta( $user_id, 'facebook', $_POST['facebook'] );
	update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
	update_usermeta( $user_id, 'google', $_POST['google'] );
	update_usermeta( $user_id, 'pinterest', $_POST['pinterest'] );
}

add_action( 'show_user_profile', 'fb_add_custom_user_profile_fields' );
add_action( 'edit_user_profile', 'fb_add_custom_user_profile_fields' );

add_action( 'personal_options_update', 'fb_save_custom_user_profile_fields' );
add_action( 'edit_user_profile_update', 'fb_save_custom_user_profile_fields' );