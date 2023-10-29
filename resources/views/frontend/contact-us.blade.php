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
<link rel="stylesheet" href="/assets/style.css">

@endsection

@section('nav-bar-bg')
is-transparent
@endsection

@section('container')
<div class="pagebar-header position-relative">
    <div class="shape-round"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="text-light font-weight-bold text-center">
                    Kontak Kami
                </h3>
                <p class="text-center">Silakan isi permintaan, kritik maupun saran terkait situs web ini...</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-app-gray py-5">
    <div class="container">
        <div class="mx-auto" style="max-width: 800px;">
            <form action="/contact" method="POST" id="formFeedback">
                @csrf
                <div class="p-5 bg-white shadow-app rounded-app position-relative" style="top: -90px;">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>Nama <span class="text-danger">*</span></label>
                            <input name="sender" type="text" class="form-control" placeholder="Nama">
                            @error('sender')
                            <div class="error-feedback mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>No HP <span class="text-danger">*</span></label>
                            <input name="contact_number" type="text" class="form-control" placeholder="Nama">
                            @error('contact_number')
                            <div class="error-feedback mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>Pilih sektor/grup berikut yang mewakili posisi Anda saat ini <span class="text-danger">*</span></label>
                            <input name="email" type="email" class="form-control" placeholder="Nama">
                            @error('email')
                            <div class="error-feedback mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>Berikan saran dan masukan Anda agar kami dapat memberikan layanan lebih baik lagi <span class="text-danger">*</span></label>
                            <textarea name="message" class="form-control" id="" cols="30" rows="5"></textarea>
                            @error('message')
                            <div class="error-feedback mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-9"></div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-success btn-xs"><i class="fa fa-save mr-2"></i>Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')

@endsection