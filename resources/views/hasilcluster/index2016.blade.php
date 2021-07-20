@extends('layouts.v_template')
@section('title', 'Hasil Klustering 2016')
@section('breadcrumbs', Breadcrumbs::render('hasilcluster2016'))
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
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_kecamatan }}</td>
                            <td>{{ $item->jml_faskes }}</td>
                            <td>{{ $item->jml_kasus }}</td>
                            <td>{{ $item->jml_rumahts }}</td>
                            <td>{{ $item->jml_kp }}</td>
                            <td>{{ $item->cluster }}</td>
                            <td>{{ $item->kategori }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div>
</div>

@endsection