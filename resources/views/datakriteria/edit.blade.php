@extends('layouts.v_template')
@section('title', 'Data Kriteria')

@section('content')
<!-- <div class="container"> -->
    <div class="row">
        <div class="col-8 ml-4">  
            <div class="card card-light">
                <div class="card-header">
                    <h3 class="card-title cd-title">Ubah Data Kriteria</h3>
                </div>
                <form role="form" action="{{ route('datakriteria.update',$data->id_data)}}" method="post" >
                    {{ method_field('PUT') }}
                    {{ csrf_field()}}
                    <div class="card-body mx-4">
                        <div class="form-group">
                            <label class="txt-label">Id data</label>
                            <input type="text" class="form-control" name="id_data" id="id_data" value="{{ $data->id_data }}" disabled>
                        </div>
                        <div class="form-group">
                            <label class="txt-label">Tahun</label>
                            <select class="form-control" name="tahun_id" id="tahun_id">
                                <option disabled value>Pilih Tahun</option>
                                <option value="{{ $data->tahun_id }}">{{ $data->tahuns->tahun }}</option>
                                @foreach($tahun as $item)
                                    <option value="{{ $item->id_tahun }}">{{ $item->tahun }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="txt-label">Kecamatan</label>
                            <select class="form-control" name="kecamatan_id" id="kecamatan_id">
                                <option disabled value>Pilih Kecamatan</option>
                                <option value="{{ $data->kecamatan_id }}">{{ $data->kecamatans->nama_kecamatan }}</option>
                                @foreach($kec as $item)
                                    <option value="{{ $item->id_kecamatan }}">{{ $item->nama_kecamatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="txt-label">Jumlah Puskesmas/Faskes</label>
                            <input type="text" class="form-control" name="jml_faskes" id="jml_faskes" placeholder="Masukkan jumlah faskes" value="{{ $data->jml_faskes }}">
                        </div>
                        <div class="form-group">
                            <label class="txt-label">Jumlah Kasus TBC</label>
                            <input type="text" class="form-control" name="jml_kasus" id="jml_kasus" placeholder="Masukkan jumlah kasus tbc" value="{{ $data->jml_kasus }}">
                        </div>
                        <div class="form-group">
                            <label class="txt-label">Jumlah Rumah Tidak Sehat</label>
                            <input type="text" class="form-control" name="jml_rumahts" id="jml_rumahts" placeholder="Masukkan jumlah rumah tidak sehat" value="{{ $data->jml_rumahts }}">
                        </div>
                        <div class="form-group">
                            <label class="txt-label">Kepadatan Penduduk</label>
                            <input type="text" class="form-control" name="jml_kp" id="jml_kp" placeholder="Masukkan kepadatan penduduk" value="{{ $data->jml_kp }}">
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-data">Ubah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- </div> -->
@endsection