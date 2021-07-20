@extends('layouts.v_template')
@section('title', 'Grafik')

@section('content')
<div id="container" style="width:100%; height:400px;"></div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script>
dataseries = [{
    name: 'Rendah',
    color: 'green',
    data: []
}, {
    name: 'Sedang',
    color: 'yellow',
    data: []
}, {
    name: 'Tinggi',
    color: 'red',
    data: []
}];

var rendah2016=0;
var sedang2016=0;
var tinggi2016=0;

var rendah2017=0;
var sedang2017=0;
var tinggi2017=0;

var rendah2018=0;
var sedang2018=0;
var tinggi2018=0;

var rendah2019=0;
var sedang2019=0;
var tinggi2019=0;

// getData();
$.ajax({  
    url: 'http://127.0.0.1:8000/api/cluster', 
    dataType:'JSON', 
    success: function(data) {
        for(i=0;i<data.length;i++){
            var dataAll = data[i];
            var tahun = dataAll.tahun;
            var cluster = dataAll.cluster;
            if( tahun == 0){
                switch(cluster){
                    case 1:
                        rendah2016++;
                        break;
                    case 2:
                        sedang2016++;
                        break;
                    case 3:
                        tinggi2016++;
                        break;
                    default:
                        console.log("gagal");
                }
            }else if( tahun == 1){
                switch(cluster){
                    case 1:
                        rendah2017++;
                        break;
                    case 2:
                        sedang2017++;
                        break;
                    case 3:
                        tinggi2017++;
                        break;
                    default:
                        console.log("gagal");
                }
            }else if( tahun == 2){
                switch(cluster){
                    case 1:
                        rendah2018++;
                        break;
                    case 2:
                        sedang2018++;
                        break;
                    case 3:
                        tinggi2018++;
                        break;
                    default:
                        console.log("gagal");
                }
            }else if( tahun == 3){
                switch(cluster){
                    case 1:
                        rendah2019++;
                        break;
                    case 2:
                        sedang2019++;
                        break;
                    case 3:
                        tinggi2019++;
                        break;
                    default:
                        console.log("gagal");
                }
            }
        }
        
        Highcharts.chart('container', {
            chart: {
                type: 'column',
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
                data: [rendah2016,rendah2017,rendah2018,rendah2019]
            }, {
                name: 'Sedang',
                color: 'yellow',
                data: [sedang2016,sedang2017,sedang2018,sedang2019]
            }, {
                name: 'Tinggi',
                color: 'red',
                data: [tinggi2016,tinggi2017,tinggi2018,tinggi2019]
            }]
        });
    }  
});

</script>

@endsection
