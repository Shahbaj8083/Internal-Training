<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function index(){
        return view('form');
    }
    // public function about(){
    //     return view('about');
    // }

    public function register(Request $request){

        $request->validate(
        [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' =>'required'

        ]
        );

        echo "<pre>";
        print_r($request->all());
    }
}
