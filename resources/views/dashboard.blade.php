<x-full-screen-layout>
    {{--
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            !!{{ __('Dashboard') }}
        </h2>
    </x-slot>
    --}}

    <div class="w-full">
        @livewire('tools.notes-tool')
    </div>

    {{--
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
    --}}
</x-full-screen-layout>
