<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">

        <ul class="space-y-2 font-medium">
            @php
                $menuItems = [
                    [
                        'label' => 'Dashboard',
                        'route' => 'admin',
                        'icon' => 'dashboard',
                    ],
                    [
                        'label' => 'Tour',
                        'route' => 'tour', // Pastikan ini adalah nama route yang benar
                        'icon' => 'dashboard',
                    ],
                ];
            @endphp

            @foreach ($menuItems as $item)
                <li>
                    <a href="{{ route($item['route']) }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-blue-100 group {{ request()->routeIs($item['route']) ? 'bg-blue-500 text-white hover:bg-blue-500 ' : '' }}">
                        <x-icon type="{{ $item['icon'] }}"
                            fill="{{ request()->routeIs($item['route']) ? '#fff' : '#0f172a' }}" width="20"
                            height="20" />
                        <span class="ms-3">{{ $item['label'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>


    </div>
</aside>
