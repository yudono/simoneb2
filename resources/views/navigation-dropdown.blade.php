<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('logo.png') }}" height="200px" width="200px"/>
                    </a>
                </div>

                <!-- Navigation Links -->
                @if (Auth::user()->role == 'mahasiswa')
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('semester') }}" :active="request()->routeIs('semester')">
                        {{ __('Masukkan Nilai Semester') }}
                    </x-jet-nav-link>  
					<x-jet-dropdown>
						<x-slot name="trigger">                            
								<button class="flex items-center text-md font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
									<div>{{ __('Laporan')}}</div>

									<div class="ml-1">
										<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
											<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
										</svg>
									</div>
								</button>
						</x-slot>
						<x-slot name="content">
						@foreach(\App\Models\Beasiswa::where('users_id',auth()->user()->id)->get() as $number => $row)
							<x-jet-dropdown-link href="{{ url('laporan') }}/?id={{ $number+1 }}">
								{{ 'Semester ke '.$row->semester_id }}
							</x-jet-dropdown-link>
						@endforeach
						</x-slot>
					</x-jet-dropdown>
					
					
                <x-jet-dropdown align="right">
                    <x-slot name="trigger">                            
                            <button class="flex items-center text-md font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ __('Upload Data')}}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Upload Data') }}
                        </div>
					@if(auth()->user()->role === 'admin')	
                        <x-jet-dropdown-link href="{{ route('mahasiswa') }}">
                            {{ __('Mahasiswa') }}
                        </x-jet-dropdown-link>
					@endif
                        <x-jet-dropdown-link href="{{ route('beasiswa') }}">
                            {{ __('Kekhasan Beasiswa') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ route('forum') }}">
                            {{ __('Forum') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ route('karya') }}">
                            {{ __('Karya') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ route('mentoring') }}">
                            {{ __('Mentoring') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ route('org_mhs') }}">
                            {{ __('Organisasi Mahasiswa') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ route('prestasi') }}">
                            {{ __('Prestasi') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ route('sosial') }}">
                            {{ __('Sosial') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ route('tahsin') }}">
                            {{ __('Tahsin') }}
                        </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
            </div>
                </div>
                @endif
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ asset('').Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        @else
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        @endif
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
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
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('beasiswa') }}" :active="request()->routeIs('beasiswa')">
                {{ __('Beasiswa') }}
            </x-jet-responsive-nav-link>

            <x-jet-responsive-nav-link href="{{ route('forum') }}" :active="request()->routeIs('forum')">
                {{ __('Forum') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('karya') }}" :active="request()->routeIs('karya')">
                {{ __('Karya') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('mentoring') }}" :active="request()->routeIs('mentoring')">
                {{ __('Mentoring') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('org_mhs') }}" :active="request()->routeIs('org_mhs')">
                {{ __('Organisasi Mahasiswa') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('prestasi') }}" :active="request()->routeIs('prestasi')">
                {{ __('Prestasi') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('sosial') }}" :active="request()->routeIs('sosial')">
                {{ __('Sosial') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('tahsin') }}" :active="request()->routeIs('tahsin')">
                {{ __('Tahsin') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                </div>

                <div class="ml-3">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-jet-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
