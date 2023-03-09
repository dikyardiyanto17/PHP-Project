<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Customer;

class LandingPage extends Controller
{
    public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function registeruser(Request $request){
        Customer::create($request -> all());
        return redirect()->route('login');
    }
}
