@extends('layout.main')

@section('content')
    <h1>Lista de produtos</h1>

        <table class="table table-striped table-bordered table-hover">
            @if(!empty($products))
                <thead>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                    <th>Info</th>
                </thead>
                @foreach($products as $product)
                    <tr class="{{ $product->quantidade <= 1 ? 'danger' : '' }}">
                        <td> {{$product->nome}}</td>
                        <td> {{$product->valor}}</td>
                        <td> {{$product->descricao or 'Sem descrição'}}</td>
                        <td> {{$product->quantidade}}</td>
                        <td> <a href="/product/detail/{{$product->id}}">
                        <span class=" glyphicon glyphicon-search"></span>
                        </a>
                        </td>
                    </tr>
                @endforeach
        </table>
            @else
                <div class="alert alert-danger">  Não possui produtos para listar!!!   </div>
            @endif
            
            @if( $product->quantidade <= 1)
                <h4>
                    <span class="label label-danger pull-right">
                        Um ou mais itens a nível crítico!
                    </span>
                </h4>
            @endif
@endsection