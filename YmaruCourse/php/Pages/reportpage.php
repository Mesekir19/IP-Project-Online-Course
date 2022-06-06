<?php
session_start();
unset($_SESSION['TeacherFromHomePage']);
include '../../config/db_con.php';
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
        <link rel="stylesheet" href="../../css/catalogue.css">
        <link rel="stylesheet" href="../../css/aboutus.css">
        <link rel="shortcut icon" href="../../Logo/logo.jpeg">
        <title>catalogue</title>
</head>
<body a link="#353535">
    <div class="header">
        <div class="nav-logo">
            <a href="../tuteehome.php"><img src="../../Logo/logo.jpeg" width="80px" title="YMARU Home"></a>
        </div>

        <div>
            <button class="mobile-menu-toggle">
                <img src="../../Images/ymaru-menu-icon.svg">
            </button>
        </div>

        <div class="nav-links">
            <ul aria-expanded="false">
                <li>
                    <a href="../tuteehome.php">Home</a>
                </li>
                <li>
                    <a href="about us.php">About Us</a>
                </li>
                <li>
                    <a href="contact.php">Contact</a>
                </li>
                <li>
                    <a href="logout.php">Log out</a>
                </li>
            </ul>
        </div>
    </div>
    <div style="clear: left;"></div>
    <!-- <div class="warrper">
        <form action="search.php" method="post">
            <div class="search">
                <label for="search">Search:</label>
                <div class="search-wrapper">
                    <div class="search-input">
                        <input type="search" list="course" name="course" id="search">
                    </div>
                    <div class="search-icon">
                        <img src="../../Images/search-512x512-433864.png" alt="search icon" width="20" height="20" title="Search"/> -->

                        <!-- <button type="submit">
                            search
                        </button> -->
                    <!-- </div>  -->

              
                <!-- <div class="select">
                <label>Search By</label>
            </div>
            <div class="radioin"><input type="radio" name="select" value="cname" >
                <label>Course name</label>
            
            <input type="radio" name="select" value="pyear">
                <label>Year</label>
            </div> -->
            <!-- </div>
        </form> --> 

        <div style="clear: left;"></div>

        <div class="body">
            <div class="info">
                
                <h1>Find your area of interest with our Category list</h1>
                <p> Are you interested in business? Perhaps you want to study languages? Or maybe you want to undergo personal development to improve your mental and physical health?
                    Whatever you want to achieve, your first stop is to browse the categories below. Then, select the subject that interests you and click to see which free courses you can sign up for. At YMARU, we have many online courses across almost everything from engineering to business, from art to coding.
                </p>
                <h3>Our courses are designed to suit your needs:</h3>
                <p>To get started, create your Alison account, choose your category, choose your subject, select your course and off you go. It couldn&apos;t be easier!</p>
            
            </div>
            
            
         
            <div class="departments-box">
                <?php
                $catagory=array();
                $course_id=array();
                $Cname=array();
                $Maincatagory=array();
                $filtered=array();
                $FinalCatagory=array();
            $sql="SELECT * FROM course ORDER BY catalogue ASC";
            $result=mysqli_query($conn,$sql);
            // $row=mysqli_fetch_assoc($result);
            // $catagory=$row['catagory'];
                    while($row=mysqli_fetch_assoc($result)){
//                         $a=array("a"=>"red","b"=>"green","c"=>"red");
// print_r(array_unique($a));
                        $key=$row['course_id'];
                        $course_id=$row['course_id'];
                        $catalogue=$row['catalogue'];
                        $course=$row['course_name'];
                        
                        
                        $catagory[$key]=$catalogue;
                        $Cname[$key]=$course;
                        $Maincatagory[$catalogue]=$course;

                        // $catagory[$key]=$value;
                        // if ($catagory[$key]==$catagory[$key]){
                        //     $catagory[$key]=array($value);
                        // }
                      
                    }

                    foreach($Maincatagory as $key=>$value){
                        $counter=0;
                        $sql="SELECT * FROM course WHERE catalogue='$key' ORDER BY course_name ASC";
                        $result=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_assoc($result)){
                            $filtered[$counter]=$row['course_name'];
                                        // echo "$filtered[$counter]";
                                        ++$counter;
                        }
                        // echo "<br><br>";
                        $FinalCatagory[$key]=$filtered;
                    }
                        // foreach($catagory as $key1=>$value1){
                        //     $counter=0;
                        //     if($key==$value1){
                        //         foreach($Cname as $key2=>$value2){
                        //             // if($key1==$key2){
                        //                 $filtered[$counter]=$value2;
                        //                 echo "$value2";
                        //                 ++$counter;
                        //             // }

                        //         }
                        //        echo "<br><br>"; 
                        //     }
                        // }
                        
    //                     for($i=0;$i<count($filtered);$i++){
    //     echo "$filtered[$i]";
    // }
                    //     if(null){

                    //     }
                    // // }
                    // $new=count($filtered);
                    // echo "$new";
    //                 foreach($FinalCatagory as $key => $value ){  
    //     $arr = array_keys($value);//this has your (6, 8 or 10)   
    //          print_r($arr); 
    // for($i=0;$i<count($filtered);$i++){
    //     echo "$filtered[$i]";
    // }
        // foreach($filtered as $val){
        //      echo "$filtered[$val]";//showing array data of 6,8,10 indexes
        // }  
    // }
                        
                     foreach($FinalCatagory as $key=>$value){
                         //echo "$filtered";
                       // echo "$key=>$value". PHP_EOL;
                        // print_r("$key=>$value"."<br>");
                     
                    
                    
                        

                
      ?>   
                <div class="department engineering">
                    <div class="department-icon-name">
                        <img src="../../Images/baseline_engineering_black_24dp.png" alt="flat enginnering icon">
                        <a href="engineering.html" id="engineering"><?php echo $key?></h1></h1></a>
                    </div>
                    <div class="fields-link">
                        <ul>
                            <?php for($i=0;$i<count($value); $i++){?>
                                
                                <li>
                                    <!-- <a href="project_description.php?title=' . $row['status_title'] . '"> ' . $row['status_title'] . '</a> -->
                                <!-- <a href="project_description.php?status_title=<?php echo $row['status_title']; ?>"> <?php echo $row['status_title']; ?></a> -->
                                    <a href="enroll.php?clickedcourse=<?php echo $value[$i];?>&clickedcatagory=<?php echo $key;?>" target="_blank"><?php echo $value[$i]?></a>
                            </li>
                            <?php
                            } ?>
                            
                            
                        </ul>
                    </div>
                </div>
                    
                <?php
                 }  
            
                ?>
                <div class="department engineering">
                    <div class="department-icon-name">
                        <img src="../../Images/baseline_engineering_black_24dp.png" alt="flat enginnering icon">
                        <a href="engineering.html" id="engineering"></h1>Trendingcourses</h1></a>
                    </div>
                    <div class="fields-link">
                        <ul>
                            <li>
                                <a href="architecturalengineering.html" target="_blank">PHP</a>
                            </li>
                            <li>
                                <a href="automotiveengineering.html" target="_blank">AI</a>
                            </li>
                            <!-- <li>
                                <a href="civilengineering.html" target="_blank">Civil Engineering</a>
                            </li>
                            <li>
                                <a href="chemicalengineering.html" target="_blank">Chemical Engineering</a>
                            </li> -->
                            <li>
                                <a href="electricalengineering.html" target="_blank">Electrical Engineering</a>
                            </li>
                            <!-- <li>
                                <a href="environmentalengineering.html" target="_blank">Environmental Engineering</a>
                            </li>
                            <li>
                                <a href="industrialengineering.html" target="_blank"> Industrial Engineering</a>
                            </li> -->
                            <li>
                                <a href="mechanicalengineering.html" target="_blank"> Mechanical Engineering</a>
                            </li>
                            <!-- <li>
                                <a href="soundengineering.html" target="_blank"> Sound Engineering</a>
                            </li> -->
                        </ul>
                    </div>
                </div>

                <div class="department business">
                    <div class="department-icon-name">
                        <img src="../../Images/baseline_business_black_24dp.png" alt="flat business icon">
                        <a href="business.html" id="business"></h1>Latest</h1></a>
                    </div>
                    <div class="fields-link">
                        <ul>
                            <li>
                                <a href="business.html" target="_blank">C++</a>
                            </li>
                            <li>
                                <a href="auditing.html" target="_blank"> Electrical Engineering</a>
                            </li>
                            <li>
                                <a href="customerservice.html" target="_blank"> AI</a>
                            </li>
              
            </div>
            <!--End of departments box-->
        </div>
        <!--End of Body-->
    </div>
    <!--wrapper end-->
    <div style="clear: left;"></div>
        <div class="footer">
        <div class="footer-lists">
            <div class="footer-logo-link">
                <div class="ymaru-logo">
                    <a href="../tuteehome.php"><img src="../../Logo/logo.jpeg" width="60" height="60" title="YMARU Home"></a>
                </div>
                <div class="ymaru-text">
                    <p><a href="../tuteehome.php"><span>YMARU</span> Online Course &amp; Tutor</a></p>
                </div>
            </div>
            <div class="social-medias">
                <p>Follow Us On</p>
                <ul>
                    <li><a href="http://facebook.com" target="_blank"> <img src="../../Images/facebook.png">
                            <font face="arial">Facebook</font>
                        </a></li>
                    <li><a href="http://twitter.com" target="_blank"> <img src="../../Images/twitter.png">
                            <font face="arial">Twitter</font>
                        </a></li>
                    <li><a href="http://instagram.com" target="_blank"> <img src="../../Images/instagram-square.jpg">
                            <font face="arial">Instagram</font>
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
    </div>
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