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
//extractCardID
$queryBuilder = new QueryBuilder('cards');
$cardID = $builder->select('cardId')->where('card_name', '=', "$lastPart") -> where('payed' , '=' , "true") ->get();


//insertNew DAta in Social Media

$queryBuilder = new QueryBuilder('socialmedias');
$socialMedias  =  $queryBuilder->select("*")->where('cardId', '=', "$cardID")->get();

//CardTheme


$queryBuilderThem = new QueryBuilder('cardthem');
$cardThem = $queryBuilderThem -> select("color,image,title,description") -> where('cardId', '=', "$cardID") -> get();



$data = [
    "socialmedias" => $socialMedias,
    "them" => $cardThem
];

echo json_encode($data);

