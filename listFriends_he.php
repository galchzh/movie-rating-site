<?php
session_start();
?>
<!DOCTYPE html> 
<html lang="he"> 

<head> 
    <title>רשימת הסרטים</title> 
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
			  <?php if ((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) { ?>
			  	<ul class="nav navbar-nav navbar-left movie">
					<li id="movie"><a href="homehe.php">דף הבית</a></li>
					<li><a href="aboutUs_he.php">קצת עלינו</a></li>
					<li><a href="contactUs_he.php">צור קשר</a></li>
					<li><a href="movie_he.php">הוסף סרט</a></li>
				</ul>
			  <?php } else { ?>
			  
				<ul class="nav navbar-nav navbar-left">
					<li id="home"><a href="homehe.php">דף הבית</a></li>
					<li><a href="aboutUs_he.php">קצת עלינו</a></li>
					<li><a href="contactUs_he.php">צור קשר</a></li>
				</ul>
			  <?php } ?>
				
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
								<h2 style="color:navy"><strong>רשימת הסרטים</h2><br>';
							echo '<table class = "table table-hover">';   


							echo '<tr><th><p>הדירוג שלך</p></th><th><p>דירוג TMDb</p></th><th><p>תאריך הוצאה</p></th><th><p>שם הסרט</p></th><th><p>פוסטר</p></th></tr>'; 
	 
							$num=0;
							while ($row = mysqli_fetch_array($movielist)) {	
							
							
							if ($row['hash'] == $_GET['u']){ 
							$num++;
							echo "<tr>"; 
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
								echo "<td id='vote'><strong>" . $row['vote'] . "</td>";
								echo "<td>" . $row['year'] . "</td>";
								echo "<td id='title'>" . $row['title'] . "</td>"; 
							if ($row['poster'] == "no poster found")
							{
								echo "<td> <img src='images/noposter.jpg' alt='No Poster Found' height='150' width='100'></td>";
							}
							else
							{
								echo "<td> <img src='http://image.tmdb.org/t/p/w185".$row['poster']."' alt='' height='150' width='100'></td>";
							} 

						
							echo '</tr>';    
						
							}
						} 
						echo '</table>
						<button type="submit" class="btn_sign_up" name="submit">SEND</button>
						</form>
						<p>:גם אתה יכול להירשם לאתר וליצור לך רשימת סרטים משלך<br><a href="homehe.php">עבור לדף הבית</a></p>
						</div></section>';
						}
						else{
							echo '<section id="back" class="col-9 contact"> 
								<div class="form" id="contact">
								!לא קיימים סרטים ברשימה
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
							<p>!תודה על תגובתך</p>
							<a href="viewRate_he.php?u='.$_SESSION['hash'].'">צפה בדירוג הכולל</a>
							</div></section>'; 
						unset($_POST['submit']);
					}
				}					
				else
				{
					echo '<section id="back" class="col-9 contact"> 
								<div class="form" id="contact">';
						echo "אינך מחובר
						</div></section>";	
				}
			?>	
			</div>

			<footer id="ci" class="col-12"> 
				<p>© כל הזכויות שמורות</p> 
			</footer>
			
</body>
</html>

