@extends('layouts.v_template')
@section('title', 'Isi Data Rumah Sakit')

@section('content')
<!-- <div class="container"> -->
    <div class="row">
        <div class="col-8 ml-4">  
            <div class="card card-light">
                <div class="card-header">
                    <h3 class="card-title cd-title">Data Rumah Sakit</h3>
                </div>
                <form role="form" action="{{ route('rumahsakit.store')}}" method="post" >
                    {{ csrf_field()}}
                    <div class="card-body mx-4">
                        <div class="form-group">
                            <label class="txt-label">Id data</label>
                            <input type="text" class="form-control" name="id_rs" id="id_rs" placeholder="Masukkan id data">
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
                            <label class="txt-label">Nama Rumah Sakit</label>
                            <input type="text" class="form-control" name="nama_rs" id="nama_rs" placeholder="Masukkan nama rumah sakit">
                        </div>
                        <div class="form-group">
                            <label class="txt-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan alamat">
                        </div>
                        <div class="form-group">
                            <label class="txt-label">Nomer Telphone</label>
                            <input type="text" class="form-control" name="no_tlp" id="no_tlp" placeholder="Masukkan nomer telephone">
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