// --- BAGIAN PALING ATAS FILE bab1.js ---

// GANTI const userAnswers11 = {}; DENGAN INI:
window.userAnswers11 = {};

document.addEventListener('DOMContentLoaded', () => {
    // Pastikan quizData11 ada sebelum di-loop
    if (window.quizData11) {
        Object.keys(window.quizData11).forEach(key => {
            // Set default null jika belum ada
            if (window.userAnswers11[key] === undefined) {
                window.userAnswers11[key] = null;
            }
        });
    }
});

function selectOption11(questionId, value, btnElement) {
    userAnswers11[questionId] = value;

    const parent = btnElement.parentElement;
    parent.querySelectorAll('.option-btn').forEach(btn => {
        btn.className =
            'option-btn w-full text-left px-4 py-3 rounded border border-slate-300 bg-white hover:bg-slate-50 hover:border-blue-400 transition-all text-sm text-slate-700 font-medium';
    });

    btnElement.className =
        'option-btn w-full text-left px-4 py-3 rounded border border-blue-500 bg-blue-50 text-blue-900 font-semibold text-sm transition-all ring-1 ring-blue-500';

    document.getElementById('error11')?.classList.add('hidden');
    document.getElementById('warning11')?.classList.add('hidden');
}

function checkAllAnswers11() {

    // ===============================
    // 1. SETUP AWAL
    // ===============================
    const questions = Object.keys(window.quizData11);
    const totalQuestions = questions.length;

    let answeredCount = 0;
    let currentScore = 0;
    let maxScore = 0;
    let allCorrect = true;

    // Reset notifikasi
    document.getElementById('warning11')?.classList.add('hidden');
    document.getElementById('error11')?.classList.add('hidden');
    document.getElementById('success11')?.classList.add('hidden');

    // Sembunyikan feedback lama
    questions.forEach(q => {
        document.getElementById(`feedback-${q}`)?.classList.add('hidden');
    });

    // ===============================
    // 2. LOGIKA PENILAIAN
    // ===============================
    questions.forEach(q => {

        const data = window.quizData11[q];
        const userAnswer = window.userAnswers11[q];

        maxScore += (data.weight || 0);

        if (userAnswer) {
            answeredCount++;

            if (
                String(userAnswer).trim().toLowerCase() ===
                String(data.correct).trim().toLowerCase()
            ) {
                currentScore += (data.weight || 0);
            } else {
                allCorrect = false;
            }
        } else {
            allCorrect = false;
        }
    });

    console.log(`Progress: ${answeredCount}/${totalQuestions}`);
    console.log("Jawaban User:", window.userAnswers11);

    // ===============================
    // 3. CEK KELENGKAPAN
    // ===============================
    if (answeredCount < totalQuestions) {
        const warningBox = document.getElementById('warning11');
        if (warningBox) {
            warningBox.classList.remove('hidden');
            warningBox.innerHTML =
                `⚠️ Anda baru menjawab <b>${answeredCount}</b> dari <b>${totalQuestions}</b> soal.`;
        }
        return;
    }

    // ===============================
    // 4. HITUNG NILAI AKHIR
    // ===============================
    const finalGrade =
        maxScore > 0
            ? Math.round((currentScore / maxScore) * 100)
            : 0;

    // ===============================
    // 5. TAMPILKAN HASIL
    // ===============================
    if (allCorrect) {

        document.getElementById('success11')?.classList.remove('hidden');

        const scoreDisplay = document.getElementById('finalScoreDisplay');
        if (scoreDisplay) {
            scoreDisplay.innerText = finalGrade;
        }

        questions.forEach(q => {
            const fb = document.getElementById(`feedback-${q}`);
            if (fb) {
                fb.classList.remove('hidden');
                fb.innerHTML =
                    `<strong>✅ Benar!</strong> ${window.quizData11[q].explanation}`;
                fb.className =
                    "mt-3 text-sm p-3 rounded bg-green-50 border border-green-200 text-green-800 animate-fade-in";
            }
        });

        const nextBtn = document.getElementById('btnNext11');
        if (nextBtn) {
            nextBtn.disabled = false;
            nextBtn.classList.remove('opacity-50', 'cursor-not-allowed');
        }

    } else {

        const errorBox = document.getElementById('error11');
        if (errorBox) {
            errorBox.classList.remove('hidden');
            errorBox.innerHTML =
                "❌ Masih ada jawaban yang kurang tepat. Silakan coba lagi.";
        }
    }

    // ===============================
    // 6. SIMPAN DETAIL JAWABAN
    // ===============================
    if (allCorrect) {

        const finalGrade = Math.round((currentScore / maxScore) * 100);

        if (typeof saveProgress === 'function') {
            console.log("Kirim 1.1:", window.userAnswers11);
            saveProgress('1.1', finalGrade, window.userAnswers11);
        }
    }


}

// --- 1. SANDBOX LOGIC ---
const TARGET_NODES = 3;
const TARGET_EDGES = 3;
let isMissionFinished = false;
let hasEverUnlocked = false;
var sbNodes = new vis.DataSet([]);
var sbEdges = new vis.DataSet([]);
var sbContainer = document.getElementById('mynetwork');
var sbData = {
    nodes: sbNodes,
    edges: sbEdges
};
var sbNodeCounter = 0;
var sbNodeLabels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
var sbOptions = {
    physics: {
        enabled: false
    },
    interaction: {
        dragNodes: true,
        hover: true,
        selectConnectedEdges: false,
        zoomView: false
    },
    manipulation: {
        enabled: false,
        addEdge: function (data, callback) {
            if (isMissionFinished) {
                callback(null);
                return;
            }
            if (data.from !== data.to) {
                callback(data);
                setTimeout(() => {
                    sbNetwork.addEdgeMode();
                }, 10);
            } else {
                showToast("Tidak bisa menghubungkan ke diri sendiri!", "error");
                callback(null);
                setTimeout(() => {
                    sbNetwork.addEdgeMode();
                }, 10);
            }
        }
    },
    nodes: {
        shape: 'circle',
        widthConstraint: 55,
        font: {
            size: 26,
            color: '#ffffff',
            face: 'Inter',
            vadjust: 2,
            bold: {
                size: 26,
                vadjust: 2
            }
        },
        color: {
            background: '#4f86f7',
            border: '#4f86f7',
            highlight: {
                background: '#3b82f6',
                border: '#3b82f6'
            },
            hover: {
                background: '#fbbf24',
                border: '#fbbf24'
            }
        },
        borderWidth: 0,
        margin: 10
    },
    edges: {
        width: 4,
        color: {
            color: '#e2e8f0',
            highlight: '#cbd5e1'
        },
        smooth: {
            type: 'continuous',
            roundness: 0.4
        }
    }
};
var sbNetwork = new vis.Network(sbContainer, sbData, sbOptions);
var currentSbMode = 'addNode';

function checkProgress() {
    let n = sbNodes.length;
    let e = sbEdges.length;
    document.getElementById('progress-text').innerText =
        `PROGRESS: ${n}/${TARGET_NODES} TITIK | ${e}/${TARGET_EDGES} GARIS`;
    if (n >= TARGET_NODES && e >= TARGET_EDGES && !isMissionFinished) {
        finishMission();
    }
}
sbNodes.on('*', checkProgress);
sbEdges.on('*', checkProgress);

function finishMission() {
    isMissionFinished = true;
    hasEverUnlocked = true;
    document.getElementById('progress-text').classList.add('done');
    document.getElementById('progress-text').innerText = "✅ MISI SELESAI!";
    const lockedArea = document.getElementById('locked-content-area');
    const overlay = document.getElementById('main-lock-overlay');
    lockedArea.classList.remove('content-locked');
    lockedArea.classList.add('content-unlocked');
    overlay.style.opacity = '0';
    setTimeout(() => {
        overlay.style.display = 'none';
    }, 500);
    showToast("Materi Lengkap Telah Terbuka!", "success");
    setMode('view');
    document.getElementById('btn-node').classList.add('locked');
    document.getElementById('btn-edge').classList.add('locked');
}
sbNetwork.on("click", function (params) {
    if (isMissionFinished) return;
    if (params.nodes.length === 0 && params.edges.length === 0 && currentSbMode === 'addNode') {
        var coords = params.pointer.canvas;
        addNodeAt(coords.x, coords.y);
    }
});

