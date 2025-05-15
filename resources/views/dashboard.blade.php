<x-app-layout>
    <x-slot name="header">
        <x-header>
            {{__('Vote for a question')}}
        </x-header>
    </x-slot>

    <x-container>
        {{-- listagem --}}
        <div class="dark:text-gray-400 space-y-4">
            <form action="{{route('dashboard')}}" method="get" class="flex items-center space-x-2">
                @csrf
                <x-text-input type="text" name="search" value="{{ request()->search }}" class="w-full" placeholder="Search for a question..."/>
                <x-btn.primary type="submit">Search</x-btn.primary>
            </form>

            @if($questions->isEmpty())
                <div class="dark-text-gray-300 text-center flex justify-center">
                    <x-draw.searching class="w-80 h-80"/>

                </div>
            @else
                @foreach($questions as $item)
                    <x-question :question="$item"/>
                @endforeach
                    {{ $questions->withQueryString()->links() }}
            @endif

        </div>
    </x-container>
</x-app-layout>
