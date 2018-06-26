@extends('layout.main')

    @section('content')
     <h1> Incluir novo produto</h1>

     <form action="/product/add" method="post">
        {{-- TOKEN DE VALIDAÇÃO DO LARAVEL --}}
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

         <div class="form-group">
             <label>Nome</label>
             <input name="name" class="form-control">
         </div>
         <div class="form-group">
             <label>Valor</label>
             <input name="price" class="form-control">
         </div>
         <div class="form-group">
             <label>Descrição</label>
             <input name="description" class="form-control">
         </div>
         <div class="form-group">
             <label>Quantidade</label>
             <input type="number" name="amount" class="form-control">
         </div>
         <button type="submit" class="btn btn-primary btn-block">Enviar</button>
     </form>

    @endsection