<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Report') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg shadow-md">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto relative  sm:rounded-lg">
                        <div class="flex justify-between items-center pb-4 bg-white ">
                            <x-splade-modal>
                                <form action="{{route('report.update',$id)}}" method="post">
                                    @method('put')
                                    @csrf
                                    {{--create a select options for severity column--}}

                                    {{--create a select options for status column--}}
                                    <div class="flex flex-col">
                                        <label for="reportStatus" class="pb-2">Severity: </label>
                                        <select name="reportStatus" id="reportStatus" class="border rounded-md">
                                            @foreach($severity as $sev)
                                                <option {{$sev === $report->reportStatus ? 'selected' : ''}} value="{{$sev}}">{{$sev}}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                    {{--Create a good looking textaraea using tailwindcss--}}
                                    <div class="flex flex-col">
                                        <label for="reportDescription" class="pb-2">Description: </label>
                                        <textarea name="reportDescription" id="reportDescription" cols="30" rows="10" class="border rounded-md">{{$report->reportDescription}}</textarea>
                                    </div>

{{--                                    submit button--}}
                                    <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Save Change</button>

                                </form>
                            </x-splade-modal>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
</x-app-layout>
