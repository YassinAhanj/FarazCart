<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET,POST');
require_once "./vendor/autoload.php";

use App\api\Builder\QueryBuilder;
use App\api\DiscountMaker;

$json = file_get_contents('php://input');
$data = json_decode($json);
$percent = $data->percent;

$discountCodeMaker = new DiscountMaker();
$getCode = $discountCodeMaker->getDiscontCode();
$builder = new QueryBuilder('discounts');

$data = [
    'discountCode' => $getCode,
    'percentage' => $percent
];
$builder->insert($data)->execute();
