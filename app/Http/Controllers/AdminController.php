<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index()
    {
        return view('admin.login');
    }

    public function login()
    {
        $parameters = request()->validate([
            'username' => ['required','min:3','max:40'],
            'password' => ['required','min:3','max:40']
        ]);

        if(auth()->attempt($parameters)){
            session()->regenerate();

            return redirect('/admin/dashboard');
        }

        return back()->withErrors(['username' => 'Girilen bilgiler eşleşmiyor.']);
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
