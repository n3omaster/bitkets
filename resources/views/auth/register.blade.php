<x-app-layout>
    <section class="ud-relative ud-z-10 ud-overflow-hidden ud-bg-cover ud-bg-top ud-bg-no-repeat ud-pt-[150px] ud-pb-24">

        <div class="ud-absolute ud-left-0 ud-top-0 ud--z-10 ud-h-full ud-w-full" style="background: linear-gradient(180deg,rgba(20, 20, 32, 0.65) 0%,#141420 100%);"></div>
        <div class="ud-container">

            <x-jet-validation-errors class="mb-4" />

            <div class="ud-mx-auto ud-max-w-[500px] ud-rounded-lg ud-border ud-border-stroke ud-bg-bg-color">

                <div class="ud-border-b ud-border-stroke ud-py-10 ud-px-8 sm:ud-p-[60px]">

                    <h1 class="ud-mb-2 ud-text-center ud-text-3xl ud-font-bold ud-text-white">
                        Registro en {{ config('app.name') }}
                    </h1>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="ud-mb-5">
                            <label for="email" class="ud-mb-2 ud-block ud-text-base ud-font-medium ud-text-white">
                                Correo
                            </label>
                            <input type="email" name="email" id="email" placeholder="Teclee su correo" value="{{ old('email') }}" class="ud-w-full ud-rounded-md ud-border ud-border-stroke ud-bg-[#353444] ud-py-3 ud-px-6 ud-text-base ud-font-medium ud-text-body-color ud-outline-none ud-transition-all focus:ud-bg-[#454457] focus:ud-shadow-input" />
                        </div>
                        <div class="ud-mb-5">
                            <label for="name" class="ud-mb-2 ud-block ud-text-base ud-font-medium ud-text-white">
                                Nombre
                            </label>
                            <input type="text" name="name" id="name" placeholder="Teclee su nombre" value="{{ old('name') }}" class="ud-w-full ud-rounded-md ud-border ud-border-stroke ud-bg-[#353444] ud-py-3 ud-px-6 ud-text-base ud-font-medium ud-text-body-color ud-outline-none ud-transition-all focus:ud-bg-[#454457] focus:ud-shadow-input" />
                        </div>
                        <div class="ud-mb-5">
                            <label for="password" class="ud-mb-2 ud-block ud-text-base ud-font-medium ud-text-white">
                                Contraseña
                            </label>
                            <input type="password" name="password" id="password" placeholder="Teclee su contraseña" autocomplete="new-password" class="ud-w-full ud-rounded-md ud-border ud-border-stroke ud-bg-[#353444] ud-py-3 ud-px-6 ud-text-base ud-font-medium ud-text-body-color ud-outline-none ud-transition-all focus:ud-bg-[#454457] focus:ud-shadow-input" />
                        </div>
                        <div class="ud-mb-5">
                            <label for="password_confirmation" class="ud-mb-2 ud-block ud-text-base ud-font-medium ud-text-white">
                                Confirmar contraseña
                            </label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirme su contraseña" autocomplete="new-password" class="ud-w-full ud-rounded-md ud-border ud-border-stroke ud-bg-[#353444] ud-py-3 ud-px-6 ud-text-base ud-font-medium ud-text-body-color ud-outline-none ud-transition-all focus:ud-bg-[#454457] focus:ud-shadow-input" />
                        </div>

                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-jet-label for="terms">
                                <div class="flex items-center">
                                    <x-jet-checkbox name="terms" id="terms" />

                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-jet-label>
                        </div>
                        @endif

                        <button type="submit" class="ud-flex ud-w-full ud-items-center ud-justify-center ud-rounded-md ud-bg-primary ud-p-3 ud-text-base ud-font-semibold ud-text-white hover:ud-bg-opacity-90">
                            Registrame
                        </button>
                    </form>
                </div>

                <p class="ud-p-6 ud-text-center ud-text-base ud-font-medium ud-text-body-color">
                    ¿Ya tienes una cuenta?
                    <a href="{{ route('login') }}" class="ud-text-white hover:ud-text-primary">
                        Acceder
                    </a>
                </p>
            </div>
        </div>
    </section>
</x-app-layout>
