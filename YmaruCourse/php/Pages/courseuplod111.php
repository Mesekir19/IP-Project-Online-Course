<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <script src="../../JS/sweetalert.min.js"></script>  
</body>
</html>
<?php
session_start();
include '../../config/db_con.php';
$TeachUsername=$_SESSION['User_Name'];
if(isset($_POST['submit'])){
    // if(null !==$_POST['teaching'] && null !==$_POST['upfile'] && null !==$_POST['discription']){

    $name= $_FILES['upfile']['name'];
    $tempname= $_FILES['upfile']['tmp_name'];//The temporary filename of the file in which the uploaded file was stored on the server.
    $location= 'uploadfile/';
    
    $ext = pathinfo($name, PATHINFO_EXTENSION);

    //$target= $location.basename($name);
    $path="C:/xampp/htdocs/YmaruCourse/php/Pages/uploadfile/".$TeachUsername."/video/";
    $path2="C:/xampp/htdocs/YmaruCourse/php/Pages/uploadfile/".$TeachUsername."/pdf/";
        
    $coursename=$_POST['teaching'];
    $description=$_POST['discription'];
    
    $sql="SELECT course_id,course_name FROM course where course_name='$coursename'";//for checking weather the search input existes in the databse or not
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $course_id=$row['course_id'];
        $coursename=$row['course_name'];
        
    }else{
        echo  "
        swal({
  title: 'Oops..',
  text: 'No such course name is availabile',
  icon: 'error',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'courseupload.php';}});
        </script>";
    }
    $sql="SELECT teacher_id,course_id,username FROM teacher where username='$TeachUsername' and course_id='$course_id'";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $course_id=$row['course_id'];
        $TeachUsername=$row['username'];
        $teacher_id=$row['teacher_id'];
    }else{
        echo  "<script>
        swal({
  title: 'Oops..',
  text: 'You are not currently teaching the course you mentioned above',
  icon: 'error',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'courseupload.php';}});
        
        </script>";
        
    }
    
    if (!empty($_FILES['upfile']['name'])){
        
        if (!is_dir($path)){
                mkdir($path,0777,true);
                }
        if ($ext=='mp4' || $ext=='avi' || $ext=='webm'|| $ext=='mkv' || $ext=='MP4' || $ext=='AVI' || $ext=='WEBM'|| $ext=='MKV'  ) {
            if(move_uploaded_file($tempname,$path.basename($name))){
            $newfile=$path.basename($name);
            $sql="INSERT INTO video (teacher_id,course_id,username,video,description) VALUES ('$teacher_id','$course_id','$TeachUsername','$newfile','$description')";
                if(mysqli_query($conn, $sql)){
                // echo "uploaded to the database";
                echo
        "
        <script>
        swal({
  title: 'Great',
  text: 'File uploaded successfully',
  icon: 'success',
});

        </script>
        ";
                
    // $studentusername=array();
    $sql="SELECT * FROM student WHERE course_id='$course_id'";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            $studentusername=$row['username'];
            $sql="SELECT * FROM personaldb WHERE username='$studentusername'";
            
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            $email=$row['email'];
            $to= $email;
    $subject="New Video Availiable";
    $message="Instructor $TeachUsername uploaded a new video.";
    $headers="From:sahilugetachew19@gmail.com \r\n";
    $headers.="MiME-Version:1.0"."\r\n";
    $headers.="content-type:text/html;charset=UTF-8"."\r\n";
 
    $send=mail($to,$subject,$message,$headers);
    if($send)
    {
        echo
        "
        <script>
        swal({
  title: 'Video Uploaded',
  text: 'We have sent your students a notification email',
  icon: 'success',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'courseupload.php';}});
        
          
          
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
          document.location.href = 'courseupload.php';
          
        </script>
        ";
    }
        }
        }
        
        

                }
            // echo "the file $name has been uploaded";

            }
            else{
               echo
        "
        <script>
          alert('File not uploaded');
          document.location.href = 'courseupload.php';
          
        </script>
        ";
            }       
        }
    elseif($ext=='pdf'){
            if (!is_dir($path2)){
                mkdir($path2);
                }
        
            if(move_uploaded_file($tempname,$path2.basename($name))){
            $newfile=$path2.basename($name);
            $sql="INSERT INTO material (teacher_id,course_id,username,material,description) VALUES ('$teacher_id','$course_id','$TeachUsername','$newfile','$description')";
                if(mysqli_query($conn, $sql)){
                echo "
        <script>
      
      
         swal({
  title: 'Great',
  text: 'File uploaded to the database',
  icon: 'success',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'courseupload.php';}});
           
        
          
        </script>
        ";
    // $studentusername=array();
    $sql="SELECT * FROM student WHERE course_id='$course_id'";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            $studentusername=$row['username'];
            $sql="SELECT * FROM personaldb WHERE username='$studentusername'";
            
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            $email=$row['email'];
            $to= $email;
    $subject="New material Availiable";
    $message="Instructor $TeachUsername uploaded a new material.";
    $headers="From:sahilugetachew19@gmail.com \r\n";
    $headers.="MiME-Version:1.0"."\r\n";
    $headers.="content-type:text/html;charset=UTF-8"."\r\n";
 
    $send=mail($to,$subject,$message,$headers);
    if($send)
    {
        echo
        "
        <script>
         swal({
  title: 'File Uploaded',
  text: 'We have sent your students a notification email',
  icon: 'success',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'courseupload.php';}});
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
       swal({
  title: 'Network',
  text: 'Notification email not sent',
  icon: 'error',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'courseupload.php';}});
          
        </script>
        ";
    } 
}
}
        }else{
            
             echo
        "
        <script>
        swal({
  icon: 'error',
  title: 'Oops...',
  text: 'Unsupported File type!',
  
}).then((willDelete) => {
  if (willDelete) {document.location.href = 'courseupload.php';}});
        
          
          
        </script>
        ";
        }

         
    }
}
}
else{
        echo
        "
        <script>
             swal({
  icon: 'error',
  title: 'Oops...',
  text: 'please select the file',
  
}).then((willDelete) => {
  if (willDelete) {document.location.href = 'courseupload.php';}});

          
        </script>
        ";
        
    }
    
}


// else{
//         echo  "<script>alert('Every field must be filled to procceed');</script>";
//     }
// }


?>
