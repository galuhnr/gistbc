@extends('layouts.v_template')
@section('title', 'Grafik Data Kriteria')

@section('content')

<div class="row">
    <div class="col-12">      
        <div id="container" style="width:100%; height:400px;"></div>
    </div>
</div>
<div class="row">
    <div class="col-12">      
        <div id="container2" style="width:100%; height:400px;"></div>
    </div>
</div>

<script>
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Puskesmas & Kasus TBC'
    },
    subtitle: {
        text: 'source: Dinas Kesehatan Kota Surabaya'
    },
    xAxis: {
        categories: [
            '2016',
            '2017',
            '2018',
            '2019'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Data'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Puskesmas',
        color: 'green',
        data: [{{$data->where('tahun_id','0')->sum('jml_faskes')}},{{$data->where('tahun_id','1')->sum('jml_faskes')}},{{$data->where('tahun_id','2')->sum('jml_faskes')}},{{$data->where('tahun_id','3')->sum('jml_faskes')}} ]

    }, {
        name: 'Kasus TBC',
        color: 'red',
        data: [{{$data->where('tahun_id','0')->sum('jml_kasus')}}, {{$data->where('tahun_id','1')->sum('jml_kasus')}}, {{$data->where('tahun_id','2')->sum('jml_kasus')}}, {{$data->where('tahun_id','3')->sum('jml_kasus')}} ]

    } ]
});
</script>

<script>
Highcharts.chart('container2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Kepadatan Penduduk & Rumah Tidak Sehat'
    },
    subtitle: {
        text: 'source: Dinas Kesehatan Kota Surabaya'
    },
    xAxis: {
        categories: [
            '2016',
            '2017',
            '2018',
            '2019'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Data'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [ {
        name: 'Kepadapatan Penduduk',
        color: 'orange',
        data: [{{$data->where('tahun_id','0')->sum('jml_kp')}}, {{$data->where('tahun_id','1')->sum('jml_kp')}}, {{$data->where('tahun_id','2')->sum('jml_kp')}}, {{$data->where('tahun_id','3')->sum('jml_kp')}} ]
    }, {
        name: 'Rumah Tidak Sehat',
        color: 'blue',
        data: [{{$data->where('tahun_id','0')->sum('jml_rumahts')}}, {{$data->where('tahun_id','1')->sum('jml_rumahts')}}, {{$data->where('tahun_id','2')->sum('jml_rumahts')}}, {{$data->where('tahun_id','3')->sum('jml_rumahts')}} ]
    } ]
});
</script>

@endsection
