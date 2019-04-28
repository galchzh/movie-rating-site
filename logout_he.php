<?php 
session_start(); 
session_unset(); 
session_destroy();  

?>

<!DOCTYPE html> 
<html lang="he"> 

	<head> 
		<title>התנתק</title> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
		<link rel="stylesheet" type="text/css" href="./styles/style1.css"> 
		<link rel="stylesheet" type="text/css" href="./styles/style2.css"> 
		<link rel="stylesheet" type="text/css" href="./styles/style3.css"> 
		<link rel="stylesheet" type="text/css" href="./styles/style_he.css">		
		<meta charset="utf-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script> 
	    <script src="./scripts/scripts1.js"></script> 
		<script src="./scripts/scripts2.js"></script> 
		<script src="./scripts/scripts3.js"></script>			
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
							<li><a href="homehe.php">התחבר</a></li>
						</ul>
					</li>
						
					<li  id="sin" class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span  class="glyphicon glyphicon-globe"></span>
						<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href = "logout_he.php">עברית</a></li>
							<li><a href = "logout.php">English</a></li>
						</ul>
					</li>
				</ul>
			  </div>
			</nav>
		</header>
		<section class="section">
			<div class="logout">
				<h1>אתה כעת מנותק</h1>
				<h2>:) שיהיה לך יום טוב</h2>
				
				<a href="homehe.php">עבור חזרה לעמוד הבית</a>
			</div>
		</section>
		
			<footer id="ci" class="col-12"> 
				<p>© כל הזכויות שמורות</p> 
			</footer> 
			
	</body>
</html>