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
            <a href="
                                    /frontend/dataset
                                " class="btn btn-outline-secondary btn-sm">
                <i class="bi-chevron-left"></i> Kembali
            </a>
        </div>

        <div class="row align-items-center">
            <div class="col">
                <div class="border-right pr-3">
                    <h4 class="mb-1">Data Capaian Pengelolaan DBHCHT</h4>
                    <ul class="list-inline mb-4">
                        <li class="list-inline-item">
                            <span class="text-muted">
                                <i class="fa fa-calendar mr-1"></i>30 March 2023
                            </span>
                        </li>
                        <li class="list-inline-item">
                            <span class="text-muted">
                                <i class="fa fa-eye mr-1"></i>421
                            </span>
                        </li>
                    </ul>

                    <div class="d-flex align-items-center">
                        <div class="flex-none border rounded-lg" style="width: 45px;padding: 4px;">
                            <figure class="rz-ratio rz-ratio-1x1 m-0">

                                <img src="/uploads/fd2cbb8fbb69b2286ee1062f2ac3af9a.png" style="object-fit: contain;">
                            </figure>
                        </div>
                        <div class="ml-2">
                            <h6 class="mb-1 fs-7">Biro Perekonomian Setda Prov. Jawa Timur</h6>
                            <p class="m-0 fs-7 line-height-sm">Ekonomi</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="dropdown w-100">
                    <button class="btn btn-outline-secondary btn-sm w-100 mb-3" type="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="bi-download mr-1"></i> Unduh
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item fs-7 text-black-50" href="/frontend/tfeedback/request/1633?tipe=xlsx" id="button-feedback" class="" data-toggle="modal" data-target="#feedback"> <i class="fas fa-file-excel mr-1"></i> Spreadsheet</a>
                        <a class="dropdown-item fs-7 text-black-50" href="/frontend/tfeedback/request/1633?tipe=csv" id="button-feedback" class="" data-toggle="modal" data-target="#feedback"> <i class="fas fa-file-csv mr-1"></i> CSV</a>
                        </a>
                        <a class="dropdown-item fs-7 text-black-50" href="/api/1633" target="_blank"><i class="fas fa-gears mr-1"></i> API</a>
                        <a class="dropdown-item fs-7 text-black-50" href="/frontend/dataset/1633/dcat" target="_blank"><i class="fas fa-gears mr-1"></i> CKAN DCAT</a>
                    </div>
                </div>
                <div class="dropdown w-100">
                    <button class="btn btn-outline-secondary btn-sm w-100 mb-3" type="button" data-toggle="dropdown" aria-expanded="false">
                        <i class="bi-share mr-1"></i> Bagikan
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item fs-7 text-black-50" href="https://www.facebook.com/sharer/sharer.php?u=http://opendata.jatimprov.go.id/frontend/dataset/1633/detail_dataset" target="_blank">
                            <i class="bi-facebook mr-1"></i> Facebook
                        </a>
                        <a class="dropdown-item fs-7 text-black-50" href="https://twitter.com/intent/tweet?text=Data Capaian Pengelolaan DBHCHT&url=http://opendata.jatimprov.go.id/frontend/dataset/1633/detail_dataset" target="_blank">
                            <i class="bi-twitter mr-1"></i> Twitter
                        </a>
                        <a class="dropdown-item fs-7 text-black-50" href="whatsapp://send?text=Data Capaian Pengelolaan DBHCHT http://opendata.jatimprov.go.id/frontend/dataset/1633/detail_dataset" target="_blank">
                            <i class="bi-whatsapp mr-1"></i> Whatsapp
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
                <div class="mb-0">
                    <h5>Deskripsi Dataset</h5>
                    <p class="mb-0">Data Pagu Alokasi Penyaluran DBHCHT Tahun 2022</p>
                </div>
                <div class="border-top my-4" style="border-top-width: 5px !important;"></div>
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
                                            <td width="25%" class="text-muted">Dataset Dibuat</td>
                                            <th>30 March 2023</th>
                                        </tr>
                                        <tr>
                                            <td width="25%" class="text-muted">Dataset Diubah</td>
                                            <th>30 March 2023</th>
                                        </tr>

                                        <tr>
                                            <td class="text-muted">Kode Dataset</td>
                                            <th>4.01-001</th>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Produsen</td>
                                            <th>Biro Perekonomian Setda Prov. Jawa Timur</th>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Satuan Dataset</td>
                                            <th>Dokumen</th>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Periode Dataset</td>
                                            <th>Tahun</th>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Sumber Dataset</td>
                                            <th>Internal dan Eksternal</th>
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
                                        <table class="table table-bordered table-addt" id="table_ajax" width="100%">
                                            <thead>
                                                <tr>

                                                    <th>periode_update</th>

                                                    <th>kabupaten_kota</th>

                                                    <th>pagu_alokasi</th>
                                                </tr>
                                                <tr>

                                                    <th><input type="text" id="periode_update" data-column="0" class="search-input-text form-control"></th>

                                                    <th><input type="text" id="kabupaten_kota" data-column="1" class="search-input-text form-control"></th>

                                                    <th><input type="text" id="pagu_alokasi" data-column="2" class="search-input-text form-control"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="grafik" role="tabpanel" aria-labelledby="metode-tab">
                                <div class="content overflow-hidden w-100">
                                    <div class="row">
                                        <div class="col-lg-1">Periode</div>
                                        <div class="col-lg-3">
                                            <div style="display:flex ;">

                                                <div>
                                                    <select name="periode" id="periode">
                                                        <option value="All">Semua</option>
                                                        <option value="Tahun">Tahun</option>
                                                    </select>
                                                </div>
                                                <div style="margin-left:2px ;">
                                                    <select name="tahun" id="tahun">
                                                        <option value="All">Semua</option>
                                                        <option value="2023">2023</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2018">2018</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>

                                    <div style="overflow-x: auto;">
                                        <script src="/frontend/js/jquery.min.js"></script>

                                        <div id="linechart_test" style="width: 100%; height: 400px; margin: 0 auto"></div>
                                        <script type="text/javascript">
                                            $(document).ready(function() {
                                                getDataChart();
                                            });

                                            function getDataChart() {
                                                var periode = $('#periode').val() + '|' + $('#tahun').val();
                                                $.ajax({
                                                    type: "GET",
                                                    dataType: "json",
                                                    url: "/frontend/dataset/1633/chartJson",
                                                    // url: "/frontend/visualisasi/1633/chartJsonDataset",
                                                    data: {
                                                        periode: periode
                                                    },
                                                    success: function(r) {
                                                        chartHighchart(r.columns, r.datas, periode);
                                                    }
                                                });
                                            }

                                            function chartHighchart(columnx, datax, periode) {
                                                var explode = periode.split("|");
                                                if (explode[1] == 'All') {
                                                    var periodex = explode[0] + " Semua Tahun";
                                                } else {
                                                    var periodex = explode[0] + " " + explode[1];
                                                }
                                                // alert(explode);
                                                var chartx = new Highcharts.Chart({
                                                    chart: {
                                                        "renderTo": "linechart_test",
                                                        "type": "line"
                                                    },
                                                    series: datax,
                                                    title: {
                                                        "text": "Data Capaian Pengelolaan DBHCHT" + " " + periodex
                                                    },
                                                    xAxis: {
                                                        "title": {
                                                            "text": "kabupaten_kota"
                                                        },
                                                        "categories": columnx
                                                    },
                                                    yAxis: {
                                                        "title": {
                                                            "text": ""
                                                        }
                                                    },
                                                    credits: {
                                                        enabled: false
                                                    }
                                                });
                                            };
                                        </script>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-50">
                <h5 class="mb-3">Rekomendasi Dataset</h5>
                <div class="dataset-list bg-white mb-4">
                    <a href="/frontend/dataset/1624/detail_dataset" class="dataset-item">
                        <div class="flex-grow-1 px-3">
                            <h6 class="text-app-primary mb-2">Data Badan Usaha Milik Daerah (BUMD)/ Company Profile</h6>
                            <div class="fs-8 mb-1 text-muted">
                                <i class="fa fa-building mr-2"></i>Biro Perekonomian Setda Prov. Jawa Timur
                            </div>
                            <div class="fs-8 d-flex">
                                <div class="text-muted">
                                    <i class="fa fa-calendar mr-2"></i>29 June 2022
                                </div>
                            </div>
                        </div>
                        <div class="col-1 pr-0 pl-2">
                            <div class="text-muted">
                                <i class="mr-1 fa fa-eye"></i> 72
                            </div>
                        </div>
                    </a>
                    <a href="/frontend/dataset/1599/detail_dataset" class="dataset-item">
                        <div class="flex-grow-1 px-3">
                            <h6 class="text-app-primary mb-2">Data Jumlah Kebijakan Lingkup Bidang Perekonomian (RKPD)</h6>
                            <div class="fs-8 mb-1 text-muted">
                                <i class="fa fa-building mr-2"></i>Biro Perekonomian Setda Prov. Jawa Timur
                            </div>
                            <div class="fs-8 d-flex">
                                <div class="text-muted">
                                    <i class="fa fa-calendar mr-2"></i>29 June 2022
                                </div>
                            </div>
                        </div>
                        <div class="col-1 pr-0 pl-2">
                            <div class="text-muted">
                                <i class="mr-1 fa fa-eye"></i> 48
                            </div>
                        </div>
                    </a>
                    <a href="/frontend/dataset/1601/detail_dataset" class="dataset-item">
                        <div class="flex-grow-1 px-3">
                            <h6 class="text-app-primary mb-2">Data Capaian Pengelolaan Program Dana Bergulir (Dagulir)</h6>
                            <div class="fs-8 mb-1 text-muted">
                                <i class="fa fa-building mr-2"></i>Biro Perekonomian Setda Prov. Jawa Timur
                            </div>
                            <div class="fs-8 d-flex">
                                <div class="text-muted">
                                    <i class="fa fa-calendar mr-2"></i>29 June 2022
                                </div>
                            </div>
                        </div>
                        <div class="col-1 pr-0 pl-2">
                            <div class="text-muted">
                                <i class="mr-1 fa fa-eye"></i> 40
                            </div>
                        </div>
                    </a>
                    <a href="/frontend/dataset/1600/detail_dataset" class="dataset-item">
                        <div class="flex-grow-1 px-3">
                            <h6 class="text-app-primary mb-2">Data program Millenial Job Center (MJC)</h6>
                            <div class="fs-8 mb-1 text-muted">
                                <i class="fa fa-building mr-2"></i>Biro Perekonomian Setda Prov. Jawa Timur
                            </div>
                            <div class="fs-8 d-flex">
                                <div class="text-muted">
                                    <i class="fa fa-calendar mr-2"></i>29 June 2022
                                </div>
                            </div>
                        </div>
                        <div class="col-1 pr-0 pl-2">
                            <div class="text-muted">
                                <i class="mr-1 fa fa-eye"></i> 27
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

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