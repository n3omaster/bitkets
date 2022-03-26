<div>
    @if ($show_buy_form == true)
    <form wire:submit.prevent="buy">

        <div class="ud-mb-5">
            <label for="name" class="ud-mb-2 ud-block ud-text-base ud-font-medium ud-text-white">
                Nombre
            </label>
            <input wire:model.defer="name" type="text" name="name" id="name" placeholder="Teclee su nombre" value="{{ old('name') }}" class="ud-w-full ud-rounded-md ud-border ud-border-stroke ud-bg-[#353444] ud-py-3 ud-px-6 ud-text-base ud-font-medium ud-text-body-color ud-outline-none ud-transition-all focus:ud-bg-[#454457] focus:ud-shadow-input" />
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="ud-mb-5">
            <label for="email" class="ud-mb-2 ud-block ud-text-base ud-font-medium ud-text-white">
                Correo
            </label>
            <input wire:model.defer="email" type="email" name="email" id="email" placeholder="Teclee su correo" value="{{ old('email') }}" class="ud-w-full ud-rounded-md ud-border ud-border-stroke ud-bg-[#353444] ud-py-3 ud-px-6 ud-text-base ud-font-medium ud-text-body-color ud-outline-none ud-transition-all focus:ud-bg-[#454457] focus:ud-shadow-input" />
            @error('email') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="ud-mb-5">
            <label for="email" class="ud-mb-2 ud-block ud-text-base ud-font-medium ud-text-white">
                Código de promoción
            </label>
            <input wire:model.defer="promo_code" type="text" name="promo_code" id="promo_code" placeholder="Código de promoción" value="{{ old('promo_code') }}" class="ud-w-full ud-rounded-md ud-border ud-border-stroke ud-bg-[#353444] ud-py-3 ud-px-6 ud-text-base ud-font-medium ud-text-body-color ud-outline-none ud-transition-all focus:ud-bg-[#454457] focus:ud-shadow-input" />
            @error('promo_code') <span class="error">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="ud-w-full ud-items-center ud-justify-center ud-rounded-md ud-bg-primary ud-p-[14px] ud-text-base ud-font-semibold ud-text-white hover:ud-bg-opacity-90">Comprar</button>
    </form>
    @elseif ($show_qr == true)
    <div class="ud-flex ud-flex-col">
        {!! $qr !!}
    </div>
    @elseif($completed == true)
    <div class="ud-flex ud-flex-col">
        <div class="ud-w-full">
            <div class="ud-h-full ud-bg-gray-100 ud-p-8 ud-rounded">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="ud-block ud-w-5 ud-h-5 ud-text-gray-400 ud-mb-4" viewBox="0 0 975.036 975.036">
                    <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
                </svg>
                <p class="ud-leading-relaxed ud-mb-6">Estamos más que encantados de poder contar con su participación en nuestro evento.</p>
                <p class="ud-leading-relaxed ud-mb-6">Su ticket de participación:</p>
                <h1 class="ud-font-bold ud-text-3xl ud-text-center">{{ $ticket }}</h1>
                <a class="ud-inline-flex ud-items-center">
                    <img alt="{{ $event->owner->name }}" src="{{ $event->owner->profile_photo_url }}" class="ud-w-12 ud-flex-shrink-0 ud-object-cover ud-object-center">
                    <span class="ud-flex-grow ud-flex ud-flex-col ud-pl-4">
                        <span class="ud-title-font ud-font-medium ud-text-gray-900">{{ $event->owner->name }}</span>
                        <span class="ud-text-gray-500 ud-text-sm">Organizador</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
    @else
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
                    <div class="ud-mr-2 ud-w-full ud-max-w-[40px] ud-rounded-md ud-items-center ud-justify-center">
                        <img src="{{ $event->owner->profile_photo_url }}" alt="{{ $event->owner->name }}" class="ud-h-full ud-w-full ud-object-cover ud-object-center ud-rounded" />
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
                        {{ $buyer->ticket->event->name }}
                        <span class="ud-block ud-text-sm ud-font-medium ud-text-body-color">
                            $ {{ $buyer->ticket->price }}
                        </span>
                    </h5>
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
    <button wire:click="show_buy_form" class="ud-w-full ud-items-center ud-justify-center ud-rounded-md ud-bg-primary ud-p-[14px] ud-text-base ud-font-semibold ud-text-white hover:ud-bg-opacity-90">
        Comprar Tickets
    </button>
    @endif
</div>
