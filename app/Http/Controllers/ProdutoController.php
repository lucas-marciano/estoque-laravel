<?php
namespace estoque\Http\Controllers;

use estoque\Produto;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class ProdutoController extends Controller
{

    public function lista()
    {
        $produtos = Produto::all();
        return view('produto.listagem')->withProdutos($produtos);
    }

    public function mostra($id)
    {
        $resposta = Produto::find($id);
        if (empty($resposta)) {
            return "Esse produto não existe";
        }

        return view('produto.detalhes')->with('p', $resposta);
    }

    public function novo(){
        return view('produto.formulario');
    }

    public function adiciona(){
        $validator = Validator::make(['nome' => Request::input('nome')], ['nome' => 'required|min:5']);

        if ($validator->fails()){
            $messages = $validator->messages();
            return redirect()->action('ProdutoController@novo');
        }

        Produto::create(Request::all());
        return redirect()
            ->action('ProdutoController@lista')
            ->withInput(Request::only('nome'));
    }

    public function remove($id){
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()
            ->action('ProdutoController@lista');
    }

    public function edite(){
        return view('produto.formulario');
    }

    public function editar($id){
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()
            ->action('ProdutoController@lista')
            ->withInput(Request::only('nome'));
    }
}