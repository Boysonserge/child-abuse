<x-layout>
    <x-slot name="header">
        {{ __('Home') }}
    </x-slot>

    <x-panel class="flex flex-col items-center pt-16 pb-16">
        <x-application-logo class="block h-12 w-auto" />

        <div class="mt-8 text-2xl">
            Welcome to  Splade application!!
        </div>

        <div class="mt-6">
            <Link class="text-gray-200 bg-blue-600 p-3" modal href="{{ route('docs') }}">Go to </Link>
        </div>
    </x-panel>
</x-layout>
