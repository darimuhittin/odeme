<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cari;

class CariController extends Controller
{
    //
    public function index()
    {
        return view('admin.cariler',[
            'cariler' => Cari::all()
        ]);
    }

    public function create()
    {
        return view('admin.create-cari');
    }

    public function store()
    {
        $vars = request()->validate([
            'ad' => ['required','min:3','max:255'],
            'telefon' =>['required','min:3','max:255'],
            'email' => ['email','required'],
            'slug' => ['required'],
        ]);

        Cari::create($vars);

        return redirect('/admin/cariler')->with('message','Cari oluşturma başarılı.');
    }
}
