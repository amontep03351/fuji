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
       
        <!-- HERO -->
        <section class="wrapper bg-dark">
            <div class="swiper-container swiper-hero dots-over" data-margin="0" data-autoplay="true"
                data-autoplaytime="7000" data-nav="true" data-dots="true" data-items="1">
                <div class="swiper">
                    <div class="swiper-wrapper">
                    @foreach($images as $image)
                    <div class="swiper-slide bg-overlay bg-overlay-400 bg-dark bg-image"
                            data-image-src="{{ asset('storage/app/public/'.$image->image_url) }}">
                            <div class="container h-100">
                                <div class="row h-100">
                                    <div
                                        class="col-md-11 col-lg-8 col-xl-7 col-xxl-6 mx-auto text-center justify-content-center align-self-center">
                                        <h2
                                            class="display-1 fs-56 mb-4 text-white animate__animated animate__slideInDown animate__delay-1s">
                                            {{ $image->{'title_' . app()->getLocale()} }} </h2>
                                        <p
                                            class="lead fs-23 lh-sm mb-7 text-white animate__animated animate__slideInRight animate__delay-2s">
                                            {{ strip_tags($image->{'description_' . app()->getLocale()}) }}</p>
                                    </div>
                                    <!--/column -->
                                </div>
                                <!--/.row -->
                            </div>
                            <!--/.container -->
                        </div>
                         
                    @endforeach
                        
                       
                        <!--/.swiper-slide -->
                    </div>
                    <!--/.swiper-wrapper -->
                </div>
                <!-- /.swiper -->
            </div>
            <!-- /.swiper-container -->
        </section>

        <section class="wrapper bg-light">
            <div class="container pt-14 pt-md-17 pb-16 pb-md-18">
                <!--/.row -->
                <div class="row gy-10 gy-sm-13 gx-lg-3 align-items-center">
                    <div class="col-md-8 col-lg-6 offset-lg-1 order-lg-2 position-relative">
                        <div class="shape rounded-circle bg-line primary rellax w-18 h-18" data-rellax-speed="1"
                            style="top: -2rem; right: -1.9rem;"></div>
                        <div class="shape rounded bg-soft-primary rellax d-md-block" data-rellax-speed="0"
                            style="bottom: -1.8rem; left: -1.5rem; width: 85%; height: 90%; "></div>
                        <figure class="rounded"><img src="{{ asset('storage/app/public/'.$aboutUs->image) }}"
                                srcset="{{ asset('storage/app/public/'.$aboutUs->image) }} 2x" alt=""></figure>
                    </div>
                    <!--/column -->
                    <div class="col-lg-5">
                        <h2 class="fs-16 text-uppercase text-line text-primary mb-3">{{ __('messages.nav_about') }}</h2>
                        <h6 class="display-6 mb-7">{{ $aboutUs->{'title_' . app()->getLocale()} }}</h6>
                            {{ strip_tags($aboutUs->{'description_' . app()->getLocale()}) }}
                        <!--/.accordion -->
                    </div>
                    <!--/column -->
                </div>
                <!--/.row -->
            </div>
            <!-- /.container -->
        </section>

    </div>
    <!-- /.content-wrapper -->
    @include('page.footer')
    @include('page.progresswrap')
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>