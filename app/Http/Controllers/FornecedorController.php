<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller{


    public function index(){

        return view('site.admin.fornecedor.index');

    }

    public function listar(Request $request){

        $fornecedores = Fornecedor::where('nome', 'like','%'.$request->input('nome').'%')
        ->where('site', 'like','%'.$request->input('site').'%')
        ->where('uf', 'like','%'.$request->input('uf').'%')
        ->where('email', 'like','%'.$request->input('email').'%')
        ->get();

        return view('site.admin.fornecedor.listar', ['fornecedores' => $fornecedores]);

    }

    public function adicionar(Request $request){

        $msg = '';

        // Adição
        if($request->input('_token') != '' && $request->input('id') == ''){
            // Validação
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email',
            ];

            $feedbacks = [
                'required' => 'O Campo :attribute deve ser preenchido',
                'nome.min' => 'O Campo nome deve ter no minimo 3 caracteres',
                'nome.max' => 'O Campo nome deve ter no maximo 40 caracteres',
                'uf.min' => 'O Campo uf deve ter no minimo 2 caracteres',
                'uf.max' => 'O Campo uf deve ter no maximo 2 caracteres',
                'email.email' => 'O Campo email deve ser informado corretamente'
            ];

            $request->validate($regras, $feedbacks);

            $fornecedor = new Fornecedor();

            $fornecedor->create($request->all());

            $msg = "Fornecedor Cadastrado com Sucesso!";
        }

        // Edição
        if($request->input('_token') != '' && $request->input('id') != ''){
            
            $fornecedor = Fornecedor::find($request->input('id'));

            $update = $fornecedor->update($request->all());

            if($update){
                $msg = 'Update realizado com sucesso';
            } else {
                $msg = 'Erro do update';
            }

            return redirect()->route('admin.fornecedor.editar', ['id' => $request->input('id'),'msg' => $msg]);

        }

        return view('site.admin.fornecedor.adicionar', ['msg' => $msg]);

    }

    public function editar($id, $msg = ''){
        
        $fornecedor = Fornecedor::find($id);

        return view('site.admin.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);

    }

}