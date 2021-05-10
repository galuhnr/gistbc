@extends('layouts.v_template')
@section('title', 'Edit Data Tahun')
@section('breadcrumbs')
{{Breadcrumbs::render('tahun.edit',$thn)}}
@endsection
@section('content')
<!-- <div class="container"> -->
    <div class="row">
        <div class="col-8 ml-4">  
            <div class="card card-light">
                <div class="card-header">
                    <h3 class="card-title cd-title">Ubah Data Tahun</h3>
                </div>
                <form role="form" action="{{ route('tahun.update',$thn->id_tahun)}}" method="post" >
                    {{ method_field('PUT') }}
                    {{ csrf_field()}}
                    <div class="card-body mx-4">
                        <div class="form-group">
                            <label class="txt-label">Id tahun</label>
                            <input type="text" class="form-control form-control-alternative" name="id_tahun" id="id_tahun" value="{{ $thn->id_tahun }}" disabled>
                        </div>
                        <div class="form-group">
                            <label class="txt-label">Tahun</label>
                            <input type="text" class="form-control form-control-alternative" name="tahun" id="tahun" placeholder="Masukkan tahun" value="{{ $thn->tahun }}">
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