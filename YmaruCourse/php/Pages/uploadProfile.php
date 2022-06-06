<?php
session_start();
include '../../config/db_con.php';
$UserN=$_SESSION['User_Name'];
                    // if (isset($_POST['profileImage'])){
                    //     $target="images/".basename($_FILES['profileImage']['name']);
                    //     $image=$_FILES['profileImage']['name'];

                    //     $sql="UPDATE personaldb SET profile = '$image'
                    //             WHERE username ='$UserN'";
                    //     mysqli_query($conn, $sql);

                    // }
//echo "the file is not uploaded0";
                    if(isset($_FILES['profileImage']['name'])){
    // if(null !==$_POST['teaching'] && null !==$_POST['upfile'] && null !==$_POST['discription']){

    $name= $_FILES['profileImage']['name'];
    $tempname= $_FILES['profileImage']['tmp_name'];
    //$location= 'uploadfile/';
    
    $ext = pathinfo($name, PATHINFO_EXTENSION);

    //$target= $location.basename($name);
    $path="C:/xampp/htdocs/YMARU/html/Pages/uploadfile/".$UserN."/profile/";
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
                    header("Location: tuteeProfile.php");
                echo "uploaded to the database";
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
                    ?>