<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('hasilcluster.index2016',compact('data'));
        // return view('hasilcluster.index2016',['collections'=>$data]);
    }

    public function hasil2()
    {
        $result = shell_exec("python " . base_path(). "\python\data2017.py 2>&1");
        $data = json_decode($result);
        return view('hasilcluster.index2017',['collections'=>$data]);
    }

    public function hasil3()
    {
        $result = shell_exec("python " . base_path(). "\python\data2018.py 2>&1");
        $data = json_decode($result);
        return view('hasilcluster.index2018',['collections'=>$data]);
    }

    public function hasil4()
    {
        $result = shell_exec("python " . base_path(). "\python\data2019.py 2>&1");
        $data = json_decode($result);
        return view('hasilcluster.index2019',['collections'=>$data]);
    }
    
    // api
    
    public function result1()
    {
        $result = shell_exec("python " . base_path(). "\python\data2016.py 2>&1");
        echo $result;
    }

    public function result2()
    {
        $result = shell_exec("python " . base_path(). "\python\data2017.py 2>&1");
        echo $result;
    }

    public function result3()
    {
        $result = shell_exec("python " . base_path(). "\python\data2018.py 2>&1");
        echo $result;
    }

    public function result4()
    {
        $result = shell_exec("python " . base_path(). "\python\data2019.py 2>&1");
        echo $result;
    }

    public function dataAll(){
        $result = shell_exec("python " . base_path(). "\python\data2016.py 2>&1");
        $data = json_decode($result);
        $result1 = shell_exec("python " . base_path(). "\python\data2017.py 2>&1");
        $data1 = json_decode($result1);
        $result2 = shell_exec("python " . base_path(). "\python\data2018.py 2>&1");
        $data2 = json_decode($result2);
        $result3 = shell_exec("python " . base_path(). "\python\data2019.py 2>&1");
        $data3 = json_decode($result3);

        $ss = json_encode(array_merge($data,$data1,$data2,$data3));
        echo $ss;
    }

}
