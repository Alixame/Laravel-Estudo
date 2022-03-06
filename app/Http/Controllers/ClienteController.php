<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //
    public function index(){
        return view('site.admin.cliente.index');
    }
}
