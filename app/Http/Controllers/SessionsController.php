<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except(['destroy']);
    }

    public function destroy() {
        auth()->logout();
        return redirect('/');
    }

    public function create(){
        return view('login.create');
    }

    public function store(){
        // Intentar primero
        if(!auth()->attempt(request(['email', 'password']))) {
            return back()->withErrors([
                'message'=>'fallo'
            ]);
        }

        return redirect('/');
    }
}
