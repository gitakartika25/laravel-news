<?php
namespace App\Http\Controllers;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class NewsController extends Controller
{
public function getData(){
 $client = new Client();
 $request = $client->get('https://newsapi.org/v2/top-headlines?country=id&apiKey=bfb588afa882467182c8d41750e6134d');
 $response = $request->getBody();
 $result = json_decode($response);
 return view('home',['artikel'=>$result->articles]);
}

 public function searchData(Request $request){
 $client = new Client();
 $query = $request->keyword;
 $req = $client->get('https://newsapi.org/v2/top-headlines?country=id&apiKey=bfb588afa882467182c8d41750e6134d'.$query);
 $response = $req->getBody();
 $result = json_decode($response);
 return view('home',['artikel'=>$result->articles]);
}

}
