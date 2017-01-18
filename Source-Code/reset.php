<?php
require_once("include/connectDB.php");
include 'include/utils.php';
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
    <title>Reset password | FMI Flights - Low cost flight</title>
    <meta charset="utf-8">
    <meta name="keywords">
    <meta name="author" content="Andreas Antone - FMI UNIBUC">
    <meta name="description" content="Companie de transport.">
    <meta name="keywords" content="companie de transport,free,transport,avion,low cost, bilete online">
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
    $id = 0 + $_GET["id"];
    $secret = $_GET["secret"];

    $sql = "SELECT id FROM users WHERE id = '$id' and secret = '$secret'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $new_secret = make_hash();
        $new_password = make_hash();
        $sql = "UPDATE users SET secret = '$new_secret', password = md5('$new_password') WHERE id = $id";
        $result = mysqli_query($db, $sql);
        ?>
        <div class="pane-header" align="center"></div>
        <div class="pane-middle" align="center">
            <img class="success" src="pic/blank.gif">
            <h2 style="font-size: 10pt;">Success</h2>Your new password is: <b><?php echo $new_password;?></b>.<br>
        </div>
        <div class="pane-footer" align="center"></div>
        <?php
    } else {
        ?>
        <div class="pane-header" align="center"></div>
        <div class="pane-middle" align="center">
            <img class="error" src="pic/blank.gif">
            <h2 style="font-size: 10pt;">Error</h2>Not found.<br>
        </div>
        <div class="pane-footer" align="center"></div>
        <?php
    }
    ?>
    <br>
    <br>



    <br>
    <br>
</div>

</body>
</html>
