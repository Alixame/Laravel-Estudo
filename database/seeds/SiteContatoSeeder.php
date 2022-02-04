<?php

use App\SiteContato;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $contato = new SiteContato();
        $contato->nome = 'Lucas Alixame';
        $contato->telefone = '17 992162676';
        $contato->email = 'lucasali2003@gmail.com';
        $contato->motivo_contato_id = 1;
        $contato->mensagem = 'Seja bem-vindo ao sistema';
        $contato->save();*/
        factory(SiteContato::class, 100)->create();
        

    }
}
