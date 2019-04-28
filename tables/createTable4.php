<?php 
include 'dbconnect.php'; //חיבור לדיביקונקט 

// יצירת הטבלה והשמת ערכים. לשים לב לשם הטבלה שניתן, לסוג המשתנים ולשמות שלהם
$sql = "CREATE TABLE IF NOT EXISTS rates  ( 
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
			title VARCHAR(255) NOT NULL,
			rate VARCHAR(255),
			poster VARCHAR(255),
			hash VARCHAR(255))";
          

if (mysqli_query($conn,$sql)){ 
    echo "<p>Table rate created successfully</p>"; 
} 

else { 
    echo "Error creating the rate table: ".mysqli_error($conn); 
} 
?> 




