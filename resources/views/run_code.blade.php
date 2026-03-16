<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Jalankan Kode — Pyodide Editor</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class', // PASTIKAN DARK MODE AKTIF DI FILE INI JUGA
            theme: {
                extend: {
                    colors: {
                        primary: '#2563eb',
                        slatebg: '#f8fafc',
                        darkbase: '#0B1120',
                        darkcard: '#111827',
                        darkborder: '#1F2937'
                    },
                    boxShadow: {
                        soft: '0 4px 20px -2px rgba(0,0,0,0.05)'
                    },
                    borderRadius: {
                        '2xl': '1rem'
                    },
                }
            }
        }
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Scale tampilan agar 100% browser terlihat seperti 110% */
        html { font-size: 110%; }
        @media (max-width: 768px) { html { font-size: 100%; } }
        
        body { transition: background-color 0.3s, color 0.3s; }
        
        /* Dark Mode Customization */
        html.dark body { background-color: #0B1120; color: #F1F5F9; }
        html.dark .glass-panel { 
            background: #111827; 
            border-color: #1F2937; 
            box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.4);
        }
    </style>
</head>

<body class="bg-slatebg text-slate-800 antialiased">

    @php
        $user = auth()->user() ?? (object) ['name' => 'Nama Mahasiswa', 'role' => 'Student'];
    @endphp

    @include('includes.header')
    @include('includes.sidebar')

    <main class="pt-[77px] md:pl-64 flex flex-col h-screen">
        <div class="flex-1 overflow-y-auto px-5 sm:px-10 py-8">
            <div class="max-w-6xl mx-auto">
                
                <h1 class="text-2xl sm:text-3xl font-extrabold mb-2 text-slate-800 dark:text-slate-100 tracking-tight">Jalankan Kode</h1>
                <p class="text-slate-500 dark:text-slate-400 mb-6 text-sm">Editor Python interaktif berbasis Pyodide. Contoh kode graf sederhana disediakan di bawah.</p>

                <div class="bg-white dark:bg-[#111827] rounded-2xl shadow-soft border border-slate-200 dark:border-[#1F2937] p-6 mb-6 transition-colors duration-300">
                    <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-100 dark:border-[#1F2937]">
                        <div class="font-bold text-slate-800 dark:text-slate-200 flex items-center gap-2">
                            <i class="fa-brands fa-python text-blue-500"></i> Editor Python (Pyodide)
                        </div>
                        <div id="py-status" class="text-xs font-mono bg-slate-100 dark:bg-[#1F2937] text-slate-600 dark:text-slate-300 px-3 py-1 rounded-md border border-slate-200 dark:border-slate-700 shadow-sm">
                            <i class="fa-solid fa-spinner fa-spin mr-1"></i> Memuat...
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
                        <div class="col-span-1 lg:col-span-2">
                            <div class="bg-[#272822] rounded-t-lg px-3 py-2 flex gap-2 border border-[#272822]">
                                <div class="w-3 h-3 rounded-full bg-rose-500"></div>
                                <div class="w-3 h-3 rounded-full bg-amber-500"></div>
                                <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                            </div>
                            <div id="editor" class="h-96 border-x border-b border-slate-300 dark:border-[#272822] rounded-b-lg shadow-inner"></div>
                        </div>
                        
                        <div class="col-span-1 lg:col-span-1">
                            <div id="terminal-container" class="h-full min-h-[384px] border border-slate-800 dark:border-black rounded-lg p-4 overflow-auto bg-black text-emerald-400 font-mono relative shadow-inner">
                                <div class="font-bold text-[10px] text-slate-500 tracking-widest uppercase mb-3 border-b border-slate-800 pb-2">Console Output</div>
                                <div id="output" class="whitespace-pre-wrap text-sm leading-relaxed"></div>

                                <div id="input-overlay" class="hidden absolute inset-0 bg-black/95 flex flex-col p-4 z-10 backdrop-blur-sm">
                                    <div class="w-full mt-10">
                                        <div id="input-prompt-text" class="text-amber-400 mb-3 font-bold text-sm"></div>
                                        <div class="flex items-center">
                                            <span class="text-green-400 mr-2 text-xl">></span>
                                            <input type="text" id="input-field"
                                                class="flex-1 bg-transparent text-white px-0 py-2 border-b-2 border-green-500 outline-none focus:border-green-300 transition-colors text-lg"
                                                placeholder="Ketik lalu Enter..." autocomplete="off" />
                                        </div>
                                        <div class="text-slate-500 text-xs mt-4"><i class="fa-solid fa-keyboard mr-1"></i> Tekan <strong>Enter</strong> untuk submit</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap items-center gap-3">
                    <button id="run-code" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm rounded-lg shadow-md transition-colors flex items-center gap-2">
                        <i class="fa-solid fa-play"></i> Jalankan
                    </button>
                    <button id="load-example" class="px-5 py-2.5 bg-white dark:bg-[#1F2937] border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 font-bold text-sm rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors shadow-sm flex items-center gap-2">
                        <i class="fa-solid fa-code"></i> Muat Contoh
                    </button>
                    <button id="clear-code" class="px-5 py-2.5 bg-rose-50 dark:bg-rose-500/10 border border-rose-200 dark:border-rose-500/20 text-rose-600 dark:text-rose-400 font-bold text-sm rounded-lg hover:bg-rose-100 dark:hover:bg-rose-500/20 transition-colors shadow-sm ml-auto flex items-center gap-2">
                        <i class="fa-solid fa-trash-can"></i> Bersihkan
                    </button>
                </div>

            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let editor = null;
            let pyodide = null;
            let pyLoaded = false;

            const pyStatus = document.getElementById('py-status');
            const outputEl = document.getElementById('output');
            const terminalContainer = document.getElementById('terminal-container');
            const inputOverlay = document.getElementById('input-overlay');
            const inputField = document.getElementById('input-field');
            const inputPromptText = document.getElementById('input-prompt-text');

            let inputResolve = null;

            /* ======================
               1. SETUP ACE EDITOR
            ====================== */
            async function loadAce() {
                if (window.ace) return;
                await new Promise(r => {
                    const s = document.createElement('script');
                    s.src = 'https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.14/ace.js';
                    s.onload = r;
                    document.head.appendChild(s);
                });
            }

            async function ensureEditor() {
                await loadAce();
                if (!editor) {
                    editor = ace.edit('editor');
                    editor.setTheme('ace/theme/monokai');
                    editor.session.setMode('ace/mode/python');
                    editor.setOptions({
                        fontSize: '14px',
                        useSoftTabs: true,
                        tabSize: 4
                    });
                }
            }

            /* ======================
               2. LOAD CONTOH KODE
            ====================== */
            document.getElementById('load-example').addEventListener('click', async () => {
                await ensureEditor();
                editor.setValue(`# Contoh Input User
nama = input("Siapa nama Anda? ")
print("Halo,", nama)
print("Selamat belajar Struktur Data Graf!")`, -1);
            });

            document.getElementById('clear-code').addEventListener('click', () => {
                if (editor) editor.setValue('', -1);
                outputEl.textContent = '';
            });

            /* ======================
               3. SETUP PYODIDE
            ====================== */
            async function loadPyodideAndInit() {
                if (pyLoaded) return pyodide;
                pyStatus.innerHTML = '<i class="fa-solid fa-spinner fa-spin mr-1 text-blue-500"></i> Memuat Engine...';

                if (!window.loadPyodide) {
                    await new Promise(r => {
                        const s = document.createElement('script');
                        s.src = 'https://cdn.jsdelivr.net/pyodide/v0.24.1/full/pyodide.js';
                        s.onload = r;
                        document.head.appendChild(s);
                    });
                }

                pyodide = await loadPyodide({
                    indexURL: 'https://cdn.jsdelivr.net/pyodide/v0.24.1/full/'
                });
                pyLoaded = true;
                pyStatus.innerHTML = '<i class="fa-solid fa-check text-emerald-500 mr-1"></i> Pyodide Siap';
                return pyodide;
            }

            /* ======================
               4. TERMINAL OUTPUT (LANGSUNG TAMPIL)
            ====================== */
            window.appendOutput = (text) => {
                if (text) {
                    outputEl.appendChild(document.createTextNode(text));
                    terminalContainer.scrollTop = terminalContainer.scrollHeight;
                }
            };

            window.clearOutputBuffer = () => {
                outputEl.textContent = "";
            };

            /* ======================
               5. INPUT OVERLAY (POPUP INPUT)
            ====================== */
            window.requestInput = (prompt) => {
                return new Promise(resolve => {
                    inputPromptText.textContent = prompt || ''; 
                    inputOverlay.classList.remove('hidden'); 
                    inputField.value = '';
                    inputField.focus();
                    inputResolve = resolve;
                });
            };

            // Event Listener untuk Enter di kolom input popup
            inputField.addEventListener('keydown', e => {
                if (e.key === 'Enter') {
                    inputOverlay.classList.add('hidden');
                    inputResolve(inputField.value); 
                    inputResolve = null;
                }
            });

            /* ======================
               6. TOMBOL JALANKAN (LOGIKA UTAMA)
            ====================== */
            let isExecuting = false;
            let shouldStop = false;

            document.getElementById('run-code').addEventListener('click', async () => {
                const runButton = document.getElementById('run-code');

                if (isExecuting) {
                    shouldStop = true;
                    window.appendOutput('\n⛔ Menghentikan eksekusi...\n');
                    return;
                }

                await ensureEditor();
                let code = editor.getValue();
                window.clearOutputBuffer();

                if (!code.trim()) {
                    window.appendOutput('(Terminal Kosong - Silakan ketik kode Python)');
                    return;
                }

                isExecuting = true;
                shouldStop = false;
                runButton.innerHTML = '<i class="fa-solid fa-stop"></i> Stop';
                runButton.classList.replace('bg-blue-600', 'bg-rose-600');
                runButton.classList.replace('hover:bg-blue-700', 'hover:bg-rose-700');
                runButton.disabled = false;

                try {
                    await loadPyodideAndInit();

                    // A. AUTO AWAIT: Ubah input() menjadi await input()
                    code = code.replace(/\binput\s*\(/g, 'await input(');

                    // B. SETUP LINGKUNGAN PYTHON
                    await pyodide.runPythonAsync(`
import sys, js, asyncio, traceback

# 1. Redirect Print ke Terminal Web
class Stdout:
    def write(self, s):
        js.appendOutput(s)
    def flush(self): pass

sys.stdout = Stdout()
sys.stderr = Stdout()

# 2. Limit Eksekusi (Anti Infinite Loop)
_line_count = 0
_max_lines = 20000 

def _trace_calls(frame, event, arg):
    global _line_count
    _line_count += 1
    if _line_count > _max_lines:
        raise RecursionError("⛔ Infinite Loop Terdeteksi!\\nProgram dihentikan otomatis.")
    return _trace_calls

# 3. OVERRIDE INPUT
async def input(prompt=""):
    result = await js.requestInput(prompt)
    print(f"{prompt}{result}")
    return result
                    `);

                    // C. EKSEKUSI KODE USER
                    const executionPromise = (async () => {
                        try {
                            await pyodide.runPythonAsync('_line_count = 0'); 
                            await pyodide.runPythonAsync('sys.settrace(_trace_calls)'); 

                            await pyodide.runPythonAsync(`
async def __user_code__():
${code.split('\n').map(l => '    ' + l).join('\n')}

try:
    await __user_code__()
except RecursionError as e:
    if "Infinite Loop" in str(e):
        print(f"\\n{str(e)}")
    else:
        traceback.print_exc()
except Exception:
    traceback.print_exc(limit=0)
                            `);
                        } finally {
                            await pyodide.runPythonAsync('sys.settrace(None)'); 
                        }
                    })();

                    // Timeout Pengaman (15 detik)
                    const timeoutId = setTimeout(() => {
                        shouldStop = true;
                        pyodide.runPythonAsync('sys.settrace(None)').catch(() => {});
                    }, 15000);

                    await executionPromise;
                    clearTimeout(timeoutId);

                } catch (err) {
                    const errorMsg = err.toString();
                    if (!errorMsg.includes("Infinite Loop")) {
                        window.appendOutput('\n❌ System Error:\n' + errorMsg);
                    }
                } finally {
                    isExecuting = false;
                    shouldStop = false;
                    runButton.innerHTML = '<i class="fa-solid fa-play"></i> Jalankan';
                    runButton.classList.replace('bg-rose-600', 'bg-blue-600');
                    runButton.classList.replace('hover:bg-rose-700', 'hover:bg-blue-700');
                    runButton.disabled = false;
                    try { await pyodide.runPythonAsync('sys.settrace(None)'); } catch (e) {}
                }
            });

            // Init status & editor on load
            ensureEditor().then(() => {
                // Initialize Pyodide softly in background
                if(!pyLoaded) {
                    loadPyodideAndInit().catch(e => console.error("Auto-load pyodide failed:", e));
                }
            });
        });
    </script>
</body>
</html>