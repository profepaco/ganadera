<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('users.index');
    }

    public function create(){
        return view('users.create');
    }
    
    public function edit(User $usuario){
        return view('users.edit',['user'=>$usuario]);
    }
}
