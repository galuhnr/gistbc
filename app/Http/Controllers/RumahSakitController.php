<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RumahSakit;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\Validator;

class RumahSakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= RumahSakit::with('kecamatans')->get();
        return view('rumahsakit.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kec = Kecamatan::all();
        return view('rumahsakit.create', compact('kec'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'id_rs' => 'required',
            'kecamatan_id' => 'required',
            'alamat' => 'required',
            'nama_rs' => 'required',
            'no_tlp' => 'required',
            
        ]);
        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }
        $rs = RumahSakit::create($data);
        return redirect('rumahsakit')->with('toast_success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $kec = Kecamatan::all();
        $data = RumahSakit::with('kecamatans')->findorfail($id);
        return view('rumahsakit.edit', compact('data','kec'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = RumahSakit::findorfail($id);
        $data->update($request->all());
        return redirect('rumahsakit')->with('toast_success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = RumahSakit::findorfail($id);
        $data->delete();
        return back()->with('info', 'Data berhasil dihapus');
    }

    public function dataRS()
    {
        $data= RumahSakit::with('kecamatans')->get();
        $result = json_encode($data);
        echo $result;
    }
}
