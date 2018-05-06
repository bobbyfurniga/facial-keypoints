<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job Xpress</title>

    <!-- Bootstrap -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Flexslider Css -->
    <link href="assets/plugins/flexslider/flexslider.css" rel="stylesheet">
    <!--font awesome-->
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!--custom css-->
    <link href="assets/plugins/themify/themify-icons.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link href="css/facial.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
          rel="stylesheet">
</head>
<body>
<div class="header-stricky">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="site-logo">
                    <a href="index.html"><img src="assets/images/home/site-logo.png" alt="" class="img-responsive"/></a>
                </div>
            </div>
            <div class="col-md-6">
                <nav class="navbar navbar-default navbar-static-top">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav scrollto">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="{{route('edit.picture')}}">Edit pictures</a></li>
                            <li><a href="{{route('landing')}}">Live effects</a></li>
                            <li><a href="#">About</a></li>
                            {{--<li class="dropdown">--}}
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Browse Jobs <i--}}
                                            {{--class="fa fa-angle-down"></i></a>--}}
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li><a href="manage_application.html">Manage Applications</a></li>--}}
                                    {{--<li><a href="manage_job.html">Manage jobs</a></li>--}}
                                    {{--<li><a href="job_listing.html">Job Listing</a></li>--}}
                                    {{--<li><a href="job.html">Job Page</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="dropdown">--}}
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Employers <i--}}
                                            {{--class="fa fa-angle-down"></i></a>--}}
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li><a href="employe_detail.html">Employers Detail</a></li>--}}
                                    {{--<li><a href="employe_list.html">Employers List</a></li>--}}
                                    {{--<li><a href="post.html">Post A job</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="dropdown">--}}
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Candidates <i--}}
                                            {{--class="fa fa-angle-down"></i></a>--}}
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li><a href="candidates.html">Browse Candidates</a></li>--}}
                                    {{--<li><a href="resume.html">Submit Resume</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="dropdown">--}}
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <i--}}
                                            {{--class="fa fa-angle-down"></i></a>--}}
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li><a href="about.html">About</a></li>--}}
                                    {{--<li><a href="resume2.html">Resume Page</a></li>--}}
                                    {{--<li><a href="faq.html">Faq</a></li>--}}
                                    {{--<li><a href="price_table.html">Pricing Tables</a></li>--}}
                                    {{--<li><a href="contact.html">Contact Us</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-md-3 text-right">
                <a href="login.html" class="login active">Login</a>
                <a href="login.html" class="signup">Sign Up</a>
            </div>
        </div>
    </div>
</div>

<main id="maincontent">
    @yield('content')
</main>

<footer id="footer">
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 padding-left">
                    <span>&#169; 2017 Jobxpress. All rights reserved.</span>
                </div>
                <div class="col-md-6 col-sm-6 text-right padding-left">
                    <ul class="bottom_link">
                        <li><a href="#">Link 1</a></li>
                        <li><a href="#">Link 1</a></li>
                        <li><a href="#">Link 1</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- jQuery -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/flexslider/jquery.flexslider-min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/counter.js"></script>
<script src="assets/js/flexslider.js"></script>
<script src="assets/js/common.js"></script>
<script src="js/facial.js"></script>
@yield('scripts')
</body>
</html>