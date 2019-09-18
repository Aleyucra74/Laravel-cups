<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Categoria;

class ProdutosController extends Controller
{
    public function index(){

        // Carregar os produtos da base de dados
        $produtos = Produto::paginate(2);

        // Retortar a view com os produtos levantados
        return view('produtos.index', compact('produtos'));

    }

    public function show($id){
        // Carregar o produto da base de dados
        $produto = Produto::find($id);

        // Retortar a view com os produtos levantados
        return view('produtos.show', compact('produto'));
    }

    public function edit($id){
        // Carregar o produto da base de dados
        $produto = Produto::find($id);

        //carregar as categorias do BD
        $categorias = Categoria::all();

        // Retortar a view com os produtos levantados
        return view('produtos.edit', compact('produto','categorias'));
    }

    public function update($id){
        //validar o request
        request()->validate(
            [
                'nome'=>'required',
                'categoria'=>'required',
                'preco'=>'required|gte:0|lt:999.99',
                'quantidade'=>'required|gt:0|lt:1000'
            ]
        );

        //carregando o produto do BD
        $produto = Produto::find($id);
        // dd(request('nome'));
        //alterar os valores do produto
        $produto->nome = request('nome');
        $produto->preco = request('preco');
        $produto->quantidade = request('quantidade');
        $produto->id_categoria = request('categoria');
        
        //salvar as alteracoes no BD
        $produto->save();

        //redirecionar para a lista de produtos
        return redirect('/produtos');

    }

    public function create(){

        //carregar as categorias do BD
        $categorias = Categoria::all();

        //return redirect('/produtos/create');
        return view('produtos.create',compact('categorias'));
    }

    public function store(){
         //criar um novo produto
         $p = new Produto();

         //popular os valores do produto
        $p->nome = request('nome');
        $p->preco = request('preco');
        $p->quantidade = request('quantidade');
        $p->id_categoria = request('categoria');

         //salvar o novo produto no BD
         $p->save();
 
         //redirecionar para a lista de produtos
         return redirect('/produtos');
    }
}