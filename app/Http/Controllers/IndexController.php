<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Modelos\Producto;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;

class IndexController extends Controller
{
    public function index(){
        return view('frontend.index')->with([
            'productos' => Producto::all()
        ]); 
    }
}
