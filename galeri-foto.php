<?php 
    include 'koneksi.php';

    // --- LOGIKA PAGINATION ---
    $batas_per_halaman = 9;
    $halaman_aktif = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
    $posisi_awal = ($halaman_aktif - 1) * $batas_per_halaman;

    $query_total = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM galeri_foto");
    $total_data = mysqli_fetch_assoc($query_total)['total'];
    $total_halaman = ceil($total_data / $batas_per_halaman);

    $query_foto = mysqli_query($koneksi, "SELECT * FROM galeri_foto ORDER BY tanggal_upload DESC LIMIT $posisi_awal, $batas_per_halaman");
?>

<main class="space-y-10 md:space-y-16 pb-20">

    <section class="bg-utama text-white rounded-2xl shadow-lg p-8 md:p-12 border border-blue-400/20 text-center" data-aos="fade-down">
        <h1 class="text-2xl md:text-5xl font-black uppercase tracking-tighter leading-none">Galeri Foto</h1>
        <div class="w-16 md:w-24 h-1 bg-aksen mx-auto mt-4 rounded-full"></div>
        <p class="text-xs md:text-lg text-blue-100 font-medium opacity-80 mt-4 uppercase tracking-widest">
            Dokumentasi Visual Kegiatan dan Potret Kehidupan Desa Bukit Sere
        </p>
    </section>

    <section class="container mx-auto px-2 md:px-0">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            <?php if(mysqli_num_rows($query_foto) > 0): ?>
                <?php while($foto = mysqli_fetch_assoc($query_foto)): ?>
                    
                    <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 group" data-aos="zoom-in">
                        <a href="images/<?php echo htmlspecialchars($foto['nama_file']); ?>" 
                           data-fancybox="gallery" 
                           data-caption="<?php echo htmlspecialchars($foto['keterangan']); ?>"
                           class="block relative aspect-video overflow-hidden bg-gray-200">
                            
                            <img src="images/<?php echo htmlspecialchars($foto['nama_file']); ?>" 
                                 class="w-full h-full object-cover transition duration-700 group-hover:scale-110" 
                                 alt="<?php echo htmlspecialchars($foto['keterangan']); ?>">
                            
                            <div class="absolute inset-0 bg-utama/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <i class="bi bi-zoom-in text-white text-4xl"></i>
                            </div>
                        </a>

                        <div class="p-5 text-center">
                            <p class="text-xs md:text-sm font-bold text-gray-700 leading-relaxed italic">
                                "<?php echo htmlspecialchars($foto['keterangan']); ?>"
                            </p>
                            <div class="mt-3 pt-3 border-t border-gray-50 text-[10px] text-gray-400 uppercase font-black tracking-widest">
                                <i class="bi bi-calendar-event mr-1"></i> Dokumentasi Desa
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-span-full py-20 text-center bg-white rounded-3xl border-2 border-dashed border-gray-100">
                    <i class="bi bi-images text-6xl text-gray-200"></i>
                    <p class="text-gray-400 font-bold mt-4 uppercase tracking-widest">Belum ada koleksi foto.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php if($total_halaman > 1): ?>
    <nav class="flex justify-center items-center space-x-2 mt-12">
        <a href="index.php?page=galeri-foto&halaman=<?php echo max(1, $halaman_aktif - 1); ?>" 
           class="p-3 rounded-xl border border-gray-200 text-utama hover:bg-utama hover:text-white transition-all <?php echo ($halaman_aktif <= 1) ? 'opacity-30 pointer-events-none' : ''; ?>">
            <i class="bi bi-chevron-left font-bold"></i>
        </a>
        
        <div class="flex items-center space-x-2 bg-white px-4 py-2 rounded-2xl border border-gray-100 shadow-sm">
            <?php for($i = 1; $i <= $total_halaman; $i++): ?>
                <a href="index.php?page=galeri-foto&halaman=<?php echo $i; ?>" 
                   class="w-10 h-10 flex items-center justify-center rounded-xl font-black text-xs transition-all <?php echo ($halaman_aktif == $i) ? 'bg-utama text-white shadow-lg scale-110' : 'text-gray-400 hover:text-utama'; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>
        </div>
        
        <a href="index.php?page=galeri-foto&halaman=<?php echo min($total_halaman, $halaman_aktif + 1); ?>" 
           class="p-3 rounded-xl border border-gray-200 text-utama hover:bg-utama hover:text-white transition-all <?php echo ($halaman_aktif >= $total_halaman) ? 'opacity-30 pointer-events-none' : ''; ?>">
            <i class="bi bi-chevron-right font-bold"></i>
        </a>
    </nav>
    <?php endif; ?>

</main>