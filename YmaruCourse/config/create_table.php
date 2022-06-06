<?php
include 'db_con.php';

// $sql= "CREATE TABLE personaldb (username VARCHAR (30) PRIMARY KEY , fullname VARCHAR (50) , email VARCHAR (30), gender VARCHAR (30) ,password VARCHAR (255), country VARCHAR (30), phone INT, birthdate VARCHAR(50),age INT, VKey VARCHAR(255), verify TINYINT(1) DEFAULT 0, profile VARCHAR(255), created_date DATE DEFAULT current_timestamp())";

// $sql= "CREATE TABLE course (course_id INT PRIMARY KEY AUTO_INCREMENT,course_name VARCHAR(30), catalogue VARCHAR (50),publish_year DATE DEFAULT current_timestamp())";

// $sql= "CREATE TABLE admin1 ( admin_id INT PRIMARY KEY AUTO_INCREMENT, username VARCHAR(50), email VARCHAR(50), password VARCHAR(255))";

// $sql= "CREATE TABLE teacher ( teacher_id INT PRIMARY KEY AUTO_INCREMENT, course_id INT , username VARCHAR(50), experience INT, payment VARCHAR(30), document VARBINARY (500000), CONSTRAINT fk_tcourse FOREIGN KEY (course_id) REFERENCES course (course_id), CONSTRAINT fk_tperson FOREIGN KEY (username) REFERENCES personaldb (username))";

// $sql= "CREATE TABLE student ( student_id INT PRIMARY KEY AUTO_INCREMENT, course_id INT, teacher_id INT,catalogue VARCHAR(255), username VARCHAR(50), enrollDate DATE DEFAULT current_timestamp(), CONSTRAINT fk_scourse FOREIGN KEY (course_id) REFERENCES course (course_id), CONSTRAINT fk_sperson FOREIGN KEY (username) REFERENCES personaldb (username),CONSTRAINT fk_steacher FOREIGN KEY (teacher_id) REFERENCES teacher (teacher_id) )";

// $sql= "CREATE TABLE video ( video_id INT PRIMARY KEY AUTO_INCREMENT, teacher_id INT ,course_id INT , username VARCHAR(50), video VARCHAR(255),description VARCHAR(255), CONSTRAINT fk_vteacher FOREIGN KEY (teacher_id) REFERENCES teacher (teacher_id),CONSTRAINT fk_vcourse FOREIGN KEY (course_id) REFERENCES teacher (course_id), CONSTRAINT fk_vperson FOREIGN KEY (username) REFERENCES teacher (username))";

// $sql= "CREATE TABLE material ( material_id INT PRIMARY KEY AUTO_INCREMENT, teacher_id INT ,course_id INT , username VARCHAR(50), material VARCHAR(255),description VARCHAR(255), CONSTRAINT fk_mteacher FOREIGN KEY (teacher_id) REFERENCES teacher (teacher_id),CONSTRAINT fk_mcourse FOREIGN KEY (course_id) REFERENCES teacher (course_id), CONSTRAINT fk_mperson FOREIGN KEY (username) REFERENCES teacher (username))";


// $password='$2y$10$ucxTJzvg/RaYcXRFG6/JNeuCIU77TDg9PKFEOvqSZ908Tol8PAIza';
// $sql="INSERT INTO admin1(username,email,password) VALUES ('YmaruTeam','ymaruatadmin@gmail.com','$password')";

if(mysqli_query($conn, $sql)){
    echo "Table created successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// Close connection
mysqli_close($conn);
?>