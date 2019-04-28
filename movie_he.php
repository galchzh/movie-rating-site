<?php
session_start();

?>

<!DOCTYPE html> 
<html lang="he"> 

	<head> 
		<title>דירוג סרטים</title> 
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
					echo "<div class = 'logout'>אנא התחבר תחילה על מנת לצפות בדף זה.<p><a href = 'homehe.php'>עבור לדף הבית</a></p></div>";
					echo '<footer id="ci" class="col-12"> <p>© כל הזכויות שמורות</p> </footer> ';
				} else {
					echo "<div class = 'logout'>,ברוכים הבאים לאתר דירוג הסרטים <br>" . $_SESSION['userName'] . "!</div>";
				
			?>
		
		 <section id="back" class="col-9 contact"> 
		   <?php if (!isset($_POST['movieName'])) { ?> 
        <form id="contact1" class="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> 
            <header> 
                <h1>הוסף סרט</h1> 
			</header> 
			
            <fieldset>
                <div class="form-group"> 
                    <label for="movieName"><br>:שם הסרט</label> 
                    <input type="text" name="movieName" class="form-control requiredField" id="movieName" placeholder=""> 
                </div> 
         
				 <div class="form-group"> 
				<button  class="button btn_login">חפש & הוסף</button> 
				</div>
			</fieldset>
			
				<p><a href="viewList_he.php?u=<?php echo $_SESSION['hash'] ?>" id="title1">צפה ברשימת הסרטים שלך</a></p>
				<p><a href="viewRate_he.php?u=<?php echo $_SESSION['hash'] ?>" id="title1">צפה בדירוג הסרטים שלך</a></p>
			<p id="share">:שתף את חבריך ברשימת הסרטים שלך והזמן אותם לדרג אותה<br><a href="listFriends_he.php?u=<?php echo $_SESSION['hash'] ?>"> galch.myweb.jce.ac.il/WEB-Project/listFriends.php?u=glYZwWrOrHnq6<?php echo $_SESSION['hash'] ?></a></p>
               
		</form>	
		
		
		
		
		</section>
			
			
			<footer id="ci" class="col-12"> 
				<p>© כל הזכויות שמורות</p> 
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
						echo "<div id='contact1' class='form'><p>!הסרט שבחרת הוכנס לרשימה</p>"; 
						echo '<p><a href = "movie_he.php?u='.$_SESSION['hash'].'">הוסף סרט חדש</a></p>'; 
						echo '<p><a href="viewList_he.php?u='.$_SESSION['hash'].'" id="title1">צפה ברשימת הסרטים שלך</a></p>';
						echo '<p><a href="viewRate.php?u='.$_SESSION['hash'].'" id="title1">צפה בדירוג הסרטים שלך</a></p></div></section>';
						}
	
				else {  
					$_SESSION['loggedin'] = true;
					$_SESSION['hash'] = $hash;
					echo '<section id="back" class="col-9 contact">';
                    echo "<div id='contact' class='form'><p>קיימת בעיה בהכנסת המידע: ".mysqli_error($conn) ."</p>";  
					echo '<p><a href = "movie_he.php?u='.$_SESSION['hash'].'">הוסף סרט חדש</a></p>'; 
					echo '<p><a href="viewList_he.php?u='.$_SESSION['hash'].'" id="title1">צפה ברשימת הסרטים שלך</a></p>';
						echo '<p><a href="viewRate.php?u='.$_SESSION['hash'].'" id="title1">צפה בדירוג הסרטים שלך</a></p></div></section>'; 
					}
				}
				}

		?>
	</body>
	
</html>	