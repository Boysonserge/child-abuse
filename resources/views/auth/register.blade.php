<x-guest-layout>
    <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" />

        <x-splade-form action="{{ route('register') }}" class="space-y-4">
            <x-splade-input id="name" type="text" name="name" :label="__('Names')"  autofocus />
            <x-splade-input id="email" type="email" name="email" :label="__('Email')"  />
            <x-splade-input id="phone" type="text" name="phone" :label="__('Phone')"  />
            <x-splade-input id="idNumber" type="text" name="idNumber" :label="__('Id number')" />

            <x-splade-input id="password" type="password" name="password" :label="__('Password')"  autocomplete="new-password" />
            <x-splade-input id="password_confirmation" type="password" name="password_confirmation" :label="__('Confirm Password')"  />

            <div class="flex items-center justify-end">
                <Link class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </Link>

                <x-splade-submit class="ml-4" :label="__('Register')" />
            </div>
        </x-splade-form>
    </x-auth-card>
</x-guest-layout>
