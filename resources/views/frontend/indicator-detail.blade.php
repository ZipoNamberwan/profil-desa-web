@extends('frontend/main')

@section('stylesheet')
<!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/assets/img/project/css/bootstrap-icons.css" />
<link rel="stylesheet" href="/assets/img/project/css/leaflet.css" />
<link rel="stylesheet" href="/assets/img/project/css/root.css">
<link rel="stylesheet" href="/assets/img/project/css/select2.css">
<link rel="stylesheet" href="/assets/img/project/css/slick.css">
<link rel="stylesheet" href="/assets/img/project/css/slick-theme.css">
<link rel="stylesheet" href="/assets/img/project/css/main.css">
<link rel="stylesheet" href="/assets/img/project/css/feedback_cutom.css">
<link rel="stylesheet" href="/assets/img/project/css/feedback_header.css">
<link rel="stylesheet" href="/assets/img/project/css/custom.css">
<link rel="stylesheet" href="/assets/img/project/css/utilities.css">
<!-- <link rel="stylesheet" href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css"> -->
<script src="/assets/img/project/css/jquery.min.js"></script>
@endsection

@section('container')

<div class="pagebar-header is-light position-relative rounded-0" style="min-height: 290px;">
    <div class="container">
        <div class="d-flex align-items-center mb-3">
            <a href="/subject?&subject={{$indicator->subject->id}}" class="btn btn-outline-secondary btn-sm">
                <i class="fas fa-chevron-left"></i> Kembali
            </a>
        </div>

        <div class="row align-items-center">
            <div class="col">
                <div class="border-right pr-3">
                    <h4 class="mb-1">{{$indicator->name}}</h4>
                    <ul class="list-inline mb-4">
                        @if($indicator->getLastUpdated() != '-')
                        <li class="list-inline-item">
                            <span class="text-muted">
                                <i class="fa fa-calendar mr-1"></i>{{$indicator->getLastUpdated()}}
                            </span>
                        </li>
                        @endif
                        <li class="list-inline-item">
                            <span class="text-muted">
                                <i class="fa fa-eye mr-1"></i>{{$indicator->view}}
                            </span>
                        </li>
                    </ul>

                    @if($indicator->source != null && $indicator->source != '-')
                    <div class="d-flex align-items-center">
                        <!-- <div class="flex-none border rounded-lg" style="width: 45px;padding: 4px; mr-2">
                            <figure class="rz-ratio rz-ratio-1x1 m-0">
                                <img src="/uploads/fd2cbb8fbb69b2286ee1062f2ac3af9a.png" style="object-fit: contain;">
                            </figure>
                        </div> -->
                        <div>
                            <h6 class="mb-1 fs-7">Sumber: {{$indicator->source}}</h6>
                            <p class="m-0 fs-7 line-height-sm">{{$indicator->subject->name}}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="dropdown w-100">
                    <button class="btn btn-outline-secondary btn-sm w-100 mb-3" type="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-download mr-1"></i> Unduh
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <form action="/indicator/{{$indicator->id}}" method="POST">
                            @csrf
                            <button class="dropdown-item fs-7 text-black-50" id="sbmtbtn" type="submit"><i class="fas fa-file-excel mr-1"></i>Spreadshet</button>
                        </form>
                    </div>
                </div>
                <div class="dropdown w-100">
                    <button class="btn btn-outline-secondary btn-sm w-100 mb-3" type="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-share mr-1"></i> Bagikan
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item fs-7 text-black-50" href="https://www.facebook.com/sharer/sharer.php?u=url('/indicator/{{$indicator->id}}')" target="_blank">
                            <i class="fab fa-facebook mr-1"></i> Facebook
                        </a>
                        <a class="dropdown-item fs-7 text-black-50" href="https://twitter.com/intent/tweet?text={{$indicator->name}}&url=http://opendata.jatimprov.go.id/frontend/dataset/1633/detail_dataset" target="_blank">
                            <i class="fab fa-twitter mr-1"></i> Twitter
                        </a>
                        <a class="dropdown-item fs-7 text-black-50" href="whatsapp://send?text={{$indicator->name}} url('/indicator/{{$indicator->id}}')" target="_blank">
                            <i class="fab fa-whatsapp mr-1"></i> Whatsapp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="pt-2 pb-5">
    <div class="dataset-inner position-relative" style="top: 0;">
        <div class="container">

            <div class="pt-3 pb-4">
                <!-- <div class="mb-0">
                    <h5>Deskripsi Dataset</h5>
                    <p class="mb-0">Data Pagu Alokasi Penyaluran DBHCHT Tahun 2022</p>
                </div> -->
                <!-- <div class="border-top my-4" style="border-top-width: 5px !important;"></div> -->
                <div class="m-0">
                    <div class="app-box-card with-table mb-5">
                        <div class="app-box-card__head">
                            <h5 class="mb-0">Meta Data</h5>
                        </div>
                        <div class="app-box-card__body">
                            <div class="table-responsive">
                                <table class="table border-0">
                                    <tbody>
                                        <tr>
                                            <td width="25%" class="text-muted">Dibuat</td>
                                            <th>{{$indicator->getCreated()}}</th>
                                        </tr>
                                        <tr>
                                            <td width="25%" class="text-muted">Terakhir Diupdate</td>
                                            <th>{{$indicator->getLastUpdated()}}</th>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Sumber</td>
                                            <th>@if($indicator->source != null && $indicator->source != '-') {{$indicator->source}} @else - @endif</th>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Tahun Data</td>
                                            <th>{{$indicator->getYears()}}</th>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Kategori</td>
                                            <th>{{$indicator->subject->name}}</th>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Periode</td>
                                            <th>{{$indicator->period->name}}</th>
                                        </tr>
                                        @if($indicator->chracteristic != null)
                                        <tr>
                                            <td class="text-muted">Judul Kolom</td>
                                            <th>{{$indicator->characteristic->name}}</th>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td class="text-muted">Satuan</td>
                                            <th> @if($indicator->unit != null)
                                                {{$indicator->unit->name}}
                                                @else
                                                -
                                                @endif
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="app-box-card with-tabs">
                    <div class="app-box-card__head d-flex">
                        <ul class="nav nav-pills" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="nasional-tab" data-toggle="tab" href="#tabel" role="tab" aria-controls="data" aria-selected="true">Tabel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-grafik-maps" id="lokal-tab" data-toggle="tab" href="#grafik" role="tab" aria-controls="datamedia" aria-selected="false">Grafik</a>
                            </li>
                        </ul>
                    </div>
                    <div class="app-box-card__body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tabel" role="tabpanel" aria-labelledby="versi-tab">
                                <div class="content">
                                    <div class="table-responsive">
                                        @if($hasData)
                                        <div class="table-responsive py-4">
                                            <table class="table">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th style="vertical-align: middle !important;" class="text-center" @if($characteristics !=null) rowspan="3" @else rowspan="2" @endif>{{$headerrow}}</th>
                                                        @foreach($years as $year)
                                                        <th class="text-center" colspan="{{$yearcolspan}}">{{$year->name}}</th>
                                                        @endforeach
                                                    </tr>
                                                    <tr>
                                                        @foreach($years as $year)
                                                        @foreach($periods as $period)
                                                        <th style="vertical-align: middle !important;" class="text-center" colspan="{{$periodcolspan}}">{{$period->name}}</th>
                                                        @endforeach
                                                        @endforeach
                                                    </tr>
                                                    <tr>
                                                        @foreach($years as $year)
                                                        @foreach($periods as $period)
                                                        @if($characteristics != null) @foreach($characteristics as $characteristic)
                                                        <th style="vertical-align: middle !important;" class="text-center">{{$characteristic->name}}</th>
                                                        @endforeach
                                                        @endif
                                                        @endforeach
                                                        @endforeach
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($data as $row)
                                                    <tr>
                                                        @foreach($row as $cell)
                                                        <td style="vertical-align: middle !important;" class="text-center">{{$cell}}</td>
                                                        @endforeach
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @else
                                        Belum ada data diupload
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="grafik" role="tabpanel" aria-labelledby="metode-tab">
                                @if($hasData)
                                <div class="content overflow-hidden w-100">
                                    <div class="row mb-2">
                                        <div class="col-lg-1">Periode</div>
                                        <div class="col-lg-3">
                                            <div style="display:flex;">
                                                @if(count($periods) > 1)
                                                <div>
                                                    <select onchange="changePeriodYear()" name="period" id="period">
                                                        @foreach($periods as $period)
                                                        <option {{ $currentperiod->id == $period->id ? 'selected' : '' }} value="{{$period->id}}">{{$period->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @endif
                                                <div style="margin-left:2px ;">
                                                    <select onchange="changePeriodYear()" name="year" id="year">
                                                        @foreach($years as $year)
                                                        <option {{ $currentyear->id == $year->id ? 'selected' : '' }} value="{{$year->id}}">{{$year->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- @if($characteristics != null)
                                    <div class="row">
                                        <div class="col-lg-1">Judul Kolom</div>
                                        <div class="col-lg-3">
                                            <div style="display:flex;">
                                                <div style="margin-left:2px ;">
                                                    <select name="year" id="year">
                                                        @foreach($characteristics as $characteristic)
                                                        <option value="{{$characteristic->id}}">{{$characteristic->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif -->

                                    <hr>

                                    <figure class="highcharts-figure">
                                        <div id="container"></div>
                                    </figure>
                                </div>
                                @else
                                Belum ada data diupload
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(count($recommendation) > 0)
            <div class="mt-50">
                <h5 class="mb-3">Rekomendasi Dataset</h5>
                <div class="dataset-list bg-white mb-4">
                    @foreach($recommendation as $ind)
                    <a href="/indicator/{{$ind->id}}" class="dataset-item">
                        <div class="flex-grow-1 px-lg-3">
                            <h6 class="text-app-secondary mb-2">{{$ind->name}}</h6>
                            @if($ind->source != null && $ind->source != '')
                            <div class="fs-8 mb-1 text-muted">
                                <i class="fa fa-building mr-2"></i>Sumber: {{$ind->source}}
                            </div>
                            @endif
                            <div class="fs-8 d-flex">
                                <div class="text-muted">
                                    <i class="fa fa-calendar mr-2"></i>Terakhir diupdate: {{$ind->getLastUpdated()}}
                                </div>
                            </div>
                            <div class="fs-8 text-muted d-lg-none mt-2">
                                <i class="mr-1 fa fa-eye"></i> {{$ind->view}}
                            </div>
                        </div>
                        <div class="col-1 pr-0 pl-2 d-none d-lg-block">
                            <div class="text-muted">
                                <i class="mr-1 fa fa-eye"></i> {{$ind->view}}
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

@endsection

@section('script')

<script>
    function changePeriodYear() {
        var year = document.getElementById("year").value;
        var period = null;
        if (document.getElementById("period") != null) {
            period = document.getElementById("period").value
        }
        getChartData(year, period);
    }

    function createChart(data) {
        var chart = Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: '{{$indicator->name}}'
            },
            xAxis: {
                categories: data.xAxis,
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: '@if($indicator->unit != null) {{$indicator->unit->name}} @endif'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:f} @if($indicator->unit != null) {{$indicator->unit->name}} @endif</b></td></tr>',
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
            series: data.data
        });
    }

    function getChartData(year = 'all', period = null) {
        console.log('{{$indicator->id}}')
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/indicator/chart/{{$indicator->id}}/" + year + '/' + (period ?? ''),
            success: function(response) {
                createChart(response)
            }
        });
    }
</script>

@if($hasData)
<script>
    getChartData();
</script>
@endif

@endsection