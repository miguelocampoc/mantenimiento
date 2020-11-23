<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orden extends Model
{
    protected $fillable= ['id','id_mq','fecha_in','fecha_fn', 'descripcion'];
     protected $table = 'ordenes';  
}
