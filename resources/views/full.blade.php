@extends('index')

@section('content')
    <div class="container mx-auto">

        <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
            <div class="rounded-lg h-64 overflow-hidden">
                <img alt="image" class="object-cover object-center h-full w-full"
                     src="{{$article->image}}" onerror="this.onerror=null;this.src='https://dummyimage.com/1204x504';">
            </div>
            <div>
                <h2 class="text-xl font-medium title-font text-gray-900 mt-5">{{$article->title}}</h2>
                <p class="text-base leading-relaxed mt-2">{{$article->description}}</p>
            </div>
            <div class="mt-2.5">
                <a class="bg-gray-50 hover:bg-gray-200 text-blue-400 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline border-1"
                   href="{{ url()->previous() }}">
                    Back
                </a>
            </div>
        </div>
    </div>
@endsection
