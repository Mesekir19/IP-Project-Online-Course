<?php
session_start();
include '../../config/db_con.php';
if(!isset($_SESSION['User_Name'])){
    header("location: ../../index.php");
    die();
}


if(isset($_POST['experience']) && isset($_POST['account']) && isset($_POST['upfile']) && isset($_POST['catalogue']) && isset($_POST['course'])){
$experience= mysqli_real_escape_string($conn,$_POST['experience']);
$account= mysqli_real_escape_string($conn,$_POST['account']);
$upfile= $_POST['upfile'];
$catalogue=$_POST['catalogue'];
$course= $_POST['course'];
}
$sql="INSERT INTO course (course_name,catalogue) VALUES ('$course', '$catalogue')";
echo "the course $course";
if(mysqli_query($conn, $sql)){
    echo
        "
        <script>
          alert('Records added successfully.');
          
        </script>
        ";
    // echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
// $sql="SELECT course_id FROM course WHERE course_name='$course'";
// $course_id=$_POST['course_id'];
// echo "the course $course_id";
$username=$_SESSION['User_Name'];
$sql1="SELECT course_id FROM course WHERE course_name='$course'";

$result=mysqli_query($conn, $sql1);
if (mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $courseid=$row['course_id'];
} 

$sql1="SELECT username FROM personaldb WHERE username='$username'";
$result=mysqli_query($conn, $sql1);
if (mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $userName=$row['username'];
} 
$sql2 = "INSERT INTO teacher (course_id,username,experience,payment,document)
          VALUES ('$courseid', '$userName','$experience','$account','$upfile')";

if(mysqli_query($conn, $sql2)){
    echo
        "
        <script>
          alert('Records added successfully.');
          document.location.href = 'courseupload.php';
        </script>
        ";
    // echo "Records added successfully.";
    // header("location: courseupload.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
?>