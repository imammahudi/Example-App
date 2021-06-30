<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Autoload extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'autoload';
   
    protected $fillable = [
        'A_2G', 'A_3G','A_4G','C_2G','C_3G','C_4G','ne','site','rtpo','last_update','total_impact_ne','total_impact_site','total_sysinfo_ne','total_sysinfo_site'
    ];
}
