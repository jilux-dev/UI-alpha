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
					<li><a id="#upload_images" class="navbutton" >Upload Images</a></li>					
				</ul>
			</div>
		</div>
	</nav>	
</div>

<div class="col-md-10" >
	<?php
		
		$image_folder = "images";	#TODO: get images folder based on MySQL user_name
		$directories = glob($image_folder . '/*' , GLOB_ONLYDIR); 
		
		
			foreach($directories as $images) { #Check each direcotry for...
			
			if ( glob($images . "*.jpg")){ #... Images if *.jpg do folder thumbnail		
				
				  ?>
				<div class="col-lg-3 col-md-4 col-xs-6 thumb">
					<a class="thumbnail" href="#">
						<img class="img-responsive" src="http://placehold.it/400x300" alt="">
					</a>
				</div>
				<?php } else { #else no images found show text ?> 
				<div class="col-lg-3 col-md-4 col-xs-6">
					
					<p class="text-center" >No images found</p> 
				</div>
			<?php	}
		} 
	?>	
</div>
