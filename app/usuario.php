<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    protected $fillable= ['id','cedula','nombre','apellido','email','contacto'];

    protected $table = 'usuarios';  
}
