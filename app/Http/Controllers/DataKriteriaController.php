<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataKriteria;
use App\Models\Tahun;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\Validator;

class DataKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $data= DataKriteria::with('tahuns', 'kecamatans')->get();
        // return view('datakriteria.index', compact('data'));

        $pagination = 500;
        $request->keyword;
        $data = DataKriteria::whereHas('kecamatans',function ($query) use ($request){
            $query->where('nama_kecamatan','like',"%{$request->keyword}%");
        })->orderBy('id_data','asc')->paginate($pagination);

        $data->appends($request->only('keyword'));

        return view('datakriteria.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tahun = Tahun::all();
        $kec = Kecamatan::all();
        return view('datakriteria.create', compact('tahun','kec'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datas = $request->all();
        $validator = Validator::make($datas, [
            'id_data' => 'required',
            'tahun_id' => 'required',
            'kecamatan_id' => 'required',
            'jml_faskes' => 'required',
            'jml_kasus' => 'required',
            'jml_rumahts' => 'required',
            'jml_kp' => 'required',
        ]);
        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }
        $dk = DataKriteria::create($datas);
        return redirect('datakriteria')->with('toast_success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tahun = Tahun::all();
        $kec = Kecamatan::all();
        $data = DataKriteria::with('tahuns','kecamatans')->findorfail($id);
        return view('datakriteria.edit', compact('data','tahun','kec'));
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
        $data = DataKriteria::findorfail($id);
        $data->update($request->all());
        return redirect('datakriteria')->with('toast_success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dt = DataKriteria::findorfail($id);
        $dt->delete();
        return back()->with('info', 'Data berhasil dihapus');
    }

    //api
    public function dataInfo1()
    {
        $data = DataKriteria::with('tahuns','kecamatans')->where('tahun_id','0')->orderBy('kecamatan_id')->get();
        $result = json_encode($data);
        echo $result;
    }

    public function dataInfo2()
    {
        $data= DataKriteria::with('tahuns','kecamatans')->where('tahun_id','1')->orderBy('kecamatan_id')->get();
        $result = json_encode($data);
        echo $result;
    }

    public function dataInfo3()
    {
        $data= DataKriteria::with('tahuns','kecamatans')->where('tahun_id','2')->orderBy('kecamatan_id')->get();
        $result = json_encode($data);
        echo $result;
    }

    public function dataInfo4()
    {
        $data= DataKriteria::with('tahuns','kecamatans')->where('tahun_id','3')->orderBy('kecamatan_id')->get();
        $result = json_encode($data);
        echo $result;
    }
}
