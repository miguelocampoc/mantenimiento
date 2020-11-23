<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class equipos extends Model
{
    protected $fillable= ['id','integrante1','integrante2','integrante3'];

    protected $table = 'equipos';  
}