function addNodeAt(x, y) {
    if (isMissionFinished) return;
    var labelName = sbNodeLabels[sbNodeCounter % sbNodeLabels.length];
    if (sbNodeCounter >= sbNodeLabels.length) labelName += Math.floor(sbNodeCounter / sbNodeLabels.length);
    sbNodes.add({
        id: sbNodeCounter,
        label: labelName,
        x: x,
        y: y
    });
    sbNodeCounter++;
}
window.showToast = function (message, type = "error") {
    const toast = document.getElementById('app-toast');
    const msg = document.getElementById('toast-msg');
    const icon = document.getElementById('toast-icon');
    toast.className = "custom-toast show";
    if (type === "error") {
        toast.classList.add("error");
        icon.innerText = "⚠️";
    } else if (type === "success") {
        toast.classList.add("success");
        icon.innerText = "🎉";
    } else if (type === "warning") {
        toast.classList.add("warning");
        icon.innerText = "🔒";
    }
    msg.innerText = message;
    setTimeout(() => {
        toast.classList.remove("show");
    }, 3000);
}
window.confirmReset = function () {
    document.getElementById('reset-modal').classList.add('show');
}
window.closeModal = function () {
    document.getElementById('reset-modal').classList.remove('show');
}
window.executeReset = function () {
    isMissionFinished = false;
    sbNodes.clear();
    sbEdges.clear();
    sbNodeCounter = 0;
    document.getElementById('progress-text').classList.remove('done');
    document.getElementById('progress-text').innerText =
        `PROGRESS: 0/${TARGET_NODES} TITIK | 0/${TARGET_EDGES} GARIS`;
    const lockedArea = document.getElementById('locked-content-area');
    const overlay = document.getElementById('main-lock-overlay');
    if (!hasEverUnlocked) {
        lockedArea.classList.remove('content-unlocked');
        lockedArea.classList.add('content-locked');
        overlay.style.display = 'flex';
        setTimeout(() => {
            overlay.style.opacity = '1';
        }, 10);
    } else {
        overlay.style.display = 'none';
        overlay.style.opacity = '0';
        lockedArea.classList.remove('content-locked');
        lockedArea.classList.add('content-unlocked');
    }
    document.getElementById('btn-node').classList.remove('locked');
    document.getElementById('btn-edge').classList.remove('locked');
    closeModal();
    setMode('addNode');
    if (hasEverUnlocked) {
        showToast("Sandbox direset. Materi tetap terbuka.", "success");
    } else {
        showToast("Sandbox direset.", "warning");
    }
}
window.setMode = function (mode) {
    if (isMissionFinished && mode !== 'view') {
        showToast("Misi selesai! Reset dulu untuk main lagi.", "warning");
        return;
    }
    currentSbMode = mode;
    sbNetwork.unselectAll();
    document.getElementById('btn-node').classList.remove('active');
    document.getElementById('btn-edge').classList.remove('active');
    if (mode === 'addNode') {
        document.getElementById('btn-node').classList.add('active');
        sbNetwork.disableEditMode();
        document.getElementById('mynetwork').style.cursor = 'default';
        document.getElementById('mode-text').innerText = "Mode: Klik area kosong untuk menambah titik.";
    } else if (mode === 'addEdge') {
        document.getElementById('btn-edge').classList.add('active');
        sbNetwork.addEdgeMode();
        document.getElementById('mynetwork').style.cursor = 'crosshair';
        document.getElementById('mode-text').innerText = "Mode: Tarik garis dari satu titik ke titik lain.";
    } else if (mode === 'view') {
        sbNetwork.disableEditMode();
        document.getElementById('mynetwork').style.cursor = 'default';
        document.getElementById('mode-text').innerText = "Mode: Lihat hasil.";
    }
}
setMode('addNode');

// --- 2. JEMBATAN LOGIC ---
const kgNodes = {
    'C': {
        x: 450,
        y: 60
    },
    'B': {
        x: 450,
        y: 440
    },
    'A': {
        x: 370,
        y: 250
    },
    'D': {
        x: 860,
        y: 250
    }
};
let currentState = {
    node: null,
    crossed: [],
    started: false
};
let attempts = 3;
let isExplanationShown = false;

function setStartNode(nodeId) {
    if (attempts <= 0) return;
    if (currentState.started) return;
    currentState.node = nodeId;
    currentState.started = true;
    const p = kgNodes[nodeId];
    document.getElementById('player').style.opacity = 1;
    document.getElementById('player').setAttribute('transform', `translate(${p.x}, ${p.y})`);
    highlightLand(nodeId);
    updateStatus(`Posisi: <b>${nodeId}</b>. Klik jembatan yang menyala!`, "🚶");
    updateAvailableBridges();
}

function crossBridge(bridgeId, node1, node2, bx, by) {
    if (attempts <= 0) return;
    if (currentState.node !== node1 && currentState.node !== node2) return;
    if (currentState.crossed.includes(bridgeId)) {
        updateStatus("Jembatan ini sudah dilewati!", "⛔");
        return;
    }
    const targetNode = (currentState.node === node1) ? node2 : node1;
    const targetPos = kgNodes[targetNode];
    const player = document.getElementById('player');
    player.setAttribute('transform', `translate(${bx}, ${by})`);
    setTimeout(() => {
        player.setAttribute('transform', `translate(${targetPos.x}, ${targetPos.y})`);
        currentState.node = targetNode;
        currentState.crossed.push(bridgeId);
        const bridgeEl = document.getElementById(bridgeId);
        bridgeEl.classList.remove('available');
        bridgeEl.classList.add('crossed');
        highlightLand(targetNode);
        const sisa = 7 - currentState.crossed.length;
        if (sisa === 0) {
            updateStatus("Game Selesai. (Mustahil!)", "🏁");
        } else {
            updateStatus(`Sampai di <b>${targetNode}</b>. Sisa: ${sisa}`, "bridge");
        }
        updateAvailableBridges();
        checkDeadlock();
    }, 300);
}

function updateAvailableBridges() {
    document.querySelectorAll('.bridge-group').forEach(el => {
        if (!el.classList.contains('crossed')) {
            el.classList.remove('available');
            el.classList.add('disabled');
        }
    });
    const bridges = document.querySelectorAll('.bridge-group');
    let moveCount = 0;
    bridges.forEach(el => {
        if (el.getAttribute('onclick').includes(`'${currentState.node}'`) && !el.classList.contains(
            'crossed')) {
            el.classList.remove('disabled');
            el.classList.add('available');
            moveCount++;
        }
    });
    return moveCount;
}

function checkDeadlock() {
    setTimeout(() => {
        const moves = updateAvailableBridges();
        if (moves === 0 && currentState.crossed.length < 7) {
            handleFailure();
        }
    }, 350);
}

function handleFailure() {
    attempts--;
    document.getElementById('attempt-count').innerText = attempts;
    if (attempts > 0) {
        updateStatus(`BUNTU! Sisa kesempatan: ${attempts}. Silakan Reset.`, "🛑");
    } else {
        // MURNIKAN TEKS AGAR MUDAH DIBACA OLEH OBSERVER DI STEP 3
        updateStatus(`KESEMPATAN HABIS! Baca penjelasan di bawah.`, "💡");
        
        // Simpan ke local storage secara global agar tidak hilang saat refresh
        try {
            const userId = document.getElementById('graf_active_user_12') ? document.getElementById('graf_active_user_12').value : 'guest';
            localStorage.setItem('konigsberg_done_user_' + userId, 'true');
        } catch(e) {}
        
        revealExplanation();
    }
}

function revealExplanation() {
    if (isExplanationShown) return;
    isExplanationShown = true;

    const section = document.getElementById('edu-section');
    if (section) {
        // Hapus hidden tailwind jika ada, dan paksa tampil!
        section.classList.remove('hidden');
        section.classList.add('visible');
        section.style.display = 'block'; 
        section.style.opacity = '1';
        
        // Simpan status ke localStorage global fallback
        localStorage.setItem('konigsberg_global_done', 'true');
    }

    setTimeout(() => {
        const yOffset = -100;
        const elementPosition = section.getBoundingClientRect().top;
        const offsetPosition = elementPosition + window.pageYOffset + yOffset;

        window.scrollTo({
            top: offsetPosition,
            behavior: "smooth"
        });
    }, 500);
}

