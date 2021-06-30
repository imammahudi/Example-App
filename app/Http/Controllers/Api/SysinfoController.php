<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use JWTAuth;
use Illuminate\Support\Facades\DB;

class SysinfoController extends Controller
{   
    public function getSysinfo()
    {
        $testDb = DB::table('users')->get();
        // if(is_null($testDb)) {
        //     return response()->json(['message' => 'Employee Not Found'], 404);
        // }
        return response()->json($testDb, 200);
    }

    public function test(){
        $test = 'Ini adalah percobaan';
        return response()->json($test, 200);
    }

    // function get data sysinfo per id
    public function getSysinfoSite(Request $request, $site_id){
        
        $data = DB::table('sysinfo_data')->where('site_id', $site_id)->get();
        if(is_null($data)) {
            return response()->json(['message' => 'Site ID Not Found'], 404);
        }else{
            return response()->json($data, 200);
        }
    }
}