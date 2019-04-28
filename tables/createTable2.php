
<?php 
include 'dbconnect.php'; //חיבור לדיביקונקט 

// יצירת הטבלה והשמת ערכים. לשים לב לשם הטבלה שניתן, לסוג המשתנים ולשמות שלהם
$sql = "CREATE TABLE IF NOT EXISTS messages  ( 
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
            fullname VARCHAR(255) NOT NULL,
			email VARCHAR(255) NOT NULL,
			phone VARCHAR(255) NOT NULL,
			cv VARCHAR(255) NOT NULL)";
          

if (mysqli_query($conn,$sql)){ 
    echo "<p>Table users created successfully</p>"; 
} 

else { 
    echo "Error creating the users table: ".mysqli_error($conn); 
} 
?> 



<!--מורידים את הנוט נאלל כי הם לא שדות חובה-->
<!--שדות חובה שמים נוט נאלל-->
<!--לשים לב לשדות שהם אינט ולשדות שהם ווארצה-סטרינג-->
<!--בשדה האחרון לא שמים פסיק, אחרת לא יעבוד-->

