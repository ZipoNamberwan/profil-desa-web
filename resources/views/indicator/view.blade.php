@extends('main')

@section('stylesheet')
<link rel="stylesheet" href="/assets/vendor/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="/assets/vendor/datatables2/datatables.min.css" />
<link rel="stylesheet" href="/assets/vendor/@fortawesome/fontawesome-free/css/fontawesome.min.css" />
<link rel="stylesheet" href="/assets/css/container.css">
<link rel="stylesheet" href="/assets/css/text.css">
@endsection

@section('container')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-bell"></i></a></li>
                            <li class="breadcrumb-item"><a href="/indicators">Judul Tabel</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Lihat Judul Tabel</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card-wrapper">
                <!-- Custom form validation -->
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-3">{{$indicator->name}} {{$yearsentence}}</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        @if($hasData)
                        <div class="table-responsive py-4">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr class="nowrap">
                                        <th style="vertical-align: middle !important;" class="text-center" @if($characteristics !=null) rowspan="3" @else rowspan="2" @endif>{{$headerrow}}</th>
                                        @foreach($years as $year)
                                        <th class="text-center" colspan="{{$yearcolspan}}">{{$year->name}}</th>
                                        @endforeach
                                    </tr>
                                    <tr class="nowrap">
                                        @foreach($years as $year)
                                        @foreach($periods as $period)
                                        <th style="vertical-align: middle !important;" class="text-center" colspan="{{$periodcolspan}}">{{$period->name}}</th>
                                        @endforeach
                                        @endforeach
                                    </tr>
                                    <tr class="nowrap">
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
                                    <tr class="nowrap">
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
        </div>
    </div>
</div>
@endsection

@section('optionaljs')
<script src="/assets/vendor/datatables2/datatables.min.js"></script>
<script src="/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/vendor/sweetalert2/dist/sweetalert2.js"></script>
<script src="/assets/vendor/select2/dist/js/select2.min.js"></script>

@endsection