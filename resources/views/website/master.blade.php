<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from demo.graygrids.com/themes/estore/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 Apr 2025 02:55:44 GMT -->
<head>
    <meta charset="utf-8">

    <!--====== Title ======-->
    <title>eStore Template</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('/')}}website/assets/images/favicon.png" type="image/png">

    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/slick.css">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/LineIcons.css">

    <!--====== Material Design Icons CSS ======-->
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/materialdesignicons.min.css">

    <!--====== Jquery Ui CSS ======-->
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/jquery-ui.min.css">

    <!--====== nice select CSS ======-->
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/nice-select.css">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/bootstrap.min.css">

    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/default.css">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/style.css">

<style>
    .sidebar-wrapper {
        position: sticky;
        top: 120px; /* adjust as needed */
        align-self: start;
    }
    .list-group-item:hover {
        background-color: #007bff;
        color: white;
        font-weight: 500;
        transition: 0.2s;
    }
</style>

</head>

<body>

@include('website.include.header')
@yield('body')
@include('website.include.footer')
<!--====== Bootstrap 5 js ======-->
<script src="{{asset('/')}}website/assets/js/popper.min.js"></script>
<script src="{{asset('/')}}website/assets/js/bootstrap.min.js"></script>


<!--====== Jquery js ======-->
<script src="{{asset('/')}}website/assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="{{asset('/')}}website/assets/js/vendor/modernizr-3.7.1.min.js"></script>

<!--====== Slick js ======-->
<script src="{{asset('/')}}website/assets/js/slick.min.js"></script>

<!--====== Accordion Steps Form js ======-->
<script src="{{asset('/')}}website/assets/js/jquery-vj-accordion-steps.js"></script>

<!--====== Jquery Ui js ======-->
<script src="{{asset('/')}}website/assets/js/jquery-ui.min.js"></script>

<!--====== Form validator js ======-->
<script src="{{asset('/')}}website/assets/js/jquery.form-validator.min.js"></script>

<!--====== nice select js ======-->
<script src="{{asset('/')}}website/assets/js/jquery.nice-select.min.js"></script>

<!--====== formatter js ======-->
<script src="{{asset('/')}}website/assets/js/jquery.formatter.min.js"></script>

<!--====== Main js ======-->
<script src="{{asset('/')}}website/assets/js/count-up.min.js"></script>

<!--====== Main js ======-->
<script src="{{asset('/')}}website/assets/js/main.js"></script>

</body>


<!-- Mirrored from demo.graygrids.com/themes/estore/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 Apr 2025 02:56:08 GMT -->
</html>
