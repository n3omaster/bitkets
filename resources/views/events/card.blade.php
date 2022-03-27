<div class="ud-w-full ud-px-4 md:ud-w-1/2 lg:ud-w-1/3 2xl:ud-w-1/4">
    <div class="ud-mb-10 ud-rounded-xl ud-border ud-border-stroke ud-bg-bg-color ud-p-[18px]">
        <div class="ud-relative ud-mb-5 ud-overflow-hidden ud-rounded-lg">
            <a href="{{ route('events.show', ['event' => $event]) }}">
                <img src="{{ $event->main_logo }}" alt="{{ $event->media[0]->name }}" class="ud-w-full" />
            </a>
            <button class="ud-absolute ud-right-4 ud-top-4 ud-inline-flex ud-items-center ud-rounded-md ud-bg-white ud-px-2 ud-py-1">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.99999 11.8709L6.15416 11.1009C3.14999 8.37675 1.16666 6.57425 1.16666 4.37508C1.16666 2.57258 2.57832 1.16675 4.37499 1.16675C5.38999 1.16675 6.36416 1.63925 6.99999 2.38008C7.63582 1.63925 8.60999 1.16675 9.62499 1.16675C11.4217 1.16675 12.8333 2.57258 12.8333 4.37508C12.8333 6.57425 10.85 8.37675 7.84582 11.1009L6.99999 11.8709Z" fill="#F85486" />
                </svg>
                <span class="ud-pl-1 ud-text-xs ud-font-semibold ud-text-black">
                    4.6K
                </span>
            </button>
        </div>
        <div>
            <h3>
                <a href="{{ route('events.show', ['event' => $event]) }}" class="ud-mb-3 ud-inline-block ud-text-lg ud-font-semibold ud-text-white hover:ud-text-primary">
                    {{ $event->name }}
                </a>
            </h3>
            <div class="ud-mb-5 ud-flex ud-items-center ud-justify-between">
                <div class="ud-w-full">
                    <div class="ud-flex ud-items-center">
                        <div class="ud-mr-2 ud-w-full ud-max-w-[32px] ud-rounded-md ud-items-center ud-justify-center">
                            <img src="https://bitkets.nyc3.digitaloceanspaces.com/brands/vistar.png" alt="creator" class="ud-h-full ud-w-full ud-object-cover ud-object-center" />
                        </div>
                        <div class="ud-w-full">
                            <h4 class="ud-text-xs ud-font-semibold ud-text-white">
                                {{ $event->owner->name }}
                                <span class="ud-block ud-text-xs ud-font-medium ud-text-body-color">
                                    Organizador
                                </span>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="ud-w-full">
                    <h5 class="ud-text-right ud-text-xs ud-font-semibold ud-text-white">
                        $ {{ $event->price[0]->price }} ⚡️
                        <span class="ud-block ud-text-xs ud-font-medium ud-text-body-color">
                            Tickets
                        </span>
                    </h5>
                </div>
            </div>
            <div class="ud-flex ud-items-center ud-justify-center ud-rounded-md ud-bg-white ud-bg-opacity-10 ud-p-[10px] ud-text-base ud-font-semibold ud-text-white">
                <a href="{{ route('events.show', ['event' => $event]) }}">
                    En {{ \Carbon\Carbon::parse($event->end)->diffInDays(\Carbon\Carbon::now()); }} días
                </a>
            </div>
        </div>
    </div>
</div>
