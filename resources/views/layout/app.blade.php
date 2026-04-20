<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap-extension/css/bootstrap-extension.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css" />    

    <!-- Menu CSS -->
    <link href="{{ asset('plugins/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
    
    <!-- morris CSS -->
    <link href="{{ asset('plugins/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- animation CSS -->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- page CSS -->
    <link href="{{ asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/custom-select/custom-select.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('plugins/switchery/dist/switchery.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css" />

    <!-- color CSS -->
    <link href="{{ asset('css/colors/megna.css') }}" id="theme" rel="stylesheet">

    <!-- CHART CSS -->
    <link href="{{ asset('css/chart.min.css') }}"  rel="stylesheet">

    @stack('styles')

    <script type="text/javascript" src="{{ asset('js/utils.js') }}"></script>
</head>
<body>
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg "
                    href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i
                        class="ti-menu"></i></a>
                <div class="top-left-part">
                    <a class="logo" href="">
                        <b><img src="{{ asset('images/logo/admin_logo.png') }}" alt="home" /></b>
                        <span class="hidden-xs">
                            <img src="{{ asset('images/logo/admin_logo_ext.png') }}" alt="home" />
                        </span>
                    </a>
                </div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li>
                        <a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light">
                            <i class="icon-arrow-left-circle ti-menu"></i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> 
                            <img src="{{ asset('images/user.png') }}" alt="user-img" width="36" class="img-circle">
                            <b class="hidden-xs">{{ Auth::user()->name }}</b> 
                            <i class="fa fa-gear fa-spin"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="{{ url('admin/akun_setting') }}"><i class="ti-settings"></i> Account Setting</a></li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off"></i> Logout
                                </a>
                            </li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        @include('layout._layout.sidebar')

        <div id="page-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>

            <footer class="footer text-center"> 2026 &copy; {{ config('app.name', 'Laravel') }}</footer>
        </div>
    </div>

    <script src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/tether.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-extension/js/bootstrap-extension.min.js') }}"></script>
    
    <!-- Menu Plugin JavaScript -->
    <script src="{{ asset('plugins/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
    
    <!--slimscroll JavaScript -->
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>

    <!--Wave Effects -->
    <script src="{{ asset('js/waves.js') }}"></script>

    <!--Morris JavaScript -->
    <script src="{{ asset('plugins/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('plugins/morrisjs/morris.min.js') }}"></script>

    <!-- Sparkline chart JavaScript -->
    <script src="{{ asset('plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- jQuery peity -->
    <script src="{{ asset('plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('plugins/peity/jquery.peity.init.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/dashboard1.js') }}"></script>
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>

    <!-- start - This is for export functionality only -->
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/jszip.min.js') }}"></script>
    <script src="{{ asset('js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/buttons.print.min.js') }}"></script>

    <script src="{{ asset('plugins/switchery/dist/switchery.min.js') }}"></script>

    <script src="{{ asset('plugins/custom-select/custom-select.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}" type="text/javascript"></script> 
    <script src="{{ asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>

    <script src="{{ asset('plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript" src="{{ asset('plugins/multiselect/js/jquery.multi-select.js') }}"></script>

    <script type="text/javascript" src="{{ asset('plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/chart.min.js') }}"></script>

    <!--Style Switcher -->
    <script src="{{ asset('plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>

    @stack('scripts')
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();

            $(document).ready(function () {
                var table = $('#example').DataTable({
                    "columnDefs": [ {"visible": false, "targets": 2}], 
                    "order": [[2, 'asc']], 
                    "displayLength": 25, 
                    "drawCallback": function (settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();

                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function (group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });

                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function () {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    }else {
                        table.order([2, 'asc']).draw();
                    }
                });

            });

        });

        $('#example23').DataTable({
            dom: 'Bfrtip', buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        });
        
        jQuery(document).ready(function () {
            // Switchery
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

            $('.js-switch').each(function () {
                new Switchery($(this)[0], $(this).data());
            });

            $('.tgl_masuk').datepicker();
            $('.tgl_keluar').datepicker();
            $('.tgl_lahir').datepicker();
            $('.tanggal').datepicker();
            $('.akta_tgl').datepicker();
            $('.pengesahan_tgl').datepicker();

            // For select 2
            $(".select2").select2();
            $('.selectpicker').selectpicker();

            //Bootstrap-TouchSpin
            $(".vertical-spin").TouchSpin({
                verticalbuttons: true, 
                verticalupclass: 'ti-plus',
                verticaldownclass: 'ti-minus'
            });

            var vspinTrue = $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });

            if (vspinTrue) {
                $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
            }

            $("input[name='tch1']").TouchSpin({
                min: 0, 
                max: 100, 
                step: 0.1, 
                decimals: 2,
                boostat: 5, 
                maxboostedstep: 10, 
                postfix: '%'
            });

            $("input[name='tch2']").TouchSpin({
                min: -1000000000, max: 1000000000, stepinterval: 50, maxboostedstep: 10000000, prefix: '$'
            });

            $("input[name='tch3']").TouchSpin();

            $("input[name='tch3_22']").TouchSpin({
                initval: 40
            });

            $("input[name='tch5']").TouchSpin({
                prefix: "pre", postfix: "post"
            });

            // For multiselect
            $('#pre-selected-options').multiSelect();
            $('#optgroup').multiSelect({
                selectableOptgroup: true
            });

            $('#public-methods').multiSelect();
            $('#select-all').click(function () {
                $('#public-methods').multiSelect('select_all');
                return false;
            });

            $('#deselect-all').click(function () {
                $('#public-methods').multiSelect('deselect_all');
                return false;
            });

            $('#refresh').on('click', function () {
                $('#public-methods').multiSelect('refresh');
                return false;
            });

            $('#add-option').on('click', function () {
                $('#public-methods').multiSelect('addOption', {
                    value: 42, text: 'test 42', index: 0
                });

                return false;
            });
        });
    </script>
</body>
</html>