window.resetBridgeGame = function () {
    // TAMBAHKAN INI UNTUK MENGHAPUS CACHE SAAT DIRESET MANUAL
    localStorage.removeItem('konigsberg_global_done');
    isExplanationShown = false;
    const edu = document.getElementById('edu-section');
    if (edu) {
        edu.style.display = 'none';
        edu.classList.remove('visible');
    }
    
    if (attempts <= 0) {
        attempts = 3;
        document.getElementById('attempt-count').innerText = attempts;
    }
    currentState = {
        node: null,
        crossed: [],
        started: false
    };
    document.querySelectorAll('.bridge-group').forEach(el => {
        el.classList.remove('crossed', 'available');
        el.classList.add('disabled');
    });
    document.querySelectorAll('.land-shape').forEach(el => el.classList.remove('active-zone'));
    const p = document.getElementById('player');
    p.style.opacity = 0;
    p.setAttribute('transform', 'translate(10,10)');
    updateStatus("Klik huruf A, B, C, atau D untuk mulai.", "📍");
}

function highlightLand(id) {
    document.querySelectorAll('.land-shape').forEach(el => el.classList.remove('active-zone'));
    document.getElementById(`land-${id}`).classList.add('active-zone');
}

function updateStatus(msg, icon) {
    document.getElementById('status-text').innerHTML = msg;
    document.getElementById('status-icon').innerText = icon;
}

function toggleGraph(btn) {
    document.getElementById('graph-overlay').classList.toggle('visible');
    btn.classList.toggle('active');
}

// --- 3. DERAJAT VISUALIZATION ---
let network4 = null;
let edgeCDAdded = false;

function initGraph13() {
    const container = document.getElementById('visNetwork4');
    if (!container) return;
    edgeCDAdded = false;
    updatePanelInfo(false);
    const btn = document.getElementById('btnAddEdge');
    if (btn) {
        btn.innerHTML = '<span>➕</span> Tambah Sisi (C–D)';
        btn.disabled = false;
        btn.classList.remove('bg-gray-400', 'cursor-not-allowed');
        btn.classList.add('bg-blue-600', 'hover:bg-blue-700');
    }
    const nodes = new vis.DataSet([{
        id: 'A',
        label: 'A',
        x: -100,
        y: -80,
        color: '#3b82f6'
    }, {
        id: 'B',
        label: 'B',
        x: 100,
        y: -80,
        color: '#60a5fa'
    }, {
        id: 'C',
        label: 'C',
        x: -100,
        y: 80,
        color: '#10b981'
    }, {
        id: 'D',
        label: 'D',
        x: 100,
        y: 80,
        color: '#fbbf24'
    }]);
    const edges = new vis.DataSet([{
        id: 'AB',
        from: 'A',
        to: 'B'
    }, {
        id: 'AC',
        from: 'A',
        to: 'C'
    }, {
        id: 'BD',
        from: 'B',
        to: 'D'
    }]);
    const options = {
        physics: {
            enabled: false
        },
        interaction: {
            dragNodes: false,
            dragView: false,
            zoomView: false,
            hover: true
        },
        nodes: {
            shape: 'circle',
            widthConstraint: 45,
            font: {
                size: 20,
                color: '#ffffff',
                face: 'Inter',
                bold: {
                    size: 20
                }
            },
            borderWidth: 0,
            color: {
                highlight: {
                    background: '#fbbf24',
                    border: '#fbbf24'
                },
                hover: {
                    background: '#fbbf24',
                    border: '#fbbf24'
                }
            }
        },
        edges: {
            width: 3,
            color: {
                color: '#cbd5e1',
                highlight: '#94a3b8'
            },
            smooth: {
                type: 'continuous',
                roundness: 0
            }
        }
    };
    network4 = new vis.Network(container, {
        nodes,
        edges
    }, options);
    network4.once("afterDrawing", function () {
        network4.fit({
            scale: 1.2
        });
    });
    window.nodes13 = nodes;
    window.edges13 = edges;
}

function addEdgeCD() {
    if (edgeCDAdded) return;
    window.edges13.add({
        id: 'CD',
        from: 'C',
        to: 'D',
        color: {
            color: '#ef4444'
        },
        width: 4
    });
    updatePanelInfo(true);
    const btn = document.getElementById('btnAddEdge');
    btn.innerHTML = '<span>✓</span> Sisi Ditambahkan';
    btn.disabled = true;
    btn.classList.remove('bg-blue-600', 'hover:bg-blue-700');
    btn.classList.add('bg-gray-400', 'cursor-not-allowed');
    edgeCDAdded = true;
}

function updatePanelInfo(isAdded) {
    const elC = document.getElementById('info-C');
    const elD = document.getElementById('info-D');
    const valC = document.getElementById('val-C');
    const valD = document.getElementById('val-D');
    const statusBox = document.getElementById('status-box');
    if (isAdded) {
        elC.className =
            "flex justify-between items-center p-3 bg-green-50 border border-green-300 transition-all duration-500";
        elD.className =
            "flex justify-between items-center p-3 bg-green-50 border border-green-300 transition-all duration-500";
        valC.innerHTML = "Derajat: 2 (Genap)";
        valC.className = "text-sm font-bold text-green-700";
        valD.innerHTML = "Derajat: 2 (Genap)";
        valD.className = "text-sm font-bold text-green-700";
        statusBox.className =
            "mt-5 p-3 bg-green-50 border border-green-200 rounded text-xs text-green-800 leading-relaxed font-medium";
        statusBox.innerHTML =
            "🎉 <b>Sempurna!</b> Semua simpul kini berderajat genap. Dalam teori graf, ini syarat untuk membuat sirkuit tertutup.";
    } else {
        elC.className = "flex justify-between items-center p-3 bg-white rounded border border-slate-200";
        elD.className = "flex justify-between items-center p-3 bg-white rounded border border-slate-200";
        valC.innerHTML = "Derajat: 1 (Ganjil)";
        valC.className = "text-sm font-bold text-red-600";
        valD.innerHTML = "Derajat: 1 (Ganjil)";
        valD.className = "text-sm font-bold text-red-600";
        statusBox.className =
            "mt-5 p-3 bg-yellow-50 border border-yellow-200 rounded text-xs text-yellow-800 leading-relaxed font-medium";
        statusBox.innerHTML =
            "⚠️ Peringatan: Terdapat simpul dengan derajat ganjil. Konektivitas jaringan belum tertutup sempurna.";
    }
}
window.resetGraph13 = function () {
    initGraph13();
};

// --- 4. AKTIVITAS 1.2 VISUALISASI ---
let networkAct12 = null;

function initActivity12() {
    const container = document.getElementById('visActivity12');
    if (!container) return;
    const nodes = new vis.DataSet([{
        id: 'A',
        label: 'A',
        x: 0,
        y: -150,
        color: '#3b82f6'
    }, // Blue
    {
        id: 'B',
        label: 'B',
        x: 0,
        y: -50,
        color: '#3b82f6'
    }, // Blue
    {
        id: 'C',
        label: 'C',
        x: 0,
        y: 50,
        color: '#6366f1'
    }, // Indigo (Pusat)
    {
        id: 'D',
        label: 'D',
        x: 100,
        y: 130,
        color: '#10b981'
    }, // Green
    {
        id: 'E',
        label: 'E',
        x: -100,
        y: 130,
        color: '#f59e0b'
    } // Amber
    ]);
    const edges = new vis.DataSet([{
        from: 'A',
        to: 'B'
    }, {
        from: 'B',
        to: 'C'
    }, {
        from: 'C',
        to: 'D'
    }, {
        from: 'C',
        to: 'E'
    }]);
    const options = {
        physics: {
            enabled: false
        },
        interaction: {
            dragNodes: false,
            dragView: false,
            zoomView: false,
            hover: true
        },
        nodes: {
            shape: 'circle',
            widthConstraint: 45,
            borderWidth: 0,
            font: {
                size: 18,
                color: '#ffffff',
                face: 'Inter',
                bold: {
                    size: 18
                }
            },
            color: {
                highlight: {
                    background: '#fbbf24',
                    border: '#fbbf24'
                },
                hover: {
                    background: '#fbbf24',
                    border: '#fbbf24'
                }
            }
        },
        edges: {
            width: 3,
            color: {
                color: '#cbd5e1',
                highlight: '#94a3b8'
            },
            smooth: {
                type: 'continuous',
                roundness: 0
            }
        }
    };
    networkAct12 = new vis.Network(container, {
        nodes,
        edges
    }, options);
    networkAct12.once("afterDrawing", function () {
        networkAct12.fit({
            scale: 1.1
        });
    });
}

