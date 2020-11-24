<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class us_or extends Model
{
    protected $fillable= ['id','id_us','id_or','act_tb'];
    protected $table = 'us_or'; 
}
