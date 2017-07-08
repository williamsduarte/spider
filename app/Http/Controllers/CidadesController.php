<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estados;
use App\Cidades;

ini_set('allow_url_fopen', 'on');
set_time_limit(0);
ignore_user_abort(true);

class CidadesController extends Controller
{

    public function create()
    {


    	$estados = Estados::where('status', false)->get();

    	foreach ($estados as $key => $estado) {
	   		
	   		$url = base64_decode($estado->url);
    		$response = simplexml_load_file("compress.zlib://$url");


    		foreach($response->sitemap as $entry) {
 
                Cidades::create([
                    'estado_id' => $estado->id,
                    'url' => base64_encode($entry->loc)
                ]);

                Estados::find($estado->id)->update(['status' => true]);


	        }

	        sleep(180);

    	}        
        
    }

}
