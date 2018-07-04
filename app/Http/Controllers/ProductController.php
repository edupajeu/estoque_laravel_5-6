<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Request;

class ProductController extends Controller{

    public function list(){
        
        $products = DB::select('select * from produtos');

        return view('product.listing', ['products' => $products]);
    }
    
    
    public function show($id){
        
        $detail = DB::select('select * from produtos where id = ? ', [$id]);
        // ESSA CONDIÇÃO NUNCA VAO ACONTECER POIS TODOS OS PRODUTOS POSSUEM ID
        if(empty($id)){
            
            return "Esse produto não possui detalhes";
        }
        else{
            
            return view('product.detail', ['detail' => $detail[0]]);
        }
    }

    public function new(){
    
        return view('product.form');
    }

    public function add(){

        // BUSCA TODAS A VARIAVEIS DO FORM
        // $all = Request::all();
        // BUSCA VARIAVEIS ESPECIFICAS DO FORM
        // $only = Request::only('name', 'price', '...');

        $name = Request::input('name');
        $price = Request::input('price');
        $description = Request::input('description');
        $amount = Request::input('amount');
    
        DB::insert('insert into produtos values(null, ?, ?, ?, ?)', 
        array($name, $price, $description, $amount));

        //REDIRECIONA PARA VIEW DE LISTAGEM
        return redirect('product')->action('ProductController@list')->withInput(Request::only('name'));
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
    
    DB::select('select * from produtos where id = ? ', [$id])->delete();
    // DB::table('produtos')->where('votes', '>', 100)->delete();

    return redirect()->action('ProductController@list}')->withInput(Request::only('name'));
    }
}