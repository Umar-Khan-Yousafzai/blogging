<header class="">
    <div class="container">
        <div class="logo">
            <a href="{{ route('home') }}">

                <img width="200" height="90" src="{{ asset('assets/logo.png') }}" alt="logo">
            </a>
        </div>
        <div class="nav-bar">
            <nav>
                <input type="checkbox" id="click">
                <label for="click" class="menu-btn">
                    <img src="{{ asset('assets/frontend/menu.svg') }}" alt="Kiwi standing on oval">
                </label>
                <ul>
                    <li>
                        <a href="{{ route('home') }}" class="px-4 py-2 font-bold text-white active">Home</a>
                    </li>
                    @php
                        $categories = navbarCategories();
                    @endphp
                    <!-- Category Drop Down -->
                    <li class="hidden md:block">
                        <div class="relative z-50 inline-block dropdown">
                            <a class="inline-flex items-center px-4 py-2 font-bold text-white z ">
                                Categories
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </a>
                            <div class="absolute z-50 hidden dropdown-menu">
                                @foreach ($categories as $category)
                                    <a class="block px-4 py-2 font-bold bg-black" style="color: white !important"
                                        href="{{ route('category.page', ['key' => $category->key]) }}">{{ $category->category }}</a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li>
                        <a class="px-4 py-2 font-bold text-white" href="{{ route('contact-us') }}">Contact</a>
                    </li>
                    @php
                        $auth = Auth::user();

                    @endphp
                    @if (isset($auth))
                        <li>
                            <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 font-bold text-white">
                                Profile
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('author.login') }}" class="px-4 py-2 font-bold text-white">
                                Login
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('author.register') }}" class="px-4 py-2 font-bold text-white">
                                Sign Up
                            </a>
                        </li>
                    @endif
                    <div class="flex items-center">
                        <form action="{{ route('search') }}" method="get">
                            <input id="searchInput"
                                class="w-40 p-2 mt-1 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                                type="text" name="query" placeholder="Search">
                            <button class="ms-3" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>

                    </div>

                </ul>

            </nav>
        </div>
    </div>
</header>
