<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('user.index');
    }

    public function store(Request $request){
        $validate= $request->validate([
            'name' => 'required',
            'waifu' => 'required',
            'email' => 'required',
            'alamat' => 'required',
        ]);
        $data=$validate;

        return view('user.show')->with('data',$data);
    }
}
