@extends('layout.main')

    @section('content')
     <h1>Detalhes do produto: <strong>{{$detail->nome}}</strong></h1>

        <ul>
            <li><b>Valor: </b>{{$detail->valor}}</li>
            <li><b>Descrição: </b> {{$detail->descricao}}</li>
            <li><b>Quantidade: </b> {{$detail->quantidade}}</li>
            
        </ul>
    @endsection