<?php 

require_once "../vendor/autoload.php";

use App\api\Builder\QueryBuilder;
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Access-Control-Allow-Methods: GET,POST');
$accessToken = $_SERVER['HTTP_AUTHORIZATION'];
$json = file_get_contents('php://input');
$data = json_decode($json);
$name = $data->name;
$description = $data->description;
$image = $data->image;
$queryBuilder = new QueryBuilder('cards');
$data = [
    'name_person' => "$name",
    'description' => "$description",
    'card_image' => "$image",
];
$builder->update($data)->where('phoneNumber', '=', $accessToken)->execute();

$path = ".././farzcart/public/images";
$photoUploader = new PhotoUploader($path);
$photoUploader -> upload($image);
