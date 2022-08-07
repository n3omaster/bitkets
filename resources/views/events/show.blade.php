<x-app-layout>
    <!-- ==== Breadcrumb Section Start ==== -->
    <section class="ud-pt-[150px]">
        <div class="ud-container">
            <div class="ud-rounded-lg ud-border-2 ud-border-stroke ud-bg-bg-color ud-py-5 ud-px-8">
                <ul class="ud-flex ud-items-center">
                    <li class="ud-flex ud-items-center ud-text-base ud-font-medium ud-text-white">
                        <a href="{{ route('welcome') }}" class="ud-text-white hover:ud-text-primary">
                            Inicio
                        </a>
                        <span class="ud-px-3"> / </span>
                    </li>
                    <li class="ud-flex ud-items-center ud-text-base ud-font-medium ud-text-white">
                        <a href="{{ route('events.index') }}" class="ud-text-white hover:ud-text-primary">
                            Eventos
                        </a>
                        <span class="ud-px-3"> / </span>
                    </li>
                    <li class="ud-flex ud-items-center ud-text-base ud-font-medium ud-text-white">
                        {{ $event->name }}
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- ==== Breadcrumb Section End ==== -->

    <!-- ==== Today's Picks Section Start ==== -->
    <section class="ud-pt-8 ud-pb-24">
        <div class="ud-container">
            <div class="ud--mx-4 ud-flex ud-flex-wrap">
                <div class="ud-w-full ud-px-4 lg:ud-w-1/2">
                    <div class="ud-mb-12 ud-flex ud-w-full ud-items-center ud-justify-center ud-rounded-xl ud-border ud-border-stroke ud-bg-bg-color">
                        <img class="ud-rounded-xl" src="{{ $event->main_logo }}" alt="{{ $event->media[0]->name }}" />
                    </div>
                </div>

                <div class="ud-w-full ud-px-4 lg:ud-w-1/2">
                    <div class="xl:ud-pl-8">
                        <div class="ud-mb-9 ud-justify-between sm:ud-flex">
                            <h2 class="ud-mb-3 ud-text-3xl ud-font-bold ud-text-white sm:ud-mb-0 sm:ud-text-[38px] lg:ud-text-3xl xl:ud-text-[38px]">
                                {{ $event->name }}
                            </h2>
                            <button class="ud-inline-flex ud-items-center ud-rounded-md ud-bg-white ud-px-2 ud-py-1">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.99999 11.8709L6.15416 11.1009C3.14999 8.37675 1.16666 6.57425 1.16666 4.37508C1.16666 2.57258 2.57832 1.16675 4.37499 1.16675C5.38999 1.16675 6.36416 1.63925 6.99999 2.38008C7.63582 1.63925 8.60999 1.16675 9.62499 1.16675C11.4217 1.16675 12.8333 2.57258 12.8333 4.37508C12.8333 6.57425 10.85 8.37675 7.84582 11.1009L6.99999 11.8709Z" fill="#F85486" />
                                </svg>

                                <span class="ud-pl-1 ud-text-xs ud-font-semibold ud-text-black">
                                    4.6K
                                </span>
                            </button>
                        </div>

                        <div class="ud-mb-9 sm:ud-flex">

                            <div class="ud-flex ud-items-center ud-border-body-color ud-pr-0 ud-pb-3 sm:ud-border-r-2 sm:ud-pr-8 sm:ud-pb-0">
                                <div class="ud-mr-2 ud-w-full ud-max-w-[44px] ud-rounded-md ud-items-center ud-justify-center">
                                    <img src="https://bitkets.nyc3.digitaloceanspaces.com/brands/bag.png" alt="{{ $event->owner->name }}" class="ud-h-full ud-w-full ud-object-cover ud-object-center" />
                                </div>
                                <div class="ud-w-full">
                                    <h3 class="ud-text-base ud-font-semibold ud-text-white">
                                        {{ $event->owner->name }}
                                        <span class="ud-block ud-text-base ud-font-medium ud-text-body-color">
                                            Organizador
                                        </span>
                                    </h3>
                                </div>
                            </div>

                            {{--
                            <div class="ud-flex ud-items-center sm:ud-pl-8">
                                <div class="ud-mr-2 ud-w-full ud-max-w-[44px] ud-rounded-md ud-items-center ud-justify-center">
                                    <img src="https://bitkets.nyc3.digitaloceanspaces.com/brands/bag.png" alt="{{ $event->owner->name }}" class="ud-h-full ud-w-full ud-object-cover ud-object-center" />
                                </div>
                                <div class="ud-w-full">
                                    <h3 class="ud-text-base ud-font-semibold ud-text-white">

                                        <span class="ud-block ud-text-base ud-font-medium ud-text-body-color">
                                            Co-organizador
                                        </span>
                                    </h3>
                                </div>
                            </div>
                            --}}

                        </div>

                        <p class="ud-mb-9 ud-text-base ud-font-medium ud-leading-relaxed ud-text-body-color">
                            {{ $event->description }}
                        </p>

                        @livewire('buy-ticket', ['event' => $event, 'buyers' => $buyers])

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== Today's Picks Section End ==== -->
</x-app-layout>
