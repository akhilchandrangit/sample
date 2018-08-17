<?php
  session_start();
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
	<head>
	  <title><?php echo $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://fonts.google.com/sr?family=Proxima+Nova+Soft&token=MT">
    <link rel="stylesheet" type="text/css" href="styles.css"/>
    <link rel="shortcut icon" type="image/x-icon" href="icon.png" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </head>
  <body>
		<header>
    <?php  if (!isset($_SESSION['username'])) : ?> 
	    <div id="nav">
        <ul>
          <li><a
            <?php 
              if ($title == "Home" )
                echo 'class="active"';
            ?> 
          href="../index"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
          </li>
          <li><a 
            <?php 
              if ($title == "Login" )
                echo 'class="active"';
            ?> 
          href="../login"><i class="fas fa-user"></i> Login</a>
          </li>
          <li><a 
            <?php 
              if ($title == "Register" )
                echo 'class="active"';
            ?> 
          href="../register"><i class="fas fa-user-plus"></i> Register</a>
          </li>
          
          <li>
            <a href="#" id="contact"><i class="fas fa-envelope-square"></i> Contact</a></li>
              <div id="contactForm"> 
                <h1>Keep in touch!</h1>
                <small>I'll get back to you as quickly as possible</small>
                <form action="#">
                  <input placeholder="Name" type="text" required />
                  <input placeholder="Email" type="email" required />
                  <input placeholder="Subject" type="text" required />
                  <textarea placeholder="Comment"></textarea>
                  <input class="button button1" type="submit" />
                  <input class="formBtn" type="reset" value="Reset" />
                  <input class="alert-red" style="border: 0" type="submit" id="close" value="Close"/>
                </form>
              </div>
          </li>
        </ul>
      </div>
    <?php endif ?>
    <?php  if (isset($_SESSION['username'])) : ?>
      <div id="nav">
        <ul>
          <li><a
            <?php 
              if ($title == "Home" )
                echo 'class="active"';
            ?> 
          href="../index"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
          <li>
          <a href="./edit">
              <i class="fas fa-edit"></i> Edit Profile
            </a>
          </li>
          <?php if ( $_SESSION['username'] == "admin" ) {
            echo '<li> 
            <a href="/remove">
            <i class="fa fa-trash" aria-hidden="true"></i> Remove/Edit users
            </a>
            </li>';
          }
          ?>

          <li class="search-bar">
            <form class="" action="test" method="post">
              <input type="text" name="query" placeholder="Search" id="search-bar">
            </form>
          </li>
          <li> 
            <a href="./?logout">
              <i class="fas fa-sign-out-alt"></i> Logout
            </a>
          </li>
        </ul>
      </div>
    <?php endif ?> 
    </header>
