<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>SKI-MASTER</title>
        <!-- favicon -->
        <link rel="icon" href="images/favicon/favicon.png" sizes="16x16 32x32" type="image/png">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <!-- bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <!-- ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.0/css/ionicons.min.css">
        <!-- carousel -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.4.3/vegas.min.css">
        <!-- counterup -->
        <link rel="stylesheet" href="{{asset('css/vendors/style.css')}}">

        <!-- css -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <!-- responsive css -->
        <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
    </head>

    <body>
    <div class="contact-nav">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-4">
                            <i class="ion-ios-telephone"></i>
                            <a href="tel:+880-17-8649-4650">+8 800 555 35 55</a>
                        </div>
                        <div class="col-lg-4">
                            <i class="ion-ios-email-outline"></i>
                            <a href="mailto:info@maxsop.com">info@SKI-MASTER.ru</a>
                        </div>
                        <div class="col-lg-4">
                            <div style="white-space: nowrap;">
                                <i class="ion-android-pin"></i>
                                <span>Россия, Сочи</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-5">

                        </div>
                        <div class="col-lg-7">
                            <div class="social">
                                <ul class="mb-0 d-flex justify-content-lg-end">
                                    <li><a href=""><i class="ion-social-facebook"></i></a></li>
                                    <li><a href=""><i class="ion-social-skype"></i></a></li>
                                    <li><a href=""><i class="ion-social-googleplus"></i></a></li>
                                    <li><a href=""><i class="ion-social-youtube"></i></a></li>
                                    <li><a href="" class="mr-0"><i class="ion-social-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- main navigation -->
        <nav class="navbar navbar-expand-lg nav_custom">
            <div class="container">
                <a class="navbar-brand mr-lg-5" href="{{route('rent')}}">
                    <img src="{{asset('img/logo.png')}}" alt="logo" width="180" class="img-fluid">
                </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="ion-android-menu"></span>
            </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Зарегистрироваться') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" style="cursor: pointer">Личный кабинет</a>
                                    <a class="dropdown-item" style="cursor: pointer">Корзина</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Выйти') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
                {{--<a href="{{route('login')}}" class="nav_button" style="border: 2px solid #2c78a2; margin-right: 20px;  background: #2c78a2">Войти</a>--}}
                {{--<a href="{{route('register')}}" class="nav_button" style="background: #2c78a2; border: 2px solid #2c78a2">Регистрация</a>--}}
            </div>
        </nav>
        <!-- nav section end -->


        <!-- header section start here -->
        <header id="header_slider">
            <div class="d-flex justify-content-center align-items-center" style="height:100%">
                <div class="content">
                    <h1>SKI-MASTER</h1>
                    <h2>Горнолыжный комплекс</h2>
                </div>
            </div>
        </header>

    <!-- service section start here -->
    <section class="service" id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{asset('img/left.jpg')}}" alt="image" class="img-fluid w-100 mb-5 mb-lg-0">
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="icon">
                                            <i class="ion-ios-snowy"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="text">
                                            <h5>Выбери свой склон!</h5>
                                            <p>Мы располагаем 3 трасами и среди них вы точно сможете выбрать ту которая подходит именно вам.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="icon">
                                            <i class="ion-ios-snowy"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="text">
                                            <h5>Аренда инвентаря</h5>
                                            <p>Вы можете арендовать лыжи, сноуборды, экпипировку в нашем лично кабинете.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="icon">
                                            <i class="ion-ios-snowy"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="text">
                                            <h5>Кафе на склоне</h5>
                                            <p>Наши бармены всегда рады сделать вам чашечку восхетительного кофе!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service section end here -->

        <!-- map start -->
        <section class="map">
            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A2341e0236fb4d693ed0c8d180baa955011b1b4a735dfd3ec186548058617c3d3&amp;source=constructor" width="100%" height="475" frameborder="0"></iframe>
        </section>
        <!-- map end -->

        <!-- footer section start -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="social">
                            <ul>
                                <li><a href=""><i class="ion-social-facebook"></i></a></li>
                                <li><a href=""><i class="ion-social-skype"></i></a></li>
                                <li><a href=""><i class="ion-social-googleplus"></i></a></li>
                                <li><a href="" class="mr-0"><i class="ion-social-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <h4 class="mb-4">Office</h4>
                        <p></p>
                        <p>Phone: <a href="tel:+880-17-8649-4650">+880-17-8649-4650</a></p>
                        <p>Email: <a href="mailto:info@maxsop.com">info@maxsop.com</a></p>
                    </div>
                    <div class="col-lg-4 offset-lg-1">
                        <h4 class="mb-4">Newsletter</h4>
                        <p class="mb-3">Sign up here to receive interesting updates. Effervescent the secure special.</p>
                        <form action="#">
                            <div class="row">
                                <div class="col-7">
                                    <div class="group">
                                        <input type="text" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label>Your Email</label>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <button>Subscribe</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footer_bottom">
                <p>&copy; Все права защищены</p>
            </div>
        </footer>
        <!-- footer section end -->



        <!-- back to top -->
        <div class="container">
            <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="ion-ios-arrow-up"></i></button>
        </div>




        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.4.3/vegas.min.js"></script>
        <script src="{{asset('js/vendors/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('js/vendors/jquery.waypoints.min.js')}}"></script>
        <script src="{{asset('js/vendors/custom.js')}}"></script>
        <!-- custom js -->
        <script src="{{asset('js/script.js')}}"></script>

    </body>
</html>