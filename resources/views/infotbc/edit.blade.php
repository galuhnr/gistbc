@extends('layouts.v_template')
@section('title', 'Informasi TBC')
@section('title-nav', 'Edit Data Informasi TBC')

@section('content')
<!-- <div class="container"> -->
    <div class="row">
        <div class="col-8 ml-4">  
            <div class="card card-light">
                <div class="card-header">
                    <h3 class="card-title cd-title">Data Informasi TBC</h3>
                </div>
                <form role="form" action="{{ route('infotbc.update',$info->id_info) }}" method="post" >
                    {{ method_field('PUT') }}
                    {{ csrf_field()}}
                    <div class="card-body mx-4">
                        <div class="form-group">
                            <label class="txt-label">Id data</label>
                            <input type="text" class="form-control" name="id_info" id="id_info" placeholder="Masukkan id data" value="{{ $info->id_info }}" disabled>
                        </div>
                        <div class="form-group">
                            <label class="txt-label">Nama Informasi</label>
                            <input type="text" class="form-control" name="nama_info" id="nama_info" placeholder="Masukkan nama informasi" value="{{ $info->nama_info }}">
                        </div>
                        <div class="form-group">
                            <label class="txt-label">Isi Informasi</label>
                            <input type="text" class="form-control" name="isi_info" id="isi_info" placeholder="Masukkan isi informasi" value="{{ $info->isi_info }}">
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