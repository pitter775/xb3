<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class Pesquisa extends Controller
{
    public function index($id){

        try{
            $json = file_get_contents("https://survy.xb3solucoes.com.br/rest/survey/".$id."");              
            $data = json_decode($json);  
            if($data == null){
                return 'teste';
            }  
            $dadosid = $id;
            return view("pages.questoes", compact('data','dadosid'));
        }catch(Exception $ex){
            $data = '';    
            $dadosid = '';
            return view("pages.questoes_ok2", compact('data','dadosid'));
        }
    }
}
