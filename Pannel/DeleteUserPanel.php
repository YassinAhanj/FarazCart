<?php

use App\api\Builder\QueryBuilder;

require_once "./vendor/autoload.php";

$token = $headers["Authorization"];
$queryBuilder = new QueryBuilder('cards');

$queryBuilder->where('cardId', '=', $token)->delete()->executeDelete();
