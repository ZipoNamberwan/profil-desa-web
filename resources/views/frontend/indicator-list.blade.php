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

<div class="pagebar-header is-light position-relative">
    <div class="shape-round"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md">
                <h3 class="text-dark font-weight-bold">Dataset</h3>
                <p class="text-dark mb-3 mb-md-0">Temukan kumpulan data-data Desa Pajurangan berupa tabel dan grafik. </p>
            </div>
            <div class="col-12 col-md-2">
            </div>
        </div>
    </div>
</div>

<div class="pt-4 pb-5">
    <div class="container">
        <div class="d-flex">
            <div class="dataset-sidenav flex-none">
                <div class="side-topic-list pt-2">
                    <h5 class="mb-2 px-3 text-app-secondary" style="margin-left:30px">Kategori</h5>
                    <ul class="list-unstyled mr-4">
                        @foreach($subjects as $subject)
                        <li class="side-topic-item @if($hasSubject) @if($currentsubject->id == $subject->id) is-active @endif @endif">
                            <a href="/subject?&subject={{$subject->id}}" class="fs-7">
                                <figure class="icon m-0 flex-none">
                                    <img src="{{$subject->icon}}" alt="" />
                                </figure>
                                <div class="pl-3 flex-grow-1">
                                    {{$subject->name}}
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="dataset-content flex-grow-1">
                <div class="position-relative" style="top: -70px;">
                    <div class="border rounded-lg mb-2 bg-white" style="height: 55px;">
                        <form action="/subject?&search=" method="get" class="h-100">
                            <div class="row h-100">
                                <div class="col-md-12">
                                    <div class="input-group h-100">
                                        <input required type="text" name="search" value="{{$keyword}}" class="form-control h-100 border-0" placeholder="Masukkan Kata Pencarian">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-12 mb-2" style="color: #f97316;">
                        @if($hasSubject)
                        @if($indicatorFound>0) {{$indicatorFound}} Dataset Ditemukan pada Kategori @else Belum Ada Dataset pada Kategori @endif {{$currentsubject->name}}
                        @else
                        @if($indicatorFound>0) {{$indicatorFound}} Dataset Ditemukan @else Dataset Tidak Ditemukan @endif
                        @endif
                    </div>
                    <div class="mb-4 d-lg-none">
                        <div class="d-flex align-items-center">
                            <h6 class="col-3 pl-0 pr-2 mb-0 text-muted">Kategori</h6>
                            <div class="flex-grow-1">
                                <div class="dropdown w-100">
                                    <button class="btn btn-outline-secondary btn-sm w-100" type="button" data-toggle="dropdown" aria-expanded="false">
                                        @if($hasSubject) {{$currentsubject->name}} @else Pilih Kategori @endif <i class="float-right fas fa-arrow-down"></i>
                                    </button>
                                    <div class="dropdown-menu w-100">
                                        @foreach($subjects as $subject)
                                        <a class="dropdown-item fs-7 " href="/subject?&subject={{$subject->id}}">
                                            {{$subject->name}}
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dataset-list mb-4">
                        @foreach($indicators as $indicator)
                        <a href="/indicator/{{$indicator->id}}" class="dataset-item">
                            <figure class="dataset-item__img m-0 flex-none">
                                <img src="{{$indicator->subject->icon}}" alt="" />
                            </figure>
                            <div class="flex-grow-1 px-lg-3">
                                <h6 class="text-app-secondary mb-2">{{$indicator->name}}</h6>
                                @if($indicator->source != null && $indicator->source != '')
                                <div class="fs-8 mb-1 text-muted">
                                    <i class="fa fa-building mr-2"></i>Sumber: {{$indicator->source}}
                                </div>
                                @endif
                                <div class="fs-8 d-flex">
                                    <div class="mr-4 text-muted">
                                        <i class="fa fa-file-text mr-2"></i>{{$indicator->subject->name}}
                                    </div>
                                    <div class="text-muted">
                                        <i class="fa fa-calendar mr-2"></i>Terakhir diupdate: {{$indicator->getLastUpdated()}}
                                    </div>
                                </div>
                                <div class="fs-8 text-muted d-lg-none mt-2">
                                    <i class="mr-1 fa fa-eye"></i> {{$indicator->view}}
                                </div>
                            </div>
                            <div class="col-1 pr-0 pl-2 d-none d-lg-block">
                                <div class="text-muted">
                                    <i class="mr-1 fa fa-eye"></i> {{$indicator->view}}
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>

                    <!-- <div class="p-3" style="background: none!important; display: grid; align-self: center">
                        <style>
                            .page-link {
                                color: #74abad;
                            }

                            .page-item.active .page-link {
                                background-color: #74abad;
                                border-color: #74abad;
                            }
                        </style>

                        <div class="pagination-list-wrapper" style="float: right;">
                            <nav aria-label="pagination-list" class="is-customized">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a href="/frontend/dataset?page=1&amp;judul=&amp;kategori=1" class="page-link"><span aria-hidden="true">&laquo;</span></a>
                                    </li>
                                    <li class="page-item disabled">
                                        <a href="/frontend/dataset?page=0&amp;judul=&amp;kategori=1" class="page-link"><span aria-hidden="true">&lt;</span></a>
                                    </li>

                                    <li class="page-item active">
                                        <a href="/frontend/dataset?page=1&amp;judul=&amp;kategori=1" class="page-link">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="/frontend/dataset?page=2&amp;judul=&amp;kategori=1" class="page-link">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="/frontend/dataset?page=3&amp;judul=&amp;kategori=1" class="page-link">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="/frontend/dataset?page=4&amp;judul=&amp;kategori=1" class="page-link">4</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="/frontend/dataset?page=5&amp;judul=&amp;kategori=1" class="page-link">5</a>
                                    </li>

                                    <li class="page-item ">
                                        <a href="/frontend/dataset?page=2&amp;judul=&amp;kategori=1" class="page-link"><span aria-hidden="true">&gt;</span></a>
                                    </li>
                                    <li class="page-item ">
                                        <a href="/frontend/dataset?page=12&amp;judul=&amp;kategori=1" class="page-link"><span aria-hidden="true">&raquo;</span></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

<p id="flash"></p>
@endsection

@section('script')

@endsection