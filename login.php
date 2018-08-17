<?php
  $title = "Login";
  include_once('auth.php');
  include_once('head.php');
?>
<main>
  <div class="row">
    <div class="col-md-4"></div>
      <div class="col-md-4">
        <section class="login-form">
          <div class="border">  
            <center>
              <div class="header-green">
		            <b> Login</b>
              </div>
              <div class="space"></div>
              <form method="post" action="login.php">
                <?php include('errors.php'); ?> 
                <input type="text" name="username" class="form-control input-lg" placeholder="Username"  value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" />
                <input type="password" class="form-control input-lg" name="password" placeholder="••••••••••••••" required="" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>"/>
                <div class="pwstrength_viewport_progress"></div>
                <div class="checkbox">
                  <input type="checkbox" name="remember" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?>> Remember me
                </div>
                <button type="submit" class="button button1" name="login_user" id="login_user">Sign In</button>
                <div>
                  <a href="/register">Create Account</a> or <a href="#">Reset password</a>
                </div>
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