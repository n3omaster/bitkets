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
                    <div class="ud-mb-12 ud-flex ud-w-full ud-items-center ud-justify-center ud-rounded-xl ud-border ud-border-stroke ud-bg-bg-color ud-py-8 sm:ud-py-14 md:ud-py-24 lg:ud-mb-0 lg:ud-py-16 xl:ud-py-28">
                        <img src="images/item-details/image-01.png" alt="details image" />
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
                                <div class="ud-mr-2 ud-h-11 ud-w-full ud-max-w-[44px] ud-rounded-md">
                                    <img src="images/picks/creator-01.png" alt="creator" class="ud-h-full ud-w-full ud-object-cover ud-object-center" />
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
                                <div class="ud-mr-2 ud-h-11 ud-w-full ud-max-w-[44px] ud-rounded-md">
                                    <img src="images/picks/creator-01.png" alt="creator" class="ud-h-full ud-w-full ud-object-cover ud-object-center" />
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

                        <div class="ud-mb-6 ud-flex ud-flex-wrap ud-items-center ud-justify-between ud-rounded-lg ud-border ud-border-stroke ud-bg-bg-color">
                            <div class="ud-w-full sm:ud-w-1/2">
                                <div class="ud-space-y-2 ud-border-stroke ud-p-6 sm:ud-border-r">
                                    <p class="ud-text-base ud-font-semibold ud-text-body-color">
                                        Lugar: <span class="ud-text-white">{{ $event->place }}</span>
                                    </p>
                                    <p class="ud-text-base ud-font-semibold ud-text-body-color">
                                        Tickets: <span class="ud-text-white"> + 100</span>
                                    </p>
                                    <p class="ud-text-base ud-font-semibold ud-text-body-color">
                                        Fecha:
                                        <span class="ud-text-white">{{ $event->start }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="ud-w-full sm:ud-w-1/2 sm:ud-text-center">
                                <div class="ud-space-y-3 ud-p-6">
                                    <p class="ud-text-base ud-font-semibold ud-text-body-color">
                                        Tickets:
                                        <span class="ud-text-white">$ {{ $event->price[0]->price }}</span>
                                    </p>
                                    <p class="ud-inline-flex ud-items-center ud-justify-center ud-rounded-md ud-bg-white ud-bg-opacity-10 ud-py-[10px] ud-px-8 ud-text-base ud-font-semibold ud-text-white">
                                        En {{ \Carbon\Carbon::parse($event->end)->diffInDays(\Carbon\Carbon::now()); }} días
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="ud-mb-8 ud-overflow-hidden ud-rounded-lg ud-border ud-border-stroke ud-bg-bg-color">
                            <div class="ud-flex ud-w-full ud-flex-wrap ud-items-center ud-border-b ud-border-stroke ud-px-1 ud-pb-4 ud-pt-1">
                                <div class="ud-px-[6px] ud-pt-3">
                                    <button class="ud-rounded-md ud-border ud-border-stroke ud-py-2 ud-px-5 ud-text-base ud-font-semibold ud-text-white hover:ud-border-primary hover:ud-bg-primary">
                                        Tickets
                                    </button>
                                </div>
                                <div class="ud-px-[6px] ud-pt-3">
                                    <button class="ud-rounded-md ud-border ud-border-stroke ud-py-2 ud-px-5 ud-text-base ud-font-semibold ud-text-white hover:ud-border-primary hover:ud-bg-primary">
                                        Detalles
                                    </button>
                                </div>
                            </div>

                            <div class="ud-py-2">
                                @forelse ($buyers as $buyer)
                                <div class="ud-flex ud-justify-between ud-py-[10px] ud-px-4 ud-transition hover:ud-bg-stroke">
                                    <div class="ud-flex ud-items-center">
                                        <div class="ud-mr-2 ud-h-10 ud-w-full ud-max-w-[40px] ud-rounded-md">
                                            <img src="images/picks/creator-01.png" alt="creator" class="ud-h-full ud-w-full ud-object-cover ud-object-center" />
                                        </div>
                                        <div class="ud-w-full">
                                            <h4 class="ud-text-sm ud-font-semibold ud-text-white">
                                                {{ $buyer->owner->name }}
                                                <span class="ud-block ud-text-sm ud-font-medium ud-text-body-color">
                                                </span>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="ud-text-right">
                                        <h5 class="ud-text-sm ud-font-semibold ud-text-white">
                                            4.75 ETH

                                            <span class="ud-block ud-text-sm ud-font-medium ud-text-body-color">
                                                = $12.246
                                            </span>
                                        </h5>
                                    </div>
                                </div>
                                @empty
                                @endforelse
                            </div>
                        </div>

                        <button class="ud-w-full ud-items-center ud-justify-center ud-rounded-md ud-bg-primary ud-p-[14px] ud-text-base ud-font-semibold ud-text-white hover:ud-bg-opacity-90">
                            Comprar Tickets
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== Today's Picks Section End ==== -->
</x-app-layout>
