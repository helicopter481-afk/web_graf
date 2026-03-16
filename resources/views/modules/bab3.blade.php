<style>
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

    /* Typography improvements to reduce cramped/rough appearance */
    #stepsContainer,
    #stepsContainer .prose-text {
        font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        font-size: 15px;
        line-height: 1.9;
        letter-spacing: 0.2px;
        text-rendering: optimizeLegibility;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    /* Ensure code/pre blocks are left-aligned and full-width to avoid centred/odd layout */
    #stepsContainer pre,
    #stepsContainer code {
        text-align: left;
        margin-left: 0;
        margin-right: 0;
        padding: 0.75rem;
        overflow-x: auto;
        width: 100%;
        box-sizing: border-box;
        background: rgba(15, 23, 42, 0.02);
        border-radius: 6px;
    }


    /* Slightly stronger weight for interactive UI text */
    .mcq-item,
    .btn-primary,
    .btn-secondary {
        font-weight: 600;
        letter-spacing: 0.15px;
    }

    /* Tweak: raise step-6 only; slightly lower step-7/step-8 to match visual guide
       step-6 stays as-is; step-7 & step-8 get smaller negative offset */
    #step-6>.bg-white {
        margin-top: -2.5rem;
        /* kept raised for 3.5 as requested */
    }

    #step-7>.bg-white,
    #step-8>.bg-white {
        margin-top: -0.6rem;
    }

    @media (min-width: 768px) {
        #step-6>.bg-white {
            margin-top: -2.5rem;
        }

        #step-7>.bg-white,
        #step-8>.bg-white {
            margin-top: -1.1rem;
        }
    }
    /* Target only the step-3 area (3.2) so other code blocks remain unchanged */
    /* Apply styling only to static pre/code blocks; do NOT override ACE editor theme */
    #step-3 pre,
    #step-3 .code-block {
        max-width: 100%;
        margin-left: 0;
        margin-right: 0;
        padding: 1.25rem 1.75rem;
        overflow-x: auto;
        width: 100%;
        box-sizing: border-box;
        background: #0b1520;
        /* deep navy background like example */
        color: #10b981;
        /* pleasant green for code text */
        border-radius: 12px;
        font-size: 14px;
        line-height: 1.9;
        -webkit-font-smoothing: antialiased;
    }

    /* Ensure inline code inside the pre uses the same green tint */
    #step-3 pre code {
        color: #34d399;
    }

    /* Add subtle inner border to match screenshot */
    #step-3 pre {
        box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.03);
    }
</style>

<div class="max-w-5xl mx-auto ">
    <div id="stepsContainer" class="space-y-8">
         {{-- Tarik file-file step dari folder modules/contents/bab3 --}}
        @include('modules.contents.bab3.step0')
        @include('modules.contents.bab3.step1')
        @include('modules.contents.bab3.step2')
        @include('modules.contents.bab3.step3')
        @include('modules.contents.bab3.step4')
        @include('modules.contents.bab3.step5')
        @include('modules.contents.bab3.step6')
    </div>
</div>

