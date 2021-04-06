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
                        <a href="{{route('/')}}">
                            <img src="{{ asset('img/logoGC.jpeg') }}" alt="Logo">
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
                <li class="breadcrumb-item active">Detalle del producto</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Detail Start -->
    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product-detail-top">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <div class="product-image">
                                    <img src="{{ asset(''.$product->path.'') }}" alt="Product Image">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="product-content">
                                    <div class="title"><h2>{{$product->name}}</h2></div>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="price">
                                        <h4>Precio:</h4>
                                        <p>Bs.{{$product->price}}</p>
                                    </div>
                                    <div class="quantity">
                                        <h4>Cantidad:</h4>
                                        <div class="qty">
                                            <button wire:click="downProduct()" class="btn-minus"><i class="fa fa-minus"></i></button>
                                            <input wire:model='quantity' name="quantity" id="quantity" value="1">
                                            <button wire:click="plusProduct()" class="btn-plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="p-size">
                                        <h4>Talla:</h4>
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn">S</button>
                                            <button type="button" class="btn">M</button>
                                            <button type="button" class="btn">L</button>
                                            <button type="button" class="btn">XL</button>
                                        </div>
                                    </div>
                                    <div class="p-color">
                                        <h4>Color:</h4>
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn">Blanco</button>
                                            <button type="button" class="btn">Negro</button>
                                            <button type="button" class="btn">Azul</button>
                                        </div>
                                    </div>
                                    <div class="action">
                                        @if (!Auth::user())
                                            <a class="btn" href="{{route('login')}}"><i class="fa fa-shopping-cart"></i>Agregar al carro</a>
                                            <a class="btn" href="{{route('login')}}"><i class="fa fa-shopping-bag"></i>Comprar ahora</a>
                                        @else
                                            <a wire:click="addProduct({{$product}})" class="btn" href="#"><i class="fa fa-shopping-cart"></i>Agregar al carro</a>
                                            <a wire:click="buyProduct({{$product}})" class="btn" href="#"><i class="fa fa-shopping-bag"></i>Comprar ahora</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row product-detail-bottom">
                        <div class="col-lg-12">
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#description">Descripcion</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#specification">Especificacion</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#reviews">Comentarios (1)</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div id="description" class="container tab-pane active">
                                    <h4>Descripción del producto</h4>
                                    <p style="text-align: justify;">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non. Praesent in faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien eget arcu rhoncus scelerisque. Suspendisse sit amet neque neque. Praesent suscipit et magna eu iaculis. Donec arcu libero, commodo ac est a, malesuada finibus dolor. Aenean in ex eu velit semper fermentum. In leo dui, aliquet sit amet eleifend sit amet, varius in turpis. Maecenas fermentum ut ligula at consectetur. Nullam et tortor leo.
                                    </p>
                                </div>
                                <div id="specification" class="container tab-pane fade">
                                    <h4>Especificaciones del producto</h4>
                                    <ul>
                                        <li>Lorem ipsum dolor sit amet</li>
                                        <li>Lorem ipsum dolor sit amet</li>
                                        <li>Lorem ipsum dolor sit amet</li>
                                        <li>Lorem ipsum dolor sit amet</li>
                                        <li>Lorem ipsum dolor sit amet</li>
                                    </ul>
                                </div>
                                <div id="reviews" class="container tab-pane fade">
                                    <div class="reviews-submitted">
                                        <div class="reviewer">Juan Gomez - <span>01 Jun 2020</span></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p>
                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
                                        </p>
                                    </div>
                                    <div class="reviews-submit">
                                        <h4>Calificación:</h4>
                                        <div class="ratting">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <div class="row form">
                                            <div class="col-sm-6">
                                                <input type="text" placeholder="Nombre">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="email" placeholder="Correo">
                                            </div>
                                            <div class="col-sm-12">
                                                <textarea placeholder="Comentario"></textarea>
                                            </div>
                                            <div class="col-sm-12">
                                                <button>Enviar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product">
                        <div class="section-header">
                            <h1>Productos relacionados</h1>
                        </div>

                        <div class="row align-items-center product-slider product-slider-3">
                            @foreach ($products as $p)
                                <div class="col-lg-3">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#">{{$p->name}}</a>
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
                                                <img src="{{ asset(''.$p->path.'') }}" alt="Product Image">
                                            </a>
                                            <div class="product-action">
                                                @if (!Auth::user())
                                                    <a href="{{route('login')}}"><i class="fa fa-cart-plus"></i></a>
                                                @else
                                                    <a wire:click="addProduct({{$p}})" href="#"><i class="fa fa-cart-plus"></i></a>
                                                @endif
                                                <a href="#"><i class="fa fa-heart"></i></a>
                                                <a wire:click="viewDetail({{$p}})" href="#"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><span>Bs. </span>{{$p->price}}</h3>
                                            @if (!Auth::user())
                                                <a class="btn" href="{{route('login')}}"><i class="fa fa-shopping-cart"></i>Comprar</a>
                                            @else
                                                <a wire:click="buyProduct({{$p}})" class="btn" href="#"><i class="fa fa-shopping-cart"></i>Comprar</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
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
                            @foreach ($products as $p)
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">{{$p->name}}</a>
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
                                            <img src="{{ asset(''.$p->path.'') }}" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            @if (Auth::user())
                                            <a wire:click="addProduct({{$p}})" href="#"><i class="fa fa-cart-plus"></i></a>
                                            @else
                                            <a href="{{route('login')}}"><i class="fa fa-cart-plus"></i></a>
                                            @endif
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a wire:click="viewDetail({{$p}})" href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>Bs. </span>{{$p->price}}</h3>
                                        @if (Auth::user())
                                        <a wire:click="buyProduct({{$p}})" class="btn" href="#"><i class="fa fa-shopping-cart"></i>Comprar</a>
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
    <!-- Product Detail End -->

    <!-- Brand Start -->
    <div class="brand">
        <div class="container-fluid">
            <div class="brand-slider">
                <div class="brand-item"><img src="{{ asset('img/brand-1.png')}}" alt=""></div>
                <div class="brand-item"><img src="{{ asset('img/brand-2.png')}}" alt=""></div>
                <div class="brand-item"><img src="{{ asset('img/brand-3.png')}}" alt=""></div>
                <div class="brand-item"><img src="{{ asset('img/brand-4.png')}}" alt=""></div>
                <div class="brand-item"><img src="{{ asset('img/brand-5.png')}}" alt=""></div>
                <div class="brand-item"><img src="{{ asset('img/brand-6.png')}}" alt=""></div>
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
                        <img src="{{ asset('img/payment-method.png')}}" alt="Payment Method" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="payment-security">
                        <h2>Asegurado por:</h2>
                        <img src="{{ asset('img/godaddy.svg')}}" alt="Payment Security" />
                        <img src="{{ asset('img/norton.svg')}}" alt="Payment Security" />
                        <img src="{{ asset('img/ssl.svg')}}" alt="Payment Security" />
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

