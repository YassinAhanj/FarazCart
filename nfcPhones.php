<?php
require_once "./vendor/autoload.php";
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET,POST');

use App\api\Builder\QueryBuilder;

$builder = new QueryBuilder("phones");

$phones = $builder->select()->get();

$jsonPhones = json_encode($phones, JSON_UNESCAPED_SLASHES);

$jsonStringPhones = strval($jsonPhones);

echo $jsonStringPhones;
