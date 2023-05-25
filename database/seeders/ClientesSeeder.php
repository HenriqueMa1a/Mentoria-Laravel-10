<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    public function run(): void
    {
        Cliente::create(
            [
                'nome'=> 'Henrique Maia',
                'email'=>'henrique@Maia.com',
                'endereco'=>'rua x',
                'logradouro'=>'rua x',
                'cep'=>'2890650',
                'bairro'=>'jardim x',
            ]
        );
        Cliente::create(
            [
                'nome'=> 'Teste Maia',
                'email'=>'henrique@Maia.com',
                'endereco'=>'rua x',
                'logradouro'=>'rua x',
                'cep'=>'2890650',
                'bairro'=>'jardim x',
            ]
        );
    }
}
