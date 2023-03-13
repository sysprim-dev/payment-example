<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Login') }}
        </h2>
    </x-slot>

    <div class="py-12 px-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    <section>
                        <form method="post" action="{{ route('documentations.login.create') }}" class="mt-6 space-y-6">
                            @csrf
                            <div>
                                <x-input-label for="email" :value="__('Email')"/>
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                                              :value="old('email')" required autocomplete="username"/>
                                <x-input-error class="mt-2" :messages="$errors->get('email')"/>
                            </div>
                            <div>
                                <x-input-label for="password" :value="__('Password')"/>

                                <x-text-input id="password" class="block mt-1 w-full"
                                              type="password"
                                              name="password"
                                              required autocomplete="current-password"/>

                                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                            </div>
                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                    <section>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
