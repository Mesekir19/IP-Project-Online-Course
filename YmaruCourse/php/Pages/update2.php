<?php
session_start();
include '../../config/db_con.php';
// echo "$clickedEmail";
// header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
// header('Cache-Control: no-cache, must-revalidate, max-age=0');
// header('Cache-Control: post-check=0, pre-check=0',false);
// header('Pragma: no-cache');

if (isset($_REQUEST['submit'])){
        $UserN=$_SESSION['User_Name'];
                        $Username=$_POST['username'];
                        $FULLname=$_POST['fullname'];
                        $EMAIL=$_POST['email'];
                        
                        $PhoneNo=$_POST['phone'];
                        $Country=$_POST['country'];

$sql="UPDATE personaldb SET username='$Username', fullname='$FULLname', email='$EMAIL', phone='$PhoneNo', country='$Country' WHERE email='$clickedEmail'"; 
   if(mysqli_query($conn, $sql)){
       echo
        "
        <script>
          alert('Profile Updated');
          document.location.href = 'tuteeProfile.php';
        </script>
        ";
                    
                }
}

?>