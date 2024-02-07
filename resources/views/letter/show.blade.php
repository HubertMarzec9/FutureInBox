<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Letter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white mt-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-xl mb-6"><strong>{{$letter->title}}</strong></h1>
                    <p class="mb-6">
                        {{$letter->content}}
                    </p>
                    <p class="text-xs">{{__('Delivery date')}}: {{$letter->delivery_date}}</p>

                    <div class="flex items-center justify-end mt-4">
                        <form action="{{ route('letter.destroy', ['letter' => $letter->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-primary-button class="ms-4">
                                {{ __('Delete') }}
                            </x-primary-button>
                        </form>

                        <a href="{{ route('letter.edit', ['letter' => $letter->id]) }}">
                            <x-primary-button class="ms-4">
                                {{ __('Edit') }}
                            </x-primary-button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
