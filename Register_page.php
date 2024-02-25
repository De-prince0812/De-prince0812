<?php
    
?>
<?php

    include('db_connect.php');


    $surname = $firstname = $lastname = $DOB ='';

    $gender = $phone =$email=$address=$city =$state ='';

    $errors = array( 'surname'=> '', 'firstname'=> '','lastname' => '','DOB'=> '', 'gender'=>'','phone'=> '','email'=> '','address' => '','city' => '','state' => '');
    $msg = '';

    //Start of POST check
     
    if(isset($_POST['submit'])){

        if(empty($_POST['surname'])){
            $errors['surname']= 'Surname is required <br />';
        }else{
            $surname = $_POST['surname']; 
            if(!preg_match('/^[a-zA-Z]+$/', $surname)){
                $errors['surname']= 'surname must be letters only';
            }
        }
        if(empty($_POST['firstname'])){
            $errors['firstname'] = 'Firstname is required <br />';
        }else{
            $firstname = $_POST['firstname'];
            if(!preg_match('/^[a-zA-Z]+$/', $firstname)){
                $errors['firstname'] = 'Firstname must be letters only';
            }
        }
        if(empty($_POST['lastname'])){
            $errors['lastname'] = 'Lastname is required <br />';
        }else{
            $lastname = $_POST['lastname'];
            if(!preg_match('/^[a-zA-Z]+$/', $lastname)){
                $errors['lastname'] = 'lastname must be letters only';
            }
        }
        if(empty($_POST['DOB'])){
            $errors['DOB']= 'Date Of Bath  is required <br />';
        }else{
            $DOB = $_POST['DOB'];
        }
        if(empty($_POST['gender'])){
            $errors['gender'] =  'Gender is required <br />';
        }else{
            $gender = $_POST['gender'];
            if(!preg_match('/^[a-zA-Z]+$/', $gender)){
                $errors['gender'] = 'Gender must be letters only';
            }
        }  
        if(empty($_POST['phone'])){
            $errors['phone']= 'Your Current Phone number is required <br />';
        }else{
            $phone = $_POST['phone'];
            if(!preg_match('/^[0-9]+$/', $phone)){
                $errors['phone']= 'Phone number must be number only';
            }
        }
        if(empty($_POST['email'])){
            $errors['email']= 'An email address is required <br />';
        }else{
            $email = $_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email']= 'email must be a valid email address';
            }
        }
        if(empty($_POST['address'])){
            $errors['address']= 'Address is required <br />';
        }else{
            $address = $_POST['address'];
            if(!preg_match('/^([0-9a-zA-Z\s]+)(,\s*[0-9a-zA-Z\s]*)*$/', $address)){
                $errors['address']= 'Address must be letters,number and spaces only';
            }
        }
        if(empty($_POST['city'])){
            $errors['city'] =  'City is required <br />';
        }else{
            $city = $_POST['city'];
            if(!preg_match('/^[a-zA-Z]+$/', $city)){
                $errors['city'] = 'City must be letters only';
            }
        }
        if(empty($_POST['state'])){
            $errors['state']=  'State is required <br />';
        }else{
            $state = $_POST['state'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $state)){
                $errors['state']= 'state must be letters only';
            }
        }

        // $filename = $_FILES['choosefile']['name'];  
        // $tempname = $_FILES['choosefile']['tmp_name'];

        // $folder = 'image/'.$filename;

        // //connect to database
        // $db = mysqli_connect('localhost', 'admin', 'admin@1234', 'student_info');
            
        // // query to insert the submitted data 
        // $sql ='INSERT INTO image (filename) VALUES ($filename)';

        // // function to execute above query
        // mysqli_query($db,$sql);

        // // Add the image to the image folder
        // if(move_uploaded_file($tempname, $folder)){
        //     $msg = 'Image uploaded successfully';
        // }else{
        //     $msg ='filed to upload image';
        // }


        $certificate = $_POST['certificate'];
        //$choosefile = $_POST['choosefile'];
        $faculty =$_POST['faculty'];
        $dept =$_POST['dept'];
        $level = $_POST['level'];
        if(!array_filter($errors)){
            $surname = mysqli_real_escape_string($conn, $_POST['$surname']);
            $firstname = mysqli_real_escape_string($conn, $_POST['$firstname']);
            $lastname = mysqli_real_escape_string($conn, $_POST['$lastname']);
            $DOB = mysqli_real_escape_string($conn, $_POST['$DOB']);
            $gender = mysqli_real_escape_string($conn, $_POST['$gender']);
            $phone = mysqli_real_escape_string($conn, $_POST['$phone']);
            $email = mysqli_real_escape_string($conn, $_POST['$email']);
            $address = mysqli_real_escape_string($conn, $_POST['$adress']);
            $city = mysqli_real_escape_string($conn, $_POST['$city']);
            $state = mysqli_real_escape_string($conn, $_POST['$state']);
            $certificate = mysqli_real_escape_string($conn, $_POST['$certificate']);
            $choosefile = mysqli_real_escape_string($conn, $_POST['$choosefile']);
            $faculty = mysqli_real_escape_string($conn, $_POST['$faculty']);
            $dept = mysqli_real_escape_string($conn, $_POST['$dept']);
            $level = mysqli_real_escape_string($conn, $_POST['$level']);

            $sql = "INSERT INTO student('surname,firstname,lastname,DOB,gender,phone,email,address,city,state,certificate,choosefile,faculty,dept,level')
                VALUES('$surname','$firstname', '$lastname', '$DOB', '$phone', '$email', '$address',
                '$city', '$state', '$certificate', '$choosefile', '$faculty', '$dept','$level')";

                //save to db and check 
                if(mysqli_query($conn, $sql)){
                    //success
                    header('Location: registrationPage_successful.php');
                }else{
                    echo 'query error: ' . mysqli_error($conn);
                }
        }

    }//end of POST CHECK
   
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registration Page</title>
    <style>
        /* body{background-image: url(background.jpg); background-clip: border-box; opacity: 0.9;} */
        body{
            background: #FAEBD7;
            animation: mymove 10s infinite;
            }
            @keyframes mymove {
            50% {background-color: whitesmoke;}
            }
        .topnav img{max-width: 68em; margin-left: 50px;  border-radius: 30px 60px; max-height: 200px;}
        .topnav-top{padding: 3px;background: whitesmoke; width: 100%; max-width: 60em; margin-left:30px; margin-top: 5px;}
        .top{text-align: center; padding-bottom: 10px;}
        .top h1, h2, h3{color: rgba(0, 0, 255, 0.733); text-align: center;padding-left:0px;
            font-family:'Times New Roman', Times, serif; font-style: normal;font-weight: bolder;
            font-size:50px; margin: 0; text-shadow:  #02213b73 2px 3px 3px; padding-bottom: 50px;}
        label{ color:rgba(0, 0, 255, 0.733); font-size: larger; font-weight:bold;
             text-align: center; align-self: center; padding-right: 50px;}
        input{ width: 40%; height: 50px;
            margin: 10px 0; box-sizing: border-box; padding: 20px; font-weight: bold; font-size: large;
        }
        #wrappper{
            width: 50%; margin: 10px auto;border: 2px solid #dad7d7;
        }
        .upload{
            margin-top: 5px;
        }
        .upload img{
            float: left; margin: 5px; width: 280px; height: 120px;
        }
        #img_div{
            width: 70%; padding: 5px; margin: 15px auto; border: 1px solid #dad7d7;
        }
        #img_div::after{
            content: ""; display: block; clear: both;
        }
        input[type='file']{
            margin: 0; 
        }
        input[type='submit']{ width: 30%; height: 50px; background-color:rgba(0, 0, 255, 0.733); color: white; font-weight: bolder;
            font-size: large;  cursor: pointer; border-radius: 20px;
        }
        div.red{ color: red;}
    </style>
