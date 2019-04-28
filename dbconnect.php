<?php 
$servername ="localhost"; //server host name 
$dbusername="alexisma_myUser"; //username 
$dbpassword="12345"; //username password 
$dbname="alexisma_exam"; //db name 
$conn = mysqli_connect("$servername", "$dbusername", "$dbpassword", "$dbname"); 
if (mysqli_connect_errno()){ 
    echo "Faild to connect to mySql: ".mysqli_connect_error(); 
} /*
else { 
    echo "Success! connected to the db"; 
}*/


?>   