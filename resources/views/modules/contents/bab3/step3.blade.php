<section id="step-3" class="step-slide">
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-10 max-w-6xl mx-auto -mt-8">
        
        {{-- JUDUL HALAMAN --}}
        <h2 class="text-3xl font-bold mb-6 text-slate-900 border-b pb-4">
            Rangkuman
        </h2>

        {{-- KONTEN RANGKUMAN --}}
        <div class="text-slate-700 text-base leading-relaxed text-justify">
            <ul class="list-disc list-outside ml-6 space-y-4">
                
                {{-- Poin 1: Penelusuran Graf --}}
                <li>
                    <strong>Penelusuran Graf (<em>Graph Traversal</em>)</strong> adalah algoritma untuk mengunjungi setiap simpul di dalam struktur data graf secara sistematis agar tidak ada data yang terlewat atau terjadi pengulangan tak berhingga (<em>infinite loop</em>).
                </li>

                {{-- Poin 2: BFS --}}
                <li>
                    <strong>Breadth-First Search (BFS):</strong>
                    <ul class="list-[circle] list-outside ml-6 mt-2 space-y-2">
                        <li>Metode penelusuran yang bergerak secara <strong>melebar</strong> (level demi level).</li>
                        <li>Menerapkan struktur data <strong>Queue (Antrean)</strong> dengan hukum FIFO (<em>First-In First-Out</em>).</li>
                        <li>Diimplementasikan pada Python dengan mencabut elemen pertama dari <em>list</em> menggunakan <code class="bg-slate-100 text-blue-700 px-1.5 py-0.5 rounded shadow-sm border border-slate-200">pop(0)</code>.</li>
                    </ul>
                </li>

                {{-- Poin 3: DFS --}}
                <li>
                    <strong>Depth-First Search (DFS):</strong>
                    <ul class="list-[circle] list-outside ml-6 mt-2 space-y-2">
                        <li>Metode penelusuran yang bergerak secara <strong>mendalam</strong> hingga mencapai ujung titik buntu sebelum mundur kembali (<em>backtrack</em>).</li>
                        <li>Menerapkan struktur data <strong>Stack (Tumpukan)</strong> dengan hukum LIFO (<em>Last-In First-Out</em>).</li>
                        <li>Diimplementasikan pada Python dengan mencabut elemen terakhir dari <em>list</em> menggunakan <code class="bg-slate-100 text-blue-700 px-1.5 py-0.5 rounded shadow-sm border border-slate-200">pop()</code>.</li>
                    </ul>
                </li>

            </ul>
        </div>

        {{-- NAVIGASI BAWAH --}}
        <div class="flex justify-between gap-4 mt-12 pt-6 border-t border-slate-200">
            <button type="button" onclick="prevStep()"
                class="px-5 py-2.5 rounded-lg border border-slate-300 text-slate-600 hover:bg-slate-50 text-sm font-bold transition shadow-sm active:scale-95">
                Kembali
            </button>
            <button type="button" onclick="nextStep()"
                class="px-6 py-2.5 rounded-lg bg-blue-600 text-white hover:bg-blue-700 text-sm font-bold shadow-md transition flex items-center gap-2 active:scale-95">
                Lanjut <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>
        
    </div>
</section>