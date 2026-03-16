{{-- Konten Bab 2: Graf Berarah dan Tak Berarah --}}
{{-- File ini di-include ke dalam index.blade.php --}}

<style>
    .max-w-4xl {
        text-align: justify;
    }

    .step-slide {
        display: none;
        opacity: 0;
        transform: translateX(20px);
        transition: all .4s ease-out;
    }

    .step-active {
        display: block !important;
        opacity: 1 !important;
        transform: translateX(0) !important;
    }

    .prose-text {
        line-height: 1.8;
        color: #475569;
    }

    .section-divider {
        height: 1px;
        background: linear-gradient(to right, transparent, #e2e8f0, transparent);
        margin: 2rem 0;
    }

    #visDirected,
    #visUndirected {
        width: 100%;
        height: 350px;
        border-radius: 12px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
    }

    .activity-card {
        background: #f0f9ff;
        border: 2px solid #bfdbfe;
        border-radius: 12px;
        padding: 1.5rem;
    }

    .mcq-item {
        background: white;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        padding: 1rem;
        cursor: pointer;
        transition: all .2s;
    }

    .mcq-item:hover {
        border-color: #60a5fa;
        background: #f0f9ff;
    }

    .mcq-item.selected {
        border-color: #3b82f6;
        background: #dbeafe;
    }

    .mcq-item.correct {
        border-color: #22c55e;
        background: #dcfce7;
    }

    .mcq-item.incorrect {
        border-color: #ef4444;
        background: #fee2e2;
    }

    .mcq-item.wrong {
        border-color: #ef4444;
        background: #fee2e2;
    }

    .btn-primary {
        background: #2563eb;
        color: white;
        padding: 10px 20px;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        transition: all .2s;
    }

    .btn-primary:hover {
        background: #1d4ed8;
    }

    .btn-secondary {
        background: #e2e8f0;
        color: #1e293b;
        padding: 10px 20px;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        transition: all .2s;
    }

    .btn-secondary:hover {
        background: #cbd5e1;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
    }

    th {
        background: linear-gradient(to right, #f0f4f8, #f8fafc);
        padding: 1rem;
        border: 1px solid #e2e8f0;
        font-weight: 600;
        text-align: left;
        color: #1e293b;
    }

    td {
        padding: 1rem;
        border: 1px solid #e2e8f0;
    }

    tbody tr:hover {
        background: #f8fafc;
    }

    .bullet-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .bullet-list li {
        position: relative;
        padding-left: 1.5rem;
        margin-bottom: 0.75rem;
        line-height: 1.7;
        color: #1e40af;
    }

    .bullet-list li::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0.6rem;
        width: 6px;
        height: 6px;
        background: #1e40af;
        border-radius: 50%;
    }
</style>

<div class="max-w-5xl mx-auto">
    <div id="stepsContainer" class="space-y-8">

        {{-- Tarik file-file step dari folder modules/contents/bab2 --}}
        @include('modules.contents.bab2.step0')
        @include('modules.contents.bab2.step1')
        @include('modules.contents.bab2.step2')
        @include('modules.contents.bab2.step3')
        @include('modules.contents.bab2.step4')
        @include('modules.contents.bab2.step5')
        @include('modules.contents.bab2.step6')
        @include('modules.contents.bab2.step7')

    </div>
</div>


<script>
    // FUNGSI PENGIRIM NILAI AKTIVITAS KE DATABASE 
    function simpanProgressAktivitas(chapterCode, sectionCode, scoreValue) {
        console.log(`[PROSES] Mengirim nilai ${scoreValue} untuk ${sectionCode} ke server...`);

        fetch("{{ route('submit.score') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}" 
            },
            body: JSON.stringify({
                chapter: chapterCode,
                section: sectionCode,
                score: scoreValue,
                answer: null 
            })
        })
        .then(response => {
            if (!response.ok) throw new Error("Gagal terhubung ke server");
            return response.json();
        })
        .then(data => {
            console.log(`[SUKSES SERVER] Progress ${sectionCode} berhasil disimpan:`, data);
        })
        .catch(err => {
            console.error(`[ERROR AJAX] Gagal mengirim ${sectionCode}:`, err);
        });
    }

    // Refleksi Handler
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('refleksiForm');
        if (!form) return;
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const fd = new FormData(form);
            const data = {};
            for (const [k, v] of fd.entries()) data[k] = v;
            try {
                localStorage.setItem('refleksi_bab2', JSON.stringify(data));
            } catch (err) {
                console.error('Could not save refleksi to localStorage', err);
            }
            const successEl = document.getElementById('refleksiSuccess');
            if (successEl) successEl.classList.remove('hidden');

            const navigate = window.goToStep || window.showStep || function(n) {
                const el = document.getElementById('step-' + n);
                if (el) el.scrollIntoView({ behavior: 'smooth' });
            };

            setTimeout(function() {
                try { navigate(8); } catch (err) { console.error(err); }
            }, 700);
        });
    });
</script>