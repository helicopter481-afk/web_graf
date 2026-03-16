<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media Pembelajaran Graf</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Tailwind CSS (CDN) --}}
    <script src="https://cdn.tailwindcss.com"></script>
    
    {{-- Font Inter Global --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8fafc; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased">

    {{-- Navbar Sederhana (Bisa dihapus/disesuaikan) --}}
    <nav class="bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="text-xl font-bold text-slate-900">EduGraf</span>
                </div>
            </div>
        </div>
    </nav>

    {{-- AREA KONTEN (Bab 1 akan masuk ke sini) --}}
    <main class="py-10 px-4 sm:px-6 lg:px-8">
        @yield('content')
    </main>

</body>
</html>