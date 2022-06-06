<?php
session_start();
include '../../config/db_con.php';
$UserN=$_SESSION['User_Name'];
if(isset($_GET['clickedcourse'])){
    $clickedcourse=$_GET['clickedcourse'];
    $clickedcatagory=$_GET['clickedcatagory'];
    
    $_SESSION['passedcourse']=$clickedcourse;
    $_SESSION['passedcatagory']=$clickedcatagory;

    $sql="SELECT * FROM course WHERE catalogue='$clickedcatagory' and course_name='$clickedcourse'";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $course_id=$row['course_id'];
   
    //to find the teacher teaching the clicked course
    $sql="SELECT username FROM teacher WHERE course_id='$course_id'";
    $result=mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $FetchedUsername=$row['username'];


    $_SESSION['Fetched_Username']=$FetchedUsername;



    // $sql="SELECT * FROM student WHERE username='$UserN'";
    // $result=mysqli_query($conn,$sql);
    // $row = mysqli_fetch_assoc($result); 
    // $retrivedCourse=$row['course_id'];
    // $retrivedCatagory=$row['catalogue'];
    //if the user is a student
    // if($row>=1){
    //     $sql="SELECT * FROM course WHERE course_name='$clickedcourse'";
    //     $result=mysqli_query($conn,$sql);
    //     $row = mysqli_fetch_assoc($result);
    //     $retrivedCourse_id=$row['course_id'];

    //     // $sql="INSERT INTO student (course_id, catalogue, username) VALUES ('$retrivedCourse_id','$clickedcatagory'.'$UserN')";
    //     // $result=mysqli_query($conn,$sql);
    //     // //$row = mysqli_fetch_assoc($result); 
    // }else
    // if the student is already enrolled in that course
    // if($row==1){
        // $retrivedCourse_id=$row['course_id'];
        $sql="SELECT * FROM student WHERE username='$UserN' and course_id='$course_id'";
        $result=mysqli_query($conn,$sql);
        // $row = mysqli_fetch_assoc($result); 

        if(mysqli_fetch_assoc($result)>0){
            echo  "<script>alert('You are already enrolled in this course');
            document.location.href = 'reportpage.php';</script>";
            
        }
        if($FetchedUsername==$UserN){
            echo  "<script>alert('You can not enroll in your own course');document.location.href = 'reportpage.php';
            </script>";
            
        }
        // else{
        //   $sql="INSERT INTO student (course_id, catalogue, username) VALUES ('$course_id','$clickedcatagory','$UserN')";
        //   $result=mysqli_query($conn,$sql);  
        //   echo  "<script>alert('Enrolled Successfully');</script>";
        // }

    // }
    
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
        <link rel="stylesheet" href="../../css/all.min.css">
        <link rel="stylesheet" href="../../css/fontawesome.min.css">
        <link rel="shortcut icon" href="../../Logo/logo.jpeg">

        <title>Sign up YMARU</title>
</head>

<body>
 
    <div style="clear: left;"></div>

    <div class="form-wrapper">
        <div class="fill">
            <h1>Are You sure You want to enroll in <?php echo $clickedcourse?> that is thought by <?php echo $FetchedUsername?> </h1>
            <form id="form" name="myform" method="post" action="interfaceforboth.php" enctype="multipart/form-data">
                
                <button type="submit" name="submit1">
                    Yes I want to Enroll
                </button>
                <button type="submit" name="submit2">
                    No I do not want to Enroll
                </button>

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
</style>
</body>

</html>
<?php

// if(isset($_POST['upfile']) && isset($_POST['video'])){
// $fileuploded= $_POST['upfile'];
// $videouploaded= $_POST['video'];

// $userName=$_SESSION['User_Name'];
// $sql="SELECT course_id FROM teacher WHERE username='$userName'";
// $result=mysqli_query($conn, $sql);
// if (mysqli_num_rows($result) > 0){
//     $row = mysqli_fetch_assoc($result);
//     $courseid=$row['course_id'];
// }
// $sql2 = "UPDATE course SET 
//     video = '$videouploaded',
//     material='$fileuploded'
// WHERE
//     course_id ='$courseid'";

// if(mysqli_query($conn, $sql2)){
//     echo "Records added successfully.";
//     header("location: courseupload.php");
// } else{
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
// }

// }

?>

