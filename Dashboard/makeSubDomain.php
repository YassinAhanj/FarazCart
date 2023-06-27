<?php

use App\api\Builder\QueryBuilder;


require_once "../vendor/autoload.php";

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET,POST');
$accessToken = $_SERVER['HTTP_AUTHORIZATION'];

$json = file_get_contents('php://input');
$data = json_decode($json);
$subDomain = $data->subDomain;

//insert into card

$query = new QueryBuilder('cards');
$query->select("card_name")->where("card_name", "=", "$subDomain");
if (empty($query)) {
    $dataComplete = [
        'contact_id' => $accessToken,

    ];
    $query->insert($dataComplete)->execute();
}else{
    echo "Enter Another Subdomain";
}
