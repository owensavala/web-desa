<?php 
    include 'koneksi.php';

    // --- LOGIKA PAGINATION ---
    $batas_per_halaman = 6; 
    $halaman_aktif = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
    $posisi_awal = ($halaman_aktif - 1) * $batas_per_halaman;

    // Query total video
    $query_total = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM galeri_video");
    $total_data = mysqli_fetch_assoc($query_total)['total'];
    $total_halaman = ceil($total_data / $batas_per_halaman);

    // Query ambil video
    $query_video = mysqli_query($koneksi, "SELECT * FROM galeri_video ORDER BY tanggal_upload DESC LIMIT $posisi_awal, $batas_per_halaman");

    // Fungsi ambil ID YouTube dari link
    function getYoutubeId($url) {
        preg_match('/(youtu\.be\/|v=)([a-zA-Z0-9_-]+)/', $url, $matches);
        return $matches[2] ?? null;
    }
?>

<main class="space-y-10 md:space-y-16 pb-20">

    <section class="bg-utama text-white rounded-2xl shadow-lg p-8 md:p-12 border border-blue-400/20 text-center" data-aos="fade-down">
        <h1 class="text-2xl md:text-5xl font-black uppercase tracking-tighter leading-none">Dokumentasi Video</h1>
        <div class="w-16 md:w-24 h-1 bg-aksen mx-auto mt-4 rounded-full"></div>
        <p class="text-xs md:text-lg text-blue-100 font-medium opacity-80 mt-4 uppercase tracking-widest max-w-2xl mx-auto">
            Kumpulan rekaman kegiatan, liputan peristiwa, dan profil visual Desa Bukit Sere.
        </p>
    </section>

    <section class="container mx-auto px-2 md:px-0">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">
            <?php if(mysqli_num_rows($query_video) > 0): ?>
                <?php while($video = mysqli_fetch_assoc($query_video)): ?>
                    <?php $youtubeId = getYoutubeId($video['link_video']); ?>
                    
                    <div class="bg-white rounded-3xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-2xl transition-all duration-500 group flex flex-col h-full" data-aos="zoom-in">
                        
                        <div class="aspect-video bg-black relative overflow-hidden">
                            <?php if($youtubeId): ?>
                                <iframe class="w-full h-full" 
                                        src="https://www.youtube.com/embed/<?php echo $youtubeId; ?>?rel=0" 
                                        title="<?php echo htmlspecialchars($video['judul']); ?>" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen>
                                </iframe>
                            <?php else: ?>
                                <div class="w-full h-full flex flex-col items-center justify-center text-rose-500 p-6 text-center bg-rose-50">
                                    <i class="bi bi-exclamation-triangle-fill text-4xl mb-2"></i>
                                    <p class="font-bold text-xs uppercase tracking-widest">Tautan Video Tidak Valid</p>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="p-6 md:p-8 flex-grow flex flex-col justify-center">
                            <div class="flex items-center space-x-3 mb-3">
                                <div class="h-1 w-10 bg-aksen rounded-full"></div>
                                <span class="text-[10px] font-black text-utama uppercase tracking-widest">Kabar Desa TV</span>
                            </div>
                            <h2 class="text-lg md:text-2xl font-bold text-gelap leading-tight group-hover:text-utama transition-colors line-clamp-2">
                                <?php echo htmlspecialchars($video['judul']); ?>
                            </h2>
                            <div class="mt-4 pt-4 border-t border-gray-50 flex items-center text-gray-400 text-[10px] md:text-xs font-bold uppercase tracking-widest">
                                <i class="bi bi-clock-history mr-2 text-aksen"></i>
                                Diposting pada: <?php echo date('d M Y', strtotime($video['tanggal_upload'])); ?>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-span-full py-20 text-center bg-white rounded-3xl border-2 border-dashed border-gray-100">
                    <i class="bi bi-camera-video text-6xl text-gray-200"></i>
                    <p class="text-gray-400 font-bold mt-4 uppercase tracking-widest">Belum ada koleksi video.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php if($total_halaman > 1): ?>
    <nav class="flex justify-center items-center space-x-2 mt-12" aria-label="Navigasi Halaman">
        <a href="index.php?page=galeri-video&halaman=<?php echo max(1, $halaman_aktif - 1); ?>" 
           class="p-3 rounded-xl border border-gray-200 text-utama hover:bg-utama hover:text-white transition-all shadow-sm <?php echo ($halaman_aktif <= 1) ? 'opacity-30 pointer-events-none' : ''; ?>">
            <i class="bi bi-chevron-left font-bold"></i>
        </a>
        
        <div class="flex items-center space-x-2 bg-white px-4 py-2 rounded-2xl border border-gray-100 shadow-sm">
            <?php for($i = 1; $i <= $total_halaman; $i++): ?>
                <a href="index.php?page=galeri-video&halaman=<?php echo $i; ?>" 
                   class="w-10 h-10 flex items-center justify-center rounded-xl font-black text-xs transition-all <?php echo ($halaman_aktif == $i) ? 'bg-utama text-white shadow-lg scale-110' : 'text-gray-400 hover:text-utama hover:bg-latar'; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>
        </div>
        
        <a href="index.php?page=galeri-video&halaman=<?php echo min($total_halaman, $halaman_aktif + 1); ?>" 
           class="p-3 rounded-xl border border-gray-200 text-utama hover:bg-utama hover:text-white transition-all shadow-sm <?php echo ($halaman_aktif >= $total_halaman) ? 'opacity-30 pointer-events-none' : ''; ?>">
            <i class="bi bi-chevron-right font-bold"></i>
        </a>
    </nav>
    <?php endif; ?>

</main>