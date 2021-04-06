<?php

namespace App\Http\Controllers;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\KecamatanResource;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datakec = Kecamatan::all();
        return view('layouts_kecamatan.tabel_kec', compact('datakec'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts_kecamatan.create_kec');
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
            'id_kecamatan' => 'required',
            'nama_kecamatan' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $kecamatan = Kecamatan::create($data);

       // return response(['kecamatan' => new KecamatanResource($kecamatan), 'message' => 'Created successfully'], 201);
        // Kecamatan::create([
        //     $id_kecamatan = $request->id_kecamatan,
        //     $nama_kecamatan = $request->nama_kecamatan
        // ]);
        return redirect('datakecamatan')->with('toast_success', 'Data berhasil disimpan!');
        // dd($request->all());
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
        $kec = Kecamatan::findorfail($id);
        return view('layouts_kecamatan.edit_kec', compact('kec'));
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
        $kec = Kecamatan::findorfail($id);
        $kec->update($request->all());
        return redirect('datakecamatan')->with('toast_success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kec = Kecamatan::findorfail($id);
        $kec->delete();
        return back()->with('info', 'Data berhasil dihapus');
    }
}
