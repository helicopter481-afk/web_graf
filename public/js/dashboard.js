document.addEventListener('DOMContentLoaded', function() {
    const completedChapters = JSON.parse(localStorage.getItem('completedChapters') || '[]');
    const totalModules = 6;
    const completedCount = completedChapters.length;
    const progressPercent = Math.round((completedCount / totalModules) * 100);
    
    // Update progress bar & stats
    const progressBar = document.getElementById('progress-bar');
    const progressPercentText = document.getElementById('progress-percent');
    const progressInfo = document.getElementById('progress-info');

    if (progressBar) progressBar.style.width = progressPercent + '%';
    if (progressPercentText) progressPercentText.textContent = progressPercent + '%';
    if (progressInfo) progressInfo.textContent = completedCount + ' dari ' + totalModules + ' modul selesai';
    
    // Update CTA text
    const ctaText = document.getElementById('cta-text');
    if (ctaText) {
        if (completedCount > 0 && completedCount < totalModules) {
            ctaText.textContent = 'Lanjutkan';
        } else if (completedCount === totalModules) {
            ctaText.textContent = 'Selesai';
        }
    }
    
    // Update each module
    for (let i = 1; i <= totalModules; i++) {
        const isCompleted = completedChapters.includes(i);
        const isUnlocked = i === 1 || completedChapters.includes(i - 1);
        
        const moduleItem = document.getElementById('module-' + i);
        const indicator = document.getElementById('indicator-' + i);
        const badge = document.getElementById('badge-' + i);
        const action = document.getElementById('action-' + i);
        
        if (moduleItem && indicator && badge && action) {
            if (isCompleted) {
                moduleItem.classList.add('completed');
                indicator.classList.remove('bg-slate-100', 'text-slate-500');
                indicator.classList.add('bg-blue-100', 'text-blue-600');
                indicator.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>';
                
                badge.classList.remove('hidden');
                badge.classList.add('bg-blue-50', 'text-blue-600');
                badge.textContent = 'Selesai';
                
                const actionText = action.querySelector('.action-text');
                if (actionText) actionText.textContent = 'Ulangi';
            } else if (!isUnlocked) {
                moduleItem.classList.add('locked');
                indicator.innerHTML = '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>';
                
                const actionText = action.querySelector('.action-text');
                if (actionText) actionText.textContent = 'Terkunci';
            }
        }
    }
});
// localStorage.removeItem('completedChapters');