<script>
    // Kunci jawaban otomatis untuk pemeriksaan
    const kunciAdjList35 = {
        'A': ['B', 'C'],
        'B': ['A', 'D'],
        'C': ['A', 'E'],
        'D': ['B'],
        'E': ['C']
    };
    const kunciAdjMatrix35 = [
        [0, 1, 1, 0, 0],
        [1, 0, 0, 1, 0],
        [1, 0, 0, 0, 1],
        [0, 1, 0, 0, 0],
        [0, 0, 1, 0, 0]
    ];
    const kunciJumlahKeA35 = 2;
    // ===== LIVE CODE EDITOR 3.5 (REAL PYODIDE) =====
    let pyEditor35 = null;
    let defaultCode35 = '';

    async function initEditor35() {
        if (!window.ace) {
            await new Promise(resolve => {
                const script = document.createElement('script');
                script.src = 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.14/ace.js';
                script.onload = resolve;
                document.head.appendChild(script);
            });
        }
        if (!pyEditor35) {
            pyEditor35 = ace.edit('pyEditor35');
            pyEditor35.setTheme('ace/theme/monokai');
            pyEditor35.session.setMode('ace/mode/python');
            pyEditor35.setOptions({
                fontSize: '14px',
                useSoftTabs: true,
                tabSize: 4,
                showPrintMargin: false
            });
            pyEditor35.setValue(defaultCode35, -1);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        initEditor35();
    });

    async function runPyodide35() {
        if (!pyEditor35) return;
        const code = pyEditor35.getValue();
        const outputDiv = document.getElementById('pyOutput35');
        const statusDiv = document.getElementById('pyStatus35');
        outputDiv.innerHTML = '';
        statusDiv.textContent = 'Running...';
        try {
            await initPyodideRuntime();
            let output = '';
            const origStdout = pyodide.globals.get('print');
            pyodide.globals.set('print', (...args) => {
                output += args.map(String).join(' ') + '\n';
            });
            await pyodide.runPythonAsync(code);
            pyodide.globals.set('print', origStdout); // restore
            outputDiv.textContent = output.trim();
            statusDiv.textContent = 'Ready';
        } catch (e) {
            outputDiv.textContent = e;
            statusDiv.textContent = 'Error';
        }
    }

    function resetEditor35() {
        if (pyEditor35) pyEditor35.setValue(defaultCode35, -1);
        document.getElementById('pyOutput35').innerHTML =
            '<span class="text-slate-500">Klik "Jalankan Kode" untuk melihat output...</span>';
        document.getElementById('hasil35').innerHTML = '';
    }

    async function checkAktivitas35() {
        if (!pyEditor35) return;
        const code = pyEditor35.getValue();
        const hasilDiv = document.getElementById('hasil35');
        hasilDiv.innerHTML = '';
        try {
            await initPyodideRuntime();
            let output = '';
            const origStdout = pyodide.globals.get('print');
            pyodide.globals.set('print', (...args) => {
                output += args.map(String).join(' ') + '\n';
            });
            await pyodide.runPythonAsync(code);
            pyodide.globals.set('print', origStdout);
            output = output.trim();
            // Normalisasi output: hilangkan spasi, kutip, dan baris kosong
            let norm = s => s.replace(/\s+/g, '').replace(/'/g, '"').replace(/\n+/g, '').toLowerCase();
            let outNorm = norm(output);
            // Normalisasi kunci
            let adjListNorm = norm(JSON.stringify(kunciAdjList35));
            let adjMatrixNorm = norm(JSON.stringify(kunciAdjMatrix35));
            let jumlahNorm = String(kunciJumlahKeA35);
            // Cek kemunculan adjacency list, matrix, dan jumlah simpul ke A
            let benar = false;
            if (
                outNorm.includes(adjListNorm) &&
                outNorm.includes(adjMatrixNorm) &&
                outNorm.includes(jumlahNorm)
            ) {
                benar = true;
            }
            if (benar) {
                hasilDiv.innerHTML =
                    '<span class="text-green-700 font-semibold">Jawaban benar! Subbab selesai.</span>';
            } else {
                hasilDiv.innerHTML =
                    '<span class="text-red-600">Output belum sesuai. Pastikan sudah mencetak adjacency list, matrix, dan jumlah simpul yang terhubung ke A.</span>';
            }
        } catch (e) {
            hasilDiv.innerHTML = '<span class="text-red-600">Error: ' + e + '</span>';
        }
    }
    // Aktivitas 3.4 Drag & Match logic
    let drag34Jawaban = {
        'Kasus 1: Menyimpan data Peta Jalan Raya (banyak kota, tapi jalan antar kota terbatas).': 'list',
        'Kasus 2: Sistem yang sering mengecek “Apakah A dan B berteman?” secara instan ribuan kali per detik.': 'matrix',
        'Kasus 3: Aplikasi Medsos di mana user baru mendaftar setiap detik (Simpul bertambah terus).': 'list',
        'Kasus 4: Graf kecil & padat di mana hampir semua orang saling kenal (Komunitas tertutup).': 'matrix',
    };

    function checkDragMatch34() {
        let benar = 0;
        let total = Object.keys(drag34Jawaban).length;
        // Cek setiap drop-target
        document.querySelectorAll('.drop-target-34').forEach(target => {
            let accept = target.getAttribute('data-accept');
            let items = Array.from(target.querySelectorAll('.draggable-34'));
            items.forEach(item => {
                let text = item.textContent.trim();
                if (drag34Jawaban[text] === accept) {
                    benar++;
                }
            });
        });
        let skor = Math.round((benar / total) * 100);
        let hasil = `Skor kamu: <span class="font-bold">${skor}</span> dari 100`;
        if (benar === total) {
            hasil += '<br><span class="text-green-600 font-semibold">Semua jawaban benar!</span>';
        } else {
            hasil += `<br><span class="text-slate-600">Ada jawaban yang masih kurang tepat, coba lagi!</span>`;
        }
        document.getElementById('hasil34').innerHTML = hasil;
    }

    function resetDragMatch34() {
        // Kembalikan semua item ke area awal
        let dragItems = document.getElementById('drag-items-34');
        document.querySelectorAll('.draggable-34').forEach(item => {
            dragItems.appendChild(item);
        });
        document.getElementById('hasil34').innerHTML = '';
    }

    // Drag & Drop event listeners
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.draggable-34').forEach(item => {
            item.addEventListener('dragstart', function(e) {
                e.dataTransfer.setData('text/plain', item.textContent.trim());
                setTimeout(() => item.classList.add('opacity-50'), 0);
            });
            item.addEventListener('dragend', function(e) {
                item.classList.remove('opacity-50');
            });
        });
        document.querySelectorAll('.drop-target-34').forEach(target => {
            target.addEventListener('dragover', function(e) {
                e.preventDefault();
                target.classList.add('ring-2', 'ring-blue-400');
            });
            target.addEventListener('dragleave', function(e) {
                target.classList.remove('ring-2', 'ring-blue-400');
            });
            target.addEventListener('drop', function(e) {
                e.preventDefault();
                target.classList.remove('ring-2', 'ring-blue-400');
                let text = e.dataTransfer.getData('text/plain');
                let dragItems = document.querySelectorAll('.draggable-34');
                dragItems.forEach(item => {
                    if (item.textContent.trim() === text) {
                        target.appendChild(item);
                    }
                });
            });
        });
    });
    // BAB 3: Representasi Graf di Komputer
    console.log('BAB 3: Representasi Graf di Komputer loaded');

    // Variables for Pyodide, ACE editors, and vis.js networks
    let pyEditor31 = null;
    let pyEditor32 = null;
    let pyEditor33 = null;
    let pyEditorAkt32 = null;
    let pyodide = null;
    let pyodideLoaded = false;
    let vis31Network = null;
    let vis32Network = null;
    let vis33Network = null;

    // Default code for Section 3.1
    const defaultCode31 = `# Representasi sederhana graf rute antar-kota

connections = {
    'A': ['B', 'C'],
    'B': ['A', 'D'],
    'C': ['A', 'D'],
    'D': ['B', 'C']
}

for node, neighbors in connections.items():
    print(node, "terhubung dengan:", neighbors)`;

    // Default code for Section 3.2
    const defaultCode32 = `# Representasi graf dengan Adjacency List (rute antar-kota)

graph_list = {
    'A': ['B', 'C'],
    'B': ['A', 'D'],
    'C': ['A', 'D'],
    'D': ['B', 'C']
}

print("Daftar keterhubungan graf:")
for v, e in graph_list.items():
    print(v, ":", e)`;

    // Default code for Aktivitas 3.2
    const defaultCodeAkt32 = `# Tugas: Tambahkan simpul 'E' yang terhubung dengan 'B'
# Jangan lupa update juga daftar koneksi B!

graph_list = {
    'A': ['B', 'C'],
    'B': ['A', 'D'],
    'C': ['A', 'D'],
    'D': ['B', 'C']
    # Tambahkan simpul E di sini
}

print("Daftar keterhubungan graf:")
for v, e in graph_list.items():
    print(v, ":", e)`;

    // Default code for Section 3.3
    const defaultCode33 = `import numpy as np

# Membuat adjacency matrix untuk graf A, B, C, D
# Urutan: A=0, B=1, C=2, D=3

matrix = np.array([
    [0, 1, 1, 0],  # A terhubung ke B dan C
    [1, 0, 0, 1],  # B terhubung ke A dan D
    [1, 0, 0, 1],  # C terhubung ke A dan D
    [0, 1, 1, 0]   # D terhubung ke B dan C
])

print("Matriks Keterhubungan:")
print(matrix)`;

    // Answers for Aktivitas 3.1
    const answers31 = {
        'q31_1': 'A',
        'q31_2': 'B',
        'q31_3': 'B'
    };

    let userAnswers31 = {};

    // Answers for Aktivitas 3.3
    const answers33 = {
        'q33_1': 'A', // A dan C terhubung dengan B
        'q33_2': 'B', // C tidak terhubung ke A
        'q33_3': 'A' // Simpul B tidak terhubung ke dirinya sendiri
    };

    let userAnswers33 = {};

    // ========== LOAD ACE EDITOR ==========
    async function loadAce() {
        if (window.ace) return;
        await new Promise(resolve => {
            const script = document.createElement('script');
            script.src = 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.14/ace.js';
            script.onload = resolve;
            document.head.appendChild(script);
        });
    }

    // ========== PYODIDE EDITOR 3.1 ==========
    async function initEditor31() {
        await loadAce();
        if (!pyEditor31) {
            pyEditor31 = ace.edit('pyEditor31');
            pyEditor31.setTheme('ace/theme/monokai');
            pyEditor31.session.setMode('ace/mode/python');
            pyEditor31.setOptions({
                fontSize: '14px',
                useSoftTabs: true,
                tabSize: 4,
                showPrintMargin: false
            });
            pyEditor31.setValue(defaultCode31, -1);
        }
    }

    // ========== PYODIDE EDITOR 3.2 ==========
    async function initEditor32() {
        await loadAce();
        if (!pyEditor32) {
            pyEditor32 = ace.edit('pyEditor32');
            pyEditor32.setTheme('ace/theme/monokai');
            pyEditor32.session.setMode('ace/mode/python');
            pyEditor32.setOptions({
                fontSize: '14px',
                useSoftTabs: true,
                tabSize: 4,
                showPrintMargin: false
            });
            pyEditor32.setValue(defaultCode32, -1);
        }
    }

    // ========== PYODIDE EDITOR AKTIVITAS 3.2 ==========
    async function initEditorAkt32() {
        await loadAce();
        if (!pyEditorAkt32) {
            pyEditorAkt32 = ace.edit('pyEditorAkt32');
            pyEditorAkt32.setTheme('ace/theme/monokai');
            pyEditorAkt32.session.setMode('ace/mode/python');
            pyEditorAkt32.setOptions({
                fontSize: '14px',
                useSoftTabs: true,
                tabSize: 4,
                showPrintMargin: false
            });
            pyEditorAkt32.setValue(defaultCodeAkt32, -1);
        }
    }

    // Fungsi untuk init Pyodide
    async function initPyodideRuntime() {
        if (pyodideLoaded) return pyodide;

        const status = document.getElementById('pyStatus31') || document.getElementById('pyStatus32');
        if (status) status.textContent = 'Loading Pyodide...';

        try {
            // Cek apakah script sudah dimuat
            if (!window.loadPyodide) {
                await new Promise((resolve, reject) => {
                    const s = document.createElement('script');
                    s.src = 'https://cdn.jsdelivr.net/pyodide/v0.24.1/full/pyodide.js';
                    s.onload = resolve;
                    s.onerror = reject;
                    document.head.appendChild(s);
                });
            }

            // Panggil window.loadPyodide dari library
            pyodide = await window.loadPyodide({
                indexURL: 'https://cdn.jsdelivr.net/pyodide/v0.24.1/full/'
            });

            pyodideLoaded = true;
            if (status) status.textContent = 'Ready';
            return pyodide;
        } catch (err) {
            if (status) status.textContent = 'Error';
            console.error('Pyodide load error:', err);
            return null;
        }
    }

    async function runPyodide31() {
        if (!pyEditor31) {
            await initEditor31();
        }

        if (!pyEditor31) {
            console.error('Editor tidak dapat diinisialisasi');
            return;
        }

        const code = pyEditor31.getValue().trim();
        const output = document.getElementById('pyOutput31');
        const status = document.getElementById('pyStatus31');

        output.innerHTML = '';

        if (!code) {
            output.textContent = '(Kode kosong)';
            return;
        }

        status.textContent = 'Running...';

        try {
            await initPyodideRuntime();

            if (!pyodide) {
                output.innerHTML = '<span class="text-red-400">Error: Pyodide gagal dimuat</span>';
                status.textContent = 'Error';
                return;
            }

            pyodide.runPython(`
import sys
from io import StringIO
sys.stdout = StringIO()
            `);

            pyodide.runPython(code);

            const stdout = pyodide.runPython('sys.stdout.getvalue()');
            output.textContent = stdout || '(Tidak ada output)';
            status.textContent = 'Ready';

        } catch (err) {
            output.innerHTML = '<span class="text-red-400">Error:\n' + err.message + '</span>';
            status.textContent = 'Error';
        }
    }

    async function runPyodide32() {
        if (!pyEditor32) {
            await initEditor32();
        }

        if (!pyEditor32) {
            console.error('Editor tidak dapat diinisialisasi');
            return;
        }

        const code = pyEditor32.getValue().trim();
        const output = document.getElementById('pyOutput32');
        const status = document.getElementById('pyStatus32');

        output.innerHTML = '';

        if (!code) {
            output.textContent = '(Kode kosong)';
            return;
        }

        status.textContent = 'Running...';

        try {
            await initPyodideRuntime();

            if (!pyodide) {
                output.innerHTML = '<span class="text-red-400">Error: Pyodide gagal dimuat</span>';
                status.textContent = 'Error';
                return;
            }

            pyodide.runPython(`
import sys
from io import StringIO
sys.stdout = StringIO()
            `);

            pyodide.runPython(code);

            const stdout = pyodide.runPython('sys.stdout.getvalue()');
            output.textContent = stdout || '(Tidak ada output)';
            status.textContent = 'Ready';

        } catch (err) {
            output.innerHTML = '<span class="text-red-400">Error:\n' + err.message + '</span>';
            status.textContent = 'Error';
        }
    }

    function resetEditor31() {
        if (pyEditor31) {
            pyEditor31.setValue(defaultCode31, -1);
        } else {
            initEditor31();
        }
        document.getElementById('pyOutput31').innerHTML =
            '<span class="text-slate-500">Klik "Jalankan Kode" untuk melihat output...</span>';
    }

    function resetEditor32() {
        if (pyEditor32) {
            pyEditor32.setValue(defaultCode32, -1);
        } else {
            initEditor32();
        }
        document.getElementById('pyOutput32').innerHTML =
            '<span class="text-slate-500">Klik "Jalankan Kode" untuk melihat output...</span>';
    }

    // ========== RUN PYODIDE AKTIVITAS 3.2 ==========
    async function runPyodideAkt32() {
        if (!pyEditorAkt32) {
            await initEditorAkt32();
        }

        if (!pyEditorAkt32) {
            console.error('Editor aktivitas tidak dapat diinisialisasi');
            return;
        }

        const code = pyEditorAkt32.getValue().trim();
        const output = document.getElementById('pyOutputAkt32');
        const status = document.getElementById('pyStatusAkt32');

        output.innerHTML = '';

        if (!code) {
            output.textContent = '(Kode kosong)';
            return;
        }

        status.textContent = 'Running...';

        try {
            await initPyodideRuntime();

            if (!pyodide) {
                output.innerHTML = '<span class="text-red-400">Error: Pyodide gagal dimuat</span>';
                status.textContent = 'Error';
                return;
            }

            pyodide.runPython(`
import sys
from io import StringIO
sys.stdout = StringIO()
            `);

            pyodide.runPython(code);

            const stdout = pyodide.runPython('sys.stdout.getvalue()');
            output.textContent = stdout || '(Tidak ada output)';
            status.textContent = 'Ready';

        } catch (err) {
            output.innerHTML = '<span class="text-red-400">Error:\n' + err.message + '</span>';
            status.textContent = 'Error';
        }
    }

    function resetEditorAkt32() {
        if (pyEditorAkt32) {
            pyEditorAkt32.setValue(defaultCodeAkt32, -1);
        } else {
            initEditorAkt32();
        }
        document.getElementById('pyOutputAkt32').innerHTML =
            '<span class="text-slate-500">Klik "Jalankan" untuk melihat output...</span>';
        document.getElementById('hasil32').innerHTML = '';
    }

    // ========== VISUALISASI GRAF 3.1 ==========
    function initGraph31() {
        const container = document.getElementById('vis31Graph');
        if (!container) return;

        const nodes = new vis.DataSet([{
                id: 'A',
                label: 'A',
                x: 0,
                y: -80,
                color: {
                    background: '#3b82f6',
                    border: '#1e40af'
                },
                font: {
                    color: '#1f2937',
                    size: 16,
                    bold: true
                }
            },
            {
                id: 'B',
                label: 'B',
                x: -100,
                y: 40,
                color: {
                    background: '#60a5fa',
                    border: '#3b82f6'
                },
                font: {
                    color: '#1f2937',
                    size: 16,
                    bold: true
                }
            },
            {
                id: 'C',
                label: 'C',
                x: 100,
                y: 40,
                color: {
                    background: '#34d399',
                    border: '#10b981'
                },
                font: {
                    color: '#1f2937',
                    size: 16,
                    bold: true
                }
            },
            {
                id: 'D',
                label: 'D',
                x: 0,
                y: 120,
                color: {
                    background: '#f59e0b',
                    border: '#d97706'
                },
                font: {
                    color: '#1f2937',
                    size: 16,
                    bold: true
                }
            }
        ]);

        const edges = new vis.DataSet([{
                from: 'A',
                to: 'B',
                color: '#64748b',
                width: 2
            },
            {
                from: 'A',
                to: 'C',
                color: '#64748b',
                width: 2
            },
            {
                from: 'B',
                to: 'D',
                color: '#64748b',
                width: 2
            },
            {
                from: 'C',
                to: 'D',
                color: '#64748b',
                width: 2
            }
        ]);

        const options = {
            physics: {
                enabled: false
            },
            nodes: {
                shape: 'dot',
                size: 25,
                borderWidth: 3,
                shadow: true
            },
            edges: {
                color: {
                    color: '#64748b',
                    highlight: '#3b82f6'
                },
                width: 2,
                smooth: {
                    type: 'continuous'
                }
            },
            interaction: {
                hover: true,
                dragNodes: true,
                zoomView: false,
                dragView: false
            }
        };

        vis31Network = new vis.Network(container, {
            nodes,
            edges
        }, options);

        vis31Network.once('afterDrawing', function() {
            vis31Network.fit({
                animation: false
            });
        });
    }

    // ========== VISUALISASI GRAF 3.2 ==========
    function initGraph32() {
        const container = document.getElementById('vis32Graph');
        if (!container) return;

        const nodes = new vis.DataSet([{
                id: 'A',
                label: 'A',
                x: 0,
                y: -80,
                color: {
                    background: '#3b82f6',
                    border: '#1e40af'
                },
                font: {
                    color: '#1f2937',
                    size: 16,
                    bold: true
                }
            },
            {
                id: 'B',
                label: 'B',
                x: -100,
                y: 40,
                color: {
                    background: '#60a5fa',
                    border: '#3b82f6'
                },
                font: {
                    color: '#1f2937',
                    size: 16,
                    bold: true
                }
            },
            {
                id: 'C',
                label: 'C',
                x: 100,
                y: 40,
                color: {
                    background: '#34d399',
                    border: '#10b981'
                },
                font: {
                    color: '#1f2937',
                    size: 16,
                    bold: true
                }
            },
            {
                id: 'D',
                label: 'D',
                x: 0,
                y: 120,
                color: {
                    background: '#f59e0b',
                    border: '#d97706'
                },
                font: {
                    color: '#1f2937',
                    size: 16,
                    bold: true
                }
            }
        ]);

        const edges = new vis.DataSet([{
                from: 'A',
                to: 'B',
                color: '#64748b',
                width: 2
            },
            {
                from: 'A',
                to: 'C',
                color: '#64748b',
                width: 2
            },
            {
                from: 'B',
                to: 'D',
                color: '#64748b',
                width: 2
            },
            {
                from: 'C',
                to: 'D',
                color: '#64748b',
                width: 2
            }
        ]);

        const options = {
            physics: {
                enabled: false
            },
            nodes: {
                shape: 'dot',
                size: 25,
                borderWidth: 3,
                shadow: true
            },
            edges: {
                color: {
                    color: '#64748b',
                    highlight: '#3b82f6'
                },
                width: 2,
                smooth: {
                    type: 'continuous'
                }
            },
            interaction: {
                hover: true,
                dragNodes: true,
                zoomView: false,
                dragView: false
            }
        };

        vis32Network = new vis.Network(container, {
            nodes,
            edges
        }, options);

        vis32Network.once('afterDrawing', function() {
            vis32Network.fit({
                animation: false
            });
        });
    }

    function resetGraph31() {
        if (vis31Network) {
            vis31Network.destroy();
            vis31Network = null;
        }
        setTimeout(initGraph31, 50);
    }

    function resetGraph32() {
        if (vis32Network) {
            vis32Network.destroy();
            vis32Network = null;
        }
        setTimeout(initGraph32, 50);
    }

    function toggleGraphInfo31() {
        const info = document.getElementById('graphInfo31');
        if (info) {
            info.classList.toggle('hidden');
        }
    }

    // ========== AKTIVITAS 3.1 ==========
    function selectMCQ31(element, questionId, answer) {
        const parent = element.parentElement;
        parent.querySelectorAll('.mcq-item').forEach(item => {
            item.classList.remove('selected');
            const span = item.querySelector('span');
            if (span) span.textContent = span.textContent.replace('◉', '○');
        });

        element.classList.add('selected');
        const span = element.querySelector('span');
        if (span) span.textContent = span.textContent.replace('○', '◉');

        userAnswers31[questionId] = answer;
    }

    function checkAktivitas31() {
        let correctCount = 0;
        const totalQuestions = Object.keys(answers31).length;

        for (let qId in answers31) {
            if (userAnswers31[qId] === answers31[qId]) {
                correctCount++;
            }
        }

        const percentage = Math.round((correctCount / totalQuestions) * 100);
        const hasilEl = document.getElementById('hasil31');

        if (percentage === 100) {
            hasilEl.innerHTML = `<div class="bg-green-100 border border-green-300 rounded-lg p-4">
                <p class="text-green-800 font-semibold">Mantap! Skor: ${correctCount}/${totalQuestions} (${percentage}%)</p>
                <p class="text-green-700 text-sm mt-1">Kamu sudah paham konsep representasi graf. Lanjut ke materi berikutnya!</p>
            </div>`;
        } else if (percentage >= 60) {
            hasilEl.innerHTML = `<div class="bg-yellow-100 border border-yellow-300 rounded-lg p-4">
                <p class="text-yellow-800 font-semibold">Lumayan! Skor: ${correctCount}/${totalQuestions} (${percentage}%)</p>
                <p class="text-yellow-700 text-sm mt-1">Coba baca lagi penjelasannya ya, biar makin paham!</p>
            </div>`;
        } else {
            hasilEl.innerHTML = `<div class="bg-red-100 border border-red-300 rounded-lg p-4">
                <p class="text-red-800 font-semibold">Skor: ${correctCount}/${totalQuestions} (${percentage}%)</p>
                <p class="text-red-700 text-sm mt-1">Jangan menyerah! Scroll ke atas dan pelajari materinya lagi, lalu coba lagi ya.</p>
            </div>`;
        }
    }

    function resetAktivitas31() {
        userAnswers31 = {};
        document.querySelectorAll('[id^="q31_box"] .mcq-item').forEach(item => {
            item.classList.remove('selected');
            const span = item.querySelector('span');
            if (span) span.textContent = span.textContent.replace('◉', '○');
        });
        document.getElementById('hasil31').innerHTML = '';
    }

    // ========== AKTIVITAS 3.2 ==========
    async function checkAktivitas32() {
        if (!pyEditorAkt32) {
            await initEditorAkt32();
        }

        const code = pyEditorAkt32.getValue();
        const hasilEl = document.getElementById('hasil32');

        // Cek apakah kode mengandung 'E' sebagai key di dictionary
        const hasE = code.includes("'E'") || code.includes('"E"');

        // Cek apakah E terhubung dengan B (dalam list)
        const pattern1 = /'E'\s*:\s*\[.*'B'.*\]/;
        const pattern2 = /"E"\s*:\s*\[.*"B".*\]/;
        const eConnectedToB = pattern1.test(code) || pattern2.test(code);

        // Cek apakah B juga terhubung ke E (dua arah)
        const pattern3 = /'B'\s*:\s*\[.*'E'.*\]/;
        const pattern4 = /"B"\s*:\s*\[.*"E".*\]/;
        const bConnectedToE = pattern3.test(code) || pattern4.test(code);

        if (hasE && eConnectedToB && bConnectedToE) {
            hasilEl.innerHTML = `<div class="bg-green-100 border border-green-300 rounded-lg p-4">
                <p class="text-green-800 font-semibold">Mantap! Jawabanmu benar!</p>
                <p class="text-green-700 text-sm mt-1">Kamu sudah menambahkan kota E dan juga memperbarui daftar koneksi B. Ini menunjukkan pemahaman yang baik tentang graf tak berarah. Progress submateri 3.2 selesai!</p>
            </div>`;
        } else if (hasE && eConnectedToB) {
            hasilEl.innerHTML = `<div class="bg-yellow-100 border border-yellow-300 rounded-lg p-4">
                <p class="text-yellow-800 font-semibold">Hampir benar!</p>
                <p class="text-yellow-700 text-sm mt-1">Kota E sudah terhubung ke B. Namun karena graf tak berarah, kamu juga perlu menambahkan 'E' ke dalam daftar koneksi 'B'. Contoh: 'B': ['A', 'D', 'E']</p>
            </div>`;
        } else if (hasE) {
            hasilEl.innerHTML = `<div class="bg-yellow-100 border border-yellow-300 rounded-lg p-4">
                <p class="text-yellow-800 font-semibold">Hampir!</p>
                <p class="text-yellow-700 text-sm mt-1">Kota E sudah ada, tapi pastikan E terhubung dengan B. Contoh: 'E': ['B']</p>
            </div>`;
        } else {
            hasilEl.innerHTML = `<div class="bg-red-100 border border-red-300 rounded-lg p-4">
                <p class="text-red-800 font-semibold">Belum tepat.</p>
                <p class="text-red-700 text-sm mt-1">Tambahkan kota 'E' yang terhubung dengan 'B' ke dalam dictionary. Tambahkan baris baru seperti: 'E': ['B']</p>
            </div>`;
        }
    }

    // ========== PYODIDE EDITOR 3.3 ==========
    async function initEditor33() {
        await loadAce();
        if (!pyEditor33) {
            pyEditor33 = ace.edit('pyEditor33');
            pyEditor33.setTheme('ace/theme/monokai');
            pyEditor33.session.setMode('ace/mode/python');
            pyEditor33.setOptions({
                fontSize: '14px',
                useSoftTabs: true,
                tabSize: 4,
                showPrintMargin: false
            });
            pyEditor33.setValue(defaultCode33, -1);
        }
    }

    async function runPyodide33() {
        if (!pyEditor33) {
            await initEditor33();
        }

        if (!pyEditor33) {
            console.error('Editor tidak dapat diinisialisasi');
            return;
        }

        const code = pyEditor33.getValue().trim();
        const output = document.getElementById('pyOutput33');
        const status = document.getElementById('pyStatus33');

        output.innerHTML = '';

        if (!code) {
            output.textContent = '(Kode kosong)';
            return;
        }

        status.textContent = 'Running...';

        try {
            await initPyodideRuntime();

            if (!pyodide) {
                output.innerHTML = '<span class="text-red-400">Error: Pyodide gagal dimuat</span>';
                status.textContent = 'Error';
                return;
            }

            // Load numpy jika belum
            await pyodide.loadPackage('numpy');

            pyodide.runPython(`
import sys
from io import StringIO
sys.stdout = StringIO()
            `);

            pyodide.runPython(code);

            const stdout = pyodide.runPython('sys.stdout.getvalue()');
            output.textContent = stdout || '(Tidak ada output)';
            status.textContent = 'Ready';

        } catch (err) {
            output.innerHTML = '<span class="text-red-400">Error:\n' + err.message + '</span>';
            status.textContent = 'Error';
        }
    }

    function resetEditor33() {
        if (pyEditor33) {
            pyEditor33.setValue(defaultCode33, -1);
        } else {
            initEditor33();
        }
        document.getElementById('pyOutput33').innerHTML =
            '<span class="text-slate-500">Klik "Jalankan Kode" untuk melihat output...</span>';
    }

    // ========== VISUALISASI GRAF 3.3 ==========
    function initGraph33() {
        const container = document.getElementById('vis33Graph');
        if (!container) return;

        const nodes = new vis.DataSet([{
                id: 'A',
                label: 'A',
                x: 0,
                y: -80,
                color: {
                    background: '#3b82f6',
                    border: '#1e40af'
                },
                font: {
                    color: '#1f2937',
                    size: 16,
                    bold: true
                }
            },
            {
                id: 'B',
                label: 'B',
                x: -100,
                y: 40,
                color: {
                    background: '#60a5fa',
                    border: '#3b82f6'
                },
                font: {
                    color: '#1f2937',
                    size: 16,
                    bold: true
                }
            },
            {
                id: 'C',
                label: 'C',
                x: 100,
                y: 40,
                color: {
                    background: '#34d399',
                    border: '#10b981'
                },
                font: {
                    color: '#1f2937',
                    size: 16,
                    bold: true
                }
            },
            {
                id: 'D',
                label: 'D',
                x: 0,
                y: 120,
                color: {
                    background: '#f59e0b',
                    border: '#d97706'
                },
                font: {
                    color: '#1f2937',
                    size: 16,
                    bold: true
                }
            }
        ]);

        const edges = new vis.DataSet([{
                from: 'A',
                to: 'B',
                color: '#64748b',
                width: 2
            },
            {
                from: 'A',
                to: 'C',
                color: '#64748b',
                width: 2
            },
            {
                from: 'B',
                to: 'D',
                color: '#64748b',
                width: 2
            },
            {
                from: 'C',
                to: 'D',
                color: '#64748b',
                width: 2
            }
        ]);

        const options = {
            physics: {
                enabled: false
            },
            nodes: {
                shape: 'dot',
                size: 25,
                borderWidth: 3,
                shadow: true
            },
            edges: {
                color: {
                    color: '#64748b',
                    highlight: '#3b82f6'
                },
                width: 2,
                smooth: {
                    type: 'continuous'
                }
            },
            interaction: {
                hover: true,
                dragNodes: true,
                zoomView: false,
                dragView: false
            }
        };

        vis33Network = new vis.Network(container, {
            nodes,
            edges
        }, options);

        vis33Network.once('afterDrawing', function() {
            vis33Network.fit({
                animation: false
            });
        });
    }

    function resetGraph33() {
        if (vis33Network) {
            vis33Network.destroy();
            vis33Network = null;
        }
        setTimeout(initGraph33, 50);
    }

    // ========== HIGHLIGHT NODE 3.3 (Interaktif) ==========
    const nodeConnections33 = {
        'A': {
            connections: ['B', 'C'],
            row: [0, 1, 1, 0],
            description: 'Simpul A terhubung dengan B dan C. Lihat baris A di matriks: nilai 1 ada di kolom B dan C.'
        },
        'B': {
            connections: ['A', 'D'],
            row: [1, 0, 0, 1],
            description: 'Simpul B terhubung dengan A dan D. Lihat baris B di matriks: nilai 1 ada di kolom A dan D.'
        },
        'C': {
            connections: ['A', 'D'],
            row: [1, 0, 0, 1],
            description: 'Simpul C terhubung dengan A dan D. Lihat baris C di matriks: nilai 1 ada di kolom A dan D.'
        },
        'D': {
            connections: ['B', 'C'],
            row: [0, 1, 1, 0],
            description: 'Simpul D terhubung dengan B dan C. Lihat baris D di matriks: nilai 1 ada di kolom B dan C.'
        }
    };

    function highlightNode33(node) {
        const info = nodeConnections33[node];
        const infoEl = document.getElementById('highlightInfo33');

        if (info) {
            const connStr = info.connections.join(' dan ');
            const rowStr = '[' + info.row.join(', ') + ']';

            infoEl.innerHTML = `
                <div class="space-y-2">
                    <p class="font-semibold text-slate-900">Simpul ${node} terhubung dengan: <span class="text-blue-600">${connStr}</span></p>
                    <p class="text-sm text-slate-700">Baris matriks untuk ${node}: <code class="bg-slate-200 px-2 py-1 rounded">${rowStr}</code></p>
                    <p class="text-sm text-slate-600">${info.description}</p>
                </div>
            `;
        }
    }

    function resetHighlight33() {
        const infoEl = document.getElementById('highlightInfo33');
        infoEl.innerHTML =
            '<p class="text-slate-600 text-sm">Klik salah satu tombol simpul di atas untuk melihat koneksinya.</p>';
    }

    // ========== AKTIVITAS 3.3 ==========
    function selectMCQ33(element, questionId, answer) {
        const parent = element.parentElement;
        parent.querySelectorAll('.mcq-item').forEach(item => {
            item.classList.remove('selected');
            const span = item.querySelector('span');
            if (span) {
                span.innerHTML = span.innerHTML.replace('&#9745;', '&#9744;');
            }
        });

        element.classList.add('selected');
        const span = element.querySelector('span');
        if (span) {
            span.innerHTML = span.innerHTML.replace('&#9744;', '&#9745;');
        }

        userAnswers33[questionId] = answer;
    }

    function checkAktivitas33() {
        let correctCount = 0;
        const totalQuestions = Object.keys(answers33).length;

        for (let qId in answers33) {
            if (userAnswers33[qId] === answers33[qId]) {
                correctCount++;
            }
        }

        const percentage = Math.round((correctCount / totalQuestions) * 100);
        const hasilEl = document.getElementById('hasil33');

        if (percentage === 100) {
            hasilEl.innerHTML = `<div class="bg-green-100 border border-green-300 rounded-lg p-4">
                <p class="text-green-800 font-semibold">Mantap! Skor: ${correctCount}/${totalQuestions} (${percentage}%)</p>
                <p class="text-green-700 text-sm mt-1">Kamu sudah bisa membaca adjacency matrix dengan baik. Pemahaman tentang indeks dan nilai matriks sudah tepat!</p>
            </div>`;
        } else if (percentage >= 60) {
            hasilEl.innerHTML = `<div class="bg-yellow-100 border border-yellow-300 rounded-lg p-4">
                <p class="text-yellow-800 font-semibold">Lumayan! Skor: ${correctCount}/${totalQuestions} (${percentage}%)</p>
                <p class="text-yellow-700 text-sm mt-1">Coba perhatikan lagi cara membaca indeks matriks. Ingat: baris adalah simpul asal, kolom adalah simpul tujuan.</p>
            </div>`;
        } else {
            hasilEl.innerHTML = `<div class="bg-red-100 border border-red-300 rounded-lg p-4">
                <p class="text-red-800 font-semibold">Skor: ${correctCount}/${totalQuestions} (${percentage}%)</p>
                <p class="text-red-700 text-sm mt-1">Jangan menyerah! Scroll ke atas dan pelajari cara membaca matriks lagi, lalu coba lagi.</p>
            </div>`;
        }
    }

    function resetAktivitas33() {
        userAnswers33 = {};

        document.querySelectorAll('[id^="q33_box"] .mcq-item').forEach(item => {
            item.classList.remove('selected');
            const span = item.querySelector('span');
            if (span) {
                span.innerHTML = span.innerHTML.replace('&#9745;', '&#9744;');
            }
        });

        document.getElementById('hasil33').innerHTML = '';
    }

    // ========== INITIALIZATION ==========
    document.addEventListener('DOMContentLoaded', function() {
        console.log('BAB 3 content loaded');

        // Init graph jika vis tersedia
        if (typeof vis !== 'undefined') {
            initGraph31();
            initGraph32();
            initGraph33();
        }

        // Init editor
        initEditor31();
    });

    // Re-initialize when steps become active
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.target.classList.contains('step-active')) {
                const stepId = mutation.target.id;
                setTimeout(() => {
                    if (stepId === 'step-2') {
                        initEditor31();
                        if (typeof vis !== 'undefined' && !vis31Network) {
                            initGraph31();
                        }
                    } else if (stepId === 'step-3') {
                        initEditor32();
                        initEditorAkt32();
                        if (typeof vis !== 'undefined' && !vis32Network) {
                            initGraph32();
                        }
                    } else if (stepId === 'step-4') {
                        initEditor33();
                        if (typeof vis !== 'undefined' && !vis33Network) {
                            initGraph33();
                        }
                    }
                }, 100);
            }
        });
    });

    // Observe all step elements
    document.querySelectorAll('[id^="step-"]').forEach(step => {
        observer.observe(step, {
            attributes: true,
            attributeFilter: ['class']
        });
    });

    // ===== quiz materi 3 (MCQ) =====
    const answers8 = {};
    const correctAnswers8 = {
        q1: 'B',
        q2: 'A',
        q3: 'C',
        q4: 'A',
        q5: 'B',
        q6: 'B',
        q7: 'B',
        q8: 'B',
        q9: 'A',
        q10: 'C'
    };

    function selectMCQ8(element, questionId, answer) {
        const parent = element.parentElement;
        parent.querySelectorAll('.mcq-item').forEach(item => item.classList.remove('selected'));
        element.classList.add('selected');
        answers8[questionId] = answer;
    }

    function checkAnswers8() {
        let score = 0;
        const totalQuestions = Object.keys(correctAnswers8).length;

        Object.keys(correctAnswers8).forEach(q => {
            if (answers8[q] === correctAnswers8[q]) score++;
        });

        const feedback = document.getElementById('feedback8');
        if (!feedback) return;

        if (score === totalQuestions) {
            feedback.innerHTML = '<p class="text-green-600 font-semibold">Semua jawaban benar! Selamat.</p>';
            document.getElementById('completion8').classList.remove('hidden');
            document.getElementById('btnNext8').disabled = false;
            document.getElementById('btnNext8').style.opacity = '1';
            document.getElementById('btnNext8').style.cursor = 'pointer';
            document.getElementById('btnNext8').innerHTML = 'Lanjut ke materi 4 →';

            // Save progress (mark chapter 3 completed)
            try {
                let completed = JSON.parse(localStorage.getItem('completedChapters') || '[]');
                if (!completed.includes(3)) {
                    completed.push(3);
                    localStorage.setItem('completedChapters', JSON.stringify(completed));
                }
            } catch (e) {
                console.warn(e);
            }
        } else if (score >= 7) {
            feedback.innerHTML = '<p class="text-blue-600 font-semibold">Skor: ' + score + '/' + totalQuestions +
                '. Bagus! Coba perbaiki jawaban yang kurang tepat.</p>';
        } else if (score >= 5) {
            feedback.innerHTML = '<p class="text-amber-600 font-semibold">Skor: ' + score + '/' + totalQuestions +
                '. Cukup baik. Periksa kembali jawabanmu.</p>';
        } else {
            feedback.innerHTML = '<p class="text-red-600 font-semibold">Skor: ' + score + '/' + totalQuestions +
                '. Baca kembali materinya dan coba lagi.</p>';
        }
    }

    function resetEvaluasi8() {
        Object.keys(correctAnswers8).forEach(q => {
            delete answers8[q];
            const items = document.querySelectorAll(`[onclick*="'${q}'"]`);
            items.forEach(item => item.classList.remove('selected'));
        });

        const feedback = document.getElementById('feedback8');
        if (feedback) feedback.innerHTML = '';

        const completion = document.getElementById('completion8');
        if (completion) completion.classList.add('hidden');

        const btn = document.getElementById('btnNext8');
        if (btn) {
            btn.disabled = true;
            btn.style.opacity = '0.5';
            btn.style.cursor = 'not-allowed';
            btn.innerHTML = 'Selesaikan Quiz untuk Lanjut';
        }
    }

    function goToNextBab3() {
        window.location.href = '/module/bab-4';
    }
</script>
