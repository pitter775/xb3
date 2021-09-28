<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pesquisa extends Controller
{
    public function index($id){
        $json = file_get_contents("https://dev-survy.xb3solucoes.com.br/rest/survey/6152eeeae4b0c35f94693f16");  
        $data = json_decode($json);


        return view("pages.questoes", compact('data'));
    }
}
