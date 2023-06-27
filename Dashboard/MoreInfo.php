<?php 


use App\api\Builder\QueryBuilder;

require_once "../vendor/autoload.php";

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Access-Control-Allow-Methods: GET,POST');
$accessToken = $_SERVER['HTTP_AUTHORIZATION'];

$queryBuilder = new QueryBuilder('cards');

$cards = $queryBuilder -> select('cardId ') -> where("contact_id" , "=" , "$accessToken") -> where("payed" , "=" , "true") -> get();
//Profile 

$queryBuilderProf = new QueryBuilder('contacts');
$profile = $queryBuilder -> select('phoneNumber , Adress , firstName , lastName , subDomains , date_person') -> where("contact_id" , "=" , "$accessToken") -> get();

$data = [
    'cards' => "$cards",
    'profile' => "$profile"
];
echo json_encode($data);