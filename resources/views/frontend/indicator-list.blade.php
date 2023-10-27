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
                        <li class="side-topic-item @if($currentsubject->id == $subject->id) is-active @endif">
                            <a href="/subject/{{$subject->id}}" class="fs-7">
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
                        <form action="/frontend/dataset" method="get" class="h-100">
                            <div class="row h-100">
                                <div class="col-md-12">
                                    <div class="input-group h-100">
                                        <input type="text" name="judul" value="" class="form-control h-100 border-0" placeholder="Masukkan Kata Pencarian">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>

                    <div class="col-md-12 mb-2" style="color: #f97316;">
                        @if(count($currentsubject->indicators)>0) {{count($currentsubject->indicators)}} Indikator Ditemukan Pada Kategori @else Belum Ada Indikator pada Kategori @endif {{$currentsubject->name}}
                    </div>
                    <div class="mb-4 d-lg-none">
                        <div class="d-flex align-items-center">
                            <h6 class="col-3 pl-0 pr-2 mb-0 text-muted">Kategori</h6>
                            <div class="flex-grow-1">
                                <div class="dropdown w-100">
                                    <button class="btn btn-outline-secondary btn-sm w-100" type="button" data-toggle="dropdown" aria-expanded="false">
                                        {{$currentsubject->name}} <i class="float-right fas fa-arrow-down"></i>
                                    </button>
                                    <div class="dropdown-menu w-100">
                                        @foreach($subjects as $subject)
                                        <a class="dropdown-item fs-7 " href="/subject/{{$subject->id}}">
                                            {{$subject->name}}
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dataset-list mb-4">
                        @foreach($currentsubject->indicators as $indicator)
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

<script>
    var _route = "/device/fingerprint";
</script>
<script type="text/javascript" src="/assets/img/project/css/device.js"></script>
<script src="/assets/img/project/css/js.cookie.min.js"></script>
<script src="/assets/img/project/css/jquery.min.js"></script>
<script src="/assets/img/project/css/popper.min.js"></script>
<script src="/assets/img/project/css/bootstrap.min.js"></script>
<script src="/assets/img/project/css/main.js"></script>
<script src="/assets/img/project/css/slick.js"></script>
<script src="/assets/img/project/css/select2.js"></script>
<script src="/assets/img/project/css/sweetalert2.all.min.js"></script>
<script src="/assets/img/project/css/highcarts.js"></script>
<script src="/assets/img/project/css/exporting.js"></script>
<script src="/assets/img/project/css/data.js"></script>
<script src="/assets/img/project/css/accessibility.js"></script>
<script src="/assets/img/project/css/leaflet.js"></script>
<script src="/assets/img/project/css/air.js"></script>
<script src="https://kit.fontawesome.com/8031cd8b80.js" crossorigin="anonymous"></script>

<!-- <script>
    function observeSuggestion() {
        const footerElement = document.querySelector('footer');
        const suggestionElement = document.querySelector('.feedback-outer');
        const footerElementHeight = footerElement.getBoundingClientRect().height;
        const optionsIntersection = {
            root: null,
            threshold: 0,
            rootMargin: `-${footerElementHeight / 2}px`
        };

        const suggestionObserver = new IntersectionObserver((entries) => {
            const [entry] = entries;
            if (!entry.isIntersecting) {
                suggestionElement.style.bottom = 'calc(36px + 0.5rem)';
            } else {
                suggestionElement.style.bottom = `${footerElementHeight + 15}px`;
            }
        }, optionsIntersection);
        suggestionObserver.observe(footerElement);
    }
    observeSuggestion();

    $(function() {
        Src.Init();

        const SHOWN_CONSTRUCTION = 'od_jatim_construction';
        $('#infoConstruction .btn-close-construction').on('click', function() {
            if (Cookies.get(SHOWN_CONSTRUCTION)) {
                return;
            }
            Cookies.set(SHOWN_CONSTRUCTION, true, {
                expires: 1,
                path: '/'
            });
        });

        if (!Cookies.get(SHOWN_CONSTRUCTION)) {
            $('#infoConstruction').modal('show');
        }
    });
</script>
<script>
    $('.slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [{
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ],

        prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
    });
</script>
<script>
    $('.slider-notplay').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ],

        prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
    });
</script>

<script>
    $('.slider-infographics').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
        arrows: false,
        autoplay: false,
        autoplaySpeed: 2500,
    });
</script>

<script>
    $('.slider-notplay3').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ],

        prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
    });
</script>
<script>
    $(document).ready(function() {
        $(".select21").select2();
    });
</script>

<script>
    $(document).ready(function() {
        $(".select2").select2({
            allowClear: true,

        });
    });
</script>

<script type="text/javascript">
    $(function() {

        $('body').on('show.bs.modal', '.modal.modal-async', function(event) {
            $(this).find(".modal-content").load(event.relatedTarget.href);
        });

        $('body').on('hidden.bs.modal', '.modal.modal-async', function(event) {
            const markup = `
                <div class="d-flex align-items-center justify-content-center h-100">
                    <img src="/bundles/greenadmin/img/loading.gif" style="width: 30px" />
                </div>
            `;
            $(this).find(".modal-content").html(markup);
        });
    });
</script>

<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    // document.getElementById("defaultOpen").click();
</script>

<script>
    /* When the user clicks on the button, 
	toggle between hiding and showing the dropdown content */
    function dropDown() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>

<script>
</script>
<script>
    jQuery(document).ready(function($) {
        $('.search-input-text').on('keyup click', function() {
            var value = $('.search-input-text').val();
            if ($('.autocomplete-items').length || !value) {
                $('.autocomplete-items').remove();
            }
            if (value) {
                $.ajax({
                    type: "GET",
                    url: '/frontend/gsearch' + '?key=' + value,
                    success: function(r) {
                        if ($('.autocomplete-items').length) {
                            $('.autocomplete-items').remove();
                        }
                        var data = r;
                        // alert(data.length);
                        $('.autocomplete-box').append('<div id="autocomplete-list" class="autocomplete-items"></div>');
                        if (data.length == 0) {
                            var url = "/frontend/dataset/request";
                            $('#autocomplete-list').append('<div><a href="' + url + '" class="text-primary">-- Permohonan Data --</a></div>');
                        } else {
                            $.each(data, function(index, element) {
                                var url = '';
                                if (element.tipe == 'INFOGRAFIK') {
                                    url = "/frontend/infografik" + '?judul=' + element.judulx;
                                } else {
                                    url = "/frontend/dataset" + '?judul=' + element.judulx;
                                }
                                $('#autocomplete-list').append('<div><a href="' + url + '">' + element.judul + '</a></div>');
                            });
                        }
                    }
                });
                // alert(value);
            }
        });
    });
</script> -->
@endsection