<?php
require_once "./vendor/autoload.php";

use App\api\Builder\QueryBuilder;
use App\api\RandomDigitGenerator;
use App\api\SendingSMS;



header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: GET,POST');
$accessToken = $_SERVER['HTTP_AUTHORIZATION'];

$json = file_get_contents('php://input');
$data = json_decode($json);
$code = $data->number;
$result = "";
$token = $headers["Authorization"];
if ($code != "") {
    $builder = new QueryBuilder('contacts');
    $userCode = $builder->select("code")->where("phoneNumber", "=", "$accessToken")->get();

    if ($code == $userCode) {
        $result = [
            'situation' => "Allow"
        ];
        $builder->insert($data)->execute();
        $result = json_encode($result['situation']);
    } else {
        $result = [
            'situation' => "NotAllow"
        ];
        $builder->insert($data)->execute();
        $result = json_encode($result['situation']);
        echo $result;
        die;
    }
} else {
    $error = array("error" => "Missing credentials");
    $jsonError = json_encode($error);
    echo $jsonError;
    die;
}
