<?php
require_once("include/connectDB.php");
include 'print.php';
session_start();
$event_booking = $_REQUEST['step'];


$DS = DIRECTORY_SEPARATOR;
file_exists(__DIR__ . $DS . 'core' . $DS . 'Handler.php') ? require_once __DIR__ . $DS . 'core' . $DS . 'Handler.php' : die('Handler.php not found');
file_exists(__DIR__ . $DS . 'core' . $DS . 'Config.php') ? require_once __DIR__ . $DS . 'core' . $DS . 'Config.php' : die('Config.php not found');

use AjaxLiveSearch\core\Config;
use AjaxLiveSearch\core\Handler;

if (session_id() == '') {
    session_start();
}

$handler = new Handler();
$handler->getJavascriptAntiBot();


$title="Booking";
include 'include/header.php';

$airports_list = array();

$NUMBER_OF_PASSENGERS = 1;

$sql = "SELECT airport FROM airports";
$result = mysqli_query($db, $sql);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    array_push($airports_list, $row['airport']);
}


?>


            <!-- Live Search Script -->
            <!--
            <script type="text/javascript" src="js/ajaxlivesearch.min.js"></script>

            <script>
                jQuery(document).ready(function(){
                    jQuery(".mySearch").ajaxlivesearch({
                        loaded_at: <?php //echo time(); ?>,
                        token: <?php //echo "'" . $handler->getToken() . "'"; ?>,
                        max_input: <?php //echo Config::getConfig('maxInputLength'); ?>,
                        onResultClick: function(e, data) {
                            // get the index 0 (first column) value
                            var selectedOne = jQuery(data.selected).find('td').eq('0').text();

                            // set the input value
                            jQuery('#ls_query').val(selectedOne);

                            // hide the result
                            jQuery("#ls_query").trigger('ajaxlivesearch:hide_result');
                        },
                        onResultEnter: function(e, data) {
                            // do whatever you want
                            // jQuery("#ls_query").trigger('ajaxlivesearch:search', {query: 'test'});
                        },
                        onAjaxComplete: function(e, data) {

                        }
                    });

                                        jQuery(".mySearch9").ajaxlivesearch({
                        loaded_at: <?php //echo time(); ?>,
                        token: <?php //echo "'" . $handler->getToken() . "'"; ?>,
                        max_input: <?php //echo Config::getConfig('maxInputLength'); ?>,
                        onResultClick: function(e, data) {
                            // get the index 0 (first column) value
                            var selectedOne = jQuery(data.selected).find('td').eq('0').text();

                            // set the input value
                            jQuery('#ls_query').val(selectedOne);

                            // hide the result
                            jQuery("#ls_query").trigger('ajaxlivesearch:hide_result');
                        },
                        onResultEnter: function(e, data) {
                            // do whatever you want
                            // jQuery("#ls_query").trigger('ajaxlivesearch:search', {query: 'test'});
                        },
                        onAjaxComplete: function(e, data) {

                        }
                    });
                })
            </script>


            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">To</span>
                <input type="text" class="form-control mySearch9" placeholder="Destination" aria-describedby="sizing-addon2" id="ls_query">
                <span class="input-group-addon" style="background: white; width: 30px;">
        <i class="fa fa-level-down" style="color: black;"></i>
    </span>
            </div>

            -->



<h2 class="h2-title h2-line">Buy now a ticket</h2>

