<?php
require_once "../vendor/autoload.php";


use App\api\Builder\QueryBuilder;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET,POST');
//Extracting URL of WebPage
$url = $_GET['url'];
$parts = explode('/', $url);
$lastPart = end($parts);
//extracting Input
$json = file_get_contents('php://input');
$data = json_decode($json);
//Button Value
$buttonValue = $_POST['submit'];
$value = $data->$buttonValue;
//extractCardID
$queryBuilder = new QueryBuilder('cards');
$cardID = $builder->select('cardId')->where('card_name', '=', "$lastPart")->get();


//insertNew DAta in Them

$queryBuilder = new QueryBuilder('cardthem');
$data = [
    "$buttonValue" => $number,
];
$builder->insert($data)->where('cardId', '=', "$cardID")->execute();
