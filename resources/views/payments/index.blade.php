<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Payments_Index') }}
        </h2>
    </x-slot>

    <div class="py-12 px-3">
        <div class="sm:max-w-xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded-lg">
                <form method="get" action="{{ route('documentations.payments.index') }}" autocomplete="off"
                      class="mt-6 space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <div>
                            <x-input-label for="bearer_token" :value="__('bearer_token')"/>
                            <x-text-input id="bearer_token" name="bearer_token" type="text" class="mt-1 block w-full"
                                          :value="old('bearer_token')" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('bearer_token')"/>
                        </div>
                        <div>
                            <x-input-label for="company_token" :value="__('company_token')"/>
                            <x-text-input id="company_token" name="company_token" type="text" class="mt-1 block w-full"
                                          :value="old('company_token')" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('company_token')"/>
                        </div>
                    </div>
                    <div class="flex items-center justify-center">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if(!is_null($payments))
        <div class="py-2 px-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    {{__('Code')}}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{__('Status')}}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{__('ref')}}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{__('amount')}}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{__('created_at')}}
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$payment['code']}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{$payment['status']}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$payment['ref']}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$payment['amount']}} {{$payment['coin_id']}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$payment['created_at']}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
