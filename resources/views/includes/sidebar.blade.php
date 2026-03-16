<aside class="fixed top-[77px] left-0 w-56 md:w-64 h-[calc(100vh-77px)] bg-white dark:bg-[#111827] border-r border-slate-200 dark:border-[#1F2937] z-40 hidden md:block transition-colors duration-300">
    <div class="h-full overflow-y-auto py-6 px-4">
        
        <div class="text-[10px] font-bold text-slate-400 dark:text-slate-500 tracking-widest uppercase mb-4 px-3">
            Menu Utama
        </div>

        <nav class="space-y-1.5">
            @php
                $nav = [
                    ['label' => 'Dashboard',     'icon' => 'fa-solid fa-layer-group',  'route' => route('dashboard')],
                    ['label' => 'Materi Belajar','icon' => 'fa-solid fa-book-open',    'route' => route('modules.index')],
                    ['label' => 'Jalankan Kode', 'icon' => 'fa-solid fa-code',         'route' => route('run.code')],
                    ['label' => 'Hasil & Nilai', 'icon' => 'fa-solid fa-chart-simple', 'route' => route('hasil.nilai')], 
                ];
            @endphp

            @foreach ($nav as $item)
                @php
                    // Logika aktif: akan menyala jika URL sama, atau jika sedang membuka /modul
                    $active = request()->url() === $item['route'] || 
                              (str_contains(request()->url(), '/modul') && $item['label'] === 'Materi Belajar');
                @endphp

                <a href="{{ $item['route'] }}"
                   class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 group
                          {{ $active 
                              ? 'bg-blue-50 text-blue-700 dark:bg-blue-500/10 dark:text-blue-400' 
                              : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900 dark:text-slate-400 dark:hover:bg-[#1F2937]/50 dark:hover:text-slate-200' }}">
                    
                    <div class="w-6 flex justify-center transition-colors 
                                {{ $active ? 'text-blue-600 dark:text-blue-400' : 'text-slate-400 group-hover:text-slate-600 dark:text-slate-500 dark:group-hover:text-slate-300' }}">
                        <i class="{{ $item['icon'] }} text-base"></i>
                    </div>
                    
                    <span>{{ $item['label'] }}</span>
                </a>
            @endforeach
        </nav>

    </div>
</aside>