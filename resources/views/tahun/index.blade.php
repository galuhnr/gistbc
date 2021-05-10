@extends('layouts.v_template')
@section('title', 'Data Tahun')
@section('breadcrumbs', Breadcrumbs::render('tahun'))
@section('content')
<div class="row mb-3 mt-2">
    <div class="col-6">
        <div class="input-group input-group-sm" style="width: 250px; border-radius:8px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
        </div>
    </div>
    <div class="col-6 text-add">
        <button class="btn btn-sm btn-add mr-2"> 
            <a href="{{ route('tahun.create') }}">
            <i class="fas fa-plus"></i>&nbsp New Data</a>
        </button>    
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive p-4">
                <table id="example2" class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tahun</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($datathn as $item)
                        <tr>
                            <td>{{ $item->id_tahun }}</td>
                            <td>{{ $item->tahun }}</td>
                            <td class="text-center">
                                <a href="{{ route('tahun.edit',$item->id_tahun)}}"><i class="fas fa-edit" style="color: #66799E;"></i></a>&nbsp|&nbsp
                                <a href="{{ route('deletetahun',$item->id_tahun) }}"><i class="fas fa-trash" style="color: #C23D54;"></i></a>
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