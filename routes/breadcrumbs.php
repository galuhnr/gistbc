<?php

// Dashboard
Breadcrumbs::for('home', function($trail){
    $trail->push('Dashboard',route('home'));
});

// Tahun
Breadcrumbs::for('tahun', function($trail){
    $trail->parent('home');
    $trail->push('Tahun',route('tahun.index'));
});

// Tahun > Tambah Data Tahun
Breadcrumbs::for('tahun.create', function($trail){
    $trail->parent('tahun');
    $trail->push('Tambah Data Tahun',route('tahun.create'));
});

// Tahun > Edit Data Tahun
Breadcrumbs::for('tahun.edit', function($trail,$thn){
    $trail->parent('tahun');
    $trail->push($thn->tahun,route('tahun.index',$thn->id_tahun));
});

// Data Kriteria
Breadcrumbs::for('datakriteria', function($trail){
    $trail->parent('home');
    $trail->push('Data Kriteria',route('datakriteria.index'));
});

// Data Kriteria > Tambah Data 
Breadcrumbs::for('datakriteria.create', function($trail){
    $trail->parent('datakriteria');
    $trail->push('Tambah Data Kriteria',route('datakriteria.create'));
});

// Data Kriteria > Edit Data 
Breadcrumbs::for('datakriteria.edit', function($trail,$data){
    $trail->parent('datakriteria');
    $trail->push($data->kecamatans->nama_kecamatan,route('datakriteria.index',$data->id_data));
});

// Info TBC
Breadcrumbs::for('infotbc', function($trail){
    $trail->parent('home');
    $trail->push('Info TBC',route('infotbc.index'));
});

// Info TBC > Tambah Data 
Breadcrumbs::for('infotbc.create', function($trail){
    $trail->parent('infotbc');
    $trail->push('Tambah Info TBC',route('infotbc.create'));
});

// Info TBC > Edit Data 
Breadcrumbs::for('infotbc.edit', function($trail,$info){
    $trail->parent('infotbc');
    $trail->push($info->nama_info,route('infotbc.index',$info->id_info));
});

// Rumah Sakit
Breadcrumbs::for('rumahsakit', function($trail){
    $trail->parent('home');
    $trail->push('Rumah Sakit',route('rumahsakit.index'));
});

// Rumah Sakit > Tambah Data 
Breadcrumbs::for('rumahsakit.create', function($trail){
    $trail->parent('rumahsakit');
    $trail->push('Tambah Rumah Sakit',route('rumahsakit.create'));
});

// Rumah Sakit > Edit Data 
Breadcrumbs::for('rumahsakit.edit', function($trail,$data){
    $trail->parent('rumahsakit');
    $trail->push($data->nama_rs,route('rumahsakit.index',$data->id_rs));
});

// Kecamatan
Breadcrumbs::for('kecamatan', function($trail){
    $trail->parent('home');
    $trail->push('Data Kecamatan',route('kecamatan'));
});

// Kecamatan > Tambah Data
Breadcrumbs::for('createkecamatan', function($trail){
    $trail->parent('kecamatan');
    $trail->push('Tambah Data Kecamatan',route('createkecamatan'));
});

// Kecamatan > Edit Data
Breadcrumbs::for('editkecamatan', function($trail,$kec){
    $trail->parent('kecamatan');
    $trail->push($kec->nama_kecamatan,route('kecamatan',$kec->id_kecamatan));
});

// Hasil Clustering 2016
Breadcrumbs::for('hasilcluster2016', function($trail){
    $trail->parent('home');
    $trail->push('Hasil Klustering 2016',route('hasilcluster2016'));
});

// Hasil Clustering 2017
Breadcrumbs::for('hasilcluster2017', function($trail){
    $trail->parent('home');
    $trail->push('Hasil Klustering 2017',route('hasilcluster2017'));
});

// Hasil Clustering 2018
Breadcrumbs::for('hasilcluster2018', function($trail){
    $trail->parent('home');
    $trail->push('Hasil Klustering 2018',route('hasilcluster2018'));
});

// Hasil Clustering 2019
Breadcrumbs::for('hasilcluster2019', function($trail){
    $trail->parent('home');
    $trail->push('Hasil Klustering 2019',route('hasilcluster2019'));
});

// Profil
Breadcrumbs::for('profil', function($trail){
    $trail->parent('home');
    $trail->push('Profil',route('profil.index'));
});

// Profil > Edit Data
Breadcrumbs::for('profil.edit', function($trail,$kec){
    $trail->parent('profil');
    $trail->push($data->name,route('profil.index',$data->id_rs));
});

?>