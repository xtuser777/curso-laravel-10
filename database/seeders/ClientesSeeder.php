<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cliente::create(
        //     [
        //         'nome' => 'Teste 1',
        //         'email' => 't1@gmail.com',
        //         'endereco' => 'rua 1',
        //         'logradouro' => 'rua 1',
        //         'cep' => '217900',
        //         'bairro' => 'jardim 1',
        //     ]
        // );

        // Cliente::create(
        //     [
        //         'nome' => 'Teste 2',
        //         'email' => 't2@gmail.com',
        //         'endereco' => 'rua 2',
        //         'logradouro' => 'rua 2',
        //         'cep' => '227900',
        //         'bairro' => 'jardim 2',
        //     ]
        // );

        Cliente::create(
            [
                'nome' => 'Teste 3',
                'email' => 't3@gmail.com',
                'endereco' => 'rua 3',
                'logradouro' => 'rua 3',
                'cep' => '237900',
                'bairro' => 'jardim 3',
            ]
        );

        Cliente::create(
            [
                'nome' => 'Teste 4',
                'email' => 't4@gmail.com',
                'endereco' => 'rua 4',
                'logradouro' => 'rua 4',
                'cep' => '247900',
                'bairro' => 'jardim 4',
            ]
        );

        Cliente::create(
            [
                'nome' => 'Teste 5',
                'email' => 't5@gmail.com',
                'endereco' => 'rua 5',
                'logradouro' => 'rua 5',
                'cep' => '257900',
                'bairro' => 'jardim 5',
            ]
        );

        Cliente::create(
            [
                'nome' => 'Teste 6',
                'email' => 't6@gmail.com',
                'endereco' => 'rua 6',
                'logradouro' => 'rua 6',
                'cep' => '267900',
                'bairro' => 'jardim 6',
            ]
        );

        Cliente::create(
            [
                'nome' => 'Teste 7',
                'email' => 't7@gmail.com',
                'endereco' => 'rua 7',
                'logradouro' => 'rua 7',
                'cep' => '277900',
                'bairro' => 'jardim 7',
            ]
        );
    }
}
