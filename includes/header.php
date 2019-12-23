<?php
	include("includes/config.php");
	include("includes/db.php");
	
	$query = "SELECT * FROM categories";
	
	$categories = $db->query($query);
?>
<form action="index.php?category=1" method="post">
</form>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Tushar Deshmukh">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>GECA</title>

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" >

<meta name="theme-color" content="#563d7c">


    <style>
	  .responsive {
		width: 100%;
		height: auto;
	  }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/blog.css" rel="stylesheet">
	<link href="css/navbar.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
  <header class="blog-header py-2">
      
        <a class="navbar-brand" href="#">
			<img src="img/final-logo.png" class="responsive">
		</a>
		<nav class="navbar navbar-expand-md navbar-dark bg-dark">
		  <a class="navbar-brand" href="#">GECA</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarsExample04">
			<ul class="navbar-nav mr-auto">
			<?php if(isset($_GET['category'])) {?>
			<?php if($_GET['category'] == 1) {?>
			  <li class="nav-item active"><a class="nav-link" href="index.php?category=1">Technical</a></li>
			<?php } else {?> 
			  <li class="nav-item"><a class="nav-link" href="index.php?category=1">Technical<span class="sr-only">(current)</span></a></li>
			<?php }?>
			<?php } else{?>
			  <li class="nav-item active"><a class="nav-link" href="index.php?category=1">Technical<span class="sr-only">(current)</span></a></li>
			<?php }?>
			  
			<?php if($categories->num_rows > 0) {
				while($row = $categories->fetch_assoc()) {
					if( isset($_GET['category']) && $row['id'] == $_GET['category'] ) {
						
			?>
			  <li class='nav-item active'><a class='nav-link' href='index.php?category=<?php echo $row['id'];?>'><?php echo $row['text'];?></a></li>
						<?php  } else echo "<li class='nav-item'><a class='nav-link' href='index.php?category=$row[id]'>$row[text]</a></li>";

			}}?>
			<?php if(isset($_GET['category'])) {?>
			<?php if($_GET['category'] == 5) {?>
			  <li class="nav-item active"><a class="nav-link" href="addevent.php?category=5">Add Events</a></li>
			<?php } else {?> 
			  <li class="nav-item"><a class="nav-link" href="addevent.php?category=5">Add Events</a></li>
			<?php }?>
			<?php } else{?>
			  <li class="nav-item"><a class="nav-link" href="addevent.php?category=5">Add Events</a></li>
			<?php }?>
			
			</ul>
			<form class="form-inline my-2 my-md-0">
			  <input class="form-control" type="text" placeholder="Search">
			</form>
		  </div>
		</nav>
    
  </header>
<div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4 font-italic">Some Title</h1>
      <p class="lead my-3">Multiple lines of text Multiple lines of text Multiple lines of text Multiple lines of text Multiple lines of text Multiple lines of text Multiple lines of text Multiple lines of text Multiple lines of text </p>
    </div>
  </div>

  
</div>

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      