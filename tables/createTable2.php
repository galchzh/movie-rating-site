
<?php 
include 'dbconnect.php'; //����� ���������� 

// ����� ����� ����� �����. ���� �� ��� ����� �����, ���� ������� ������ ����
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



<!--������� �� ���� ���� �� �� �� ���� ����-->
<!--���� ���� ���� ��� ����-->
<!--���� �� ����� ��� ���� ������ ��� ������-������-->
<!--���� ������ �� ���� ����, ���� �� �����-->

