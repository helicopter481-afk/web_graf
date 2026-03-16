document.addEventListener('DOMContentLoaded', function() {

    // --- 1. TAHUN FOOTER ---
    var yearSpan = document.getElementById('year');
    if (yearSpan) {
        yearSpan.textContent = new Date().getFullYear();
    }

    // --- 2. DARK MODE ---
    var btn = document.getElementById('theme-toggle'); // pastikan ID tombol ini ada di header_landing
    var html = document.documentElement; 
    var saved = localStorage.getItem('theme'); 

    if (btn) {
        // cek tema tersimpan
        if (saved === 'dark') {
            html.classList.add('dark');
        } else if (saved === 'light') {
            html.classList.remove('dark');
        } else {
            // cek tema sistem
            if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                html.classList.add('dark');
            }
        }

        // klik tombol
        btn.addEventListener('click', function() {
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        });
    }

    // --- 3. ANIMASI GRAF BACKGROUND ---
    var canvas = document.getElementById('graphCanvas'); 
    if (!canvas) return;

    var ctx = canvas.getContext('2d'); 

    // ukuran canvas
    function resizeCanvas() {
        canvas.width = canvas.offsetWidth;
        canvas.height = canvas.offsetHeight;
    }

    resizeCanvas();
    window.addEventListener('resize', resizeCanvas);

    // data titik
    var nodes = [];
    var total = 30;

    // buat titik acak
    for (var i = 0; i < total; i++) {
        nodes.push({
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            vx: (Math.random() - 0.5) * 0.4,
            vy: (Math.random() - 0.5) * 0.4,
            size: 2 + Math.random() * 2
        });
    }

    // gambar animasi
    function draw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height); // bersihkan

        // gerak titik
        for (var i = 0; i < nodes.length; i++) {
            var n = nodes[i];

            n.x += n.vx;
            n.y += n.vy;

            // pantul
            if (n.x < 0 || n.x > canvas.width) n.vx = -n.vx;
            if (n.y < 0 || n.y > canvas.height) n.vy = -n.vy;

            // gambar titik
            ctx.beginPath();
            ctx.arc(n.x, n.y, n.size, 0, Math.PI * 2);
            ctx.fillStyle = 'rgba(255,255,255,0.8)';
            ctx.fill();
        }

        // garis antar titik
        for (var a = 0; a < nodes.length; a++) {
            for (var b = a + 1; b < nodes.length; b++) {

                var dx = nodes[a].x - nodes[b].x;
                var dy = nodes[a].y - nodes[b].y;
                var dist = Math.sqrt(dx * dx + dy * dy);

                if (dist < 130) {
                    var alpha = 1 - (dist / 130);
                    ctx.strokeStyle = 'rgba(255,255,255,' + alpha + ')';
                    ctx.beginPath();
                    ctx.moveTo(nodes[a].x, nodes[a].y);
                    ctx.lineTo(nodes[b].x, nodes[b].y);
                    ctx.stroke();
                }
            }
        }

        requestAnimationFrame(draw); // ulang
    }

    draw(); // mulai
});