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
    <link rel="shortcut icon" href="/../assets/img/logo/logo.png">
    <link rel="stylesheet" href="/../assets/css/plugins.css">
    <link rel="stylesheet" href="/../assets/css/style.css">
    <link rel="preload" href="/../assets/css/fonts/dm.css" as="style" onload="this.rel='stylesheet'">
</head>

<body>
    <div class="content-wrapper">

    <header class="wrapper bg-soft-primary">
            <nav class="navbar navbar-expand-lg classic transparent navbar-light">
                <div class="container flex-lg-row flex-nowrap align-items-center">
                    <div class="navbar-brand w-100 py-2">
                        <a href="{{ route('index') }}">
                            <img class="logo-dark" src="/../assets/img/logo/logo.png" style="height: 120px;"
                                srcset="/../assets/img/logo/logo.png 2x" alt="" />
                            <img class="logo-light" src="/../assets/img/logo/logo.png" style="height: 120px;"
                                srcset="/../assets/img/logo/logo.png 2x" alt="" />
                        </a>
                    </div>
                    <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
                        <div class="offcanvas-header d-lg-none">
                            <h3 class="text-white fs-30 mb-0">FUJI ENVIRO</h3>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('index') }}">{{ __('messages.nav_home') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('about') }}">{{ __('messages.nav_about') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('system') }}">{{ __('messages.nav_system') }}</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">{{ __('messages.nav_product') }}</a>
                                    <ul class="dropdown-menu">
                                        @forelse ($CateMain as $Main)
                                                
                                                    @if(isset($CateSub[$Main['id']]))
                                                        <li class="dropdown dropdown-submenu dropend"><a
                                                        class="dropdown-item dropdown-toggle" href="#"
                                                        data-bs-toggle="dropdown">{{ $Main['name']}}</a>
                                                            <ul class="dropdown-menu">
                                                            @forelse ($CateSub[$Main['id']] as $Sub)
                                                                <li class="nav-item"><a class="dropdown-item"
                                                                        href="{{ route('catelist', $Main['id']) }}">{{ $Sub['name']}}</a>
                                                                </li> 
                                                            @empty
                                                            @endforelse 
                                                            </ul>
                                                        </li>  
                                                    @else
                                                        <li class="nav-item"><a class="dropdown-item"
                                                                href="{{ route('catelist', $Main['id']) }}">{{ $Main['name']}}</a>
                                                        </li>
                                                    @endif
                                               
                                                   
                                                
                                                
                                        @empty
                                        @endforelse
                                      
                                        
                                   
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('service') }}">{{ __('messages.nav_service') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contact') }}">{{ __('messages.nav_contact') }}</a>
                                </li>
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="offcanvas-footer d-lg-none">
                                <div>
                                    <a href="mailto:info@fujienviro.co.th"
                                        class="link-inverse">info@fujienviro.co.th</a>
                                    <br /> (66) 02 372 3520 <br />
                                    <nav class="nav social social-white mt-4">
                                        <!-- <a href="#"><i class="uil uil-twitter"></i></a> -->
                                        <a href="https://www.facebook.com"><i class="uil uil-facebook-f"></i></a>
                                        <!-- <a href="#"><i class="uil uil-dribbble"></i></a>
                                        <a href="#"><i class="uil uil-instagram"></i></a> -->
                                        <a href="https://www.youtube.com"><i class="uil uil-youtube"></i></a>
                                    </nav>
                                    <!-- /.social -->
                                </div>
                            </div>
                            <!-- /.offcanvas-footer -->
                        </div>
                    </div>
                    <!-- /.offcanvas-body -->
                    <div class="navbar-other w-100 d-flex ms-auto">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <li class="me-2"><a href="{{ route('setlocale', 'eng') }}"><img src="/../assets/img/flag/us.png" alt="english"
                                        style="height: 30px;" /></a></li>
                            <li><a href="{{ route('setlocale', 'jp') }}"><img src="/../assets/img/flag/jp-inactive.png" alt="japanese"
                                        style="height: 30px;" /></a></li>
                            <li class="nav-item d-lg-none">
                                <button class="hamburger offcanvas-nav-btn"><span></span></button>
                            </li>
                        </ul>
                        <!-- /.navbar-nav -->
                    </div>
                    <!-- /.navbar-other -->
                </div>
                <!-- /.container -->
            </nav>
            <!-- /.navbar -->
            <div class="modal fade" id="modal-signin" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content text-center">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <h2 class="mb-3 text-start">Welcome Back</h2>
                            <p class="lead mb-6 text-start">Fill your email and password to sign in.</p>
                            <form class="text-start mb-3">
                                <div class="form-floating mb-4">
                                    <input type="email" class="form-control" placeholder="Email" id="loginEmail">
                                    <label for="loginEmail">Email</label>
                                </div>
                                <div class="form-floating password-field mb-4">
                                    <input type="password" class="form-control" placeholder="Password"
                                        id="loginPassword">
                                    <span class="password-toggle"><i class="uil uil-eye"></i></span>
                                    <label for="loginPassword">Password</label>
                                </div>
                                <a class="btn btn-primary rounded-pill btn-login w-100 mb-2">Sign In</a>
                            </form>
                            <!-- /form -->
                            <p class="mb-1"><a href="#" class="hover">Forgot Password?</a></p>
                            <p class="mb-0">Don't have an account? <a href="#" data-bs-target="#modal-signup"
                                    data-bs-toggle="modal" data-bs-dismiss="modal" class="hover">Sign up</a></p>
                            <div class="divider-icon my-4">or</div>
                            <nav class="nav social justify-content-center text-center">
                                <a href="#" class="btn btn-circle btn-sm btn-google"><i class="uil uil-google"></i></a>
                                <a href="#" class="btn btn-circle btn-sm btn-facebook-f"><i
                                        class="uil uil-facebook-f"></i></a>
                                <a href="#" class="btn btn-circle btn-sm btn-twitter"><i
                                        class="uil uil-twitter"></i></a>
                            </nav>
                            <!--/.social -->
                        </div>
                        <!--/.modal-content -->
                    </div>
                    <!--/.modal-body -->
                </div>
                <!--/.modal-dialog -->
            </div>
            <!--/.modal -->
            <div class="modal fade" id="modal-signup" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content text-center">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <h2 class="mb-3 text-start">Sign up to Sandbox</h2>
                            <p class="lead mb-6 text-start">Registration takes less than a minute.</p>
                            <form class="text-start mb-3">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" placeholder="Name" id="loginName">
                                    <label for="loginName">Name</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="email" class="form-control" placeholder="Email" id="loginEmail">
                                    <label for="loginEmail">Email</label>
                                </div>
                                <div class="form-floating password-field mb-4">
                                    <input type="password" class="form-control" placeholder="Password"
                                        id="loginPassword">
                                    <span class="password-toggle"><i class="uil uil-eye"></i></span>
                                    <label for="loginPassword">Password</label>
                                </div>
                                <div class="form-floating password-field mb-4">
                                    <input type="password" class="form-control" placeholder="Confirm Password"
                                        id="loginPasswordConfirm">
                                    <span class="password-toggle"><i class="uil uil-eye"></i></span>
                                    <label for="loginPasswordConfirm">Confirm Password</label>
                                </div>
                                <a class="btn btn-primary rounded-pill btn-login w-100 mb-2">Sign Up</a>
                            </form>
                            <!-- /form -->
                            <p class="mb-0">Already have an account? <a href="#" data-bs-target="#modal-signin"
                                    data-bs-toggle="modal" data-bs-dismiss="modal" class="hover">Sign in</a></p>
                            <div class="divider-icon my-4">or</div>
                            <nav class="nav social justify-content-center text-center">
                                <a href="#" class="btn btn-circle btn-sm btn-google"><i class="uil uil-google"></i></a>
                                <a href="#" class="btn btn-circle btn-sm btn-facebook-f"><i
                                        class="uil uil-facebook-f"></i></a>
                                <a href="#" class="btn btn-circle btn-sm btn-twitter"><i
                                        class="uil uil-twitter"></i></a>
                            </nav>
                            <!--/.social -->
                        </div>
                        <!--/.modal-content -->
                    </div>
                    <!--/.modal-body -->
                </div>
                <!--/.modal-dialog -->
            </div>
            <!--/.modal -->
            <div class="offcanvas offcanvas-end text-inverse" id="offcanvas-info" data-bs-scroll="true">
                <div class="offcanvas-header">
                    <h3 class="text-white fs-30 mb-0">Sandbox</h3>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body pb-6">
                    <div class="widget mb-8">
                        <p>Sandbox is a multipurpose HTML5 template with various layouts which will be a great solution
                            for your business.</p>
                    </div>
                    <!-- /.widget -->
                    <div class="widget mb-8">
                        <h4 class="widget-title text-white mb-3">Contact Info</h4>
                        <address> Moonshine St. 14/05 <br /> Light City, London </address>
                        <a href="mailto:first.last@email.com">info@email.com</a><br /> 00 (123) 456 78 90
                    </div>
                    <!-- /.widget -->
                    <div class="widget mb-8">
                        <h4 class="widget-title text-white mb-3">Learn More</h4>
                        <ul class="list-unstyled">
                            <li><a href="#">Our Story</a></li>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <!-- /.widget -->
                    <div class="widget">
                        <h4 class="widget-title text-white mb-3">Follow Us</h4>
                        <nav class="nav social social-white">
                            <a href="#"><i class="uil uil-twitter"></i></a>
                            <a href="#"><i class="uil uil-facebook-f"></i></a>
                            <a href="#"><i class="uil uil-dribbble"></i></a>
                            <a href="#"><i class="uil uil-instagram"></i></a>
                            <a href="#"><i class="uil uil-youtube"></i></a>
                        </nav>
                        <!-- /.social -->
                    </div>
                    <!-- /.widget -->
                </div>
                <!-- /.offcanvas-body -->
            </div>
            <!-- /.offcanvas -->
        </header>
         
          <!-- Content -->
        <section class="wrapper bg-soft-primary">
            <div class="container pt-10 pb-19 pt-md-14 pb-md-20 text-center">
                <div class="row">
                    <div class="col-md-10 col-xl-8 mx-auto">
                        <div class="post-header">
                            <div class="post-category text-line">
                                <a href="#" class="hover" rel="category">{{ __('messages.nav_system') }}</a>
                            </div>
                            <!-- /.post-category -->
                            <h1 class="display-1 mb-4">{{ $systems->{'title_' . app()->getLocale()} }}</h1>
                            <!-- <ul class="post-meta mb-5">
                                <li class="post-date"><i class="uil uil-calendar-alt"></i><span>5 Jul 2022</span></li>
                            </ul> -->
                            <!-- /.post-meta -->
                        </div>
                        <!-- /.post-header -->
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /section -->
        <section class="wrapper bg-light">
            <div class="container pb-14 pb-md-16">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="blog single mt-n17">
                            <div class="card">
                                <figure class="card-img-top"><img src="{{ asset('storage/app/public/'.$systems->image_url) }}" alt="" /></figure>
                                <div class="card-body">
                                    <div class="classic-view">
                                        <article class="post">
                                            <div class="post-content mb-5">
                                                <!-- <h2 class="h1 mb-4">{{ $systems->{'title_' . app()->getLocale()} }}</h2> -->
                                                
                                            </div>
                                            <!-- /.post-content -->
                                        </article>
                                        <!-- /.post -->
                                    </div>
                                    <!-- /.classic-view -->
                               
                                    <!-- /.swiper-container -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.blog -->
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
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