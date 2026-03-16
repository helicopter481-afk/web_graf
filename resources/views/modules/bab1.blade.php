@php
    // Helper sederhana untuk mengambil progress per section
    // Menggunakan operator null coalescing (??) agar tidak error jika data kosong
    $p1_1 = $progress['1.1'] ?? null;
    $p1_2 = $progress['1.2'] ?? null;
    $p1_3 = $progress['1.3'] ?? null;
    $p_quiz = $progress['quiz1'] ?? null;
@endphp

{{-- File ini di-include ke dalam index.blade.php --}}

{{-- IMPORT FONT INTER DAN PENERAPAN GLOBAL UNTUK MODUL INI --}}
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
{{-- Memanggil CSS khusus Bab 1 --}}
<link rel="stylesheet" href="{{ asset('css/bab1.css') }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="max-w-5xl mx-auto">
    <div id="stepsContainer" class="space-y-8">
        @include('modules.contents.bab1.step0')
        @include('modules.contents.bab1.step1')
        @include('modules.contents.bab1.step2')
        @include('modules.contents.bab1.step3')
        @include('modules.contents.bab1.step4')
        @include('modules.contents.bab1.step5')
        @include('modules.contents.bab1.step6')
        @include('modules.contents.bab1.step7')
    </div>
</div>

{{-- Script Load (Tetap di file utama) --}}
<script>
    window.appRoutes = {
        submitScore: "{{ route('submit.score') }}",
        modulesIndex: "{{ route('modules.index') }}"
    };

    window.appConfig = {
        csrfToken: "{{ csrf_token() }}",
        chapter: "bab1"
    };

    function selectOption11(questionId, selectedKey, btnElement) {
        // 1. Reset semua tombol di soal yang sama
        const container = btnElement.closest('.quiz-item');
        const allButtons = container.querySelectorAll('.option-btn');

        allButtons.forEach(btn => {
            btn.classList.remove('selected');
        });

        // 2. Tandai tombol yang dipilih
        btnElement.classList.add('selected');

        // 3. Simpan jawaban user
        if (!window.userAnswers11) {
            window.userAnswers11 = {};
        }
        window.userAnswers11[questionId] = selectedKey;

        // 4. Reset notifikasi error (kalau ada)
        document.getElementById('warning11').classList.add('hidden');
        document.getElementById('error11').classList.add('hidden');
        document.getElementById('success11').classList.add('hidden');

        // 5. Sembunyikan feedback lama
        const feedbackBox = document.getElementById('feedback-' + questionId);
        if (feedbackBox) {
            feedbackBox.classList.add('hidden');
        }

        console.log('Selected:', questionId, '→', selectedKey); // Debug
    }
    // === FUNGSI PENGIRIM NILAI AKTIVITAS KE DATABASE ===
    function simpanProgressAktivitas(chapterCode, sectionCode, scoreValue) {
        console.log(`[PROSES] Mengirim nilai ${scoreValue} untuk ${sectionCode} ke server...`);

        // Menggunakan absolute route Laravel agar tidak mungkin salah alamat
        fetch("{{ route('submit.score') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                chapter: chapterCode,
                section: sectionCode,
                score: scoreValue,
                answer: null // Dikosongkan karena ini bukan quiz bank soal
            })
        })
        .then(async response => {
            const data = await response.json();
            if (!response.ok) {
                throw new Error(data.message || 'Terjadi kesalahan di server');
            }
            console.log(`[SUKSES SERVER] Progress ${sectionCode} berhasil disimpan:`, data);
        })
        .catch(err => {
            console.error(`[GAGAL] Menyimpan ${sectionCode}:`, err.message);
            alert("Gagal menyimpan progress ke server. Cek koneksi internetmu.");
        });
    }
</script>

<script src="{{ asset('js/bab1.js') }}"></script>