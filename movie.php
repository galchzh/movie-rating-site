<?php
session_start();

?>

<!DOCTYPE html> 
<html lang="he"> 

	<head> 
		<title>Movies Rate</title> 
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
							<li><a href = "movie_he.php">עברית</a></li>
							<li><a href = "movie.php">English</a></li>
						</ul>
					</li>
				</ul>
			  </div>
			</nav>
		</header>
		
		
			<?php
				if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
					echo "<div class = 'logout'>Please log in first to see this page.<p><a href = 'home.php'> Go to Home Page </a></p></div>";
					echo '<footer id="ci" class="col-12"> <p>© All rights reserved</p> </footer> ';
				} else {
					echo "<div class = 'logout'>Welcome to the member's area, <br>" . $_SESSION['userName'] . "!</div>";
				
			?>
		
		 <section id="back" class="col-9 contact"> 
		   <?php if (!isset($_POST['movieName'])) { ?> 
        <form id="contact" class="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> 
            <header> 
                <h1>Add movie</h1> 
			</header> 
			
            <fieldset>
                <div class="form-group"> 
                    <label for="movieName"><br>Select a movie:</label> 
                    <input type="text" name="movieName" class="form-control requiredField" id="movieName" placeholder=""> 
                </div> 
         
				 <div class="form-group"> 
				<button  class="button btn_login">Search & Add</button> 
				</div>
			</fieldset>
               
			   
			<p><a href="viewList.php?u=<?php echo $_SESSION['hash'] ?>" id="title1">View Your Movie List</a></p>
			<p><a href="viewRate.php?u=<?php echo $_SESSION['hash'] ?>" id="title1">View Your Rate List</a></p>
			<p id="share">Copy this link for sharing your movie list with friends and inviting them to rate your movies:
			<br><a href="listFriends.php?u=<?php echo $_SESSION['hash'] ?>"> galch.myweb.jce.ac.il/WEB-Project/listFriends.php?u=<?php echo $_SESSION['hash'] ?></a></p>
		</form>	
		
		
		
		
		
		</section>
			
			
			<footer id="ci" class="col-12"> 
				<p>© All rights reserved</p> 
			</footer> 
			
			   <?php }
			   
			   else
			   {
					include 'dbconnect.php';
					mysqli_query($conn, "SET NAMES utf8");
					
					$json = file_get_contents('http://api.themoviedb.org/3/search/movie?api_key=d727366bb7ad087fb9a1fa9ff2af0c3e&query='.urlencode($_POST['movieName']));
					$obj = json_decode($json);
					
					if ($obj->results[0]!=null)
					{
						$movieName = $obj->results[0]->title;
						$year = $obj->results[0]->release_date;
						$vote = $obj->results[0]->vote_average;
						$poster = $obj->results[0]->poster_path;
					}
					else
					{
						$movieName = $_POST['movieName'];
						$year = "";
						$vote = "";
						$poster = "no poster found";
					}
					
	
					$hash = $_SESSION['hash'];
					
					
							
		
				$stmt = $conn->prepare("INSERT INTO movies (title,year,vote,poster,hash)  
												VALUES (?,?,?,?,?)");  
				
				
				 $stmt->bind_param("sssss",$movieName,$year,$vote,$poster,$hash);  
					
				
					if($stmt->execute()){
						$_SESSION['loggedin'] = true;
						$_SESSION['hash'] = $hash;	
						echo '<section id="back" class="col-9 contact">';
						echo "<div id='contact' class='form'><p>your movie has been added!</p>";  //הודעה כי הנתונים נקלטו בהצלחה
						echo '<p><a href = "movie.php?u='.$_SESSION['hash'].'">Add another movie</a></p>'; 
						echo '<p><a href="viewList.php?u='.$_SESSION['hash'].'">View your Movies List</a></p>'; 
						echo '<p><a href="viewRate.php?u='.$_SESSION['hash'].'" id="title1">View Your Rate List</a></p></div></section>';	
						}
	
				else {  
					$_SESSION['loggedin'] = true;
					$_SESSION['hash'] = $hash;
					echo '<section id="back" class="col-9 contact">';
                    echo "<div id='contact' class='form'><p>error inserting the data: ".mysqli_error($conn) ."</p>";//הודעה שהנתונים לא קלטו כמו שצריך  
					echo '<p><a href = "movie.php?u='.$_SESSION['hash'].'">Add another movie</a></p>';				
					echo '<p><a href="viewList.php?u='.$_SESSION['hash'].'">View your Movies List</a></p>';
					echo '<p><a href="viewRate.php?u='.$_SESSION['hash'].'" id="title1">View Your Rate List</a></p></div></section>';	
					}
				}
				}

				
	
		
		
		?>
	</body>
	
</html>	