function resetActivity12() {
    if (networkAct12) {
        networkAct12.destroy();
        initActivity12();
    }
}
// ==========================================
// LOGIKA BAB 1.2 (FIXED GLOBAL SCOPE)
// ==========================================

// 1. Inisialisasi Variable Global
window.userAnswers12 = {};

document.addEventListener('DOMContentLoaded', () => {
    // Pastikan data soal ada sebelum inisialisasi
    if (window.quizData12) {
        Object.keys(window.quizData12).forEach(key => {
            // Set default null jika belum ada
            if (window.userAnswers12[key] === undefined) {
                window.userAnswers12[key] = null;
            }
        });
    }
});

// 2. Fungsi Pilih Jawaban
function selectOption12(qId, val, btn) {
    // Simpan ke GLOBAL variable
    window.userAnswers12[qId] = val;

    // Reset Visual Tombol
    const parent = btn.parentElement;
    parent.querySelectorAll('.option-btn').forEach(b => {
        b.className = 'option-btn w-full text-left px-4 py-3 rounded border border-slate-300 bg-white hover:bg-slate-50 text-sm font-medium text-slate-700 transition-all';
    });

    // Highlight Tombol Terpilih
    btn.className = 'option-btn w-full text-left px-4 py-3 rounded border border-blue-500 bg-blue-50 text-blue-900 text-sm font-semibold transition-all ring-1 ring-blue-500';

    // Sembunyikan notifikasi error/warning saat user memilih ulang
    document.getElementById('msg-warning-12')?.classList.add('hidden');
    document.getElementById('msg-error-12')?.classList.add('hidden');
}

// 3. Fungsi Periksa Jawaban
function checkAnswers12() {

    const questions = Object.keys(window.quizData12);
    const totalQuestions = questions.length;

    let answeredCount = 0;
    let score = 0;
    let maxScore = 0;
    let allCorrect = true;

    document.getElementById('msg-warning-12')?.classList.add('hidden');
    document.getElementById('msg-error-12')?.classList.add('hidden');
    document.getElementById('msg-success-12')?.classList.add('hidden');

    questions.forEach(q => {
        document.getElementById(`fb-${q}-12`)?.classList.add('hidden');
    });

    questions.forEach(q => {
        const data = window.quizData12[q];
        const userAnswer = window.userAnswers12[q];

        maxScore += (data.weight || 0);

        if (userAnswer) {
            answeredCount++;

            const cleanUser = String(userAnswer).trim().toLowerCase();
            const cleanKey = String(data.correct).trim().toLowerCase();

            if (cleanUser === cleanKey) {
                score += (data.weight || 0);
            } else {
                allCorrect = false;
            }
        } else {
            allCorrect = false;
        }
    });

    console.log(`[Bab 1.2] Progress: ${answeredCount}/${totalQuestions}`);
    console.log("[Bab 1.2] Jawaban User:", window.userAnswers12);

    if (answeredCount < totalQuestions) {
        const warnEl = document.getElementById('msg-warning-12');
        if (warnEl) {
            warnEl.classList.remove('hidden');
            warnEl.innerHTML =
                `⚠️ Anda baru menjawab <b>${answeredCount}</b> dari <b>${totalQuestions}</b> pertanyaan.`;
        }
        return;
    }

    const finalGrade = maxScore > 0
        ? Math.round((score / maxScore) * 100)
        : 0;

    if (allCorrect) {

        document.getElementById('msg-success-12')?.classList.remove('hidden');

        const scoreEl = document.getElementById('scoreDisplay12');
        if (scoreEl) scoreEl.innerText = finalGrade;

        const nextBtn = document.getElementById('btnNext12');
        if (nextBtn) {
            nextBtn.disabled = false;
            nextBtn.classList.remove('opacity-50', 'cursor-not-allowed');
        }

        questions.forEach(q => {
            const fb = document.getElementById(`fb-${q}-12`);
            if (fb) {
                fb.classList.remove('hidden');
                const penjelasan = window.quizData12[q].explanation || "";
                fb.innerHTML = penjelasan ? `✅ ${penjelasan}` : "✅ Jawaban benar.";

                fb.className =
                    "mt-3 text-sm p-3 rounded bg-green-50 border border-green-200 text-green-800 animate-fade-in";
            }
        });

        if (typeof saveProgress === 'function') {
            console.log("Kirim 1.2:", window.userAnswers12);
            saveProgress('1.2', finalGrade, window.userAnswers12);
        }

    } else {

        const errEl = document.getElementById('msg-error-12');
        if (errEl) {
            errEl.classList.remove('hidden');
            errEl.innerHTML =
                "❌ Analisis Anda belum tepat. Perhatikan kembali visualisasi graf di atas.";
        }

        const nextBtn = document.getElementById('btnNext12');
        if (nextBtn) {
            nextBtn.disabled = true;
            nextBtn.classList.add('opacity-50', 'cursor-not-allowed');
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
        initGraph13?.();
        initActivity12?.();
        
        // CEK DULU APAKAH SUDAH SELESAI SEBELUM MERESET!
        const isKgGlobalDone = localStorage.getItem('konigsberg_global_done') === 'true';
        if (!isKgGlobalDone) {
            resetBridgeGame?.();
        } else {
            // Jika sudah selesai, langsung panggil revealExplanation saat load
            if (typeof revealExplanation === 'function') {
                document.getElementById('attempt-count').innerText = '0';
                updateStatus(`KESEMPATAN HABIS! Baca penjelasan di bawah.`, "💡");
                revealExplanation();
            }
        }
    }, 500);
});

const PICKUP_NODE = 'Pasar';
const END_NODE = 'Kampus';

let currentNode = 'Rumah';
let hasPassenger = false;
let isFinished = false;
let pathHistory = ['Rumah'];

window.movePlayer = function (targetNode, x, y) {
    if (isFinished || targetNode === currentNode) return;

    const edge =
        document.getElementById(`e-${currentNode}-${targetNode}`) ||
        document.getElementById(`e-${targetNode}-${currentNode}`);

    if (!edge) {
        showToast(`Gagal: Tidak terdapat sisi (edge) yang menghubungkan ${currentNode} ke ${targetNode}.`);
        return;
    }

    document.getElementById('motor')
        .setAttribute('transform', `translate(${x}, ${y})`);

    edge.classList.add('active');
    document.getElementById(`n-${targetNode}`).classList.add('visited');

    currentNode = targetNode;
    pathHistory.push(targetNode);

    if (targetNode === PICKUP_NODE) {
        hasPassenger = true;
        showToast("Penumpang berhasil dijemput. Lanjutkan ke Kampus.", "success");
        updateBadge(true);
    }

    if (targetNode === END_NODE) {
        hasPassenger ? finishGame()
            : showToast("Peringatan: Penumpang belum dijemput di Pasar.", "warning");
    }

    document.getElementById('instruction').innerHTML =
        `Posisi saat ini: <b>${targetNode}</b>.`;
};
function finishGame() {
    isFinished = true;

    showToast("Misi Selesai.", "success");

    document.getElementById("instruction").innerHTML =
        "<b>Simulasi Selesai.</b> Silakan pelajari analisis di bawah.";

    const passedTaman = pathHistory.includes("Taman");
    let feedbackHTML = "";

    if (passedTaman) {
        feedbackHTML = `
            <div class="feedback-box" style="border-left: 4px solid #d97706; background: #fffbeb;">
                <span class="feedback-title" style="color:#b45309">
                    Evaluasi Lintasan: Kurang Efisien
                </span>

                <p style="margin:5px 0 0; color:#92400e;">
                    Lintasan yang ditempuh:
                    <b>${pathHistory.join(" &rarr; ")}</b>
                </p>

                <p style="margin-top:10px; color:#334155;">
                    Secara topologi graf, lintasan ini <b>VALID</b> (terhubung).<br>
                    Namun, rute ini <b>TIDAK EFISIEN</b> karena Anda singgah di
                    simpul <b>Taman</b> yang menambah panjang lintasan menjadi
                    <b>${pathHistory.length - 1} sisi</b>.
                </p>
            </div>
        `;
    } else {
        feedbackHTML = `
            <div class="feedback-box" style="border-left: 4px solid #16a34a; background: #f0fdf4;">
                <span class="feedback-title" style="color:#15803d">
                    Evaluasi Lintasan: Sangat Efisien
                </span>

                <p style="margin:5px 0 0; color:#166534;">
                    Lintasan yang ditempuh:
                    <b>${pathHistory.join(" &rarr; ")}</b>
                </p>

                <p style="margin-top:10px; color:#334155;">
                    <b>Sempurna!</b> Anda memilih lintasan terpendek
                    (hanya <b>2 sisi</b>) tanpa mengunjungi simpul tambahan
                    yang tidak perlu.
                </p>
            </div>
        `;
    }

    document.getElementById("feedback-text").innerHTML = feedbackHTML;

    const panel = document.getElementById("edu-panel");

    // 1. Tampilkan panel terlebih dahulu
    panel.style.display = "block";

    // 2. Trigger animasi slide-up
    setTimeout(() => {
        panel.classList.add("show");
    }, 50);

    // 3. Scroll otomatis setelah panel muncul
    setTimeout(() => {
        const yOffset = -100;
        const elementPosition = panel.getBoundingClientRect().top;
        const offsetPosition =
            elementPosition + window.pageYOffset + yOffset;

        window.scrollTo({
            top: offsetPosition,
            behavior: "smooth"
        });
    }, 800);
}

