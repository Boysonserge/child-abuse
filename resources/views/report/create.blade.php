<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My cases') }}
        </h2>
    </x-slot>

    <x-panel>
        <x-splade-modal>


            <x-splade-form action="{{route('cases.store')}}" method="POST">


                <div class="mb-6">
                    <x-form.label for="caseSummary" :title="__('caseSummary')"></x-form.label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " v-model="form.caseSummary" type="text" />
                </div>
                <div class="mb-6">
                    <x-form.label for="caseDescription" :title="__('caseDescription')"></x-form.label>
                    <textarea class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " v-model="form.caseDescription" type="text" />

                </div>
                <div class="mb-6">
                    <x-form.label for="caseDate" :title="__('caseDate')"></x-form.label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " v-model="form.caseDate" type="date" />
                </div>
                <div class="mb-6">
                    <x-form.label for="caseLocation" :title="__('caseLocation')"></x-form.label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " v-model="form.caseLocation" type="text" />
                </div>



                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>


            </x-splade-form>
        </x-splade-modal>
    </x-panel>
</x-app-layout>


