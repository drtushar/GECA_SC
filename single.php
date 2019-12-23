<?php include("includes/header.php"); 
	$result = false;
	$posts = "";
	$img = "";
	$flag = 0;
	if(isset($_GET['id'])){
		$category = mysqli_real_escape_string($db, $_GET['id'] );
		$query = "SELECT * FROM posts WHERE id=$category";
		$imgquery = "SELECT * FROM image WHERE id=$category";
	}else{
		$query = "SELECT * FROM posts where category=1";
		$imgquery = "SELECT * FROM image WHERE id=1";
	}
	if(isset($_POST['delete_id'])){
		$delete_id = $_POST['delete_id'];
		$pass1 = '$2y$12$Q76w8PM0rVfBxhffDBNd4uyDTY0nl/z6wiDVGkr2bLaLbRYc7TA96';
		$sub = $_POST['inputPassword'];
		$res = password_verify($sub, $pass1);
		if($res===true){
			$query1 = "DELETE FROM `image` WHERE id=$delete_id";
			$query2 = "DELETE FROM `posts` WHERE id=$delete_id";
			mysqli_query($db, $query1);
			$result = mysqli_query($db, $query2);
		}else{
			echo "<script type='text/javascript'>alert('Incorrect Password');</script>";
			$flag = 1;
		}
		//echo $delete_id;
		
	}
	if($result===false && $flag === 0){
	$posts = $db->query($query);
	$img = $db->query($imgquery);
	}
	
	
?>
  
    
 

	
      

	  <?php if($result===false && $flag === 0) {?>
	  <?php if($posts->num_rows > 0) { 
		while($row = $posts->fetch_assoc()) {
	  ?>
      
	  <div class="blog-post">
	  <div class="row">
	  <div class="col-sm-11">
        <h2 class="blog-post-title"><?php echo $row['title'] ?></h2>
	  </div>
	  <div class="col-sm-1">	
		<button class="btn btn-danger" onclick="deletePost(<?php echo $_GET['id']?>)">X</button>
	  </div>
	  </div>	
        <p class="blog-post-meta"><?php echo $row['date'] ?> by <a href="#"><?php echo $row['author'] ?></a></p>

        
        <hr>
        <p><?php echo $row['body'] ?></p>
        <?php while($imgrow=mysqli_fetch_array($img)) { 
		
			echo "<img src='".$imgrow['path']."'   width='360' height='150'/>";
			//echo '<img src="data:image/jpeg;base64,'.base64_encode($imgrow['img'] ).'" class="responsive" width="360" height="150"/>';
		?>
			
		<?php }?>
      </div><!-- /.blog-post -->
	  
	  
	  <?php } }?>
	  <?php }?>
	  
	  <?php
		if($result != false){
			echo "<div class='alert alert-danger' role='alert'>Post Succesfully Deleted</div>";
			$result = false;
			$flag = 0;
		}
	  ?>
      <form>
		
	  </form>
		<form  action="single.php" method="POST" id="deletePost">
			<input type="hidden" id="delete_id" name="delete_id" value="">
			<div class="form-group row">
				<label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-10">
				  <input type="password" class="form-control" name="inputPassword" placeholder="Password">
				</div>
			</div>
		</form>
     </div><!-- /.blog-main -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">
	function deletePost(id){
		Swal.fire({
		  title: 'Are you sure?',
		  text: "You won't be able to revert this!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		  if (result.value) {
			document.getElementById("delete_id").value = id;
			document.getElementById("deletePost").submit();
		  }
		})	
	}
</script>

<?php include("includes/sidebar.php"); ?>
<?php include("includes/footer.php"); ?>