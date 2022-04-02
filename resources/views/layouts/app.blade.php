<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! SEO::generate() !!}

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @stack('styles')

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Feeds -->
    @include('feed::links')

    @livewireStyles
</head>

<body class="ud-bg-black" x-data="{ scrolledFromTop: false }" x-init="window.pageYOffset >= 50 ? scrolledFromTop = true : scrolledFromTop = false" @scroll.window="window.pageYOffset >= 50 ? scrolledFromTop = true : scrolledFromTop = false">

    <!-- ==== Header Start ==== -->
    <header x-data="{navbarOpen: false, submenuOpen: false}" class="header ud-top-0 ud-left-0 ud-flex ud-w-full ud-items-center ud-bg-transparent ud-transition ud-fixed" :class="scrolledFromTop ? 'ud-z-50 ud-bg-dark ud-bg-opacity-70 ud-shadow-sticky ud-backdrop-blur-sm' : 'ud-z-50' ">
        <div class="ud-container">
            <div class="ud-relative ud-mx-[-16px] ud-flex ud-items-center ud-justify-between">
                <div class="ud-w-60 ud-max-w-full ud-px-4">
                    <a href="{{ route('welcome') }}" class="header-logo ud-block ud-w-full" :class="scrolledFromTop ? 'ud-py-4 lg:ud-py-2' : 'ud-py-5 lg:ud-py-7' ">
                        <img src="{{ asset('bitkets-logo.svg') }}" alt="BitKets">
                    </a>
                </div>
                <div class="ud-flex ud-w-full ud-items-center ud-justify-between ud-px-4">
                    <div>
                        <button @click="navbarOpen = !navbarOpen " :class="navbarOpen && 'navbarTogglerActive' " id="navbarToggler" name="navbarToggler" aria-label="navbarToggler" class="ud-absolute ud-right-4 ud-top-1/2 ud-block ud-translate-y-[-50%] ud-rounded-lg ud-px-3 ud-py-[6px] ud-ring-primary focus:ud-ring-2 lg:ud-hidden">
                            <span :class="navbarOpen && 'ud-transform ud-rotate-45 ud-top-[7px]' " class="ud-relative ud-my-[6px] ud-block ud-h-[2px] ud-w-[30px] ud-bg-white"></span>
                            <span :class="navbarOpen && 'ud-opacity-0' " class="ud-relative ud-my-[6px] ud-block ud-h-[2px] ud-w-[30px] ud-bg-white"></span>
                            <span :class="navbarOpen && 'ud-top-[-8px] ud-rotate-[135deg]' " class="ud-relative ud-my-[6px] ud-block ud-h-[2px] ud-w-[30px] ud-bg-white"></span>
                        </button>
                        <nav :class="!navbarOpen && 'ud-hidden' " id="navbarCollapse" class="ud-absolute ud-right-4 ud-top-full ud-w-full ud-max-w-[250px] ud-rounded-lg ud-bg-bg-color ud-shadow-lg lg:ud-static lg:ud-block lg:ud-w-full lg:ud-max-w-full lg:ud-bg-transparent ud-py-3 lg:ud-py-0 lg:ud-px-4 lg:ud-shadow-none xl:ud-px-6">
                            <ul class="ud-blcok lg:ud-flex">
                                <li class="ud-group ud-relative">
                                    <a href="{{ route('events.index') }}" class="ud-mx-8 ud-flex ud-py-2 ud-text-base ud-font-semibold ud-text-[#bababa] group-hover:ud-text-white lg:ud-mr-0 lg:ud-ml-8 lg:ud-inline-flex lg:ud-py-6 lg:ud-px-0 xl:ud-ml-12">
                                        Eventos
                                    </a>
                                </li>
                                <li class="ud-group ud-relative">
                                    <a href="{{ route('brands.index') }}" target="_blank" rel="nofollow" class="ud-mx-8 ud-flex ud-py-2 ud-text-base ud-font-semibold ud-text-[#bababa] group-hover:ud-text-white lg:ud-mr-0 lg:ud-ml-8 lg:ud-inline-flex lg:ud-py-6 lg:ud-px-0 xl:ud-ml-12">
                                        Marcas
                                    </a>
                                </li>
                                <li class="ud-group ud-relative">
                                    <a href="#" class="ud-mx-8 ud-flex ud-py-2 ud-text-base ud-font-semibold ud-text-[#bababa] group-hover:ud-text-white lg:ud-mr-0 lg:ud-ml-8 lg:ud-inline-flex lg:ud-py-6 lg:ud-px-0 xl:ud-ml-12">
                                        Soporte
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="ud-hidden ud-justify-end ud-pr-16 sm:ud-flex lg:ud-pr-0">
                        <div class="ud-group ud-relative ud-hidden md:ud-flex">
                            <button class="ud-py-3 ud-px-7 ud-text-base ud-font-semibold ud-text-body-color ud-transition hover:ud-text-primary lg:ud-px-4 xl:ud-px-7" name="search" aria-label="search">
                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.2917 3.25C12.1592 3.25 13.9503 3.99189 15.2709 5.31246C16.5914 6.63303 17.3333 8.4241 17.3333 10.2917C17.3333 12.0358 16.6942 13.6392 15.6433 14.8742L15.9358 15.1667H16.7917L22.2083 20.5833L20.5833 22.2083L15.1667 16.7917V15.9358L14.8742 15.6433C13.6392 16.6942 12.0358 17.3333 10.2917 17.3333C8.4241 17.3333 6.63303 16.5914 5.31246 15.2709C3.99189 13.9503 3.25 12.1592 3.25 10.2917C3.25 8.4241 3.99189 6.63303 5.31246 5.31246C6.63303 3.99189 8.4241 3.25 10.2917 3.25ZM10.2917 5.41667C7.58333 5.41667 5.41667 7.58333 5.41667 10.2917C5.41667 13 7.58333 15.1667 10.2917 15.1667C13 15.1667 15.1667 13 15.1667 10.2917C15.1667 7.58333 13 5.41667 10.2917 5.41667Z" fill="currentColor" />
                                </svg>
                            </button>
                            <div class="ud-invisible ud-absolute ud-top-[110%] ud-right-0 ud-w-[250px] ud-rounded-md ud-bg-dark ud-p-3 ud-opacity-0 ud-transition-all group-hover:ud-visible group-hover:ud-top-full group-hover:ud-opacity-100">
                                <form class="ud-flex">
                                    <input type="text" placeholder="Buscar eventos..." class="ud-w-full ud-bg-transparent ud-py-2 ud-px-4 ud-text-white ud-outline-none" />
                                    <button class="ud-text-white" name="search-button" aria-label="search-button">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.2917 3.25C12.1592 3.25 13.9503 3.99189 15.2709 5.31246C16.5914 6.63303 17.3333 8.4241 17.3333 10.2917C17.3333 12.0358 16.6942 13.6392 15.6433 14.8742L15.9358 15.1667H16.7917L22.2083 20.5833L20.5833 22.2083L15.1667 16.7917V15.9358L14.8742 15.6433C13.6392 16.6942 12.0358 17.3333 10.2917 17.3333C8.4241 17.3333 6.63303 16.5914 5.31246 15.2709C3.99189 13.9503 3.25 12.1592 3.25 10.2917C3.25 8.4241 3.99189 6.63303 5.31246 5.31246C6.63303 3.99189 8.4241 3.25 10.2917 3.25ZM10.2917 5.41667C7.58333 5.41667 5.41667 7.58333 5.41667 10.2917C5.41667 13 7.58333 15.1667 10.2917 15.1667C13 15.1667 15.1667 13 15.1667 10.2917C15.1667 7.58333 13 5.41667 10.2917 5.41667Z" fill="currentColor" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ==== Header End ==== -->

    {{ $slot }}

    <!-- ==== Footer Start ==== -->
    <footer class="ud-bg-bg-color ud-pt-24">
        <div class="ud-container">
            <div class="ud--mx-4 ud-flex ud-flex-wrap">
                <div class="ud-w-full ud-px-4 sm:ud-w-6/12 lg:ud-w-3/12 xl:ud-w-4/12">
                    <div class="ud-mb-16">
                        <div class="ud-max-w-[300px]">
                            <a href="{{ route('welcome') }}" class="ud-mb-7">
                                <img src="{{ asset('bitkets-logo.svg') }}" alt="BitKets">
                            </a>
                            <p class="ud-mb-6 ud-text-base ud-font-medium ud-text-body-color">
                                Reservas de eventos, fiestas, entradas y todo tipo de tickets para lo que desee lanzar mediante Bitcoin Lightning ⚡️
                            </p>

                            <div class="ud-flex ud-items-center">
                                <a href="https://www.facebook.com/bitkets" name="social-link" aria-label="social-link" class="ud-mr-5 ud-text-white hover:ud-text-primary" rel="nofollow">
                                    <i class="fa-brands fa-facebook-square fa-2x"></i>
                                </a>
                                <a href="https://www.twitter.com/bitkets" name="social-link" aria-label="social-link" class="ud-mr-5 ud-text-white hover:ud-text-primary" rel="nofollow">
                                    <i class="fa-brands fa-twitter-square fa-2x"></i>
                                </a>
                                <a href="https://www.linkedin.com/bitkets" name="social-link" aria-label="social-link" class="ud-mr-5 ud-text-white hover:ud-text-primary" rel="nofollow">
                                    <i class="fa-brands fa-linkedin fa-2x"></i>
                                </a>
                                <a href="https://www.instagram.com/bitkets" name="social-link" aria-label="social-link" class="ud-mr-5 ud-text-white hover:ud-text-primary" rel="nofollow">
                                    <i class="fa-brands fa-instagram-square fa-2x"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ud-w-full ud-px-4 sm:ud-w-6/12 lg:ud-w-3/12 xl:ud-w-3/12">
                    <div class="ud-mb-16">
                        <h2 class="ud-mb-8 ud-text-2xl ud-font-bold ud-text-white">
                            Empresa
                        </h2>

                        <ul>
                            <li>
                                <a href="javascript:void(0)" class="ud-mb-4 ud-inline-block ud-text-base ud-font-medium ud-text-body-color ud-transition hover:ud-text-white">
                                    Sobre nosotros
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="ud-mb-4 ud-inline-block ud-text-base ud-font-medium ud-text-body-color ud-transition hover:ud-text-white">
                                    Servicios
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="ud-mb-4 ud-inline-block ud-text-base ud-font-medium ud-text-body-color ud-transition hover:ud-text-white">
                                    Ofertas de empleo
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="ud-mb-4 ud-inline-block ud-text-base ud-font-medium ud-text-body-color ud-transition hover:ud-text-white">
                                    Contáctenos
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="ud-w-full ud-px-4 sm:ud-w-6/12 lg:ud-w-3/12 xl:ud-w-2/12">
                    <div class="ud-mb-16">
                        <h2 class="ud-mb-8 ud-text-2xl ud-font-bold ud-text-white">
                            Clientes
                        </h2>

                        <ul>
                            <li>
                                <a href="javascript:void(0)" class="ud-mb-4 ud-inline-block ud-text-base ud-font-medium ud-text-body-color ud-transition hover:ud-text-white">
                                    Soporte técnico
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="ud-mb-4 ud-inline-block ud-text-base ud-font-medium ud-text-body-color ud-transition hover:ud-text-white">
                                    Últimas noticias
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="ud-mb-4 ud-inline-block ud-text-base ud-font-medium ud-text-body-color ud-transition hover:ud-text-white">
                                    Sus Tickets
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="ud-mb-4 ud-inline-block ud-text-base ud-font-medium ud-text-body-color ud-transition hover:ud-text-white">
                                    ¿Quiénes somos?
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="ud-w-full ud-px-4 sm:ud-w-6/12 lg:ud-w-3/12 xl:ud-w-3/12">
                    <div class="ud-mb-16">
                        <h2 class="ud-mb-8 ud-text-2xl ud-font-bold ud-text-white">
                            Suscribirte ahora
                        </h2>

                        <p class="ud-mb-5 ud-text-base ud-font-medium ud-text-body-color">
                            Coloque su email para enterarte de todas las novedades.
                        </p>

                        <form class="ud-relative">
                            <input type="email" name="newslettersEmail" placeholder="Coloque su dirección de correo" class="ud-h-12 ud-w-full ud-rounded-lg ud-border ud-border-stroke ud-bg-transparent ud-pl-5 ud-pr-10 ud-text-sm ud-font-medium ud-text-white ud-outline-none focus:ud-border-primary" />
                            <button type="submit" name="submit" aria-label="submit" class="ud-absolute ud-right-[6px] ud-top-1/2 ud-flex ud-h-9 ud-w-9 ud--translate-y-1/2 ud-items-center ud-justify-center ud-rounded-md ud-bg-primary ud-text-white">
                                <svg width="20" height="20" viewBox="0 0 20 20" class="ud-fill-current">
                                    <path d="M1.66669 17.5L19.1667 10L1.66669 2.5V8.33333L14.1667 10L1.66669 11.6667V17.5Z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="ud-border-t ud-border-stroke">
                <div class="ud-py-7 ud-text-center">
                    <p class="ud-text-base ud-font-medium ud-text-body-color">
                        &copy; Copyright {{ date('Y') }} - BitKets, Todos los derechos reservados.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- ==== Footer End ==== -->

    @stack('modals')

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script>
        // ===== wow js
        new WOW().init();
    </script>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/df473d3345.js" crossorigin="anonymous"></script>

    @stack('scripts')

    @livewireScripts

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RF55WYY6YP"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-RF55WYY6YP');
    </script>

</body>

</html>
