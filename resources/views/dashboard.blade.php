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


        @role('rib')
        <img width="100" src="https://pbs.twimg.com/profile_images/986436725101735937/NF7naQNc_400x400.jpg" alt="">
        @else
            <div class="mt-8 text-sm font-bold">
                <a modal href="cases/create" class="text-white bg-blue-600 p-2 rounded">Create a case now</a>
            </div>
        @endrole

        <div class="mt-6">

        </div>
    </x-panel>
</x-app-layout>
