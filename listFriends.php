<?php
session_start();
?>
<!DOCTYPE html> 
<html lang="he"> 

<head> 
    <title>View List</title> 
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
							echo '<li><a href="listFriends_he.php?u='.$_SESSION['hash'].'">עברית</a></li>';
							echo '<li><a href="listFriends.php?u='.$_SESSION['hash'].'">אנגלית</a></li>';
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
				
					if (isset($_GET['u']) && $_GET['u'] != "") {
						if (!isset($_POST['submit'])) {
						$query = 'SELECT * FROM movies ORDER BY id';  

						$movielist = mysqli_query($conn, $query) or die ("cannot query the table "  
						.mysqli_error($conn));  

 

						if($movielist->num_rows > 0) { 
							
							echo "<form action='".$SERVER_['PHP_SELF']."' method='post' >";
							echo '<section id="back" class="col-9 contact"> 
								<div class="table-responsive form2">
								<h2 style="color:navy"><strong>The Movie List</h2><br>';
							echo '<table class = "table table-hover">';   

							echo '<tr><th><p>Poster</p></th><th><p>Full Title</p></th><th><p>Release Date</p></th><th><p>TMDb Rate</p></th><th><p>Your Rate</p></th></tr>'; 
							$num=0;
							while ($row = mysqli_fetch_array($movielist)) {	
							
							
							if ($row['hash'] == $_GET['u']){ 
							$num++;
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
							echo "<td>" . $row['year'] . "</td>";
							echo "<td id='vote'><strong>" . $row['vote'] . "</td>";   
							echo '<td id="rate">
							<fieldset id="demo'.$num.'" class="rating">
						  <input class="stars" type="radio" id="'.$num.'star_a-5" name="'.$num.'rating" value="5" />
						  <label class="full" for="'.$num.'star_a-5" title="5 stars"></label>
						  <input class="stars" type="radio" id="'.$num.'star_a_5-half" name="'.$num.'rating" value="4.5" />
						  <label class="half" for="'.$num.'star_a_5-half" title="4.5 stars"></label>
						  <input class="stars" type="radio" id="'.$num.'star_a-4" name="'.$num.'rating" value="4" />
						  <label class="full" for="'.$num.'star_a-4" title="4 stars"></label>
						  <input class="stars" type="radio" id="'.$num.'star_a_4-half" name="'.$num.'rating" value="3.5" />
						  <label class="half" for="'.$num.'star_a_4-half" title="3.5 stars"></label>
						  <input class="stars" type="radio" id="'.$num.'star_a-3" name="'.$num.'rating" value="3" />
						  <label class="full" for="'.$num.'star_a-3" title="3 stars"></label>
						  <input class="stars" type="radio" id="'.$num.'star_a_3-half" name="'.$num.'rating" value="2.5" />
						  <label class="half" for="'.$num.'star_a_3-half" title="2.5 stars"></label>
						  <input class="stars" type="radio" id="'.$num.'star2" name="'.$num.'rating" value="2" />
						  <label class="full" for="'.$num.'star2" title="2 stars"></label>
						  <input class="stars" type="radio" id="'.$num.'star2half" name="'.$num.'rating" value="1.5" />
						  <label class="half" for="'.$num.'star2half" title="1.5 stars"></label>
						  <input class="stars" type="radio" id="'.$num.'star1" name="'.$num.'rating" value="1" />
						  <label class="full" for="'.$num.'star1" title="1 star"></label>
						  <input class="stars" type="radio" id="'.$num.'starhalf" name="'.$num.'rating" value="0.5" />
						  <label class="half" for="'.$num.'starhalf" title="0.5 stars"></label>
						</fieldset><input type="hidden" name="result'.$num.'" id="result'.$num.'" value="" /></td>';
							echo '</tr>';    
						
							}
						} 
						echo '</table>
						<button type="submit" class="btn_sign_up" name="submit">SEND</button>
						</form>
						<p><br>Sign up as well and make your own movie list:<br><a href="home.php">Go to Home Page</a></p>
						</div></section>';
						}
						else{
							echo '<section id="back" class="col-9 contact"> 
								<div class="form" id="contact">
								No movies in the list!
								</div></section>';  
						}   
				}
					
				else if (isset($_POST['submit'])) { 
					include 'dbconnect.php'; 
					$hash = $_GET['u']; 
					$query = 'SELECT * FROM movies ORDER BY id';  

					$movielist = mysqli_query($conn, $query) or die ("cannot query the table "  
						.mysqli_error($conn));
						
					if($movielist->num_rows > 0) {
						$i=0;
						while ($row = mysqli_fetch_array($movielist)) {
							
							if ($row['hash'] == $_GET['u']){
							$i++;
							$rate = $_POST["result".$i.""];
													
							$stmt = $conn->prepare("INSERT INTO rates (title,rate,poster,hash) VALUES (?,?,?,?)");         
							$stmt->bind_param("ssss",$row['title'],$rate,$row['poster'],$row['hash']); 
							$stmt->execute(); 
							
							}	
						} 
					}
						$_SESSION['hash'] = $hash;
						echo '<section id="back" class="col-9 contact"> 	
							<div id="contact1" class="form">
							<p>Thank you for your rating!</p>
							<a href="viewRate.php?u='.$_SESSION['hash'].'">View Total Rate</a>
							</div></section>'; 
						unset($_POST['submit']);
					}
				}					
				else
				{
					echo '<section id="back" class="col-9 contact"> 
								<div class="form" id="contact">';
						echo "you are not signed in
						</div></section>";	
				}
				 
			?>
				
			

			</div>
			
			

			<footer id="ci" class="col-12"> 
				<p>© All rights reserved</p> 
			</footer>
			
</body>
</html>

