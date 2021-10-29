<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller{


    public function index(){

        $fornecedores = [
            
            0 => [
                "nome"     => "Lucas Alixame",
                "cnpj"     => "000.000.000-00",
                "status"   => "N",
                "ddd"      => "17", // Rio Preto (SP)
                "telefone" => "99216-2676"
            ],
            
            1 => [
                "nome"     => "Andre Teste",
                "cnpj"     => "",
                "status"   => "N",
                "ddd"      => "85", // Fortaleza (CE)
                "telefone" => "00000-0000"
            ]

        ];

        return view('site.app.fornecedor.index', compact('fornecedores'));

    }

}