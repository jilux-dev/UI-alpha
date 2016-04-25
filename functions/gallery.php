<?php
// secret.php 2016/04/12

    require("config.php");
    if(empty($_SESSION['user'])) 
    {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    }
?>
<div class="sidebar col-md-1">
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
					<li><a id="#upload_images" class="navbutton" >Upload Images</a></li>	
					<li><a id="#add_category" class="navbutton" >Add Category</a></li>						
				</ul>
			</div>
		</div>
	</nav>	
</div>

<div class="col-md-11" >
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
					<p class="text-center" >No images found | <a href="<?php echo $category_name  ?>" ><?php echo $category_name  ?></a></p>
				</div>
			<?php	}
			} 
		} else { ?>
				<h1 class="text-center" >No images or categories found !</h1> 
				<p class="text-center" >First <a href="#add_category">Add category</a> to start with ur image gallery</p>
				<?php }
	?>	
</div>
