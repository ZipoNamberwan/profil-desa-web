<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Data Desa Pajurangan</title>
    <link rel="shortcut icon" href="/assets/img/project/img/desacantikbg.png" type="image/x-icon" sizes="32x32">

    @yield('stylesheet')

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>

    <header class="header-top @yield('nav-bar-bg')">
        <div class="main-header">
            <div class="container">
                <nav class="navbar navbar-expand-lg is-customized"> <!-- bg-dark -->
                    <a class="navbar-brand" href="/">
                        <img class="logo-header" src="/assets/img/project/img/desacantikbg.png" alt="img-brand-logo" />
                        <img class="logo-header-light" src="/assets/img/project/img/desacantikbg.png" alt="img-brand-logo" />
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars unopen"></i>
                        <i class="fas fa-minus open"></i>
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
                                <a href="/login" target="_blank" class="nav-link">Admin</a>
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
        @yield('container')
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
                                <img src="/assets/img/project/img/desacantik.png" height="60" class="mr-2">
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

@yield('script')

</html>