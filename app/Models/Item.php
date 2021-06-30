<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Item extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'items';
   
    protected $fillable = [
        'class', 'duration','ne','ne_id','site_name','site_impact','site_sysinfo','2G','3G','4G','kabupaten','2G_coverage','3G_coverage','4G_coverage','rtpo','last_update'
    ];

    public static function getDataRtpo(){
        $data = DB::table('items')->get();
        return $data;
    }
}
