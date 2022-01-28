<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require __DIR__ . '/../config/config.php';

require __DIR__ . '/../autoload.php';


$impression = new \services\Impression(new connection\DbConnection(DB_DNS, DB_USER, DB_PASS), $_SERVER);

$impression->addImpression();

header('Location: https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Image_created_with_a_mobile_phone.png/1200px-Image_created_with_a_mobile_phone.png');
return;










