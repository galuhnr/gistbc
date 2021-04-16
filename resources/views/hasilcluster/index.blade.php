@extends('layouts.v_template')
@section('title', 'Hasil Klustering')

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
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive p-4">
                <table id="example2" class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Jumlah Faskes</th>
                            <th>Jumlah Kasus</th>
                            <th>Rumah Tidak Sehat</th>
                            <th>Kepadatan Penduduk</th>
                            <th>Kluster</th>
                            <th>Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($collections as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->jml_faskes }}</td>
                            <td>{{ $data->jml_kasus }}</td>
                            <td>{{ $data->jml_rumahts }}</td>
                            <td>{{ $data->jml_kp }}</td>
                            <td>{{ $data->cluster }}</td>
                            <td>{{ $data->kategori }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div>
</div>

@endsection