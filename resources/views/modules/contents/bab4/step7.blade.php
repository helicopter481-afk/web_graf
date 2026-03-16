<section id="step-7" class="step-slide">
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-10 -mt-8">
        <h2 class="text-3xl font-bold mb-6 text-slate-900 border-b pb-4">Refleksi Pembelajaran</h2>

        <p class="text-slate-600 mb-8 leading-relaxed">
            Selamat! Anda telah menyelesaikan materi ini. Sejenak, mari kita evaluasi pemahaman yang telah Anda
            dapatkan. Jawaban jujur Anda akan sangat membantu dalam proses belajar selanjutnya.
        </p>

        <form id="reflectionForm" class="space-y-6">
            {{-- Pertanyaan 1 --}}
            <div>
                <label class="block font-semibold text-slate-800 mb-2">
                    1. Apa pemahaman utama yang kamu peroleh dari materi ini?
                </label>
                <textarea name="q1"
                    class="w-full border border-slate-300 rounded-lg p-3 text-slate-700 focus:ring-2 focus:ring-blue-500 outline-none transition-all placeholder-slate-400"
                    rows="3" placeholder="Jawab di sini..."></textarea>
            </div>

            {{-- Pertanyaan 2 --}}
            <div>
                <label class="block font-semibold text-slate-800 mb-2">
                    2. Bagian mana yang masih belum kamu pahami sepenuhnya?
                </label>
                <textarea name="q2"
                    class="w-full border border-slate-300 rounded-lg p-3 text-slate-700 focus:ring-2 focus:ring-blue-500 outline-none transition-all placeholder-slate-400"
                    rows="3" placeholder="Jawab di sini..."></textarea>
            </div>

            {{-- Pertanyaan 3 --}}
            <div>
                <label class="block font-semibold text-slate-800 mb-2">
                    3. Contoh penerapan graf apa yang paling kamu pahami atau menarik bagimu?
                </label>
                <textarea name="q3"
                    class="w-full border border-slate-300 rounded-lg p-3 text-slate-700 focus:ring-2 focus:ring-blue-500 outline-none transition-all placeholder-slate-400"
                    rows="3" placeholder="Jawab di sini..."></textarea>
            </div>

            {{-- Pertanyaan 4 --}}
            <div>
                <label class="block font-semibold text-slate-800 mb-2">
                    4. Apa yang akan kamu lakukan agar pemahamanmu lebih baik pada materi berikutnya?
                </label>
                <textarea name="q4"
                    class="w-full border border-slate-300 rounded-lg p-3 text-slate-700 focus:ring-2 focus:ring-blue-500 outline-none transition-all placeholder-slate-400"
                    rows="3" placeholder="Jawab di sini..."></textarea>
            </div>
        </form>

        {{-- Navigasi --}}
        <div class="flex justify-between gap-4 mt-12">
            <button type="button" onclick="prevStep()" class="btn-secondary">← Kembali</button>
            <button type="button" onclick="finishChapter()" class="btn-primary">Selesai Materi 4</button>
        </div>
    </div>


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
                        chapter: 'bab4', // Pastikan sesuai bab
                        answers: answers
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.redirect || data.status === 'success') {
                        Swal.fire({
                            title: 'Luar Biasa!',
                            text: 'Bab 4 Selesai. Refleksi Anda telah tersimpan.',
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
