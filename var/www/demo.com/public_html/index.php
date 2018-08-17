<?php
  include_once('db.php');
  $title = "Home";
  include_once('head.php');
  $name = $_POST['name'];
  $comment = $_POST['comment'];
  $user = $_SESSION['username'];
  $query = "INSERT INTO demo(name,comment) VALUES('$name','$comment')";
  if ( $name != NULL and $comment != NULL) {
    $conn->query($query);
  }  
?>

<main>
	<div class="row">
    <div class="col-md-3">
      <div class="border">  
		    <center>
          <div class="header-green">
		        <b> Add a comment</b>
			    </div>
          <?php  if (isset($_SESSION['username'])) : ?>
		      <form action="" method="post"> 
		        <br>    
		        <input type="text" name="name" class="" placeholder="Name" value="<?php echo $_SESSION['username'] ?>" readonly/>
		        <br>
		        <input type="text" name="comment" class="" placeholder="Comment"/>
		        <br>
		        <input type="Submit" class="button button1" name="Add"/>
		      </form>
         <?php endif ?>
         <?php  if (!isset($_SESSION['username'])) : ?>
          <p> Login to add a comment </p>
         <?php endif ?>
        </center>
		  </div>
	
      <?php  if (!isset($_SESSION['username'])) : ?>
        <div class="vertical-menu">
			    <a href="#" class="active"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
			    <a href="/login"><i class="fas fa-user"></i> Login</a>
			    <a href="/reg"><i class="fas fa-user-plus"></i> Register</a>
			    <a href="#"><i class="fas fa-lock"></i> Privacy</a>
			    <a href="#"><i class="fas fa-envelope-square"></i> Contact</a>
        </div>
      <?php endif ?>
      <?php  if (isset($_SESSION['username'])) : ?>
        <div class="border">
          <div class="header-green"> <b>User Details</b> </div>
          <p class="line-bottom"> 
            <i class="fas fa-user"></i> <?php echo $_SESSION['username']?> 
            <?php if ( $_SESSION['username'] == "admin")  echo '(Superuser)'; ?>
          </p> 
          <p class="line-bottom"> 
            <i class="fas fa-envelope-square"></i> <?php echo $_SESSION['email']?> 
          </p>
          <div class="line-bottom" style="border:0">
            <a href="?logout"> <i class="fas fa-sign-out-alt"></i> Logout </a>
          </div>
        </div>
      <?php endif ?>
    </div>
    <div class="col-md-9">
      <div class="border">
			  <div class="header-green">
		      <b> Comments</b>
			  </div>
<?php
  $lim = 4;  
  if (isset($_GET["page"])) { 
    $page  = $_GET["page"];
  } else { 
    $page = 1;
  } 

  $start_from = ($page-1) * $lim;  
  //prepared statements  
  $stmt = $conn->prepare('SELECT * FROM demo ORDER BY id DESC LIMIT ?, ?');
  $stmt->bind_param("ii", $start_from, $lim); 
  $stmt->execute();     
  $query = $stmt->get_result();
  
  if (!($query->num_rows)) {
    die ('SQL Error: ' . mysqli_error($conn));
  }
  while ($row = mysqli_fetch_array($query)) {
?>
  <div class="line-bottom">
    <table>
      <tr>
        <td align="left">
          <i class="far fa-user-circle fa-3x"></i>
        </td>
        <td align="">
          <p> <b> <?php echo $row['name'] ?> </b></p>
          <p style="font-size: 13px; background: #e2e2e2; padding: 5px; cursor: pointer;" id="comment">  
          <?php echo $row['comment'] ?> 
          </p>
          <div id="post">
          <?php echo $row['comment'] ?>
          </div>
        </td>
      </tr>
    </table>
  </div>
  <br>
<?php  
  } 
  //paging
  $sql = "SELECT COUNT(id) FROM demo";  
  $rs_result = mysqli_query($conn, $sql);  
  $row = mysqli_fetch_row($rs_result);  
  $total_records = $row[0];  
  $total_pages = ceil($total_records / $lim);
?>
    <center>
      <div class="pagination">
        <a href="?page=1">First</a>
        <a href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>">Prev</a>
        <a href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?page=".($page + 1); } ?>">Next</a>
        <a href="?page=<?php echo $total_pages; ?>">Last</a>
      </div>
    </center>
		</div>
  </div>
</div>
</main> 
 <!--main -->
 <?php include_once('foot.php'); ?>
