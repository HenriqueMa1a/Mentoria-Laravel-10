<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }
    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $findProduto = $this->produto->getProdutosPesquisarIndex(search: $pesquisar ?? '');

        return view('pages.produtos.paginacao', compact('findProduto'));
    }

    public function delete(Request $request)
    {
        $id = $request->id; // idDoRegistro
        $buscaRegistro = Produto::find($id);
        $buscaRegistro->delete();
        return response()->json(['sucess' => true]);
    }

    public function cadastrarProduto(Request $request)
    {
        if ($request->method() == 'POST') {
            //cria os dados
            // dd($request->all());
            $data = $request->all();
            Produto::create($data);

            return redirect()->route('produto.index');
        }

        return view('pages.produtos.create');
    }
}