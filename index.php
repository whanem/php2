<?php
require 'lib.php';
sql_connect();

$get_photos = 'SELECT id_img, name_img, type_img FROM info_photo';
$photos = get_sql_query($get_photos);

if( false == $photos )
    $message = 'Ошибка запроса';
else {
    for ($i = 0; $i <= count($photos) - 1; $i++) {
        $photo[] = $photos[$i]['name_img'] . '.' . $photos[$i]['type_img'];
        $photo_id[] = $photos[$i]['id_img'];
    }
}

if( $_SERVER['REQUEST_METHOD'] == 'POST' ){

    $uploadDir = __DIR__ . '/img/big/';
    $newName = pathinfo($_FILES['image']['name']);
    $newName = time() . '.' . $newName['extension'];

    if ( is_uploaded_file($_FILES['image']['tmp_name'])) {
        $file = move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $newName);
        if ( $file ) {
            $name_photo = pathinfo($newName);
            $writtenToTheDB =
                "INSERT INTO `info_photo` (
                    `name_img`,
                    `type_img`
                    )
                  VALUES (
                  '".$name_photo['filename']."',
                 '".$name_photo['extension']."'
                  )";
            $wr = written_sql_query($writtenToTheDB);
        }
    }
	
    else
<<<<<<< HEAD
        $msgNotUpload = 'Изображение не загружено никогда';
=======
        $msgNotUpload = 'Изображение загружено неверно';
>>>>>>> Fix
    header('Location: index.php');
	
}

?>
<head>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<form method='POST' enctype='multipart/form-data'>
    <input type='file' name='image' />
    <input type="submit"/>
</form>

<<<<<<< HEAD

<head>
	<meta charset="UTF-8">
	<title>Title</title>
=======
<head>
	<meta charset="UTF-8">
	<title>Document</title>
>>>>>>> Fix
</head>
<body>
	
</body>
</html>

<br>
<?php
echo $message;
echo $msgNotUpload;
$alt = 'Картиночки 00';
if( $photos != false){foreach($photos as $value):
    ?>

    <a href="<?php echo "photo.php?id=".$value['id_img']."";?>" target="_blank">
        <img src="<?php echo "img/big/".$value['name_img']. '.' . $value['type_img'] ."";?>" alt="<?=$alt++?>"/></a>

<?php endforeach; }?>