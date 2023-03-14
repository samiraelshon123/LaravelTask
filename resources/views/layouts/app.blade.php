<!doctype html>
{{--{{dd(App::currentLocale())}}--}}
<html lang="{{Config::get("app.locale") }}" dir="{{(Config::get("app.locale") =='ar')?'rtl':'ltr' }}"  >

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--favicon-->
    <link rel="icon" href="{{asset("assets/images/favicon-32x32.png")}}" type="image/png" />
    <!--plugins-->
    <link href="{{asset("assets/plugins/notifications/css/lobibox.min.css")}}" rel="stylesheet"/>
    <link href="{{asset("assets/plugins/vectormap/jquery-jvectormap-2.0.2.css")}}" rel="stylesheet"/>
    <link href="{{asset("assets/plugins/simplebar/css/simplebar.css")}}" rel="stylesheet" />
    <link href="{{asset("assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css")}}" rel="stylesheet" />
    <link href="{{asset("assets/plugins/metismenu/css/metisMenu.min.css")}}" rel="stylesheet" />
    <link href="{{asset("assets/plugins/datatable/css/dataTables.bootstrap5.min.css")}}" rel="stylesheet" />


    <!-- loader-->
    <script src="{{asset("assets/js/pace.min.js")}}"></script>
    <!-- Bootstrap CSS -->
@yield("css")
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    @if(Config::get("app.locale") =='ar')
        <link href="{{asset("assets/cssRtl/bootstrap.min.css")}}" rel="stylesheet">
        <link href="{{asset("assets/cssRtl/pace.min.css")}}" rel="stylesheet" />
        <link href="{{asset("assets/cssRtl/app.css")}}" rel="stylesheet">
        <link href="{{asset("assets/cssRtl/icons.css")}}" rel="stylesheet">
    @else
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;700&display=swap" rel="stylesheet">
        <link href="{{asset("assets/css/bootstrap.min.css")}}" rel="stylesheet">
        <link href="{{asset("assets/css/pace.min.css")}}" rel="stylesheet" />
        <link href="{{asset("assets/css/app.css")}}" rel="stylesheet">
        <link href="{{asset("assets/css/icons.css")}}" rel="stylesheet">
    @endif
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body >
<!--wrapper-->
<div class="" id="wrapper">
    <!--sidebar wrapper -->
    @include("layouts.parts.sidebar")
    <!--end sidebar wrapper -->
    <!--start header -->
    <!--end header -->
    @include("layouts.parts.header")
    <!--start page wrapper -->
    @yield("content")
    <!--end page wrapper -->
    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
    <footer class="page-footer">
        <p class="mb-0">{{ __('custom.Copyright') }} © {{ date('Y') }}. {{ __('custom.AllRightReserved') }}.</p>
    </footer>
</div>
<!--end wrapper-->

<!-- Bootstrap JS -->
<script src="{{asset("assets/js/bootstrap.bundle.min.js")}}"></script>
<!--plugins-->
<script src="{{asset("assets/js/jquery.min.js")}}"></script>
<script src="{{asset("assets/plugins/simplebar/js/simplebar.min.js")}}"></script>
<script src="{{asset("assets/plugins/metismenu/js/metisMenu.min.js")}}"></script>
<script src="{{asset("assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js")}}"></script>
<script src="{{asset("assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js")}}"></script>
<script src="{{asset("assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js")}}"></script>
<script src="{{asset("assets/plugins/sparkline-charts/jquery.sparkline.min.js")}}"></script>
<!--notification js -->
<script src="{{asset("assets/plugins/notifications/js/lobibox.min.js")}}"></script>
<script src="{{asset("assets/plugins/notifications/js/notifications.min.js")}}"></script>
<script src="{{asset("assets/plugins/datatable/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/plugins/datatable/js/dataTables.bootstrap5.min.js")}}"></script>
<script src="{{ asset('assets/js/sweetalert2@11.js') }}"></script>

<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin">
</script>

<script>
    $(document).ready(function() {
        var table = $('#example2').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'print'],
             @if(Config::get("app.locale") =='ar')
            language: {
                    "url": "{{ asset('assets/js/arabic.json') }}"
                }
            @endif
        } );

        setTimeout(() => {
            table.buttons().container()
            .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
        }, 400);

    } );
</script>

{{-- delete modal --}}

<script>
    $(document).on("click", ".open-deleteDialog", function () {
        document.getElementById('deleteFormAction').action = $(this).attr('data-action');
    });
</script>
<script src="{{asset("assets/js/form.js")}}"></script>
<script src="{{asset("assets/js/app.js")}}"></script>

@yield("script")
</body>

</html>
