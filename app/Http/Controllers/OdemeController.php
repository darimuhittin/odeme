<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Odeme;

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
}
