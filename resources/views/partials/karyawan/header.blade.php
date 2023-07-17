<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>S I Q</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ asset('asset') }}/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('atlantis') }}/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['{{ asset('atlantis') }}/assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('atlantis') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('atlantis') }}/assets/css/atlantis.min.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('atlantis') }}/assets/css/demo.css">
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="blue">

                <a href="index.html" class="logo">
                    <img src="{{ asset('atlantis') }}/assets/img/logo.svg" alt="navbar brand" class="navbar-brand">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"
                                aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="{{ asset('atlantis') }}/assets/img/profile.jpg" alt="..."
                                        class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <div class="user-box">
                                            <div class="avatar-lg"><img
                                                    src="{{ asset('atlantis') }}/assets/img/profile.jpg"
                                                    alt="image profile" class="avatar-img rounded"></div>
                                            <div class="u-text">
                                                <h4>{{ Auth::guard('user')->user()->name }}</h4>
                                                <p class="text-muted">{{ Auth::guard('user')->user()->email }}</p><a href="profile.html"
                                                    class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">My Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Account Setting</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/logout">Logout</a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        @include('partials.karyawan.sidebar')
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="content">
                <div class="panel-header bg-primary-gradient">
                    <div class="page-inner py-5">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div>
                                <h2 class="text-white pb-2 fw-bold">{{ $title }}</h2>
                            </div>

                        </div>
                    </div>
                </div>
                @yield('content')
            </div>
            @include('partials.footer')
        </div>

        <!-- Custom template | don't include it in your project! -->
        <div class="custom-template">
            <div class="title">Settings</div>
            <div class="custom-content">
                <div class="switcher">
                    <div class="switch-block">
                        <h4>Logo Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
                            <button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                            <br />
                            <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Navbar Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeTopBarColor" data-color="dark"></button>
                            <button type="button" class="changeTopBarColor" data-color="blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="green"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange"></button>
                            <button type="button" class="changeTopBarColor" data-color="red"></button>
                            <button type="button" class="changeTopBarColor" data-color="white"></button>
                            <br />
                            <button type="button" class="changeTopBarColor" data-color="dark2"></button>
                            <button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple2"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="green2"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange2"></button>
                            <button type="button" class="changeTopBarColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Sidebar</h4>
                        <div class="btnSwitch">
                            <button type="button" class="selected changeSideBarColor" data-color="white"></button>
                            <button type="button" class="changeSideBarColor" data-color="dark"></button>
                            <button type="button" class="changeSideBarColor" data-color="dark2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Background</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeBackgroundColor" data-color="bg2"></button>
                            <button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
                            <button type="button" class="changeBackgroundColor" data-color="bg3"></button>
                            <button type="button" class="changeBackgroundColor" data-color="dark"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-toggle">
                <i class="flaticon-settings"></i>
            </div>
        </div>
        @include('sweetalert::alert')

        <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('atlantis') }}/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="{{ asset('atlantis') }}/assets/js/core/popper.min.js"></script>
    <script src="{{ asset('atlantis') }}/assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="{{ asset('atlantis') }}/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="{{ asset('atlantis') }}/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('atlantis') }}/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


    <!-- Chart JS -->
    <script src="{{ asset('atlantis') }}/assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="{{ asset('atlantis') }}/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="{{ asset('atlantis') }}/assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="{{ asset('atlantis') }}/assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->

    <!-- jQuery Vector Maps -->
    <script src="{{ asset('atlantis') }}/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
    <script src="{{ asset('atlantis') }}/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

    <!-- Sweet Alert -->
    <script src="{{ asset('atlantis') }}/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Atlantis JS -->
    <script src="{{ asset('atlantis') }}/assets/js/atlantis.min.js"></script>

    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="{{ asset('atlantis') }}/assets/js/setting-demo.js"></script>
    <script src="{{ asset('atlantis') }}/assets/js/demo.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.5/i18n/id.json',
                }
            });
        });

        $('.tambah-produk').click(function() {
            @if (isset($produk))
                var newInput = '<div class="input-group mb-2">' +
                    '<select name="produk_id[]" class="form-control">' +
                    '@foreach ($produk as $data)' +
                    '<option value="{{ $data->id }}">{{ $data->kodeProduk }} - {{ $data->namaProduk }}</option>' +
                    '@endforeach' +
                    '</select>' +
                    '<div class="input-group-append col-4">' +
                    '<input type="number" name="quantity[]" class="form-control" placeholder="Quantity">' +
                    '</div>' +
                    '<div class="input-group-append">' +
                    '<button class="btn btn-secondary hapus-produk" type="button">Hapus</button>' +
                    '</div>' +
                    '</div>';
                $('#produk-container').append(newInput);
            @else
                console.log('Variabel $produk tidak ada');
            @endif
        });
        $(document).on('click', '.hapus-produk', function() {
            $(this).closest('.input-group').remove();
        });
    </script>

</body>

</html>
