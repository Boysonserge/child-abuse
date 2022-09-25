<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My users') }}
        </h2>
    </x-slot>

    <x-panel>
        <x-splade-modal>


            <x-splade-form action="{{route('users.store')}}" method="POST">

                <div class="mb-6">
                    <x-form.label for="name" :title="__('name')"></x-form.label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " v-model="form.name" type="text" />
                </div>
                <div class="mb-6">
                    <x-form.label for="email" :title="__('email')"></x-form.label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " v-model="form.email" type="email" />



                </div>
                <div class="mb-6">
                    <x-form.label for="idNumber" :title="__('idNumber')"></x-form.label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " v-model="form.idNumber" type="number" />
                </div>

                <div class="mb-6">
                    <x-form.label for="Phone" :title="__('Phone')"></x-form.label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " v-model="form.phone" type="text" />
                </div>




                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>


            </x-splade-form>
        </x-splade-modal>
    </x-panel>
</x-app-layout>


