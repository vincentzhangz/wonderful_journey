@extends('index')

@section('content')

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            @if (auth()->check())
                <h1 class="text-3xl my-3">Welcome, {{Auth::user()->name}}</h1>
            @endif

            <div class="flex flex-wrap -m-4">

                @foreach($articles as $a)
                    <div class="p-4 md:w-1/3">
                        <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                            <div class="p-6">
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{$a->title}}</h1>
                                <span>
                                    <p class="leading-relaxed mb-3 line-clamp-2">{{$a->description}}

                                    </p>
                                <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0"
                                   href="{{route('full',['id'=>$a->id])}}">full
                                    story</a>
                                </span>
                                <div class="flex items-center flex-wrap ">
                                    <i>Category :
                                        <a href="{{route('category',['id'=>$a->category_id])}}"
                                           class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">
                                            {{$a->category->name}}
                                        </a>
                                    </i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </section>
@endsection
