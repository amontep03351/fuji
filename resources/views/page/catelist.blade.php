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

         <section class="wrapper bg-soft-primary">
            <div class="container pt-6 pb-14 text-center">
                <div class="row">
                    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-6 col-xxl-5 mx-auto">
                        <h1 class="display-1 mb-3">{{ __('messages.tListpage') }}</h1>
                        <nav class="d-inline-block" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="./index.html">{{ __('messages.nav_home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.tListpage') }}</li>
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
        <!-- /section -->
        <section class="wrapper bg-light">
            <div class="container py-14 py-md-16">
                <div class="row align-items-center mb-10 position-relative zindex-1">
                    <div class="col-md-8 col-lg-9 col-xl-8 col-xxl-7 pe-xl-20">
                        <h2 class="display-6">{{ __('messages.tCategory') }}</h2>
                        <nav class="d-inline-block" aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#">{{ __('messages.nav_home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.tProduct') }}</li>
                            </ol>
                        </nav>
                        <!-- /nav -->
                    </div>
                    <!--/column -->
                    <div class="col-md-4 col-lg-3 ms-md-auto text-md-end mt-5 mt-md-0">
                        <div class="form-select-wrapper">
                        @if(isset($CateSub[$CategId]))
                            <select class="form-select">
                                @forelse ($CateSub[$Main['id']] as $Sub)
                                    <option value="{{ route('catelist', $Main['id']) }}">{{ $Sub['name']}}</option>
                                     
                                @empty
                                @endforelse 
                                
                                
                            </select>
                             
                        @else
                             
                        @endif
                            
                        </div>
                        <!--/.form-select-wrapper -->
                    </div>
                    <!--/column -->
                </div>
                <!--/.row -->
                <div class="grid grid-view projects-masonry shop mb-13">
                    <div class="row gx-md-8 gy-10 gy-md-13 isotope">
                    @forelse ($products as $product)
                        <div class="project item col-md-4 col-xl-3">
                            <figure class="rounded mb-6">
                                <img src="{{ asset('storage/app/public/'.$product->product_image) }}" srcset="{{ asset('storage/app/public/'.$product->product_image) }}"
                                    alt="" />
                                <a href="{{ route('product.detail', $product->id) }}" class="item-cart"><i class="uil uil-shopping-bag"></i>{{ __('messages.tReadmore') }}</a>
                            </figure>
                            <div class="post-header">
                                <div class="d-flex flex-row align-items-center justify-content-between mb-2">
                                    <div class="post-category text-ash mb-0">{{ __('messages.tCategory') }}</div>
                                </div>
                                <h2 class="post-title h3 fs-22"><a href="{{ route('product.detail', $product->id) }}" class="link-dark">{{ $product->name }}</a></h2>
                            </div>
                            <!-- /.post-header -->
                        </div>
                    @empty
                    @endforelse
                        
                        
                        <!-- /.item -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.grid -->
                <nav class="d-flex justify-content-center" aria-label="pagination">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true"><i class="uil uil-arrow-left"></i></span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true"><i class="uil uil-arrow-right"></i></span>
                            </a>
                        </li>
                    </ul>
                    <!-- /.pagination -->
                </nav>
                <!-- /nav -->
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