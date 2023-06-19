<?php

namespace App\api;

use Melipayamak\MelipayamakApi;

class SendingSMS
{
    private const URL = 'https://console.melipayamak.com/api/send/shared/1805a4cbca724e0097a21982b03b6744';
    private $number;
    private $code;

    public function __construct($number, int $code)
    {
        $this->number = $number;
        $this->code = $code;
    }

    public function sendingMessage()
    {
        $data = array('bodyId' => 132332, 'to' => "$this->number", 'args' => ["$this->number", "$this->code"]);
        $data_string = json_encode($data);
        $ch = curl_init(self::URL);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

        // Next line makes the request absolute insecure
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Use it when you have trouble installing local issuer certificate
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string)
            )
        );
        $result = curl_exec($ch);
        curl_close($ch);
    }
}
