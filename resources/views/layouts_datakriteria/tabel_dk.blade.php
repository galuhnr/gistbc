@extends('layouts.v_template')
@section('title', 'Data Kriteria')

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
            <a href="/">
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
                            <th>Kecamatan</th>
                            <th>Jumlah Faskes</th>
                            <th>Jumlah Kasus</th>
                            <th>Rumah Tidak Sehat</th>
                            <th>Kepadatan Penduduk</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2016</td>
                            <td>Sukomanunggal</td>
                            <td class="text-center">2</td>
                            <td class="text-center">191</td>
                            <td class="text-center">1234</td>
                            <td class="text-center">123456</td>
                            <td><a href=""><i class="fas fa-edit" style="color: #66799E;"></i></a>&nbsp|&nbsp<a href=""><i class="fas fa-trash" style="color: #C23D54;"></i></a></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>2016</td>
                            <td>Sukomanunggal</td>
                            <td class="text-center">2</td>
                            <td class="text-center">191</td>
                            <td class="text-center">1234</td>
                            <td class="text-center">123456</td>
                            <td><a href=""><i class="fas fa-edit" style="color: #66799E;"></i></a>&nbsp|&nbsp<a href=""><i class="fas fa-trash" style="color: #C23D54;"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div>
</div>
@endsection