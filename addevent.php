<?php 
	include("includes/header.php");
	
	$name = "";
	$title = "";
	$category = "";
	$date = "";
	$description = "";
	$id = "";
	if(isset($_POST['submit'])){
		$pass1 = '$2y$12$khOwVW15xLNxwCxBDg9aXe9fiYGr9rg8CoXtcWnIj1FMiJCBvg5w2';
		$sub = $_POST['inputPassword'];
		$res = password_verify($sub, $pass1);
		if($res===true){		
			$name = $_POST['name'];
			$category = $_POST['category'];
			$date = $_POST['date'];
			$description = $_POST['description'];
			$title = $_POST['title'];
			$sql = "INSERT INTO `posts`(`title`, `date`, `category`, `body`, `author`) VALUES ('$title','$date',$category,'$description','$name');";
			$message = "DATA STORED";
			if(mysqli_query($db, $sql)){
				echo "<script type='text/javascript'>alert('$message');</script>";
				$id = mysqli_insert_id($db);
				for($i=0 ; $i<count($_FILES["file_img"]["name"]) ; $i++){
					$filetmp = $_FILES["file_img"]["tmp_name"][$i];
					$filename = $_FILES["file_img"]["name"][$i];
					$filetype = $_FILES["file_img"]["type"][$i];
					$filepath = "uploads/".$filename;
				
					move_uploaded_file($filetmp, $filepath);
					$sql = "INSERT into image (id, path) VALUES ($id, '$filepath')";
					$result = mysqli_query($db,$sql);
			}
			}else{
				echo "<script type='text/javascript'>alert('Failed!');</script>";
			}
		}else{
			echo "<script type='text/javascript'>alert('Incorrect Password');</script>";
		}
		
		
		
		
	}
?>

<h3 class="pb-4 mb-4 font-italic border-bottom">
    Add Events
</h3>



<!-- start of container -->
    <div class="container-fluid">
      <!-- start of row -->
      <div class="row">
        <!-- start of column -->
        <div class="col col-sm-12">
          <!-- START FORM  -->
          <form class="" id="uploadForm" name="Form" action="" method="post" enctype="multipart/form-data">
            
            <div class="form-group row">
			  <div class="col-sm-8">
				<input class="form-control" required type="text" name="title" value="" placeholder="Title">
			  </div>
			  <div class="col-sm-4">
				<input class="form-control" required type="text" name="name" value="" placeholder="Name">
			  </div>
            </div>

            

            <!-- categroy -->
            <div class="form-group row">
				<div class="col-sm-4">
                <select class="form-control" name="category">
                  <option value="4">Select Category</option>
				  <option value="4">Other Events</option>
                  <option value="1">Technical</option>
                  <option value="2">Cultural</option>
                  <option value="3">Sports</option>
                </select>
				</div>
				<label for="date" class="col-sm-1 col-form-label">Date</label>
				<div class="col-sm-3">
					<input class="form-control" required type="date" name="date" value="">
				</div>
				<div class="col-sm-4">
					<input type="password" class="form-control" name="inputPassword" placeholder="Password">
				</div>
            </div>

            <!-- description -->
            <div class="form-group">
              <label for="">Description</label>
              <textarea class="form-control" name="description" rows="8" cols="80"></textarea>
            </div>
			
			<!-- image -->
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Upload</span>
              </div>
              <div class="custom-file">
                <input type="file" class="custom-file-input"
                  aria-describedby="inputGroupFileAddon01" accept="image/*" name="file_img[]" multiple>
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
              </div>
            </div>
			
			
            <br>
            <!-- submit -->
			<div class="text-right">
				<button type="submit" class="btn btn-primary mb-2" name="submit">Submit</button>
			</div>
          </form>
          <!-- FORM END -->
        </div>
        <!-- end of column -->
      </div>
      <!-- end of row -->
    </div>
    <!-- end of container -->


    </div><!-- /.blog-main -->



<?php include("includes/sidebar.php"); ?>
<?php include("includes/footer.php"); ?>