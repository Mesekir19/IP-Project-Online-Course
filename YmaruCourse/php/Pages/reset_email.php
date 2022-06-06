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
// include ('accept_email.php');

// if(isset($_POST['submit'])||$_POST['submit']!=null){
$pass=$_POST['password'];
$conpass=$_POST['conpassword'];
$email=$_SESSION['emailforReset'];
if($pass!=$conpass)
{
    echo  "<script>
        swal({
  title: 'Password',
  text: 'password doesnt match',
  icon: 'error',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'reset_email.html';}});
        
        </script>";
   
}
else if($conpass=="" || $pass=="")
{
    echo  "<script>
        swal({
  title: 'Password',
  text: 'invalid password,
  icon: 'error',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'reset_email.html';}});
        
        </script>";

}
else{
    $sql="SELECT *FROM personaldb";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) >0) {
echo "$email";
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
//echo "sdffsdf";
          if($row["email"]==$email && password_verify($pass,$row["password"])){
              echo  "<script>
        swal({
  title: 'Password',
  text: 'you can't user the previous password',
  icon: 'error',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'reset_email.html';}});
        
        </script>";
             
          }
          else if($row["email"]==$email ){
              $hash= password_hash($pass, PASSWORD_DEFAULT);
              $sql="UPDATE personaldb SET password ='$hash' WHERE email='$email'";
             // $row['password'=$newpass;
             if (mysqli_query($conn, $sql)) {
                 echo  "<script>
        swal({
  title: 'Great',
  text: 'you have updated your password',
  icon: 'success',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = '../../index.php';}});
        
        </script>";
              
             // header("Location: ../../../index.php");
             }
          }

          }

          } 
      }



    // }
    


?>
