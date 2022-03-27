<x-app-layout>
    <!-- ==== Breadcrumb Section Start ==== -->
    <section class="ud-pt-[150px] ud-pb-8">
        <div class="ud-container">
            <div class="ud-rounded-lg ud-border-2 ud-border-stroke ud-bg-bg-color ud-py-5 ud-px-8">
                <ul class="ud-flex ud-items-center">
                    <li class="ud-flex ud-items-center ud-text-base ud-font-medium ud-text-white">
                        <a href="javascript:void(0)" class="ud-text-white hover:ud-text-primary">
                            Inicio
                        </a>
                        <span class="ud-px-3"> / </span>
                    </li>
                    <li class="ud-flex ud-items-center ud-text-base ud-font-medium ud-text-white">
                        Próximos eventos
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- ==== Breadcrumb Section End ==== -->

    <!-- ==== Events Listing & Filtering Start ==== -->
    <section class="ud-pb-24">
        <div class="ud-container">
            {{--
            <div class="ud-mb-14 ud-rounded-lg ud-border-2 ud-border-stroke ud-py-4 ud-px-5">
                <div class="ud--mx-4 ud-flex ud-flex-wrap ud-items-center ud-justify-between">
                    <div class="ud-w-full ud-px-4 lg:ud-w-7/12">
                        <div class="ud-flex ud-space-x-3 ud-overflow-x-auto ud-pb-8 lg:ud-pb-0">
                            <button class="ud-inline-flex ud-items-center ud-justify-center ud-whitespace-nowrap ud-rounded-md ud-bg-[#353444] ud-py-[10px] ud-px-5 ud-text-base ud-font-semibold ud-text-white ud-transition-all hover:ud-bg-primary">
                                All
                            </button>
                            <button class="ud-inline-flex ud-items-center ud-justify-center ud-whitespace-nowrap ud-rounded-md ud-bg-[#353444] ud-py-[10px] ud-px-5 ud-text-base ud-font-semibold ud-text-white ud-transition-all hover:ud-bg-primary">
                                Digital Art
                            </button>
                            <button class="ud-inline-flex ud-items-center ud-justify-center ud-whitespace-nowrap ud-rounded-md ud-bg-[#353444] ud-py-[10px] ud-px-5 ud-text-base ud-font-semibold ud-text-white ud-transition-all hover:ud-bg-primary">
                                Music
                            </button>
                            <button class="ud-inline-flex ud-items-center ud-justify-center ud-whitespace-nowrap ud-rounded-md ud-bg-[#353444] ud-py-[10px] ud-px-5 ud-text-base ud-font-semibold ud-text-white ud-transition-all hover:ud-bg-primary">
                                3D Illustration
                            </button>
                        </div>
                    </div>
                    <div class="ud-w-full ud-px-4 lg:ud-w-5/12">
                        <div class="ud-flex ud-space-x-3 lg:ud-justify-end">
                            <div class="ud-relative ud-inline-flex">
                                <select class="ud-appearance-none ud-rounded-md ud-bg-[#353444] ud-py-3 ud-pl-5 ud-pr-10 ud-text-base ud-font-semibold ud-text-white ud-outline-none">
                                    <option value="">All Artworks</option>
                                    <option value="">Digital</option>
                                    <option value="">Illustration</option>
                                </select>
                                <span class="ud-absolute ud-right-5 ud-top-1/2 ud--translate-y-1/2">
                                    <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.41 0.580078L6 5.17008L10.59 0.580078L12 2.00008L6 8.00008L0 2.00008L1.41 0.580078Z" fill="white" />
                                    </svg>
                                </span>
                            </div>
                            <div class="ud-relative ud-inline-flex">
                                <select class="ud-appearance-none ud-rounded-md ud-bg-[#353444] ud-py-3 ud-pl-5 ud-pr-10 ud-text-base ud-font-semibold ud-text-white ud-outline-none">
                                    <option value="" selected>Sort By</option>
                                    <option value="">Top rate</option>
                                    <option value="">Mid rate</option>
                                    <option value="">Low rate</option>
                                </select>
                                <span class="ud-absolute ud-right-5 ud-top-1/2 ud--translate-y-1/2">
                                    <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.41 0.580078L6 5.17008L10.59 0.580078L12 2.00008L6 8.00008L0 2.00008L1.41 0.580078Z" fill="white" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            --}}

            <div class="ud--mx-4 ud-flex ud-flex-wrap">

                @forelse ($events as $event)
                @include('events.card')
                @empty
                @endforelse
            </div>
        </div>
    </section>
    <!-- ==== Events Listing & Filtering End ==== -->
</x-app-layout>
