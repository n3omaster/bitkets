<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! SEO::generate() !!}

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles
</head>

<body class="ud-bg-black" x-data="{ scrolledFromTop: false }" x-init="window.pageYOffset >= 50 ? scrolledFromTop = true : scrolledFromTop = false" @scroll.window="window.pageYOffset >= 50 ? scrolledFromTop = true : scrolledFromTop = false">

    <!-- ==== Header Start ==== -->
    <header x-data="{navbarOpen: false, submenuOpen: false}" class="header ud-top-0 ud-left-0 ud-flex ud-w-full ud-items-center ud-bg-transparent ud-transition ud-fixed" :class="scrolledFromTop ? 'ud-z-50 ud-bg-dark ud-bg-opacity-70 ud-shadow-sticky ud-backdrop-blur-sm' : 'ud-z-50' ">
        <div class="ud-container">
            <div class="ud-relative ud-mx-[-16px] ud-flex ud-items-center ud-justify-between">
                <div class="ud-w-60 ud-max-w-full ud-px-4">
                    <a href="{{ route('welcome') }}" class="header-logo ud-block ud-w-full ud-font-bold ud-text-3xl ud-text-white" :class="scrolledFromTop ? 'ud-py-4 lg:ud-py-2' : 'ud-py-5 lg:ud-py-7' ">
                        BitKets
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
                                    <a href="support.html" class="ud-mx-8 ud-flex ud-py-2 ud-text-base ud-font-semibold ud-text-[#bababa] group-hover:ud-text-white lg:ud-mr-0 lg:ud-ml-8 lg:ud-inline-flex lg:ud-py-6 lg:ud-px-0 xl:ud-ml-12">
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
                            <a href="{{ route('welcome') }}" class="ud-mb-7 ud-inline-block ud-font-bold ud-text-3xl ud-text-white">
                                BitKets
                            </a>
                            <p class="ud-mb-6 ud-text-base ud-font-medium ud-text-body-color">
                                Reservas de eventos, fiestas, entradas y todo tipo de tickets para lo que desee lanzar mediante Bitcoin Lightning ⚡️
                            </p>

                            <div class="ud-flex ud-items-center">
                                <a href="https://www.facebook.com/bitkets" name="social-link" aria-label="social-link" class="ud-mr-5 ud-text-white hover:ud-text-primary" rel="nofollow">
                                    <svg width="24" height="24" viewBox="0 0 24 24" class="ud-fill-current">
                                        <path d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96C15.9164 21.5878 18.0622 20.3855 19.6099 18.5701C21.1576 16.7546 22.0054 14.4456 22 12.06C22 6.53 17.5 2.04 12 2.04Z" />
                                    </svg>
                                </a>
                                <a href="https://www.twitter.com/bitkets" name="social-link" aria-label="social-link" class="ud-mr-5 ud-text-white hover:ud-text-primary" rel="nofollow">
                                    <svg width="24" height="24" viewBox="0 0 24 24" class="ud-fill-current">
                                        <path d="M22.46 6C21.69 6.35 20.86 6.58 20 6.69C20.88 6.16 21.56 5.32 21.88 4.31C21.05 4.81 20.13 5.16 19.16 5.36C18.37 4.5 17.26 4 16 4C13.65 4 11.73 5.92 11.73 8.29C11.73 8.63 11.77 8.96 11.84 9.27C8.27998 9.09 5.10998 7.38 2.99998 4.79C2.62998 5.42 2.41998 6.16 2.41998 6.94C2.41998 8.43 3.16998 9.75 4.32998 10.5C3.61998 10.5 2.95998 10.3 2.37998 10C2.37998 10 2.37998 10 2.37998 10.03C2.37998 12.11 3.85998 13.85 5.81998 14.24C5.45998 14.34 5.07998 14.39 4.68998 14.39C4.41998 14.39 4.14998 14.36 3.88998 14.31C4.42998 16 5.99998 17.26 7.88998 17.29C6.42998 18.45 4.57998 19.13 2.55998 19.13C2.21998 19.13 1.87998 19.11 1.53998 19.07C3.43998 20.29 5.69998 21 8.11998 21C16 21 20.33 14.46 20.33 8.79C20.33 8.6 20.33 8.42 20.32 8.23C21.16 7.63 21.88 6.87 22.46 6Z" />
                                    </svg>
                                </a>
                                <a href="https://www.linkedin.com/bitkets" name="social-link" aria-label="social-link" class="ud-mr-5 ud-text-white hover:ud-text-primary" rel="nofollow">
                                    <svg width="24" height="24" viewBox="0 0 24 24" class="ud-fill-current">
                                        <path d="M19 3C19.5304 3 20.0391 3.21071 20.4142 3.58579C20.7893 3.96086 21 4.46957 21 5V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V5C3 4.46957 3.21071 3.96086 3.58579 3.58579C3.96086 3.21071 4.46957 3 5 3H19ZM18.5 18.5V13.2C18.5 12.3354 18.1565 11.5062 17.5452 10.8948C16.9338 10.2835 16.1046 9.94 15.24 9.94C14.39 9.94 13.4 10.46 12.92 11.24V10.13H10.13V18.5H12.92V13.57C12.92 12.8 13.54 12.17 14.31 12.17C14.6813 12.17 15.0374 12.3175 15.2999 12.5801C15.5625 12.8426 15.71 13.1987 15.71 13.57V18.5H18.5ZM6.88 8.56C7.32556 8.56 7.75288 8.383 8.06794 8.06794C8.383 7.75288 8.56 7.32556 8.56 6.88C8.56 5.95 7.81 5.19 6.88 5.19C6.43178 5.19 6.00193 5.36805 5.68499 5.68499C5.36805 6.00193 5.19 6.43178 5.19 6.88C5.19 7.81 5.95 8.56 6.88 8.56ZM8.27 18.5V10.13H5.5V18.5H8.27Z" />
                                    </svg>
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
