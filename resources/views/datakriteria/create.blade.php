@extends('layouts.v_template')
@section('title', 'Tambah Data Kriteria')
@section('breadcrumbs', Breadcrumbs::render('datakriteria.create'))
@section('content')
<!-- <div class="container"> -->
    <div class="row">
        <div class="col-8 ml-4">  
            <div class="card card-light">
                <div class="card-header">
                    <h3 class="card-title cd-title">Isi Data Kriteria</h3>
                </div>
                <form role="form" action="{{ route('datakriteria.store')}}" method="post" >
                    {{ csrf_field()}}
                    <div class="card-body mx-4">
                        <div class="form-group">
                            <label class="txt-label">Id data</label>
                            <input type="text" class="form-control" name="id_data" id="id_data" placeholder="Masukkan id data">
                        </div>
                        <div class="form-group">
                            <label class="txt-label">Tahun</label>
                            <select class="form-control" name="tahun_id" id="tahun_id">
                                <option disabled value>Pilih Tahun</option>
                                @foreach($tahun as $item)
                                <option value="{{ $item->id_tahun }}">{{ $item->tahun }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="txt-label">Kecamatan</label>
                            <select class="form-control" name="kecamatan_id" id="kecamatan_id">
                                <option disabled value>Pilih Kecamatan</option>
                                @foreach($kec as $item)
                                <option value="{{ $item->id_kecamatan }}">{{ $item->nama_kecamatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="txt-label">Jumlah Puskesmas/Faskes</label>
                            <input type="text" class="form-control" name="jml_faskes" id="jml_faskes" placeholder="Masukkan jumlah faskes">
                        </div>
                        <div class="form-group">
                            <label class="txt-label">Jumlah Kasus TBC</label>
                            <input type="text" class="form-control" name="jml_kasus" id="jml_kasus" placeholder="Masukkan jumlah kasus tbc">
                        </div>
                        <div class="form-group">
                            <label class="txt-label">Jumlah Rumah Tidak Sehat</label>
                            <input type="text" class="form-control" name="jml_rumahts" id="jml_rumahts" placeholder="Masukkan jumlah rumah tidak sehat">
                        </div>
                        <div class="form-group">
                            <label class="txt-label">Kepadatan Penduduk</label>
                            <input type="text" class="form-control" name="jml_kp" id="jml_kp" placeholder="Masukkan kepadatan penduduk">
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-data">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- </div> -->
@endsection