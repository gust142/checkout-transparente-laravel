<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
   public function index(){

        return view('auth.login');
   }

   public function login(Request $request){
        $dados = $request->all();
        if(Auth::attempt(['email'=>$dados['email'],'password'=>$dados['password']])){
            return redirect()->route('homepage');
        }else{
            return redirect()->route('login');
        }

        
       
   }

   public function logout(Request $request)
   {
       Auth::logout();
        $request->session()->forget('carrinho');

        $request->session()->flush();
       return redirect()->route('login');
   }
}
