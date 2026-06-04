<?php 
    include 'koneksi.php';

    // Logika pemilihan tahun
    $tahun_terpilih = date('Y');
    $query_tahun = mysqli_query($koneksi, "SELECT MAX(tahun) as tahun_max FROM apbdes_summary");
    if($row_tahun = mysqli_fetch_assoc($query_tahun)) {
        if($row_tahun['tahun_max'] != NULL) $tahun_terpilih = $row_tahun['tahun_max'];
    }
    if(isset($_GET['tahun'])) {
        $tahun_terpilih = (int)$_GET['tahun'];
    }

    // Ambil data ringkasan
    $query_summary = mysqli_query($koneksi, "SELECT * FROM apbdes_summary WHERE tahun = $tahun_terpilih");
    $summary = @mysqli_fetch_assoc($query_summary);

    // Ambil rincian belanja
    $detail = [];
    if($summary) {
        $query_detail = mysqli_query($koneksi, "SELECT * FROM apbdes_detail WHERE id_summary = " . $summary['id']);
        while($row = mysqli_fetch_assoc($query_detail)) {
            $detail[$row['bidang']][] = $row;
        }
    }
    
    $query_list_tahun = mysqli_query($koneksi, "SELECT DISTINCT tahun FROM apbdes_summary ORDER BY tahun DESC");
    $surplus_defisit = ($summary['total_pendapatan'] ?? 0) - ($summary['total_belanja'] ?? 0);
?>

