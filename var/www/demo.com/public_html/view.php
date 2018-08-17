<?php 
  $title = "View User Details";
  include_once('head.php');
  include_once('db.php');
  $q = "%{$_POST['query']}%";
  $stmt = $conn->prepare('SELECT * FROM users WHERE username LIKE ?');
  $stmt->bind_param("s",$q);
  $stmt->execute();
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $query = $stmt->get_result();
?>
<main>
	<div class="row">
    <div class="col-lg-2 col-md-1 col-sm-1"></div>
    <div class="col-lg-8 col-md-10 col-sm-10">
      <div class="border">  
        <div class="header-green">
		      <b> Search Results</b>
			  </div> 
<?php
  while ($row = $query->fetch_assoc()) { 
?>
    <div class="line-bottom">
      <div class="space"></div>
      <div class="row">
        <div class="col-md-6 col-lg-6 col-sm-6 pull-left ">
          <b><?php echo $row['username'] ?> </b>
        </div> 
        <div class="col-md-6 col-lg-6 col-sm-6 pull-right">
          <?php echo $row['email'] ?>
        </div>
      </div>
      <div class="space"></div>
    </div>';
<?php } ?>
      </div>
    </div>
    <div class="col-lg-2 col-md-1 col-sm-1"></div>
  </div>
</main>
<?php include_once('foot.php');?>

