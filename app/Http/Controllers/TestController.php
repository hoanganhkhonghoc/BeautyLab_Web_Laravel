<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(){
        return view("Test/viewA");
    }
    public function testA(){
        return view("Test/viewB");
    }
}
