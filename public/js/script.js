let currentStep = 0;
// Number of steps per bab (count). Bab 1 has 8 steps (0..7), bab 2 and 3 have 9 steps (0..8).
// Tambahkan 99: 1 agar Evaluasi Akhir dianggap memiliki 1 halaman penuh (step-0)
const totalSteps = { 1: 8, 2: 8, 3: 7, 4: 8, 99: 1 };

function updateSidebar() {
    document.querySelectorAll('.sidebar-nav-item').forEach(item => {
        const step = parseInt(item.dataset.step);
        const dot = item.querySelector('.item-dot');
        if (step === currentStep) {
            item.classList.remove('text-slate-500');
            item.classList.add('text-blue-600', 'bg-white', 'shadow-sm');
            if (dot) { dot.classList.remove('bg-slate-300'); dot.classList.add('bg-blue-600'); }
        } else {
            item.classList.remove('text-blue-600', 'bg-white', 'shadow-sm');
            item.classList.add('text-slate-500');
            if (dot) { dot.classList.remove('bg-blue-600'); dot.classList.add('bg-slate-300'); }
        }
    });
}

function showStep(stepNum) {
    document.querySelectorAll('.step-slide').forEach(s => s.classList.remove('step-active'));
    const target = document.getElementById('step-' + stepNum);
    
    // Bypass khusus untuk evaluasi akhir (halaman penuh)
    if (typeof currentBab !== 'undefined' && currentBab === 99) {
        const evaluasiTarget = document.getElementById('step-0');
        if (evaluasiTarget) evaluasiTarget.classList.add('step-active');
        document.getElementById('progressBar').style.width = '100%';
        document.getElementById('progressPercent').textContent = '100';
        return; // Hentikan eksekusi sisanya
    }

    if (target) {
        target.classList.add('step-active');
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
    
    currentStep = stepNum;
    
    // Kalkulasi progress bar
    if (typeof currentBab !== 'undefined' && totalSteps[currentBab]) {
        let maxStep = totalSteps[currentBab] - 1;
        if (maxStep <= 0) maxStep = 1; // Mencegah pembagian dengan nol
        const progress = Math.round((stepNum / maxStep) * 100);
        document.getElementById('progressBar').style.width = progress + '%';
        document.getElementById('progressPercent').textContent = progress;
    }
    
    // Call bab-specific graph initialization if exists
    if (typeof currentBab !== 'undefined') {
        if (currentBab === 1 && typeof handleGraphInit === 'function') {
            handleGraphInit(stepNum);
        }
        if (currentBab === 2) {
            // Bab 2 graph init on step 2 and 3
            if (stepNum === 2 && typeof initUndirectedGraph === 'function') {
                setTimeout(() => initUndirectedGraph(), 300);
            }
            if (stepNum === 3 && typeof initDirectedGraph === 'function') {
                setTimeout(() => initDirectedGraph(), 300);
            }
            if (stepNum === 4 && typeof initWeightedGraph === 'function') {
                setTimeout(() => initWeightedGraph(), 300);
            }
        }
    }
    
    updateSidebar();
}

function goToStep(stepNum) {
    showStep(stepNum);
}

function nextStep() {
    if (typeof currentBab !== 'undefined' && totalSteps[currentBab]) {
        if (currentStep < totalSteps[currentBab] - 1) goToStep(currentStep + 1);
    }
}

function prevStep() {
    if (currentStep > 0) goToStep(currentStep - 1);
}

function loadBab(babNum) {
    window.location.href = '/modul?bab=' + babNum;
}

document.addEventListener('DOMContentLoaded', function() {
    showStep(0);
    updateSidebar();
});

// LOGIKA REFLEKSI LAMA
document.addEventListener('DOMContentLoaded', function(){
    const form = document.getElementById('refleksiForm');
    if (!form) return;
    form.addEventListener('submit', function(e){
        e.preventDefault();
        const fd = new FormData(form);
        const data = {};
        for (const [k,v] of fd.entries()) data[k] = v;
        try {
            localStorage.setItem('refleksi_bab1', JSON.stringify(data));
        } catch (err) {
            console.error('Could not save refleksi to localStorage', err);
        }
        const successEl = document.getElementById('refleksiSuccess');
        if (successEl) successEl.classList.remove('hidden');

        // Navigate to Evaluasi (step-8). Prefer existing helpers if available.
        const navigate = window.goToStep || window.showStep || function(n){
            const el = document.getElementById('step-' + n);
            if (el) el.scrollIntoView({behavior: 'smooth'});
        };

        setTimeout(function(){
            try { navigate(8); } catch (err) { console.error(err); }
        }, 700);
    });
});