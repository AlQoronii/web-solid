<nav x-data="{ open: false, search: false }" class="bg-soft-snow px-7 xl:px-0 border-b border-gray-100 sticky top-0 z-50 ">
    <!-- Primary Navigation Menu -->
    <div class="py-4 lg:px-8 2xl:px-0 max-w-7xl mx-auto">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('home') }}">
                    <div class="w-28 md:w-38 flex">
                        <x-application-logo class="w-auto h-auto text-gray-800 " />
                    </div>
                </a>
            </div>
            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 md:flex">
                <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-nav-link>
                <x-nav-link :href="route('book')" :active="request()->routeIs('book') || request()->routeIs('book-detail')">
                    {{ __('Books') }}
                </x-nav-link>
                <x-nav-link :href="route('article')" :active="request()->routeIs('article') || request()->routeIs('article-detail')">
                    {{ __('Articles') }}
                </x-nav-link>
            </div>
            <div class="flex items-center gap-x-5">
                <button @click.stop="search = !search"
                    class="{{ request()->routeIs('book') || request()->routeIs('book-detail') ? 'block' : 'hidden' }} max-lg:hidden">
                    <x-heroicon-o-magnifying-glass class="w-8 h-8" />
                </button>
                <x-nav-button theme="dark" :class="'rounded-lg'" :href="route('login')">
                    {{ __('Login') }}
                </x-nav-button>
            </div>

            {{-- Search Dropdown --}}
            <div x-show="search" x-transition:enter.duration.500ms x-transition:leave.duration.400ms
                class="absolute inset-0 w-full mx-auto h-screen -z-10 bg-white/10" x-cloak>
                <div class="absolute inset-0 w-full mx-auto h-[14rem] bg-white" id="search">
                    <form id="searchForm" action="{{ route('book') }}"
                        class="w-full max-w-7xl h-full mx-auto flex justify-center items-end py-10 relative">
                        @if (request('jfsi'))
                            <input type="hidden" name="jfsi" value="{{ request('jfsi') }}">
                        @endif
                        <div class="w-3/4">
                            <div class="w-full inline-flex items-center relative h-full px-2">
                                <input type="text" name="search" id="search" placeholder="Cari Buku"
                                    class="w-full px-4 py-4 bg-gray-50 ring-black ring-1 rounded-lg outline-none border-0 focus:ring-1 focus:ring-green-light">
                                <button type="submit" class="absolute z-20 right-4 ">
                                    <x-heroicon-o-magnifying-glass class="w-12 h-8 bg-gray-50" />
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</nav>


