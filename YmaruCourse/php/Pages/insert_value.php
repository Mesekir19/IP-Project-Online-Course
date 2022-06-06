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
include '../../config/db_con.php';

if (isset($_POST['submit'])){
    
$username =  mysqli_real_escape_string($conn, $_POST['username']);
$full_name = mysqli_real_escape_string($conn, $_POST['fullname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = $_POST['password'];
$password2 = $_POST['confirm_password'];
if(isset($_POST['gender'])){
$gender= mysqli_real_escape_string($conn, $_POST['gender']); }
// if($gender=="female"){
//   $gender="fem"
// }
// $fgender=="female";   
// }
// if(isset($_POST['male'])){
// $mgender= mysqli_real_escape_string($conn, $_POST['male']); 
// $gender="male";  
// }

$country= mysqli_real_escape_string($conn, $_POST['country']);
$phone= mysqli_real_escape_string($conn, $_POST['phone']);
$birthdate= mysqli_real_escape_string($conn, $_POST['birthday']);
$hash= password_hash($password, PASSWORD_DEFAULT);
$invalidUsername="";
$invalidEmail="";
$invalidPassword=""; 
$ps="";
$resAge="";


$sql="SELECT * FROM personaldb";
$result=mysqli_query($conn, $sql);
while($row=mysqli_fetch_assoc($result)){
$FetchedUsername=$row['username'];
if($username==$FetchedUsername){
    $invalidUsername="username is already in use";
 
}else{
    filter_var($username, FILTER_SANITIZE_STRING);
    
}

}


$sql="SELECT * FROM personaldb";
$result=mysqli_query($conn, $sql);
while($row=mysqli_fetch_assoc($result)){
$FetchedEmail=$row['email'];
if($email==$FetchedEmail){
    $invalidEmail="email already registered";
    
   // echo  "<script>alert('email already registered');</script>";
}else{
    filter_var($username, FILTER_SANITIZE_STRING);
  
}
}
 if($birthdate){
  $today = date("Y-m-d");
  $diff = date_diff(date_create($birthdate), date_create($today));
  $age=$diff->format('%y'); 
  if($age<10){
$resAge="Too young to sing up";
  }
 }
  

if (strlen($password)<6)
{
    $ps="password length must be at least 6 characters long";


}elseif (strlen($password)>6 &&  strlen($password)<24){
    if($password!==$password2){
        $invalidPassword= "password doesnot match";

    }
}

//sanitizing
// in order to filter out unwanted (illegal) characters


filter_var($full_name, FILTER_SANITIZE_STRING);


// filter_var($email, FILTER_SANITIZE_EMAIL);
  
//Validating
// if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
//     echo("<br>email is valid");
// }
// else {
//     echo("<br>email is invalid");
// }
if($resAge){
    echo " <script> swal({
  title: 'Sorry',
  text: 'Too Young To Sign Up',
  icon: 'error',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'signup.html';}});
        </script>"; 
}
elseif($invalidPassword && $ps && $invalidEmail && $invalidUsername){
    echo " <script> swal({
  title: 'Check',
  text: 'username is already in use, email already registered, password length must be at least 6 characters long and password doesnot match',
  icon: 'error',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'signup.html';}});
        </script>"; 
}elseif($invalidPassword && $ps && $invalidEmail){
    echo " <script> swal({
  title: 'Check',
  text: 'email already registered and password length must be at least 6 characters long and password doesnot match',
  icon: 'error',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'signup.html';}});
        </script>"; 
}elseif($ps && $invalidEmail){
    echo " <script> swal({
  title: 'Check',
  text: 'email already registered and password length must be at least 6 characters long',
  icon: 'error',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'signup.html';}});
        </script>"; 
}elseif($invalidPassword && $invalidEmail){
    echo "  <script> swal({
  title: 'Check',
  text: 'email already registered and password doesnot match',
  icon: 'error',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'signup.html';}});
        </script>"; 
}elseif($invalidPassword && $invalidUsername){
    echo " <script> swal({
  title: 'Check',
  text: 'username is already in use and password doesnot match',
  icon: 'error',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'signup.html';}});
        </script>"; 
}elseif($ps && $invalidUsername){
    echo " <script> swal({
  title: 'Check',
  text: 'username is already in use and password length must be at least 6 characters long',
  icon: 'error',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'signup.html';}});
        </script>"; 
}elseif($invalidEmail && $invalidUsername){
    echo " <script> swal({
  title: 'Check',
  text: 'username is already in use and email already registered',
  icon: 'error',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'signup.html';}});
        </script>"; 
}elseif($invalidPassword && $ps){
    echo " <script> swal({
  title: 'Check',
  text: 'password length must be at least 6 characters long and password doesnot match',
  icon: 'error',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'signup.html';}});
        </script>"; 
}
elseif($invalidUsername){
    echo " <script> swal({
  title: 'Check',
  text: 'username is already in use',
  icon: 'error',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'signup.html';}});
        </script>"; 
}elseif($invalidEmail){
    echo " <script> swal({
  title: 'Check',
  text: 'email already registered',
  icon: 'error',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'signup.html';}});
        </script>"; 
}elseif($ps){
    echo " <script> swal({
  title: 'Check',
  text: 'password length must be at least 6 characters long',
  icon: 'error',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'signup.html';}});
        </script>"; 
}elseif($invalidPassword){
    echo " <script> swal({
  title: 'Check',
  text: 'password doesnot match',
  icon: 'error',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = 'signup.html';}});
        </script>"; 
}



if($invalidUsername=="" && $invalidEmail=="" && $invalidPassword=="" ){
$vKey=md5(time().$username);
$sql = "INSERT INTO personaldb (username,fullname,email,gender,password,country,phone,birthdate,age,VKey)
         VALUES ('$username','$full_name','$email','$gender','$hash','$country','$phone','$birthdate','$age','$vKey')";

if(mysqli_query($conn, $sql)){
    
    //send email
        
    $to= $email;
    $subject="email verification";
    $message="<a href='http://localhost/YmaruCourse/index.php?vkey=$vKey'>verify account </a>";
    $headers="From:sahilugetachew19@gmail.com \r\n";
    $headers.="MiME-Version:1.0"."\r\n";
    $headers.="content-type:text/html;charset=UTF-8"."\r\n";
 
    $send=mail($to,$subject,$message,$headers);
    if($send)
    {
      echo " <script> swal({
  title: 'Congratulations, Only One More Step Need',
  text: 'We have sent You a verification code to your email account to verify it's you',
  icon: 'error',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = '../../index.php';}});
        </script>"; 
    
       
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
          alert('Email not sent');
          
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
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

}

// Attempt insert query execution
// Attempt insert query execution

 }



// Close connection
mysqli_close($conn);

exit();

?>
