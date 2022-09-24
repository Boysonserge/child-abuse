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
                            <div>

                                    @if(auth()->user()->hasRole('victim') )


                                <Link modal href="{{ route('cases.create') }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">+ New case</Link>
                                    @endif


                            </div>
                            <label for="table-search" class="sr-only">Search</label>
                            {{--<div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                                </div>
                                <input type="text" id="table-search-users" class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Search for users">
                            </div>--}}
                        </div>






                        <table class="w-full text-sm text-left text-gray-500 ">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    User info
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Case
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Rib Status
                                </th>

                                <th scope="col" class="py-3 px-6">
                                    Isange Status
                                </th>

                                <th scope="col" class="py-3 px-6">
                                    Reported since
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($cases as $case=>$value)

                                <tr class="bg-white border-b  hover:bg-gray-50 ">
                                    <th scope="row" class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap ">
                                        <div class="pl-3">
                                            <div class="text-base font-semibold">{{$value->users->name}}</div>
                                            <div class="font-normal text-gray-500">{{$value->users->email }}</div>
                                        </div>
                                    </th>
                                    <td class="py-4 px-6">
                                        {{$value->caseSummary}}
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <x-badge color="{{$value->ribStatus === 'rejected' ? 'red' : 'blue'}}" value="{{$value->ribStatus}}"></x-badge>
                                        </div>
                                    </td>

                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <x-badge color="blue" value="{{$value->isangeStatus}}"></x-badge>
                                        </div>
                                    </td>



                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <x-badge color="yellow" value="{{\Carbon\Carbon::make($value->created_at)->diffForHumans()}}"></x-badge>
                                        </div>
                                    </td>


                                    @role('isange')
                                    @if($value->isangeStatus == 'Reported')
                                        <div class="flex items-center">
                                            <Link modal href="{{route('cases.report',$value->id)}}" class="text-white bg-green-700 hover:bg-green-800 focus:ring-2 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">View report</Link>
                                        </div>
                                    @else
                                        <td class="py-4 px-6">
                                            <div class="flex items-center">
                                                <Link modal href="{{route('cases.report',$value->id)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create report</Link>
                                            </div>
                                        </td>
                                    @endif
                                    @endrole

                                    @role('rib')
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <Link slideover  href="{{ route('cases.edit',$value->id) }}">View case</Link>
                                            {{--                                            <x-button link="{{ route('cases.show',$value->id) }}" value="View case" color="green"></x-button>--}}
                                        </div>
                                    </td>
                                    @endrole
                                </tr>
                            @empty
                                <tr class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap ">
                                    <td scope="row" class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap " colspan="4">
                                        No cases yet
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{$cases->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />

</x-app-layout>
