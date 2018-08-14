<?php
require_once './vendor/autoload.php';


$conn = new \Core\Factory();
$slt = new \App\DAO\Find\Select($conn, 'user');

$result = $slt->FindById(2);


var_dump($result);
