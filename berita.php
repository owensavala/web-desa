<?php 
    include 'koneksi.php';

    // --- LOGIKA PAGINATION ---
    $batas_per_halaman = 6;
    $halaman_aktif = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
    $posisi_awal = ($halaman_aktif - 1) * $batas_per_halaman;

    $query_total = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM berita");
    $total_data = mysqli_fetch_assoc($query_total)['total'];
    $total_halaman = ceil($total_data / $batas_per_halaman);

    $query_berita = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal_posting DESC LIMIT $posisi_awal, $batas_per_halaman");
?>

<main class="space-y-10 md:space-y-16 pb-20">

    <section class="bg-utama text-white rounded-2xl shadow-lg p-8 md:p-12 border border-blue-400/20 text-center" data-aos="fade-down">
        <h1 class="text-2xl md:text-5xl font-black uppercase tracking-tighter leading-none">Kabar Desa</h1>
        <div class="w-16 md:w-24 h-1 bg-aksen mx-auto mt-4 rounded-full"></div>
        <p class="text-xs md:text-lg text-blue-100 font-medium opacity-80 mt-4 uppercase tracking-widest max-w-2xl mx-auto">
            Menyajikan informasi terbaru tentang peristiwa, kegiatan pemerintah, dan artikel jurnalistik dari Desa Bukit Sere.
        </p>
    </section>

    <section class="container mx-auto px-2 md:px-0">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-10">
            <?php if(mysqli_num_rows($query_berita) > 0): ?>
                <?php while($berita = mysqli_fetch_assoc($query_berita)): ?>
                    
                    <article class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 group flex flex-col h-full" data-aos="fade-up">
                        <a href="index.php?page=detail_berita&id=<?php echo $berita['id']; ?>" class="block overflow-hidden relative">
                            <div class="aspect-video overflow-hidden">
                                <img src="images/<?php echo htmlspecialchars($berita['gambar']); ?>" 
                                     class="w-full h-full object-cover transition duration-700 group-hover:scale-110" 
                                     alt="<?php echo htmlspecialchars($berita['judul']); ?>">
                            </div>
                            <div class="absolute bottom-4 left-4 bg-utama/90 backdrop-blur-md text-white text-[10px] font-bold px-3 py-1.5 rounded-lg shadow-lg flex items-center">
                                <i class="bi bi-calendar3 mr-2 text-aksen"></i>
                                <?php echo date('d M Y', strtotime($berita['tanggal_posting'])); ?>
                            </div>
                        </a>

                        <div class="p-6 md:p-8 flex-grow flex flex-col space-y-4">
                            <h2 class="text-lg md:text-xl font-bold text-gelap group-hover:text-utama transition-colors leading-snug line-clamp-2 uppercase tracking-tight">
                                <a href="index.php?page=detail_berita&id=<?php echo $berita['id']; ?>">
                                    <?php echo htmlspecialchars($berita['judul']); ?>
                                </a>
                            </h2>
                            
                            <p class="text-gray-500 text-xs md:text-sm leading-relaxed line-clamp-3">
                                <?php echo substr(strip_tags($berita['isi']), 0, 120) . "..."; ?>
                            </p>

                            <div class="pt-6 mt-auto border-t border-gray-50 flex justify-between items-center text-[10px] md:text-xs font-bold uppercase tracking-widest text-gray-400">
                                <span class="flex items-center"><i class="bi bi-person-circle mr-2 text-utama"></i> Admin</span>
                                <span class="flex items-center"><i class="bi bi-eye-fill mr-2 text-utama"></i> Baca Selengkapnya</span>
                            </div>
                        </div>
                    </article>

                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-span-full py-20 text-center bg-white rounded-3xl border-2 border-dashed border-gray-100">
                    <i class="bi bi-newspaper text-6xl text-gray-200"></i>
                    <p class="text-gray-400 font-bold mt-4 uppercase tracking-widest text-sm">Belum ada berita yang dipublikasikan.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php if($total_halaman > 1): ?>
    <nav class="flex justify-center items-center space-x-2 mt-12" aria-label="Navigasi Halaman">
        <a href="index.php?page=berita&halaman=<?php echo max(1, $halaman_aktif - 1); ?>" 
           class="p-3 rounded-xl border border-gray-200 text-utama hover:bg-utama hover:text-white transition-all shadow-sm <?php echo ($halaman_aktif <= 1) ? 'opacity-30 pointer-events-none' : ''; ?>">
            <i class="bi bi-chevron-left font-bold"></i>
        </a>
        
        <div class="flex items-center space-x-2 bg-white px-4 py-2 rounded-2xl border border-gray-100 shadow-sm">
            <?php for($i = 1; $i <= $total_halaman; $i++): ?>
                <a href="index.php?page=berita&halaman=<?php echo $i; ?>" 
                   class="w-10 h-10 flex items-center justify-center rounded-xl font-black text-xs transition-all <?php echo ($halaman_aktif == $i) ? 'bg-utama text-white shadow-lg scale-110' : 'text-gray-400 hover:text-utama hover:bg-latar'; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>
        </div>
        
        <a href="index.php?page=berita&halaman=<?php echo min($total_halaman, $halaman_aktif + 1); ?>" 
           class="p-3 rounded-xl border border-gray-200 text-utama hover:bg-utama hover:text-white transition-all shadow-sm <?php echo ($halaman_aktif >= $total_halaman) ? 'opacity-30 pointer-events-none' : ''; ?>">
            <i class="bi bi-chevron-right font-bold"></i>
        </a>
    </nav>
    <?php endif; ?>

</main>