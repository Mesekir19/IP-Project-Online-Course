<?php
session_start();
include '../../config/db_con.php';

$TeachUsername=$_SESSION['User_Name'];
$sql1="SELECT * FROM teacher WHERE username='$TeachUsername'";

$result=mysqli_query($conn, $sql1);
if(mysqli_num_rows($result) == 0){
   echo  "<script>alert('u can not upload');</script>";
   header("Location: tuteeProfile.php");

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="author" content="Mesekir">
    <meta name="title" content="YMARU online course and tutor">
    <meta name="description"
        content="YMARU is an Ethiopian online learning platform aimed at providing education with excellence.">
    <mata name="keywords" content="YMARU online education distance learning ethiopian study home">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/catalogue.css">
        <link rel="stylesheet" href="../../css/aboutus.css">
        <link rel="stylesheet" href="../../css/all.min.css">
        <link rel="stylesheet" href="../../css/fontawesome.min.css">
        <link rel="shortcut icon" href="../../Logo/logo.jpeg">

        <title>Sign up YMARU</title>
</head>

<body>
    <div class="header">
        <div class="nav-logo">
            <a href="../tuteehome.php"><img src="../../Logo/logo.jpeg" width="80px" title="YMARU Home"></a>
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
                    <a href="teacherReport.php">Report</a>
                </li>
                <li>
                    <a href="interfaceforboth.php">Uploaded Materials</a>
                </li>
                <!-- <li>
                    <a href="youruploadedmaterial.php">Uploaded Materials</a>
                </li> -->
                <!-- <li>
                    <a href="login1.html">Login</a>
                </li> -->
            </ul>
        </div>
    </div>

    <div style="clear: left;"></div>

    <div class="form-wrapper">
        <div class="fill">
            <h1>Uploade Course Materials</h1>
            <form id="form" name="myform" method="post" action="courseuplod111.php" enctype="multipart/form-data">
                <div class="form-control">
                    <label>Course</label>
                    <input type="text" placeholder="Enter the course name" name="teaching" id="email">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small> Error message</small>
                </div>

                <div class="form-control">
                    <label>Upload file</label>
                    <input type="file" placeholder="pdf,ppt..." name="upfile" id="username">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small> Error message</small>
                </div>
                <div class="form-control">
                    <label>Discription</label>
                    <textarea  name="discription" rows="4" cols="50">

                    </textarea>
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small> Error message</small>
                </div>
                <input type="submit" name="submit">
                <!-- <button type="submit" name="submit">
                    upload
                </button> -->

            </form>
        </div>
    </div>
    <!--End of form wrapper-->

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
    <!-- <script src="../JS/signup.js"></script> -->
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
            .form-wrapper{
            background-color: #c8d8e4;
            border-bottom: 1px solid #f0f0f0;
            
    
    
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
    
        .form-control input, .form-control textarea{
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
    
        input[type="submit"] {
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
    
       input[type="submit"]:hover {
    
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
        width: 100%;
    }
    .form-wrapper{
        width: 60%;
    }
    
        
    }
</style>


</body>

</html>


