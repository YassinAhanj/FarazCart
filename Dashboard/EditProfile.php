<?php
require_once "../vendor/autoload.php";

use App\api\Builder\QueryBuilder;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Access-Control-Allow-Methods: GET,POST');
$accessToken = $_SERVER['HTTP_AUTHORIZATION'];
$json = file_get_contents('php://input');
$data = json_decode($json);
$firstName = $data->firstName;
$lastName = $data->lastName;
$Adress = $data->Adress;
$PhoneNumber = $data->Phone;
$queryBuilder = new QueryBuilder('cards');
$data = [
    'Adress' => "$Adress",
    'firstName' => "$firstName",
    'lastName' => "$lastName",
    'phoneNumber' => "$PhoneNumber"
];
$builder->update($data)->where('phoneNumber', '=', $accessToken)->execute();
