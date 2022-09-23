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


                            <form method="post" action="{{route('profile.update')}}">
                                @csrf



                                <div class="text-red-400">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>
                                                        {{$error}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>

                                {{session('error')}}

                                <div class="mb-6">
                                    <label for="">Name</label>

                                    <input name="name" value="{{$user->name}}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" type="text" />
                                </div>

                                <div class="mb-6">
                                    <label for="">Email</label>

                                    <input name="email" value="{{$user->email}}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" type="text" />
                                </div>

                                <div class="mb-6">
                                    <label for="">Phone</label>

                                    <input name="phone" value="{{$user->phone}}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" type="text" />
                                </div>


                                <div class="mb-6">
                                    <label for="">Id number</label>
                                    <input name="idNumber" value="{{$user->idNumber}}" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" type="number" />
                                </div>

                                <div class="mb-6">
                                    <label for="">Password</label>

                                    <input name="password" value="" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" type="password" />
                                </div>

                                <div class="mb-6">
                                    <label for="">Password confirmation</label>

                                    <input name="password_confirmation" value="" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" type="password" />
                                </div>

                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Save changes</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />

</x-app-layout>
