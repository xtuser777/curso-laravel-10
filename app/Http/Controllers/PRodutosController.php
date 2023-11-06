<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Componentes;
use App\Http\Requests\FormRequestProduto;
use Brian2694\Toastr\Facades\Toastr;

class PRodutosController extends Controller
{
    private Produto $produto;
    
    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }

    public function index(Request $request) {
        $pesquisar = $request->pesquisar;
        $find = $this->produto->getProdutosSearchIndex($pesquisar ? $pesquisar : '');

        return view('pages.produtos.pagination', compact('find'));
    }

    public function cadastrarProduto(FormRequestProduto $request)
    {
        if ($request->method() == "POST") {
            // cria os dados
            $data = $request->all();
            $componentes = new Componentes();
            $data['price'] = $componentes->formatacaoMascaraDinheiroDecimal($data['price']);
            Produto::create($data);

            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('produto.index');
        }
        // mostrar os dados
        return view('pages.produtos.create');
    }

    public function atualizarProduto(FormRequestProduto $request, $id)
    {
        if ($request->method() == "PUT") {
            // atualiza os dados
            $data = $request->all();
            $componentes = new Componentes();
            $data['price'] = $componentes->formatacaoMascaraDinheiroDecimal($data['price']);
            $buscaRegistro = Produto::find($id);
            $buscaRegistro->update($data);

            return redirect()->route('produto.index');
        }
        $findProduto = Produto::where('id', '=', $id)->first();

        return view('pages.produtos.update', compact('findProduto'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $product = $this->produto->find($id);
        $product->delete();

        return response()->json(['success' => true]);
    }
}
