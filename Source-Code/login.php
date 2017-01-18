<?php
session_start();
include 'include/utils.php';
require_once("include/connectDB.php");

$event_login=$_REQUEST['returnto'];

if (!isset($_SESSION['id']) && !isset($_SESSION['email'])) {

?>

<html>
<head>
    <script src="Scripts/jquery.min.js"></script>
    <script src="Scripts/menu.js" async></script>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Styles/login.css">
    <script type="text/javascript" src="Scripts/animatedcollapse.js">
    </script>
    <link rel="stylesheet" href="elusive-icons/css/elusive-icons.min.css">
    <link rel="icon"
          type="image/ico"
          href="pic/favicon.ico">
    <title>Login | FMI Flights - Low cost flight</title>
    <meta charset="utf-8">
    <meta name="keywords">
    <meta name="author" content="Andreas Antone - FMI UNIBUC">
    <meta name="description" content="Companie de transport.">
    <meta name="keywords" content="companie de transport,free,transport,avion,low cost, bilete online">
    <script src="https://www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit" async defer></script>
    <script type="text/javascript">
        var CaptchaCallback = function() {
            grecaptcha.render('RecaptchaRecover', {'sitekey' : '6Le06goUAAAAAEG2zhD2uQg83Q9pbEITTrTXiHyJ'});
            grecaptcha.render('RecaptchaSignup', {'sitekey' : '6LfY-AoUAAAAAPrh6_3wYnUb85bwbeLoFBy94ViO'});
        };
    </script>
</head>
<body>
<header>

    <div class="nav-bar">
        <div class="nav-home"><i class="fa fa-home fa-2x"></i></div>
        <div class="nav-booking"><i class="fa fa-calendar fa-2x"></i></div>
        <div class="nav-account"><i class="fa fa-user fa-2x"></i></div>
        <div class="nav-contact"><i class="fa fa-envelope-o fa-2x"></i></div>
        <div class="nav-logo"><i class="fa fa-plane fa-5x"></i></div>
    </div>
</header>


<div align="center" style="margin-top:5%;">
    <?php
    if ($event_login=="") {
        
        ?>
    &nbsp;&nbsp;
    <img class="login" style="cursor:pointer" src="pic/blank.gif" onclick="javascript:animatedcollapse.toggle('ilogin'); javascript:animatedcollapse.hide('irecover'); javascript:animatedcollapse.hide('isignup');">
    &nbsp;
    <img class="recover" style="cursor:pointer" src="pic/blank.gif" onclick="javascript:animatedcollapse.toggle('irecover');
	 javascript:animatedcollapse.hide('ilogin'); javascript:animatedcollapse.hide('isignup');">
    &nbsp;
    <img class="signup" style="cursor:pointer" src="pic/blank.gif" onclick="javascript:animatedcollapse.toggle('isignup'); javascript:animatedcollapse.hide('ilogin'); javascript:animatedcollapse.hide('irecover');">


    <div id="ilogin" style="display: none; height: auto;" fade="1">
        <table border="0" cellpadding="5" width="800px">
            <tbody>
            <tr>
                <td align="center">
                    <form method="post" action="?returnto=login">
                        <input type="hidden" value="1" name="returnto">
                        <p>Note: You need cookies enabled to log in. <b>6 failed logins in a row will result in banning your ip for 24 hours!</b>
                        </p>
                        <p>
                            <b>You have <font color="green" size="2">6</font> login attempt(s) left in your current session</b>
                        </p>
                        <table border="0" cellpadding="0" align="center">
                            <tbody>
                            <tr>
                                <td class="tboxhead">
                                </td>
                            </tr>
                            <tr>
                                <td class="tboxmidd" align="center">
                                    <pre>E-mail:   <input type="text" size="35px" name="login_email"></pre>
                                </td>
                            </tr>
                            <tr>
                                <td class="tboxmidd" align="center">
                                    <pre>Password: <input type="password" size="35px" name="login_password"></pre>
                                </td>
                            </tr>
                            <tr>
                                <td class="tboxmidd" align="center">
                                    <button class="button" type="submit">
                                        <img class="buttonnext" src="pic/blank.gif">Log in!</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="tboxfoot">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <br>


    <div id="irecover" style="display: none; height: auto;" fade="1">
        <p>Before you can reset your password, you need to type your email address and solve the below captcha</p>
        <br>
        <form method="post" action="?returnto=recover">
            <input type="hidden" value="2" name="returnto">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                    <td class="tboxhead">
                    </td>
                </tr>
                <tr>
                    <td class="tboxmidd" align="center">
                        <pre>E-Mail Address: <input type="text" size="30px" name="recover_email"></pre>
                        <div id="RecaptchaRecover"></div>
                    </td>
                </tr>
                <tr>
                    <td class="tboxmidd" colspan="2" align="center">
                        <button class="button" type="submit">
                            <img class="buttoncateg" src="pic/blank.gif">Recover!
                        </button>
                    </td>
                </tr>
                <tr>
                    <td class="tboxfoot">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>


    <div id="isignup" style="display: none; height: auto;" fade="1">
        <p>Fields marked <span style="color:red">*</span> are required.</p>
        <form method="post" action="?returnto=signup">
            <input type="hidden" value="3" name="returnto">
            <table border="0" cellspacing="0" cellpadding="0" align="center">
                <tbody>
                <tr>
                    <td class="tboxhead">
                    </td>
                </tr>
                <tr>
                    <td class="tboxmidd" align="center">
                        <div style="width:350px;text-align:left;">First Name <input type="text" size="40" name="signup_first_name">&nbsp;<span style="color:red">*</span>
                        </div>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td class="tboxmidd" align="center">
                        <div style="width:350px;text-align:left;">Last Name <input type="text" size="40" name="signup_last_name">&nbsp;<span style="color:red">*</span>
                        </div>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td class="tboxmidd" align="center">
                        <div style="width:350px;text-align:left;">Password 1 <input type="password" size="40" name="signup_password">&nbsp;<span style="color:red">*</span>
                            <br>Eight characters or more, don't use a stupid password</div>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td class="tboxmidd" align="center">
                        <div style="width:350px;text-align:left;">Password 2 <input type="password" size="40" name="signup_password_again">&nbsp;<span style="color:red">*</span>
                            <br>Enter first password again.</div>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td class="tboxmidd" align="center">
                        <div style="width:350px;text-align:left;">Mobile &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40" name="signup_mobile">&nbsp;<span style="color:red">*</span>
                            <br>
                        </div>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td class="tboxmidd" align="center">
                        <div style="width:350px;text-align:left;">Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="40" name="signup_email">&nbsp;<span style="color:red">*</span>
                            <br>
                            The email address must be valid. <br>The email address won't be publicly shown anywhere.
                        </div>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td class="tboxmidd" align="center">
                        <div style="width:350px;text-align:left;">Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="signup_gender" value="Male">Male&nbsp;&nbsp;
                            <input type="radio" name="signup_gender" value="Female">Female&nbsp;
                            <span style="color:red">*</span>
                        </div>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td class="tboxmidd" align="center">
                        <div style="width:350px;text-align:left;">Country&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <select name="signup_country" style="width:200px;">
                                    <option value="" disabled="" selected="">Select a country</option>
                                    <!--v-for-start--><option value="AF">
                                        Afghanistan
                                    </option><option value="AX">
                                        Åland Islands
                                    </option><option value="AL">
                                        Albania
                                    </option><option value="DZ">
                                        Algeria
                                    </option><option value="AS">
                                        American Samoa
                                    </option><option value="AD">
                                        Andorra
                                    </option><option value="AO">
                                        Angola
                                    </option><option value="AI">
                                        Anguilla
                                    </option><option value="AQ">
                                        Antarctica
                                    </option><option value="AG">
                                        Antigua and Barbuda
                                    </option><option value="AR">
                                        Argentina
                                    </option><option value="AM">
                                        Armenia
                                    </option><option value="AW">
                                        Aruba
                                    </option><option value="AU">
                                        Australia
                                    </option><option value="AT">
                                        Austria
                                    </option><option value="AZ">
                                        Azerbaijan
                                    </option><option value="BS">
                                        Bahamas
                                    </option><option value="BH">
                                        Bahrain
                                    </option><option value="BD">
                                        Bangladesh
                                    </option><option value="BB">
                                        Barbados
                                    </option><option value="BY">
                                        Belarus
                                    </option><option value="BE">
                                        Belgium
                                    </option><option value="BZ">
                                        Belize
                                    </option><option value="BJ">
                                        Benin
                                    </option><option value="BM">
                                        Bermuda
                                    </option><option value="BT">
                                        Bhutan
                                    </option><option value="BO">
                                        Bolivia
                                    </option><option value="BA">
                                        Bosnia and Herzegovina
                                    </option><option value="BW">
                                        Botswana
                                    </option><option value="BR">
                                        Brazil
                                    </option><option value="BN">
                                        Brunei
                                    </option><option value="BG">
                                        Bulgaria
                                    </option><option value="BF">
                                        Burkina Faso
                                    </option><option value="BI">
                                        Burundi
                                    </option><option value="KH">
                                        Cambodia
                                    </option><option value="CM">
                                        Cameroon
                                    </option><option value="CA">
                                        Canada
                                    </option><option value="CV">
                                        Cape Verde
                                    </option><option value="KY">
                                        Cayman Islands
                                    </option><option value="CF">
                                        Central African Republic
                                    </option><option value="TD">
                                        Chad
                                    </option><option value="CL">
                                        Chile
                                    </option><option value="CN">
                                        China
                                    </option><option value="CX">
                                        Christmas Island
                                    </option><option value="CC">
                                        Cocos (Keeling) Islands
                                    </option><option value="CO">
                                        Colombia
                                    </option><option value="KM">
                                        Comoros
                                    </option><option value="CG">
                                        Congo
                                    </option><option value="CD">
                                        Congo, Democratic Republic of
                                    </option><option value="CK">
                                        Cook Islands
                                    </option><option value="CR">
                                        Costa Rica
                                    </option><option value="CI">
                                        Côte d´Ivoire
                                    </option><option value="HR">
                                        Croatia
                                    </option><option value="CU">
                                        Cuba
                                    </option><option value="CY">
                                        Cyprus
                                    </option><option value="CZ">
                                        Czech Republic
                                    </option><option value="DK">
                                        Denmark
                                    </option><option value="DJ">
                                        Djibouti
                                    </option><option value="DM">
                                        Dominica
                                    </option><option value="DO">
                                        Dominican Republic
                                    </option><option value="EC">
                                        Ecuador
                                    </option><option value="EG">
                                        Egypt
                                    </option><option value="SV">
                                        El Salvador
                                    </option><option value="GQ">
                                        Equatorial Guinea
                                    </option><option value="ER">
                                        Eritrea
                                    </option><option value="EE">
                                        Estonia
                                    </option><option value="ET">
                                        Ethiopia
                                    </option><option value="FK">
                                        Falkland Islands (Malvinas)
                                    </option><option value="FO">
                                        Faroe Islands
                                    </option><option value="FJ">
                                        Fiji
                                    </option><option value="FI">
                                        Finland
                                    </option><option value="FR">
                                        France
                                    </option><option value="GF">
                                        French Guiana
                                    </option><option value="PF">
                                        French Polynesia
                                    </option><option value="GA">
                                        Gabon
                                    </option><option value="GM">
                                        Gambia
                                    </option><option value="GE">
                                        Georgia
                                    </option><option value="DE">
                                        Germany
                                    </option><option value="GH">
                                        Ghana
                                    </option><option value="GI">
                                        Gibraltar
                                    </option><option value="GR">
                                        Greece
                                    </option><option value="GL">
                                        Greenland
                                    </option><option value="GD">
                                        Grenada
                                    </option><option value="GP">
                                        Guadeloupe
                                    </option><option value="GU">
                                        Guam
                                    </option><option value="GT">
                                        Guatemala
                                    </option><option value="GN">
                                        Guinea
                                    </option><option value="GW">
                                        Guinea-Bissau
                                    </option><option value="GY">
                                        Guyana
                                    </option><option value="HT">
                                        Haiti
                                    </option><option value="HN">
                                        Honduras, Republic of
                                    </option><option value="HK">
                                        Hong Kong
                                    </option><option value="HU">
                                        Hungary
                                    </option><option value="IS">
                                        Iceland
                                    </option><option value="IN">
                                        India
                                    </option><option value="ID">
                                        Indonesia
                                    </option><option value="IR">
                                        Iran
                                    </option><option value="IQ">
                                        Iraq
                                    </option><option value="IE">
                                        Ireland
                                    </option><option value="IL">
                                        Israel
                                    </option><option value="IT">
                                        Italy
                                    </option><option value="JM">
                                        Jamaica
                                    </option><option value="JP">
                                        Japan
                                    </option><option value="JO">
                                        Jordan
                                    </option><option value="KZ">
                                        Kazakhstan
                                    </option><option value="KE">
                                        Kenya
                                    </option><option value="KI">
                                        Kiribati
                                    </option><option value="KP">
                                        Korea, Democratic People\'s Republic of
                                    </option><option value="KR">
                                        Korea, Republic of
                                    </option><option value="XK">
                                        Kosovo
                                    </option><option value="KW">
                                        Kuwait
                                    </option><option value="KG">
                                        Kyrgyzstan
                                    </option><option value="LA">
                                        Lao People\'s Democratic Republic
                                    </option><option value="LV">
                                        Latvia
                                    </option><option value="LB">
                                        Lebanon
                                    </option><option value="LS">
                                        Lesotho
                                    </option><option value="LR">
                                        Liberia
                                    </option><option value="LY">
                                        Libya
                                    </option><option value="LI">
                                        Liechtenstein
                                    </option><option value="LT">
                                        Lithuania
                                    </option><option value="LU">
                                        Luxembourg
                                    </option><option value="MO">
                                        Macao
                                    </option><option value="MK">
                                        Macedonia
                                    </option><option value="MG">
                                        Madagascar
                                    </option><option value="MW">
                                        Malawi
                                    </option><option value="MY">
                                        Malaysia
                                    </option><option value="MV">
                                        Maldives
                                    </option><option value="ML">
                                        Mali
                                    </option><option value="MT">
                                        Malta
                                    </option><option value="MH">
                                        Marshall Islands
                                    </option><option value="MQ">
                                        Martinique
                                    </option><option value="MR">
                                        Mauritania
                                    </option><option value="MU">
                                        Mauritius
                                    </option><option value="YT">
                                        Mayotte
                                    </option><option value="MX">
                                        Mexico
                                    </option><option value="FM">
                                        Micronesia
                                    </option><option value="MD">
                                        Moldova
                                    </option><option value="MC">
                                        Monaco
                                    </option><option value="MN">
                                        Mongolia
                                    </option><option value="ME">
                                        Montenegro
                                    </option><option value="MS">
                                        Montserrat
                                    </option><option value="MA">
                                        Morocco
                                    </option><option value="MZ">
                                        Mozambique
                                    </option><option value="MM">
                                        Myanmar (Burma)
                                    </option><option value="NA">
                                        Namibia
                                    </option><option value="NR">
                                        Nauru
                                    </option><option value="NP">
                                        Nepal
                                    </option><option value="NL">
                                        Netherlands
                                    </option><option value="NC">
                                        New Caledonia
                                    </option><option value="NZ">
                                        New Zealand
                                    </option><option value="NI">
                                        Nicaragua
                                    </option><option value="NE">
                                        Niger
                                    </option><option value="NG">
                                        Nigeria
                                    </option><option value="NU">
                                        Niue
                                    </option><option value="NF">
                                        Norfolk Island
                                    </option><option value="MP">
                                        Northern Mariana Islands
                                    </option><option value="NO">
                                        Norway
                                    </option><option value="OM">
                                        Oman
                                    </option><option value="PK">
                                        Pakistan
                                    </option><option value="PW">
                                        Palau
                                    </option><option value="PS">
                                        Palestinian Territory, Occupied
                                    </option><option value="PA">
                                        Panama
                                    </option><option value="PG">
                                        Papua New Guinea
                                    </option><option value="PY">
                                        Paraguay
                                    </option><option value="PE">
                                        Peru
                                    </option><option value="PH">
                                        Philippines
                                    </option><option value="PL">
                                        Poland
                                    </option><option value="PT">
                                        Portugal
                                    </option><option value="PR">
                                        Puerto Rico
                                    </option><option value="QA">
                                        Qatar
                                    </option><option value="RE">
                                        Réunion
                                    </option><option value="RO">
                                        Romania
                                    </option><option value="RU">
                                        Russia
                                    </option><option value="RW">
                                        Rwanda
                                    </option><option value="BL">
                                        Saint Barthelemy
                                    </option><option value="SH">
                                        Saint Helena, Ascension and Tristan da Cunha
                                    </option><option value="KN">
                                        Saint Kitts and Nevis
                                    </option><option value="LC">
                                        Saint Lucia
                                    </option><option value="MF">
                                        Saint Martin
                                    </option><option value="PM">
                                        Saint Pierre and Miquelon
                                    </option><option value="VC">
                                        Saint Vincent and Grenadines
                                    </option><option value="WS">
                                        Samoa
                                    </option><option value="SM">
                                        San Marino
                                    </option><option value="ST">
                                        Sao Tome and Principe
                                    </option><option value="SA">
                                        Saudi Arabia
                                    </option><option value="SN">
                                        Senegal
                                    </option><option value="RS">
                                        Serbia
                                    </option><option value="SC">
                                        Seychelles
                                    </option><option value="SL">
                                        Sierra Leone
                                    </option><option value="SG">
                                        Singapore
                                    </option><option value="SK">
                                        Slovakia
                                    </option><option value="SI">
                                        Slovenia
                                    </option><option value="SB">
                                        Solomon Islands
                                    </option><option value="SO">
                                        Somalia
                                    </option><option value="ZA">
                                        South Africa
                                    </option><option value="ES">
                                        Spain
                                    </option><option value="LK">
                                        Sri Lanka
                                    </option><option value="SD">
                                        Sudan
                                    </option><option value="SR">
                                        Suriname
                                    </option><option value="SJ">
                                        Svalbard and Jan Mayen
                                    </option><option value="SZ">
                                        Swaziland
                                    </option><option value="SE">
                                        Sweden
                                    </option><option value="CH">
                                        Switzerland
                                    </option><option value="SY">
                                        Syria
                                    </option><option value="TW">
                                        Taiwan
                                    </option><option value="TJ">
                                        Tajikistan
                                    </option><option value="TZ">
                                        Tanzania
                                    </option><option value="TH">
                                        Thailand
                                    </option><option value="TL">
                                        Timor-Leste
                                    </option><option value="TG">
                                        Togo
                                    </option><option value="TO">
                                        Tonga
                                    </option><option value="TT">
                                        Trinidad and Tobago
                                    </option><option value="TN">
                                        Tunisia
                                    </option><option value="TR">
                                        Turkey
                                    </option><option value="TM">
                                        Turkmenistan
                                    </option><option value="TC">
                                        Turks and Caicos Islands
                                    </option><option value="TV">
                                        Tuvalu
                                    </option><option value="UG">
                                        Uganda
                                    </option><option value="UA">
                                        Ukraine
                                    </option><option value="AE">
                                        United Arab Emirates
                                    </option><option value="GB">
                                        United Kingdom
                                    </option><option value="US">
                                        United States
                                    </option><option value="UM">
                                        United States Minor Outlying Islands
                                    </option><option value="UY">
                                        Uruguay
                                    </option><option value="UZ">
                                        Uzbekistan
                                    </option><option value="VU">
                                        Vanuatu
                                    </option><option value="VA">
                                        Vatican City State
                                    </option><option value="VE">
                                        Venezuela
                                    </option><option value="VN">
                                        Vietnam
                                    </option><option value="VG">
                                        Virgin Islands, British
                                    </option><option value="VI">
                                        Virgin Islands, U.S.
                                    </option><option value="WF">
                                        Wallis and Futuna
                                    </option><option value="YE">
                                        Yemen
                                    </option><option value="ZM">
                                        Zambia
                                    </option><option value="ZW">
                                        Zimbabwe
                                    </option><!--v-for-end-->
                            </select>&nbsp;<span style="color:red">*</span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="tboxmidd" align="center">
                        <div style="width:350px;text-align:left;">Secret question &nbsp;<select style="width:200px;" name="signup_secret_question">
                                <option value="1">Mother's birthplace</option>
                                <option value="2">Best childhood friend</option>
                                <option value="3">Name of first pet</option>
                                <option value="4">Favorite teacher</option>
                                <option value="5">Favorite historical person</option>
                                <option value="6">Grandfather's occupation</option>
                                <option value="7">Mother's occupation</option>
                                <option value="8">Father's occupation</option>
                                <option value="9">Your pet name</option>
                            </select>&nbsp;<span style="color:red">*</span>
                        </div>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td class="tboxmidd" align="center">
                        <div style="width:350px;text-align:left;">Secret response <input type="text" size="36" name="signup_secret_response">&nbsp;<span style="color:red">*</span>
                        </div>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td class="tboxmidd" align="center">
                        <div id="RecaptchaSignup"></div>
                    </td>
                </tr>
                <tr>
                    <td class="tboxmidd" align="center">
                        <div style="width:300px;text-align:left; padding-left:100px;">
                            <input type="checkbox" name="signup_privacyverify" value="yes"> Accept the <b><a href="http://localhost/proiectPHP/privacy.php">privacy policy</a></b>.
                            <br>
                            <input type="checkbox" name="signup_ageverify" value="yes"> I am at least <b>18</b> years old.</div>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td class="tboxmidd" align="center">
                        <button class="button" type="submit">
                            <img class="buttonnext" src="pic/blank.gif">Signup</button>
                    </td>
                </tr>
                <tr>
                    <td class="tboxfoot">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>Note: You need <b>cookies enabled</b> to sign up or log in.<br>Note2: If you intend to use a proxy then your registration will stop.</div>

    <?php
    } else {
        switch ($event_login) {
            case 1:
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (empty($_POST['login_email']) || empty($_POST['login_password'])) {
                        ?>
                        <div class="pane-header" align="center"></div>
                        <div class="pane-middle" align="center">
                            <img class="error" src="pic/blank.gif">
                            <h2 style="font-size: 10pt;">Error</h2>Missing informations.<br>
                        </div>
                        <div class="pane-footer" align="center"></div>
                        <?php
                    } else if (!isValidEmail($_POST['login_email'])) {
                        ?>
                        <div class="pane-header" align="center"></div>
                        <div class="pane-middle" align="center">
                            <img class="warn" src="pic/blank.gif">
                            <h2 style="font-size: 10pt;">Error</h2>Your email address is invalid.<br>
                        </div>
                        <div class="pane-footer" align="center"></div>
                        <?php
                    } else {
                        $log_email = mysqli_real_escape_string($db, $_POST['login_email']);
                        $log_password = mysqli_real_escape_string($db, $_POST['login_password']);

                        $sql = "SELECT id,type FROM users WHERE email = '$log_email' and password = md5('$log_password')";
                        $result = mysqli_query($db, $sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $active = $row['active'];
                        $count = mysqli_num_rows($result);

                        if ($count == 1) {
                            $_SESSION['id'] = $row['id'];
                            $_SESSION['type'] = $row['type'];
                            $_SESSION['email'] = $log_email;
                            header("Location: http://localhost/proiectPHP/dashboard.php");
                        } else {
                            ?>
                            <div class="pane-header" align="center"></div>
                            <div class="pane-middle" align="center">
                                <img class="error" src="pic/blank.gif">
                                <h2 style="font-size: 10pt;">Error</h2>Email or password is incorrect.<br>
                            </div>
                            <div class="pane-footer" align="center"></div>
                            <?php
                        }
                    }
                }
                break;
            case 2:
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (empty($_POST['recover_email'])) {
                        ?>
                        <div class="pane-header" align="center"></div>
                        <div class="pane-middle" align="center">
                            <img class="error" src="pic/blank.gif">
                            <h2 style="font-size: 10pt;">Error</h2>Missing informations.<br>
                        </div>
                        <div class="pane-footer" align="center"></div>
                        <?php
                    } else if (!isValidEmail($_POST['recover_email'])) {
                        ?>
                        <div class="pane-header" align="center"></div>
                        <div class="pane-middle" align="center">
                            <img class="warn" src="pic/blank.gif">
                            <h2 style="font-size: 10pt;">Error</h2>Your email address is invalid.<br>
                        </div>
                        <div class="pane-footer" align="center"></div>
                        <?php
                    } else if(!$_POST['g-recaptcha-response']) {
                        ?>
                        <div class="pane-header" align="center"></div>
                        <div class="pane-middle" align="center">
                            <img class="warn" src="pic/blank.gif">
                            <h2 style="font-size: 10pt;">Error</h2>Please check the the captcha form.<br>
                        </div>
                        <div class="pane-footer" align="center"></div>
                        <?php
                    } else {
                        $mail=$_POST['recover_email'];
                        $rec_email = mysqli_real_escape_string($db, $mail);
                        $sql = "SELECT id,secret FROM users WHERE email = '$rec_email'";
                        $result = mysqli_query($db, $sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $active = $row['active'];
                        $count = mysqli_num_rows($result);

                        if ($count == 1) {
                            $ip = get_ip();
                            $id = $row['id'];
                            $secret = $row['secret'];
                            send_mail($mail, $mail, "Recover password",
                                "Someone, hopefully you, requested that the password for the account associated with this email address ($mail) be reset.
                                <br><br>The request originated from IP: $ip.<br><br>If you did not do this ignore this email. Please do not reply.<br><br><br>
                                Should you wish to confirm this request, please follow this link:<br><br>
                                http://localhost/proiectPHP/reset.php?id=$id&secret=$secret<br><br><br>Regards,<br>FMI Flights");
                            ?>
                            <div class="pane-header" align="center"></div>
                            <div class="pane-middle" align="center">
                                <img class="success" src="pic/blank.gif">
                                <h2 style="font-size: 10pt;">Success</h2>A confirmation email has been mailed.<br>Please allow a few minutes for the mail to arrive.<br>
                            </div>
                            <div class="pane-footer" align="center"></div>
                            <?php
                        } else {
                            ?>
                            <div class="pane-header" align="center"></div>
                            <div class="pane-middle" align="center">
                                <img class="error" src="pic/blank.gif">
                                <h2 style="font-size: 10pt;">Error</h2>The email address was not found in the database.<br>
                            </div>
                            <div class="pane-footer" align="center"></div>
                            <?php
                        }
                    }
                }
                break;
            case 3:
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (empty($_POST['signup_first_name']) || empty($_POST['signup_last_name']) || empty($_POST['signup_password']) ||
                        empty($_POST['signup_password_again']) || empty($_POST['signup_mobile']) || empty($_POST['signup_email']) ||
                        empty($_POST['signup_secret_response']) || empty($_POST['signup_country']) || empty($_POST['signup_ageverify']) ||
                        empty($_POST['signup_privacyverify']) || empty($_POST['signup_gender'])) {
                        ?>
                        <div class="pane-header" align="center"></div>
                        <div class="pane-middle" align="center">
                            <img class="error" src="pic/blank.gif">
                            <h2 style="font-size: 10pt;">Error</h2>Missing informations.<br>
                        </div>
                        <div class="pane-footer" align="center"></div>
                        <?php
                    } else if($_POST['signup_password'] != $_POST['signup_password_again']) {
                        ?>
                        <div class="pane-header" align="center"></div>
                        <div class="pane-middle" align="center">
                            <img class="warn" src="pic/blank.gif">
                            <h2 style="font-size: 10pt;">Error</h2>Password does not match the confirm password.<br>
                        </div>
                        <div class="pane-footer" align="center"></div>
                        <?php
                    } else if (!isValidEmail($_POST['signup_email'])) {
                        ?>
                        <div class="pane-header" align="center"></div>
                        <div class="pane-middle" align="center">
                            <img class="warn" src="pic/blank.gif">
                            <h2 style="font-size: 10pt;">Error</h2>Your email address is invalid.<br>
                        </div>
                        <div class="pane-footer" align="center"></div>
                        <?php
                    } else if(!$_POST['g-recaptcha-response']) {
                        ?>
                        <div class="pane-header" align="center"></div>
                        <div class="pane-middle" align="center">
                            <img class="warn" src="pic/blank.gif">
                            <h2 style="font-size: 10pt;">Error</h2>Please check the the captcha form.<br>
                        </div>
                        <div class="pane-footer" align="center"></div>
                        <?php
                    } else {
                        $sign_email = mysqli_real_escape_string($db, $_POST['signup_email']);

                        $sql = "SELECT id FROM users WHERE email = '$sign_email'";
                        $result = mysqli_query($db, $sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $active = $row['active'];
                        $count = mysqli_num_rows($result);

                        if ($count > 0) {
                            ?>
                            <div class="pane-header" align="center"></div>
                            <div class="pane-middle" align="center">
                                <img class="error" src="pic/blank.gif">
                                <h2 style="font-size: 10pt;">Error</h2>The email address already exists in database.<br>
                            </div>
                            <div class="pane-footer" align="center"></div>
                            <?php
                        } else {
                            // variables for insert
                            $var_secret=make_hash();
                            $var_email=mysqli_real_escape_string($db, $_POST['signup_email']);
                            $var_password=md5(mysqli_real_escape_string($db, $_POST['signup_password']));
                            $var_first_name=mysqli_real_escape_string($db, $_POST['signup_first_name']);
                            $var_last_name=mysqli_real_escape_string($db, $_POST['signup_last_name']);
                            $var_gender=mysqli_real_escape_string($db, $_POST['signup_gender']);
                            $var_country=mysqli_real_escape_string($db, $_POST['signup_country']);
                            $var_mobile=mysqli_real_escape_string($db, $_POST['signup_mobile']);
                            $var_secret_question=mysqli_real_escape_string($db, $_POST['signup_secret_question']);
                            $var_secret_response=mysqli_real_escape_string($db, $_POST['signup_secret_response']);

                            //insert in database new user

                            $sql = "SELECT id FROM users";
                            mysqli_query($db, $sql);
                            if (mysqli_affected_rows($db) == 0) {
                            $sql = "INSERT INTO users (secret, email, password, first_name, last_name, type, gender, country, mobile, secret_question,
                                    secret_response) VALUES ('$var_secret', '$var_email', '$var_password', '$var_first_name', '$var_last_name', 'admin',
                                     '$var_gender', '$var_country', '$var_mobile', '$var_secret_question', '$var_secret_response')";
                            mysqli_query($db, $sql);
                            $sql = mysqli_affected_rows($db);
                            } else {
                            $sql = "INSERT INTO users (secret, email, password, first_name, last_name, gender, country, mobile, secret_question,
                                    secret_response) VALUES ('$var_secret', '$var_email', '$var_password', '$var_first_name', '$var_last_name',
                                     '$var_gender', '$var_country', '$var_mobile', '$var_secret_question', '$var_secret_response')";
                            mysqli_query($db, $sql);
                        	}
                            ?>
                            <div class="pane-header" align="center"></div>
                            <div class="pane-middle" align="center">
                                <img class="success" src="pic/blank.gif">
                                <h2 style="font-size: 10pt;">Success</h2>Your account has created.<br>
                            </div>
                            <div class="pane-footer" align="center"></div>
                            <?php
                        }
                    }
                }
                break;
            default:
                ob_start();
                $url = 'http://localhost/proiectPHP/';
                while (ob_get_status())
                {
                    ob_end_clean();
                }
                header( "Location: $url" );
        }
    }
    ?>
    <br>
    <br>



    <br>
    <br>
</div>

</body>
</html>
    <?php
} else {
    header("Location: http://localhost/proiectPHP/dashboard.php");
}