<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherAPIController extends Controller
{
    public function get_weather(){
        $apiKey = "68a5ad94db2c0a172f2258f76ec4daa8";
        $response = Http::get("http://api.openweathermap.org/data/2.5/weather?q=Dhaka&units=metric&appid={$apiKey}");
        $response = json_decode($response->getBody());
        // dd($response);
        if($response){
            return view('weather.weather',['weather_data' => $response]);
        }else{
            return "The API Data can't retrive successfully";
        }
        
    }
}
