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
                        <h1 class="display-1 mb-3">{{ __('messages.nav_service') }}</h1>
                        <nav class="d-inline-block" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('messages.nav_home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.nav_service') }}</li>
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
                        <h2 class="fs-15 text-uppercase text-muted mb-3">{{ __('messages.twwd') }}</h2>
                        <h3 class="display-4 mb-9">{{ __('messages.tHeadService') }}
                        </h3>
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
                <div class="grid grid-view projects-masonry shop mb-13">
                    <div class="row gx-md-8 gy-10 gy-md-13 isotope">
                    @foreach ($Services as $Service)
                        <div class="project item col-md-4 col-xl-3">
                            <figure class="rounded mb-6">
                                <img src="{{ asset('storage/app/public/'.$Service->service_image) }}" srcset="{{ asset('storage/app/public/'.$Service->service_image) }}"
                                    alt="" />
                                <a href="{{ route('service.detail', $Service->id) }}" class="item-cart"><i class="uil uil-shopping-bag"></i>{{ __('messages.tReadmore') }}</a>
                            </figure>
                            <div class="post-header">
                                <div class="d-flex flex-row align-items-center justify-content-between mb-2">
                                    <div class="post-category text-ash mb-0"> </div>
                                </div>
                                <h2 class="post-title h3 fs-22"><a href="{{ route('service.detail', $Service->id) }}" class="link-dark"> {{ $Service->{'name_' . app()->getLocale()} }}</a></h2>
                            </div>
                            <!-- /.post-header -->
                        </div>
                   
                    @endforeach
                        
                        
                        <!-- /.item -->
                    </div>
                    <!-- /.row -->
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
    <script src="/../assets/js/plugins.js"></script>
    <script src="/../assets/js/theme.js"></script>
</body>

</html>