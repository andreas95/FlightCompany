<?php
session_start();
include 'include/utils.php';
require_once("include/connectDB.php");

$event_dashboard=$_REQUEST['returnto'];
$sesion_id = $_SESSION['id'];

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    ?>

    <html>
    <head>
        <link rel="stylesheet" href="Styles/dashboard.css">
        <link rel="stylesheet" href="http://localhost/proiectPHP/css/style-flat.css"/>
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <script src="Scripts/jquery.min.js"></script>
        <link rel="icon"
              type="image/ico"
              href="pic/favicon.ico">
        <title>Dashboard | FMI Flights - Low cost flight</title>
        <meta charset="utf-8">
        <meta name="keywords">
        <meta name="author" content="Andreas Antone - FMI UNIBUC">
        <meta name="description" content="Companie de transport.">
        <meta name="keywords" content="companie de transport,free,transport,avion,low cost, bilete online">
    </head>
    <body>
    <div class="nav-bar">
        <div class="link-header">
            <a class="link-icon" href="http://localhost/proiectPHP/"><i class="icon ion-ios-home"></i> HOME</a>
            <a class="link-icon" style="padding-left:10px;" href="http://localhost/proiectPHP/logout.php"><i
                    class="icon ion-android-exit"></i> LOG OUT</a>
        </div>
    </div>
    <div class="menu-left">
        <div class="logo-header">
            <a class="link-icon" href="http://localhost/proiectPHP/" style="font-size: 20pt; text-decoration: underline;"><i
                    class="fa fa-fighter-jet"></i> FMI Flights</a>
        </div>
        <div class="menu">
            <ul>
                <li id="booking"><a><i class="fa fa-address-book-o" aria-hidden="true"></i> Booking</a></li>
                <li id="s-booking1" style="display: none;margin-left:20px;width: 230px;"><a href="booking.php"><i class="fa fa-ticket" aria-hidden="true"></i> New Ticket</a></li>
                <li id="s-booking2" style="display: none;margin-left:20px;width: 230px;"><a><i class="fa fa-print" aria-hidden="true"></i> Print Ticket</a></li>
                <li id="s-booking3" style="display: none;margin-left:20px;width: 230px;"><a><i class="fa fa-history" aria-hidden="true"></i> My History</a></li>
                <li id="account"><a><i class="fa fa-address-book" aria-hidden="true"></i> Account</a></li>
                <li id="s-account1" style="display: none;margin-left:20px;width: 230px;"><a><i class="fa fa-envelope-o" aria-hidden="true"></i> Change Email</a></li>
                <li id="s-account2" style="display: none;margin-left:20px;width: 230px;"><a><i class="fa fa-mobile fa-lg" aria-hidden="true"></i> Change Mobile</a></li>
                <li id="s-account3" style="display: none;margin-left:20px;width: 230px;"><a><i class="fa fa-key" aria-hidden="true"></i> Change Password</a></li>
                <?php

                    if ($_SESSION['type'] == 'admin') {
                        ?>
                <li id="admin"><a><i class="fa fa-lock" aria-hidden="true"></i> Administration</a></li>
                <li id="s-admin1" style="display: none;margin-left:20px;width: 230px;"><a><i class="fa fa-user-secret" aria-hidden="true"></i> Add Moderator</a></li>
                <li id="s-admin2" style="display: none;margin-left:20px;width: 230px;"><a><i class="fa fa-building-o" aria-hidden="true"></i> Add Airport</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="container">

        <?php
    if ($event_dashboard=="") {
        
        ?>


        <div id="welcome" class="welcome">
            <h3>Welcome back to webiste!</h3>
        </div>

        <div id="change-email" style="display: none;">
            <form method="post" action="?returnto=change-email">
            <h3 style="text-align: center; font-size: 20px; font-weight: 700; padding-bottom: 20px;">
                Change your email
            </h3> 
            <input type="hidden" value="change-email" name="returnto">
              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" name="change_email_password">
              </div>
              <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="change_email_email">
              </div>
              <button type="submit" class="btn btn-default">Save</button>
            </form>
        </div>

        <div id="change-mobile" style="display: none;">
            <form method="post" action="?returnto=change-mobile">
            <h3 style="text-align: center; font-size: 20px; font-weight: 700; padding-bottom: 20px;">
                Change your mobile number
            </h3> 
            <input type="hidden" value="change-mobile" name="returnto">
              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" name="change_mobile_password">
              </div>
              <div class="form-group">
                <label for="email">Mobile:</label>
                <input type="mobile" class="form-control" id="mobile" name="change_mobile_mobile">
              </div>
              <button type="submit" class="btn btn-default">Save</button>
            </form>
        </div>

        <div id="change-password" style="display: none;">
            <form method="post" action="?returnto=change-password">
            <h3 style="text-align: center; font-size: 20px; font-weight: 700; padding-bottom: 20px;">
                Change your password
            </h3> 
            <input type="hidden" value="change-password" name="returnto">
              <div class="form-group">
                <label for="pwd">Old password:</label>
                <input type="password" class="form-control" id="old-password" name="change_password_old_password">
              </div>
              <div class="form-group">
                <label for="pwd">New password:</label>
                <input type="password" class="form-control" id="new-password" name="change_password_new_password">
              </div>
              <div class="form-group">
                <label for="pwd">Confirm password:</label>
                <input type="password" class="form-control" id="confirm-password" name="change_password_confirm_password">
              </div>

              <button type="submit" class="btn btn-default">Save</button>
            </form>
        </div>

        <div id="add-moderator" style="display: none;">
        <form method="post" action="?returnto=add-moderator">
            <h3 style="text-align: center; font-size: 20px; font-weight: 700; padding-bottom: 20px;">
                Add new moderator
            </h3> 
            <input type="hidden" value="add-moderator" name="returnto">
              <div class="form-group">
                <label for="pwd">Email address:</label>
                <input type="text" class="form-control" id="email" name="add_moderator_email">
              </div>

              <button type="submit" class="btn btn-default">Save</button>
          </form>
          </div>

        <div id="add-airport" style="display: none;">
        <form method="post" action="?returnto=add-moderator">
            <h3 style="text-align: center; font-size: 20px; font-weight: 700; padding-bottom: 20px;">
                Add new airport
            </h3> 
            <input type="hidden" value="add-airport" name="returnto">
              <div class="form-group">
                <label for="pwd">Airport name:</label>
                <input type="text" class="form-control" id="airport" name="add_airport_name">
              </div>

              <button type="submit" class="btn btn-default">Save</button>
          </form>
          </div>

          <div id="print_ticket" style="display: none;">
            <h3 style="text-align: center; font-size: 20px; font-weight: 700; padding-bottom: 20px;">
                Print ticket
            </h3> 
          </div>

          <div id="my_history" style="display: none;">
            <h3 style="text-align: center; font-size: 20px; font-weight: 700; padding-bottom: 20px;">
                My history
            </h3> 

            <ul class="list-group" style="color: #333">

            <?php

                $sql = "SELECT id,fly_from,fly_to,fly_back FROM tickets WHERE user_id=" . $_SESSION['id'] . " ORDER BY id DESC";
                $result = mysqli_query($db, $sql);



                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $sql = "SELECT id from passengers WHERE ticket_id=" . $row['id'];
                    mysqli_query($db, $sql);
                    $seats = mysqli_affected_rows($db);
            ?>

                <li class="list-group-item"><?php echo $row['fly_from']; if (!empty($row['fly_back'])) echo ' <i class="fa fa-arrows-h" aria-hidden="true"></i> '; else echo ' <i class="fa fa-long-arrow-right" aria-hidden="true"></i> '; echo $row['fly_to'];?> <a href="tickets/ticket_<?php echo $row['id'];?>.pdf"><i class="fa fa-print" aria-hidden="true" style="float:right;margin-left: 10px"></i></a><span class="badge"><?php if ($seats==1) {echo $seats . ' seat';} else {echo $seats . ' seats';}?></span></li>

            <?php

                }
            ?>

              </ul>

        </div>




    </div>


    <?php

    } else {
            switch ($event_dashboard) {
                case 'change-email':
                    if($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (empty($_POST['change_email_password']) || empty($_POST['change_email_email'])) {
                                   echo ' <div id="message" class="message">
                                        <h3>Error!<br /> Missing informations.</h3>
                                    </div> ';
                                    header( "refresh:3;url=dashboard.php" );
                        } else if (!isValidEmail($_POST['change_email_email'])) {
                                  echo ' <div id="message" class="message">
                                        <h3>Your email address is invalid.</h3>
                                    </div>';
                                    header( "refresh:3;url=dashboard.php" );
                        } else {
                            $temp_email = $_POST['change_email_email'];
                            $temp_password = $_POST['change_email_password'];
                            $sql = "UPDATE users SET email = '$temp_email' WHERE id = $sesion_id AND password = md5('$temp_password')";
                            mysqli_query($db, $sql);
                            if (mysqli_affected_rows($db) == 1) {
                               echo ' <div id="message" class="message">
                                        <h3>Success!<br>Your email has been changed.</h3>
                                    </div>';
                                    header( "refresh:3;url=dashboard.php" );
                            } else {
                               echo ' <div id="message" class="message">
                                        <h3>Your password is incorrect.</h3>
                                    </div>';
                                    header( "refresh:3;url=dashboard.php" );
                            }
                                }
                    }
                    break;
                case 'change-mobile':
                    if($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (empty($_POST['change_mobile_mobile']) || empty($_POST['change_mobile_password'])) {
                                   echo ' <div id="message" class="message">
                                        <h3>Error!<br /> Missing informations.</h3>
                                    </div> ';
                                    header( "refresh:3;url=dashboard.php" );
                        } else {
                            $temp_mobile = $_POST['change_mobile_mobile'];
                            $temp_password = $_POST['change_mobile_password'];
                            $sql = "UPDATE users SET mobile = '$temp_mobile' WHERE id = $sesion_id AND password = md5('$temp_password')";
                            mysqli_query($db, $sql);
                            if (mysqli_affected_rows($db) == 1) {
                               echo ' <div id="message" class="message">
                                        <h3>Success!<br>Your mobile has been changed.</h3>
                                    </div>';
                                    header( "refresh:3;url=dashboard.php" );
                            } else {
                               echo ' <div id="message" class="message">
                                        <h3>Your password is incorrect.</h3>
                                    </div>';
                                    header( "refresh:3;url=dashboard.php" );
                            }

                                }
                    }
                    break;
                case 'change-password':
                    if($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (empty($_POST['change_password_old_password']) || empty($_POST['change_password_new_password']) || empty($_POST['change_password_confirm_password'])) {
                                   echo ' <div id="message" class="message">
                                        <h3>Error!<br /> Missing informations.</h3>
                                    </div> ';
                                    header( "refresh:3;url=dashboard.php" );
                        } else if ($_POST['change_password_new_password'] != $_POST['change_password_confirm_password']) {
                                   echo ' <div id="message" class="message">
                                        <h3>Error!<br /> The password does not match.</h3>
                                    </div> ';
                                    header( "refresh:3;url=dashboard.php" );
                        } else {
                            $temp_password = $_POST['change_password_old_password'];
                            $new_password = $_POST['change_password_confirm_password'];
                            $sql = "UPDATE users SET password = md5('$new_password') WHERE id = $sesion_id AND password = md5('$temp_password')";
                            mysqli_query($db, $sql);
                            if (mysqli_affected_rows($db) == 1) {
                               echo ' <div id="message" class="message">
                                        <h3>Success!<br>Your password has been changed.</h3>
                                    </div>';
                                    header( "refresh:3;url=dashboard.php" );
                            } else {
                               echo ' <div id="message" class="message">
                                        <h3>Your password is incorrect.</h3>
                                    </div>';
                                    header( "refresh:3;url=dashboard.php" );
                            }
                                }
                    } 
                    break;
                    case 'add-moderator':
                        if($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (empty($_POST['add_moderator_email'])) {
                                   echo ' <div id="message" class="message">
                                        <h3>Error!<br /> Missing informations.</h3>
                                    </div> ';
                                    header( "refresh:3;url=dashboard.php" );
                        } else if (!isValidEmail($_POST['add_moderator_email'])) {
                                  echo ' <div id="message" class="message">
                                        <h3>The email address is invalid.</h3>
                                    </div>';
                                    header( "refresh:3;url=dashboard.php" );
                        } else {
                            $temp_email = $_POST['add_moderator_email'];
                            $sql = "UPDATE users SET type = 'moderator' WHERE email = '$temp_email'";
                            mysqli_query($db, $sql);
                            if (mysqli_affected_rows($db) == 1) {
                               echo ' <div id="message" class="message">
                                        <h3>Success!<br>The moderator has been added.</h3>
                                    </div>';
                                    header( "refresh:3;url=dashboard.php" );
                            } else {
                               echo ' <div id="message" class="message">
                                        <h3>The email address does not exist in our database.</h3>
                                    </div>';
                                    header( "refresh:3;url=dashboard.php" );
                            }

                                }
                    }
                        break;
                    case 'add-airport':
                        if($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (empty($_POST['add_airport_name'])) {
                                   echo ' <div id="message" class="message">
                                        <h3>Error!<br /> Missing informations.</h3>
                                    </div> ';
                                    header( "refresh:3;url=dashboard.php" );
                        } else {
                            $temp_airport = $_POST['add_airport_name'];
                            $sql = "INSERT INTO airports (airport) VALUES ('$temp_airport')";
                            mysqli_query($db, $sql);
                            if (mysqli_affected_rows($db) == 1) {
                               echo ' <div id="message" class="message">
                                        <h3>Success!<br>The airport has been added.</h3>
                                    </div>';
                                    header( "refresh:3;url=dashboard.php" );
                            } else {
                               echo ' <div id="message" class="message">
                                        <h3>Error.<br>The airport already exist.</h3>
                                    </div>';
                                    header( "refresh:3;url=dashboard.php" );
                            }

                                }
                    }
                        break;
                default:
                    break;

                }
            }

    ?>


    <script type="text/javascript">
        $(document).ready(function(){
            $("#account").click(function(){
                $("#s-account1").toggle();
                $("#s-account2").toggle();
                $("#s-account3").toggle();
            });

            $("#booking").click(function(){
                $("#s-booking1").toggle();
                //$("#s-booking2").toggle();
                $("#s-booking3").toggle();
            });

            $("#admin").click(function(){
                $("#s-admin1").toggle();
                $("#s-admin2").toggle();
            });

            $("#s-account1").click(function(){
                $("#welcome").hide();
                $("#change-email").hide();
                $("#change-mobile").hide();
                $("#change-password").hide();
                $('#add-moderator').hide();
                $('#add-airport').hide();
                $('#print_ticket').hide();
                $('#my_history').hide();
                $("#change-email").show();
            });

            $("#s-account2").click(function(){
                $("#welcome").hide();
                $("#change-email").hide();
                $("#change-mobile").hide();
                $("#change-password").hide();
                $('#add-moderator').hide();
                $('#add-airport').hide();
                $('#print_ticket').hide();
                $('#my_history').hide();
                $("#change-mobile").show();
            });

            $("#s-account3").click(function(){
                $("#welcome").hide();
                $("#change-email").hide();
                $("#change-mobile").hide();
                $("#change-password").hide();
                $('#add-moderator').hide();
                $('#add-airport').hide();
                $('#print_ticket').hide();
                $('#my_history').hide();
                $("#change-password").show();
            });

            $("#s-admin1").click(function(){
                $("#welcome").hide();
                $("#change-email").hide();
                $("#change-mobile").hide();
                $("#change-password").hide();
                $('#add-moderator').hide();
                $('#add-airport').hide();
                $('#print_ticket').hide();
                $('#my_history').hide();
                $("#add-moderator").show();
            });

            $("#s-admin2").click(function(){
                $("#welcome").hide();
                $("#change-email").hide();
                $("#change-mobile").hide();
                $("#change-password").hide();
                $('#add-moderator').hide();
                $('#add-airport').hide();
                $('#print_ticket').hide();
                $('#my_history').hide();
                $("#add-airport").show();
            });

            $("#s-booking2").click(function(){
                $("#welcome").hide();
                $("#change-email").hide();
                $("#change-mobile").hide();
                $("#change-password").hide();
                $('#add-moderator').hide();
                $('#add-airport').hide();
                $('#print_ticket').hide();
                $('#my_history').hide();
                $("#print_ticket").show();
            });


            $("#s-booking3").click(function(){
                $("#welcome").hide();
                $("#change-email").hide();
                $("#change-mobile").hide();
                $("#change-password").hide();
                $('#add-moderator').hide();
                $('#add-airport').hide();
                $('#print_ticket').hide();
                $('#my_history').hide();
                $("#my_history").show();
            });


        });
    </script>
    </body>
    </html>

    <?php
} else {
    header("Location: http://localhost/proiectPHP/login.php");
}
?>