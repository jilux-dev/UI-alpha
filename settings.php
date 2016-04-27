<?php
// secret.php 2016/04/12

    require("config.php");
    if(empty($_SESSION['user'])) 
    {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    }
?>

<?php 
    require("config.php");
    if(!empty($_POST)) 
    { 
        // Ensure that the user fills out fields 
        if(empty($_POST['username'])) 
        { die("Please enter a username."); } 
        if(empty($_POST['password'])) 
        { die("Please enter a password."); } 
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        { die("Invalid E-Mail Address"); } 
          
        // Check if the username is already taken
        $query = " 
            SELECT 
                1 
            FROM users 
            WHERE 
                username = :username 
        "; 
        $query_params = array( ':username' => $_POST['username'] ); 
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
        $row = $stmt->fetch(); 
        if($row){ die("This username is already in use"); } 
        $query = " 
            SELECT 
                1 
            FROM users 
            WHERE 
                email = :email 
        "; 
        $query_params = array( 
            ':email' => $_POST['email'] 
        ); 
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage());} 
        $row = $stmt->fetch(); 
        if($row){ die("This email address is already registered"); } 
          
        // Add row to database 
        $query = " 
            INSERT INTO users ( 
                username, 
                password, 
                salt, 
                email 
            ) VALUES ( 
                :username, 
                :password, 
                :salt, 
                :email 
            ) 
        "; 
          
        // Security measures
        $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
        $password = hash('sha256', $_POST['password'] . $salt); 
        for($round = 0; $round < 65536; $round++){ $password = hash('sha256', $password . $salt); } 
        $query_params = array( 
            ':username' => $_POST['username'], 
            ':password' => $password, 
            ':salt' => $salt, 
            ':email' => $_POST['email'] 
        ); 
        try {  
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
        header("Location: index.php"); 
        die("Redirecting to index.php"); 
    } 
?>

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
			<div class="col-md-12" >

<h1 class="text-center" >Admin Page </h1>
<br />
<div class="col-md-offset-3 col-md-6" >
	<form action="register.php" method="post"> 
		<ul class="list-group">
		<p>Enter username:</p><input type="text" name="username" value="" />
		<p>Enter e-mail:	</p><input type="text" name="email" value="" />
		<p>Enter password: </p><input type="text" name="password" value="" />
		</ul>
	<input type="submit" class="btn btn-info" value="Register" />		
	</form>
	
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