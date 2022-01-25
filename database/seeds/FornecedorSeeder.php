<?php

use App\Fornecedor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // PARA FAZER O SEMEAMENTO DE DADOS NO BANCO EXISTEM 3 METODOS

        // 1º METODO -  ATRAVES DO OBJETO DA CLASSE FORNECEDOR
        $fornecedor = new Fornecedor();
        $fornecedor->nome  = 'Fornecedor 123';
        $fornecedor->site  = 'fornecedor123.com.br';
        $fornecedor->uf    = 'SP';
        $fornecedor->email = 'contato@fornecedor123.com.br';
        $fornecedor->save();

        // 2º METODO -  ATRAVES DO METODO ESTATICO CREATE DA PROPRIA CLASSE
        Fornecedor::create([
            'nome'  => 'Fornecedor ABC',
            'site'  => 'fornecedorABC.com.br',
            'uf'    => 'SP',
            'email' => 'contato@fornecedorABC.com.br'
        ]);

        // 3º METODO -  ATRAVES DO PROPRIO INSERT DA CLASSE DB
        //DB::table('fornecedores')->insert([
        //    'nome'  => 'Fornecedor XYZ',
        //    'site'  => 'fornecedorXYZ.com.br',
        //    'uf'    => 'SP',
        //    'email' => 'contato@fornecedorXYZ.com.br'
        //]);

    }
}
