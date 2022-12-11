<?php

use GuzzleHttp\Psr7;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

if (!function_exists('makeApiCalls')) {
    function makeApiCalls($url_params)
    {
        try {
            $client = new Client();

            $apiRequest = $client->request('GET', config('app.news_api_url') . $url_params . '&apiKey=' . config('app.news_api_key'));

            return json_decode($apiRequest->getBody()->getContents(), true);
        } catch (RequestException $e) {
            //For handling exception
            echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\str($e->getResponse());
            }
        }
    }
}
