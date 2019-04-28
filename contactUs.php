<?php
session_start();
?>
<!DOCTYPE html> 
<html lang="he"> 

<head> 
    <title>Contact Us</title> 
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
							<li><a href = "contactUs_he.php">עברית</a></li>
							<li><a href = "contactUs.php">English</a></li>
						</ul>
					</li>
				</ul>
			  </div>
			</nav>
		</header>
			
        <section id="back" class="col-9 contact"> 
		   <?php if (!isset($_POST['fullname'])) { ?> 
        <form id="contact" class="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> 
            <header> 
                <h1>Contact Us</h1> 
			</header> 
			
            <fieldset>
                <div class="form-group"> 
                    <label for="fullname"><br>Full Name:</label> 
                    <input type="text" name="fullname" class="form-control requiredField" id="fullname" placeholder="Full Name"> 
                </div> 
              
                <div class="form-group">
					<label for="email">Email:</label> 
					<input type="email" class="form-control requiredField" name="email" placeholder="user@web.com"> 
                </div> 

				<div class="form-group">
					<label for="phone">Phone Number:</label> 
					<input type="text" class="form-control requiredField" name="phone" placeholder="+972"> 
                </div>
				
				<div class="form-group">
				<label for="cv">Message:</label> 
					<textarea class="form-control requiredField" rows="5" name="cv"></textarea>
				</div>
				<div class="form-group">
				<button type="submit" class="button btn_sign_up" style="color:black">Send</button>
				</div>				
			</fieldset>
               
		</form>	
<?php }  
        else {  
            //connect to the db 
            include 'dbconnect.php'; 
            //collect the personal data 
            $fullname = $_POST['fullname'];  
            $email = $_POST['email']; 
            $phone = $_POST['phone']; 
			$cv = $_POST['cv'];
 
             
            //inserting data to the DB
            $stmt = $conn->prepare("INSERT INTO messages (fullname,email,phone,cv) 
                                    VALUES (?,?,?,?)"); 
            $stmt->bind_param("ssss",$fullname,$email,$phone,$cv); 
             
            if($stmt->execute()){
				echo '<section id="back" class="col-9 contact"> 
								<div class="form" id="contact">';
			 echo "<p>Thank you, We have successfully received your message :)</p></div></section>";
			}
			
			else {  
				echo '<section id="back" class="col-9 contact"> 
								<div class="form" id="contact">';
                    echo '<p>Contact Us failed '.mysqli_error($conn) .'</p></div></section>';
					
			}
		}
            ?> 
			
	
	</section>
	
			<footer id="ci" class="col-12"> 
				<p>© All rights reserved</p> 
			</footer> 
			
</body> 
</html>