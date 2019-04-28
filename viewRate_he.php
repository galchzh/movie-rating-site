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
	<link rel="stylesheet" type="text/css" href="./styles/style_he.css">	
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
					<li id="home"><a href="homehe.php">דף הבית</a></li>
					<li><a href="aboutUs_he.php">קצת עלינו</a></li>
					<li><a href="contactUs_he.php">צור קשר</a></li>
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
					<li id="lang" class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>
						<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="logout_he.php">התנתק</a></li>
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
					<h2 style="color:navy"><strong>רשימת הדירוג הכולל</h2><br>';
					echo '<table class = "table table-hover">';   

					echo '<tr><th><p>מספר המדרגים</p></th><th><p>ממוצע הדירוג</p></th><th><p>שם הסרט</p></th><th><p>פוסטר</p></th></tr>'; 
							
							
							while ($row = mysqli_fetch_array($movielist)) {	
							
							if ($row['hash'] == $_GET['u']){ 

							$title = $row['title'];
							$ratesque = "SELECT rate FROM rates WHERE title = '$title'"; 
							$rates = mysqli_query($conn,$ratesque) or die ("no rates"); 
							$count = mysqli_num_rows($rates); 
							$average = 0; 
							while ($rate=mysqli_fetch_array($rates)) { 
								if ($rate['rate'] != 0) { 
									$average = $average + $rate['rate']; 
								} else { 
									$count = $count - 1; 
								} 
							} 
							if ($count == 0) { 
								$ave = "none"; 
							} else {             
								$ave = $average / $count;                 
								$ave = sprintf("%01.2f", $ave); 
							} 
							echo "<tr>"; 
							echo "<td id='vote'>".$count."</td>";  
							echo "<td id='vote'>".$ave."</td>"; 
							echo "<td id='title'>" . $row['title'] . "</td>";
								if ($row['poster'] == "no poster found")
							{
								echo "<td> <img src='images/noposter.jpg' alt='No Poster Found' height='150' width='100'></td>";
							}
							else
							{
								echo "<td> <img src='http://image.tmdb.org/t/p/w185".$row['poster']."' alt='' height='150' width='100'></td>";
							} 
											
						
							}
						} 
						echo '</table>
						</form>';
						$_SESSION['hash'] = $_GET['u'];
						if ((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
							echo '<p><br>:עבור חזרה בכדי להוסיף סרט נוסף<br><a href="movie_he.php?u="'.$_SESSION['hash'].'>הוסף סרט חדש</a></p>';
						} else {						
						echo '<p><br>:גם אתה יכול להירשם לאתר וליצור לך רשימת סרטים משלך<br><a href="homehe.php">עבור לעמוד הבית</a></p>'; }
						echo '</div></section>';
						}
						else{
							echo '<section id="back" class="col-9 contact"> 
								<div class="form" id="contact">
								!לא קיימים סרטים ברשימה
								</div></section>';  
						}   
			?>
				
			

			</div>
			
			

			<footer id="ci" class="col-12"> 
				<p>© All rights reserved</p> 
			</footer>
			
</body>
</html>
