<?php
session_start();
unset($_SESSION['User_Name']);
unset($_SESSION['Email']);
unset($_SESSION['Admin_User_Name']);
unset($_SESSION['Admin_Email']);
unset($_SESSION['Fetched_Username']);
unset($_SESSION['TeacherFromHomePage']);
unset($_SESSION['passedcourse']);
unset($_SESSION['passedcatagory']);

header("Location: ../../index.php");
die();

?>