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
                        <h1 class="display-1 mb-3">{{ __('messages.nav_contact') }}</h1>
                        <nav class="d-inline-block" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('messages.nav_home') }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ __('messages.nav_contact') }}</li>
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
            <div class="container py-11">
                <div class="row mb-14 mb-md-16">
                    <div class="col-xl-10 mx-auto">
                        <div class="card">
                            <div class="row gx-0">
                                <div class="col-lg-6 align-self-stretch">
                                    <div class="map map-full rounded-top rounded-lg-start">
                                        <iframe
                                src="{{ $ContactUs->maplocation }}"
                                style="width:100%; height: 100%; border:0" allowfullscreen></iframe>
                                    </div>
                                    <!-- /.map -->
                                </div>
                                <!--/column -->
                                <div class="col-lg-6">
                                    <div class="p-10 p-md-11 p-lg-14">
                                        <div class="d-flex flex-row">
                                            <div>
                                                <div class="icon text-primary fs-28 me-4 mt-n1"> <i
                                                        class="uil uil-location-pin-alt"></i> </div>
                                            </div>
                                            <div class="align-self-start justify-content-start">
                                                <h5 class="mb-1">{{ __('messages.tAddress') }}</h5>
                                                <address> {{ strip_tags($ContactUs->{'address_' . app()->getLocale()}) }}  
                                                </address>
                                            </div>
                                        </div>
                                        @php
                                            $mailArray = json_decode($ContactUs->mail, true); // แปลง JSON string เป็นอาร์เรย์
                                            $telArray = json_decode($ContactUs->tel, true); // แปลง JSON string เป็นอาร์เรย์
                                        @endphp
                                        <!--/div -->
                                        <div class="d-flex flex-row">
                                            <div>
                                                <div class="icon text-primary fs-28 me-4 mt-n1"> <i
                                                        class="uil uil-phone-volume"></i> </div>
                                            </div>
                                            <div>
                                                <h5 class="mb-1">Phone</h5>
                                                @if (is_array($telArray) && count($telArray) > 0)
                                                    
                                                    @foreach ($telArray as $tel) 
                                                        <p>{{$tel}}</p>                 
                                                    @endforeach
                                                    
                                                @else
                                                    
                                                @endif
                                                
                                            </div>
                                        </div>
                                        <!--/div -->
                                        <div class="d-flex flex-row">
                                            <div>
                                                <div class="icon text-primary fs-28 me-4 mt-n1"> <i
                                                        class="uil uil-envelope"></i> </div>
                                            </div>
                                            <div>
                                                <h5 class="mb-1">E-mail</h5>
                                                <p class="mb-0">
                                         
                                                @if (is_array($mailArray) && count($mailArray) > 0)
                                                    
                                                    @foreach ($mailArray as $email)
                                                        
                                                        <a
                                                        href="mailto:{{ $email }}">{{ $email }}</a></p>
                                                    @endforeach
                                                    
                                                @else
                                                    
                                                @endif
                                                   
                                            </div>
                                        </div>
                                        <!--/div -->
                                    </div>
                                    <!--/div -->
                                </div>
                                <!--/column -->
                            </div>
                            <!--/.row -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                        <h2 class="display-4 mb-3 text-center">{{ __('messages.tContactform') }}</h2> 
                        <form class="contact-form needs-validation" method="post" action="./assets/php/contact.php"
                            novalidate>
                            <div class="messages"></div>
                            <div class="row gx-4">
                                <div class="col-md-6">
                                    <div class="form-floating mb-4">
                                        <input id="form_name" type="text" name="name" class="form-control"
                                            placeholder="Jane" required>
                                        <label for="form_name">{{ __('messages.tcFirstName') }}*</label>
                                        <div class="valid-feedback">{{ __('messages.tcLooksgood') }}</div>
                                        <div class="invalid-feedback">{{ __('messages.tcPleaseenteryourfirstname') }}</div>
                                    </div>
                                </div>
                                <!-- /column -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-4">
                                        <input id="form_lastname" type="text" name="surname" class="form-control"
                                            placeholder="Doe" required>
                                        <label for="form_lastname">{{ __('messages.tcLastName') }}*</label>
                                        <div class="valid-feedback">{{ __('messages.tcLooksgood') }}</div>
                                        <div class="invalid-feedback">{{ __('messages.tcPleaseenteryourlastname') }}</div>
                                    </div>
                                </div>
                                <!-- /column -->
                                <div class="col-md-6">
                                    <div class="form-floating mb-4">
                                        <input id="form_email" type="email" name="email" class="form-control"
                                            placeholder="jane.doe@example.com" required>
                                        <label for="form_email">{{ __('messages.tcEmail') }}*</label>
                                        <div class="valid-feedback">{{ __('messages.tcLooksgood') }} </div>
                                        <div class="invalid-feedback">{{ __('messages.tcPleaseprovideavalidemailaddress') }}</div>
                                    </div>
                                </div>
                                <!-- /column -->
                                <div class="col-md-6">
                                    <div class="form-select-wrapper mb-4"> 
                                        <select class="form-select" id="form-select" name="department" required>
                                            <option selected disabled value="">{{ __('messages.tcSelectaDepartment') }}</option>
                                            <option value="{{ __('messages.tcSales') }}">{{ __('messages.tcSales') }}</option>
                                            <option value="{{ __('messages.tcMarketing') }}">{{ __('messages.tcMarketing') }}</option>
                                            <option value="Customer Support">{{ __('messages.tcCustomerSupport') }}</option>
                                        </select>
                                        <div class="valid-feedback">{{ __('messages.tcLooksgood') }}</div>
                                        <div class="invalid-feedback">{{ __('messages.tcPleaseselectadepartment') }}</div> 
                                    </div>
                                </div>
                                <!-- /column -->
                                <div class="col-12">
                                    <div class="form-floating mb-4">
                                        <textarea id="form_message" name="message" class="form-control"
                                            placeholder="Your message" style="height: 150px" required></textarea>
                                        <label for="form_message">{{ __('messages.tcMessage') }}*</label>
                                        <div class="valid-feedback">{{ __('messages.tcLooksgood') }}</div>
                                        <div class="invalid-feedback">{{ __('messages.tcPleaseenteryourmesssage') }}</div>
                                    </div>
                                </div>
                                <!-- /column -->
                                <div class="col-12 text-center">
                                    <input type="submit" class="btn btn-primary rounded-pill btn-send mb-3"
                                        value="{{ __('messages.tcSendmessage') }}">
                                    <p class="text-muted"><strong>*</strong> {{ __('messages.tcThesefieldsarerequired') }}</p>
                                </div>
                                <!-- /column -->
                            </div>
                            <!-- /.row -->
                        </form>
                        <!-- /form -->
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
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