<div class="buy-ticket">
    <span style="color: #c6007e; font-weight: 700; font-size: 20px;">
            <i class="fa fa-plane fa-2x" style="color: #F1C933;" aria-hidden="true"></i> FMI Flights
    </span>

    <?php
        if ($event_booking == "") {
    ?>

    <form method="post" action="?step=1">
    <p style="font-weight: 700;font-size: 17px;margin-top: 10px;text-decoration: underline;margin-bottom: -5px; color:  #073590;"><b style="color: #c6007e">Step1:</b> Search A Flight</p>
    <input type="hidden" value="1" name="step">
        <div class="row" style="display: inline-block;">
            <div class="col-md-2 col-md-offset-5"></div>
            <div style="display: block; color: #343434; font-size: 14px; font-weight: 700; margin-top: 20px;">
                <input type="radio" id="select_type_of_flight1" name="select_type_of_flight" value="Return" checked="checked">  Return&nbsp;&nbsp;
                <input type="radio" id="select_type_of_flight2" name="select_type_of_flight" value="One way">  One way&nbsp;
            </div>

            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">From</span>
                <select class="form-control" id="sel1" name="input_from">
                    <?php 
                        for ($i = 0; $i < count($airports_list); $i++) {
                            echo '<option value="' . $i . '">' . $airports_list[$i] . '</option>';
                        }
                        ?>
                </select>
                <span class="input-group-addon" style="background: white; width: 30px;">
        <i class="fa fa-level-up" style="color: black;"></i>
    </span>
            </div>


            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">To</span>
                <select class="form-control" id="sel1" name="input_to">
                        <?php 
                        for ($i = 0; $i < count($airports_list); $i++) {
                            echo '<option value="' . $i . '">' . $airports_list[$i] . '</option>';
                        }
                        ?>
                </select>
                <span class="input-group-addon" style="background: white; width: 30px;">
        <i class="fa fa-level-down" style="color: black;"></i>
    </span>
            </div>



            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">Fly out</span>
                <input type="text" class="form-control" placeholder="Select a date" aria-describedby="sizing-addon2" id="date-fly-out" name="input_fly_out">
                <span class="input-group-addon" style="background: white; width: 30px;">
        <i class="fa fa-calendar-check-o" style="color: black;"></i>
    </span>
            </div>

           <script type="text/javascript">
                var date = new Date();
                var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
                $(function () {
                    $('#date-fly-out').datetimepicker({
                        minDate: today,
                        format: 'DD/MM/YYYY'
                    });
                });
            </script> 

            <div class="input-group" id="fly_back_div">
                <span class="input-group-addon" id="sizing-addon2">Fly back</span>
                <input type='text' class="form-control" placeholder="Select a date" aria-describedby="sizing-addon2" id="date-fly-back" name="input_fly_back">
                <span class="input-group-addon" style="background: white; width: 30px;">
        <i class="fa fa-calendar-o" style="color: black;"></i>
    </span>
            </div>

            <script type="text/javascript">
                var date = new Date();
                var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
                $(function () {
                    $('#date-fly-back').datetimepicker({
                        format: 'DD/MM/YYYY',
                        minDate: today
                    });
                });
            </script> 

            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">Passengers</span>
                <span class="input-group-btn">
    <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="input_Passengers" style="height: 34px;">
      <span class="glyphicon glyphicon-minus"></span>
    </button>
    </span>
                <input type="text" class="form-control input-number" value="1 Passenger" min="1" max="12" style="color: black;
background: white;" name="input_Passengers" readonly>
                <span class="input-group-btn">
    <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="input_Passengers" style="height: 34px;">
      <span class="glyphicon glyphicon-plus"></span>
    </button>
    </span>
                <span class="input-group-addon img" style="background: white; width: 30px;">
    <i class="fa fa-user" style="color: black;"></i>
    </span>
            </div>

            <button type="submit" class="btn btn-default pull-right" style="margin-top: 10px;background: #F1C933;color: #073590;font-weight: 700;font-size: 18px;">
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span> SEARCH
            </button>

        </div>
    </form>

    <?php 
    } else if ($event_booking == "1") {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST['input_fly_out']) || ($_POST['select_type_of_flight']=="Return") && empty($_POST['input_fly_back'])) {
            echo "<h4><b>Error<br />Missing informations.</b></h4>";
        } else if ($_POST['input_from'] == $_POST['input_to']) {
            echo "<h4><b>Error<br />There is no result for this search! :(</b></h4>";
        } else if (!isset($_SESSION['id']) && !isset($_SESSION['email'])) {
            ?>
            <h4><b>Error<br />You should be logged for buy a ticket.</b></h4>
            <form action="login.php">
                <button type="submit" class="btn btn-danger" value="Go to login page!">Log in!</button>
            </form>
            <?php
        } else {
                $temp = $_POST['input_Passengers'];
                $NUMBER_OF_PASSENGERS = $temp[0] . $temp[1];
                $temp_price = $NUMBER_OF_PASSENGERS*50;
                if ($_POST['select_type_of_flight']=="Return" && !empty($_POST['input_fly_back'])) {
                    $temp_price*=2;
                }
            ?>

            <form method="post" action="?step=2">
            <div class="row" style="display: inline-block;">
            <p style="font-weight: 700;font-size: 17px;margin-top: 10px;text-decoration: underline;margin-bottom: 20px; color:  #073590;"><b style="color: #c6007e">Step2:</b> Select Flight Details</p>
                <input type="hidden" value="2" name="step">
                <input type="hidden" value="<?php echo $NUMBER_OF_PASSENGERS;?>" name="input_no_passengers">
                <input type="hidden" value="<?php echo $_POST['input_from'];?>" name="input_step2_from">
                <input type="hidden" value="<?php echo $_POST['input_to'];?>" name="input_step2_to">
                <input type="hidden" value="<?php echo $_POST['input_fly_out'];?>" name="input_step2_fly_out">
                <input type="hidden" value="<?php echo $_POST['input_fly_back'];?>" name="input_step2_fly_back">

                <?php
                    if ($NUMBER_OF_PASSENGERS == 1) {
                ?>

            <div class="input-group" style="width: 450px;">
                <span class="input-group-addon" id="sizing-addon2" style="width: 132px;">First Name</span>
                <input type='text' class="form-control" placeholder="first name" aria-describedby="sizing-addon2" name="input_first_name_passenger0"  style="color: black; background: white;">
                <span class="input-group-addon" style="background: white; width: 30px;">
                <i class="fa fa-user" style="color: black;"></i>
            </span>
            </div>

             <div class="input-group" style="width: 450px;">
                <span class="input-group-addon" id="sizing-addon2"  style="width: 132px;">Last Name</span>
                <input type='text' class="form-control" placeholder="last name" aria-describedby="sizing-addon2" name="input_last_name_passenger0"  style="color: black; background: white;">
                <span class="input-group-addon" style="background: white; width: 30px;">
                <i class="fa fa-user" style="color: black;"></i>
            </span>
            </div>


                <div class="input-group" style="width: 450px;">
                <span class="input-group-addon" id="sizing-addon2"  style="width: 132px;">Seat</span>
                <select class="form-control" id="sel1" name="select_seat_passenger0">
                    <?php 
                        for ($i = 1; $i <31 ; $i++) {
                            echo '<option value="' . $i . 'A">' . $i. ' A</option>';
                            echo '<option value="' . $i . 'B">' . $i. ' B</option>';
                            echo '<option value="' . $i . 'C">' . $i. ' C</option>';
                            echo '<option value="' . $i . 'D">' . $i. ' D</option>';
                            echo '<option value="' . $i . 'E">' . $i. ' E</option>';
                            echo '<option value="' . $i . 'F">' . $i. ' F</option>';
                        }
                        ?>
                </select>
                <span class="input-group-addon" style="background: white; width: 30px;">
                <i class="fa fa-user" style="color: black;"></i>
            </span>
            </div>

                      <div class="input-group" style="width: 450px;">
                <span class="input-group-addon" id="sizing-addon2" style="width: 132px;">Business</span>
                <select class="form-control" id="select_business0" name="select_business_passenger0">
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                </select>
                <span class="input-group-addon" style="background: white; width: 30px;">
                <i class="fa fa-briefcase" style="color: black;"></i>
            </span>
            </div>

            <?php
                } else {
                    for ($j = 1; $j <= $NUMBER_OF_PASSENGERS; $j++) {
                    ?>
                    <div class="input-group" style="width: 100px; height: 30px;">
                <span class="input-group-addon" id="sizing-addon2" style="background: #dd4b39;">Passenger <?php echo $j;?></span>
                    </div>


            <div class="input-group" style="width: 450px;">
                <span class="input-group-addon" id="sizing-addon2" style="width: 132px;">First Name</span>
                <input type='text' class="form-control" placeholder="first name" aria-describedby="sizing-addon2" name="input_first_name_passenger<?php echo $j;?>"  style="color: black; background: white;">
                <span class="input-group-addon" style="background: white; width: 30px;">
                <i class="fa fa-user" style="color: black;"></i>
            </span>
            </div>

             <div class="input-group" style="width: 450px;" style="width: 132px;">
                <span class="input-group-addon" id="sizing-addon2" style="width: 132px;">Last Name</span>
                <input type='text' class="form-control" placeholder="last name" aria-describedby="sizing-addon2" name="input_last_name_passenger<?php echo $j;?>"  style="color: black; background: white;">
                <span class="input-group-addon" style="background: white; width: 30px;">
                <i class="fa fa-user" style="color: black;"></i>
            </span>
            </div>


                <div class="input-group" style="width: 450px;">
                <span class="input-group-addon" id="sizing-addon2" style="width: 132px;">Seat</span>
                <select class="form-control" id="sel1" name="select_seat_passenger<?php echo $j;?>">
                    <?php 
                        for ($i = 1; $i <31 ; $i++) {
                            echo '<option value="' . $i . 'A">' . $i. ' A</option>';
                            echo '<option value="' . $i . 'B">' . $i. ' B</option>';
                            echo '<option value="' . $i . 'C">' . $i. ' C</option>';
                            echo '<option value="' . $i . 'D">' . $i. ' D</option>';
                            echo '<option value="' . $i . 'E">' . $i. ' E</option>';
                            echo '<option value="' . $i . 'F">' . $i. ' F</option>';
                        }
                        ?>
                </select>
                <span class="input-group-addon" style="background: white; width: 30px;">
                <i class="fa fa-user" style="color: black;"></i>
            </span>
            </div>

          <div class="input-group" style="width: 450px;">
                <span class="input-group-addon" id="sizing-addon2" style="width: 132px;">Business</span>
                <select class="form-control" id="select_business<?php echo $j;?>" name="select_business_passenger<?php echo $j;?>">
                            <option value="No">No</option>
                            <option value="Yes">Yes</option>
                </select>
                <span class="input-group-addon" style="background: white; width: 30px;">
                <i class="fa fa-briefcase" style="color: black;"></i>
            </span>
            </div>
            <br><br>



                <?php
            }
                }
            ?>

            <div class="input-group" style="width: 450px;">
                <span class="input-group-addon" id="sizing-addon2" style="width: 132px;">Departure time</span>
                <select class="form-control" id="select_hour" name="select_hour_passenger">
                    <?php 
                        for ($i = 0; $i <10 ; $i++) {
                            echo '<option value="' . $i . '">0' . $i . ':00</option>';
                        }

                       for ($i = 10; $i <24 ; $i++) {
                            echo '<option value="' . $i . '">' . $i . ':00</option>';
                        }
                        ?>
                </select>
                <span class="input-group-addon" style="background: white; width: 30px;">
                <i class="fa fa-clock-o" style="color: black;"></i>
            </span>
            </div>

            <div class="input-group" style="width: 450px;">
                <span class="input-group-addon" id="sizing-addon2" style="width: 132px;">Price</span>
                <input type='text' class="form-control" aria-describedby="sizing-addon2" name="input_price_passenger" readonly=""  style="color: black; background: white;" value="$ <?php echo $temp_price?>.00" id="price_box">   
                <span class="input-group-addon" style="background: white; width: 30px;">
                <i class="fa fa-money" style="color: black;"></i>
            </span>
            </div>


            <button type="submit" class="btn btn-default pull-right" style="margin-top: 10px;background: #F1C933;color: #073590;font-weight: 700;font-size: 18px;">
                <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> NEXT
            </button>
            </div>
            </form>

<script>


<?php

    if ($NUMBER_OF_PASSENGERS == 1) {
        ?>

        $("#select_business0").click(function(){
            if ($("#select_business0").val()=="Yes") {
                <?php $temp_price+=20;?>
                $("#price_box").val("$ <?php echo $temp_price?>.00");
            } else {
                <?php $temp_price-=20;?>
                $("#price_box").val("$ <?php echo $temp_price?>.00");
            }
        });

        <?php
    } else {
?>
        var js_price = <?php echo $temp_price;?>;
<?php
        for ($i=1; $i<=$NUMBER_OF_PASSENGERS; $i++) {
            ?>

        $("#select_business<?php echo $i;?>").click(function(){
            if ($("#select_business<?php echo $i;?>").val()=="Yes") {
                js_price+=20;
                $("#price_box").val("$ "+js_price+".00");
            } else {
                js_price-=20;
                $("#price_box").val("$ "+js_price+".00");
            }
        });

        <?php
        }
    }

?>


</script>

            <?php
        }
    } else {
         echo '<h3>Error 404</h3>';
    }
    } else if ($event_booking == "2") {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    //get first name, last name and email from database

                        $sql = "SELECT email,first_name,last_name FROM users WHERE id = " . $_SESSION['id'];
                        $result = mysqli_query($db, $sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $active = $row['active'];


            if ($_POST['input_no_passengers'] == 1) {
                if (empty($_POST['input_first_name_passenger0']) || empty($_POST['input_last_name_passenger0'])) {
                        echo "<h4><b>Error<br />Missing informations.</b></h4>";
                } else {
                    ?>


            <form method="post" action="?step=3">
            <div class="row" style="display: inline-block;">
            <p style="font-weight: 700;font-size: 17px;margin-top: 10px;text-decoration: underline;margin-bottom: 20px; color:  #073590;"><b style="color: #c6007e">Step3:</b> Confirm Payment Details</p>
                <input type="hidden" value="3" name="step">
                <input type="hidden" value="<?php echo $_POST['input_first_name_passenger0'] . ' ' . $_POST['input_last_name_passenger0'];?>" name="input_step3_name_passenger0">
                <input type="hidden" value="<?php echo $_POST['select_seat_passenger0'];?>" name="input_step3_seat_passenger0">
                <input type="hidden" value="<?php echo $_POST['select_business_passenger0'];?>" name="input_step3_business_passenger0">

            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2" style="width: 132px;">Name</span>
                <input type='text' class="form-control" value="<?php echo $row['first_name'] . ' ' . $row['last_name'];?>" aria-describedby="sizing-addon2" name="input_buy_name" readonly style="color: black; background: white;">
                <span class="input-group-addon" style="background: white; width: 30px;">
                <i class="fa fa-user" style="color: black;"></i>
            </span>
            </div>

            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2" style="width: 132px;">Email</span>
                <input type='text' class="form-control" value="<?php echo $row['email'];?>" aria-describedby="sizing-addon2" name="input_buy_email" readonly style="color: black; background: white;">
                <span class="input-group-addon" style="background: white; width: 30px;">
                <i class="fa fa-envelope" style="color: black;"></i>
            </span>
            </div>

            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2" style="width: 132px;">From</span>
                <input type='text' class="form-control" value="<?php echo $airports_list[$_POST['input_step2_from']];?>" aria-describedby="sizing-addon2" name="input_buy_from" readonly style="color: black; background: white;">
                <span class="input-group-addon" style="background: white; width: 30px;">
                <i class="fa fa-level-up" style="color: black;"></i>
            </span>
            </div>

            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2" style="width: 132px;">To</span>
                <input type='text' class="form-control" value="<?php echo $airports_list[$_POST['input_step2_to']];?>" aria-describedby="sizing-addon2" name="input_buy_to" readonly style="color: black; background: white;">
                <span class="input-group-addon" style="background: white; width: 30px;">
                <i class="fa fa-level-down" style="color: black;"></i>
            </span>
            </div>

            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2" style="width: 132px;">Fly out</span>
                <input type='text' class="form-control" value="<?php echo $_POST['input_step2_fly_out'];?>" aria-describedby="sizing-addon2" name="input_buy_fly_out" readonly style="color: black; background: white;">
                <span class="input-group-addon" style="background: white; width: 30px;">
                <i class="fa fa-calendar-check-o" style="color: black;"></i>
            </span>
            </div>

            <?php 

                if ($_POST['input_step2_fly_back'] != "") {

            ?>


            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2" style="width: 132px;">Fly back</span>
                <input type='text' class="form-control" value="<?php echo $_POST['input_step2_fly_back'];?>" aria-describedby="sizing-addon2" name="input_buy_fly_back" readonly style="color: black; background: white;">
                <span class="input-group-addon" style="background: white; width: 30px;">
                <i class="fa fa-calendar-o" style="color: black;"></i>
            </span>
            </div>

            <?php
            }
            ?>

            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2" style="width: 132px;">Passengers</span>
                <input type="text" class="form-control input-number" value="<?php echo $_POST['input_no_passengers'] . 'Passenger';?>" style="color: black;
                background: white;" name="input_buy_passengers" readonly>
                <span class="input-group-addon img" style="background: white; width: 30px;">
                <i class="fa fa-user" style="color: black;"></i>
                </span>
            </div>


            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2" style="width: 132px;">Departure time</span>
                <input type='text' class="form-control" value="<?php  if (strlen($_POST['select_hour_passenger'])==1) {echo '0' .$_POST['select_hour_passenger'] . ':00';} else {echo $_POST['select_hour_passenger'] . ':00';}?>" aria-describedby="sizing-addon2" name="input_buy_departure_time" readonly style="color: black;
                background: white;">
                <span class="input-group-addon" style="background: white; width: 30px;">
                <i class="fa fa-clock-o" style="color: black;"></i>
            </span>
            </div>

            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2" style="width: 132px;">Price</span>
                <input type='text' class="form-control" value="<?php echo $_POST['input_price_passenger'];?>" aria-describedby="sizing-addon2" name="input_buy_price" readonly style="color: black;
                background: white;">
                <span class="input-group-addon" style="background: white; width: 30px;">
                <i class="fa fa-money" style="color: black;"></i>
            </span>
            </div>

             <button type="submit" class="btn btn-default pull-right" style="margin-top: 10px;background: #F1C933;color: #073590;font-weight: 700;font-size: 18px;">
                <span class="glyphicon glyphicon-euro" aria-hidden="true"></span> BUY
            </button>

            </div>
            </form>


                    <?php
                }
            } else {
                $var_test_all_passengers = 1; // 1=Show form   2=Missing info   3=Error seat
                for ($i=1; $i<=$_POST['input_no_passengers'] ; $i++) {
                    if (empty($_POST['input_first_name_passenger' . $i]) || empty($_POST['input_last_name_passenger' . $i])) {
                        $var_test_all_passengers = 2;
                        break;
                    }
                }

                for ($i=1; $i<=$_POST['input_no_passengers'] - 1 ; $i++) {
                    for ($j=$i+1; $j<=$_POST['input_no_passengers'] ; $j++)  {
                        if ($_POST['select_seat_passenger' . $i] == $_POST['select_seat_passenger' . $j]) {
                            $var_test_all_passengers = 3;
                            break;
                        }
                    }
                }   


                switch ($var_test_all_passengers) {
                    case 1:
                        ?>

                                    <form method="post" action="?step=3">
            <div class="row" style="display: inline-block;">
            <p style="font-weight: 700;font-size: 17px;margin-top: 10px;text-decoration: underline;margin-bottom: 20px; color:  #073590;"><b style="color: #c6007e">Step3:</b> Confirm Payment Details</p>
                <input type="hidden" value="3" name="step">

                <?php

                for ($i = 1; $i <= $_POST['input_no_passengers']; $i++) {
                ?>

                    <input type="hidden" value="<?php echo $_POST['input_first_name_passenger' . $i] . ' ' . $_POST['input_last_name_passenger' . $i];?>" name="input_step3_name_passenger<?php echo $i;?>">
                    <input type="hidden" value="<?php echo $_POST['select_seat_passenger' . $i];?>" name="input_step3_seat_passenger<?php echo $i;?>">
                    <input type="hidden" value="<?php echo $_POST['select_business_passenger' . $i];?>" name="input_step3_business_passenger<?php echo $i;?>">

                <?php
                }

                ?>

            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2" style="width: 132px;">Name</span>
                <input type='text' class="form-control" value="<?php echo $row['first_name'] . ' ' . $row['last_name'];?>" aria-describedby="sizing-addon2" name="input_buy_name" readonly style="color: black; background: white;">
                <span class="input-group-addon" style="background: white; width: 30px;">
                <i class="fa fa-user" style="color: black;"></i>
            </span>
            </div>

            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2" style="width: 132px;">Email</span>
                <input type='text' class="form-control" value="<?php echo $row['email'];?>" aria-describedby="sizing-addon2" name="input_buy_email" readonly style="color: black; background: white;">
                <span class="input-group-addon" style="background: white; width: 30px;">
                <i class="fa fa-envelope" style="color: black;"></i>
            </span>
            </div>

            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2" style="width: 132px;">From</span>
                <input type='text' class="form-control" value="<?php echo $airports_list[$_POST['input_step2_from']];?>" aria-describedby="sizing-addon2" name="input_buy_from" readonly style="color: black; background: white;">
                <span class="input-group-addon" style="background: white; width: 30px;">
                <i class="fa fa-level-up" style="color: black;"></i>
            </span>
            </div>

            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2" style="width: 132px;">To</span>
                <input type='text' class="form-control" value="<?php echo $airports_list[$_POST['input_step2_to']];?>" aria-describedby="sizing-addon2" name="input_buy_to" readonly style="color: black; background: white;">
                <span class="input-group-addon" style="background: white; width: 30px;">
                <i class="fa fa-level-down" style="color: black;"></i>
            </span>
            </div>

            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2" style="width: 132px;">Fly out</span>
                <input type='text' class="form-control" value="<?php echo $_POST['input_step2_fly_out'];?>" aria-describedby="sizing-addon2" name="input_buy_fly_out" readonly style="color: black; background: white;">
                <span class="input-group-addon" style="background: white; width: 30px;">
                <i class="fa fa-calendar-check-o" style="color: black;"></i>
            </span>
            </div>

            <?php 

                if ($_POST['input_step2_fly_back'] != "") {

            ?>


            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2" style="width: 132px;">Fly back</span>
                <input type='text' class="form-control" value="<?php echo $_POST['input_step2_fly_back'];?>" aria-describedby="sizing-addon2" name="input_buy_fly_back" readonly style="color: black; background: white;">
                <span class="input-group-addon" style="background: white; width: 30px;">
                <i class="fa fa-calendar-o" style="color: black;"></i>
            </span>
            </div>

            <?php
            }
            ?>

            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2" style="width: 132px;">Passengers</span>
                <input type="text" class="form-control input-number" value="<?php echo $_POST['input_no_passengers'] . 'Passengers';?>" style="color: black;
                background: white;" name="input_buy_passengers" readonly>
                <span class="input-group-addon img" style="background: white; width: 30px;">
                <i class="fa fa-user" style="color: black;"></i>
                </span>
            </div>

            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2" style="width: 132px;">Departure time</span>
                <input type='text' class="form-control" value="<?php  if (strlen($_POST['select_hour_passenger'])==1) {echo '0' .$_POST['select_hour_passenger'] . ':00';} else {echo $_POST['select_hour_passenger'] . ':00';}?>" aria-describedby="sizing-addon2" name="input_buy_departure_time" readonly style="color: black; background: white;">
                <span class="input-group-addon" style="background: white; width: 30px;">
                <i class="fa fa-clock-o" style="color: black;"></i>
            </span>
            </div>

            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2" style="width: 132px;">Price</span>
                <input type='text' class="form-control" value="<?php echo $_POST['input_price_passenger'];?>" aria-describedby="sizing-addon2" name="input_buy_price" readonly style="color: black; background: white;">
                <span class="input-group-addon" style="background: white; width: 30px;">
                <i class="fa fa-money" style="color: black;"></i>
            </span>
            </div>

             <button type="submit" class="btn btn-default pull-right" style="margin-top: 10px;background: #F1C933;color: #073590;font-weight: 700;font-size: 18px;">
                <span class="glyphicon glyphicon-euro" aria-hidden="true"></span> BUY
            </button>

            </div>
            </form>

            <?php
                        break;
                    case 2:
                        echo "<h4><b>Error<br />Missing informations.</b></h4>";
                        break;
                    case 3:
                        echo "<h4><b>Error<br />Please select distinct seats!</b></h4>";
                        break;
                    default:
                        echo '<h3>Error 404</h3>';
                        break;
                }

            }
        } else {
             echo '<h3>Error 404</h3>';
        }
    } else if ($event_booking == "3") {

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                //insert ticket into database

                //Start transaction
                mysqli_autocommit($db, FALSE);

                //insert into tickets_table

                $temp_fly_from = $_POST['input_buy_from'];
                $temp_fly_to = $_POST['input_buy_to'];
                $temp_fly_out = $_POST['input_buy_fly_out'];
                $temp_fly_back = $_POST['input_buy_fly_back'];
                $temp_departure_time = $_POST['input_buy_departure_time'];
                $temp_price = $_POST['input_buy_price'];
                $temp_user_id = $_SESSION['id'];

                if (empty($temp_fly_back)) {
                    $sql = "INSERT INTO tickets (fly_from, fly_to, fly_out, departure_time, price, user_id)
                                VALUES
                                                ('$temp_fly_from', '$temp_fly_to', '$temp_fly_out', '$temp_departure_time', '$temp_price', $temp_user_id)"; 
                } else {
                    $sql = "INSERT INTO tickets (fly_from, fly_to, fly_out, fly_back, departure_time, price, user_id)
                                VALUES
                                                ('$temp_fly_from', '$temp_fly_to', '$temp_fly_out', '$temp_fly_back', '$temp_departure_time', '$temp_price', $temp_user_id)"; 
                }
                mysqli_query($db, $sql);

                //get ticket id

                $sql = "SELECT id FROM tickets ORDER BY id DESC LIMIT 1";
                $result = mysqli_query($db, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $active = $row['active'];

                //insert into passengers_table

                $temp_ticket_id = $row['id'];
                $temp = $_POST['input_buy_passengers'];
                $NUMBER_OF_PASSENGERS = $temp[0] . $temp[1];

                if ($NUMBER_OF_PASSENGERS == 1) {
                    $temp_name = $_POST['input_step3_name_passenger0'];
                    $temp_seat = $_POST['input_step3_seat_passenger0'];
                    $temp_business = $_POST['input_step3_business_passenger0'];
                    $sql = "INSERT INTO passengers (name, seat, business, ticket_id)
                                VALUES
                                                    ('$temp_name', '$temp_seat', '$temp_business', $temp_ticket_id)";
                    mysqli_query($db, $sql);
                } else {
                    for ($i = 1; $i <= $NUMBER_OF_PASSENGERS; $i++) {
                        $temp_name = $_POST['input_step3_name_passenger' . $i];
                        $temp_seat = $_POST['input_step3_seat_passenger' . $i];
                        $temp_business = $_POST['input_step3_business_passenger' . $i];
                        $sql = "INSERT INTO passengers (name, seat, business, ticket_id)
                                    VALUES
                                                        ('$temp_name', '$temp_seat', '$temp_business', $temp_ticket_id)";
                        mysqli_query($db, $sql);
                    }
                }

                //End transaction
                mysqli_autocommit($db,TRUE);

                //create ticket

                //get first name, last name and email from database

                $sql = "SELECT email,first_name,last_name FROM users WHERE id = " . $_SESSION['id'];
                $result = mysqli_query($db, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $active = $row['active'];

                $NEW_TICKET = new PDF();
                $file_name = "tickets/ticket_" . $temp_ticket_id . ".pdf";
                $item = $NUMBER_OF_PASSENGERS . ' x Ticket';
                if ($NUMBER_OF_PASSENGERS != 1) {
                    $item = $item . 's: ';
                } else {
                    $item = $item . ': ';
                }
                $item = $item . $temp_fly_from . '->' . $temp_fly_to;
                if (!empty($temp_fly_back)) {
                    $item = $item . ' and return';
                }
                $temp_name = $row['first_name'] . ' ' . $row['last_name'];
                $temp_email = $row['email'];
                $NEW_TICKET->create_ticket($file_name, $temp_ticket_id, $item, $temp_price, $temp_name, $temp_email);
        ?>

        
        <form method="post" action="<?php echo $file_name;?>">
            <div class="row" style="display: inline-block;">
                    <p style="font-weight: 700;font-size: 17px;margin-top: 10px;margin-bottom: -5px; color:  #073590;"><b style="color: #c6007e">Success!</b><br />The ticket has been bought successfully.</p>
             <br />
             <button type="submit" class="btn btn-default pull-center" style="margin-top: 10px;background-color: #c6007e;color: #fff;font-weight: 700;font-size: 18px;">
                <i class="fa fa-print" aria-hidden="true"></i> Print ticket
            </button>
            </div>
        </form>


        <?php
         } else {
             echo '<h3>Error 404</h3>';
         }
    } else {
        echo '<h3>Error 404</h3>';
    }
    ?>


</div>


<script>
    $(function(){
        $("#select_type_of_flight2").click(function(){
            $("#fly_back_div").hide();
            $("#fly_back_div").val("");
        });
        $("#select_type_of_flight1").click(function(){
            $("#fly_back_div").show();
        });
    });
</script>

<script>
    //plugin bootstrap minus and plus
    //http://jsfiddle.net/laelitenetwork/puJ6G/
    $('.btn-number').click(function(e){
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        type      = $(this).attr('data-type');
        var input = $("input[name='"+fieldName+"']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if(type == 'minus') {

                if(currentVal > input.attr('min')) {
                    if (currentVal == 2) {
                        input.val(currentVal - 1+' Passenger').change();
                    } else {
                        input.val(currentVal - 1+' Passengers').change();
                    }
                }
                if(parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if(type == 'plus') {

                if(currentVal < input.attr('max')) {
                    input.val(currentVal + 1 + ' Passengers').change();
                }
                if(parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function(){
        $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {

        minValue =  parseInt($(this).attr('min'));
        maxValue =  parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if(valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if(valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            alert('Sorry, the maximum value was reached');
            $(this).val($(this).data('oldValue'));
        }


    });
    $(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>


<?php
include 'include/footer.php';
?>
