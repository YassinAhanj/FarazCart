<?php

namespace App\api;

class JsonWriter
{

    private $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function addContent($data)
    {
        // Read the existing JSON file
        $json = file_get_contents($this->filename);

        // Decode the JSON data into a PHP array
        $arr = json_decode($json, true);

        // Add the new data to the array
        $arr[] = $data;

        // Encode the updated array as JSON
        $json = json_encode($arr, JSON_PRETTY_PRINT, JSON_FORCE_OBJECT);

        // Write the JSON data back to the file
        file_put_contents($this->filename, $json);
    }
    public function updateAllowToJoin($phoneNumber)
    {
        // Read the existing JSON file
        $json = file_get_contents($this->filename);

        // Decode the JSON data into a PHP array
        $arr = json_decode($json, true);

        // Update the "AllowToJoin" variable to true for the specified phone number
        if (isset($arr[0][$phoneNumber])) {
            $arr[0][$phoneNumber]['AllowToJoin'] = true;
        }

        // Encode the updated array as JSON
        $json = json_encode($arr, JSON_PRETTY_PRINT);

        // Write the JSON data back to the file
        file_put_contents($this->filename, $json);
    }
}
