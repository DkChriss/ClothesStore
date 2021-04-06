<div>
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
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="#">Productos</a></li>
                        <li class="breadcrumb-item active">Lista de productos</li>
                    </ul>
                </div>
            </div>
            <!-- Breadcrumb End -->

            <!-- Product List Start -->
            <div class="product-view">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="product-view-top">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="product-search">
                                                    <input type="email" placeholder="Buscar">
                                                    <button><i class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="product-short">
                                                    <div class="dropdown">
                                                        <div class="dropdown-toggle" data-toggle="dropdown">Tipo de producto</div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="#" class="dropdown-item">Nuevo</a>
                                                            <a href="#" class="dropdown-item">Popular</a>
                                                            <a href="#" class="dropdown-item">Mas vendidos</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="product-price-range">
                                                    <div class="dropdown">
                                                        <div class="dropdown-toggle" data-toggle="dropdown">Rango de Precio</div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a href="#" class="dropdown-item">Bs.0 a Bs.50</a>
                                                            <a href="#" class="dropdown-item">Bs.51 a Bs.100</a>
                                                            <a href="#" class="dropdown-item">Bs.101 a Bs.150</a>
                                                            <a href="#" class="dropdown-item">Bs.151 a Bs.200</a>
                                                            <a href="#" class="dropdown-item">Bs.201 a Bs.250</a>
                                                            <a href="#" class="dropdown-item">Bs.251 a Bs.300</a>
                                                            <a href="#" class="dropdown-item">Bs.301 a Bs.350</a>
                                                            <a href="#" class="dropdown-item">Bs.351 a Bs.400</a>
                                                            <a href="#" class="dropdown-item">Bs.401 a Bs.450</a>
                                                            <a href="#" class="dropdown-item">Bs.451 a Bs.500</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @foreach ($products as $product)
                                    <div class="col-md-4">
                                        <div class="product-item">
                                            <div class="product-title">
                                                <a href="#">{{$product->name}}</a>
                                                <div class="ratting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="product-image">
                                                <a href="product-detail.html">
                                                    <img src="{{$product->path}}" alt="Product Image">
                                                </a>
                                                <div class="product-action">
                                                    @if (Auth::user())
                                                        <a wire:click="addProduct({{$product}})" href="#"><i class="fa fa-cart-plus"></i></a>
                                                    @else
                                                        <a href="{{route('login')}}"><i class="fa fa-cart-plus"></i></a>
                                                    @endif
                                                    <a href="#"><i class="fa fa-heart"></i></a>
                                                    <a wire:click="viewDetail({{$product}})" href="#"><i class="fa fa-search"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-price">
                                                <h3><span>Bs.</span>{{$product->price}}</h3>
                                                @if (Auth::user())
                                                <a wire:click="buyProduct({{$product}})" class="btn" href="#"><i class="fa fa-shopping-cart"></i>Comprar</a>
                                                @else
                                                <a class="btn" href="{{route('login')}}"><i class="fa fa-shopping-cart"></i>Comprar</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Pagination Start -->
                            <div class="col-md-12">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">Anterior</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Siguiente</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- Pagination Start -->
                        </div>

                        <!-- Side Bar Start -->
                        <div class="col-lg-4 sidebar">
                            <div class="sidebar-widget category">
                                <h2 class="title">Categorias</h2>
                                <nav class="navbar bg-light">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="fa fa-female"></i>Belleza y Moda</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="fa fa-child"></i>Niños y Bebes</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="fa fa-tshirt"></i>Hombres y Mujeres</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="fa fa-mobile-alt"></i>Accesorios</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="sidebar-widget widget-slider">
                                <div class="sidebar-slider normal-slider">
                                    @foreach ($products as $product)
                                        <div class="product-item">
                                            <div class="product-title">
                                                <a href="#">{{$product->name}}</a>
                                                <div class="ratting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="product-image">
                                                <a href="product-detail.html">
                                                    <img src="{{$product->path}}" alt="Product Image">
                                                </a>
                                                <div class="product-action">
                                                    @if (Auth::user())
                                                        <a wire:click="addProduct({{$product}})" href="#"><i class="fa fa-cart-plus"></i></a>
                                                    @else
                                                        <a href="{{route('login')}}"><i class="fa fa-cart-plus"></i></a>
                                                    @endif
                                                    <a href="#"><i class="fa fa-heart"></i></a>
                                                    <a href="#"><i class="fa fa-search"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-price">
                                                <h3><span>Bs.</span>{{$product->price}}</h3>
                                                @if (Auth::user())
                                                    <a wire:click="buyProduct({{$product}})" class="btn" href="#"><i class="fa fa-shopping-cart"></i>Comprar</a>
                                                @else
                                                    <a class="btn" href="{{route('login')}}"><i class="fa fa-shopping-cart"></i>Comprar</a>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="sidebar-widget brands">
                                <h2 class="title">Nuestras Marcas</h2>
                                <ul>
                                    <li><a href="#">Nulla </a><span>(45)</span></li>
                                    <li><a href="#">Curabitur </a><span>(34)</span></li>
                                    <li><a href="#">Nunc </a><span>(67)</span></li>
                                    <li><a href="#">Ullamcorper</a><span>(74)</span></li>
                                    <li><a href="#">Fusce </a><span>(89)</span></li>
                                    <li><a href="#">Sagittis</a><span>(28)</span></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Side Bar End -->
                    </div>
                </div>
            </div>
            <!-- Product List End -->

            <!-- Brand Start -->
            <div class="brand">
                <div class="container-fluid">
                    <div class="brand-slider">
                        <div class="brand-item"><img src="img/brand-1.png" alt=""></div>
                        <div class="brand-item"><img src="img/brand-2.png" alt=""></div>
                        <div class="brand-item"><img src="img/brand-3.png" alt=""></div>
                        <div class="brand-item"><img src="img/brand-4.png" alt=""></div>
                        <div class="brand-item"><img src="img/brand-5.png" alt=""></div>
                        <div class="brand-item"><img src="img/brand-6.png" alt=""></div>
                    </div>
                </div>
            </div>
            <!-- Brand End -->

            <!-- Footer Start -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-widget">
                                <h2>Contactanos</h2>
                                <div class="contact-info">
                                    <p><i class="fa fa-map-marker"></i>Calle Junin Nº 0118 entre Av.Heroinas</p>
                                    <p><i class="fa fa-envelope"></i>gameofclothes@gmail.com</p>
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
