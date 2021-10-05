<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pesquisa extends Controller
{
    public function index($id){
        $json = file_get_contents("https://dev-survy.xb3solucoes.com.br/rest/survey/".$id."");  
        $data = json_decode($json);

        $dadosid = $id;

      
        if($data->alreadyAnswered){
            return view("pages.questoes", compact('data','dadosid'));
        }
        return view("pages.questoes", compact('data','dadosid'));
    }
}
