<?php
require_once "../vendor/autoload.php";

use App\api\Builder\QueryBuilder;
use App\api\RandomDigitGenerator;
use App\api\SendingSMS;



header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type,');
header('Access-Control-Allow-Methods: GET,POST');

$json = file_get_contents('php://input');
$data = json_decode($json);
$number = $data->user;
$result = "";

if ($number != "") {
    $builder = new QueryBuilder('contacts');
    $user = $builder->select("phoneNumber")->where("phoneNumber", "=", "$number")->get();

    if ($user) {
        $randomNumberGenerate = new RandomDigitGenerator();
        $randomNumber = $randomNumberGenerate->get();
        //---------------SMS GENERATOR
        $sms = new SendingSMS($number, $randomNumber);
        $sms->sendingMessage();
        $data = [
            'code' => "$randomNumber",
        ];
        $builder->update($data)->where('phoneNumber', '=', $number)->execute();
        $result = json_encode($user);
        echo $result;
        die;
    } else {
        $randomNumberGenerate = new RandomDigitGenerator();
        $randomNumber = $randomNumberGenerate->get();
        //---------------SMS GENERATOR
        $sms = new SendingSMS($number, $randomNumber);
        $sms->sendingMessage();
        $data = [
            'phoneNumber' => $number,
            'code' => $randomNumber,
            'date_person' => date('Y-m-d H:i:s'),
        ];
        $builder->insert($data)->execute();
        $result = json_encode($data['phoneNumber']);
        echo $result;
        die;
    }
} else {
    $error = array("error" => "Missing credentials");
    $jsonError = json_encode($error);
    echo $jsonError;
    die;
}