<main class="space-y-10 md:space-y-16 pb-20">

    <section class="bg-utama text-white rounded-2xl shadow-lg p-6 md:p-12 mb-8" data-aos="fade-down">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6">
            <div>
                <h1 class="text-2xl md:text-4xl font-bold uppercase tracking-tight">Infografis APBDes</h1>
                <p class="text-xs md:text-lg text-blue-100 opacity-80">Transparansi Anggaran Desa Bukit Sere</p>
            </div>
            <div class="bg-white/10 p-3 rounded-xl border border-white/20">
                <form action="" method="GET">
                    <input type="hidden" name="page" value="infografis-apbd">
                    <select name="tahun" class="bg-white text-utama font-bold px-4 py-2 rounded-lg text-sm outline-none" onchange="this.form.submit()">
                        <?php while($th = mysqli_fetch_assoc($query_list_tahun)): ?>
                            <option value="<?php echo $th['tahun']; ?>" <?php if($th['tahun'] == $tahun_terpilih) echo 'selected'; ?>>TA <?php echo $th['tahun']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </form>
            </div>
        </div>
    </section>

    <?php if($summary): ?>
    
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10" data-aos="fade-up">
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm border-b-4 border-b-emerald-500">
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Total Pendapatan</p>
            <h3 class="text-xl md:text-2xl font-black text-emerald-600 tracking-tighter italic">Rp <?php echo number_format($summary['total_pendapatan']); ?></h3>
        </div>
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm border-b-4 border-b-rose-500">
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Total Belanja</p>
            <h3 class="text-xl md:text-2xl font-black text-rose-600 tracking-tighter italic">Rp <?php echo number_format($summary['total_belanja']); ?></h3>
        </div>
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm border-b-4 border-b-blue-500">
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Surplus/Defisit</p>
            <h3 class="text-xl md:text-2xl font-black text-blue-600 tracking-tighter italic">Rp <?php echo number_format(abs($surplus_defisit)); ?></h3>
        </div>
    </section>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12">
        <section class="bg-white rounded-3xl shadow-sm p-8 md:p-12 border border-gray-100" data-aos="fade-right">
            <h2 class="text-xl md:text-3xl font-black border-l-8 border-utama pl-6 mb-10 text-gelap uppercase tracking-tight">Komposisi Pendapatan</h2>
            <div class="relative h-[300px] md:h-[450px] flex items-center justify-center">
                <canvas id="chartPendapatan"></canvas>
            </div>
        </section>

        <section class="bg-white rounded-3xl shadow-sm p-8 md:p-12 border border-gray-100" data-aos="fade-left">
            <h2 class="text-xl md:text-3xl font-black border-l-8 border-utama pl-6 mb-10 text-gelap uppercase tracking-tight">Alokasi Belanja Bidang</h2>
            <div class="relative h-[300px] md:h-[450px]">
                <canvas id="chartBelanja"></canvas>
            </div>
        </section>
    </div>

    <section class="bg-white rounded-3xl shadow-sm p-8 md:p-16 border border-gray-100" data-aos="fade-up">
        <div class="text-center md:text-left mb-12">
            <h2 class="text-2xl md:text-5xl font-black border-l-8 border-utama pl-6 text-gelap uppercase tracking-tighter">Rincian Belanja Desa</h2>
            <p class="text-gray-400 font-bold mt-2 italic ml-6 md:ml-8">Detail penggunaan anggaran berdasarkan bidang kegiatan.</p>
        </div>

        <div class="space-y-4">
            <?php $i = 0; foreach($detail as $bidang => $kegiatans): $i++; ?>
            <div class="border-2 border-gray-50 rounded-2xl overflow-hidden shadow-sm group">
                <button onclick="toggleAccordion(<?php echo $i; ?>)" class="w-full flex justify-between items-center p-5 md:p-8 bg-gray-50/50 hover:bg-latar transition group-hover:bg-utama group-hover:text-white">
                    <span class="text-sm md:text-xl font-black uppercase tracking-tight"><?php echo htmlspecialchars($bidang); ?></span>
                    <i id="icon-<?php echo $i; ?>" class="bi bi-chevron-down text-xl transition-transform duration-300"></i>
                </button>
                <div id="content-<?php echo $i; ?>" class="hidden bg-white">
                    <div class="p-4 md:p-8 space-y-4">
                        <?php foreach($kegiatans as $kegiatan): ?>
                        <div class="flex flex-col md:flex-row md:items-center justify-between p-4 bg-latar/30 rounded-xl border border-gray-50 gap-2">
                            <span class="text-xs md:text-lg font-medium text-gray-700 leading-tight"><?php echo htmlspecialchars($kegiatan['kegiatan']); ?></span>
                            <span class="bg-white text-utama px-4 py-2 rounded-lg font-black text-xs md:text-base shadow-sm border border-gray-100 whitespace-nowrap">Rp <?php echo number_format($kegiatan['anggaran']); ?></span>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <script>
    // Logic Accordion Manual
    function toggleAccordion(id) {
        const content = document.getElementById('content-' + id);
        const icon = document.getElementById('icon-' + id);
        const allContents = document.querySelectorAll('[id^="content-"]');
        const allIcons = document.querySelectorAll('[id^="icon-"]');

        // Close others
        allContents.forEach((c, idx) => {
            if(idx + 1 !== id) {
                c.classList.add('hidden');
                allIcons[idx].classList.remove('rotate-180');
            }
        });

        // Toggle current
        content.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
    }

    // Chart Pendapatan (Doughnut Modern)
    new Chart(document.getElementById('chartPendapatan'), {
        type: 'doughnut',
        data: {
            labels: ['PAD', 'Transfer', 'Lain-lain'],
            datasets: [{
                data: [<?php echo $summary['pendapatan_pad'] ?? 0; ?>, <?php echo $summary['pendapatan_transfer'] ?? 0; ?>, <?php echo $summary['pendapatan_lain'] ?? 0; ?>],
                backgroundColor: ['#10b981', '#0d47a1', '#f59e0b'],
                borderWidth: 8,
                hoverOffset: 20
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom', labels: { font: { weight: 'bold', size: 14 }, padding: 20, usePointStyle: true } }
            },
            cutout: '70%'
        }
    });

    // Chart Belanja (Bar Modern)
    new Chart(document.getElementById('chartBelanja'), {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(array_keys($detail)); ?>,
            datasets: [{
                label: 'Anggaran',
                data: <?php echo json_encode(array_map(function($kegiatans) { return array_sum(array_column($kegiatans, 'anggaran')); }, $detail)); ?>,
                backgroundColor: '#0d47a1',
                borderRadius: 12
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            indexAxis: 'y',
            scales: {
                x: { grid: { display: false }, ticks: { font: { weight: 'bold' } } },
                y: { grid: { display: false }, ticks: { font: { weight: 'bold' } } }
            },
            plugins: { legend: { display: false } }
        }
    });
    </script>

    <?php else: ?>
        <div class="bg-white rounded-3xl p-20 text-center border-2 border-dashed border-gray-200" data-aos="zoom-in">
            <div class="bg-gray-50 w-24 h-24 flex items-center justify-center rounded-full mx-auto mb-6">
                <i class="bi bi-folder-x text-5xl text-gray-300"></i>
            </div>
            <h3 class="text-3xl font-black text-gray-800 uppercase tracking-tighter">Data Tidak Ditemukan</h3>
            <p class="text-gray-500 mt-2">Mohon maaf, laporan anggaran untuk tahun <?php echo $tahun_terpilih; ?> belum tersedia atau belum diinput oleh admin.</p>
            <a href="index.php?page=home" class="inline-block mt-8 bg-utama text-white px-10 py-4 rounded-xl font-bold shadow-lg hover:brightness-110">Kembali ke Beranda</a>
        </div>
    <?php endif; ?>

</main>