@extends('layouts.v_template')
@section('title', 'Rumah Sakit')
@section('breadcrumbs', Breadcrumbs::render('rumahsakit'))
@section('content')
<div class="row mb-3 mt-2">
    <div class="col-6">
        <form action="{{ route('rumahsakit.index') }}" method="get">
            <div class="input-group input-group-sm" style="width: 250px; border-radius:8px;">
                <input type="text" name="keyword" value="{{ request('keyword') }}" class="form-control float-right" placeholder="Search">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-6 text-add">
        <button class="btn btn-sm btn-add mr-2"> 
            <a href="{{ route('rumahsakit.create') }}">
            <i class="fas fa-plus"></i>&nbsp New Data</a>
        </button>    
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive p-4">
                <table id="example2" class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kecamatan</th>
                            <th>Rumah Sakit</th>
                            <th>Alamat</th>
                            <th>Nomer Telphone</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id_rs }}</td>
                            <td>{{ $item->kecamatans->nama_kecamatan }}</td>
                            <td>{{ $item->nama_rs }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->no_tlp }}</td>
                            <td>
                                <a href="{{ route('rumahsakit.edit',$item->id_rs) }}"><i class="fas fa-edit" style="color: #66799E;"></i></a>&nbsp|&nbsp
                                <a href="{{ route('deleters',$item->id_rs) }}"><i class="fas fa-trash" style="color: #C23D54;"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div>
</div>
@include('sweetalert::alert')

@endsection