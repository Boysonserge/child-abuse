<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My cases') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg shadow-md">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto relative  sm:rounded-lg">
                        <div class="flex justify-between items-center pb-4 bg-white ">
                            <x-splade-modal>

                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><b>TITLE OF THE CASE :</b>{{$case->caseSummary}}</p>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><b>REPORTED BY:</b>{{$case->users->name}}</p>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><b>REPORTED ON: </b>{{\Carbon\Carbon::make($case->created_at)->format('dS Y F')}}</p>

                                <p><h3>Description: <b><small>{{$case->caseDescription}}</small></b> </h3> </p>

                                @if($case->photo)
                                    <img class="w-100 h-100 " src="photos/{{$case->photo}}" alt="">
                                @else
                                    <p>No photo added</p>

                                @endif


                            </x-splade-modal>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />

</x-app-layout>
