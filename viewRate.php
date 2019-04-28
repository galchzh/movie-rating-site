<?php
session_start();
?>
<!DOCTYPE html> 
<html lang="he"> 

<head> 
    <title>Rate List</title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <link rel="stylesheet" type="text/css" href="./styles/style1.css"> 
	<link rel="stylesheet" type="text/css" href="./styles/style2.css"> 
	<link rel="stylesheet" type="text/css" href="./styles/style3.css"> 
	<link rel="stylesheet" type="text/css" href="./styles/stars.css"> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script> 
    <script src="./scripts/scripts1.js"></script> 
	<script src="./scripts/scripts2.js"></script> 
	<script src="./scripts/scripts3.js"></script>	
	<script src="./scripts/stars.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://www.bootstraptoggle.com/js/bootstrap-toggle.js"></script>

</head> 
 
<body> 
	   <header id="mainheader" class="col-12"> 
             <img id="mainimg" src="./images/rate5.png"> 
		
		
			<nav class="navbar navbar-default" role="navigation" id="cover">
			  <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				  
				</button>    
			  </div>

			  <div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-left">
					<li id="home"><a href="home.php">Home Page</a></li>
					<li><a href="aboutUs.php">About Us</a></li>
					<li><a href="contactUs.php">Contact Us</a></li>
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
					<li id="lang" class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>
						<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="logout.php">Log Out</a></li>
						</ul>
					</li>
						
					<li  id="sin" class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span  class="glyphicon glyphicon-globe"></span>
						<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<?php
							echo '<li><a href="viewRate_he.php?u='.$_SESSION['hash'].'">עברית</a></li>';
							echo '<li><a href="viewRate.php?u='.$_SESSION['hash'].'">אנגלית</a></li>';
							?>
						</ul>
					</li>
				</ul>
			  </div>
			</nav>
		</header>
		<div class="row"> 
		
		<?php
			include 'dbconnect.php';
				
				$query = 'SELECT title, ANY_VALUE(id) AS id, ANY_VALUE(rate) AS rate, ANY_VALUE(poster) AS poster, ANY_VALUE(hash) AS hash FROM rates GROUP BY title';  

				$movielist = mysqli_query($conn, $query) or die ("cannot query the table "  
						.mysqli_error($conn));  
				
				if($movielist->num_rows > 0) { 
							
				echo '<section id="back" class="col-9 contact"> 
					<div class="table-responsive form2">
					<h2 style="color:navy"><strong>The Rate List</h2><br>';
					echo '<table class = "table table-hover">';   

					echo '<tr><th><p>Poster</p></th><th><p>Full Title</p></th><th><p>Average Rating</p></th><th><p>Number of Votes</p></th></tr>'; 
							
							
							while ($row = mysqli_fetch_array($movielist)) {	
							
							if ($row['hash'] == $_GET['u']){ 

							$title = $row['title'];
							$ratesquery = "SELECT rate FROM rates WHERE title = '$title'"; 
							$ratesList = mysqli_query($conn,$ratesquery) or die ("no rates"); 
							$counter = mysqli_num_rows($ratesList); 
							$average = 0; 
							while ($rate=mysqli_fetch_array($ratesList)) { 
								if ($rate['rate'] != 0) { 
									$average = $average + $rate['rate']; 
								} else { 
									$counter = $counter - 1; 
								} 
							} 
							if ($counter == 0) { 
								$averageA = "none"; 
							} else {             
								$averageA = $average / $counter;                 
								$averageA = sprintf("%01.2f", $averageA); 
							} 
							echo "<tr>"; 
							if ($row['poster'] == "no poster found")
							{
								echo "<td> <img src='images/noposter.jpg' alt='No Poster Found' height='150' width='100'></td>";
							}
							else
							{
								echo "<td> <img src='http://image.tmdb.org/t/p/w185".$row['poster']."' alt='' height='150' width='100'></td>";
							} 
							echo "<td id='title'>" . $row['title'] . "</td>";  
							echo "<td id='vote'>".$averageA."</td>"; 
							echo "<td id='vote'>".$counter."</td>"; 
											
						
							}
						} 
						echo '</table>
						</form>';
						$_SESSION['hash'] = $_GET['u'];
						if ((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
							echo '<p><br>Go back to Add a new movie:<br><a href="movie.php?u="'.$_SESSION['hash'].'>Go to Movies Page</a></p>';
						} else {						
						echo '<p><br>Sign up as well and make your own movie list:<br><a href="home.php">Go to Home Page</a></p>'; }
						echo '</div></section>';
						}
						else{
							echo '<section id="back" class="col-9 contact"> 
								<div class="form" id="contact">
								No movies in the list!
								</div></section>';  
						}   
				
				 
			?>
				
			

			</div>
			
			

			<footer id="ci" class="col-12"> 
				<p>© All rights reserved</p> 
			</footer>
			
</body>
</html>
