<?php
$pageTitle = 'Tableau de bord';
require __DIR__ . '/layout/header.php';
?>

<!-- Script for Charts and PDF -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<header class="flex justify-between items-center mb-8">
    <div>
        <h2 class="text-3xl font-bold text-gray-800">Tableau de bord</h2>
        <p class="text-gray-500 mt-1">Aperçu général de l'activité</p>
    </div>
    <button onclick="exportDashboard()" class="flex items-center gap-2 bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
        </svg>
        Exporter PDF
    </button>
</header>

<div id="dashboard-content" class="space-y-8">
    
    <!-- KPI Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Bénévoles -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 relative overflow-hidden group hover:shadow-md transition">
            <div class="absolute right-0 top-0 h-full w-1/4 bg-blue-50 transform skew-x-12 translate-x-2"></div>
            <div class="relative z-10">
                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-1">Bénévoles</h3>
                <span class="text-4xl font-bold text-gray-800"><?= $stats['benevoles'] ?></span>
                <p class="text-green-500 text-sm mt-2 flex items-center">
                    <span class="bg-green-100 px-1 rounded mr-1">Actifs</span>
                </p>
            </div>
        </div>

        <!-- Donations (New) -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 relative overflow-hidden group hover:shadow-md transition">
            <div class="absolute right-0 top-0 h-full w-1/4 bg-yellow-50 transform skew-x-12 translate-x-2"></div>
            <div class="relative z-10">
                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-1">Dons Récoltés</h3>
                <span class="text-4xl font-bold text-gray-800"><?= number_format($stats['donations'], 2, ',', ' ') ?> €</span>
                <p class="text-gray-400 text-sm mt-2">Total période</p>
            </div>
        </div>

        <!-- Evénements -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 relative overflow-hidden group hover:shadow-md transition">
            <div class="absolute right-0 top-0 h-full w-1/4 bg-purple-50 transform skew-x-12 translate-x-2"></div>
            <div class="relative z-10">
                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-1">Événements</h3>
                <span class="text-4xl font-bold text-gray-800"><?= $stats['evenements'] ?></span>
                <p class="text-purple-600 text-sm mt-2">Planifiés/Réalisés</p>
            </div>
        </div>

        <!-- Partenaires -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 relative overflow-hidden group hover:shadow-md transition">
            <div class="absolute right-0 top-0 h-full w-1/4 bg-green-50 transform skew-x-12 translate-x-2"></div>
            <div class="relative z-10">
                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-1">Partenaires</h3>
                <span class="text-4xl font-bold text-gray-800"><?= $stats['partenaires'] ?></span>
                <p class="text-gray-400 text-sm mt-2">Entreprises & Assos</p>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Growth Chart -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
             <h3 class="text-lg font-bold text-gray-800 mb-4">Évolution des Bénévoles</h3>
             <div class="h-64">
                 <canvas id="benevoleChart"></canvas>
             </div>
        </div>

        <!-- Donation Chart -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
             <h3 class="text-lg font-bold text-gray-800 mb-4">Suivi des Dons</h3>
             <div class="h-64">
                 <canvas id="donationChart"></canvas>
             </div>
        </div>
    </div>

    <!-- Shortcuts -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <a href="/admin/articles" class="flex flex-col items-center justify-center p-8 bg-blue-50 rounded-xl border border-blue-100 hover:bg-blue-100 transition cursor-pointer group">
            <div class="p-3 bg-white rounded-full shadow-sm text-blue-600 mb-4 group-hover:scale-110 transition">
                 <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                 </svg>
            </div>
            <span class="font-semibold text-gray-700">Gérer les Actualités</span>
        </a>
        
        <a href="/admin/documents" class="flex flex-col items-center justify-center p-8 bg-indigo-50 rounded-xl border border-indigo-100 hover:bg-indigo-100 transition cursor-pointer group">
             <div class="p-3 bg-white rounded-full shadow-sm text-indigo-600 mb-4 group-hover:scale-110 transition">
                 <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                 </svg>
            </div>
            <span class="font-semibold text-gray-700">Documents Internes</span>
        </a>

        <a href="/admin/newsletters" class="flex flex-col items-center justify-center p-8 bg-pink-50 rounded-xl border border-pink-100 hover:bg-pink-100 transition cursor-pointer group">
             <div class="p-3 bg-white rounded-full shadow-sm text-pink-600 mb-4 group-hover:scale-110 transition">
                 <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                 </svg>
            </div>
            <span class="font-semibold text-gray-700">Newsletter</span>
        </a>
    </div>

</div>

<?php require __DIR__ . '/layout/footer.php'; ?>

<script>
    // Prepare Data from PHP
    const userGrowthData = <?= json_encode($benevoleGrowth) ?>;
    const donationData = <?= json_encode($donationTrends) ?>;

    // Charts Configuration
    const ctx1 = document.getElementById('benevoleChart').getContext('2d');
    new Chart(ctx1, {
        type: 'line',
        data: {
            labels: userGrowthData.map(d => d.month),
            datasets: [{
                label: 'Nouveaux Bénévoles',
                data: userGrowthData.map(d => d.count),
                borderColor: '#3B82F6',
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                fill: true,
                tension: 0.4
            }]
        },
        options: { responsive: true, maintainAspectRatio: false }
    });

    const ctx2 = document.getElementById('donationChart').getContext('2d');
    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: donationData.map(d => d.month),
            datasets: [{
                label: 'Dons (€)',
                data: donationData.map(d => d.total),
                backgroundColor: '#FCD34D',
                borderRadius: 4
            }]
        },
        options: { responsive: true, maintainAspectRatio: false }
    });

    // PDF Export Function
    function exportDashboard() {
        const element = document.getElementById('dashboard-content');
        const opt = {
            margin: 1,
            filename: 'dashboard_egee_stats.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'in', format: 'letter', orientation: 'landscape' }
        };
        html2pdf().set(opt).from(element).save();
    }
</script>