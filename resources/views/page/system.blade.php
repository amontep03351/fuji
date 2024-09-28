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
                        <h1 class="display-1 mb-3">{{ __('messages.nav_system') }}</h1>
                        <nav class="d-inline-block" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('messages.nav_home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.nav_system') }}</li>
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
                    <div class="col-lg-9 col-xl-8 col-xxl-7 mx-auto text-center">
                        <h2 class="fs-15 text-uppercase text-muted mb-3">{{ __('messages.nav_system') }}</h2>
                        <h3 class="display-4 mb-10"> </h3>
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
                <div class="swiper-container grid-view mb-6" data-margin="30" data-dots="true" data-items-xl="4"
                    data-items-md="2" data-items-xs="1">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            

                            @foreach($System as $Sys)
                                <div class="swiper-slide">
                                    <figure class="rounded mb-6"><img src="{{ asset('storage/'.$Sys->image_url) }}"
                                            srcset="{{ asset('storage/'.$Sys->image_url) }}" alt="" /><a class="item-link"
                                            href="{{ asset('storage/'.$Sys->image_url) }}" data-glightbox
                                            data-gallery="projects-group"><i class="uil uil-focus-add"></i></a></figure>
                                    <div class="project-details d-flex justify-content-center flex-column">
                                        <div class="post-header">
                                            <h2 class="post-title h3"><a href="{{ route('system.detail', $Sys) }}" class="link-dark"> 
                                            {{ $Sys->{'title_' . app()->getLocale()} }}</a></h2>
                                        </div>
                                        <!-- /.post-header -->
                                    </div>
                                    <!-- /.project-details -->
                                </div>
                            @endforeach
                            <!--/.swiper-slide --> 
                        </div>
                        <!--/.swiper-wrapper -->
                    </div>
                    <!-- /.swiper -->
                </div>
                <!-- /.swiper-container -->
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