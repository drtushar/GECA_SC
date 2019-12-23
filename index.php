<?php include("includes/header.php"); 

	if(isset($_GET['category'])){
		$category = mysqli_real_escape_string($db, $_GET['category'] );
		$query = "SELECT * FROM posts WHERE category='$category' ORDER BY date ASC;";
	}else{
		$query = "SELECT * FROM posts where category=1 ORDER BY date ASC;";
	}
	
	
	$posts = $db->query($query);
?>
  
    
 

	
      <h3 class="pb-4 mb-4 font-italic border-bottom">
        GECA Events
      </h3>

	  
	  <?php if($posts->num_rows > 0) { 
		while($row = $posts->fetch_assoc()) {
	  ?>
      
	  <div class="blog-post">
        <h2 class="blog-post-title"><a href="single.php?id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a></h2>
        <p class="blog-post-meta"><?php echo $row['date'] ?> by <a href="#"><?php echo $row['author'] ?></a></p>

        
        <hr>
        <p><?php echo $row['body'] ?></p>
        <a href="single.php?id=<?php echo $row['id'] ?>"  class="btn btn-primary">Read More</a>
      </div><!-- /.blog-post -->
	  
	  
	  <?php } }?>
      

     
</div><!-- /.blog-main -->
    

<?php include("includes/sidebar.php"); ?>
<?php include("includes/footer.php"); ?>