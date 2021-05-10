@extends('layouts.v_template')
@section('title', 'Data Tahun')

@section('content')
<!-- <div class="container"> -->
    <div class="row">
        <div class="col-8 ml-4">  
            <div class="card card-light">
                <div class="card-header">
                    <h3 class="card-title cd-title">Isi Data Tahun</h3>
                </div>
                <form role="form" action="{{ route('tahun.store')}}" method="post" >
                    {{ csrf_field()}}
                    <div class="card-body mx-4">
                        <div class="form-group">
                            <label class="txt-label">Id tahun</label>
                            <input type="text" class="form-control" name="id_tahun" id="id_tahun" placeholder="Masukkan id">
                        </div>
                        <div class="form-group">
                            <label class="txt-label">Tahun</label>
                            <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Masukkan tahun">
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