<!--
=========================================================
* Argon Dashboard 2 - v2.0.2
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('new argon/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('new argon/assets/img/favicon.png') }}">
    <title>
        Dashboard

    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('new argon/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('new argon/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('new argon/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('new argon/assets/css/argon-dashboard.css?v=2.0.2') }}" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Grape+Nuts&family=Montserrat:wght@100&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Staatliches&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/css/dataTables.jqueryui.min.css"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.jqueryui.min.js"></script>
    <style>
        .dataTables_filter {
            float: right !important;
            margin-right: 5px;
            padding-top: 5px;
        }

        .dataTables_length {
            display: inline !important;

        }

    </style>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 position-absolute w-100"
        style=" background-image: linear-gradient(to right, #00E1FD, #FC007A);"></div>

    {{-- Aside navigation bar --}}

    @include('admin.layout.partials.aside-nav')

    <main class="main-content position-relative border-radius-lg ">

        <!--Section Untuk Main Navbar posisi diatas konten -->
        @include('admin.layout.partials.main-navbar')
        <!-- End Navbar -->

        @yield('content')


    </main>

    @include('admin.layout.partials.fixed-plugin')

    @include('sweetalert::alert')
    <!--   Core JS Files   -->
    <script src="{{ asset('new argon/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('new argon/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('new argon/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('new argon/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('new argon/assets/js/plugins/chartjs.min.js') }}"></script>
    {{-- <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script> --}}
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    @stack('script')
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('new argon/assets/js/argon-dashboard.min.js?v=2.0.2') }}"></script>
</body>

</html>
