<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-panel class="flex flex-col items-center pt-16 pb-16">
        <x-application-logo class="block h-12 w-auto" />

        <div class="mt-8 text-2xl">
            Welcome to  <block><b class="uppercase">Child abuse monitoring Information System</b></block>
        </div>
        <div class="mt-8 text-sm font-bold">
            <a modal href="{{ route('cases.index') }}" class="text-white bg-blue-600 p-2 rounded">Create a case now</a>
        </div>

        <div class="mt-6">

        </div>
    </x-panel>
</x-app-layout>
