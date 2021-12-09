<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Odeme;
use App\Models\Cari;

class OdemeController extends Controller
{
    //
    public function index()
    {
        return "show all";
    }

    public function show(Odeme $odeme)
    {
        return "odeme kodu : " + $odeme->code;
    }

    public function create(Cari $cari)
    {
        return view('admin.create-odeme',[
            'cari' => $cari
        ]);
    }

    public function store(Cari $cari)
    {
        $faker = \Faker\Factory::create();
        Odeme::create([
            'kod' => $faker->regexify('[A-Z]{16}'),
            'tutar' => request('tutar'),
            'cari_id' => $cari->id
        ]);

        return redirect('/admin/cariler')->with('message','Ödeme oluşturma başarılı.');
    }
}
