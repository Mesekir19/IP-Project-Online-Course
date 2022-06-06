<?php
include '../config/db_con.php';
if(isset($_COOKIE['userinput'])){
    $UserInput=$_COOKIE['userinput'];
     $sql="SELECT username, fullname, email, country, phone FROM personaldb WHERE username='$UserInput' or fullname='$UserInput' or country='$UserInput' or email='$UserInput'";
                $result = mysqli_query($conn, $sql);
                
            }

if(isset($_POST['CSVexport'])){
    if($_POST['select2']=="course"){
    $sql="SELECT * FROM course ";
                $result = mysqli_query($conn, $sql);
     header("Content-Type: text/csv charset=utf-8");
     header("Content-Disposition: attachment; filename=course.csv");	
     header("Content-Transfer-Encoding: binary");
    $output = fopen( 'php://output', 'w' );
    fputcsv($output, array('course_id','course_name','catalogue','publish_year'));
       
            while($row=mysqli_fetch_assoc($result)){
                fputcsv($output,$row);
            }
            fclose($output);
        }elseif($_POST['select2']=="material"){
    
            $sql="SELECT * FROM material";
                $result = mysqli_query($conn, $sql);
     header("Content-Type: text/csv charset=utf-8");
     header("Content-Disposition: attachment; filename=material.csv");	
     header("Content-Transfer-Encoding: binary");
    $output = fopen( 'php://output', 'w' );
    fputcsv($output, array('material_id','teacher_id','course_id','username','material','description'));
       
            while($row=mysqli_fetch_assoc($result)){
                fputcsv($output,$row);
            }
            fclose($output);
        }elseif($_POST['select2']=="personaldb"){
    $sql="SELECT * FROM personaldb ";
                $result = mysqli_query($conn, $sql);
     header("Content-Type: text/csv charset=utf-8");
     header("Content-Disposition: attachment; filename=personaldb.csv");	
     header("Content-Transfer-Encoding: binary");
    $output = fopen( 'php://output', 'w' );
    fputcsv($output, array('username','fullname','email','gender','password','country','phone','birthdate','age','VKey','verify','profile','created_date'));
       
            while($row=mysqli_fetch_assoc($result)){
                fputcsv($output,$row);
            }
            fclose($output);
        }elseif($_POST['select2']=="student"){
    $sql="SELECT * FROM student ";
                $result = mysqli_query($conn, $sql);
     header("Content-Type: text/csv charset=utf-8");
     header("Content-Disposition: attachment; filename=student.csv");	
     header("Content-Transfer-Encoding: binary");
    $output = fopen( 'php://output', 'w' );
    fputcsv($output, array('student_id','course_id','teacher_id','catalogue','username','enrollDate'));
       
            while($row=mysqli_fetch_assoc($result)){
                fputcsv($output,$row);
            }
            fclose($output);
        }elseif($_POST['select2']=="teacher"){
    $sql="SELECT * FROM teacher ";
                $result = mysqli_query($conn, $sql);
     header("Content-Type: text/csv charset=utf-8");
     header("Content-Disposition: attachment; filename=teacher.csv");	
     header("Content-Transfer-Encoding: binary");
    $output = fopen( 'php://output', 'w' );
    fputcsv($output, array('teacher_id','course_id','username','experience','payment','document'));
       
            while($row=mysqli_fetch_assoc($result)){
                fputcsv($output,$row);
            }
            fclose($output);
        }elseif($_POST['select2']=="video"){
    $sql="SELECT * FROM video ";
                $result = mysqli_query($conn, $sql);
     header("Content-Type: text/csv charset=utf-8");
     header("Content-Disposition: attachment; filename=video.csv");	
     header("Content-Transfer-Encoding: binary");
    $output = fopen( 'php://output', 'w' );
    fputcsv($output, array('video_id','teacher_id','course_id','username','video','description'));
       
            while($row=mysqli_fetch_assoc($result)){
                fputcsv($output,$row);
            }
            fclose($output);
        }
}



