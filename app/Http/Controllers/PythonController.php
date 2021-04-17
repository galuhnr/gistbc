<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\DB;

class PythonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hasil1()
    {
        $result = shell_exec("python " . base_path(). "\python\data2016.py 2>&1");
        $data = json_decode($result);
        return view('hasilcluster.index2016',['collections'=>$data]);
    }

    
}
