<section id="step-0" class="step-slide">
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-8 md:p-10 max-w-6xl mx-auto">

        {{-- JUDUL UTAMA  --}}
        <h2 class="text-2xl md:text-3xl font-bold mb-6 text-slate-900 border-b border-slate-100 pb-4">
            Materi 1: Dasar - Dasar Graf
        </h2>

        {{-- BAGIAN ATAS: Narasi & Gambar (Grid Rasio 7:5) --}}
        <div class="grid md:grid-cols-12 gap-8 items-start">
            
            {{-- Kolom Kiri: Narasi Paragraf (Lebar 7 Kolom) --}}
            <div class="md:col-span-7 flex flex-col justify-start">
                <div class="prose prose-slate text-slate-600 leading-relaxed text-justify mt-1">
                    <p class="mb-4">
                        Tata kota Banjarmasin yang dipenuhi aliran sungai dan jembatan menghadirkan tantangan tersendiri dalam menentukan arah perjalanan. Pernahkah terlintas di benak Anda bagaimana aplikasi navigasi digital bisa merekomendasikan rute paling efisien saat Anda ingin melewati kawasan Jembatan Sei Alalak? Jawabannya terletak pada struktur data bernama <strong>Graf</strong>.
                    </p>
                    <p>
                       Di mata manusia, Jembatan Sei Alalak adalah infrastruktur fisik yang megah. Namun, sistem komputer tidak memandang dunia melalui detail visual. Agar komputer bisa menghitung rute, jembatan tersebut harus disederhanakan menjadi pemodelan logika yang disebut Graf.
                    </p>
                </div>
            </div>

            
            <div class="md:col-span-5 rounded-xl overflow-hidden shadow-lg border border-slate-200 relative group min-h-[250px] bg-slate-100 flex flex-col cursor-crosshair">
                
                {{-- 1. Gambar Asli Background (Lebih Terang & Blur saat Hover) --}}
                <img src="{{ asset('images/banjarmasin.jpg') }}" alt="Jembatan Sei Alalak"
                    class="absolute inset-0 w-full h-full object-cover transition-all duration-500 z-0 group-hover:opacity-40 group-hover:grayscale group-hover:blur-[2px]">

                {{-- 2. Animasi Graf SVG (Jalur Lurus A -> B) --}}
                <svg viewBox="0 0 400 300" class="absolute inset-0 w-full h-full z-10 drop-shadow-xl pointer-events-none opacity-0 transition-opacity duration-200 group-hover:opacity-100 group-hover:duration-500">
                    
                    <line x1="80" y1="150" x2="320" y2="150" 
                          class="stroke-blue-600 stroke-[6px] [stroke-dasharray:400] [stroke-dashoffset:400] transition-all duration-0 delay-0 group-hover:[stroke-dashoffset:0] group-hover:duration-1000 group-hover:delay-300" stroke-linecap="round" />

                    <circle cx="80" cy="150" r="12" fill="#ffffff" 
                            class="stroke-blue-700 stroke-[4px] opacity-0 transition-all duration-0 delay-0 group-hover:opacity-100 group-hover:duration-500 group-hover:delay-100" />
                    <text x="80" y="125" fill="#1e3a8a" font-weight="900" font-size="22" style="filter: drop-shadow(0px 2px 4px rgba(255,255,255,0.9));" class="opacity-0 transition-all duration-0 delay-0 group-hover:opacity-100 group-hover:duration-500 group-hover:delay-100" text-anchor="middle">A</text>
                            
                    <circle cx="320" cy="150" r="12" fill="#ffffff" 
                            class="stroke-blue-700 stroke-[4px] opacity-0 transition-all duration-0 delay-0 group-hover:opacity-100 group-hover:duration-500 group-hover:delay-800" />
                    <text x="320" y="125" fill="#1e3a8a" font-weight="900" font-size="22" style="filter: drop-shadow(0px 2px 4px rgba(255,255,255,0.9));" class="opacity-0 transition-all duration-0 delay-0 group-hover:opacity-100 group-hover:duration-500 group-hover:delay-800" text-anchor="middle">B</text>
                            
                </svg>

                {{-- 3. Gradient Bawah (Hanya untuk menggelapkan area teks agar terbaca) --}}
                <div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-slate-900/80 via-slate-900/30 to-transparent z-20 pointer-events-none transition-opacity duration-300"></div>

                {{-- 4. Teks Caption Berubah Dinamis --}}
                <div class="absolute bottom-0 left-0 right-0 p-4 z-30 pointer-events-none">
                    <div class="flex items-center gap-2 mb-1.5">
                        <span class="relative flex h-2.5 w-2.5">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-blue-500"></span>
                        </span>
                        <p class="text-white font-bold text-sm tracking-wide group-hover:text-blue-300 transition-colors">
                            <span class="inline group-hover:hidden">Jembatan Sei Alalak</span>
                            <span class="hidden group-hover:inline">Proses Digitalisasi / Abstraksi</span>
                        </p>
                    </div>
                    <p class="text-slate-200 text-[11px] leading-relaxed transition-all duration-300 group-hover:text-white">
                        <span class="inline group-hover:hidden">Arahkan kursor ke area ini untuk melihat sudut pandang abstraksi komputer.</span>
                        <span class="hidden group-hover:inline">Jembatan disederhanakan menjadi 1 Sisi (Garis) yang menghubungkan 2 Simpul (Titik A dan B).</span>
                    </p>
                </div>
            </div>

        </div>

        {{-- BAGIAN TENGAH: Tujuan Pembelajaran (Full Width membentang) --}}
        <div class="mt-10 bg-blue-50/40 p-6 rounded-xl border border-blue-100">
            <p class="text-slate-700 mb-4 text-justify">
                Pada materi pertama ini, kita akan meletakkan dasar pola pikir (<em>mindset</em>) seorang <strong>Software Engineer</strong>: mengubah kerumitan dunia nyata menjadi titik dan garis komputasi.
            </p>
            
            <h3 class="text-lg font-bold text-slate-900 mb-3 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Tujuan Pembelajaran
            </h3>
            
            <p class="text-sm text-slate-600 mb-3">Setelah menyelesaikan materi ini, mahasiswa diharapkan mampu:</p>
            <ul class="list-disc list-outside ml-5 text-sm text-slate-700 space-y-2">
                <li><strong>Menganalisis komponen utama graf</strong> (simpul, sisi, dan derajat) sebagai bentuk abstraksi komputasi dari permasalahan dunia nyata.</li>
                <li><strong>Membedakan karakteristik jenis-jenis graf</strong> (berarah/tak berarah dan berbobot/tak berbobot) serta penerapannya dalam berbagai sistem digital.</li>
            </ul>
        </div>

        {{-- BAGIAN BAWAH: Navigasi --}}
        <div class="mt-8 pt-6 border-t border-slate-100 flex justify-end">
            <button onclick="nextStep()"
                class="group bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-6 rounded-lg transition-all duration-300 shadow-sm flex items-center gap-2">
                Mulai Belajar
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7-7m7-7H3" />
                </svg>
            </button>
        </div>

    </div>
</section>