if(isset($_POST['Import']) && isst($_POST['select'])){

    // $modify =$_POST['Import'];
        if($_POST['select']=="course"){   
            $filename=$_FILES['file']['tmp_name']; 
            if($_FILES['file']['size'] > 0)
             {
                       
                $file = fopen($filename, "r");
                
                var_dump($_FILES["file"]["size"]);
                
                    while (($getData = fgetcsv($file, 10000, ",")) != FALSE && fgetcsv($file, 10000, ",")!=NULL)
                        {
                            $sql = "INSERT INTO course (course_id, course_name, catalogue, publish_year ) 
                                values ('$getData[0]','$getData[1]','$getData[2]','$getData[3]')";
                            $result = mysqli_query($conn, $sql);
                        }
                
}
}elseif($_POST['select']=="material"){   
            $filename=$_FILES['file']['tmp_name']; 
            if($_FILES['file']['size'] > 0)
             {
                       
                $file = fopen($filename, "r");
                
                var_dump($_FILES["file"]["size"]);
                
                    while (($getData = fgetcsv($file, 10000, ",")) != FALSE && fgetcsv($file, 10000, ",")!=NULL)
                        {
                            $sql = "INSERT INTO material (material_id, teacher_id, course_id, username,material,description ) 
                                values ('$getData[0]','$getData[1]','$getData[2]','$getData[3]','$getData[4]','$getData[5]')";
                            $result = mysqli_query($conn, $sql);
                        }
                
}
}elseif($_POST['select']=="personaldb"){   
            $filename=$_FILES['file']['tmp_name']; 
            if($_FILES['file']['size'] > 0)
             {
                       
                $file = fopen($filename, "r");
                
                var_dump($_FILES["file"]["size"]);
                
                    while (($getData = fgetcsv($file, 10000, ",")) != FALSE && fgetcsv($file, 10000, ",")!=NULL)
                        {
                            $sql = "INSERT INTO personaldb (username, fullname, email,gender,password,country,phone,birthdate,age,VKey,verify,profile,created_date ) 
                                values ('$getData[0]','$getData[1]','$getData[2]','$getData[3]','$getData[4]','$getData[5]','$getData[6]','$getData[7]','$getData[8]','$getData[9]','$getData[10]','$getData[11]','$getData[12]')";
                            $result = mysqli_query($conn, $sql);
                        }
                
}
}elseif($_POST['select']=="student"){   
            $filename=$_FILES['file']['tmp_name']; 
            if($_FILES['file']['size'] > 0)
             {
                       
                $file = fopen($filename, "r");
                
                var_dump($_FILES["file"]["size"]);
                
                    while (($getData = fgetcsv($file, 10000, ",")) != FALSE && fgetcsv($file, 10000, ",")!=NULL)
                        {
                            $sql = "INSERT INTO student (student_id, course_id, teacher_id,catalogue,username,enrollDate) 
                                values ('$getData[0]','$getData[1]','$getData[2]','$getData[3]','$getData[4]','$getData[5]')";
                            $result = mysqli_query($conn, $sql);
                        }
                
}
}elseif($_POST['select']=="teacher"){   
            $filename=$_FILES['file']['tmp_name']; 
            if($_FILES['file']['size'] > 0)
             {
                       
                $file = fopen($filename, "r");
                
                var_dump($_FILES["file"]["size"]);
                
                    while (($getData = fgetcsv($file, 10000, ",")) != FALSE && fgetcsv($file, 10000, ",")!=NULL)
                        {
                            $sql = "INSERT INTO teacher (teacher_id, course_id,username,experience,payment,document) 
                                values ('$getData[0]','$getData[1]','$getData[2]','$getData[3]','$getData[4]','$getData[5]')";
                            $result = mysqli_query($conn, $sql);
                        }
                
}
}elseif($_POST['select']=="video"){   
            $filename=$_FILES['file']['tmp_name']; 
            if($_FILES['file']['size'] > 0)
             {
                       
                $file = fopen($filename, "r");
                
                var_dump($_FILES["file"]["size"]);
                
                    while (($getData = fgetcsv($file, 10000, ",")) != FALSE && fgetcsv($file, 10000, ",")!=NULL)
                        {
                            $sql = "INSERT INTO video (material_id, teacher_id, course_id, username,video,description) 
                                values ('$getData[0]','$getData[1]','$getData[2]','$getData[3]','$getData[4]','$getData[5]')";
                            $result = mysqli_query($conn, $sql);
                        }
                
}
}
}
//  function download($file,$header ){ 
//         // _helper->layout()->disableLayout();
//         // _helper->viewRenderer->setNoRender(true);
//      $filname=$report_about.$specific.".csv";
//      $fh = fopen( 'php://output', 'w' );
//      fputcsv($fh, $header);
//      header("Content-Type: text/csv");
//      header("Content-Disposition: attachment; filename=\"$filname\"");	
//      header("Content-Transfer-Encoding: binary");
//      if(!empty($file)) {
//        foreach($file as $record) {		
//          fputcsv($fh, array_values($record));
//        }
//      }





//  $dir="C:/xampp/htdocs/YMARU/admin/admin_files/".$report_about."/";
//     $result;
//     $sql;
//     $count = 0;
//     $header;
//     $output;
//     $path=$dir.$specific;
//     if (!is_dir($dir)){
//     mkdir($dir);
//     }
// $output = fopen($path, "a+");  

//      if ($report_about=="customer"){
       
//          $header=array('Email','First Name', 'Last Name', 'Phone Number','job','gender','birthdate');
//         fputcsv($output,$header );  
         
//         }
//         $result=mysqli_query($conn,$sql); 
//         while($row = mysqli_fetch_assoc($result))  
//         {   
            
//              fputcsv($output, $row);  
//              $records[]=$row;
//              $count++;
//         }
?>