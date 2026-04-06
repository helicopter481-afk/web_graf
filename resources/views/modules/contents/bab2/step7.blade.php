<section id="step-7" class="step-slide">
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-10 -mt-8">
        <h2 class="text-3xl font-bold mb-6 text-slate-900 border-b pb-4">Refleksi Pembelajaran</h2>

        <p class="text-slate-600 mb-8 leading-relaxed">
            Selamat! Anda telah menyelesaikan materi ini. Sejenak, mari kita evaluasi pemahaman yang telah Anda dapatkan. Jawaban jujur Anda akan sangat membantu dalam proses belajar selanjutnya.
        </p>

        <form id="reflectionForm" class="space-y-8">
            {{-- Pertanyaan 1: Evaluasi Pemahaman (Universal) --}}
            <div class="flex gap-4">
                <div class="shrink-0 mt-0.5">
                    <div class="w-8 h-8 rounded-full bg-slate-800 text-white flex items-center justify-center font-bold text-sm shadow-sm">1</div>
                </div>
                <div class="flex-1 space-y-3">
                    <label class="block font-semibold text-slate-800 leading-relaxed text-justify">
                        Setelah menyelesaikan materi ini, tuliskan 1-2 intisari terpenting yang berhasil Anda pahami!
                    </label>
                    <textarea name="q1"
                        class="w-full border border-slate-300 rounded-lg p-4 text-slate-700 focus:ring-2 focus:ring-blue-500 outline-none transition-all placeholder-slate-400 shadow-sm"
                        rows="3" placeholder="Intisari materi ini adalah..."></textarea>
                </div>
            </div>

            {{-- Pertanyaan 2: Cross-Disciplinary / Kaitan dengan Matkul Lain --}}
            <div class="flex gap-4">
                <div class="shrink-0 mt-0.5">
                    <div class="w-8 h-8 rounded-full bg-slate-800 text-white flex items-center justify-center font-bold text-sm shadow-sm">2</div>
                </div>
                <div class="flex-1 space-y-3">
                    <label class="block font-semibold text-slate-800 leading-relaxed text-justify">
                        Menurut Anda, adakah irisan atau kemiripan konsep dari materi ini dengan apa yang Anda pelajari di mata kuliah lain (misalnya: Algoritma Pemrograman, Matematika Diskrit, Jaringan Komputer, dll)? Jelaskan singkat kaitan tersebut!
                    </label>
                    <textarea name="q2"
                        class="w-full border border-slate-300 rounded-lg p-4 text-slate-700 focus:ring-2 focus:ring-blue-500 outline-none transition-all placeholder-slate-400 shadow-sm"
                        rows="3" placeholder="Materi ini mengingatkan saya pada konsep di mata kuliah... karena..."></textarea>
                </div>
            </div>

            {{-- Pertanyaan 3: Pemetaan ke Dunia Nyata (Problem Solving) --}}
            <div class="flex gap-4">
                <div class="shrink-0 mt-0.5">
                    <div class="w-8 h-8 rounded-full bg-slate-800 text-white flex items-center justify-center font-bold text-sm shadow-sm">3</div>
                </div>
                <div class="flex-1 space-y-3">
                    <label class="block font-semibold text-slate-800 leading-relaxed text-justify">
                        Berdasarkan simulasi dan kuis yang baru saja Anda selesaikan, coba bayangkan satu contoh aplikasi atau sistem di dunia nyata yang menurut Anda sangat bergantung pada logika materi ini!
                    </label>
                    <textarea name="q3"
                        class="w-full border border-slate-300 rounded-lg p-4 text-slate-700 focus:ring-2 focus:ring-blue-500 outline-none transition-all placeholder-slate-400 shadow-sm"
                        rows="3" placeholder="Contoh aplikasi di dunia nyata: ..."></textarea>
                </div>
            </div>

            {{-- Pertanyaan 4: Analisis Gap / Kesulitan Belajar --}}
            <div class="flex gap-4">
                <div class="shrink-0 mt-0.5">
                    <div class="w-8 h-8 rounded-full bg-slate-800 text-white flex items-center justify-center font-bold text-sm shadow-sm">4</div>
                </div>
                <div class="flex-1 space-y-3">
                    <label class="block font-semibold text-slate-800 leading-relaxed text-justify">
                        Kejujuran adalah kunci pembelajaran. Bagian mana dari materi ini yang masih membuat Anda ragu atau bingung? Apa strategi Anda untuk mengatasinya?
                    </label>
                    <textarea name="q4"
                        class="w-full border border-slate-300 rounded-lg p-4 text-slate-700 focus:ring-2 focus:ring-blue-500 outline-none transition-all placeholder-slate-400 shadow-sm"
                        rows="3" placeholder="Bagian yang masih sulit adalah... Rencana saya untuk memahaminya adalah..."></textarea>
                </div>
            </div>
        </form>

        {{-- Navigasi --}}
        <div class="flex justify-between gap-4 mt-12">
            <button type="button" onclick="prevStep()" class="btn-secondary">Kembali</button>
            <button type="button" onclick="finishChapter()" class="btn-primary">Selesai Materi 2</button>
        </div>

    </div>
    
    {{-- 👇 INI OBATNYA: Library SweetAlert2 👇 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        function finishChapter() {
            const form = document.getElementById('reflectionForm');
            const formData = new FormData(form);

            // Cek validasi sederhana
            const q1 = formData.get('q1');
            if (!q1 || q1.trim() === "") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Belum Lengkap',
                    text: 'Mohon isi refleksi minimal pertanyaan nomor 1.',
                    confirmButtonColor: '#0f172a'
                });
                return;
            }

            const answers = {
                q1: formData.get('q1'),
                q2: formData.get('q2'),
                q3: formData.get('q3'),
                q4: formData.get('q4')
            };

            // Ubah tombol jadi loading
            const btn = document.querySelector('button[onclick="finishChapter()"]');
            const originalText = btn.innerText;
            btn.innerText = "Menyimpan...";
            btn.disabled = true;

            fetch("{{ route('submit.reflection') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        chapter: 'bab2', // Pastikan sesuai bab
                        answers: answers
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.redirect || data.status === 'success') {
                        Swal.fire({
                            title: 'Luar Biasa!',
                            text: 'Bab 2 Selesai. Refleksi Anda telah tersimpan.',
                            icon: 'success',
                            confirmButtonText: 'Lanjut ke Dashboard',
                            confirmButtonColor: '#16a34a',
                            allowOutsideClick: false 
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = data.redirect || '/dashboard'; 
                            }
                        });
                    } else {
                        // Error dari server
                        Swal.fire({
                            icon: 'error',
                            title: 'Ups...',
                            text: data.message || "Gagal menyimpan.",
                        });
                        btn.innerText = originalText;
                        btn.disabled = false;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal Terhubung',
                        text: 'Periksa koneksi internet Anda atau coba lagi.',
                    });
                    btn.innerText = originalText;
                    btn.disabled = false;
                });
        }
    </script>
</section>