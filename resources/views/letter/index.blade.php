<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage letters') }}
            <br>
            @if(session('success'))
                <p class="text-green-600 dark:text-green-600 text-sm mt-2">
                    {{ __(session('success')) }}
                </p>
            @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            @foreach($letters as $letter)
                <a href="/letter/{{ $letter->id }}">
                    <div class="bg-white mt-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h1 class="text-xl mb-6"><strong>{{$letter->title}}</strong></h1>
                            <p class="mb-6">
                                @if(strlen($letter->content) > $lettersContentLimit)
                                    {{substr($letter->content, 0, $lettersContentLimit)}}...
                                @else
                                    {{$letter->content}}
                                @endif
                            </p>
                            <p class="text-xs">{{__('Delivery date')}}: {{$letter->delivery_date}}</p>
                        </div>
                    </div>
                </a>
            @endforeach

            <div class="mt-4">
                {{$letters->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
