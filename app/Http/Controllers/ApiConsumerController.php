<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiConsumerController extends Controller
{
    //1-> Pedimos los UIDs al proveedor

    public function callExternalApi()
    {
        $response = Http::acceptJson()
            ->get('http://127.0.0.1:8001/api/employee-uuids');

        //2-> Si llegó bien, los convertimos en array PHP

        if ($response->successful()) {
            $data = $response->json(); // (E001, E002...)
            //3-> Los enviamos a la vista
            return view('moods.index', compact('data'));
        }

        //4-> Si algo falla, lanzamos un error
        abort(500, 'Falló la llamada al Proveedor');
    }
}
