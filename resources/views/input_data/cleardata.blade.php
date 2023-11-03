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
                            <li class="breadcrumb-item active" aria-current="page">Clear Data</li>
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
                        <div class="row">
                            <div class="col-md-9">
                                <h3 class="card-title mb-2">Clear Data</h3>
                                <p>Menu ini digunakan untuk menghapus data yang sudah diupload, gunakan menu ini jika terjadi kesalahan upload data</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <form id="formupdate" autocomplete="off" method="post" action="/data/clear" class="needs-validation" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-md-8 mb-3">
                                    <label class="form-control-label">Judul Tabel <span class="text-danger">*</span></label>
                                    <select onchange="inputChange()" id="indicator" name="indicator" class="form-control" data-toggle="select" name="indicator" required>
                                        <option value="0" disabled selected> -- Pilih Judul Tabel -- </option>
                                        @foreach ($indicators as $indicator)
                                        <option value="{{ $indicator->id }}" {{ old('indicator') == $indicator->id ? 'selected' : '' }}>
                                            {{ $indicator->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('indicator')
                                    <div class="text-valid mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 mb-3">
                                    <label class="form-control-label mb-2">Pilih Tahun <span class="text-danger">*</span></label>
                                    @foreach ($years as $year)
                                    <div class="custom-control custom-checkbox mb-2">
                                        <input value="{{$year->id}}" onclick="inputChange()" name="year[]" class="custom-control-input" id="customCheck{{$year->id}}" type="checkbox">
                                        <label class="custom-control-label" for="customCheck{{$year->id}}">{{$year->name}}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <button disabled class="btn btn-primary mt-3" id="sbmtbtn" type="submit">Clear</button>
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

<script>

    function inputChange() {
        var value = document.getElementById("indicator").value;

        var isYearChecked = false;
        document.getElementsByName('year[]').forEach(element => {
            if (element.checked) {
                isYearChecked = true;
            }
        });

        if (document.getElementById("indicator").value != 0 && isYearChecked) {
            document.getElementById("sbmtbtn").disabled = false;
        } else {
            document.getElementById("sbmtbtn").disabled = true;
        }
    }
</script>
@endsection