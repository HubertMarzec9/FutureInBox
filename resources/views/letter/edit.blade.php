<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit letter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white mt-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{ route('letter.update', ['letter' => $letter->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Title -->
                        <div class="mt-4">
                            <x-input-label for="title" :value="__('Title')"/>

                            <x-text-input id="title" class="block mt-1 w-full"
                                          type="text"
                                          name="title"
                                          value="{{$letter->title  ?? old('title')}}"
                                          required autocomplete="new-title"/>

                            <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                        </div>

                        <!-- Content -->
                        <div class="mt-4">
                            <x-input-label for="content" :value="__('Content')"/>

                            <x-text-area id="content" class="block mt-1 w-full"
                                         name="content"
                                         :body="$letter->content ?? old('content')"
                                         required autocomplete="new-content"/>

                            <x-input-error :messages="$errors->get('content')" class="mt-2"/>
                        </div>

                        <!-- Delivery date -->
                        <div class="mt-4">
                            <x-input-label for="delivery_date" :value="__('Delivery date')"/>

                            <x-text-input id="delivery_date" class="block mt-1 w-full"
                                          type="date"
                                          name="delivery_date"
                                          value="{{$letter->delivery_date ?? old('delivery_date')}}"
                                          required autocomplete="new-delivery_date"/>

                            <x-input-error :messages="$errors->get('delivery_date')" class="mt-2"/>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
</x-app-layout>

