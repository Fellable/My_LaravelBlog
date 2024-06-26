<!DOCTYPE html>
<html lang="ru">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Личный блог Евгения Рыбцова</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/loader.js') }}"></script>
</head>
<body>
<div class="edica-loader"></div>
<header class="edica-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">

            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="edicaMainNav">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                     <li class="nav-item">
            <a class="navbar-brand" href="/"><img src="{{ asset('assets/images/CrashLogo1.png') }}" alt="Crassh" style="height: 75px;"></a>
                    </li>
                    
                    <li class="nav-item" style="align-items: center;
    display: flex;">
                        <a class="nav-link" href=" {{ route('main.index') }}"> Мои проекты </a>
                    </li>



                        <li class="nav-item" style="align-items: center;
    display: flex;">
                            <a class="nav-link" href=" {{ route('category.index') }}"> Категории </a>
                        </li>



                    @can('view', auth()->user())
                    <li class="nav-item" style="align-items: center;
    display: flex;">
                        <a class="nav-link" href=" {{ route('admin.main.index') }}" style="align-items: center;
    display: flex;"> Админка</a>
                    </li>
                    
                                        <li class="nav-item" style="align-items: center;
    display: flex;">
                        <a class="nav-link" href=" {{ route('about.index') }}" > Обо мне (ищу работу)</a>
                    </li>
                    @endcan

                    @guest()
                        <li class="nav-item" style="align-items: center;
    display: flex;">
                            <a class="nav-link" href=" {{ route('lk.main.index') }}"> Войти </a>
                        </li>
                    @endguest
                    @auth()
                        <li class="nav-item active" style="align-items: center;
    display: flex;">
                            <a class="nav-link" href=" {{ route('lk.main.index') }}"> Личный кабинет </a>
                        </li>
                    @endauth
                </ul>
                <ul class="navbar-nav mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><span class="flag-icon flag-icon-squared rounded-circle flag-icon-ru"></span> Rus</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

@yield('content')


<footer class="edica-footer" data-aos="fade-up">
    <div class="container">
        <div class="row footer-widget-area">
            <div class="col-md-3">
                <a href="index.html" class="footer-brand-wrapper">
                    <img src="{{ asset('assets/images/CrashLogo1.png') }}" alt="Логотип не загрузился :(">
                </a>
                <p class="contact-details">rybtsov.eg@yandex.ru</p>
                <p class="contact-details">+7 909 204 09 21</p>
                <nav class="footer-social-links">
                    <a href="https://vk.com/fellable"><i class="fab fa-vk"></i></a>
                    <a href="https://github.com/Fellable"><i class="fab fa-git"></i></a>
                </nav>
            </div>
            <div class="col-md-3">
                <nav class="footer-nav">
                    <a href="#!" class="nav-link">Обо мне (временно скрыто)</a>
                </nav>
            </div>
            <div class="col-md-3">
                <nav class="footer-nav">
                    <a href="#!" class="nav-link">Что я умею (временно скрыто)</a>
                </nav>
            </div>
            <div class="col-md-3">
                <div class="dropdown footer-country-dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="footerCountryDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="flag-icon flag-icon-ru flag-icon-squared"></span> Русский <i class="fas fa-chevron-down ml-2"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="footerCountryDropdown">
                        <button class="dropdown-item" href="#">
                            <span class="flag-icon flag-icon-ru flag-icon-squared"></span> Русский
                        </button>
                        <button class="dropdown-item" href="#">
                            <span class="flag-icon flag-icon-us flag-icon-squared"></span> English
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-content">
            <nav class="nav footer-bottom-nav">
                <a href="#!">Карта сайта</a>
            </nav>
            <p class="mb-0">Личный блог Евгения Рыбцова </p>
        </div>
    </div>
</footer>
<script src="{{ asset('assets/vendors/popper.js/popper.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/aos/aos.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
    AOS.init({
        duration: 1000
    });
</script>
</body>

</html>
