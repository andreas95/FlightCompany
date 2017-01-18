<?php
$title="Home";
include 'include/header.php';
include('simple_html_dom.php');

$page = file_get_contents("https://wizzair.com/#/");
preg_match_all('#<span class="banner__title heading heading--5">(.*?)</span>#', $page, $city);
preg_match_all('#<span class="banner__price">(.*?)</span>#', $page, $price);

$html = file_get_html('https://wizzair.com/#/');
$k=0;
foreach($html->find('img.banner__image') as $element) {
    if ($k==4) {
        break;
    } else {
        $image[$k++]=$element->src;
    }
}
?>
<h2 class="h2-title h2-line" style="margin-bottom: 30px;">Welcome to FMI Flights</h2>
<h3 class="h3-text" style="font-size: 19px; color: #073590; margin: 30%;">Cheap flights from <b style="color: #2091EB;">Bucharest</b></h3>
<div class="home-flights-box">
    <?php
    for ($i=0; $i<4; $i++) {
        ?>
            <a href="http://localhost/proiectPHP/booking.php">
<div class="box_offers">
    <img src="<?php echo $image[$i]; ?>" class="offers_image">
        <h3 class="offers__title">Flight to <?php echo $city[0][$i],' ',$price[0][$i]; ?></h3>
</div>
    </a>
    <?php
    }
    ?>
</div>


<?php
include 'include/footer.php';
?>
