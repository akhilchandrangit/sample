<?php 
  $title = "Edit Profile";
  include_once('head.php');
  if (isset($_POST['email'])) 
    $update = $mysqli->real_escape_string($_POST['email']); 
  if (isset($_POST['pass'])) 
    $update = $mysqli->real_escape_string($_POST['pass']);
  $user = $_SESSION['username'];
  $db_host = 'localhost'; // Server Name
  $db_user = 'root'; // Username
  $db_pass = 'root'; // Password
  $db_name = 'demo'; // Database Name
  $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
  if ( $update == $_POST['email'] && isset($_POST['email']) ) {
    $que = "UPDATE users SET email='".$update."' WHERE username='".$user."' " ;
    $_SESSION['email'] = $update;
    $query = mysqli_query($conn, $que);
  } elseif ( $update == $_POST['pass'] && isset($_POST['pass']) ) {
    $update = md5($update);
    $que = 'UPDATE users SET password="'.$update.'" WHERE username="'.$user.'" ';
    $query = mysqli_query($conn, $que);
  } 

?>
<main>
	<div class="row">
    <div class="col-lg-2 col-md-1 col-sm-1"></div>
    <div class="col-lg-4 col-md-4 col-sm-4">
      <div class="border"> 
        <center> 
          <div class="header-green">
		        <b> Edit Email</b>
			    </div> 
          <div class="space"></div>
          <form action="" method="post">
            <input type="text" value="<?php if(isset($_POST['email'])) echo $_SESSION['email'] ?>" placeholder="Current mail id" readonly/>
            <input type="text" value="" name="email" placeholder="New mail id"/>
            <input type="submit" value="Change" class="button button1"/>
          </form>
          <div class="space"></div>
        </div>
      </center>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
      <center>
        <div class="border">  
          <div class="header-green">
		        <b> Edit Password</b>
			    </div> 
          <div class="space"></div>
          <form action="" method="post">
            <input type="password" value="" name="pass" placeholder="New Password"/>
            <input type="password" value="" name="conpass" placeholder="Confirm New Password" />
            <input type="submit" value="Change" class="button button1"/>
          </form>
          <div class="space"></div>
        </div>
      </center>
    </div>
    <div class="col-lg-2 col-md-1 col-sm-1"></div>
  </div>
</main>
<?php include_once('foot.php'); ?>

