<?php 
    // Memanggil file koneksi database
    include 'koneksi.php';

    // Mengambil data dari tabel demografi
    $query = mysqli_query($koneksi, "SELECT * FROM demografi WHERE id = 1");
    $data = @mysqli_fetch_assoc($query); 
?>

<main class="space-y-10 md:space-y-16 pb-20">

    <section class="bg-utama text-white rounded-2xl shadow-xl p-8 md:p-16 border border-blue-400/20" data-aos="fade-down">
        <div class="flex flex-col md:flex-row items-center gap-10">
            <div class="w-full md:w-2/3 space-y-4 text-center md:text-left">
                <h1 class="text-3xl md:text-6xl font-black uppercase tracking-tighter">Demografi Penduduk</h1>
                <div class="w-24 md:w-40 h-2 bg-aksen mx-auto md:mx-0 rounded-full"></div>
                <p class="text-sm md:text-2xl text-blue-100 font-medium opacity-80 leading-relaxed">
                    Data statistik kependudukan Desa Bukit Sere yang disajikan secara transparan dan akurat.
                </p>
            </div>
            <div class="w-1/3 hidden md:block">
                <img src="images/icon-penduduk.png" alt="Demografi" class="w-full h-auto drop-shadow-2xl">
            </div>
        </div>
    </section>

    <section class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-8" data-aos="fade-up">
        <?php 
            $main_stats = [
                ['label' => 'Total Penduduk', 'val' => $data['total_penduduk'] ?? 0, 'icon' => 'people-fill', 'color' => 'text-blue-600'],
                ['label' => 'Kepala Keluarga', 'val' => $data['total_kk'] ?? 0, 'icon' => 'house-door-fill', 'color' => 'text-emerald-600'],
                ['label' => 'Laki-Laki', 'val' => $data['total_laki'] ?? 0, 'icon' => 'gender-male', 'color' => 'text-cyan-600'],
                ['label' => 'Perempuan', 'val' => $data['total_perempuan'] ?? 0, 'icon' => 'gender-female', 'color' => 'text-rose-600'],
            ];
            foreach($main_stats as $s):
        ?>
        <div class="bg-white rounded-3xl p-6 md:p-10 border border-gray-100 text-center shadow-sm hover:shadow-xl transition-all duration-500">
            <i class="bi bi-<?php echo $s['icon']; ?> text-4xl md:text-6xl <?php echo $s['color']; ?> mb-4 inline-block"></i>
            <p class="text-[10px] md:text-sm font-black text-gray-400 uppercase tracking-widest mb-1"><?php echo $s['label']; ?></p>
            <h3 class="text-2xl md:text-5xl font-black text-gelap tracking-tighter"><?php echo number_format($s['val']); ?></h3>
        </div>
        <?php endforeach; ?>
    </section>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12">
        <section class="bg-white rounded-3xl shadow-sm p-8 border border-gray-100" data-aos="fade-right">
            <h2 class="text-xl md:text-3xl font-black border-l-8 border-utama pl-6 mb-10 text-gelap uppercase tracking-tight">Kelompok Umur</h2>
            <div class="relative h-[300px] md:h-[450px]">
                <canvas id="chartUmur"></canvas>
            </div>
        </section>

        <section class="bg-white rounded-3xl shadow-sm p-8 border border-gray-100" data-aos="fade-left">
            <h2 class="text-xl md:text-3xl font-black border-l-8 border-utama pl-6 mb-10 text-gelap uppercase tracking-tight">Tingkat Pendidikan</h2>
            <div class="relative h-[300px] md:h-[450px]">
                <canvas id="chartPendidikan"></canvas>
            </div>
        </section>
    </div>

    <section class="bg-white rounded-3xl shadow-sm p-8 md:p-16 border border-gray-100" data-aos="fade-up">
        <h2 class="text-2xl md:text-4xl font-black border-l-8 border-utama pl-6 mb-12 text-gelap uppercase tracking-tighter">Status Perkawinan</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-10">
            <?php 
                $marital = [
                    ['label' => 'Belum Kawin', 'val' => $data['status_belum_kawin'] ?? 0, 'img' => 'belum-kawin.png'],
                    ['label' => 'Kawin', 'val' => $data['status_kawin'] ?? 0, 'img' => 'kawin-tercatat.png'],
                    ['label' => 'Cerai Hidup', 'val' => $data['status_cerai_hidup'] ?? 0, 'img' => 'cerai-hidup.png'],
                    ['label' => 'Cerai Mati', 'val' => $data['status_cerai_mati'] ?? 0, 'img' => 'cerai-mati.png'],
                ];
                foreach($marital as $m):
            ?>
            <div class="bg-latar/40 p-6 md:p-8 rounded-[2rem] border-2 border-white flex flex-col items-center text-center shadow-sm hover:shadow-lg transition-all group">
                <div class="bg-white p-4 rounded-full shadow-md mb-6 transition group-hover:scale-110">
                    <img src="images/<?php echo $m['img']; ?>" class="w-24 h-24 md:w-40 md:h-40 object-contain mx-auto">
                </div>
                <h4 class="text-3xl md:text-6xl font-black text-gelap tracking-tighter leading-none"><?php echo number_format($m['val']); ?></h4>
                <p class="text-xs md:text-lg font-bold uppercase text-gray-500 tracking-widest mt-2"><?php echo $m['label']; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="bg-white rounded-3xl shadow-sm p-8 md:p-16 border border-gray-100" data-aos="fade-up">
        <h2 class="text-2xl md:text-4xl font-black border-l-8 border-utama pl-6 mb-12 text-gelap uppercase tracking-tighter">Penganut Agama</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
            <?php 
                $religions = [
                    ['label' => 'Islam', 'val' => $data['agama_islam'] ?? 0, 'img' => 'islam.png'],
                    ['label' => 'Kristen', 'val' => $data['agama_kristen'] ?? 0, 'img' => 'kristen.png'],
                    ['label' => 'Katolik', 'val' => $data['agama_katolik'] ?? 0, 'img' => 'katolik.png'],
                    ['label' => 'Hindu', 'val' => $data['agama_hindu'] ?? 0, 'img' => 'hindu.png'],
                    ['label' => 'Buddha', 'val' => $data['agama_buddha'] ?? 0, 'img' => 'buddha.png'],
                    ['label' => 'Konghucu', 'val' => $data['agama_konghucu'] ?? 0, 'img' => 'konghucu.png'],
                ];
                foreach($religions as $r):
            ?>
            <div class="flex flex-col items-center group">
                <div class="bg-white p-4 md:p-6 rounded-full shadow-sm group-hover:shadow-2xl border-4 border-latar group-hover:border-utama transition-all mb-4">
                    <img src="images/<?php echo $r['img']; ?>" class="w-16 h-16 md:w-24 md:h-24 object-contain">
                </div>
                <p class="text-2xl md:text-4xl font-black text-gelap leading-none group-hover:text-utama transition-colors"><?php echo number_format($r['val']); ?></p>
                <p class="text-[10px] md:text-xs font-black text-gray-400 uppercase mt-2 tracking-widest"><?php echo $r['label']; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

