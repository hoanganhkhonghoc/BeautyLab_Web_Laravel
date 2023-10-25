<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;

class SiteHomeController extends Controller
{
    /*
    function: index (show view home site)
    @redirect: /site/home
    @methods: get
    @return: view("site/Home/home")
    */
    public function index(){
        return view("site/Home/home");
    }
}
