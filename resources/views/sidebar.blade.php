<aside
    x-transition:enter="transition transform duration-300"
    x-transition:enter-start="-translate-x-full opacity-30  ease-in"
    x-transition:enter-end="translate-x-0 opacity-100 ease-out"
    x-transition:leave="transition transform duration-300"
    x-transition:leave-start="translate-x-0 opacity-100 ease-out"
    x-transition:leave-end="-translate-x-full opacity-0 ease-in"
    class="flex-shrink-0 fixed inset-y-0 w-64 max-h-screen overflow-hidden transition-all transform bg-gray-800 border-r md:static"
    :class="{'-translate-x-full md:translate-x-0': !isMobileMainMenuOpen}"
>
    <div class="flex flex-col h-full" :class="{'pt-14': isMobileMainMenuOpen}">
        <div class="bg-gray-900 px-3 py-2">
            <a href="{{ route('dashboard') }}">
                <div class="flex flex-row items-center justify-center h-12 w-full">
                    <div class="flex items-center justify-center rounded-2xl text-indigo-700 bg-indigo-100 h-10 w-10">
                        <img src="{{ asset('hotash-ngo.png') }}" alt="Logo">
                    </div>
                    <div class="text-white ml-2 font-bold text-2xl truncate">{{ config('app.name') }}</div>
                </div>
            </a>
        </div>
        @php
            $sidebar = [
                'Dashboard' => route('dashboard'),
                'Slider' => [
                    'All Slides' => route('admin.slides.index'),
                    'Add New' => route('admin.slides.create'),
                ],
                'Pages' => [
                    'All Pages' => route('admin.pages.index'),
                    'Add New' => route('admin.pages.create'),
                ],
                'News' => [
                    'All News' => route('admin.news.index'),
                    'Add New' => route('admin.news.create'),
                ],
                'Menus' => route('admin.menu-builder'),
                'Gallery' => route('admin.images.index'),
                'Team' => [
                    'All People' => route('admin.people.index'),
                    'Add New' => route('admin.people.create'),
                ],
                'Testimonials' => [
                    'View All' => route('admin.testimonials.index'),
                    'Add New' => route('admin.testimonials.create'),
                ],
            ];
        @endphp
        <!-- Sidebar links -->
        <nav id="sidebar" aria-label="Main" class="flex-1 px-2 py-4 space-y-2 text-gray-300 overflow-y-hidden hover:overflow-y-auto">
            @foreach($sidebar as $label => $item)
                <div>
                @if(is_array($item))<!-- active classes 'bg-blue-100' -->
                    <a
                        href="#"
                        @click="$event.preventDefault(); open = (open == '{{ $label }}' ? null : '{{ $label }}')"
                        class="flex items-center p-2 transition-colors rounded-md hover:bg-gray-900"
                        :class="{ 'bg-gray-700': shouldBold('{{ $label }}') }"
                        role="button"
                        aria-haspopup="true"
                        :aria-expanded="shouldBold('{{ $label }}') ? 'true' : 'false'"
                    >
                  <span aria-hidden="true">
                    <svg
                        class="w-5 h-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                      <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                      />
                    </svg>
                  </span>
                        <span class="ml-2 text-sm">{{ __($label) }}</span>
                        <span aria-hidden="true" class="ml-auto">
                    <!-- active class 'rotate-180' -->
                    <svg
                        class="w-4 h-4 transition-transform transform"
                        :class="{ 'rotate-180': open == '{{ $label }}' }"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                  </span>
                    </a>
                    <div x-show="open == '{{ $label }}'" class="mt-2 space-y-2 px-7" role="menu" arial-label="Slides">
                        <!-- active & hover classes 'text-gray-700' -->
                        <!-- inActive classes 'text-gray-400' -->
                        @foreach($item as $label => $child)
                        <H:a
                            :href="$child"
                            role="menuitem"
                            class="block p-2 text-sm hover:bg-gray-900 transition-colors duration-200 rounded-md"
                        >
                            @lang($label)
                        </H:a>
                        @endforeach
                    </div>
                @else
                    <!-- active & hover classes 'bg-blue-100' -->
                    <H:a
                        :href="$item"
                        class="flex items-center p-2 transition-colors rounded-md hover:bg-gray-900"
                        x-bind:class="{'text-gray-700 bg-gray-700': {{ request()->fullUrlIs($item) ? 'true' : 'false' }}}"
                        role="button"
                        aria-haspopup="true"
                    >
                  <span aria-hidden="true">
                    <svg
                        class="w-5 h-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                      <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                      />
                    </svg>
                  </span>
                        <span class="ml-2 text-sm">{{ __($label) }}</span>
                    </H:a>
                    @endif
                </div>
            @endforeach

            <!-- Components links -->
            <div>
                <!-- active classes 'bg-blue-100' -->
                <a
                    href="#"
                    @click="$event.preventDefault(); open = (open == 'components' ? null : 'components')"
                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md hover:bg-blue-100"
                    :class="{ 'bg-blue-100': shouldBold('components') }"
                    role="button"
                    aria-haspopup="true"
                    :aria-expanded="shouldBold('components') ? 'true' : 'false'"
                >
                  <span aria-hidden="true">
                    <svg
                        class="w-5 h-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                      <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"
                      />
                    </svg>
                  </span>
                    <span class="ml-2 text-sm"> Components </span>
                    <span aria-hidden="true" class="ml-auto">
                    <!-- active class 'rotate-180' -->
                    <svg
                        class="w-4 h-4 transition-transform transform"
                        :class="{ 'rotate-180': open == 'components' }"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                  </span>
                </a>
                <div x-show="open == 'components'" class="mt-2 space-y-2 px-7" role="menu" arial-label="Components">
                    <!-- active & hover classes 'text-gray-700' -->
                    <!-- inActive classes 'text-gray-400' -->
                    <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md"
                    >
                        Alerts
                    </a>
                    <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md"
                    >
                        Buttons
                    </a>
                    <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md"
                    >
                        Cards
                    </a>
                    <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md"
                    >
                        Dropdowns
                    </a>
                    <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md"
                    >
                        Forms
                    </a>
                    <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md"
                    >
                        Lists
                    </a>
                    <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md"
                    >
                        Modals
                    </a>
                </div>
            </div>

            <!-- Pages links -->
            <div>
                <!-- active classes 'bg-blue-100' -->
                <a
                    href="#"
                    @click="$event.preventDefault(); open = (open == 'pages' ? null : 'pages')"
                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md hover:bg-blue-100"
                    :class="{ 'bg-blue-100': shouldBold('pages') }"
                    role="button"
                    aria-haspopup="true"
                    :aria-expanded="shouldBold('pages') ? 'true' : 'false'"
                >
                  <span aria-hidden="true">
                    <svg
                        class="w-5 h-5"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                      <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"
                      />
                    </svg>
                  </span>
                    <span class="ml-2 text-sm"> Pages </span>
                    <span aria-hidden="true" class="ml-auto">
                    <!-- active class 'rotate-180' -->
                    <svg
                        class="w-4 h-4 transition-transform transform"
                        :class="{ 'rotate-180': open == 'pages' }"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                  </span>
                </a>
                <div x-show="open == 'pages'" class="mt-2 space-y-2 px-7" role="menu" arial-label="Pages">
                    <!-- active & hover classes 'text-gray-700' -->
                    <!-- inActive classes 'text-gray-400' -->
                    <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-700 transition-colors duration-200 rounded-md"
                    >
                        Blank
                    </a>
                    <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md"
                    >
                        Profile
                    </a>
                    <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md"
                    >
                        Pricing
                    </a>
                    <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md"
                    >
                        Kanban
                    </a>
                    <a
                        href="#"
                        role="menuitem"
                        class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md"
                    >
                        Feed
                    </a>
                </div>
            </div>
        </nav>

        <!-- Sidebar footer -->
        <div class="flex-shrink-0 px-2 py-4 space-y-2">
            <a
                href="{{ url('/telescope') }}"
                class="flex items-center justify-center w-full px-4 py-2 text-sm text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-700 focus:ring-offset-1 focus:ring-offset-white"
            >
                <span aria-hidden="true">
                <svg
                    class="w-4 h-4 mr-2"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
                    />
                </svg>
                </span>
                <span>Telescope</span>
            </a>
        </div>
    </div>
</aside>