function updateBadge(pickedUp) {
    const badge = document.getElementById('mission-status');
    badge.innerHTML = pickedUp
        ? "Status: Membawa Penumpang"
        : "Status: Menunggu Penjemputan";

    badge.classList.toggle('success', pickedUp);
}

window.resetOjekGame = function () {
    currentNode = 'Rumah';
    hasPassenger = false;
    isFinished = false;
    pathHistory = ['Rumah'];

    document.querySelectorAll('.edge-path').forEach(e => e.classList.remove('active'));
    document.querySelectorAll('.node-ojek').forEach(n => n.classList.remove('visited'));

    document.getElementById('motor')
        .setAttribute('transform', 'translate(150, 250)');

    updateBadge(false);
    document.getElementById('instruction').innerHTML =
        "Posisi Awal: <b>Rumah</b>. Klik lokasi tujuan untuk berpindah.";

    const panel = document.getElementById('edu-panel');
    panel.classList.remove('show');
    panel.style.display = 'none';
    setTimeout(() => panel.style.display = '', 100);
};
const medsosGraph = {
    Andi: ['Budi', 'Citra'],
    Budi: ['Andi', 'Citra', 'Dani'],
    Citra: ['Andi', 'Budi', 'Dani'],
    Dani: ['Budi', 'Citra']
};

let currentMedsosNode = 'Andi';
let medsosPathHistory = ['Andi'];
let isMedsosFinished = false;

window.handleMedsosClick = function (clickedNode) {
    if (isMedsosFinished || clickedNode === currentMedsosNode) return;

    const neighbors = medsosGraph[currentMedsosNode];
    if (!neighbors.includes(clickedNode)) {
        showMedsosToast(
            "Peringatan: Simpul tujuan tidak terhubung langsung dengan posisi saat ini."
        );
        return;
    }

    activateMedsosEdge(currentMedsosNode, clickedNode);
    document.getElementById(`n-${clickedNode}`)?.classList.add('active');

    currentMedsosNode = clickedNode;
    medsosPathHistory.push(clickedNode);

    document.getElementById('instruction-medsos').innerHTML =
        `Posisi saat ini: <b>${currentMedsosNode}</b>.`;

    if (currentMedsosNode === 'Dani') {
        finishMedsosSimulation();
    }
};

function activateMedsosEdge(u1, u2) {
    const el =
        document.getElementById(`e-${u1}-${u2}`) ||
        document.getElementById(`e-${u2}-${u1}`);
    el?.classList.add('active');
}

function finishMedsosSimulation() {
    isMedsosFinished = true;

    document.getElementById("instruction-medsos").innerText =
        "Simulasi Selesai.";

    const panel = document.getElementById("analysis-panel-medsos");
    const text = document.getElementById("analysis-text-medsos");

    text.innerHTML = `
        <p>
            <strong>Konektivitas Berhasil Dikonfirmasi.</strong>
        </p>

        <p>
            Anda berhasil menghubungkan simpul <strong>Andi</strong>
            dengan simpul <strong>Dani</strong> melalui lintasan:
            <br>
            <code>${medsosPathHistory.join(" → ")}</code>.
        </p>

        <p style="margin:10px 0 0 0;">
            <strong>Kesimpulan:</strong><br>
            Simulasi ini menunjukkan bahwa dalam sebuah graf,
            dua simpul dapat memiliki hubungan tidak langsung
            (<em>Indirect Connection</em>) meskipun tidak memiliki
            sisi yang menghubungkan keduanya secara langsung.
            Hubungan ini terbentuk melalui simpul perantara.
        </p>
    `;

    // Tampilkan panel analisis
    panel.classList.add("show");

    // Scroll halus ke panel
    setTimeout(() => {
        panel.scrollIntoView({
            behavior: "smooth",
            block: "center"
        });
    }, 500);
}


function showMedsosToast(msg) {
    const t = document.getElementById('toast-msg-medsos');
    t.innerText = msg;
    t.classList.add('show');
    setTimeout(() => t.classList.remove('show'), 3000);
}

window.resetMedsosGraph = function () {
    currentMedsosNode = 'Andi';
    medsosPathHistory = ['Andi'];
    isMedsosFinished = false;

    document.querySelectorAll('.link-medsos')
        .forEach(el => el.classList.remove('active'));

    document.querySelectorAll('.node-medsos')
        .forEach(el => el.classList.toggle('active', el.id === 'n-Andi'));

    document.getElementById('instruction-medsos').innerHTML =
        "Posisi saat ini: <b>Andi</b>.";

    document.getElementById('analysis-panel-medsos')
        ?.classList.remove('show');
};
function initEcommerceDrag() {
    const source = document.getElementById('dragSource');
    if (!source) return;
    source.innerHTML = '';
    document.getElementById('ecStatusMessage').className = 'hidden';
    document.getElementById('ecSuccessExplanation').classList.add('hidden');
    document.querySelectorAll('.zone-content').forEach(z => z.innerHTML = '');

    const shuffled = [...window.ecItems].sort(() => Math.random() - 0.5);

    shuffled.forEach(item => {
        const el = document.createElement('div');
        el.id = item.id;
        el.draggable = true;
        el.className =
            'draggable-item bg-white border border-slate-300 shadow-sm px-3 py-2 rounded cursor-grab text-xs font-semibold text-slate-700 hover:border-blue-500 hover:text-blue-700 transition-all w-full text-center select-none';
        el.innerText = item.text;
        el.dataset.correctCategory = item.category;
        el.addEventListener('dragstart', dragStart);
        source.appendChild(el);
    });

    document.querySelectorAll('.drop-zone').forEach(zone => {
        zone.addEventListener('dragover', dragOver);
        zone.addEventListener('dragleave', dragLeave);
        zone.addEventListener('drop', dropItem);
    });
}

function dragStart(e) {
    e.dataTransfer.setData('text/plain', e.target.id);

    // PAKAI INLINE STYLE (PENTING)
    e.target.style.opacity = '0.5';
    e.target.style.cursor = 'grabbing';

    window.currentDraggingItem = e.target;
}

function dragEnd(e) {
    // FORCE RESET VISUAL
    e.target.style.opacity = '1';
    e.target.style.cursor = 'grab';

    window.currentDraggingItem = null;
}



function dragOver(e) {
    e.preventDefault();
    e.currentTarget.classList.add('bg-blue-50', 'border-blue-300');
}

function dragLeave(e) {
    e.currentTarget.classList.remove('bg-blue-50', 'border-blue-300');
}

function dropItem(e) {
    e.preventDefault();
    const zone = e.currentTarget;
    zone.classList.remove('bg-blue-50', 'border-blue-300');

    const id = e.dataTransfer.getData('text/plain');
    const draggable = document.getElementById(id);
    if (!draggable) return;

    draggable.classList.remove('opacity-50');

    (zone.querySelector('.zone-content') || zone).appendChild(draggable);

    draggable.className =
        'draggable-item bg-white border border-slate-300 shadow-sm px-3 py-2 rounded cursor-grab text-xs font-semibold text-slate-700 hover:border-blue-500 hover:text-blue-700 transition-all w-full text-center select-none';

    draggable.draggable = true;

    // 🔥 PASANG ULANG EVENT (INI KUNCINYA)
    draggable.addEventListener('dragstart', dragStart);
    draggable.addEventListener('dragend', dragEnd);

}


