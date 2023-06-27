<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET,POST');
require_once "./vendor/autoload.php";
use App\api\Builder\QueryBuilder;

$builder = new QueryBuilder('discounts');

$discounts = $builder->select("*")->where("Used","=","false")->get();
$result = json_encode($discounts);
echo $result;
die;
