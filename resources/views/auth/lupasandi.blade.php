<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Sandi - GrafLearn</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-slate-50 h-screen flex items-center justify-center text-slate-800">

    <div class="w-full max-w-md bg-white rounded-xl shadow-lg border border-slate-100 overflow-hidden p-8 text-center">
        
        <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-6 text-2xl">
            <i class="fa-solid fa-lock-open"></i>
        </div>

        <h1 class="text-2xl font-bold text-slate-900 mb-2">Lupa Kata Sandi?</h1>
        
        <p class="text-slate-500 text-sm mb-6 leading-relaxed">
            Silakan hubungi Dosen/Admin untuk mereset sandi Anda ke <strong>default</strong>.
        </p>

        @php
            $adminPhone = "6281345982655"; // Ganti nomor WA kamu
            $text = "Halo Admin GrafLearn, saya lupa password akun saya. Mohon bantuannya.";
            $waLink = "https://wa.me/{$adminPhone}?text=" . urlencode($text);
        @endphp

        <a href="{{ $waLink }}" target="_blank" class="block w-full bg-green-500 hover:bg-green-600 text-white font-bold py-3 rounded-lg transition-colors shadow-sm flex items-center justify-center gap-2 mb-4">
            <i class="fa-brands fa-whatsapp text-lg"></i>
            Hubungi Admin via WhatsApp
        </a>

        <a href="{{ route('login') }}" class="block w-full bg-white border border-slate-300 text-slate-600 font-bold py-3 rounded-lg hover:bg-slate-50 transition-colors">
            Kembali ke Login
        </a>

    </div>

</body>
</html>