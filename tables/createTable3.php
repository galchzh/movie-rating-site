<?php 
include 'dbconnect.php'; //חיבור לדיביקונקט 

// יצירת הטבלה והשמת ערכים. לשים לב לשם הטבלה שניתן, לסוג המשתנים ולשמות שלהם
$sql = "CREATE TABLE IF NOT EXISTS movies  ( 
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			title VARCHAR(255) NOT NULL,
            year VARCHAR(255) NOT NULL,
			vote VARCHAR(255),
			poster VARCHAR(255),
			hash VARCHAR(255))";
          

if (mysqli_query($conn,$sql)){ 
    echo "<p>Table movies created successfully</p>"; 
} 

else { 
    echo "Error creating the movies table: ".mysqli_error($conn); 
} 
?> 




