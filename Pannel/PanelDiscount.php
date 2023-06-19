<?php
require_once "./vendor/autoload.php";
use App\api\Builder\QueryBuilder;

$builder = new QueryBuilder('discounts');

$discounts = $builder->select("*")->where("Used","=","false")->get();
$result = json_encode($discounts);
echo $result;
die;
