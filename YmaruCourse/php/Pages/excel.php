<?php
session_start();
include '../config/db_con.php';
if(isset($_SESSION['User_Name'])){
    header("location: ../index.php");
    die();
}
elseif(!isset($_SESSION['Admin_User_Name'])){
    header("location: edit.php");
    die();
}
if(isset($_COOKIE['userinput'])){
    $UserInput=$_COOKIE['userinput'];
     $sql="SELECT username, fullname, email, country, phone FROM personaldb WHERE username='$UserInput' or fullname='$UserInput' or country='$UserInput' or email='$UserInput'";
                $result = mysqli_query($conn, $sql);
                $everyRow= array();
            while($row=mysqli_fetch_assoc($result)){
                $everyRow[]=$row;
            }
if(isset($_POST['ToExcel'])){
    $filename="data_export_".date('Ymd'). ".xls";
    //will out put excel file
    header("Content-Type: application/vnd.ms-excel");
    //to make it downloadable
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $show_coloumn= false;
    if(!empty($everyRow)){
        foreach($everyRow as $each){
            if(!$show_coloumn){
                echo implode("\t", array_keys($each))."\n";
                $show_coloumn=true;
            }
            echo implode("\t", array_values($each))."\n";
        }
    }
    exit;
}
}
?>