<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //NÃO É OBRIGATÓRIO, MAS CASO O NOME DA TABELA SEJA DIFERENTE DA CLASSE É NECESSÁRIO
    protected $table = 'produtos';

    public $timestamps = false;
}
