
<?php

//$page = file_get_contents("https://wizzair.com/#/");
//$page="<span class=\"content-box__price\">from 21.99*</span>112<span class=\"content-box__price\">from 31.99*</span>";
/*
preg_match_all('#<span class="content-box__city heading heading--5">(.*?)</span>#', $page, $city);
preg_match_all('#<span class="content-box__price">(.*?)</span>#', $page, $price);
//preg_match_all('#(.*?)</span>#', $page, $image);

//echo $image[0][0];
for ($i=0; $i<4; $i++)
echo $price[0][$i];*/


$page = file_get_contents("https://wizzair.com/#/");
preg_match_all('/<img(.*?)src=("|\'|)(.*?)("|\'| )(.*?) class="content-box__image">/s', $page, $images);
echo $images[0][0];

?>


