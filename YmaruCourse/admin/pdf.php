<?php
session_start();
include '../config/db_con.php';
if(isset($_SESSION['User_Name'])){
    header("location: ../index.php");
    die();
}
elseif(!isset($_SESSION['Admin_User_Name'])){
    header("location: ../index.php");
    die();
}
require '../fpdf184/fpdf.php';
if(isset($_COOKIE['userinput'])){
    $UserInput=$_COOKIE['userinput'];
    $sql="SELECT * FROM personaldb WHERE username='$UserInput' or fullname='$UserInput' or country='$UserInput' or email='$UserInput'";
     
  
class PDF extends FPDF {
  
    // Page header
    function Header() {
          
        // Add logo to page
        $this->Image('../../Logo/logo.jpeg',5,6,20);
          
        // Set font family to Arial bold 
        $this->SetFont('Arial','B',20);
          
        // Move to the right
        $this->Cell(80);
          
        // Header
        $this->Cell(50,10,'Generated PDF',1,0,'C');
          
        // Line break
        $this->Ln(20);
    }
  
    // Page footer
    function Footer() {
          
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
          
        // Arial italic 8
        $this->SetFont('Arial','I',8);
          
        // Page number
        $this->Cell(0,10,'Page ' . 
            $this->PageNo() . '/{nb}',0,0,'C');
    }
}
  
// Instantiation of FPDF class
$pdf = new PDF();

// Define alias for number of pages
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',14);
    $result = mysqli_query($conn, $sql);
            
                $pdf->Cell('15', '10', 'Username', '0', '0', 'C');
                $pdf->Cell('50', '10', 'FULLname', '0','0', 'C');
                $pdf->Cell('50', '10', 'EMAIL', '0','0', 'C');
                $pdf->Cell('40', '10', 'Country', '0','0', 'C'); 
                $pdf->Cell('50', '10', 'PhoneNo', '0','1', 'C');

            while($row=mysqli_fetch_assoc($result)){
                 $Username=$row['username'];
                        $FULLname=$row['fullname'];
                        $EMAIL=$row['email'];
                        $PhoneNo=$row['phone'];
                        $Country=$row['country'];
                        $pdf->Cell('15', '10', $Username, '0', '0', 'C');
                        $pdf->Cell('50', '10', $FULLname, '0','0', 'C');
                        $pdf->Cell('50', '10', $EMAIL, '0','0', 'C');
                        $pdf->Cell('40', '10', $Country, '0','0', 'C');
                        $pdf->Cell('50', '10', $PhoneNo, '0','1', 'C');

            }
            $pdf->Output();
            

}
?>