<?php
session_start();
include '../../config/db_con.php';
header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
header('Cache-Control: no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0',false);
header('Pragma: no-cache');
// if(isset($_GET['clickedcourse'])){
    // $clickedcourse=$_SESSION['passedcourse'];
    // $clickedcatagory=$_SESSION['passedcatagory'];

    // $sql="SELECT course_id FROM course WHERE catalogue='$clickedcatagory' and course_name='$clickedcourse'";
    // $result=mysqli_query($conn,$sql);
    // $row = mysqli_fetch_assoc($result);
//     $course_id=$row['course_id'];

//     $sql="SELECT username FROM teacher WHERE course_id='$course_id'";
//     $result=mysqli_query($conn,$sql);
//     $row = mysqli_fetch_assoc($result);
//     $FetchedUsername=$row['username'];
//     echo "$FetchedUsername";

//     // $_SESSION['Fetched_Username']=$FetchedUsername;
    
// }
if(isset($_GET['ClickedTeacher'])){
 $_SESSION['TeacherFromHomePage']=$_GET['ClickedTeacher'];   
}

$UserN=$_SESSION['User_Name'];
    
if(isset($_POST['submit1'])){
    $clickedcourse=$_SESSION['passedcourse'];
    $clickedcatagory=$_SESSION['passedcatagory'];
    $sql="SELECT course_id FROM course WHERE catalogue='$clickedcatagory' and course_name='$clickedcourse'";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $course_id=$row['course_id'];

    $sql="SELECT * FROM teacher WHERE course_id='$course_id'";
        $result=mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $teacher_id=$row['teacher_id'];
        //echo "$retrivedCourse_id";
    // $sql="SELECT * FROM student WHERE username='$UserN'";
    // $result=mysqli_query($conn,$sql);
    // $row = mysqli_fetch_assoc($result); 
    // $retrivedCourse=$row['course_id'];
    // $retrivedCatagory=$row['catalogue'];
    // if(mysqli_fetch_assoc($result)>0){
        // $sql="SELECT * FROM course WHERE course_name='$clickedcourse'";
        // $result=mysqli_query($conn,$sql);
        // $row = mysqli_fetch_assoc($result);
        // $retrivedCourse_id=$row['course_id'];
       // echo "$retrivedCourse_id";

        $sql="INSERT INTO student (course_id, teacher_id, catalogue, username) VALUES ('$course_id','$teacher_id','$clickedcatagory','$UserN')";
        $result=mysqli_query($conn,$sql);

        $Teacher=$_SESSION['Fetched_Username'];
        $sql="SELECT * FROM personaldb WHERE username='$Teacher'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $email=$row['email'];

        $sql="SELECT * FROM personaldb WHERE username='$UserN'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $fullname=$row['fullname'];

     //send email
        
    $to= $email;
    $subject="Congratulation, You Have New Student Enrolled In Your Course";
    $message="Student $fullname is now enrolled in your course.";
    $headers="From:sahilugetachew19@gmail.com \r\n";
    $headers.="MiME-Version:1.0"."\r\n";
    $headers.="content-type:text/html;charset=UTF-8"."\r\n";
 
    $send=mail($to,$subject,$message,$headers);
    if($send)
    {
        echo
        "
        <script>
          alert('We have sent $Teacher a notification email');
        
        </script>
        ";
        // echo "<br>Records added successfully.";
        // echo "We have sent You a verification code to your email account to verify it's you.<br>";
        // echo "Check your email";
        // header('location:http://localhost/index.php');
    }
    else
    {
        echo
        "
        <script>
          alert('Notification not sent');
          
        </script>
        ";
    }
    

    // if(mail($to,$subject,$message,$headers))
    // {
    //     header('location:http://localhost/y/thanks.php');

    // }
    // else{
    //     echo "error ";
    // }
   
}
 
        //$row = mysqli_fetch_assoc($result); 
    // }
    // else
    // if(mysqli_fetch_assoc($result)>0){
        
    //     $sql="SELECT * FROM student WHERE username='$UserN' and course_id='$retrivedCourse_id'";
    //     $result=mysqli_query($conn,$sql);
    //     $row = mysqli_fetch_assoc($result); 

    //     if(mysqli_fetch_assoc($result)==0){
    //         $sql="INSERT INTO student (course_id, catalogue, username) VALUES ('$retrivedCourse_id','$clickedcatagory','$UserN')";
    //         $result=mysqli_query($conn,$sql);    
    //     }else{
    //         echo  "<script>alert('You are already enrolled in this course');</script>";
    //         header("Location: reportpage.php");
    //     }

    // }
    // $sql="SELECT course_id FROM course WHERE catalogue='$clickedcatagory' and course_name='$clickedcourse'";
    // $result=mysqli_query($conn,$sql);
    // $row = mysqli_fetch_assoc($result);  

if(isset($_POST['submit2'])){

    header("Location: reportpage.php");

}
//$UserN=$_SESSION['User_Name'];
// $sql="SELECT * FROM personaldb WHERE username='$UserN'";
// $result = mysqli_query($conn, $sql);
//    $row = mysqli_fetch_assoc($result);
//    $FullName=$row['fullname'];
//    $Email=$row['email'];
//    $Phone=$row['phone'];

// $fulurl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// $email=$_GET['user_email'];
// echo "the email is $email";
// $sql = "SELECT username,fullname,email FROM personaldb WHERE email='$email'";
// $result = mysqli_query($conn, $sql);
// if (mysqli_num_rows($result) >0) {
// $row = mysqli_fetch_assoc($result);
// $name=$row['fullname'];
// echo "the email is $name";
// $Vemail=$row['email'];
// $username=$row['username'];}
//   //  $ffff=$row['password'];
//   //  echo "<br>$password<br>$ffff";
//    if(password_verify($password,$row["password"])){
//      header("Location:tuteeProfile.php?user_email=.$email");
//      echo "loged in successfully";
//    }
//    else{
//      echo "unable to log in";
//    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/tutee.css">
    <link rel="shortcut icon" href="../../Logo/logo.jpeg">
    <title>Profile</title>
</head>
<body>
    <div class="header">
        <div class="nav-logo">
            <a href="../tuteehome.php"><img src="../../Logo/logo.jpeg" width="90px" title="YMARU Home"></a>
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
                    <p>Videos</p>
                </div>
                
                   
                
                <div class="user-options">
                    <a href="video.php"><img src="../../Images/video-818.png" alt="video logo" width="300" height="300"></a>
                    
                    

                    
                    
                    <div class="profile-name">
                        <div class="previous-name">
                                
                        
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
                    <p>Files</p>
                </div>
                <div class="profile-metadata">
                    <a href="material.php"><img src="../../Images/file.png" alt="video logo" width="300" height="300"></a>
                    
                    
                        
                    </div>
                    <div class="Email">
                        
                        <div class="defaultEmail">
                            
                        </div>
                        
                    </div>
                    <div class="Phone">
                        
                        <div class="defaultPhone">
                            
                        </div>
                    </div>
                    <div class="Phone">
                                
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
    <!-- <script src="../../JS/tuteeP.js"></script>
    <script src="../JS/signup.js"></script> -->
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
