<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $dataTest = Test::all();
        dd($dataTest);
        return view('view', compact('test'));
    }
    
}
