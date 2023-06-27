<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET,POST');

use App\api\Builder\QueryBuilder;

require_once "./vendor/autoload.php";

$token = $headers["Authorization"];
$queryBuilder = new QueryBuilder('cards');

$queryBuilder->where('cardId', '=', $token)->delete()->executeDelete();
