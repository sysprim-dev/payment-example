<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Invoices_Create') }}
        </h2>
    </x-slot>

    <div class="py-12 px-3">
        <div class="sm:max-w-xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow rounded-lg">
                <form method="post" action="{{ route('documentations.invoices.store') }}" autocomplete="off"
                      class="space-y-6">
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
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <div>
                            <x-input-label for="ref_transaction" :value="__('ref_transaction')"/>
                            <x-text-input id="ref_transaction" name="ref_transaction" type="text"
                                          class="mt-1 block w-full"
                                          :value="old('ref_transaction')" required/>
                            <x-input-error :messages="$errors->get('ref_transaction')"/>
                        </div>
                        <div>
                            <x-input-label for="customer_document" :value="__('customer_document')"/>
                            <x-text-input id="customer_document" name="customer_document" type="text"
                                          class="mt-1 block w-full"
                                          :value="old('customer_document')" placeholder="v123456789" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('customer_document')"/>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <div>
                            <x-input-label for="customer_name" :value="__('customer_name')"/>
                            <x-text-input id="customer_name" name="customer_name" type="text" class="mt-1 block w-full"
                                          :value="old('customer_name')" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('customer_name')"/>
                        </div>
                        <div>
                            <x-input-label for="customer_last_name" :value="__('customer_last_name')"/>
                            <x-text-input id="customer_last_name" name="customer_last_name" type="text"
                                          class="mt-1 block w-full"
                                          :value="old('customer_last_name')" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('customer_last_name')"/>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <div>
                            <x-input-label for="customer_email" :value="__('customer_email')"/>
                            <x-text-input id="customer_email" name="customer_email" type="email"
                                          class="mt-1 block w-full"
                                          :value="old('customer_email')" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('customer_email')"/>
                        </div>
                        <div>
                            <x-input-label for="customer_phone" :value="__('customer_phone')"/>
                            <x-text-input id="customer_phone" name="customer_phone" type="text"
                                          class="mt-1 block w-full"
                                          :value="old('customer_phone')" placeholder="+584161234567" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('customer_phone')"/>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <div>
                            <x-input-label for="customer_address" :value="__('customer address')"/>
                            <x-text-input id="customer_address" name="customer_address" type="text"
                                          class="mt-1 block w-full"
                                          :value="old('customer_address')" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('customer_address')"/>
                        </div>
                        <div>
                            <x-input-label for="description" :value="__('descripcion')"/>
                            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full"
                                          :value="old('description')" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('description')"/>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <div>
                            <x-input-label for="start_at" :value="__('start_at')"/>
                            <x-text-input id="start_at" name="start_at" type="text" class="mt-1 block w-full"
                                          :value="old('start_at')" placeholder="2023-03-14 02:00:00" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('start_at')"/>
                        </div>
                        <div>
                            <x-input-label for="expired_at" :value="__('expired_at')"/>
                            <x-text-input id="expired_at" name="expired_at" type="text" class="mt-1 block w-full"
                                          :value="old('expired_at')" placeholder="2023-03-14 12:00:00" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('expired_at')"/>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <div>
                            <x-input-label for="coin" :value="__('coin')"/>
                            <x-text-input id="coin" name="coin" type="text" class="mt-1 block w-full"
                                          :value="old('coin')" placeholder="ves" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('coin')"/>
                        </div>
                        <div>
                            <x-input-label for="amount" :value="__('amount')"/>
                            <x-text-input id="amount" name="amount" type="text" class="mt-1 block w-full"
                                          :value="old('amount')" placeholder="12.50" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('amount')"/>
                        </div>
                    </div>
                    <div class="border-b-2 border-gray-500">
                        <x-input-label value="{{__('Detail')}}"/>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <div>
                            <x-input-label for="code" :value="__('code')"/>
                            <x-text-input id="code" name="code" type="text" class="mt-1 block w-full"
                                          :value="old('code')" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('code')"/>
                        </div>
                        <div>
                            <x-input-label for="description_item" :value="__('description_item')"/>
                            <x-text-input id="description_item" name="description_item" type="text" class="mt-1 block w-full"
                                          :value="old('description_item')" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('description_item')"/>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <div>
                            <x-input-label for="base" :value="__('base')"/>
                            <x-text-input id="base" name="base" type="text" class="mt-1 block w-full"
                                          :value="old('base')" placeholder="10.25" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('base')"/>
                        </div>
                        <div>
                            <x-input-label for="coin_item" :value="__('coin_item')"/>
                            <x-text-input id="coin_item" name="coin_item" type="text" class="mt-1 block w-full"
                                          :value="old('coin_item')" placeholder="ves" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('coin_item')"/>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <div>
                            <x-input-label for="quantity" :value="__('quantity')"/>
                            <x-text-input id="quantity" name="quantity" type="number" class="mt-1 block w-full"
                                          :value="old('quantity')" placeholder="3" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('quantity')"/>
                        </div>
                        <div>
                            <x-input-label for="recharge" :value="__('recharge')"/>
                            <x-text-input id="recharge" name="recharge" type="text" class="mt-1 block w-full"
                                          :value="old('recharge')" placeholder="12.50" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('recharge')"/>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <div>
                            <x-input-label for="discount" :value="__('discount')"/>
                            <x-text-input id="discount" name="discount" placeholder="0" type="text" class="mt-1 block w-full"
                                          :value="old('discount')" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('discount')"/>
                        </div>
                        <div>
                            <x-input-label for="amount_item" :value="__('amount_item')"/>
                            <x-text-input id="amount_item" name="amount_item" type="text" class="mt-1 block w-full"
                                          :value="old('amount_item')" placeholder="12.50" required/>
                            <x-input-error class="mt-2" :messages="$errors->get('amount_item')"/>
                        </div>
                    </div>
                    <div class="flex items-center justify-center">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
