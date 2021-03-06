<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>GameOfClothes</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{ asset('lib/slick/slick.css') }}" rel="stylesheet">
        <link href="{{ asset('lib/slick/slick-theme.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>

    <body>
         <!-- Top bar Start -->
         <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
                        gameofclothes@gmail.com
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        +591 60722803
                    </div>
                </div>
            </div>
        </div>
        <!-- Top bar End -->

        <!-- Nav Bar Start -->
        <div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="{{ route('/') }}" class="nav-item nav-link">Inicio</a>
                            <a href="{{ route('product-list') }}" class="nav-item nav-link">Productos</a>
                            <a href="{{ route('checkout') }}" class="nav-item nav-link active">Facturacion y env??o</a>
                            @auth
                            <a href="{{ route('cart') }}" class="nav-item nav-link">Carrito de compras</a>
                            @endauth
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">M??s paginas</a>
                                <div class="dropdown-menu">
                                    @auth
                                    <a href="{{ route('wishlist') }}" class="dropdown-item">Lista de pedidos</a>
                                    @endauth
                                    @if (!Auth::user())
                                        <a href="{{ route('login') }}" class="dropdown-item">Inicio de Sesi??n y Regristro</a>
                                    @endif
                                    <a href="{{ route('contact') }}" class="dropdown-item">Contactanos</a>
                                </div>
                            </div>
                        </div>
                        @if (Auth::user())
                            <div class="ml-3 relative">
                                <x-jet-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                            </button>
                                        @else
                                            <span class="inline-flex rounded-md">
                                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                    {{ Auth::user()->name }}

                                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </span>
                                        @endif
                                    </x-slot>

                                    <x-slot name="content">
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage Account') }}
                                        </div>

                                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                            {{ __('Perfil') }}
                                        </x-jet-dropdown-link>

                                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                                {{ __('API Tokens') }}
                                            </x-jet-dropdown-link>
                                        @endif

                                        <div class="border-t border-gray-100"></div>

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                                {{ __('Cerrar Sesion') }}
                                            </x-jet-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-jet-dropdown>
                            </div>
                        @else
                            <div class="navbar-nav ml-auto">
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Cuenta de usuario</a>
                                    <div class="dropdown-menu">
                                        <a href="{{ route('login') }}" class="dropdown-item">inicia sesi??n</a>
                                        <a href="{{ route('register') }}" class="dropdown-item">Registrate</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->

        <!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.html">
                                <img src="img/logoGC.jpeg" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <input type="text" placeholder="Buscar">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="user">
                            <a href="wishlist.html" class="btn wishlist">
                                <i class="fa fa-heart"></i>
                                <span>(0)</span>
                            </a>
                            <a href="cart.html" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span>(0)</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Bar End -->

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="#">Productos</a></li>
                    <li class="breadcrumb-item active">Facturacion y env??o</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Checkout Start -->
        <div class="checkout">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkout-inner">
                            <div class="billing-address">
                                <h2>Direcci??n de facturaci??n</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nombre</label>
                                        <input class="form-control" type="text" placeholder="Nombre">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Apellido"</label>
                                        <input class="form-control" type="text" placeholder="Apellido">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Correo electr??nico</label>
                                        <input class="form-control" type="text" placeholder="Correo electr??nico">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Numero de celular</label>
                                        <input class="form-control" type="text" placeholder="Numero de celular">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Direcci??n</label>
                                        <input class="form-control" type="text" placeholder="Direcci??n">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Ciudad</label>
                                        <select class="custom-select">
                                            <option selected>Seleccione una opci??n</option>
                                            <option>La Paz</option>
                                            <option>Santa Cruz</option>
                                            <option>Cochabamba</option>
                                            <option>Oruro</option>
                                            <option>El Alto</option>
                                            <option>Potosi</option>
                                            <option>Tarija</option>
                                            <option>Chuquisaca</option>
                                            <option>Beni</option>
                                            <option>Pando</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Provincia</label>
                                        <input class="form-control" type="text" placeholder="Provincia">
                                    </div>

                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="newaccount">
                                            <label class="custom-control-label" for="newaccount">Crear direcci??n</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="shipto">
                                            <label class="custom-control-label" for="shipto">Enviar producto a otra direcci??n</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="shipping-address">
                                <h2>Direcci??n de env??o</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nombre</label>
                                        <input class="form-control" type="text" placeholder="Nombre">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Apellido"</label>
                                        <input class="form-control" type="text" placeholder="Apellido">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Correo electr??nico</label>
                                        <input class="form-control" type="text" placeholder="Correo electr??nico">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Numero de celular</label>
                                        <input class="form-control" type="text" placeholder="Numero de celular">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Direcci??n</label>
                                        <input class="form-control" type="text" placeholder="Direcci??n">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Ciudad</label>
                                        <select class="custom-select">
                                            <option selected>Seleccione una opci??n</option>
                                            <option>La Paz</option>
                                            <option>Santa Cruz</option>
                                            <option>Cochabamba</option>
                                            <option>Oruro</option>
                                            <option>El Alto</option>
                                            <option>Potosi</option>
                                            <option>Tarija</option>
                                            <option>Chuquisaca</option>
                                            <option>Beni</option>
                                            <option>Pando</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Provincia</label>
                                        <input class="form-control" type="text" placeholder="Provincia">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout-inner">
                            <div class="checkout-summary">
                                <h1>Total del carrito</h1>
                                <p>Productos<span>Bs.</span></p>
                                <p class="sub-total">Sub Total<span>Bs.</span></p>
                                <p class="ship-cost">Gastos de env??o<span>Bs.</span></p>
                                <h2>Total<span>Bs.</span></h2>
                            </div>

                            <div class="checkout-payment">
                                <div class="payment-methods">
                                    <h1>Metodo de Pago</h1>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-1" name="payment">
                                            <label class="custom-control-label" for="payment-1">Paypal</label>
                                        </div>
                                        <div class="payment-content" id="payment-1-show">
                                            <p>
                                                Pago mediante Paypal.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-2" name="payment">
                                            <label class="custom-control-label" for="payment-2">Payoneer</label>
                                        </div>
                                        <div class="payment-content" id="payment-2-show">
                                            <p>
                                                Pago mediante Payonner.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-3" name="payment">
                                            <label class="custom-control-label" for="payment-3">Pago con cheque</label>
                                        </div>
                                        <div class="payment-content" id="payment-3-show">
                                            <p>
                                               pago mediante cheque.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-4" name="payment">
                                            <label class="custom-control-label" for="payment-4">Transferencia Bancaria</label>
                                        </div>
                                        <div class="payment-content" id="payment-4-show">
                                            <p>
                                               Pago mediante transferencia Bancaria.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-5" name="payment">
                                            <label class="custom-control-label" for="payment-5">Pago contra reembolso</label>
                                        </div>
                                        <div class="payment-content" id="payment-5-show">
                                            <p>
                                               Pago en efectivo al momneto de la entrega.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout-btn">
                                    <button>Hacer pedido</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Checkout End -->

         <!-- Footer Start -->
         <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Contactanos</h2>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>Calle Junin N?? 0118 entre Av.Heroinas</p>
                                <p><i class="fa fa-envelope"></i>gameofclothes@gamil.com</p>
                                <p><i class="fa fa-phone"></i>+591 60722803</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Siguenos</h2>
                            <div class="contact-info">
                                <div class="social">
                                    <a href="https://vm.tiktok.com/ZMefjEXfy/" target="_blank"><i class="fas fa-microphone"></i></a>
                                    <a href="https://www.facebook.com/GameOfClothesBo" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.instagram.com/gameofclothes2021/" target="_blank"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Informaci??n</h2>
                            <ul>
                                <li><a href="#">Sobre nosotros</a></li>
                                <li><a href="#">Pol??tica de privacidad</a></li>
                                <li><a href="#">T??rminos y condiciones</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2></h2>
                            <ul>
                                <li><a href="#">Pol??tica de Pyament</a></li>
                                <li><a href="#">Pol??tica de env??os</a></li>
                                <li><a href="#">Pol??tica de devoluciones</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row payment align-items-center">
                    <div class="col-md-6">
                        <div class="payment-method">
                            <h2>Aceptamos:</h2>
                            <img src="img/payment-method.png" alt="Payment Method" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="payment-security">
                            <h2>Asegurado por:</h2>
                            <img src="img/godaddy.svg" alt="Payment Security" />
                            <img src="img/norton.svg" alt="Payment Security" />
                            <img src="img/ssl.svg" alt="Payment Security" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('lib/slick/slick.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('js/mainTemplate.js') }}"></script>
    </body>
</html>
