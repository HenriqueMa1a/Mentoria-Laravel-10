<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }
    public function index(Request $request)
    {
        $pesquisar = $request->pesquisar;
        $findCliente = $this->cliente->getClientesPesquisarIndex(search: $pesquisar ?? '');

        return view('pages.clientes.paginacao', compact('findCliente'));
    }

    public function delete(Request $request)
    {
        $id = $request->id; // idDoRegistro
        $buscaRegistro = Cliente::find($id);
        $buscaRegistro->delete();
        return response()->json(['sucess' => true]);
    }

    public function cadastrarCliente(Request $request)
    {
        if ($request->method() == 'POST') {
            //cria os dados
            // dd($request->all());
            $data = $request->all();
            dd($data);
            Cliente::create($data);

            Toastr::success('Gravado com sucesso');
            return redirect()->route('produto.index');
        }

        return view('pages.clientes.create');
    }
    public function atualizarCliente(Request $request, $id)
    {
        if ($request->method() == 'PUT') {
            //atualiza os dados
            $data = $request->all();
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
            $buscaRegistro     = Cliente::find($id);
            $buscaRegistro->update($data);

            return redirect()->route('produto.index');
        }
        $findProduto = Cliente::where('id', '=', $id)->first();

        return view('pages.clientes.atualiza', compact('findProduto'));
    }
}
