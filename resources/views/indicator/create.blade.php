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
                            <li class="breadcrumb-item"><a href="/indicators">Indikator</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Indikator</li>
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
                        <h3 class="mb-3">Tambah Indikator</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form id="formupdate" autocomplete="off" method="post" action="/indicators" class="needs-validation" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label">Subjek <span class="text-danger">*</span></label>
                                    <select id="subject" name="subject" class="form-control" data-toggle="select" name="subject" required>
                                        <option value="0" disabled selected> -- Pilih Subjek -- </option>
                                        @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}" {{ old('subject') == $subject->id ? 'selected' : '' }}>
                                            {{ $subject->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('subject')
                                    <div class="text-valid mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="name">Nama Indikator<span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="validationCustom03" value="{{ @old('name') }}">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label" for="source">Sumber Data</label>
                                    <input type="text" name="source" class="form-control @error('source') is-invalid @enderror" id="validationCustom03" value="{{ @old('source') }}">
                                    @error('source')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label">Karakteristik <span class="text-danger">*</span></label>
                                    <select id="characteristic" name="characteristic" class="form-control" data-toggle="select" name="characteristic" required>
                                        <option value="0" disabled selected> -- Pilih Karakteristik -- </option>
                                        <option value=""> Tidak ada Karakteristik </option>
                                        @foreach ($characteristics as $characteristic)
                                        <option value="{{ $characteristic->id }}" {{ old('characteristic') == $characteristic->id ? 'selected' : '' }}>
                                            {{ $characteristic->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('characteristic')
                                    <div class="text-valid mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label">Judul Baris <span class="text-danger">*</span></label>
                                    <select id="row" name="row" class="form-control" data-toggle="select" name="row" required>
                                        <option value="0" disabled selected> -- Pilih Judul Baris -- </option>
                                        @foreach ($rows as $row)
                                        <option value="{{ $row->id }}" {{ old('row') == $row->id ? 'selected' : '' }}>
                                            {{ $row->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('row')
                                    <div class="text-valid mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label">Periode <span class="text-danger">*</span></label>
                                    <select id="period" name="period" class="form-control" data-toggle="select" name="period" required>
                                        <option value="0" disabled selected> -- Pilih Periode -- </option>
                                        @foreach ($periods as $period)
                                        <option value="{{ $period->id }}" {{ old('period') == $period->id ? 'selected' : '' }}>
                                            {{ $period->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('period')
                                    <div class="text-valid mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-control-label">Satuan <span class="text-danger">*</span></label>
                                    <select id="unit" name="unit" class="form-control" data-toggle="select" name="unit" required>
                                        <option value="0" disabled selected> -- Pilih Satuan -- </option>
                                        <option value=""> Tidak ada Satuan </option>
                                        @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}" {{ old('unit') == $unit->id ? 'selected' : '' }}>
                                            {{ $unit->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('unit')
                                    <div class="text-valid mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-primary mt-3" id="sbmtbtn" type="submit">Simpan</button>
                        </form>
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