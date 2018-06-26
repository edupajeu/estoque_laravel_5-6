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

        return view('product.sucess', ['name' => $name]);
    }
}