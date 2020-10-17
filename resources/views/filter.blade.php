<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Брокер ДБО</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700">
    <link rel="stylesheet" href="{{asset('fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">

    <link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">



    <link rel="stylesheet" href="{{asset('css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="200">

    <!-- <div class="site-wrap"> -->

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    <header class="site-navbar py-3 js-site-navbar site-navbar-target" role="banner" id="site-navbar">

        <div class="container">
            <div class="row align-items-center">

                <div class="col-11 col-xl-2 site-logo">
                    <h1 class="mb-0">
                        <a href="#" class="text-white h3 mb-lg-0"><img src="{{asset('images/cygnow.png')}}" class="image-small" style="width: 170px;height: 170px;"></a>
                    </h1>
                </div>
                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">

                        <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                            <li><a href="/" class="nav-link">Главная</a></li>
                            <li class="has-children">
                                <a href="/#section-about" class="nav-link">О Сервисе</a>
                                <ul class="dropdown">
                                    <li><a href="/#section-how-it-works" class="nav-link font-weight-normal">Как это работает?</a></li>
                                </ul>
                            </li>
                            
                            <li><a href="/#section-partners" class="nav-link">Партнеры</a></li>
                            <li><a href="/#section-contacts" class="nav-link">Контакты</a></li>

                        </ul>
                    </nav>
                </div>


                <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>

            </div>

        </div>
        </div>

    </header>


    <div class="site-section bg-image overlay " style="background-image: url({{asset('images/table_cards.jpg')}});" id="section-how-it-works">
       
    </div>





    <div class="site-section bg-white" id="section-filters">
        <div class="container ">
            <form  method = "post">
@csrf
        
    
            <div class = "card">
                <div class = "card-header">Веса критериев ранжирования</div>
                <div class = "card-body">

                    @foreach ($crit->chunk(3) as $row)
                        <div class = "row">
                            @foreach($row as $criteria)


                                <div class="col-md-4 col-sm-6 col-xs-12 ">
                                    <div class="form-group">
                                        <label for = "form-control">{{ $criteria->label  }}</label>
                                        <input type="number" step = 0.01 value = "{{round(1 / count($crit) , 2) }}" placeholder="Enter ..." name = " {{ $criteria->type == "TEXT" ? "pw" : "w" }}_{{ $criteria->slug }}" class = "form-control" >
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach

                </div>
                 <div class="card-footer">
            <input type="submit" class="btn btn-success py-3 px-5 text-white" value = "Фильтр"></input>
        </div>
            </div>

        </div>
       
       
    </form>
                </div>
            </div>
        </div>
    </div>


    


    
    <footer class="site-footer ">
        <div class="container ">
            <div class="row ">
                <div class="col-md-12 ">
                    <div class="row ">
                        <div class="col-md-5 mr-auto ">
                            <h2 class="footer-heading mb-4 ">О Нас</h2>
                            <p style="font-size: 18px;">Команда CYGNO - небольшая команда аналитиков и разработчиков из Нижнего Новгорода, базирующихся на базе НИУ ВШЭ-НН. Сервис CYGNO - наш учебный проект.</p>
                        </div>

                        <div class="col-md-3 ">
                            <h2 class="footer-heading mb-4 ">Навигация</h2>
                            <ul class="list-unstyled ">
                                <li><a href="index.html#section-about">О Сервисе</a></li>
                                <li><a href="index.html#section-partners">Партнеры</a></li>
                                <li><a href="index.html#section-contacts">Контакты</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 ">
                            <h2 class="footer-heading mb-4 ">Ищите нас здесь</h2>
                            <a href="# " class="pl-0 pr-3 "><span class="icon-facebook "></span></a>
                            <a href="# " class="pl-3 pr-3 "><span class="icon-github "></span></a>
                            <a href="# " class="pl-3 pr-3 "><span class="icon-instagram "></span></a>
                            <a href="# " class="pl-3 pr-3 "><span class="icon-vk "></span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-5 mt-5 text-center ">
                <div class="col-md-12 ">
                    <div class="border-top pt-5 ">
                        <p>

                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> <i class="icon-heart " aria-hidden="true "></i> by <a href="https://vk.com/robert_ford " target="_blank ">Prog group</a>

                        </p>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <!-- </div> -->

    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/jquery-migrate-3.0.1.min.js')}} "></script>
    <script src="{{asset('js/jquery-ui.js')}} "></script>
    <script src="{{asset('js/jquery.easing.1.3.js')}} "></script>
    <script src="{{asset('js/popper.min.js')}} "></script>
    <script src="js/bootstrap.min.js "></script>
    <script src="js/owl.carousel.min.js "></script>
    <script src="js/jquery.stellar.min.js "></script>
    <script src="js/jquery.countdown.min.js "></script>
    <script src="js/jquery.magnific-popup.min.js "></script>
    <script src="js/bootstrap-datepicker.min.js "></script>
    <script src="js/aos.js "></script>

    <script src="js/main.js "></script>

</body>

</html>