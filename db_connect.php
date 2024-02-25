<?php 
    
   //connect to database
   $conn = mysqli_connect('localhost', 'admin', 'admin@1234', 'student_info');

   //check the connection
   if(!$conn){
       echo 'Connection error: ' . mysqli_connect_error();
   }



?>