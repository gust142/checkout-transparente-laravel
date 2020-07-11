<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
class HomeController extends Controller
{
    public function index(){
        $produto= new Produto();
        $lista = $produto->lista();
        return view('home.index',compact('lista'));
    }

    public function lista(){

    }

    public function add(){

    }

    public function checkout(){

    }
}
