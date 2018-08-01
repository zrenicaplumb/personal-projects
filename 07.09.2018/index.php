<?php
require_once('config.php');
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		
		<?php require_once('head.php');?>
		<title>Php/Js practice</title>
	</head>

	<body>
		<header>
				<?php  

				 	require_once('nav.php');
				 ?>
			</header>
		<section class="one">
			<div class="thank-background hide"> 
				<div class="thank-you">
					<img src="img/close.png" class="close-btn"/>
					<img src="img/checkmark.png" class="checkmark"/>
					<h2>Thank you for signing up!</h2>
				</div>
			</div>
			
			<main>
				<div class="container">
					<article>
						<h1 class="greeting-text">Lorem ipsum dolor sit amet.</h1>
						<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
					</article>
					<article>
						<div class="row">	
							<div class="col-xs-12 col-sm-6">
								<img src="img/pic1.jpeg">
								<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
							</div>
							<div class="col-xs-12 col-sm-6">
								<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
							</div>
						</div>
					</article>
				</div>
			</main>
		</section>
		<section class="two">
			<div class="container">
				<h2>Add your favorites</h2>
				<div id="accordion">
				  	<div class="card">
				    	<div class="card-header" id="headingOne">
					      	<h5 class="mb-0">
						        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						         Music 
						        </button>

					      	</h5>
				    	</div>
				    	<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
					      	<div class="card-body">
					      		<div class="d-flex flex-wrap">
					        	 <?php 
					        	 	   	$musics = MusicController::findAll();
					        	 	   	foreach($musics as $music){
					        	 	   		echo $music->render();
					        	 	   	}   		
								?>
					        	</div>
					      	</div>
				    	</div>
				  	</div>

				  	<div class="card">
				    	<div class="card-header" id="headingTwo">
					      	<h5 class="mb-0">
						        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						        	Books
						        </button>

					      	</h5>
				    	</div>
				    	<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
					      	<div class="card-body">
					      		<div class="d-flex flex-wrap">
					        	 <?php 
					        	 	   	$books = BookController::findAll();
					        	 	   	foreach($books as $book){
					        	 	   		echo $book->render();
					        	 	   	}   		
								?>
					        	</div>
					      	</div>
				    	</div>
				  	</div>

				  	<div class="card">
				    	<div class="card-header" id="headingThree">
					      	<h5 class="mb-0">
						        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
						        	Movies
						        </button>

					      	</h5>
				    	</div>
				    	<div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
					      	<div class="card-body">
					      		<div class="d-flex flex-wrap">
					        	 <?php 
				        	 	   	$movies = MovieController::findAll();
				        	 	   	foreach($movies as $movie){
				        	 	   		echo $movie->render();
				        	 	   	}   		
								?>
					        	</div>
					      	</div>
				    	</div>
				  	</div>
				  	
				</div>
			</div>	
		</section>
		<section class="three">
			
					<div class="container">
						
						<h3>To add a new item, select a media type.</h3>
						<div class="media-btn-wrap">
							<button id="music-btn">Music</button>
							<button id="book-btn">Books</button>
							<button id="movie-btn">Movies</button>
						</div>
						<form method="post" enctype="multipart/form-data" action="api.php" class="music-form" > 
							<h4>Music</h4>
							<input type="hidden" name="method" value="createMusicItem" />
							<input type="text" name="genre" placeholder="Genre">
							<input type="text" name="artist" placeholder="Artist">
							<input type="text" name="title" placeholder="Title">
							<label>Add music cover</label>
							<input type="file" name="image" placeholder="Album cover/artist" required>
							<button class="btn music-submit" type="submit" name="submit" value="musicsubmit">Add to music</button>
						</form>
						<form method="post" enctype="multipart/form-data" action="api.php" class="hidden book-form" >
							<h4>Book</h4>
							<input type="hidden" name="method" value="createBookItem" />
							<input type="text" name="genre" placeholder="Genre">
							<input type="text" name="author" placeholder="Author">
							<input type="text" name="title" placeholder="Title">
							<label>Add book cover</label>
							<input type="file" name="image" placeholder="Book cover" required>
							<button class="btn book-submit" type="submit" name="submit" value="booksubmit">Add to books</button>
						</form>	
						<form method="post" enctype="multipart/form-data" action="api.php" class="hidden movie-form" >
							<h4>Movie</h4>
							<input type="hidden" name="method" value="createMovieItem" />
							<input type="text" name="genre" placeholder="Genre">
							<input type="text" name="director" placeholder="Director">
							<input type="text" name="title" placeholder="Title">
							<label>Add movie art</label>
							<input type="file" name="image" placeholder="Movie art" required>
							<button class="btn movie-submit" type="submit" name="submit" value="moviesubmit">Add to movies</button>
						</form>	
							
					
			</div>
		</section>
		
			<footer>
				<div class="container">
					
				
				 
				Footer
			
				</div>
			</footer>
			
		
		
		<script>
			$(function(){
				$('.music-form').ajaxSubmit(function(result){
					if(result.status == "success"){
                    	alert("New Item Id: "+result.data.id);
                    } else {
                    	alert(result.message);
                    }
				});
				$('.book-form').ajaxSubmit(function(result){
					if(result.status == "success"){
                    	alert("New Item Id: "+result.data.id);
                    } else {
                    	alert(result.message);
                    }
				});
				$('.movie-form').ajaxSubmit(function(result){
					if(result.status == "success"){
                    	alert("New Item Id: "+result.data.id);
                    } else {
                    	alert(result.message);
                    }
				});
				
			
			});
			
		</script>

	</body>
</html>