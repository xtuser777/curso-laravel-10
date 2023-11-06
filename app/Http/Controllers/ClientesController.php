<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestClientes;
use App\Models\Cliente;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    private Cliente $cliente;
    
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index(Request $request) {
        $pesquisar = $request->pesquisar;
        $find = $this->cliente->getClientesPesquisarIndex($pesquisar ? $pesquisar : '');

        return view('pages.clientes.pagination', compact('find'));
    }

    public function cadastrarCliente(FormRequestClientes $request)
    {
        if ($request->method() == "POST") {
            // cria os dados
            $data = $request->all();
            Cliente::create($data);

            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('cliente.index');
        }
        // mostrar os dados
        return view('pages.clientes.create');
    }

    public function atualizarCliente(FormRequestClientes $request, $id)
    {
        if ($request->method() == "PUT") {
            // atualiza os dados
            $data = $request->all();
            $buscaRegistro = Cliente::find($id);
            $buscaRegistro->update($data);

            return redirect()->route('cliente.index');
        }
        $find = Cliente::where('id', '=', $id)->first();

        return view('pages.clientes.update', compact('find'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $cliente = $this->cliente->find($id);
        $cliente->delete();

        return response()->json(['success' => true]);
    }
}
