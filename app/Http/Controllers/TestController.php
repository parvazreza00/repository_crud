<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function index(){
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $data = json_decode($response->body(), true);
        // dd($data);
        return view('api.api_data', [
            'data' => $data
        ]);
        
        
    }

    public function store(){
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $jsonData = $response->json();  
           
        print_r($jsonData);
    }
    public function update(){
        $response = Http::put('https://jsonplaceholder.typicode.com/posts/1', [
            'title' => 'This is test from ItSolutionStuff.com',
            'body' => 'This is test from ItSolutionStuff.com as body',
        ]);
        $jsonData = $response->json(); 
        echo "<pre>";       
        print_r($jsonData);
    }
    public function delete(){
        $response = Http::delete('https://jsonplaceholder.typicode.com/posts/1', [
            'title' => 'This is test from ItSolutionStuff.com',
            'body' => 'This is test from ItSolutionStuff.com as body',
        ]);
        $jsonData = $response->json(); 
        echo "<pre>";       
        print_r($jsonData);

    }
    public function allContorllerMehtod(){
        $response = Http::withHeaders([
            'Authorization' => 'token',
        ])->get('https://jsonplaceholder.typicode.com/posts');
        $jsonData = $response->json();
        // echo "<pre>";
        // print_r($jsonData);
        echo "<pre> Status: ";
        print_r($response->status());
        echo "<br>";
        echo "<pre> Ok: ";
        print_r($response->ok());
        echo "<br>";
        echo "<pre> successfull: ";
        print_r($response->successful());
        echo "<br>";
        echo "<pre> serverError:";
        print_r($response->serverError());
        echo "<br>";
        echo "<pre> clientError:";
        print_r($response->clientError());
        echo "<br>";
        echo "<pre> headers:";
        print_r($response->headers());
        echo "<br>";

    }
}
