<div style="background:#d9d9d9;min-height: 300px;display: flex;flex-direction: column;justify-content: center">
    <div align="center" style="font-size: 50px;text-align:center;vertical-align:center">Wonderful Journey</div>
    <div align="center">Blog of Indonesia Tourism</div>
</div>
<nav class="bg-gray-900">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <a href="/"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        @if (!auth()->check())
                            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                                <button @click="open = !open"
                                        class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium focus:outline-none focus:shadow-outline">
                                    <span>Category</span>
                                    <svg fill="currentColor" viewBox="0 0 20 20"
                                         :class="{'rotate-180': open, 'rotate-0': !open}"
                                         class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                                        <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                     x-transition:enter-start="transform opacity-0 scale-95"
                                     x-transition:enter-end="transform opacity-100 scale-100"
                                     x-transition:leave="transition ease-in duration-75"
                                     x-transition:leave-start="transform opacity-100 scale-100"
                                     x-transition:leave-end="transform opacity-0 scale-95"
                                     class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                                    <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                                        @foreach($categories as $c)
                                            <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                               href="{{route('category',['id'=>$c->id])}}">{{$c->name}}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('about')}}"
                               class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">About
                                Us</a>
                        @endif
                        @if (auth()->check())
                            @if(Auth::user()->role == 'user')
                                <a href="{{route('profile')}}"
                                   class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Profile</a>
                                <a href="{{route('blogByUser',['id'=>Auth::user()->id])}}"
                                   class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Blog</a>
                            @endif
                            @if(Auth::user()->role == 'admin')
                                <a href="{{route('admin')}}"
                                   class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Admin</a>
                                <a href="{{route('user')}}"
                                   class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">User</a>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            @if (!auth()->check())
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="flex space-x-4">
                        <a href="{{route('signup')}}"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Sign
                            Up</a>
                        <a href="{{route('login')}}"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>
                    </div>
                </div>
            @endif
            @if (auth()->check())
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="flex space-x-4">
                        <a href="{{route('logout')}}"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Logout</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</nav>
