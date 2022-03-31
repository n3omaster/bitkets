<x-app-layout>
    <x-slot name="header">
        <h2 class="ud-font-semibold ud-text-xl ud-text-gray-800 ud-leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="ud-py-12 ud-mt-24">
        <div class="ud-max-w-7xl ud-mx-auto sm:px-6 lg:px-8">
            <div class="ud-overflow-hidden ud-shadow-xl sm:rounded-lg">

                <div class="ud-flex ud-flex-col">
                    <div class="ud-overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="ud-py-2 ud-inline-block ud-min-w-full sm:px-6 lg:px-8">
                            <div class="ud-overflow-hidden">
                                <table class="ud-min-w-full">
                                    <thead class="ud-border-b">
                                        <tr>
                                            <th scope="col" class="ud-text-sm ud-font-medium ud-text-white ud-px-6 ud-py-4 ud-text-center">
                                                #
                                            </th>
                                            <th scope="col" class="ud-text-sm ud-font-medium ud-text-white ud-px-6 ud-py-4 ud-text-left">
                                                Nombre
                                            </th>
                                            <th scope="col" class="ud-text-sm ud-font-medium ud-text-white ud-px-6 ud-py-4 ud-text-left">
                                                Email
                                            </th>
                                            <th scope="col" class="ud-text-sm ud-font-medium ud-text-white ud-px-6 ud-py-4 ud-text-left">
                                                Código
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($tickets as $ticket)
                                        <tr class="border-b">
                                            <td class="ud-px-6 ud-py-4 ud-whitespace-nowrap ud-text-sm ud-font-medium ud-text-white ud-text-center">{{ $loop->index + 1 }}</td>
                                            <td class="ud-text-sm ud-text-white ud-font-light ud-px-6 ud-py-4 ud-whitespace-nowrap">
                                                {{ $ticket->owner->name }}
                                            </td>
                                            <td class="ud-text-sm ud-text-white ud-font-light ud-text-center ud-px-6 ud-py-4 ud-whitespace-nowrap">
                                                {{ $ticket->owner->email }}
                                            </td>
                                            <td class="ud-text-sm ud-text-white ud-font-light ud-text-center ud-px-6 ud-py-4 ud-whitespace-nowrap">
                                                {{ $ticket->confirmation }}
                                            </td>
                                        </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
