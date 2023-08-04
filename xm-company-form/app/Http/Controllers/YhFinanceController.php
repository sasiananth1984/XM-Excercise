<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class YhFinanceController extends Controller
{
    public function getHistoricalData($data)
    {
        //pass data values to load the Json Data

        $loadJson = $this->loadJson($data); //load Json Data Function

        if (!empty($loadJson['prices'])) {
            $showPricevalues = $loadJson['prices'];
            return view('financeview', ['data' => $loadJson['prices']]);
        } else {
            return view('nodataview');
        }
    }
    public function loadJson($data)
    {
        $resultdata = array();
        $client = new Client();
        $url = "https://yh-finance.p.rapidapi.com/stock/v3/get-historical-data";
        if (!empty($data)) {
            $query = [
                "symbol" => $data['symbol'],  // Replace with the desired company symbol
                "from" => $data['from'],  // Replace with your desired start date
                "to" => $data['to'],    // Replace with your desired end date
            ];
            $headers = [
                "X-RapidAPI-Host" => "yh-finance.p.rapidapi.com",
                "X-RapidAPI-Key" => "718e740eb5msh324058fcc33b942p1ea258jsn40554e3d8efe",  // Replace with your RapidAPI key
            ];
            $response = $client->request("GET", $url, [
                "headers" => $headers,
                "query" => $query,
            ]);
            $resultdata = json_decode($response->getBody(), true);
        }
        return $resultdata;
    }
}
