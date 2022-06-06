<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../JS/sweetalert.min.js"></script>  
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
session_start();
include '../../config/db_con.php';
//include ('../insert_value.php');
//check whether the email is valid or not 


if (isset($_REQUEST['email'])&&($_REQUEST['email'])!=null){

$email= $_REQUEST['email'];
$sql = "SELECT * FROM personaldb";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) >0) {

  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
     //explode($row);
   // echo   $row["student_id"]." ". $row["firstname"]. " " . $row["lastname"]. "<br>";
    if($row["email"]==$email){
        $_SESSION['emailforReset']=$row['email'];

        $to= $email;
        $subject="email verification";
        $message="<a href='http://localhost/YmaruCourse/php/Pages/reset_email.html'>password reset form</a>";
        $headers="From:sahilugetachew19@gmail.com \r\n";
        $headers.="MiME-Version:1.0"."\r\n";
        $headers.="content-type:text/html;charset=UTF-8"."\r\n";
        $send=mail($to,$subject,$message,$headers);
        if(isset($send))
        {
            echo  "<script>
        swal({
  title: 'Sent',
  text: 'we have sent reset password to $email',
  icon: 'success',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'forgotemail.html';}});
        
        </script>";
        //    // header('location:http://localhost/y/thanks.php');
        //    echo "<br><h1> </h1>";
        //    echo $email;
        }
        else
        {
            echo  "<script>
        swal({
  title: 'Oops..',
  text: 'incorrect email',
  icon: 'error',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'forgotemail.html';}});
        
        </script>";


        }
    }
    
}

}
else
{
    echo  "<script>
        swal({
  title: 'Oops..',
  text: 'database empyty!',
  icon: 'error',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'forgotemail.html';}});
        
        </script>";

}
}
else
{
    echo  "<script>
        swal({
  title: 'Oops..',
  text: 'enter the correct email',
  icon: 'error',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'forgotemail.html';}});
        
        </script>";

}

        ?>
