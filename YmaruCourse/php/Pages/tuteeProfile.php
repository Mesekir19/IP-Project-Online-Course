<?php
session_start();
include '../../config/db_con.php';
$UserN=$_SESSION['User_Name'];
$sql="SELECT * FROM personaldb WHERE username='$UserN'";
$result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($result);
   $FullName=$row['fullname'];
   $Email=$row['email'];
   $Phone=$row['phone'];



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/tutee.css">
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../css/fontawesome.min.css">
    <link rel="shortcut icon" href="../../Logo/logo.jpeg">
    <script src="../../JS/sweetalert.min.js"></script>
    <title>Profile</title>
</head>
<body>
    <div class="header">
        <div class="nav-logo">
            <a href="../ymaru_home.html"><img src="../../Logo/logo.jpeg" width="90px" title="YMARU Home"></a>
        </div>

        <div>
            <button class="mobile-menu-toggle">
                <img src="../../Images/ymaru-menu-icon.svg">
            </button>
        </div>

        <div class="nav-links">
            <ul aria-expanded="false">
                <li>
                    <a href="../tuteehome.php">Home</a>
                </li>
                <li>
                    <a href="reportpage.php">Catalogue</a>
                </li>
                <li>
                    <a href="contact.php">Contact Us</a>
                </li>
                <li>
                    <a href="courseupload.php">upload</a>
                </li>
                <li>
                    <a href="logout.php">LogOut</a>
                </li>
            </ul>
        </div>
    </div>

    <div style="clear: left;"></div>

    <div class="warrper">
                    
        <!--upload a profile pic, name, address, age // change user name// the course you are taking// -->
        <div class="bodyP">
            <div class="profile">
                <div class="titleProfile">
                    <p>Profile</p>
                </div>
                <?php
                $sql="SELECT * FROM personaldb WHERE username='$UserN'";
                $result=mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $fullname=$row['fullname'];
                $email=$row['email'];
                $gender=$row['gender'];
                $phone=$row['phone'];
                $ProfileImage=$row['profile'];
                if(strpos($ProfileImage, $UserN) !== false){
    //echo "Word Found!";
    // echo "$new";
      // $len=strlen($new);
      // echo "$len";
    //   $newone=substr($new,33);
    // echo "$username";
    //    echo "$newone";
    //   echo "<video width='320' height='240'controls>";
    //   echo "<source type='video/mp4' src='$newone'>";
    //   echo "</video>";
                        $newone=substr($ProfileImage,38);
                       
                // echo "<div id='displayimg'>";
                // echo "<img src='images/".$row['profile']."'>";
                // echo "</div>";
                }
                ?>
                <div class='displayimg'>
                <img src='<?php echo $newone?>'  >
                </div>
                <style>
        
                </style>
                   
                
                <div class="user-options">
                    <form action="" id="form" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="size" value="1000000"/>
                     <div class="file-upload">
                        <input type="file" id="input_image" name="profileImage" accept="image/png, image/jpg" >
                        <i class="fa fa-camera" style="color: #fff"></i>
                        <!-- <input type="submit" name="submitImage" /> -->
                    </div> 
                    <!-- <input type="submit" value="upload" name="submitImage" />   -->
                    </form>
                    
                    <script type="text/javascript">
      document.getElementById("input_image").onchange = function(){
          document.getElementById("form").submit();
      };
    </script>
                    

                    <?php
                  
                    if(isset($_FILES['profileImage']['name'])){
                        
    // if(null !==$_POST['teaching'] && null !==$_POST['upfile'] && null !==$_POST['discription']){

    $name= $_FILES['profileImage']['name'];
    $imageSize = $_FILES["profileImage"]["size"];
    $tempname= $_FILES['profileImage']['tmp_name'];
    //$location= 'uploadfile/';
    
    $ext = pathinfo($name, PATHINFO_EXTENSION);

    //$target= $location.basename($name);
    $path="C:/xampp/htdocs/YmaruCourse/php/Pages/uploadfile/".$UserN."/profile/";
    //$path2="C:/xampp/htdocs/YMARU/html/Pages/uploadfile/".$TeachUsername."/pdf/";
        
    // $coursename=$_POST['teaching'];
    // $description=$_POST['discription'];
    
    // $sql="SELECT course_id,course_name FROM course where course_name='$coursename'";//for checking weather the serach input existes in the databse or not
    // $result = mysqli_query($conn, $sql);


    // if (mysqli_num_rows($result) > 0) {
    //     $row = mysqli_fetch_assoc($result);
    //     $course_id=$row['course_id'];
    //     $coursename=$row['course_name'];
        
    // }else{
    //     echo  "<script>alert('No such course name is availabile');</script>";
    // }
    $sql="SELECT * FROM personaldb where username='$UserN'";
    $result = mysqli_query($conn, $sql);

       // echo "the file is not uploaded0";
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $profile=$row['profile'];
        // $TeachUsername=$row['username'];
        // $teacher_id=$row['teacher_id'];
        //echo "the file is not uploaded0";
    }
    $validImageExtension = ['jpg', 'jpeg', 'png'];
      $imageExtension = explode('.', $name);
      $imageExtension = strtolower(end($imageExtension));
      if (!in_array($imageExtension, $validImageExtension)){
        echo
        "
        <script>
          alert('Invalid Image Extension');
          document.location.href = 'tuteeProfile.php';
        </script>
        ";
      }
      elseif ($imageSize > 1200000){
        echo
        "
        <script>
          alert('Image Size Is Too Large');
          document.location.href = 'tuteeProfile.php';
        </script>
        ";
      }
      else{
    
    if (!empty($_FILES['profileImage']['name'])){
        //echo "the file is not uploaded0";
        if (!is_dir($path)){
                mkdir($path,0777,true);
                 
                }
        if ($ext=='png' || $ext=='jpg' || $ext=='jpeg'|| $ext=='PNG' || $ext=='JPG' || $ext=='JPEG') {
            // echo "the file is not uploaded0";
            if(move_uploaded_file($tempname,$path.basename($name))){
            $newfile=$path.basename($name);
            $sql="UPDATE personaldb SET profile = '$newfile' WHERE username = '$UserN'";
            // $sql="INSERT INTO video (teacher_id,course_id,username,video,description) VALUES ('$teacher_id','$course_id','$TeachUsername','$newfile','$description')";
                if(mysqli_query($conn, $sql)){
                    echo
        "
        <script>
        swal({
  title: 'Good job',
  text: 'pofile picture updated!',
  icon: 'success',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'tuteeProfile.php';}});
   
        </script>
        ";
              
        // header("Location: tuteeProfile.php");
                // echo "uploaded to the database";
                }
            // echo "the file $name has been uploaded";

            }
            else{
                echo "the file is not uploaded0";
            }       
        }else{
            echo "Unsupported File type";
        }

         
    }
    else{
        echo "please select the file";
    }
    


}
                    }
                    ?>
                    
                    <div class="profile-name">
                        <div class="previous-name">
                            <p>Username:&nbsp;<?php echo $_SESSION['User_Name'];?></p>
                            <br>
                            <p>Full Name:&nbsp;<?php echo $fullname;?></p>
                            <br>
                            <p>Email:&nbsp;<?php echo $email;?></p>
                            <br>
                            <p>Gender:&nbsp;<?php echo $gender;?></p>
                            <br>
                            <p>Phone:&nbsp;<?php echo $phone;?></p>
                            <br>
                            <a href="update.php"><button type="submit">Update</button></a>
                                
                        
                        </div>
                        <div class="defaultUSname">
                            <!-- <input type="submit" value="update" onclick="Usern()"> -->
                            <span id="result"></span>
                        </div>
                    </div>
                   
                </div>
            </div>

            <!-- -->

            <div class="aboutprofile">
                <div class="titleAbout">
                    <p>Information</p>
                </div>
                <div class="profile-metadata">
                 
                    
                    <div class="Name">
                                <?php
            // $courseid;
            $count=0;
            $idArray=array();
            $sql="SELECT username, course_id FROM student WHERE username='$UserN'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0){
                echo " <br><h3>Your enrolled in:</h4>";
                while($row=mysqli_fetch_assoc($result)){
                    $idArray[$count]=$row['course_id'];
                    $count++;
                    
                //    echo "<br> $count";
             }
            }
            for($i=0; $i<$count;$i++){
                $courseid=$idArray[$i];
            $sql1="SELECT course_name FROM course WHERE course_id='$courseid'";
            $result = mysqli_query($conn, $sql1);
            if(mysqli_num_rows($result) >0){
            $row=mysqli_fetch_assoc($result);
            $coursename=$row['course_name'];
            
            echo "<br><h4>course name: $coursename</h4>";
                
              }    
            }
            
                