</main>

<script>
// Logika Chart
const ctxUmur = document.getElementById('chartUmur');
new Chart(ctxUmur, {
    type: 'bar',
    data: {
        labels: ['Lansia (60+)', 'Dewasa (19-59)', 'Remaja (13-18)', 'Anak-anak (0-12)'],
        datasets: [
            { label: 'Laki-laki', data: [-<?php echo $data['umur_lansia_laki'] ?? 0; ?>, -<?php echo $data['umur_dewasa_laki'] ?? 0; ?>, -<?php echo $data['umur_remaja_laki'] ?? 0; ?>, -<?php echo $data['umur_anak_laki'] ?? 0; ?>], backgroundColor: '#0d47a1', borderRadius: 8 },
            { label: 'Perempuan', data: [<?php echo $data['umur_lansia_perempuan'] ?? 0; ?>, <?php echo $data['umur_dewasa_perempuan'] ?? 0; ?>, <?php echo $data['umur_remaja_perempuan'] ?? 0; ?>, <?php echo $data['umur_anak_perempuan'] ?? 0; ?>], backgroundColor: '#ffc107', borderRadius: 8 }
        ]
    },
    options: {
        responsive: true, maintainAspectRatio: false, indexAxis: 'y',
        scales: {
            x: { stacked: true, grid: { display: false }, ticks: { callback: v => Math.abs(v), font: { weight: 'bold' } } },
            y: { stacked: true, grid: { display: false }, ticks: { font: { weight: 'bold' } } }
        },
        plugins: { legend: { position: 'bottom', labels: { font: { weight: 'bold' } } } }
    }
});

const ctxPendidikan = document.getElementById('chartPendidikan');
new Chart(ctxPendidikan, {
    type: 'bar',
    data: {
        labels: ['SD', 'SMP', 'SMA/SMK', 'Sarjana'],
        datasets: [{
            data: [<?php echo $data['pendidikan_sd'] ?? 0; ?>, <?php echo $data['pendidikan_smp'] ?? 0; ?>, <?php echo $data['pendidikan_sma'] ?? 0; ?>, <?php echo $data['pendidikan_pt'] ?? 0; ?>],
            backgroundColor: '#0d47a1', borderRadius: 10
        }]
    },
    options: {
        responsive: true, maintainAspectRatio: false,
        scales: {
            x: { grid: { display: false }, ticks: { font: { weight: 'bold' } } },
            y: { beginAtZero: true, grid: { borderDash: [5, 5] } }
        },
        plugins: { legend: { display: false } }
    }
});
</script>