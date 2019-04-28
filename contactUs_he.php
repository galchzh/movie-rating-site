<?php
session_start();
?>
<!DOCTYPE html> 
<html lang="he"> 

<head> 
    <title>צור קשר</title> 
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
							<li><a href="logout_he.php">התנתק</a></li>
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
        <form id="contact1" class="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> 
            <header> 
                <h1>צור קשר</h1> 
			</header> 
			
            <fieldset>
                <div class="form-group"> 
                    <label for="fullname"><br>:שם מלא</label> 
                    <input type="text" name="fullname" class="form-control requiredField" id="fullname" placeholder="שם מלא"> 
                </div> 
              
                <div class="form-group">
					<label for="email">:אי-מייל</label> 
					<input type="email" class="form-control requiredField" name="email" placeholder="user@web.com"> 
                </div> 

				<div class="form-group">
					<label for="phone">:מס' טלפון</label> 
					<input type="text" class="form-control requiredField" name="phone" placeholder="+972"> 
                </div>
				
				<div class="form-group">
				<label for="cv">:הודעה</label> 
					<textarea class="form-control requiredField" rows="5" name="cv"></textarea>
				</div>
				<div class="form-group">
				<button type="submit" class="button btn_sign_up" style="color:black">שלח</button>
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
								<div class="form" id="contact1">';
			 echo "<p>.תגובתך נרשמה והועברה לטיפול <br>:) תודה ויום טוב</p></div></section>";
			}
			
			else {  
				echo '<section id="back" class="col-9 contact"> 
								<div class="form" id="contact1">';
                    echo '<p> :ישנה בעיה בשליחת ההודעה '.mysqli_error($conn) .'</p></div></section>';
					
		}}
            ?> 
			
		
	</section>
	
			<footer id="ci" class="col-12"> 
				<p> כל הזכויות שמורות ©</p> 
			</footer> 
			
</body> 
</html>