window.resetEcommerceDrag = function () {
    initEcommerceDrag();
};

document.addEventListener('DOMContentLoaded', () => {
    setTimeout(initEcommerceDrag, 1000);
});
/* =========================================================
   EVALUATION LOGIC (TANPA BLADE)
   Data diambil dari:
   - window.evalData
   - window.dbExplanations
   - window.passingGrade
========================================================= */

/* -------------------------------
   RESET STATE
-------------------------------- */
window.resetEvalState = function () {
    const warn = document.getElementById('eval-msg-warning');
    if (warn) warn.classList.add('hidden');
};

// ==========================================
// LOGIKA EVALUASI (FIXED Q1 & Q5)
// ==========================================

// 1. Inisialisasi Variabel Global Evaluasi
window.evalAnswers = {};

// 2. Fungsi Reset State (Sembunyikan Notif)
window.resetEvalState = function () {
    const warn = document.getElementById('eval-msg-warning');
    if (warn) warn.classList.add('hidden');
};

// // 3. Fungsi Cek Evaluasi
// window.checkEvaluation = function () {
//     let answeredCount = 0;
//     const totalQuestions = 5;
//     let currentScore = 0;

//     // Reset Hasil Visual Sebelumnya
//     const results = { m1: false, m2: false, m3: false, m4: false, m5: false };

//     // ==========================================
//     // CEK SOAL NO 1 (Tipe: Pilihan Ganda Tombol)
//     // ==========================================
//     // FIX: Ambil dari window.evalAnswers, BUKAN dari input radio
//     const ans1 = window.evalAnswers['m1'];

//     if (ans1) {
//         answeredCount++;
//         // Cek Jawaban (Case Insensitive)
//         if (String(ans1).trim().toLowerCase() === String(window.evalData.m1.answer).trim().toLowerCase()) {
//             currentScore += window.evalData.m1.weight;
//             results.m1 = true;
//         }
//     }

//     // ==========================================
//     // CEK SOAL NO 2 (Tipe: Isian Drag/Ketik Manual)
//     // ==========================================
//     // (Tetap baca dari DOM karena input text)
//     const m2_1 = document.getElementById('m2-1')?.value.trim();
//     const m2_2 = document.getElementById('m2-2')?.value.trim();
//     const m2_3 = document.getElementById('m2-3')?.value.trim();
//     const m2_4 = document.getElementById('m2-4')?.value.trim();

//     if (m2_1 && m2_2 && m2_3 && m2_4) {
//         answeredCount++;
//         // Logika Benar: ( ) ( )
//         if (m2_1 === '(' && m2_2 === ')' && m2_3 === '(' && m2_4 === ')') {
//             currentScore += window.evalData.m2.weight;
//             results.m2 = true;
//         }
//     }

//     // ==========================================
//     // CEK SOAL NO 3 (Tipe: Isian Angka)
//     // ==========================================
//     // (Tetap baca dari DOM)
//     const m3 = document.getElementById('m3-ans')?.value.trim();
//     if (m3) {
//         answeredCount++;
//         if (m3.toLowerCase() === String(window.evalData.m3.answer).toLowerCase()) {
//             currentScore += window.evalData.m3.weight;
//             results.m3 = true;
//         }
//     }

//     // ==========================================
//     // CEK SOAL NO 4 (Tipe: Checkbox)
//     // ==========================================
//     // (Tetap baca dari DOM karena checkbox native)
//     const m4Checks = document.querySelectorAll('input[name="m4"]:checked');
//     if (m4Checks.length > 0) {
//         answeredCount++;

//         const userValues = Array.from(m4Checks).map(cb => cb.value.trim().toLowerCase());

//         let correct = window.evalData.m4.answer;
//         if (!Array.isArray(correct)) {
//             // Fallback parsing jika format string
//             try { correct = JSON.parse(correct); } catch(e) { correct = ['akun', 'toko', 'produk']; }
//         }
//         correct = correct.map(v => v.toLowerCase());

//         // Cek: Jumlah harus sama DAN isinya harus ada di kunci
//         const isCorrect = userValues.length === correct.length && 
//                           userValues.every(v => correct.includes(v));

//         if (isCorrect) {
//             currentScore += window.evalData.m4.weight;
//             results.m4 = true;
//         }
//     }

//     // ==========================================
//     // CEK SOAL NO 5 (Tipe: Pilihan Ganda Tombol)
//     // ==========================================
//     // FIX: Ambil dari window.evalAnswers, BUKAN dari input radio
//     const ans5 = window.evalAnswers['m5'];

//     if (ans5) {
//         answeredCount++;
//         // Cek Jawaban
//         if (String(ans5).trim().toLowerCase() === String(window.evalData.m5.answer).trim().toLowerCase()) {
//             currentScore += window.evalData.m5.weight;
//             results.m5 = true;
//         }
//     }

//     // ==========================================
//     // VALIDASI & RESULT
//     // ==========================================

//     // Debugging (Cek di Console)
//     console.log(`Evaluasi Progress: ${answeredCount}/${totalQuestions}`);
//     console.log("Jawaban Global:", window.evalAnswers);

//     const warnEl = document.getElementById('eval-msg-warning');
//     warnEl?.classList.add('hidden');

//     if (answeredCount < totalQuestions) {
//         warnEl?.classList.remove('hidden');
//         warnEl.innerHTML = `⚠️ Anda baru menjawab <b>${answeredCount}</b> dari <b>${totalQuestions}</b> soal.`;
//         return; // Stop di sini
//     }

//     // Tampilkan Hasil
//     const resultBox = document.getElementById('eval-result-box');
//     const scoreDisplay = document.getElementById('eval-score-display');
//     const badge = document.getElementById('eval-status-badge');
//     const msg = document.getElementById('eval-status-msg');
//     const btnCheck = document.getElementById('btnCheckEval');
//     const btnNext = document.getElementById('btnNextEval');

//     resultBox?.classList.remove('hidden');
//     if (scoreDisplay) scoreDisplay.innerText = currentScore;

//     if (currentScore >= (window.passingGrade || 75)) {
//         resultBox.className = "mb-6 p-6 rounded-lg text-center animate-fade-in shadow-sm border bg-green-50 border-green-200";
//         badge.className = "inline-block px-3 py-1 rounded text-xs font-bold uppercase tracking-wider mb-2 bg-green-200 text-green-800";
//         badge.innerText = "LULUS / KOMPETEN";
//         msg.innerText = "Selamat! Pemahaman Anda sudah sangat baik.";
//     } else {
//         resultBox.className = "mb-6 p-6 rounded-lg text-center animate-fade-in shadow-sm border bg-red-50 border-red-200";
//         badge.className = "inline-block px-3 py-1 rounded text-xs font-bold uppercase tracking-wider mb-2 bg-red-200 text-red-800";
//         badge.innerText = "BELUM TUNTAS";
//         msg.innerText = `Nilai Anda (${currentScore}) di bawah KKM. Silakan pelajari ulang materi.`;
//     }

//     // Kunci Tombol "Selesai", Buka Tombol "Lanjut"
//     if (btnCheck) {
//         btnCheck.disabled = true;
//         btnCheck.classList.add('opacity-50', 'cursor-not-allowed');
//         btnCheck.innerText = "Jawaban Terkirim";
//     }

//     if (btnNext) {
//         btnNext.disabled = false;
//         btnNext.classList.remove('opacity-50', 'cursor-not-allowed');
//     }

//     // Simpan Progres
//     if (typeof saveProgress === 'function') {
//         saveProgress('evaluasi', currentScore);
//     }

//     // Tampilkan Feedback Detail
//     showDetailedFeedback(results);
// };
/* =========================================================
   FUNGSI TAMBAHAN: SHOW DETAILED FEEDBACK
   (Paste ini di bagian paling bawah bab1.js)
========================================================= */

