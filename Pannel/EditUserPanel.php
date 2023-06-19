<?php

use App\api\Builder\QueryBuilder;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET,POST');

$json = file_get_contents('php://input');
$data = json_decode($json);
$namePerson = $data->name;
$description = $data->description;
$image = $data->image;
$payed = $data->payed;
$queryBuilder = new QueryBuilder('cards');
$data = [
    'name_person' => "$namePerson",
    'description' => "$description",
    'card_Image' => "$image",
    'card_Image' => "$payed"
];
$builder->update($data)->where('phoneNumber', '=', $number)->execute();
