<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller{


    public function index(){

        $fornecedores = [
            
            0 => [
                "nome"   => "Lucas Alixame",
                "cnpj"   => "000.000.000-00",
                "status" => "N"
            ],
            
            1 => [
                "nome"   => "Andre Teste",
                "cnpj"   => "",
                "status" => "N"
            ]

        ];

        return view('site.app.fornecedor.index', compact('fornecedores'));

    }

}