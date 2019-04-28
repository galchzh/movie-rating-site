<?php
session_start();
?>
<!DOCTYPE html> 
<html lang="he"> 

	<head> 
		<title>Home Page</title> 
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

	<div id="body">
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
					<li id="movie"><a href="home.php">Home Page</a></li>
					<li><a href="aboutUs.php">About Us</a></li>
					<li><a href="contactUs.php">Contact Us</a></li>
					<li><a href="movie.php">Add Movie</a></li>
				</ul>
			  <?php } else { ?>
			  
				<ul class="nav navbar-nav navbar-left">
					<li id="home"><a href="home.php">Home Page</a></li>
					<li><a href="aboutUs.php">About Us</a></li>
					<li><a href="contactUs.php">Contact Us</a></li>
				</ul>
			  <?php } ?>
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
							<li><a href = "homehe.php">עברית</a></li>
							<li><a href = "home.php">English</a></li>
						</ul>
					</li>
				</ul>
			  </div>
			</nav>
		</header>
		<?php
		if ((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
	echo "<div class = 'logout'>Hello, " . $_SESSION['userName'] . "!<br>You're already signed in <br> <a href = 'movie.php'>Go to movies area</a>  </div>";
} else {
	?>
		
		<section class="section">
		
			<div class="cotn_principal">
				<div class="cont_centrar">
					<div class="cont_login">
						<div class="cont_info_log_sign_up">
							<div class="col_md_login">
								<div class="cont_ba_opcitiy">
									<h2>LOGIN</h2>  
									<p>Please enter your User Name and Password for Loging In</p> 
									<button class="btn_login" onclick="cambiar_login()">LOGIN</button>
								</div>
							</div>
							
							<div class="col_md_sign_up">
								<div class="cont_ba_opcitiy">
									<h2>SIGN UP</h2>
									<p>&nbsp;&nbsp;Please enter personal details for Signing In</p>
									<button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
								</div>
							</div>
						</div>

						<div class="cont_back_info">
							<div class="cont_img_back_">
							<img src="images/films.jpeg" alt="" />
							</div> 
						</div>
						<div class="cont_forms" >
							<div class="cont_img_back_">
							<img src="images/films.jpeg" alt="" />
							</div>
							<?php if (!isset($_POST['userName1']) && !isset($_POST['userName2'])) {?>
							<form  id="login"  action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> 
								<div class="cont_form_login">
									<a href="#" onclick="ocultar_login_sign_up()" ><i class="material-icons">&#xE5C4;</i></a>
									<h2>LOGIN</h2>
									<div class="form-group">
									<input type="text" name="userName1" id="userName1" placeholder="User" class="form-control requiredField1"/>
									</div>
									<div class="form-group">
									<input type="password" name= "password" id="password1" placeholder="Password" class="form-control requiredField1"/>
									</div>
									<button type="submit" class="btn_login" onclick="cambiar_login()">LOGIN</button>
								</div>
							</form>
							
							<form id="sign_up" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
								<div class="cont_form_sign_up">
									<a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
									<h2>SIGN UP</h2>
									<div class="form-group"> 
									<input type="text" name="Email" id="Email" placeholder="Email" class="form-control requiredField"/>
									</div>
									<div class="form-group"> 
									<input type="text" name="userName2" id="userName2" placeholder="User" class="form-control requiredField"/>
									</div>
									<div class="form-group"> 
									<input type="password" name="password" id="password" placeholder="Password" class="form-control requiredField"/>
									</div>
									<div class="form-group">
									<span id='message'></span>									
									<input type="password" name="retypepassword" id="retypepassword" placeholder="Confirm Password" class="form-control requiredField"/>
									</div>
									
									<button  type="submit" class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		
			
			<footer id="ci" class="col-12"> 
				<p>© All rights reserved</p> 
			</footer> 
		
		
		<?php }
		else if (isset($_POST['userName1']))
		{	
			include 'dbconnect.php'; 
			
			$userName = $_POST['userName1']; 
			$password = $_POST['password'];
			$hash = crypt($userName, "gl");				


			$sql="SELECT password FROM users WHERE userName = ?"; 
			$stmt = $conn->prepare($sql); 
			$stmt->bind_param("s",$userName); 
			$stmt->execute(); 

			mysqli_stmt_bind_result($stmt,$savedpassword); 
			mysqli_stmt_fetch($stmt); 

			if(password_verify($password, $savedpassword))
			{
				$_SESSION['loggedin'] = true;
				$_SESSION['userName'] = $userName;
				$_SESSION['hash'] = $hash;				
				echo '<script>window.location = "movie.php?u='.$hash.'";</script>';
			} 
			else { 
				echo '<script>window.location = "wrong.php";</script>'; 
			} 

		}
		
		else if (isset($_POST['userName2'])) 
		{
			include 'dbconnect.php';

			
			 $Email = $_POST['Email'];
			 $userName = $_POST['userName2'];
			 $password = $_POST['password'];
			 
		     $password = crypt($password, "ah"); 
			 $hash = crypt($userName, "gl"); 

			$stmt = $conn->prepare("INSERT INTO users (hash,Email,userName,password) 
								VALUES (?,?,?,?)"); 
            $stmt->bind_param("ssss",$hash, $Email,$userName,$password); 
             
            if($stmt->execute())
			{ 
				$_SESSION['loggedin'] = true;
				$_SESSION['userName'] = $userName;
				$_SESSION['hash'] = $hash;		
			
				echo '<script>window.location = "movie.php?u='.$hash.'";</script>';
				die;
			}
			else
			{
				echo ' <p> Registration Failed '.mysqli_error($conn) .'</p>';
			}
		}
}
		
		?>
	</body>
	</div>
</html>