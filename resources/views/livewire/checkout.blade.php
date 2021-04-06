<div>

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
                    <div class="col-md-9">
                        <div class="user">
                            <a href="wishlist.html" class="btn wishlist">
                                <i class="fa fa-heart"></i>
                                <span>(0)</span>
                            </a>
                            <a href="{{route('cart')}}" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span>{{$totalProducts}}</span>
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
                    <li class="breadcrumb-item"><a href="{{route('login')}}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{route('product-list')}}">Productos</a></li>
                    <li class="breadcrumb-item active">Facturacion y envío</li>
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
                                <h2>Dirección de facturación</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Nombre</label>
                                        <input class="form-control" type="text" placeholder="Nombre" wire:model="name" name="name" id="name">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Correo electrónico</label>
                                        <input class="form-control" type="email" placeholder="Correo electrónico" wire:model="email" name="email" id="email">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Numero de celular</label>
                                        <input class="form-control" type="text" placeholder="Numero de celular" wire:model="phone" name="phone" id="phone">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Dirección</label>
                                        <input class="form-control" type="text" placeholder="Dirección" wire:model="address" name="address" id="address">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Ciudad</label>
                                        <select class="custom-select" wire:model="city" name='city' id="city" :value='old(city)' required>
                                            <option selected>Seleccione una opción</option>
                                            <option value="La Paz">La Paz</option>
                                            <option value="Santa Cruz">Santa Cruz</option>
                                            <option value="Cochabamba">Cochabamba</option>
                                            <option value="Oruro">Oruro</option>
                                            <option value="El Alto">El Alto</option>
                                            <option value="Potosi">Potosi</option>
                                            <option value="Tarija">Tarija</option>
                                            <option value="Chuquisaca">Chuquisaca</option>
                                            <option value="Beni">Beni</option>
                                            <option value="Pando">Pando</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Provincia</label>
                                        <input wire:model="provincia" class="form-control" type="text" placeholder="Provincia" name="provincia" id="provincia">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout-inner">
                            <div class="checkout-summary">
                                <h1>Total del carrito</h1>
                                <h2>Total Productos<span>{{$totalProducts}}</span></h2>
                                <h2>Total<span>Bs.{{$total}}</span></h2>
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
                                            <label for="emailPaypal">Correo Electronico</label>
                                            <input class="form-control form-control-sm" wire:model="emailPaypal" name="emailPaypal" id="emailPaypal" placeholder="Correo Electronico">
                                            <label for="passwordPaypal">Contraseña</label>
                                            <input type="password" class="form-control form-control-sm" wire:model="passwordPaypal" name="passwordPaypal" id="passwordPaypal" placeholder="Contraseña">
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="payment-3" name="payment">
                                            <label class="custom-control-label" for="payment-3">Tarjeta de Credito</label>
                                        </div>
                                        <div class="payment-content" id="payment-3-show">
                                            <label for="numberCard">Numero de tarjeta</label>
                                            <input class="form-control form-control-sm" wire:model="numberCard" name="numberCard" id="cardNumber" placeholder="Numero de tarjeta">
                                            <label for="ccv">CCV</label>
                                            <input class="form-control form-control-sm" wire:model="ccv" name="ccv" id="ccv" placeholder="CCV">
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout-btn">
                                    <button wire:click="store()">Hacer pedido</button>
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
                                <p><i class="fa fa-map-marker"></i>Calle Junin Nº 0118 entre Av.Heroinas</p>
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
                            <h2>Información</h2>
                            <ul>
                                <li><a href="#">Sobre nosotros</a></li>
                                <li><a href="#">Política de privacidad</a></li>
                                <li><a href="#">Términos y condiciones</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2></h2>
                            <ul>
                                <li><a href="#">Política de Pyament</a></li>
                                <li><a href="#">Política de envíos</a></li>
                                <li><a href="#">Política de devoluciones</a></li>
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
</div>
