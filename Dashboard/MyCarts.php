<?php

use App\api\Builder\QueryBuilder;

require_once "../vendor/autoload.php";

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Access-Control-Allow-Methods: GET,POST');
$accessToken = $_SERVER['HTTP_AUTHORIZATION'];

$queryBuilder = new QueryBuilder('cards');

$cards = $queryBuilder -> select('card_Image , card_name') -> where("contact_id" , "=" , "$accessToken") -> where("payed" , "=" , "true") -> get();

$jsonFormat = json_encode($cards);
echo $jsonFormat;
