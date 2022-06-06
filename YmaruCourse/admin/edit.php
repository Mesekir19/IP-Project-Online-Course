<?php
session_start();
include '../config/db_con.php';
// error_reporting(E_ALL ^ E_NOTICE);
header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
header('Cache-Control: no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0',false);
header('Pragma: no-cache');

if(isset($_SESSION['User_Name'])){
    header("location: ../../index.php");
    die();
}
elseif(!isset($_SESSION['Admin_User_Name'])){
    header("location: ../../index.php");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="author" content="Mesekir">
    <meta name="title" content="YMARU online course and tutor">
    <meta name="description"
        content="YMARU is an Ethiopian online learning platform aimed at providing education with excellence.">
    <mata name="keywords" content="YMARU online education distance learning ethiopian study home">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/catalogue.css">
        
        <link rel="shortcut icon" href="../Logo/logo.jpeg">
        <title>catalogue</title>
</head>

<body a link="#353535">
    <div class="header">

        <div class="nav-logo">
            <a href="edit.php"><img src="../Logo/logo.jpeg" width="80px" title="YMARU Home"></a>
        </div>

        <div>
            <button class="mobile-menu-toggle">
                <img src="../Images/ymaru-menu-icon.svg">
            </button>
        </div>

        <div class="nav-links">
            <ul aria-expanded="false">
                <li>
                    <a href="adminReport.php">Report</a>
                </li>
                <!-- <li>
                    <a href="about us.html">About us</a>
                </li> -->
                <li>
                    <a href="../php/Pages/logout.php">Logout</a>
                </li>
                <!-- <li>
                    <a href="login1.html">Login</a>
                </li> -->
            </ul>
        </div>
    </div>
    <div style="clear: left;"></div>
    <div class="warrper">
        <h1>Search people</h1>
        <form action="edit.php" method="post">
            <label for="search">Search:</label>
            <div class="search-wrapper">
                <div class="search-input">
                    <input type="search" list="course" name="course" id="search">
                </div>
                <div class="radio">
                <input type="radio" name="order" id="ascending" value="ascending" checked="checked">
                <label>ascending</label>
                <input type="radio" name="order" id="descending" value="descending">
                <label>descending</label>
                </div> 
                <div class="search-icon">
                    <!-- <img src="../../Images/search-512x512-433864.png" alt="search icon" width="20" height="20" title="Search"/> -->
                
                <button type="submit">
                    search
                </button>
                </div>
                
            </div>
            
            <table border="1" class="table" background="black">
                    <tr>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Country</th>
                        
                    </tr>
                    <tr>
            
            
                        <!-- // $Username=$row['username'];
                        // $FULLname=$row['fullname'];
                        // $EMAIL=$row['email'];
                        // $PWD=$row['password'];
                        // $PhoneNo=$row['phone'];
                        // $Country=$row['country'];

          // header("Location:catalogue1.php?coursee=.'$course' && publishh=.'$publish'"); -->
   

            
            
                    <?php
                if(isset($_POST['course'])){
                $course=$_POST['course'];
                setcookie("userinput",$course,time() + 84000);
                if($_POST['order']=="ascending"){
                    $order="ASC";
                }
                elseif($_POST['order']=="descending"){
                    $order="DESC";
                }
                
                $sql="SELECT * FROM personaldb WHERE username='$course' or fullname='$course' or country='$course' or email='$course' ORDER BY fullname $order";
                $result = mysqli_query($conn, $sql);
                $everyRow= array();
    if(mysqli_num_rows($result) >0){
        //  $number=0;
           
                    while($row=mysqli_fetch_assoc($result)){

                    $Username=$row['username'];
                        $FULLname=$row['fullname'];
                        $EMAIL=$row['email'];
                       // $PWD=$row['password'];
                        $PhoneNo=$row['phone'];
                        $Country=$row['country'];
                        
                        $everyRow[]=$row;

                ?>
                        <td value="<?php echo $Username; ?>"><?php echo $Username; ?></td>
                        <td value="<?php echo $Username; ?>"><?php echo $FULLname; ?></td>
                        <td value="<?php echo $Username; ?>"><?php echo $EMAIL; ?></td>
                        <td value="<?php echo $Username; ?>"><?php echo $PhoneNo; ?></td>
                        <td value="<?php echo $Username; ?>"><?php echo $Country; ?></td>
                        
                        
                        
                        <?php 
                        // $updatereference=$number;
                        // setcookie("updatename",$updatereference,time() + 84000);
                        ?>
                        
                 
                        
                        
                    </tr>
                    <?php
                    // $number++;    
                    }
                         }
    else {
        echo "no search results found in the database";
    }
            }
                        ?>
                        
                </table>
                <?php 
                
                
                ?>
            </form>
            <form action="excel.php" method="post">
                <button type="submit1" name="ToExcel">
                Generate Excel
                </button>
                <!-- <input type="submit" name="ToExcel" value="Generate Excel"> -->
            </form>
            <form action="pdf.php" method="post">
                <div class="pdf">
                    <button type="submit" name="ToPDF">
                Generate PDF
                </button>
                    <!-- <input type="submit" name="ToPDF" value="Generate PDF"> -->
                </div>
                
                
            </form>
            <form action="csvfil.php" method="post">
                <div class="csv"><label for="select2">Select Table</label>
                    <select name="select2" id="select2">
                        <option value="course">course</option>
                        <option value="material">material</option>
                        <option value="personaldb">presonaldb</option>
                        <option value="student">student</option>
                        <option value="teacher">teacher</option>
                        <option value="video">video</option>
                    </select>
                    <button type="submit" name="CSVexport">
                Generate CSV
                </button>
                    <!-- <input type="submit" name="ToPDF" value="Generate PDF"> -->
                </div>
                
                
            </form>




            
<br><br><br><br>
<h2>Import Generated files to the database</h2><br>
        <form action="csvfil.php" method="post" enctype="multipart/form-data">
                <div class="Icsv">
                    <label for="select">Select the Table that the file will be uploaded to:</label>
                    <select name="select" id="select">
                        <option value="course">course</option>
                        <option value="material">material</option>
                        <option value="personaldb">presonaldb</option>
                        <option value="student">student</option>
                        <option value="teacher">teacher</option>
                        <option value="video">video</option>
                    </select><br>
                    <input type="file" accept=".csv" name="file"/>
                    <button type="submit" name="Import">
                Import
                </button>
                    <!-- <input type="submit" name="Import" value="Generate CSV"> -->
                </div>
                
                
            </form>

            <?php
            // if(isset($_POST['Import'])){
                

            // }
            
            ?>
<br>

                
            </div>
            
            <!--End of departments box-->
        </div>
        <!--End of Body-->
    </div>
    <!--wrapper end-->
    <div style="clear: left;"></div>
    <!-- <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br> -->
    <br>
    <!-- <div class="footer">
        <div class="footer-lists">
            <div class="footer-logo-link">
                <div class="ymaru-logo">
                    <a href="../ymaru_home.html"><img src="../Logo/logo.jpeg" width="60" height="60"
                            title="YMARU Home"></a>
                </div>
                <div class="ymaru-text">
                    <p><a href="../ymaru_home.html"><span>YMARU</span> Online Course &amp; Tutor</a></p>
                </div>
            </div>
            <div class="social-medias">
                <p>Follow Us On</p>
                <ul>
                    <li><a href="http://facebook.com" target="_blank"> <img src="../Images/facebook.png">
                            <font face="arial">Facebook</font>
                        </a></li>
                    <li><a href="http://twitter.com" target="_blank"> <img src="../Images/twitter.png">
                            <font face="arial">Twitter</font>
                        </a></li>
                    <li><a href="http://instagram.com" target="_blank"> <img src="../Images/instagram-square.jpg">
                            <font face="arial">Instagram</font>
                        </a></li>
                    <li><a href="http://youtube.com" target="_blank"> <img src="../Images/youtube.png">
                            <font face="arial">Youtube</font>
                        </a></li>
                </ul>
            </div>
            <div class="contacts">
                <p>Get in Touch</p>
                <ul>
                    <li>Phone: +251 9123 456 789</li>
                    <li>Fax: ....</li>
                    <li>Email: <a href="mailto:mesekirgetch@gmail.com">ymaru@edu.com</a></li>
                </ul>
            </div>
            <div class="news-letter">
                <p>Subscribe to our news letter</p>
                <div class="email-input">
                    <input type="text" name="newsletter" placeholder="Your email">
                    <input type="submit" value="Send">
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="privterm">
                <a href="privacy.html">
                    <font face="arial">Privacy</font>
                </a>
                <a href="terms.html">
                    <font face="arial">Terms of Use</font>
                </a>
            </div>
            <div class="copyright">
                <p>Copyright &copy; YMARU 2022, All Rights Reserved</p>
            </div>
        </div>
    </div> -->
    <script>
        const mobileMenu = document.querySelector('[aria-expanded]');
        const navToggle = document.querySelector('.mobile-menu-toggle');
        navToggle.addEventListener("click", function () {
            const isOpened = mobileMenu.getAttribute("aria-expanded");
            if (isOpened === "false") {
                mobileMenu.setAttribute('aria-expanded', true);
            }
            else if (isOpened === "true") {
                mobileMenu.setAttribute('aria-expanded', false);
            }
        })
    </script>
<style>
            body{
        font-family: sans-serif;
        width: 100%;
        height: 100%;
        color: #fff;
        background: linear-gradient(-45deg, #52ab98, #52ab98 , #52ab98, #52ab98 );
        background-size:400% 400%;
        position: relative;
        animation: change 10s ease-in-out infinite;
    }
    .header{
        width: 100%;
        padding: 1% 1.5%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: linear-gradient(-45deg, #082032, #2b6777 , #2b6777, #2b6777 );
        background-size:100% 100%;
        position: relative;
        animation: change 10s ease-in-out infinite;
        position: sticky;
        top: 0;
        z-index: 1;
    } 
    
        .fill {
            background-color: #c8d8e4;
            border-bottom: 1px solid #f0f0f0;
            padding: 20px 40px;
    
    
        }
    
        form button {
            width: 100%;
            height: 50px;
            border: 1px solid;
            background: #2b6777;
            border-radius: 25px;
            font-size: 18px;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;
        }
    
        form button:hover {
            border-color: #2b6777;
            transition: .5s;
        }
    
        .form-control input {
            border: 2px solid #f0f0f0;
            border-radius: 4px;
            background: #c8d8e4;
            display: block;
            font-family: inherit;
            font-size: 14px;
            padding: 10px;
            width: 100%;
    
        }
    
        .form-control select {
            border: 2px solid #f0f0f0;
            border-radius: 4px;
            background: #c8d8e4;
            display: block;
            font-family: inherit;
            font-size: 14px;
            padding: 10px;
            width: 100%;
    
        }
        .Icsv select {
            border: 2px solid #f0f0f0;
            border-radius: 4px;
            background: #c8d8e4;
            display: block;
            font-family: inherit;
            font-size: 14px;
            padding: 10px;
            width: 50%;
            margin-left:25%
    
        }
        .Icsv input {
            border: 2px solid #f0f0f0;
            border-radius: 4px;
            background: #c8d8e4;
            display: block;
            font-family: inherit;
            font-size: 14px;
            padding: 10px;
            width: 50%;
            margin-left:25%
    
        }
        .csv select {
            border: 2px solid #f0f0f0;
            border-radius: 4px;
            background: #c8d8e4;
            display: block;
            font-family: inherit;
            font-size: 14px;
            padding: 10px;
            width: 50%;
            margin-left:25%
    
        }
    
        nav ul {
            background: linear-gradient(-45deg, #082032, #2b6777, #2b6777, #2b6777);
            background-size: 100% 100%;
            position: relative;
            animation: change 10s ease-in-out infinite;
            width: 100%;
            margin-top: 10px;
            display: flex;
            list-style: none;
            vertical-align: middle;
        }
    
        nav ul li a {
            line-height: 80px;
            padding: 12px 30px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            text-transform: uppercase;
            color: #fff;
        }
    
        nav ul li a:hover {
            background: rgba(0, 0, 0, .7);
            border-radius: 6px;
        }
    
        nav.sticky {
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(-45deg, #082032, #2b6777, #2b6777, #2b6777);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
    
        .body {
            margin-bottom: 30px;
        }
    
        .title {
            text-align: center;
            width: 100%;
            margin-bottom: 50px;
        }
    
        .title h1 {
            font-size: 2.5em;
            color: transparent;
            background-image: linear-gradient(-45deg, #47131c, #162e2e);
            background-clip: text;
            -webkit-background-clip: text;
            z-index: -1;
        }
    
        button[type="submit"] {
            width: 100%;
            height: 50px;
            border: 1px solid;
            background: #2b6777;
            border-radius: 25px;
            font-size: 18px;
            color: #e9f4fb;
            font-weight: 700;
            cursor: pointer;
            outline: none;
        }
    
        button[type="submit"]:hover {
    
            border-color: #2b6777;
            transition: .5s;
        }
        @media screen and (max-width: 900px){
    .warrper{
        margin-left: 6%;
        margin-right: 6%;
    }
    .office-locations .office .office-image img{
        height: 450px;
    }
    .fill{
        width: 70%;
    }
    .form-wrapper{
        width: 70%;
    }
    }
    @media screen and (max-width: 700px){
    .header{
        padding-inline-start: 2%;
        padding-inline-end: 3%;
    }
    .header .nav-logo img{
        width: 60px;
    }
    .mobile-menu-toggle{
        display: block;
    }
    .header .nav-links{
        position: absolute;
    }
    .header .nav-links ul{
        position: fixed;
        flex-direction: column;
        align-items: flex-start;
        background: linear-gradient(-45deg, #082032, #2b6777, #2b6777, #2b6777 );
        background-size:100% 100%;
        right: 0;
        top: 80px;
        height: calc(100vh - 80px);
        width: 300px;
        margin-right: -300px;
        padding-top: 2rem;
        opacity: .5;
        transition: all 600ms;
    }
    .nav-links ul li{
        width: 100%;
    }
    .nav-links ul li a{
        line-height: 40px;
        float: left;
    }
    .nav-links ul li:hover{
        background-color: rgba(255,255,255,.3);
    }
    .nav-links ul li a:hover{
        background-color: transparent;
        color: #c9c1c1;
    }
    .nav-links ul[aria-expanded="true"]{
        opacity: 1;
        margin-right: 0;
    }
    .warrper{
        margin-left: 4%;
        margin-right: 4%;
    }
    .office-locations .office .office-image img{
        height: 360px;
    }
    .fill{
        width: 55%;
    }
    .form-wrapper{
        width: 55%;
    }
    }
</style>


</body>

</html>