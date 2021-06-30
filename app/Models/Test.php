<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Test extends Eloquent
{
    // use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'items';
   
    protected $fillable = [
        'name', 'address','telp'
    ];

    // protected $connection = 'mongodb';
    // protected $colletion = 'data';

    // protected $fillable = [
    //     'first_name','last_name','location','online','followers'
    // ];  
}
