<?php
session_start();
include '../../config/db_con.php';
$UserN=$_SESSION['User_Name'];
// header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
// header('Cache-Control: no-cache, must-revalidate, max-age=0');
// header('Cache-Control: post-check=0, pre-check=0',false);
// header('Pragma: no-cache');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta name="author" content="Mesekir">
    <meta name="title" content="YMARU online course and tutor">
    <meta name="description" content="YMARU is an Ethiopian online learning platform aimed at providing education with excellence.">
    <mata name="keywords" content="YMARU online education distance learning ethiopian study home">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/catalogue.css">
    <link rel="stylesheet" href="../../css/aboutus.css">
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../css/fontawesome.min.css">
    <link rel="shortcut icon" href="../../Logo/logo.jpeg">

   <title>Sign up YMARU</title> 
</head>
<body>
        <!-- start header-->
<div class="header">
    <div class="logo">
        <a href="../tuteehome.php"><img src="../../Logo/logo.jpeg" width="60px"></a>
    </div>

    <div class="menu-icon-div">
        <button class="mobile-menu-toggle">
            <img src="../../Images/ymaru-menu-icon.svg" width="40">
        </button>
    </div>

    <div class="nav-links">
        <ul aria-expanded="false">
            <li>
                <a href="../tuteehome.php">Home</a>
            </li>
            <li>
                <a href="tuteeProfile.php">BackToProfile</a>
            </li>
            <li>
                <a href="reportpage.php">Catalogue</a>
            </li>
            <li>
                <a href="contact.php">Contact Us</a>
            </li>
            <li>
                <a href="logout.php">Log out</a>
            </li>
        </ul>
    </div>
</div>
<!--end header-->

<div style="clear: left;"></div>
          
<div class="form-wrapper">
<div class="fill">
        <h1>updating form

                <!-- -->
        </h1>	
<form id="form" name="myform" method="POST" action="update2.php">
        
        
        <div class="form-control">
                <label>Full Name</label>
                <input type="text" placeholder="Abel" name="fullname" id="firstname">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small> Error message</small>
        </div>
        <div class="form-control">
                <label>Email</label>
                <input type="email" placeholder="abel@gmail.com" name="email" id="email">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small> Error message</small>
        </div>
        <div class="form-control">
                <label>username</label>
                <input type="text" placeholder="Abel231" name="username" id="username">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small> Error message</small>
        </div>
        

        <div class="form-control">
                <label>Country</label>
                <select id="country" name="country" class="form-control">
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="Åland Islands">Åland Islands</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antarctica">Antarctica</option>
                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Bouvet Island">Bouvet Island</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Christmas Island">Christmas Island</option>
                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="French Guiana">French Guiana</option>
                        <option value="French Polynesia">French Polynesia</option>
                        <option value="French Southern Territories">French Southern Territories</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guernsey">Guernsey</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guinea-bissau">Guinea-bissau</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Isle of Man">Isle of Man</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jersey">Jersey</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                        <option value="Korea, Republic of">Korea, Republic of</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macao">Macao</option>
                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of
                        </option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montenegro">Montenegro</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Namibia">Namibia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                        <option value="New Caledonia">New Caledonia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk Island">Norfolk Island</option>
                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau">Palau</option>
                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Pitcairn">Pitcairn</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Reunion">Reunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Russian Federation">Russian Federation</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Saint Helena">Saint Helena</option>
                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                        <option value="Saint Lucia">Saint Lucia</option>
                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                        <option value="Samoa">Samoa</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Serbia">Serbia</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich
                                Islands
                        </option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Timor-leste">Timor-leste</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Viet Nam">Viet Nam</option>
                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                        <option value="Western Sahara">Western Sahara</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                </select>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small> Error message</small>
        </div>

        
        <div class="form-control">
                <label>Phone</label>
                <input type="telephone" placeholder="0910254725" name="phone" id="phone">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small> Error message</small>
        </div>
        
        
        <input type="submit" value="submit" name="submit">
        
                                        
</form>	

</div>
</div><!--End of form wrapper-->     	   
 
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
<script src="../JS/signup.js"></script>
  <script>
    /*Mobile nav menu toggle*/
    const mobileMenu = document.querySelector('[aria-expanded]');
    const navToggle = document.querySelector('.mobile-menu-toggle');
    navToggle.addEventListener("click", function(){
        const isOpened = mobileMenu.getAttribute("aria-expanded");
        if(isOpened === "false"){
            mobileMenu.setAttribute('aria-expanded', true);
        } 
        else if(isOpened === "true"){
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
                .form-wrapper{
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
        input[type="submit"] {
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
            
            input[type="submit"]:hover {
            
                    border-color: #2b6777;
                    transition: .5s;
                }
</style>

</body>
</html>


        	
        










