<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

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
                    <a href="index.html" class="header-logo ud-block ud-w-full" :class="scrolledFromTop ? 'ud-py-4 lg:ud-py-2' : 'ud-py-5 lg:ud-py-7' ">
                        <img src="images/logo.svg" alt="logo" class="ud-h-10 ud-max-w-full" />
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
                                    <a href="index.html" class="ud-mx-8 ud-flex ud-py-2 ud-text-base ud-font-semibold ud-text-white group-hover:ud-text-white lg:ud-mr-0 lg:ud-inline-flex lg:ud-py-6 lg:ud-px-0">
                                        Home
                                    </a>
                                </li>
                                <li class="ud-group ud-relative">
                                    <a href="explore-items.html" class="ud-mx-8 ud-flex ud-py-2 ud-text-base ud-font-semibold ud-text-[#bababa] group-hover:ud-text-white lg:ud-mr-0 lg:ud-ml-8 lg:ud-inline-flex lg:ud-py-6 lg:ud-px-0 xl:ud-ml-12">
                                        Explore
                                    </a>
                                </li>
                                <li class="ud-group ud-relative">
                                    <a href="https://discord.com/invite/SxNNgXBAQS" target="_blank" rel="nofollow" class="ud-mx-8 ud-flex ud-py-2 ud-text-base ud-font-semibold ud-text-[#bababa] group-hover:ud-text-white lg:ud-mr-0 lg:ud-ml-8 lg:ud-inline-flex lg:ud-py-6 lg:ud-px-0 xl:ud-ml-12">
                                        Community
                                    </a>
                                </li>

                                <li class="ud-group submenu-item ud-relative">
                                    <a href="javascript:void(0)" @click="submenuOpen = !submenuOpen" class="ud-relative ud-mx-8 ud-flex ud-py-2 ud-text-base ud-font-semibold ud-text-[#bababa] after:ud-absolute after:ud-right-1 after:ud-top-1/2 after:ud-mt-[-2px] after:ud-h-2 after:ud-w-2 after:ud-translate-y-[-50%] after:ud-rotate-45 after:ud-border-b-2 after:ud-border-r-2 after:ud-border-current group-hover:ud-text-white lg:ud-mr-0 lg:ud-ml-8 lg:ud-inline-flex lg:ud-py-6 lg:ud-pl-0 lg:ud-pr-4 lg:after:ud-right-0 xl:ud-ml-12">
                                        Pages
                                    </a>
                                    <div :class="submenuOpen ? 'ud-block' : 'ud-hidden' " class="submenu ud-relative ud-top-full ud-left-0 ud-w-[250px] ud-rounded-md ud-bg-dark ud-p-4 ud-transition-[top] ud-duration-300 group-hover:ud-opacity-100 lg:ud-invisible lg:ud-absolute lg:ud-top-[110%] lg:ud-block lg:ud-opacity-0 lg:ud-shadow-lg lg:group-hover:ud-visible lg:group-hover:ud-top-full">
                                        <a href="explore-items.html" class="ud-block ud-rounded ud-py-[10px] ud-px-4 ud-text-sm ud-font-medium ud-text-[#bababa] hover:ud-text-white">
                                            Explore Items
                                        </a>

                                        <a href="item-details.html" class="ud-block ud-rounded ud-py-[10px] ud-px-4 ud-text-sm ud-font-medium ud-text-[#bababa] hover:ud-text-white">
                                            Item Details
                                        </a>
                                        <a href="create-item.html" class="ud-block ud-rounded ud-py-[10px] ud-px-4 ud-text-sm ud-font-medium ud-text-[#bababa] hover:ud-text-white">
                                            Create Item
                                        </a>

                                        <a href="connect-wallet.html" class="ud-block ud-rounded ud-py-[10px] ud-px-4 ud-text-sm ud-font-medium ud-text-[#bababa] hover:ud-text-white">
                                            Connect Wallet
                                        </a>
                                        <a href="support.html" class="ud-block ud-rounded ud-py-[10px] ud-px-4 ud-text-sm ud-font-medium ud-text-[#bababa] hover:ud-text-white">
                                            Support
                                        </a>
                                        <a href="signin.html" class="ud-block ud-rounded ud-py-[10px] ud-px-4 ud-text-sm ud-font-medium ud-text-[#bababa] hover:ud-text-white">
                                            Sign In Page
                                        </a>
                                        <a href="signup.html" class="ud-block ud-rounded ud-py-[10px] ud-px-4 ud-text-sm ud-font-medium ud-text-[#bababa] hover:ud-text-white">
                                            Sign Up Page
                                        </a>
                                    </div>
                                </li>
                                <li class="ud-group ud-relative">
                                    <a href="support.html" class="ud-mx-8 ud-flex ud-py-2 ud-text-base ud-font-semibold ud-text-[#bababa] group-hover:ud-text-white lg:ud-mr-0 lg:ud-ml-8 lg:ud-inline-flex lg:ud-py-6 lg:ud-px-0 xl:ud-ml-12">
                                        Support
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
                                    <input type="text" placeholder="Search here..." class="ud-w-full ud-bg-transparent ud-py-2 ud-px-4 ud-text-white ud-outline-none" />
                                    <button class="ud-text-white" name="search-button" aria-label="search-button">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.2917 3.25C12.1592 3.25 13.9503 3.99189 15.2709 5.31246C16.5914 6.63303 17.3333 8.4241 17.3333 10.2917C17.3333 12.0358 16.6942 13.6392 15.6433 14.8742L15.9358 15.1667H16.7917L22.2083 20.5833L20.5833 22.2083L15.1667 16.7917V15.9358L14.8742 15.6433C13.6392 16.6942 12.0358 17.3333 10.2917 17.3333C8.4241 17.3333 6.63303 16.5914 5.31246 15.2709C3.99189 13.9503 3.25 12.1592 3.25 10.2917C3.25 8.4241 3.99189 6.63303 5.31246 5.31246C6.63303 3.99189 8.4241 3.25 10.2917 3.25ZM10.2917 5.41667C7.58333 5.41667 5.41667 7.58333 5.41667 10.2917C5.41667 13 7.58333 15.1667 10.2917 15.1667C13 15.1667 15.1667 13 15.1667 10.2917C15.1667 7.58333 13 5.41667 10.2917 5.41667Z" fill="currentColor" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <a href="connect-wallet.html" class="ud-flex ud-items-center ud-rounded-md ud-border-2 ud-border-white ud-py-3 ud-px-6 ud-text-base ud-font-semibold ud-text-white ud-transition ud-duration-300 ud-ease-in-out hover:ud-border-primary hover:ud-bg-primary lg:ud-px-4 xl:ud-px-6">
                            <span class="ud-pr-2">
                                <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.125 17.75V18.7083C20.125 19.2167 19.9231 19.7042 19.5636 20.0636C19.2042 20.4231 18.7167 20.625 18.2083 20.625H4.79167C3.72792 20.625 2.875 19.7625 2.875 18.7083V5.29167C2.875 4.78333 3.07693 4.29582 3.43638 3.93638C3.79582 3.57693 4.28334 3.375 4.79167 3.375H18.2083C18.7167 3.375 19.2042 3.57693 19.5636 3.93638C19.9231 4.29582 20.125 4.78333 20.125 5.29167V6.25H11.5C10.4363 6.25 9.58333 7.1125 9.58333 8.16667V15.8333C9.58333 16.3417 9.78527 16.8292 10.1447 17.1886C10.5042 17.5481 10.9917 17.75 11.5 17.75H20.125ZM11.5 15.8333H21.0833V8.16667H11.5V15.8333ZM15.3333 13.4375C14.9521 13.4375 14.5865 13.286 14.3169 13.0165C14.0473 12.7469 13.8958 12.3812 13.8958 12C13.8958 11.6188 14.0473 11.2531 14.3169 10.9835C14.5865 10.714 14.9521 10.5625 15.3333 10.5625C15.7146 10.5625 16.0802 10.714 16.3498 10.9835C16.6194 11.2531 16.7708 11.6188 16.7708 12C16.7708 12.3812 16.6194 12.7469 16.3498 13.0165C16.0802 13.286 15.7146 13.4375 15.3333 13.4375Z" fill="white" />
                                </svg>
                            </span>
                            Wallet Connect
                        </a>
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
                            <a href="index.html" class="ud-mb-7 ud-inline-block">
                                <img src="images/logo.svg" alt="logo" class="ud-h-10" />
                            </a>
                            <p class="ud-mb-6 ud-text-base ud-font-medium ud-text-body-color">
                                Lorem ipsum dolor amet consectetur adipiscing elit do eiusmod
                                tempor incididunt ut labore et dolore.
                            </p>

                            <div class="ud-flex ud-items-center">
                                <a href="javascript:void(0)" name="social-link" aria-label="social-link" class="ud-mr-5 ud-text-white hover:ud-text-primary">
                                    <svg width="24" height="24" viewBox="0 0 24 24" class="ud-fill-current">
                                        <path d="M12 2.04C6.5 2.04 2 6.53 2 12.06C2 17.06 5.66 21.21 10.44 21.96V14.96H7.9V12.06H10.44V9.85C10.44 7.34 11.93 5.96 14.22 5.96C15.31 5.96 16.45 6.15 16.45 6.15V8.62H15.19C13.95 8.62 13.56 9.39 13.56 10.18V12.06H16.34L15.89 14.96H13.56V21.96C15.9164 21.5878 18.0622 20.3855 19.6099 18.5701C21.1576 16.7546 22.0054 14.4456 22 12.06C22 6.53 17.5 2.04 12 2.04Z" />
                                    </svg>
                                </a>
                                <a href="javascript:void(0)" name="social-link" aria-label="social-link" class="ud-mr-5 ud-text-white hover:ud-text-primary">
                                    <svg width="24" height="24" viewBox="0 0 24 24" class="ud-fill-current">
                                        <path d="M22.46 6C21.69 6.35 20.86 6.58 20 6.69C20.88 6.16 21.56 5.32 21.88 4.31C21.05 4.81 20.13 5.16 19.16 5.36C18.37 4.5 17.26 4 16 4C13.65 4 11.73 5.92 11.73 8.29C11.73 8.63 11.77 8.96 11.84 9.27C8.27998 9.09 5.10998 7.38 2.99998 4.79C2.62998 5.42 2.41998 6.16 2.41998 6.94C2.41998 8.43 3.16998 9.75 4.32998 10.5C3.61998 10.5 2.95998 10.3 2.37998 10C2.37998 10 2.37998 10 2.37998 10.03C2.37998 12.11 3.85998 13.85 5.81998 14.24C5.45998 14.34 5.07998 14.39 4.68998 14.39C4.41998 14.39 4.14998 14.36 3.88998 14.31C4.42998 16 5.99998 17.26 7.88998 17.29C6.42998 18.45 4.57998 19.13 2.55998 19.13C2.21998 19.13 1.87998 19.11 1.53998 19.07C3.43998 20.29 5.69998 21 8.11998 21C16 21 20.33 14.46 20.33 8.79C20.33 8.6 20.33 8.42 20.32 8.23C21.16 7.63 21.88 6.87 22.46 6Z" />
                                    </svg>
                                </a>
                                <a href="javascript:void(0)" name="social-link" aria-label="social-link" class="ud-mr-5 ud-text-white hover:ud-text-primary">
                                    <svg width="24" height="24" viewBox="0 0 24 24" class="ud-fill-current">
                                        <path d="M19 3C19.5304 3 20.0391 3.21071 20.4142 3.58579C20.7893 3.96086 21 4.46957 21 5V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H5C4.46957 21 3.96086 20.7893 3.58579 20.4142C3.21071 20.0391 3 19.5304 3 19V5C3 4.46957 3.21071 3.96086 3.58579 3.58579C3.96086 3.21071 4.46957 3 5 3H19ZM18.5 18.5V13.2C18.5 12.3354 18.1565 11.5062 17.5452 10.8948C16.9338 10.2835 16.1046 9.94 15.24 9.94C14.39 9.94 13.4 10.46 12.92 11.24V10.13H10.13V18.5H12.92V13.57C12.92 12.8 13.54 12.17 14.31 12.17C14.6813 12.17 15.0374 12.3175 15.2999 12.5801C15.5625 12.8426 15.71 13.1987 15.71 13.57V18.5H18.5ZM6.88 8.56C7.32556 8.56 7.75288 8.383 8.06794 8.06794C8.383 7.75288 8.56 7.32556 8.56 6.88C8.56 5.95 7.81 5.19 6.88 5.19C6.43178 5.19 6.00193 5.36805 5.68499 5.68499C5.36805 6.00193 5.19 6.43178 5.19 6.88C5.19 7.81 5.95 8.56 6.88 8.56ZM8.27 18.5V10.13H5.5V18.5H8.27Z" />
                                    </svg>
                                </a>
                                <a href="javascript:void(0)" name="social-link" aria-label="social-link" class="ud-mr-5 ud-text-white hover:ud-text-primary">
                                    <svg width="24" height="24" viewBox="0 0 24 24" class="ud-fill-current">
                                        <path d="M10 15L15.19 12L10 9V15ZM21.56 7.17C21.69 7.64 21.78 8.27 21.84 9.07C21.91 9.87 21.94 10.56 21.94 11.16L22 12C22 14.19 21.84 15.8 21.56 16.83C21.31 17.73 20.73 18.31 19.83 18.56C19.36 18.69 18.5 18.78 17.18 18.84C15.88 18.91 14.69 18.94 13.59 18.94L12 19C7.81 19 5.2 18.84 4.17 18.56C3.27 18.31 2.69 17.73 2.44 16.83C2.31 16.36 2.22 15.73 2.16 14.93C2.09 14.13 2.06 13.44 2.06 12.84L2 12C2 9.81 2.16 8.2 2.44 7.17C2.69 6.27 3.27 5.69 4.17 5.44C4.64 5.31 5.5 5.22 6.82 5.16C8.12 5.09 9.31 5.06 10.41 5.06L12 5C16.19 5 18.8 5.16 19.83 5.44C20.73 5.69 21.31 6.27 21.56 7.17Z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ud-w-full ud-px-4 sm:ud-w-6/12 lg:ud-w-3/12 xl:ud-w-3/12">
                    <div class="ud-mb-16">
                        <h2 class="ud-mb-8 ud-text-2xl ud-font-bold ud-text-white">
                            Company
                        </h2>

                        <ul>
                            <li>
                                <a href="javascript:void(0)" class="ud-mb-4 ud-inline-block ud-text-base ud-font-medium ud-text-body-color ud-transition hover:ud-text-white">
                                    About company
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="ud-mb-4 ud-inline-block ud-text-base ud-font-medium ud-text-body-color ud-transition hover:ud-text-white">
                                    Company services
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="ud-mb-4 ud-inline-block ud-text-base ud-font-medium ud-text-body-color ud-transition hover:ud-text-white">
                                    Job opportunities
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="ud-mb-4 ud-inline-block ud-text-base ud-font-medium ud-text-body-color ud-transition hover:ud-text-white">
                                    Contact us
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="ud-w-full ud-px-4 sm:ud-w-6/12 lg:ud-w-3/12 xl:ud-w-2/12">
                    <div class="ud-mb-16">
                        <h2 class="ud-mb-8 ud-text-2xl ud-font-bold ud-text-white">
                            Customer
                        </h2>

                        <ul>
                            <li>
                                <a href="javascript:void(0)" class="ud-mb-4 ud-inline-block ud-text-base ud-font-medium ud-text-body-color ud-transition hover:ud-text-white">
                                    Client support
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="ud-mb-4 ud-inline-block ud-text-base ud-font-medium ud-text-body-color ud-transition hover:ud-text-white">
                                    Latest news
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="ud-mb-4 ud-inline-block ud-text-base ud-font-medium ud-text-body-color ud-transition hover:ud-text-white">
                                    Company Details
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="ud-mb-4 ud-inline-block ud-text-base ud-font-medium ud-text-body-color ud-transition hover:ud-text-white">
                                    Who we are
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="ud-w-full ud-px-4 sm:ud-w-6/12 lg:ud-w-3/12 xl:ud-w-3/12">
                    <div class="ud-mb-16">
                        <h2 class="ud-mb-8 ud-text-2xl ud-font-bold ud-text-white">
                            Subscribe Now
                        </h2>

                        <p class="ud-mb-5 ud-text-base ud-font-medium ud-text-body-color">
                            Enter your email address for receiving valuable newsletters.
                        </p>

                        <form class="ud-relative">
                            <input type="email" name="newslettersEmail" placeholder="Enter your email address" class="ud-h-12 ud-w-full ud-rounded-lg ud-border ud-border-stroke ud-bg-transparent ud-pl-5 ud-pr-10 ud-text-sm ud-font-medium ud-text-white ud-outline-none focus:ud-border-primary" />
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
                        &copy; Copyright 2025 - NFT, All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- ==== Footer End ==== -->


    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script>
        // ===== wow js
        new WOW().init();
    </script>

    @stack('modals')
    
    @stack('scripts')

    @livewireScripts

</body>

</html>
