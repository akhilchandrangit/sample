<?php
  session_start();
  require_once('db.php');
  $username = "";
  $email    = "";
  $errors = array(); 
// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (strcasecmp($username,"admin") == 0 || strcasecmp($username,"administrator") == 0) {
    array_push($errors, "Usernames like admin, administrator etc. not allowed");
  }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	  array_push($errors, "The two passwords do not match");
  }
  //captcha validation
  if ( $_POST['captcha'] != $_SESSION['rand_code']){
    array_push($errors, "Incorrect Captcha");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }  
    
  if(!empty($_POST["remember"])) {
    setcookie ("member_login",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
    setcookie ("member_password",$_POST["password_1"],time()+ (10 * 365 * 24 * 60 * 60));
  } else {
      if(isset($_COOKIE["member_login"])) {
        setcookie ("member_login","");
      }
      if(isset($_COOKIE["member_password"])) {
        setcookie ("member_password","");
      }
    }
  

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($conn, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        //$email = mysqli_query($conn, $equery);
        $results = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($results);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['email'] = $row['email'];
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
    if(!empty($_POST["remember"])) {
      setcookie ("member_login",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
      setcookie ("member_password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
    } else {
        if(isset($_COOKIE["member_login"])) {
          setcookie ("member_login","");
        }
        if(isset($_COOKIE["member_password"])) {
          setcookie ("member_password","");
        }
      }
  }
  
  ?>
