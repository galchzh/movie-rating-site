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
							<li><a href = "viewList_he.php">עברית</a></li>
							<li><a href = "viewList.php">English</a></li>
						</ul>
					</li>
				</ul>
			  </div>
			</nav>
		</header>
   

	<div class="row"> 
   			
		<?php
			include 'dbconnect.php';
				
				if ((isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
			
					if(isset($_GET['id']))  
					{  
						$id = $_GET['id'];  

						//delete the item  
						$sql = "DELETE FROM movies  
							   WHERE id = ?";  
						$stmt = $conn->prepare($sql);  
						$stmt->bind_param("s",$id);  
						$stmt->execute();  
					}  

						$query = 'SELECT * FROM movies ORDER BY id';  

						$movielist = mysqli_query($conn, $query) or die ("cannot query the table "  
						.mysqli_error($conn));  

 

						if($movielist->num_rows > 0) {  
							echo '<section id="back" class="col-9 contact"> 
								<div class="table-responsive form1">
								<h2 style="color:navy"><strong>רשימת הסרטים שלך</h2><br>';
							echo '<table class = "table table-hover">';   

							echo '<tr><th></th><th><p>דירוג TMDb</p></th><th><p>תאריך הוצאה</p></th><th><p>שם הסרט</p></th><th><p>פוסטר</p></th></tr>';  

							while ($row = mysqli_fetch_array($movielist)) { 
							
							if ($row['hash'] == $_SESSION['hash']){ 
							echo "<tr>";
							echo '<td>'.'<a href ='.$_SERVER['PHP_SELF'].'?id='.$row['id'].'">'.'מחיקה'.'</a></td>';  
							echo "<td id='vote'><strong>" . $row['vote'] . "</td>"; 
							echo "<td>" . $row['year'] . "</td>";   
							echo "<td id='title'><strong>" . $row['title'] . "</td>"; 
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
						<p><a href="movie_he.php" id="title">הוסף סרט חדש</a></p>
						<p>:שתף את חבריך ברשימת הסרטים שלך והזמן אותם לדרג אותה<br><a href="listFriends_he.php?u='.$_SESSION['hash'].'"> 
						galch.myweb.jce.ac.il/WEB-Project/listFriends.php?u='.$_SESSION['hash'].'</a></p></div></section>';
						
						}
						else{
							echo '<section id="back" class="col-9 contact"> 
								<div class="form" id="contact">
								!לא קיימים סרטים ברשימה
								<br><a href="movie_he.php">הוסף סרט חדש</a>
								</div></section>';  
						}   
				}
				else
				{
					echo '<section id="back" class="col-9 contact"> 
								<div class="form" id="contact">';
						echo "אינך מחובר</div></section>";  	
				}
			?>	
	
	
</div>

			<footer id="ci" class="col-12"> 
				<p>© כל הזכויות שמורות</p> 
			</footer> 
			
</body>
</html>

