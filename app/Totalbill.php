<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Totalbill extends Model
{
    public $timestamps=false;
    protected $table='totalbill';
    protected $fillable = ['Name_product', 'price', 'quantity', 'Id_bill'];
}
