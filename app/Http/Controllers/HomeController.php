<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pemetaan.v_peta2016');
    }

    public function peta_2017()
    {
        return view('pemetaan.v_peta2017');
    }

    public function peta_2018()
    {
        return view('pemetaan.v_peta2018');
    }

    public function peta_2019()
    {
        return view('pemetaan.v_peta2019');
    }

    public function grafik()
    {
        return view('grafik.index');
    }
}
