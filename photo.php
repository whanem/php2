<?php
require 'lib.php';
sql_connect();

$get_photos = "SELECT `name_img`, `type_img` FROM `info_photo` WHERE `id_img`='".$_GET['id']."'";
$photos = get_sql_query($get_photos);
?>
<b>Фотки</b>
<img src="img/big/<? echo $photos[0]['name_img'] . '.' . $photos[0]['type_img'] ?>" alt=""/>