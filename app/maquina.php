<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class maquina extends Model
{
    protected $fillable= ['id','placa','marca','modelo','cilindraje','motor','chasis'];

    protected $table = 'maquinas'; 
}
