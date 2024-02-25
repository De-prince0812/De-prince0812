<?php 

    include('db_connect.php');

    //write query for all student informatons

    $sql = 'SELECT * FROM student';

    //make query and get result
    $result = mysqli_query($conn, $sql);

    //fetch the resulting rows as an array
    $student = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free result from memory
    mysqli_free_result($result);

    //close connection
    mysqli_close($conn);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home_page</title>
</head>
<body>
  
    <section class="topnav">
        <div class="topnav-top">
            <img src="espam.jpeg" alt="Logo" width="100" height="150">
            <div class="top">
                <h1><span class="span">ONLINE</span>-REGISTRATION <span class="span">SYSTEM </span> FOR FRESHERS.</h1>
                <h6> THE WEB INTERFACE TO ESPAM FORMATION UNIVERSITY <br>
                    E-REGISTRATION SYSTEM. <br>
                    <p>
                        BY <span class="span">OLAGUNJU FAWAS ENIOLA </span><br><br>
                       with Matric No: ESPAM/CSC/21/0128 <br>
                        DEPARTMENT OF COMPUTER SCIENCE.
                    </p>  
                </h6>
            </div>
            <h4>ADMISSION <span class="span">IN</span> PROCESS</h4>
        </div>
        <br>
        <section>
            <div class="nav">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="Register_page.php">Registration</a></li>
                    <li><a href="admission_page.php">Admission Letter</a></li>
                    <li><a href="https://www.espamformationuniversity.com/about-us#:~:text=It%20was%20created%20in%20October,in%20the%20West%20African%20region.">About  Us</a></li>
                         <div class="topHeader">
                            <span>Login</span>
                    
                            <span class="topspan">
                                <div  class="navdiv">
                                    <li><a href="https://espamformationuniversity.com/login" class="navlink">Student Login</a></li>
                                </div>
                                <div class="navdiv">
                                    <li> <a href="" class="navlink">Admin login</a></li>
                                </div>
                            </span>
                        </div>
                </ul>
            </div>
            <div class="text">
        </section>
    </section>
    <footer>
      <marquee behavior="fast" direction="right"></marquee>  <p>Copyright <span>&#169</span> 2024 by <span class="span">Olagunju Fawas.</span></p>
    </footer>
</body>
</html>
