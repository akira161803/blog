@if(Auth::check())
    <nav x-data="{ open: false }" class="bg-[#11191f] border-b w-full border-[#324054] fixed top-0">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <x-application-logo class="block h-9 w-auto fill-current text-white"/>
                    <div class="mx-5 text-white font-serif text-2xl sm:text-3xl">
                        
                    </div>
                </div>
                <div class="flex">
                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 lg:flex">
                    <x-nav-link :href="route('myPageCreate')" :active="request()->routeIs('myPageCreate')" class="">
                        {{ __('typeAする') }}
                    </x-nav-link>
                    <x-nav-link :href="route('myPageMyIndex')" :active="request()->routeIs('myPageMyIndex')" class="">
                        {{ __('自分の投稿') }}
                    </x-nav-link>
                    <x-nav-link :href="route('myPageAllIndex')" :active="request()->routeIs('myPageAllIndex')" class="">
                        {{ __('みんなの投稿') }}
                    </x-nav-link>
                    <x-nav-link :href="route('myPageNiceposts')" :active="request()->routeIs('myPageNiceposts')" class="">
                        {{ __('お気に入り') }}
                    </x-nav-link>
                    </div>
                    <!-- Settings Dropdown -->
                    <div class="hidden lg:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-base leading-4 font-medium rounded-md text-white bg-[#11191f] hover:text-sky-300 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
                <!-- Hamburger -->
                <div class="-mr-2 flex items-center lg:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="lg:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('myPageCreate')" :active="request()->routeIs('myPageCreate')">
                    typeAする
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('myPageMyIndex')" :active="request()->routeIs('myPageMyIndex')">
                    自分の投稿
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('myPageAllIndex')" :active="request()->routeIs('myPageAllIndex')">
                    みんなの投稿
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('myPageNiceposts')" :active="request()->routeIs('myPageNiceposts')">
                    お気に入り
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-base text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </nav>
@else
    <nav x-data="{ open: false }" class="bg-[#11191f] border-b w-full border-[#324054] fixed top-0">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo -->
                <div class="shrink-0 flex place-items-center">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    <div class="mx-5 text-white font-serif text-2xl sm:text-3xl">
                        Online Temple
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 md:flex">
                    @if(Request::route()->getName() == 'terms')
                        <x-nav-link :href="route('top')" :active="request()->routeIs('top')" class="text-white">
                            {{ __('ホーム') }}
                        </x-nav-link>
                    @else
                        <x-nav-link  class="text-white">
                            <label for="content">{{ __('typeAする') }}</label>
                        </x-nav-link>
                    @endif
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')" class="text-white">
                        {{ __('ログイン') }}
                    </x-nav-link>
                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')" class="text-white">
                        {{ __('サインアップ') }}
                    </x-nav-link>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center md:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="md:hidden">
            <div class="pt-2 pb-3 space-y-1">
                @if(Request::route()->getName() == 'terms')
                    <x-responsive-nav-link :href="route('top')" :active="request()->routeIs('top')">
                        ホーム
                    </x-responsive-nav-link>
                @endif
                <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                    ログイン
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')">
                    サインアップ
                </x-responsive-nav-link>
            </div>
        </div>
    </nav>
@endif