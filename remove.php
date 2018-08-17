<?php
  $title = "Remove/Edit User";
  $errors = array();
  include_once('head.php');
  include_once('db.php');
  $user = $_POST['user'];
    
  if ($user != 'admin') {
    $stmt = $conn->prepare('DELETE FROM users WHERE username=? ');
    $stmt->bind_param("s", $user);
    $stmt->execute();
  } else {
    array_push($errors, "Can't remove admin");
  }
  //$q = $_POST['query'];
  $stmt = $conn->prepare('SELECT * FROM users ORDER BY id DESC');
  $stmt->execute();
  $query = $stmt->get_result();
  //$exe = mysqli_query($conn, $que);
  //$query = mysqli_query($conn, $sql);
  if (!($query->num_rows)) {
    die ('SQL Error: ' . mysqli_error($conn));
  }
?>
<main>
	<div class="row">
    <div class="col-lg-2 col-md-1 col-sm-1"></div>
    <div class="col-lg-8 col-md-10 col-sm-10">
      <div class="border">  
        <div class="header-green">
		      <b> Users</b>
        </div> 
        <br>
        <?php include('errors.php'); ?> 
<?php
  while ($row = $query->fetch_assoc()) {
    echo '
    <div class="line-bottom">
      <div class="space"></div>
      <div class="row">
        <div class="col-md-4 col-lg-4 col-sm-4 pull-left ">
          <b>'.$row['username'].' </b>';
          if ($row['username'] == 'admin'){
            echo '<span style="color: gold"> <i class="fas fa-star"></i> </span>';
          } 
        echo'</div> 
        <div class="col-md-4 col-lg-4 col-sm-4 pull-center">
          '.$row['email'].' 
        </div>
        <div class="col-md-4 col-lg-4 col-sm-4 pull-right">
          <form action="#" method="POST">
            <input class="button-small button1" type="Submit" value="Remove" />
            <input type="hidden" value="'.$row['username'].'" name="user" />
          </form> 
      </div>
      </div>
      <div class="space"></div>
    </div>';
  }
?>
      </div>
    </div>
    <div class="col-lg-2 col-md-1 col-sm-1"></div>
  </div>
</main>
<?php include_once('foot.php');?>