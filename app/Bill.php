<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public $timestamps=false;
    protected $table='bill';
    protected $fillable = ['Name', 'Date', 'Addrees', 'Totalprice','Trangthai','id'];
}
