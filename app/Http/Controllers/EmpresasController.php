<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cidades;
use App\Empresas;

ini_set('allow_url_fopen', 'on');
set_time_limit(0);
ignore_user_abort(true);

class EmpresasController extends Controller
{

    public function create()
    {


    	$cidades = Cidades::where('status', false)->get();

    	foreach ($cidades as $key => $cidade) {
	   		
	   		$url = base64_decode($cidade->url);
    		$response = simplexml_load_file("compress.zlib://$url");

    		foreach($response->url as $entry) {
 
                Empresas::create([
                    'estado_id' => $cidade->estado_id,
                    'cidade_id' => $cidade->id,                    
                    'url' => base64_encode($entry->loc)
                ]);

               Cidades::find($cidade->id)->update(['status' => true]);


	        }

	        sleep(120);

    	}        
        
    }

}
