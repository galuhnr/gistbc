@extends('layouts.v_template')
@section('title', 'Grafik')

@section('content')
<div id="container" style="width:100%; height:400px;"></div>

<script>
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Perbandingan Tingkat Kerawanan TBC Kota Surabaya'
    },
    subtitle: {
        text: 'menggunakan metode centroid linkage'
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
            text: 'Jumlah Kecamatan'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y} kecamatan</b></td></tr>',
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
        name: 'Rendah',
        color: 'green',
        data: [22, 23, 22, 25]

    }, {
        name: 'Sedang',
        color: 'yellow',
        data: [2, 3, 8, 5]

    }, {
        name: 'Tinggi',
        color: 'red',
        data: [7, 5, 1, 1]

    }]
});
</script>

@endsection
