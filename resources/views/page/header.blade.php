<header class="wrapper bg-soft-primary">
            <nav class="navbar navbar-expand-lg classic transparent navbar-light">
                <div class="container flex-lg-row flex-nowrap align-items-center">
                    <div class="navbar-brand w-100 py-2">
                        <a href="{{ route('index') }}">
                            <img class="logo-dark" src="../assets/img/logo/logo.png" style="height: 120px;"
                                srcset="./assets/img/logo/logo.png 2x" alt="" />
                            <img class="logo-light" src="../assets/img/logo/logo.png" style="height: 120px;"
                                srcset="./assets/img/logo/logo.png 2x" alt="" />
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
                        
                            <li class="me-2">
                                <a href="{{ route('setlocale', 'eng') }}">
                                    @if(Session::get('locale', config('app.locale')) === 'jp')
                                        <img src="../assets/img/flag/us-inactive.png" alt="japanese" style="height: 30px;" />
                                    @else
                                        <img src="../assets/img/flag/us.png" alt="english" style="height: 30px;" />
                                    @endif
                                    </a>
                            </li>
                            <li>
                                <a href="{{ route('setlocale', 'jp') }}">
                                @if(Session::get('locale', config('app.locale')) === 'en')
                                    <img src="../assets/img/flag/jp-inactive.png" alt="japanese" style="height: 30px;" />
                                @else
                                    <img src="../assets/img/flag/jp.png" alt="english" style="height: 30px;" />
                                @endif
                                </a>
                            </li>            
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
