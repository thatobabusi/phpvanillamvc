<?php

class API {

    public const API_URL = "https://honiball.anewspring.com/api/";
    public const API_KEY = "367ad4e6-431e-43c7-b99a-9426f232b732";

    public function callAPI($url, $method, $data)
    {
        $api_key = self::API_KEY;
        $api_url = self::API_URL;

        $curl = curl_init();

        switch ($method)
        {
            case "POST":

                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                }
                break;

            case "PUT":

                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                }
                break;

            default:

                if ($data) {
                    $url = sprintf("%s?%s", $url, http_build_query($data));
                }
        }

        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);

        curl_setopt($curl, CURLOPT_HTTPHEADER,
            [
                "X-API-Key: $api_key",
                'Content-Type: application/json',
            ]
        );

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

        // EXECUTE:
        $result = curl_exec($curl);

        if(!$result){
            die("Connection Failure");
        }

        curl_close($curl);

        return $result;
    }
}