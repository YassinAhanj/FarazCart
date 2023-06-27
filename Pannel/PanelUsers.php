<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET,POST');
require_once "./vendor/autoload.php";
use App\api\Builder\QueryBuilder;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET,POST');


$builder = new QueryBuilder('cards');
$user = $builder->select("*")->get();
$result = json_encode($user);
echo $result;
die;