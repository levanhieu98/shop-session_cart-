<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public $timestamps=false;
    protected $table='product';
    protected $fillable = ['Ten_cproduct', 'price', 'image', 'Trangthai','Id_category','quantity'];

}
