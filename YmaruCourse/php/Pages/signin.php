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
if (isset($_REQUEST['email']) && isset($_REQUEST['password'])){
$email= $_REQUEST['email'];
$password= $_REQUEST['password'];
// echo sweetAlert("here", "vkey", "is set");

// $username=$_REQUEST['username'];

//$hash=password_hash($password, PASSWORD_DEFAULT);

$sql = "SELECT username,email,password FROM personaldb WHERE email='$email' AND verify=1";

$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
   $row = mysqli_fetch_assoc($result);
  //  $ffff=$row['password'];
  //  echo "<br>$password<br>$ffff";
   if(password_verify($password,$row["password"])){
     $_SESSION['User_Name']=$row['username'];
     $_SESSION['Email']=$row['email'];
    //  header("Location:../tuteehome.html?user_email=.$email");
     header("Location:../tuteehome.php");
    //  echo "loged in successfully";
   }
   else{
      
        echo  "<script>
        swal({
  title: 'Check',
  text: 'Wrong email password combination',
  icon: 'info',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = '../../index.php';}});
        </script>";
    
   }
  }

  elseif(mysqli_num_rows($result)==0){
    $sqlAdmin="SELECT username,email,password FROM admin1 WHERE email='$email'";

    $resultAdmin = mysqli_query($conn, $sqlAdmin);


  if (mysqli_num_rows($resultAdmin) > 0) {
   $row = mysqli_fetch_assoc($resultAdmin);
  //  $ffff=$row['password'];
  //  echo "<br>$password<br>$ffff";
   if(password_verify($password,$row["password"])){
     $_SESSION['Admin_User_Name']=$row['username'];
     $_SESSION['Admin_Email']=$row['email'];
    //  header("Location:../tuteehome.html?user_email=.$email");
     header("Location:../../admin/adminReport.php");
    //  echo "loged in successfully";
   }
   }
  
   else{
     
        echo  " <script>
        swal({
  title: 'Oops..',
  text: 'unable to login',
  icon: 'error',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = '../../index.php';}});
        </script>";
   
   }

  // output data of each row
//   while($row = mysqli_fetch_assoc($result)) {
 
//    // echo   $row["student_id"]." ". $row["firstname"]. " " . $row["lastname"]. "<br>";
//     if($row["email"]==$email  && $row["username"]==$username){
//       $fghj= $row["password"];
//       echo "<br>$password <br>$fghj ";
//        $verify=password_verify($password,$hash);
//        if($verify){
//         echo "<br>loged in successfully";
//         break; 
//        }
        
//     }
//     else{
//       echo "<br>incorrect email/username-password combination";
//     }
// }
} 
else {
   
        echo  " <script>
        swal({
  title: 'Check',
  text: 'Wrong email password combination',
  icon: 'info',
})
.then((willDelete) => {
  if (willDelete) {document.location.href = '../../index.php';}});
        </script>";
  // header("Location:../../../index.php");
}

mysqli_close($conn);



// $sql = "SELECT * FROM customer";
// $result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) {
//   // output data of each row
//   foreach ($result as $row) {}
//   $data = mysqli_fetch_assoc($row);
//     echo "id: " . $data["customer_id"]. " - Name: " . $data["fname"]. " " . $data["lname"]. "<br>";
//   }

// else {
//   echo "0 results";
// }
// mysqli_close($conn);
}
?>