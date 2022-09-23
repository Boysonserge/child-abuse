<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg shadow-md">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto relative  sm:rounded-lg">
                        <div class=" pb-4 bg-white ">

                            <form method="put" action="{{route('profile.edit',auth()->user()->id)}}">
                                {{$user->name}}
                                <x-form.input type="text" name="name" label="Name" value="{{ $user->name }}" />
                                <input type="submit" value="Save">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />

</x-app-layout>
