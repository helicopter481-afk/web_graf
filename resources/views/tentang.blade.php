<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <title>Tentang Pengembang - GrafLearn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;600&family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#2563EB',
                        dark: '#0F172A',
                        darker: '#0B1120',
                        surface: '#F8FAFC'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-surface dark:bg-darker text-slate-800 dark:text-slate-200 antialiased pt-24">
    @include('includes.header_landing')

    <div class="max-w-4xl mx-auto px-6 lg:px-8 pb-20">
        <div
            class="bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl overflow-hidden shadow-sm">
            <div
                class="bg-blue-50 dark:bg-slate-900 px-6 py-4 border-b border-slate-200 dark:border-slate-700 flex items-center gap-2">
                <i class="fa-solid fa-circle-info text-blue-600 dark:text-blue-400"></i>
                <h1 class="font-bold text-slate-800 dark:text-slate-200">Informasi Pengembangan Aplikasi</h1>
            </div>
            <div class="p-6 md:p-8">
                <p class="text-center text-sm text-slate-500 dark:text-slate-400 mb-6 italic">Media pembelajaran ini
                    dibuat untuk memenuhi persyaratan penyelesaian studi Program Strata-1 Pendidikan Komputer.</p>

                <h4 class="text-center font-bold text-slate-800 dark:text-white mb-8 leading-snug text-lg">
                    PENGEMBANGAN MEDIA PEMBELAJARAN INTERAKTIF BERBASIS WEB PADA <span
                        class="italic text-primary dark:text-blue-400">STRUKTUR DATA GRAF</span> DENGAN MODEL TUTORIAL
                    MENGGUNAKAN PYODIDE
                </h4>

                <div class="space-y-4 text-sm text-slate-700 dark:text-slate-300">
                    <div class="grid grid-cols-1 md:grid-cols-4 border-b border-slate-100 dark:border-slate-700 pb-3">
                        <div class="font-bold md:col-span-1">Nama</div>
                        <div class="md:col-span-3">: Muhammad Rifqi Azmi Asshidiqi</div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-4 border-b border-slate-100 dark:border-slate-700 pb-3">
                        <div class="font-bold md:col-span-1">NIM</div>
                        <div class="md:col-span-3">: 2210131110004</div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-4 border-b border-slate-100 dark:border-slate-700 pb-3">
                        <div class="font-bold md:col-span-1">Dosen Pembimbing 1</div>
                        <div class="md:col-span-3">: Dr. R. Ati Sukmawati, M.Kom.</div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-4 border-b border-slate-100 dark:border-slate-700 pb-3">
                        <div class="font-bold md:col-span-1">Dosen Pembimbing 2</div>
                        <div class="md:col-span-3">: Rizky Pamuji, S.Kom., M.Kom.</div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-4 border-b border-slate-100 dark:border-slate-700 pb-3">
                        <div class="font-bold md:col-span-1">Jurusan</div>
                        <div class="md:col-span-3">: S-1 Pendidikan Komputer</div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-4">
                        <div class="font-bold md:col-span-1">Instansi</div>
                        <div class="md:col-span-3">: Universitas Lambung Mangkurat</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/landing.js') }}"></script>
</body>

</html>
