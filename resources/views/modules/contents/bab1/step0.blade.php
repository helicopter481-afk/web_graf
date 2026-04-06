<section id="step-0" class="step-slide transition-colors duration-300">
    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-8 md:p-10 max-w-6xl mx-auto transition-colors">

        {{-- JUDUL UTAMA  --}}
        <h2 class="text-2xl md:text-3xl font-extrabold mb-6 text-slate-900 dark:text-white border-b border-slate-200 dark:border-slate-700 pb-4">
            Materi 1: Dasar - Dasar Graf
        </h2>

        {{-- BAGIAN ATAS: Narasi & Gambar (Grid Rasio 7:5) --}}
        <div class="grid md:grid-cols-12 gap-8 items-start">
            
            {{-- Kolom Kiri: Narasi Paragraf --}}
            <div class="md:col-span-7 flex flex-col justify-start">
                <div class="prose prose-slate dark:prose-invert max-w-none text-justify">
                    <p class="mb-4 text-[15px] md:text-base text-slate-800 dark:text-slate-200 leading-relaxed">
                        Tata kota Banjarmasin yang dipenuhi aliran sungai dan jembatan menghadirkan tantangan tersendiri dalam menentukan arah perjalanan. Pernahkah terlintas di benak Anda bagaimana aplikasi navigasi digital bisa merekomendasikan rute paling efisien saat Anda ingin melewati kawasan Jembatan Sei Alalak? Jawabannya terletak pada struktur data bernama <strong class="text-blue-700 dark:text-blue-400">Graf</strong>.
                    </p>
                    <p class="text-[15px] md:text-base text-slate-800 dark:text-slate-200 leading-relaxed">
                       Di mata manusia, Jembatan Sei Alalak adalah infrastruktur fisik yang megah. Namun, sistem komputer tidak memandang dunia melalui detail visual. Agar komputer bisa menghitung rute, jembatan tersebut harus disederhanakan menjadi pemodelan logika yang disebut Graf.
                    </p>
                </div>
            </div>

            {{-- Kolom Kanan: Gambar Interaktif --}}
            <div class="md:col-span-5 rounded-xl overflow-hidden shadow-lg border border-slate-300 dark:border-slate-700 relative group min-h-[250px] bg-slate-100 dark:bg-slate-800 flex flex-col cursor-crosshair transition-colors">
                
                {{-- 1. Gambar Asli Background (Lebih Terang & Blur saat Hover) --}}
                <img src="{{ asset('images/banjarmasin.jpg') }}" alt="Jembatan Sei Alalak"
                    class="absolute inset-0 w-full h-full object-cover transition-all duration-500 z-0 group-hover:opacity-40 group-hover:grayscale group-hover:blur-[2px]">

                {{-- 2. Animasi Graf SVG (Jalur Lurus A -> B) --}}
                <svg viewBox="0 0 400 300" class="absolute inset-0 w-full h-full z-10 drop-shadow-xl pointer-events-none opacity-0 transition-opacity duration-200 group-hover:opacity-100 group-hover:duration-500">
                    
                    <line x1="80" y1="150" x2="320" y2="150" 
                          class="stroke-blue-600 stroke-[6px] [stroke-dasharray:400] [stroke-dashoffset:400] transition-all duration-0 delay-0 group-hover:[stroke-dashoffset:0] group-hover:duration-1000 group-hover:delay-300" stroke-linecap="round" />

                    <circle cx="80" cy="150" r="12" fill="#ffffff" 
                            class="stroke-blue-700 stroke-[4px] opacity-0 transition-all duration-0 delay-0 group-hover:opacity-100 group-hover:duration-500 group-hover:delay-100" />
                    <text x="80" y="125" fill="#ffffff" font-weight="900" font-size="22" style="filter: drop-shadow(0px 2px 4px rgba(0,0,0,0.9));" class="opacity-0 transition-all duration-0 delay-0 group-hover:opacity-100 group-hover:duration-500 group-hover:delay-100" text-anchor="middle">A</text>
                            
                    <circle cx="320" cy="150" r="12" fill="#ffffff" 
                            class="stroke-blue-700 stroke-[4px] opacity-0 transition-all duration-0 delay-0 group-hover:opacity-100 group-hover:duration-500 group-hover:delay-800" />
                    <text x="320" y="125" fill="#ffffff" font-weight="900" font-size="22" style="filter: drop-shadow(0px 2px 4px rgba(0,0,0,0.9));" class="opacity-0 transition-all duration-0 delay-0 group-hover:opacity-100 group-hover:duration-500 group-hover:delay-800" text-anchor="middle">B</text>
                            
                </svg>

                {{-- 3. Gradient Bawah --}}
                <div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-slate-950/90 via-slate-950/50 to-transparent z-20 pointer-events-none transition-opacity duration-300 group-hover:via-slate-950/70"></div>

                {{-- 4. Teks Caption Berubah Dinamis --}}
                <div class="absolute bottom-0 left-0 right-0 p-4 z-30 pointer-events-none">
                    <div class="flex items-center gap-2 mb-1.5">
                        <span class="relative flex h-2.5 w-2.5">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-blue-500"></span>
                        </span>
                        <p class="text-white font-bold text-sm tracking-wide group-hover:text-blue-300 transition-colors">
                            <span class="inline group-hover:hidden">Jembatan Sei Alalak</span>
                            <span class="hidden group-hover:inline underline decoration-dotted decoration-blue-300">Proses Digitalisasi / Abstraksi</span>
                        </p>
                    </div>
                    <p class="text-slate-100 text-xs leading-relaxed transition-all duration-300 group-hover:text-white">
                        <span class="inline group-hover:hidden">Arahkan kursor ke area ini untuk melihat sudut pandang abstraksi komputer.</span>
                        <span class="hidden group-hover:inline">Jembatan disederhanakan menjadi 1 Sisi (Garis) yang menghubungkan 2 Simpul (Titik A dan B).</span>
                    </p>
                </div>
            </div>

        </div>

        {{-- BAGIAN TENGAH: Tujuan Pembelajaran --}}
        <div class="mt-10 bg-blue-50 dark:bg-blue-900/20 p-6 md:p-8 rounded-xl border border-blue-200 dark:border-blue-800 shadow-sm transition-colors">
            <p class="text-[15px] md:text-base text-slate-800 dark:text-slate-200 mb-5 text-justify leading-relaxed">
                Pada materi pertama ini, kita akan meletakkan dasar pola pikir (<em>mindset</em>) seorang <strong class="text-blue-700 dark:text-blue-400">Software Engineer</strong>: mengubah kerumitan dunia nyata menjadi titik dan garis komputasi.
            </p>
            
            <h3 class="text-lg font-bold text-slate-950 dark:text-white mb-4 flex items-center gap-2 border-b border-blue-200 dark:border-blue-800/50 pb-2">
                <i class="fa-solid fa-bullseye text-blue-600 dark:text-blue-400"></i>
                Tujuan Pembelajaran
            </h3>
            
            <p class="text-sm md:text-base font-medium text-slate-800 dark:text-slate-300 mb-3">Setelah menyelesaikan materi ini, mahasiswa diharapkan mampu:</p>
            <ul class="list-disc list-outside ml-6 text-[15px] md:text-base text-slate-800 dark:text-slate-200 space-y-3">
                <li><strong class="text-slate-950 dark:text-white">Menganalisis komponen utama graf</strong> (simpul, sisi, dan derajat) sebagai bentuk abstraksi komputasi dari permasalahan dunia nyata.</li>
                <li><strong class="text-slate-950 dark:text-white">Membedakan karakteristik jenis-jenis graf</strong> (berarah/tak berarah dan berbobot/tak berbobot) serta penerapannya dalam berbagai sistem digital.</li>
            </ul>
        </div>

        {{-- BAGIAN BAWAH: Navigasi --}}
        <div class="mt-10 pt-6 border-t border-slate-200 dark:border-slate-800 flex justify-end transition-colors">
            <button onclick="nextStep()"
                class="group bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-6 rounded-lg transition-all duration-300 shadow-md flex items-center gap-2 active:scale-95">
                Mulai Belajar
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7-7m7 7H3" />
                </svg>
            </button>
        </div>

    </div>
</section>