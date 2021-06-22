<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoTBC;
use Illuminate\Support\Facades\Validator;


class InfoTBCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= InfoTBC::all();
        return view('infotbc.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('infotbc.create');
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
            'id_info' => 'required',
            'nama_info' => 'required',
            'isi_info' => 'required'
        ]);
        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }
        $info = InfoTBC::create($data);
        return redirect('infotbc')->with('toast_success', 'Data berhasil disimpan!');
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
        $info = InfoTBC::findorfail($id);
        return view('infotbc.edit', compact('info'));
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
        $info = InfoTBC::findorfail($id);
        $info->update($request->all());
        return redirect('infotbc')->with('toast_success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = InfoTBC::findorfail($id);
        $info->delete();
        return back()->with('info', 'Data berhasil dihapus');
    }

    public function dataInfo()
    {
        $data= InfoTBC::all();
        $result = json_encode($data);
        echo $result;
    }
}
