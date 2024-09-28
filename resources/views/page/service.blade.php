<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
    <meta name="keywords"
        content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
    <meta name="author" content="elemis">
    <title>FUJI ENVIRO (THAILAND) CO.,LTD.</title>
    <link rel="shortcut icon" href="../assets/img/logo/logo.png">
    <link rel="stylesheet" href="../assets/css/plugins.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="preload" href="../assets/css/fonts/dm.css" as="style" onload="this.rel='stylesheet'">
</head>

<body>
    <div class="content-wrapper">

         @include('page.header')

        <section class="wrapper bg-soft-primary">
            <div class="container pt-6 pb-14 text-center">
                <div class="row">
                    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-6 col-xxl-5 mx-auto">
                        <h1 class="display-1 mb-3">Service</h1>
                        <nav class="d-inline-block" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Service</li>
                            </ol>
                        </nav>
                        <!-- /nav -->
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>

        <!-- Content -->
        <section class="wrapper bg-light">
            <div class="container py-14 py-md-16">
                <div class="row">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <h2 class="fs-15 text-uppercase text-muted mb-3">What We Do?</h2>
                        <h3 class="display-4 mb-9">The service we offer is specifically designed to meet your needs.
                        </h3>
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
                <div class="row gx-md-8 gy-8">
                    <div class="col-md-6 col-lg-3">
                        <div class="icon btn btn-block btn-lg btn-soft-yellow pe-none mb-5"> <i
                                class="uil uil-phone-volume"></i> </div>
                        <h4>Service manage from backend</h4>
                        <p class="mb-3">Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at
                            eget metus. Cras justo.</p>
                        <a href="./detail.html" class="more hover link-yellow">Read More</a>
                    </div>
                    <!--/column -->
                    <div class="col-md-6 col-lg-3">
                        <div class="icon btn btn-block btn-lg btn-soft-red pe-none mb-5"> <i
                                class="uil uil-shield-exclamation"></i> </div>
                        <h4>Service manage from backend</h4>
                        <p class="mb-3">Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at
                            eget metus. Cras justo.</p>
                        <a href="./detail.html" class="more hover link-red">Read More</a>
                    </div>
                    <!--/column -->
                    <div class="col-md-6 col-lg-3">
                        <div class="icon btn btn-block btn-lg btn-soft-leaf pe-none mb-5"> <i
                                class="uil uil-laptop-cloud"></i> </div>
                        <h4>Service manage from backend</h4>
                        <p class="mb-3">Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at
                            eget metus. Cras justo.</p>
                        <a href="./detail.html" class="more hover link-leaf">Read More</a>
                    </div>
                    <!--/column -->
                    <div class="col-md-6 col-lg-3">
                        <div class="icon btn btn-block btn-lg btn-soft-blue pe-none mb-5"> <i
                                class="uil uil-chart-line"></i> </div>
                        <h4>Service manage from backend</h4>
                        <p class="mb-3">Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at
                            eget metus. Cras justo.</p>
                        <a href="./detail.html" class="more hover link-blue">Read More</a>
                    </div>
                    <!--/column -->
                </div>
                <!--/.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /section -->

    </div>
    <!-- /.content-wrapper --> 
    @include('page.footer')
    @include('page.progresswrap')
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>