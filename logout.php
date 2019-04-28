<?php 
session_start(); 
session_unset(); 
session_destroy();  



?>

<!DOCTYPE html> 
<html lang="he"> 

	<head> 
		<title>Log Out</title> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
		<link rel="stylesheet" type="text/css" href="./styles/style1.css"> 
		<link rel="stylesheet" type="text/css" href="./styles/style2.css"> 
		<link rel="stylesheet" type="text/css" href="./styles/style3.css"> 
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
				<ul class="nav navbar-nav navbar-left">
					<li id="home"><a href="home.php">Home Page</a></li>
					<li><a href="aboutUs.php">About Us</a></li>
					<li><a href="contactUs.php">Contact Us</a></li>
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span>
						<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href = "home.php">Log In</a></li>
						</ul>
					</li>
						
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span  id="lang" class="glyphicon glyphicon-globe"></span>
						<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href = "homehe.php">עברית</a></li>
							<li><a href = "home.php">English</a></li>
						</ul>
					</li>
				</ul>
			  </div>
			</nav>
		</header>
		<section class="section">
			<div class="logout">
				<h1>You are now logged out!</h1>
				<h2>Have a nice day :)</h2>
				
				<a href="home.php">Go Back to Home Page</a>
			</div>
		</section>
		
			<footer id="ci" class="col-12"> 
				<p>© All rights reserved</p> 
			</footer> 
			
	</body>
</html>