</head>
<body>
    <div class="body">
        <div class="topnav">
            <img src="espam logo.jpg" alt="" width="90%" height="5%">
            <br><br>
            <div class="topnav-top">
                <div class="top">
                    <h1> Personal information </h1>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                        <div class="reg">
                            <label for="surname">Surname:&nbsp; </label>
                            <input type="text" name="surname" id="surname" value="<?php echo htmlspecialchars($surname); ?>" autocomplete="on"  autofocus placeholder="Enter your Surname">
                            <div class="red"><?php echo $errors['surname'];?></div>
                            <br>
                            <label for="F=firstname">Firstname: </label>
                            <input type="text" name="firstname" id="firstname" value="<?php echo htmlspecialchars($firstname);?>" autocomplete="on" autocapitalize="on"  autofocus placeholder="Enter your Firstname">
                            <div class="red"><?php echo $errors['firstname'];?></div>
                            <br>
                            <label for="lastname">Lastname: </label>
                            <input type="text" name="lastname" id="lastname" value="<?php echo htmlspecialchars($lastname); ?>" autocomplete="on" autocapitalize="on" autofocus placeholder="Enter your Lastname">
                            <div class="red"><?php echo $errors['lastname'];?></div>
                            <br>
                            <label for="DOB" style="padding-right: 10px;">Date Of Bath:</label>
                            <input type="date" name="DOB" id="DOB" value="<?php echo htmlspecialchars($DOB); ?>" autocomplete="on" autocapitalize="on"  autofocus>
                            <div class="red"><?php echo $errors['DOB'];?></div>
                            <br>
                            <label for="gender">Gender:&nbsp;&nbsp;&nbsp;&nbsp; </label>
                            <input type="text" name="gender" id="gender" value="<?php echo htmlspecialchars($gender); ?>"  autocomplete="on" autofocus placeholder="Gender">
                            <div class="red"><?php echo $errors['gender'];?></div>
                            <br>
                            <label for="phone">Phone: &nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type="tel" name="phone" id="phone" value="<?php echo htmlspecialchars($phone); ?>" autofocus placeholder="Enter a valid phone number">
                            <div class="red"><?php echo $errors['phone'];?></div>
                            <br>
                            <label for="email">Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
                            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" autocomplete="on"  placeholder="Enter a valid Email address">
                            <div class="red"><?php echo $errors['email'];?></div>
                            <br>
                        </div>
                            <h2>Residential Address</h2>
                        <div class="reg">
                            <label for="address">Address:   </label>
                            <input type="text" name="address" id="address" value="<?php echo htmlspecialchars($address); ?>" autofocus>
                            <div class="red"><?php echo $errors['address'];?></div>
                            <br>
                            <label for="city">City: &nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type="text" name="city" id="city" value="<?php echo htmlspecialchars($city);?>" autofocus>
                            <div class="red"><?php echo $errors['city'];?></div>
                            <br>
                            <label for="state">State: &nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type="text" name="state" id="state" value="<?php echo htmlspecialchars($state); ?>" autofocus>
                            <div class="red"><?php echo $errors['state'];?></div>
                            <br>
                        </div>
                            <h3>Qulificational Information(O' Level)</h3>
                        <div class="reg">
                            <label for="certificate"> School Certification type: </label>
                            <input list="certificate" name="certificate" placeholder="WAEC" required> 
                                <datalist id="certificate">
                                    <option value="WAEC">WAEC</option>
                                    <option value="NECO">NECO</option>
                                    <option value="NECO/GCE">NECO/GCE</option>
                                    <option value="NABTEB">NABTEB</option>
                                    
                                </datalist>
                                <div id="wrappper">
                                    <input type="file" name="choosefile" id="certificate" value="" required>
                                    <!-- <div class="upload">
                                        <button type="submit" name="uploadfile">
                                            UPLOAD
                                        </button>
                                    </div> -->
                                </div>
                                <br>
                            </input>
                        </div>
                        <h2>Course Of Study</h2>
                        <div class="reg">
                            <label for="faculty"  style="padding-left: 6px;">Faculty:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input list="faculty" name="faculty" placeholder="ENGINEERING" required>
                                <datalist id="faculty">
                                    <option value="ENGINEERING">ENGINEERING</option>
                                    <option value="SCIENCE">SCIENCE</option>
                                    <option value="SOCIAL SCIENCE">SOCIAL SCIENCE</option>
                                    <option value="ART">ART</option>
                                    <option value="MANAGEMENT SCIENCE">MANAGEMENT SCIENCE</option>
                                    

                                </datalist>
                        </input>
                            <br>
                            <label for="dept" style="padding-left: 6px;">Department:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
                            <input list="dept" name="dept" placeholder="COMPUTER ENGINEERING" required>
                                <datalist id="dept">
                                    <option value="COMPUTER ENGINEERING">COMPUTER ENGINEERING</option>
                                    <option value="COMPUTER SCIENCE">COMPUTER SCIENCE</option>
                                    <option value="POLITCAL SCIENCE">POLITCAL SCIENCE</option>
                                    <option value="INTERNATIONAL RELATION">INTERNATIONAL RELATION</option>
                                    <option value="ACCOUNTING">ACCOUNTING</option>
                                    <option value="BUSINESS ADMINISTRATION">BUSINESS ADMINISTRATION</option>
                                    <option value="BANKING AND FINANCE">BANKING AND FINANCE</option>
                                    <option value="ECONOMICS">ECONOMICS</option>
                                    <option value="MASS COMMUNICATION">MASS COMMUNICATION</option>
                                
                                </datalist>
                            </input>
                            <br>
                            <label for="lvl"  style="padding-left: 6px;">Level: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input list="lvl" name="level" placeholder="100L" required>
                            <datalist id="lvl" >
                                <option value="100L"> 100L</option>
                                <option value="DIRECT ENTRY">DIRECT ENTRY</option>
                                <option value=""></option>
                            </datalist>
                            <br><br><br>
                            <input type="submit" name="submit" value="submit">
                        </div>
                    </form>
                </div>
            
            </div>
        </div>
    </div>
</body>
</html>