if(isset($courseid)){
    echo " <br><h3>Contact Your Instructor:</h3>";
            $count=0;
            $lenght=count($idArray);
            $teacherArray=array();
            // echo $lenght;
            for($i=0; $i<$lenght;$i++){
                $courseid=$idArray[$i];
                // echo $courseid;
            // $teacherArray=array();
            $sql="SELECT username FROM teacher WHERE course_id='$courseid'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0){
                
                $row=mysqli_fetch_assoc($result);
                    $teacherArray[$count]=$row['username'];
                   
                    $count++;
               
             
            }
            
            }
            // echo $count;
            $size=count($teacherArray);
            
            for($i=0; $i<$size;$i++){
                // echo $teacherArray[0];
                $EnrolledUSER=$teacherArray[$i];
            $sql1="SELECT fullname, email FROM personaldb WHERE username='$EnrolledUSER'";
            $result = mysqli_query($conn, $sql1);
            if(mysqli_num_rows($result) >0){
            $row=mysqli_fetch_assoc($result);
            $enrollemail=$row['email'];
            $enrollfullname=$row['fullname'];
            
            echo "<br><h4>Instructor name: $enrollfullname</h4>";
            echo "<br><h4>Instructor email: $enrollemail</h4> <hr>";
                
              }    
            }
        }                
               
            
            $sql="SELECT course_id FROM teacher WHERE username='$UserN'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                $course_id=$row['course_id'];
             
            $sql1="SELECT course_name FROM course WHERE course_id='$course_id'";
            $result = mysqli_query($conn, $sql1);
            if(mysqli_num_rows($result) >0){
                echo " <br><h3>You are currently teaching:</h3>";
            while($row=mysqli_fetch_assoc($result)){
            $coursename=$row['course_name'];
            
            echo "<br><h4>course name: $coursename</h4>";
            }
            }
            }

            
