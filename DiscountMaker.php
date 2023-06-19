<?php

namespace App\api;

class DiscountMaker
{
    private $discount;
    public function __construct()
    {
        $this->makeDiscountCode();
    }

    private function makeDiscountCode()
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

        for ($i = 0; $i < 8; $i++) {
            $this->discount .= $characters[rand(0, strlen($characters) - 1)];
        }
    }

    public function getDiscontCode()
    {
        return $this->discount;
    }
}
