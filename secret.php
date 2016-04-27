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
			<!-- This will be a sticky container. Only the .php content will change without page reload on navigation click -->
			<!-- Example click navigation: settings - load settings.php -->
			
			
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