if(isset($course_id)){
            $count=0;
            $userArray=array();
            $sql="SELECT username FROM student WHERE course_id='$course_id'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0){
                echo " <br><h3>Contact Your Students:</h3>";
                while($row=mysqli_fetch_assoc($result)){
                    $userArray[$count]=$row['username'];
                    $count++;
                    
                //    echo "<br> $count";
             }
            }
            for($i=0; $i<$count;$i++){
                $EnrolledUSER=$userArray[$i];
            $sql1="SELECT fullname, email FROM personaldb WHERE username='$EnrolledUSER'";
            $result = mysqli_query($conn, $sql1);
            if(mysqli_num_rows($result) >0){
            $row=mysqli_fetch_assoc($result);
            $enrollemail=$row['email'];
            $enrollfullname=$row['fullname'];
            
            echo "<br><h4>Student name: $enrollfullname</h4>";
            echo "<br><h4>Student email: $enrollemail</h4> <hr>";
                
              }    
            }
        }


            
                    ?>
                    </div>
                    
            
                </div>   
            </div>
        </div><!--end of bodyP-->
    </div><!--end of warrper-->
    <div style="clear: left;"></div>
    
        <div class="footer">
        <div class="footer-lists">
            <div class="footer-logo-link">
                <div class="ymaru-logo">
                    <a href="../tuteehome.php"><img src="../../Logo/logo.jpeg" width="60" height="60" title="YMARU Home"></a>
                </div>
                <div class="ymaru-text">
                    <p><a href="../tuteehome.php"><span>YMARU</span> Online Course &amp; Tutor</a></p>
                </div>
            </div>
            <div class="social-medias">
                <p>Follow Us On</p>
                <ul>
                    <li><a href="http://facebook.com" target="_blank"> <img src="../../Images/facebook.png">
                            <font face="arial">Facebook</font>
                        </a></li>
                    <li><a href="http://twitter.com" target="_blank"> <img src="../../Images/twitter.png">
                            <font face="arial">Twitter</font>
                        </a></li>
                    <li><a href="http://instagram.com" target="_blank"> <img src="../../Images/instagram-square.jpg">
                            <font face="arial">Instagram</font>
                        </a></li>
                   
                </ul>
            </div>
            <div class="contacts">
                <p>Get in Touch</p>
                <ul>
                    <li>Phone: +251 9123 456 789</li>
                    <li>Fax: ....</li>
                    <li>Email: <a href="mailto:mesekirgetch@gmail.com">ymaru@edu.com</a></li>
                </ul>
            </div>
            
        </div>

        <div class="footer-bottom">
            <div class="privterm">
                <a href="privacy.html">
                    <font face="arial">Privacy</font>
                </a>
                <a href="terms.html">
                    <font face="arial">Terms of Use</font>
                </a>
            </div>
            <div class="copyright">
                <p>Copyright &copy; YMARU 2022, All Rights Reserved</p>
            </div>
        </div>
    </div>
    <script src="../../JS/tuteeP.js"></script>
    <!-- <script src="../../JS/signup.js"></script> -->
    <script>
        /*Mobile nav menu toggle*/
        const mobileMenu = document.querySelector('[aria-expanded]');
        const navToggle = document.querySelector('.mobile-menu-toggle');
        navToggle.addEventListener("click", function(){
            const isOpened = mobileMenu.getAttribute("aria-expanded");
            if(isOpened === "false"){
                mobileMenu.setAttribute('aria-expanded', true);
            } 
            else if(isOpened === "true"){
                mobileMenu.setAttribute('aria-expanded', false);
            }
        })

        document.getElementById("result").innerHTML=localStorage.getItem("UserName");
        document.getElementById("result2").innerHTML = localStorage.getItem("FirstName");
        
        document.getElementById("result3").innerHTML = localStorage.getItem("Emails");
        document.getElementById("result5").innerHTML = localStorage.getItem("Courses");
        document.getElementById("result4").innerHTML = localStorage.getItem("PhoneNo");
    </script>
