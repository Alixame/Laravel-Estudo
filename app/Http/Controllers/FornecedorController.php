<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller{


    public function index(){

        return view('site.admin.fornecedor.index');

    }

    public function listar(){

        return view('site.admin.fornecedor.listar');

    }

    public function adicionar(){

        return view('site.admin.fornecedor.adicionar');

    }

}