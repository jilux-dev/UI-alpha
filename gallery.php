<?php
// secret.php 2016/04/12

    require("config.php");
    if(empty($_SESSION['user'])) 
    {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jilux User Interface</title>
	
	<!-- Custom Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Dosis:500' rel='stylesheet' type='text/css'>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
	
	<!-- Animate CSS -->
	<link href="css/animate.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/styles.css" rel="stylesheet">
	
	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">   
	
	<div class="container" >
		<div class="row">
			<h1 class="text-center" >Jilux User Interface 0.0.2f alpha</h1>
			<nav id="navbar-main" class="navbar navbar-default">
				
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#MainBar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>                        
						</button>
					</div>
					
					<div>
					  <div class="collapse navbar-collapse" id="MainBar">
						<ul class="nav navbar-nav navbar-left">
						<!-- For each user get modules and do <li><a href="DESIRED PATH.php">DESIRED path</a></li> -->
						  <li><a href="secret.php">Frontpage</a></li>
						  <li><a href="gallery.php">Gallery</a></li>
						  <li><a href="posts.php">Posts</a></li>
						  <li><a href="invoice.php">Invoice</a></li>
						</ul>
						
						<ul class="nav navbar-nav navbar-right">
						  <li><a href="settings.php">Settings</a></li>
						  
						<li><a href="logout.php">Log Out</a></li>
							
						</ul>
					  </div>
					</div>
				 
			</nav>	
		</div>
	</div>
	
	
	<div class="container-fluid">
		<div class="row" >

<div class="sidebar col-md-2">
	<!-- This is the next project step -->
	<nav id="navbar-side" class="navbar navbar-default">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#SideBar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			</button>
		</div>
					
		<div>
			<div class="collapse navbar-collapse" id="SideBar">
				<ul class="nav navbar-nav">
					<li><a class="navbutton" data-toggle="modal" data-target="#upload_modal" >Upload images</a></li>	
					<li><a class="navbutton" data-toggle="modal" data-target="#category_modal" >Add Category</a></li>						
				</ul>
			</div>
		</div>
	</nav>	
</div>
		
<div class="col-md-10" >
	<?php
		
		$image_folder = "images";	#TODO: get images folder based on MySQL user_name
		$directories = glob($image_folder . '/*' , GLOB_ONLYDIR); 
		
		if (!empty ($directories)) {
		
			foreach($directories as $categories) { #Check each directory for...
			
			$category_explode = explode("/",$categories);
			$category_name = $category_explode['1'];
			
			if ( glob($categories . "*.jpg")){ #... If category contains *.jpg, then do folder thumbnail		
				
				  ?>
				<div class="col-lg-2 col-md-2 col-xs-6 thumb">
					<a class="thumbnail" href="#">
						<img class="img-responsive" src="http://placehold.it/350x150" alt="">
					</a>
				</div>
				<?php } else { #else no images found show text ?> 
				<div class="col-lg-2 col-md-2 col-xs-6">
					<a class="thumbnail" href="#">
					<img class="img-responsive" src="http://placehold.it/350x350" alt="">
					</a>
					<p class="text-center" ><a href="#upload_modal" data-toggle="modal" data-target="#upload_modal">Upload Images</a> | <a href="<?php echo $category_name  ?>" ><?php echo $category_name  ?></a></p>
				</div>
			<?php	}
			} 
		} else { ?>
				<h1 class="text-center" >No images or categories found !</h1> <!-- Print error message -->
				<p class="text-center" >First <a href="#add_category" data-toggle="modal" data-target="#category_modal">Add category</a> to start with ur image gallery</p>
				<?php }
	?>	
</div>

<div id="category_modal" class="modal fade" role="dialog">
	<div class="modal-dialog ">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Add Category</h4>
		  </div>
		  <div class="modal-body">
			
                 
                
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>

	</div>
</div>

<div id="upload_modal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Upload images</h4>
		  </div>
		  <div class="modal-body">
			<p class="text-center" >!!! INSERT IMAGE DROP BOX HERE !!!</p>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>
		</div>

	</div>
</div>

</div>

</div>

	<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"></script>
	
	<!-- Custom JS -->
	<script scr="js/scripts.js"></script>

</body>

</html>