<style>
         body{
    font-family: sans-serif;
    width: 100%;
    height: 100%;
    color: #fff;
    background: linear-gradient(-45deg, #52ab98, #52ab98 , #52ab98, #52ab98 );
    background-size:400% 400%;
    position: relative;
    animation: change 10s ease-in-out infinite;
    }
    .header{
    width: 100%;
    padding: 1% 1.5%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: linear-gradient(-45deg, #082032, #2b6777 , #2b6777, #2b6777 );
    background-size:100% 100%;
    position: relative;
    animation: change 10s ease-in-out infinite;
    position: sticky;
    top: 0;
    z-index: 1;
    } 
    
        .fill {
            background-color: #c8d8e4;
            border-bottom: 1px solid #f0f0f0;
            padding: 20px 40px;
    
    
        }
        .file-upload{
                            position: relative;
                            background: #00B4FF;
                            bottom: 0;
                            right: 0;
                            width: 32px;
                            height:32px;
                            line-height:33px;
                            text-align: center;
                            border-radius:50%;
                            overflow: hidden;
                            cursor:pointer;

                        }
                        .file-upload input[type="file"]{
                            position: absolute;
                            transform: scale(2);
                            opacity: 0;
                            cursor:pointer;

                        }
                        input[type=file]::-webkit-file-upload-button{
                            cursor:pointer;
                        }
    
        form button {
            width: 100%;
            height: 50px;
            border: 1px solid;
            background: #2b6777;
            border-radius: 25px;
            font-size: 18px;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;
        }
    
        form button:hover {
            border-color: #2b6777;
            transition: .5s;
        }
    
        .form-control input {
            border: 2px solid #f0f0f0;
            border-radius: 4px;
            background: #c8d8e4;
            display: block;
            font-family: inherit;
            font-size: 14px;
            padding: 10px;
            width: 100%;
    
        }
    
        .form-control select {
            border: 2px solid #f0f0f0;
            border-radius: 4px;
            background: #c8d8e4;
            display: block;
            font-family: inherit;
            font-size: 14px;
            padding: 10px;
            width: 100%;
    
        }
    
        nav ul {
            background: linear-gradient(-45deg, #082032, #2b6777, #2b6777, #2b6777);
            background-size: 100% 100%;
            position: relative;
            animation: change 10s ease-in-out infinite;
            width: 100%;
            margin-top: 10px;
            display: flex;
            list-style: none;
            vertical-align: middle;
        }
    
        nav ul li a {
            line-height: 80px;
            padding: 12px 30px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            text-transform: uppercase;
            color: #fff;
        }
    
        nav ul li a:hover {
            background: rgba(0, 0, 0, .7);
            border-radius: 6px;
        }
    
        nav.sticky {
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(-45deg, #082032, #2b6777, #2b6777, #2b6777);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
    
        .body {
            margin-bottom: 30px;
        }
    
        .title {
            text-align: center;
            width: 100%;
            margin-bottom: 50px;
        }
    
        .title h1 {
            font-size: 2.5em;
            color: transparent;
            background-image: linear-gradient(-45deg, #47131c, #162e2e);
            background-clip: text;
            -webkit-background-clip: text;
            z-index: -1;
        }
    
        button[type="submit"] {
            width: 100%;
            height: 50px;
            border: 1px solid;
            background: #2b6777;
            border-radius: 25px;
            font-size: 18px;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;
        }
    
        button[type="submit"]:hover {
    
            border-color: #2b6777;
            transition: .5s;
        }
        @media screen and (max-width: 900px){
    .warrper{
        margin-left: 6%;
        margin-right: 6%;
    }
    .office-locations .office .office-image img{
        height: 450px;
    }
    .fill{
        width: 70%;
    }
    .form-wrapper{
        width: 70%;
    }
    }
    @media screen and (max-width: 700px){
    .header{
        padding-inline-start: 2%;
        padding-inline-end: 3%;
    }
    .header .nav-logo img{
        width: 60px;
    }
    .mobile-menu-toggle{
        display: block;
    }
    .header .nav-links{
        position: absolute;
    }
    .header .nav-links ul{
        position: fixed;
        flex-direction: column;
        align-items: flex-start;
        background: linear-gradient(-45deg, #082032, #2b6777, #2b6777, #2b6777 );
        background-size:100% 100%;
        right: 0;
        top: 80px;
        height: calc(100vh - 80px);
        width: 300px;
        margin-right: -300px;
        padding-top: 2rem;
        opacity: .5;
        transition: all 600ms;
    }
    .nav-links ul li{
        width: 100%;
    }
    .nav-links ul li a{
        line-height: 40px;
        float: left;
    }
    .nav-links ul li:hover{
        background-color: rgba(255,255,255,.3);
    }
    .nav-links ul li a:hover{
        background-color: transparent;
        color: #c9c1c1;
    }
    .nav-links ul[aria-expanded="true"]{
        opacity: 1;
        margin-right: 0;
    }
    .warrper{
        margin-left: 4%;
        margin-right: 4%;
    }
    .office-locations .office .office-image img{
        height: 360px;
    }
    .fill{
        width: 55%;
    }
    .form-wrapper{
        width: 55%;
    }
    }
</style>


</body>
</html>