function showDetailedFeedback(results) {
    // Pastikan window.dbExplanations ada (dikirim dari Blade)
    if (!window.dbExplanations) return;

    for (let i = 1; i <= 5; i++) {
        const el = document.getElementById(`fb-eval-m${i}`);
        if (!el) continue;

        // Reset class
        el.className = 'hidden mt-4 p-3 rounded text-sm animate-fade-in border';

        if (results['m' + i] === true) {
            // JIKA BENAR
            el.classList.add('bg-green-50', 'border-green-200', 'text-green-800');
            el.classList.remove('hidden');
            el.innerHTML = `<strong>✅ Jawaban Benar!</strong><br>${window.dbExplanations['m' + i]}`;
        } else {
            // JIKA SALAH
            el.classList.add('bg-red-50', 'border-red-200', 'text-red-800');
            el.classList.remove('hidden');
            el.innerHTML = `<strong>❌ Jawaban Kurang Tepat.</strong><br>Silakan baca kembali materi dan coba lagi.`;
        }
    }
}

/* -------------------------------
   LANJUT KE REFLEKSI
-------------------------------- */
window.handleReflectionNext = function () {
    const btn = document.getElementById('btnNextEval');
    if (btn) btn.innerText = 'Memuat...';

    setTimeout(() => {
        if (typeof nextStep === 'function') {
            nextStep();
        }
    }, 500);
};

window.handleReflectionNext = function () {
    const btn = document.querySelector('#step-6 .btn-primary');
    if (!btn) return;

    const originalText = btn.innerText;

    btn.innerText = 'Menyimpan...';
    btn.disabled = true;

    setTimeout(() => {
        btn.innerText = originalText;
        btn.disabled = false;

        if (typeof nextStep === 'function') {
            nextStep();
        }
    }, 500);
};
/* =========================================================
   UNIVERSAL SAVE PROGRESS (BAB 1)
========================================================= */
window.saveProgress = function (sectionCode, scoreValue, answerData = null) {

    if (!window.appRoutes || !window.appConfig) {
        console.error("Config belum tersedia");
        return;
    }

    const payload = {
        chapter: window.appConfig.chapter,
        section: sectionCode,
        score: scoreValue,
        answer: answerData, // 🔥 tambahan baru
        _token: window.appConfig.csrfToken
    };

    fetch(window.appRoutes.submitScore, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify(payload)
    })
        .then(response => response.json())
        .then(data => {
            console.log(`Sukses simpan ${sectionCode}:`, data);
        })
        .catch(error => {
            console.error(`Gagal simpan ${sectionCode}:`, error);
        });
};


// ===============================
// GLOBAL DATA STORE
// ===============================
window.gameDataStore = window.gameDataStore || {};



// ===============================
// CHECK ANSWER
// ===============================
function checkGameAnswer(gameId) {
    const statusMsg = document.getElementById(`status-${gameId}`);
    const explanation = document.getElementById(`explain-${gameId}`);
    const totalItems = gameDataStore[gameId].length;

    let correctCount = 0;
    let isComplete = true;
    let hasAnyDrop = false;

    const items = document.querySelectorAll(
        `[data-game-id="${gameId}"].draggable-item`
    );

    items.forEach(item => {
        const trueCat = item.dataset.category;
        const parentZone = item.closest('.drop-zone');
        if (!parentZone) return;

        const currentCat = parentZone.dataset.category;

        // Bersihkan semua indikator visual
        item.classList.remove(
            'correct', 'wrong',
            'bg-green-100', 'bg-red-100',
            'text-green-700', 'text-red-700',
            'border-green-500', 'border-red-500'
        );

        // Deteksi apakah sudah ada item yang dipindahkan dari source
        if (currentCat !== 'source') {
            hasAnyDrop = true;
        }

        if (currentCat === 'source') {
            if (trueCat === 'distractor') {
                correctCount++;
            } else {
                isComplete = false;
            }
        } else {
            if (currentCat === trueCat) {
                correctCount++;
            } else {
                isComplete = false;
            }
        }
    });

    statusMsg.classList.remove(
        'hidden',
        'bg-red-100', 'text-red-800',
        'bg-green-100', 'text-green-800',
        'bg-yellow-100', 'text-yellow-800'
    );

    // KONDISI 1: BELUM ADA SATUPUN YANG DI-DROP
    if (!hasAnyDrop) {
        statusMsg.classList.add('bg-yellow-100', 'text-yellow-800');
        statusMsg.innerHTML =
            '<strong>Belum ada item yang dipindahkan.</strong> Silakan seret data ke dalam kategori yang sesuai.';
        explanation.classList.add('hidden');
        return;
    }

    // KONDISI 2: SEMUA BENAR
    if (correctCount === totalItems) {

        // ===============================
        // BUAT STRUKTUR JAWABAN
        // ===============================
        let resultData = {
            vertex: [],
            edge: [],
            degree: []
        };

        items.forEach(item => {
            const parentZone = item.closest('.drop-zone');
            if (!parentZone) return;

            const currentCat = parentZone.dataset.category;

            if (currentCat !== 'source') {
                resultData[currentCat].push(item.dataset.id);
            }
        });

        console.log("Saving result:", resultData);

        // ===============================
        // SIMPAN KE SERVER
        // ===============================
        saveProgress('1.3', 100, resultData);

        // ===============================
        // TAMPILKAN STATUS
        // ===============================
        statusMsg.classList.add('bg-green-100', 'text-green-800');
        statusMsg.innerHTML =
            '<strong>Tepat!</strong> Semua data sudah dikelompokkan dengan benar.';

        explanation.classList.remove('hidden');

        return;
    }


    // KONDISI 3: SUDAH ADA DROP TAPI MASIH ADA YANG KURANG TEPAT
    statusMsg.classList.add('bg-yellow-100', 'text-yellow-800');
    statusMsg.innerHTML =
        'Masih ada yang <strong>kurang tepat</strong>. Silakan periksa kembali pengelompokan data.';
    explanation.classList.add('hidden');
}


// ===============================
// GLOBAL DROP LISTENER
// ===============================
document.addEventListener('DOMContentLoaded', function () {
    const allDropZones = document.querySelectorAll('.drop-zone');

    allDropZones.forEach(zone => {
        zone.addEventListener('dragover', e => {
            e.preventDefault();
            zone.classList.add('drag-over');
        });

        zone.addEventListener('dragleave', () =>
            zone.classList.remove('drag-over')
        );

        zone.addEventListener('drop', e => {
            e.preventDefault();
            zone.classList.remove('drag-over');

            const draggingItem = document.querySelector('.dragging');
            if (!draggingItem) return;

            const itemGameId = draggingItem.dataset.gameId;
            const zoneGameId = zone.dataset.gameId;

            if (itemGameId == zoneGameId) {
                if (zone.dataset.category === 'source') {
                    zone.appendChild(draggingItem);
                } else {
                    const content =
                        zone.querySelector('.zone-content') || zone;
                    content.appendChild(draggingItem);
                }
            }
        });
    });
});
// ========================================
// UNIVERSAL OPTION SELECTOR
// Dipakai untuk semua aktivitas dan evaluasi
// ========================================

function selectQuizOption(questionId, selectedKey, btnElement, storageKey = 'userAnswers') {
    // 1. Reset semua button di soal yang sama
    const container = btnElement.closest('.quiz-item, .question-container');
    const allButtons = container.querySelectorAll('.option-btn');

    allButtons.forEach(btn => {
        btn.classList.remove('selected');
    });

    // 2. Tandai button yang dipilih
    btnElement.classList.add('selected');

    // 3. Simpan jawaban ke storage
    if (!window[storageKey]) {
        window[storageKey] = {};
    }
    window[storageKey][questionId] = selectedKey;

    // 4. Reset notifications
    hideAllNotifications();

    // 5. Sembunyikan feedback lama
    const feedbackBox = container.querySelector('[id^="feedback-"], [id^="fb-"]');
    if (feedbackBox) {
        feedbackBox.classList.add('hidden');
    }

    console.log(`[${storageKey}] ${questionId} → ${selectedKey}`);
}

function hideAllNotifications() {
    // Sembunyikan semua warning/error/success
    document.querySelectorAll('[id*="warning"], [id*="error"], [id*="success"]').forEach(el => {
        el.classList.add('hidden');
    });
}

// ========================================
// WRAPPER FUNCTIONS (Backward Compatible)
// ========================================

function selectOption11(questionId, selectedKey, btnElement) {
    selectQuizOption(questionId, selectedKey, btnElement, 'userAnswers11');
}

function selectOption12(questionId, selectedKey, btnElement) {
    selectQuizOption(questionId, selectedKey, btnElement, 'userAnswers12');
}

