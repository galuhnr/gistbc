@extends('layouts.v_template')
@section('title', 'Data Kecamatan')

@section('content')
<!-- <div class="container"> -->
    <div class="row">
        <div class="col-8 ml-4">  
            <div class="card card-light">
                <div class="card-header">
                    <h3 class="card-title cd-title">Isi Data Kecamatan</h3>
                </div>
                <form role="form" action="{{ route('simpankecamatan')}}" method="post" >
                    {{ csrf_field()}}
                    <div class="card-body mx-4">
                        <div class="form-group">
                            <label class="txt-label">Id Kecamatan</label>
                            <input type="text" class="form-control" name="id_kecamatan" id="id_kecamatan" placeholder="Masukkan id">
                        </div>
                        <div class="form-group">
                            <label class="txt-label">Nama Kecamatan</label>
                            <input type="text" class="form-control" name="nama_kecamatan" id="nama_kecamatan" placeholder="Masukkan nama kecamatan">
                            <!-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> -->
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