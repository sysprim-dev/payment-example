<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Logout') }}
        </h2>
    </x-slot>

    <div class="py-12 px-3">
        <div class="sm:max-w-md mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded-lg">
                <form method="get" action="{{ route('documentations.login.logout') }}" autocomplete="off"
                      class="mt-6 space-y-6">
                    @csrf
                    <div>
                        <x-input-label for="bearer_token" :value="__('bearer_token')"/>
                        <x-text-input id="bearer_token" name="bearer_token" type="text" class="mt-1 block w-full"
                                      :value="old('name')" required autofocus autocomplete="off"/>
                        <x-input-error class="mt-2" :messages="$errors->get('bearer_token')"/>
                    </div>
                    <div class="flex items-center justify-center">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