function selectEvalOption(questionId, selectedKey, btnElement) {
    selectQuizOption(questionId, selectedKey, btnElement, 'evalAnswers');
    markAnswered(parseInt(questionId.replace('m', ''))); // Untuk evaluasi tracker
}
/* =========================================================
   LOGIKA AKTIVITAS 1.3: DRAG & DROP (FIXED)
   ========================================================= */

window.initDragGame = function (gameId, jsonData, saved = null) {

    const gameContainer = document.getElementById(`game-container-${gameId}`);
    const sourceZone = document.getElementById(`dragSource-${gameId}`);
    const statusMsg = document.getElementById(`status-${gameId}`);
    const explanation = document.getElementById(`explain-${gameId}`);
    console.log("INIT:", gameId, jsonData, saved);
    if (!window.gameDataStore) {
        window.gameDataStore = {};
    }

    if (!gameContainer || !sourceZone) return;

    // ===============================
    // PARSE DATA
    // ===============================
    if (jsonData) {
        try {
            window.gameDataStore[gameId] =
                (typeof jsonData === 'string')
                    ? JSON.parse(jsonData)
                    : jsonData;
        } catch (e) {
            console.error("Error parsing JSON data", e);
            return;
        }
    }

    const items = window.gameDataStore[gameId];
    if (!items) return;

    // ===============================
    // RESET TAMPILAN
    // ===============================
    sourceZone.innerHTML = '';

    if (statusMsg) {
        statusMsg.className =
            'hidden mb-4 p-3 rounded text-sm text-center font-medium';
    }

    explanation?.classList.add('hidden');

    const targetZones = gameContainer.querySelectorAll('.zone-content');
    targetZones.forEach(z => z.innerHTML = '');

    // ===============================
    // RENDER ITEM
    // ===============================
    const shuffled = [...items].sort(() => Math.random() - 0.5);

    shuffled.forEach(item => {

        const div = document.createElement('div');
        div.className =
            'draggable-item bg-white border border-slate-300 shadow-sm px-3 py-2 rounded text-sm font-medium text-slate-700 hover:border-blue-400 transition-all cursor-grab select-none';

        div.draggable = true;
        div.textContent = item.text;
        div.dataset.id = item.id;
        div.dataset.category = item.category;
        div.dataset.gameId = gameId;

        div.addEventListener('dragstart', e => {
            e.dataTransfer.setData('text/plain', item.id);
            div.classList.add('dragging', 'opacity-50');
        });

        div.addEventListener('dragend', () => {
            div.classList.remove('dragging', 'opacity-50');
            gameContainer.querySelectorAll('.drop-zone')
                .forEach(z => z.classList.remove('bg-blue-50', 'border-blue-300'));
        });

        sourceZone.appendChild(div);
    });

    // ===============================
    // MODE REVIEW (RESTORE)
    // ===============================
    if (saved && typeof saved === 'object') {

        Object.keys(saved).forEach(category => {

            const zone = gameContainer.querySelector(
                `.drop-zone[data-category="${category}"]`
            );

            if (!zone || !Array.isArray(saved[category])) return;

            saved[category].forEach(itemId => {

                const item = gameContainer.querySelector(
                    `.draggable-item[data-id="${itemId}"]`
                );

                if (!item) return;

                const content = zone.querySelector('.zone-content') || zone;
                content.appendChild(item);

                item.draggable = false;
                item.classList.remove('cursor-grab');
                item.classList.add('cursor-default');
            });

        });

        // ===============================
        // TAMPILKAN STATUS REVIEW
        // ===============================
        if (statusMsg) {
            statusMsg.classList.remove('hidden');
            statusMsg.classList.add('bg-green-100', 'text-green-800');
            statusMsg.innerHTML =
                '<strong>✅ Aktivitas sudah diselesaikan.</strong>';
        }

        explanation?.classList.remove('hidden');

        // Hapus tombol aksi
        const checkBtn = gameContainer.querySelector('button[onclick*="checkGameAnswer"]');
        const resetBtn = gameContainer.querySelector('button[onclick*="initDragGame"]');

        checkBtn?.remove();
        resetBtn?.remove();
    }
};


// 3. Fungsi Cek Jawaban & Simpan Nilai
window.checkGameAnswer = function (gameId) {

    const statusMsg = document.getElementById(`status-${gameId}`);
    const explanation = document.getElementById(`explain-${gameId}`);
    const correctData = window.gameDataStore[gameId];

    // Cegah submit ulang kalau sudah selesai
    if (document.querySelector(`#game-container-${gameId} .cursor-default`)) {
        return;
    }

    if (!correctData) return;

    let correctCount = 0;
    let wrongPlacement = false;
    let validLeft = false;

    const gameContainer = document.getElementById(`game-container-${gameId}`);
    const items = gameContainer.querySelectorAll('.draggable-item');

    items.forEach(item => {

        const trueCat = item.dataset.category;
        const parentZone = item.closest('.drop-zone');
        if (!parentZone) return;

        const currentCat = parentZone.dataset.category;

        item.classList.remove(
            'bg-green-50', 'text-green-700', 'border-green-300',
            'bg-red-50', 'text-red-700', 'border-red-300'
        );

        if (currentCat === 'source') {
            if (trueCat !== 'distractor') validLeft = true;
        } else {
            if (currentCat === trueCat) {
                correctCount++;
                item.classList.add('bg-green-50', 'text-green-700', 'border-green-300');
            } else {
                wrongPlacement = true;
                item.classList.add('bg-red-50', 'text-red-700', 'border-red-300');
            }
        }

    });

    statusMsg.classList.remove(
        'hidden',
        'bg-yellow-100', 'text-yellow-800',
        'bg-red-100', 'text-red-800',
        'bg-green-100', 'text-green-800'
    );

    if (validLeft) {
        statusMsg.classList.add('bg-yellow-100', 'text-yellow-800');
        statusMsg.innerHTML = '⚠️ Masih ada data penting tertinggal di atas.';
        explanation?.classList.add('hidden');
        return;
    }

    if (wrongPlacement) {
        statusMsg.classList.add('bg-red-100', 'text-red-800');
        statusMsg.innerHTML = '❌ Masih ada item yang salah kamar (warna merah).';
        explanation?.classList.add('hidden');
        return;
    }

    // ======= MENANG =======
    const totalValidTarget = correctData.filter(i => i.category !== 'distractor').length;

    if (correctCount >= totalValidTarget) {

        statusMsg.classList.add('bg-green-100', 'text-green-800');
        statusMsg.innerHTML = '<strong>✅ Sempurna!</strong> Analisis Anda tepat.';
        explanation?.classList.remove('hidden');

        items.forEach(i => {
            i.draggable = false;
            i.classList.add('cursor-default');
        });

        // ====== BUAT STRUKTUR JAWABAN ======
        let resultData = {
            vertex: [],
            edge: [],
            degree: []
        };

        items.forEach(item => {
            const parentZone = item.closest('.drop-zone');
            if (!parentZone) return;

            const currentCat = parentZone.dataset.category;

            if (currentCat !== 'source' && resultData[currentCat]) {
                resultData[currentCat].push(item.dataset.id);
            }
        });

        console.log("✅ Menang 1.3! Mengirim nilai & jawaban...");

        if (typeof saveProgress === 'function') {
            saveProgress('1.3', 100, resultData);
        }

    }
};




// 4. Event Listener Global untuk Drop Zone (Wajib Ada)
document.addEventListener('DOMContentLoaded', function () {
    // Gunakan event delegation atau pasang listener ke semua dropzone
    const zones = document.querySelectorAll('.drop-zone');

    zones.forEach(zone => {
        zone.addEventListener('dragover', e => {
            e.preventDefault();
            zone.classList.add('bg-blue-50', 'border-blue-300');
        });

        zone.addEventListener('dragleave', () => {
            zone.classList.remove('bg-blue-50', 'border-blue-300');
        });

        zone.addEventListener('drop', e => {
            e.preventDefault();
            zone.classList.remove('bg-blue-50', 'border-blue-300');

            const draggingItem = document.querySelector('.dragging');
            if (!draggingItem) return;

            // Pastikan drop di zona game yang sama
            const itemGameId = draggingItem.dataset.gameId;
            const zoneGameId = zone.dataset.gameId;

            if (itemGameId === zoneGameId) {
                // Pindah DOM
                if (zone.dataset.category === 'source') {
                    zone.appendChild(draggingItem);
                } else {
                    const content = zone.querySelector('.zone-content') || zone;
                    content.appendChild(draggingItem);
                }
            }
        });
    });
});