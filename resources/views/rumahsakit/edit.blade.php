@extends('layouts.v_template')
@section('title', 'Edit Data Rumah Sakit')
@section('breadcrumbs')
{{Breadcrumbs::render('rumahsakit.edit',$data)}}
@endsection
@section('content')
<!-- <div class="container"> -->
    <div class="row">
        <div class="col-8 ml-4">  
            <div class="card card-light">
                <div class="card-header">
                    <h3 class="card-title cd-title">Data Rumah Sakit</h3>
                </div>
                <form role="form" action="{{ route('rumahsakit.update',$data->id_rs) }}" method="post" >
                    {{ method_field('PUT') }}
                    {{ csrf_field()}}
                    <div class="card-body mx-4">
                        <div class="form-group">
                            <label class="txt-label">Id data</label>
                            <input type="text" class="form-control" name="id_rs" id="id_rs" placeholder="Masukkan id data" value="{{ $data->id_rs }}" disabled>
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
                            <label class="txt-label">Nama Rumah Sakit</label>
                            <input type="text" class="form-control" name="nama_rs" id="nama_rs" placeholder="Masukkan nama rumah sakit" value="{{ $data->nama_rs }}">
                        </div>
                        <div class="form-group">
                            <label class="txt-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat" value="{{ $data->alamat }}">
                        </div>
                        <div class="form-group">
                            <label class="txt-label">Nomer Telphone</label>
                            <input type="text" class="form-control" name="no_tlp" id="no_tlp" placeholder="Masukkan nomer telephone" value="{{ $data->no_tlp }}">
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