<?php
  $title = "Register";
  require_once('auth.php');
  include_once('head.php');
?>

<main>
  <div class="row">
    <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <section class="reg-form">
          <div class="border">  
            <center>
              <div class="header-green">
		            <b> Register</b>
              </div>
              <div class="space"></div>
              <form action="register.php" method="post">
                <?php include('errors.php'); ?>
                <input type="text" placeholder="Username" name="username" required>
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Enter Password" name="password_1" required>
                <input type="password" placeholder="Repeat Password" name="password_2" required>
                <br>
                <img src="captcha.php" class="alert-red"/>
                <input type="text" name="captcha" placeholder="Enter Captcha"/>
                <br>
                <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                <div class="clearfix">
                <button type="submit" class="button button1" name="reg_user" id="reg_user">Register</button>
                <div class="space"></div>
              </form>
            </center>
          </div>
        </section>
      </div>
      <div class="col-md-4"></div>
  </div> 
</main> 
<?php include_once('foot.php'); ?>