@extends('index')

@section('content')
    <div class="min-h-screen bg-gray-100 flex flex-col justify-center sm:py-12">
        <div class="p-10 xs:p-0 mx-auto md:w-full md:max-w-md">
            <div class="bg-white shadow w-full rounded-lg divide-y divide-gray-200">
                <div class="px-5 py-7">
                    <form action="{{url('/signup')}}" method="POST">
                        @csrf
                        <label class="font-semibold text-sm text-gray-600 pb-1 block">Name</label>
                        <input type="text" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" name="name"/>
                        <label class="font-semibold text-sm text-gray-600 pb-1 block">E-mail</label>
                        <input type="text" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" name="email"/>
                        <label class="font-semibold text-sm text-gray-600 pb-1 block">Phone</label>
                        <input type="text" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full" name="phone"/>
                        <label class="font-semibold text-sm text-gray-600 pb-1 block">Password</label>
                        <input type="password" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"
                               name="password"/>
                        <label class="font-semibold text-sm text-gray-600 pb-1 block">Confirm Password</label>
                        <input type="password" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full"
                               name="conf_password"/>
                        @if ($errors->any())
                            <div class="text-red-500">
                                {{$errors->first()}}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="text-green-500">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        <button type="submit"
                                class="transition duration-200 bg-gray-50 hover:bg-gray-200 focus:bg-blue-200 focus:shadow-sm text-black w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-semibold text-center inline-block border-2 border-gray-400  focus:outline-none focus:shadow-outline">
                            <span class="inline-block mr-2">Sign Up</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 class="w-4 h-4 inline-block">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
