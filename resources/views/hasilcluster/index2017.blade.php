@extends('layouts.v_template')
@section('title', 'Hasil Klustering 2017')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive p-4">
                <table id="example2" class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kecamatan</th>
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
                            <td>{{ $data->kecamatan }}</td>
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