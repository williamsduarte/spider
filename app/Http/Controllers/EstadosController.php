<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use App\Estados;

ini_set('allow_url_fopen', 'on');

class EstadosController extends Controller
{

    public function create()
    {

        $sitemap = base64_decode('aHR0cDovL3d3dy5ndWlhbWFpcy5jb20uYnIvc2l0ZW1hcC1nZXJhbC54bWwuZ3o=');

        $response = simplexml_load_file("compress.zlib://$sitemap");

        foreach($response->sitemap as $entry) {

            if(stripos($entry->loc, "/busca/") !==false) {

                $exp = explode("/", $entry->loc);
 
                Estados::create([
                    'name' => $exp[5],
                    'url' => base64_encode($entry->loc)
                ]);

            }

        }
        
    }

}
