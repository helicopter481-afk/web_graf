<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <title>Petunjuk Penggunaan - GrafLearn</title>
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
    <style>
        .accordion-content {
            transition: max-height 0.3s ease-out, opacity 0.3s ease-out;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
        }

        .accordion-active .accordion-content {
            max-height: 500px;
            opacity: 1;
            padding-top: 1rem;
        }

        .accordion-active .accordion-icon {
            transform: rotate(180deg);
        }
    </style>
</head>

<body class="bg-surface dark:bg-darker text-slate-800 dark:text-slate-200 antialiased pt-24">
    @include('includes.header_landing')

    <div class="max-w-4xl mx-auto px-6 lg:px-8 pb-20">
        <div
            class="bg-blue-100 dark:bg-blue-900/30 border border-blue-200 dark:border-blue-800 rounded-xl p-6 mb-8 text-center">
            <h1 class="text-xl font-bold text-blue-800 dark:text-blue-400 mb-2">Pusat Bantuan & Petunjuk Penggunaan</h1>
            <p class="text-sm text-blue-600 dark:text-blue-300">Pilih salah satu daftar di bawah untuk melihat cara
                menggunakan aplikasi.</p>
        </div>

        <div class="space-y-4">
            <div
                class="accordion-item bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden shadow-sm">
                <button
                    class="accordion-toggle w-full flex items-center justify-between p-5 focus:outline-none text-left">
                    <div class="flex items-center gap-3"><i
                            class="fa-solid fa-house text-primary dark:text-blue-400 w-5 text-center"></i><span
                            class="font-bold text-slate-700 dark:text-slate-200">Halaman Beranda</span></div>
                    <i
                        class="fa-solid fa-chevron-down text-slate-400 transition-transform duration-300 accordion-icon"></i>
                </button>
                <div
                    class="accordion-content bg-slate-50 dark:bg-slate-900/50 px-5 pb-5 border-t border-slate-100 dark:border-slate-700 text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                    <p>Halaman Beranda adalah tampilan awal. Di sini Anda bisa melihat fitur, materi, dan masuk ke dalam
                        sistem.</p>
                </div>
            </div>

            <div
                class="accordion-item bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden shadow-sm">
                <button
                    class="accordion-toggle w-full flex items-center justify-between p-5 focus:outline-none text-left">
                    <div class="flex items-center gap-3"><i
                            class="fa-solid fa-user-plus text-primary dark:text-blue-400 w-5 text-center"></i><span
                            class="font-bold text-slate-700 dark:text-slate-200">Cara Mendaftar Akun</span></div>
                    <i
                        class="fa-solid fa-chevron-down text-slate-400 transition-transform duration-300 accordion-icon"></i>
                </button>
                <div
                    class="accordion-content bg-slate-50 dark:bg-slate-900/50 px-5 pb-5 border-t border-slate-100 dark:border-slate-700 text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                    <ul class="list-decimal list-inside space-y-2">
                        <li>Klik tombol <strong>Daftar</strong> di navigasi atas.</li>
                        <li>Isi formulir dengan data yang valid.</li>
                        <li>Anda akan diarahkan ke Dashboard setelah sukses.</li>
                    </ul>
                </div>
            </div>

            <div
                class="accordion-item bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden shadow-sm">
                <button
                    class="accordion-toggle w-full flex items-center justify-between p-5 focus:outline-none text-left">
                    <div class="flex items-center gap-3"><i
                            class="fa-solid fa-book-open text-primary dark:text-blue-400 w-5 text-center"></i><span
                            class="font-bold text-slate-700 dark:text-slate-200">Halaman Materi & Praktikum</span></div>
                    <i
                        class="fa-solid fa-chevron-down text-slate-400 transition-transform duration-300 accordion-icon"></i>
                </button>
                <div
                    class="accordion-content bg-slate-50 dark:bg-slate-900/50 px-5 pb-5 border-t border-slate-100 dark:border-slate-700 text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                    <p>Halaman materi disusun berurutan. Anda wajib menyelesaikan membaca dan mencoba simulasi sebelum
                        lanjut. Untuk praktikum, tulis Python di editor lalu klik 'Jalankan'.</p>
                </div>
            </div>

            <div
                class="accordion-item bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden shadow-sm">
                <button
                    class="accordion-toggle w-full flex items-center justify-between p-5 focus:outline-none text-left">
                    <div class="flex items-center gap-3"><i
                            class="fa-solid fa-trophy text-primary dark:text-blue-400 w-5 text-center"></i><span
                            class="font-bold text-slate-700 dark:text-slate-200">Kuis dan Kelulusan</span></div>
                    <i
                        class="fa-solid fa-chevron-down text-slate-400 transition-transform duration-300 accordion-icon"></i>
                </button>
                <div
                    class="accordion-content bg-slate-50 dark:bg-slate-900/50 px-5 pb-5 border-t border-slate-100 dark:border-slate-700 text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                    <p>Terdapat kuis di akhir modul. Anda harus mencapai Nilai KKM untuk dianggap tuntas pada mata studi
                        ini.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/landing.js') }}"></script>
    <script>
        document.querySelectorAll('.accordion-item').forEach(item => {
            item.querySelector('.accordion-toggle').addEventListener('click', () => {
                item.classList.toggle('accordion-active');
            });
        });
    </script>
</body>

</html>
