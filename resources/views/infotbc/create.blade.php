@extends('layouts.v_template')
@section('title', 'Isi Informasi TBC')
@section('breadcrumbs', Breadcrumbs::render('infotbc.create'))
@section('content')
<!-- <div class="container"> -->
    <div class="row">
        <div class="col-8 ml-4">  
            <div class="card card-light">
                <div class="card-header">
                    <h3 class="card-title cd-title">Data Informasi TBC</h3>
                </div>
                <form role="form" action="{{ route('infotbc.store')}}" method="post" >
                    {{ csrf_field()}}
                    <div class="card-body mx-4">
                        <div class="form-group">
                            <label class="txt-label">Id data</label>
                            <input type="text" class="form-control" name="id_info" id="id_info" placeholder="Masukkan id data">
                        </div>
                        <div class="form-group">
                            <label class="txt-label">Nama Informasi</label>
                            <input type="text" class="form-control" name="nama_info" id="nama_info" placeholder="Masukkan nama informasi">
                        </div>
                        <div class="form-group">
                            <label class="txt-label">Isi Informasi</label>
                            <textarea type="text" class="form-control" name="isi_info" id="isi_info" placeholder="Masukkan informasi"></textarea>
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