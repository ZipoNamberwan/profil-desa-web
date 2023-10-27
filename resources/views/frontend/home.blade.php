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

@section('nav-bar-bg')
is-transparent
@endsection
    
@section('container')
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
                    <a href="/subject/{{$subject->id}}" class="box-topic">
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