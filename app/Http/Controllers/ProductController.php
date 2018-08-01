<?php
namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Support\Facades\DB;
use Request;

class ProductController extends Controller{

    public function list(){
        
//        $products = DB::select('select * from produtos'); // CÓDIGO SEM ELOQUENT
        $products = Produto::all();

        return view('product.listing', ['products' => $products]);
    }
    
    
    public function show($id){
        
//        $detail = DB::select('select * from produtos where id = ? ', [$id]); // CÓDIGO SEM ELOQUENT
        $id = Request::route('id');
        $detail = Produto::find($id);

        // ESSA CONDIÇÃO NUNCA VAO ACONTECER POIS TODOS OS PRODUTOS POSSUEM ID
        if(empty($id)){
            
            return "Esse produto não possui detalhes";
        }
        else{
            
            return view('product.detail', ['detail' => $detail]);
        }
    }

    public function new(){
    
        return view('product.form');
    }

    public function add(){

        // BUSCA TODAS A VARIAVEIS DO FORM
        // $all = Request::all();
        // BUSCA VARIAVEIS ESPECIFICAS DO FORM
        // $only = Request::only('name', 'price', '....');

        $produto = new Produto();
        //INSTACIANDO A VARIÁVEL PRODUTO

        $produto->nome = Request::input('nome');
        $produto->preco = Request::input('preco');
        $produto->descricao = Request::input('descricao');
        $produto->quantidade = Request::input('quantidade');

        $produto->save();

//        DB::insert('insert into produtos values(null, ?, ?, ?, ?)',  // CÓDIGO SEM ELOQUENT
//        array($name, $price, $description, $amount));

        //REDIRECIONA PARA VIEW DE LISTAGEM
        return redirect(route('product.list'))->withInput(Request::only('name'));
        /* DA FORMA "->withInput()" PEGA TODOS OS PARAMENTRO 
           DA REQUISIÇÃO ANTERIOR PARA PEGAR SOMENTE UM CAMPO É 
           NECESSÁRIO Request::only('name') 
        */

    }

    public function json(){
    
    $products = DB::select('select * from produtos');
    //IMPRIME A VARIAVEL NO FORMATO JSON
    return response()->json($products);
    }

    public function remove($id){

//        $delete = DB::select('select * from produtos where id = ? ', [$id]); // CÓDIGO SEM ELOQUENT
        $id = Request::route('id');
        $delete = Produto::find($id);
//        dd($delete['']);

         DB::delete($delete);
    // DB::table('produtos')->where('votes', '>', 100)->delete();

    return redirect('product.list')->withInput(Request::only('name'));
    }
}