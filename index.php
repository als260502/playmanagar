<?php
require_once './vendor/autoload.php';


$conn = new \Core\Factory();
$slt = new \App\DAO\Find\Select($conn, 'user');

$res = $slt->FindAll("Select id from user");
$result = $slt->FindByParams("Select name from user where id=?", ["2"]);


var_dump($result);
