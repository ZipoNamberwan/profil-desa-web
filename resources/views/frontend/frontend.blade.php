<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Data Desa Pajurangan</title>
    <link rel="shortcut icon" href="/brand/icon/open-data-32x32.png" type="image/x-icon" sizes="32x32">

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

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>

    <header class="header-top is-transparent">
        <div class="main-header">
            <div class="container">
                <nav class="navbar navbar-expand-lg is-customized"> <!-- bg-dark -->
                    <a class="navbar-brand" href="/frontend/homepage">
                        <img class="logo-header" src="/brand/open-data-logo-text1.png" alt="img-brand-logo" />
                        <img class="logo-header-light" src="/brand/open-data-logo-text-light1.png" alt="img-brand-logo" />
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="bi-list unopen"></i>
                        <i class="bi-x-lg open"></i>
                    </button>

                    <div class="collapse navbar-collapse navbar-offcanvas" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto text-header">
                            <li class="nav-item">
                                <a class="nav-link" href="/frontend/sektoral" class="nav-link">Website Desa</a>
                            </li>
                            <li class="nav-item">
                                <a href="/frontend/dataset" class="nav-link">Kontak Kami</a>
                            </li>
                            <li class="nav-item">
                                <a href="/frontend/organisasi" class="nav-link">Statistik</a>
                            </li>
                            <li class="nav-item">
                                <a href="/login" class="nav-link">Admin</a>
                            </li>
                            <!-- <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle  " id="infografikNavbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Library
                                </a>
                                <div class="dropdown-menu" aria-labelledby="infografikNavbarDropdown">
                                    <a class="dropdown-item" href="/frontend/infografik">Infografik</a>
                                    <a class="dropdown-item" href="/frontend/infografik/dinamis">E-Book</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle  " id="linkcepatNavbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Link Cepat
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="infografikNavbarDropdown">
                                    <a target="_blank" class="dropdown-item" href="http://geoportal.jatimprov.go.id">Geoportal Bappeda Prov. Jatim</a>
                                </div>
                            </li> -->
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <section class="home-hero position-relative d-flex align-items-center">
            <div class="shape-round"></div>
            <img src="/assets/img/project/img/4d505ccfe007ba3d7a698d5db194605d.jpg" class="home-hero__img" alt="" />

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="home-hero__title mb-2 text-center text-white font-weight-bold">
                            Portal Data Desa Pajurangan
                        </div>
                        <div class="home-hero__subtitle mb-4 text-center text-white">
                            Temukan data-data terkait Desa Pajurangan
                        </div>

                        <div class="search-global mb-0">
                            <div class="search-global-inner">
                                <div class="input-group autocomplete-box">
                                    <input id="gsearch" name="gsearch" type="text" class="form-control input-search search-input-text" placeholder="Masukkan Kata Pencarian">
                                    <button class="btn btn-primary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-4 pb-3">
            <div class="container">
                <div class="topic-outer">
                    <h4 class="mb-3">Kategori</h4>
                    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 mx-n2 justify-content-center">
                        @foreach($subjects as $subject)
                        <div class="col px-2">
                            <a href="/frontend/dataset?kategori=1" class="box-topic">
                                <figure class="box-topic__img flex-none m-0 mb-2">
                                    <img src="{{$subject->icon}}" alt="" />
                                </figure>
                                <div class="box-topic__content">
                                    {{$subject->name}}
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <p id="flash"></p>

        <section class="bg-app-primary statistic-section">
            <img class="statistic-pattern-1" src="/assets/img/project/img/pattern1.png" />
            <img class="statistic-pattern-2" src="/assets/img/project/img/pattern1.png" />
            <div class="container">
                <h3 class="mb-4 text-center text-light font-weight-bold text-app-shadow">Statistik Data Desa Pajurangan</h3>
                <div class="row mx-n2">
                    <div class="col-12 col-lg-3 px-2">
                        <a href="/frontend/sektoral" class="box-statistic mb-3 mb-lg-0 bg-app-secondary rounded-app p-4">
                            <div class="text-light text-center h1 font-weight-bold mb-2">{{count($subjects)}}</div>
                            <div class="text-light text-center h4">Kategori</div>
                        </a>
                    </div>
                    <div class="col-12 col-lg-3 px-2">
                        <a href="/frontend/dataset" class="box-statistic mb-3 mb-lg-0 bg-app-secondary rounded-app p-4">
                            <div class="text-light text-center h1 font-weight-bold mb-2">{{$total_indicator}}</div>
                            <div class="text-light text-center h4">Indikator</div>
                        </a>
                    </div>
                    <div class="col-12 col-lg-3 px-2">
                        <a href="/frontend/infografik" class="box-statistic mb-3 mb-lg-0 bg-app-secondary rounded-app p-4">
                            <div class="text-light text-center h1 font-weight-bold mb-2">{{$total_data}}</div>
                            <div class="text-light text-center h4">Data</div>
                        </a>
                    </div>
                    <div class="col-12 col-lg-3 px-2">
                        <a href="#" class="box-statistic mb-3 mb-lg-0 bg-app-secondary rounded-app p-4">
                            <div class="text-light text-center h1 font-weight-bold mb-2">83500</div>
                            <div class="text-light text-center h4">Visitor</div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- <section id="blog" class="blog-grid section-padding">
            <div class="container">
                <div class="section-head text-center">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8 col-sm-10">
                            <h4>Highlight Infografik</h4>
                        </div>
                    </div>
                </div>

                <div class="slider">
                    <div class="slick-wrapper slick-initialized slick-slider slick-dotted">
                        <div class="slick-list draggable">
                            <div class="slick-track">
                                <div class="slick-slide">
                                    <div class="slick-slide-in" style="width: 100%; display: inline-block;">
                                        <div class="item">
                                            <div class="post-img">
                                                <div class="img">
                                                    <a href="/frontend/infografik/detail/125">
                                                        <img style="width:unset!important;" src="/uploads/e82d2f35cbd3ef35992683341b3ecd92.jpg">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="cont">
                                                <div class="info">
                                                    <a>24 October 2023</a>
                                                </div>
                                                <h5>
                                                    <a href="/frontend/infografik/detail/125" class="max-lines" data-placement="top" data-toggle="tooltip" title="Nilai Ekspor Jatim Capai Angka 1,88 Miliar Dolar AS">Nilai
                                                        Ekspor Jatim Capai Angka 1,88 Miliar Dolar AS</a>
                                                </h5>
                                                <a class="more" href="/frontend/infografik/detail/125">
                                                    <span>INFOGRAFIK</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slick-wrapper slick-initialized slick-slider slick-dotted">
                        <div class="slick-list draggable">
                            <div class="slick-track">
                                <div class="slick-slide">
                                    <div class="slick-slide-in" style="width: 100%; display: inline-block;">
                                        <div class="item">
                                            <div class="post-img">
                                                <div class="img">
                                                    <a href="/frontend/infografik/detail/124">
                                                        <img style="width:unset!important;" src="/uploads/38c8bf3445c948ab7f6b80e6220dfe36.jpg">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="cont">
                                                <div class="info">
                                                    <a>24 October 2023</a>
                                                </div>
                                                <h5>
                                                    <a href="/frontend/infografik/detail/124" class="max-lines" data-placement="top" data-toggle="tooltip" title="Selamat Hari Santri Nasional">Selamat Hari Santri
                                                        Nasional</a>
                                                </h5>
                                                <a class="more" href="/frontend/infografik/detail/124">
                                                    <span>INFOGRAFIK</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slick-wrapper slick-initialized slick-slider slick-dotted">
                        <div class="slick-list draggable">
                            <div class="slick-track">
                                <div class="slick-slide">
                                    <div class="slick-slide-in" style="width: 100%; display: inline-block;">
                                        <div class="item">
                                            <div class="post-img">
                                                <div class="img">
                                                    <a href="/frontend/infografik/detail/123">
                                                        <img style="width:unset!important;" src="/uploads/cbaff24deb55ca87e047747762845f56.jpg">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="cont">
                                                <div class="info">
                                                    <a>24 October 2023</a>
                                                </div>
                                                <h5>
                                                    <a href="/frontend/infografik/detail/123" class="max-lines" data-placement="top" data-toggle="tooltip" title="Indeks Kemerdekaan Pers (IKP) Jawa Timur 2023 Naik Signifikan">Indeks
                                                        Kemerdekaan Pers (IKP) Jawa Timur 2023 Naik Signifikan</a>
                                                </h5>
                                                <a class="more" href="/frontend/infografik/detail/123">
                                                    <span>INFOGRAFIK</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slick-wrapper slick-initialized slick-slider slick-dotted">
                        <div class="slick-list draggable">
                            <div class="slick-track">
                                <div class="slick-slide">
                                    <div class="slick-slide-in" style="width: 100%; display: inline-block;">
                                        <div class="item">
                                            <div class="post-img">
                                                <div class="img">
                                                    <a href="/frontend/infografik/detail/122">
                                                        <img style="width:unset!important;" src="/uploads/91d878e1bdb8582a10a67defa9daa0d5.jpg">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="cont">
                                                <div class="info">
                                                    <a>24 October 2023</a>
                                                </div>
                                                <h5>
                                                    <a href="/frontend/infografik/detail/122" class="max-lines" data-placement="top" data-toggle="tooltip" title="Hari Perpustakaan Sekolah Internasional">Hari
                                                        Perpustakaan Sekolah Internasional</a>
                                                </h5>
                                                <a class="more" href="/frontend/infografik/detail/122">
                                                    <span>INFOGRAFIK</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slick-wrapper slick-initialized slick-slider slick-dotted">
                        <div class="slick-list draggable">
                            <div class="slick-track">
                                <div class="slick-slide">
                                    <div class="slick-slide-in" style="width: 100%; display: inline-block;">
                                        <div class="item">
                                            <div class="post-img">
                                                <div class="img">
                                                    <a href="/frontend/infografik/detail/121">
                                                        <img style="width:unset!important;" src="/uploads/17647d15aae3aae6addbd8ef2b4202d6.jpg">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="cont">
                                                <div class="info">
                                                    <a>24 October 2023</a>
                                                </div>
                                                <h5>
                                                    <a href="/frontend/infografik/detail/121" class="max-lines" data-placement="top" data-toggle="tooltip" title="Hari Pengentasan Kemiskinan Internasional">Hari
                                                        Pengentasan Kemiskinan Internasional</a>
                                                </h5>
                                                <a class="more" href="/frontend/infografik/detail/121">
                                                    <span>INFOGRAFIK</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section> -->

    </main>


    <div class="detail_modal">
        <div id="feedback" class="modal modal-async fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div style="text-align: center"><img src="/bundles/greenadmin/img/loading.gif" style="width: 20px" /></div>
                </div>
            </div>
        </div>
    </div>
    <footer class="sticky-footer py-5">
        <div class="pt-2">
            <div class="container">
                <div class="pb-3 mb-3 border-bottom">
                    <div class="row">
                        <!-- <div class="col-12 col-lg-3">
                            <h3 class="text-light mb-3">Open Data</h3>
                            <img src="/brand/icon/open-data-128x128.png" height="60" class="mr-2">
                            <img src="/brand/sata-jatim-logo.png" height="60" class="mr-2">
                        </div> -->
                        <div class="col-12 col-lg-6">
                            <div class="text-lg-left mt-4 mt-lg-0">
                                <h6 class="text-light mb-3">Kolaborasi</h6>
                                <img src="/assets/img/project/img/satudataindonesia.png" height="60" class="mr-2">
                                <img src="/assets/img/project/img/bps.png" height="60" class="mr-2">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="text-lg-right mt-4 mt-lg-0">
                                <h6 class="title text-light mb-4">Contact Info</h6>
                                <ul class="list-unstyled text-light">
                                    <li>Kantor Desa Pajurangan</li>
                                    <li>Jln. Raya No.01 Desa Pajurangan Kecamatan Gending Kode Pos 67272</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <p class="text-light mb-0">&copy; Pemerintah Desa Pajurangan 2023</p>
                    <a href="/login" target="_blank" class="d-inline-flex align-items-center text-light btn btn-sm">
                        <!-- <i class="fas fa-sign-in mr-2 fs-6"></i>  -->
                        Sign In
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- <div class="floating-toolbar px-5">
        <a href="/frontend/tfeedback/form_survey" target="_blank" class="fs-7 btn toolbar-item">
            <i class="icon fs-6 bi-clipboard-minus-fill"></i>
            Survey
        </a>
        <a href="/frontend/top-ranking-activities" class="fs-7 btn toolbar-item" data-toggle="modal" data-target="#modalDrawerLeft">
            <i class="icon fs-6 bi-trophy-fill"></i>
            Top Rank
        </a>
    </div> -->

    <div class="feedback-outer">
        <a href="/frontend/dataset/request" class="feedback" data-toggle="modal" data-target="#modalDrawer">
            <img src="/assets/img/project/img/dataset-coni.png" alt="Image Dataset Suggestion" />
        </a>
    </div>

    <div class="modal modal-async fade m-drawer is-start" id="modalDrawerLeft" tabindex="-1" aria-labelledby="modalDrawerLeftLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="d-flex align-items-center justify-content-center h-100">
                    <img src="/bundles/greenadmin/img/loading.gif" style="width: 30px" />
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-async fade m-drawer is-end" id="modalDrawer" tabindex="-1" aria-labelledby="modalDrawerLabel" data-backdrop="static" data-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="d-flex align-items-center justify-content-center h-100">
                    <img src="/bundles/greenadmin/img/loading.gif" style="width: 30px" />
                </div>
            </div>
        </div>
    </div>
</body>
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

</html>