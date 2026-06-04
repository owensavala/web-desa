<?php 
    include 'koneksi.php';
    // Ambil semua data sotk dari database berdasarkan urutan
    $query_sotk = mysqli_query($koneksi, "SELECT * FROM sotk ORDER BY urutan ASC");
?>

<main class="space-y-10 md:space-y-16 pb-20">

    <section class="bg-utama text-white rounded-2xl shadow-lg p-8 md:p-12 border border-blue-400/20 text-center" data-aos="fade-down">
        <h1 class="text-2xl md:text-5xl font-black uppercase tracking-tighter leading-none">Struktur Organisasi</h1>
        <div class="w-16 md:w-24 h-1 bg-aksen mx-auto mt-4 rounded-full"></div>
        <p class="text-xs md:text-lg text-blue-100 font-medium opacity-80 mt-4 uppercase tracking-widest">
            Aparat Pemerintah Desa Bukit Sere yang Siap Melayani Anda
        </p>
    </section>

    <section class="container mx-auto px-2 md:px-0">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
            <?php if(mysqli_num_rows($query_sotk) > 0): ?>
                <?php while($pejabat = mysqli_fetch_assoc($query_sotk)): ?>
                    
                    <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 group flex flex-col h-full" data-aos="fade-up">
                        
                        <div class="relative aspect-[3/4] overflow-hidden bg-gray-200">
                            <?php if(!empty($pejabat['foto'])): ?>
                                <img src="images/<?php echo htmlspecialchars($pejabat['foto']); ?>" 
                                     alt="<?php echo htmlspecialchars($pejabat['nama']); ?>" 
                                     class="w-full h-full object-cover object-top transition duration-700 group-hover:scale-110">
                            <?php else: ?>
                                <div class="w-full h-full flex flex-col items-center justify-center text-gray-400">
                                    <i class="bi bi-person-bounding-box text-5xl md:text-7xl"></i>
                                    <span class="text-[10px] uppercase font-bold mt-2">Foto Belum Tersedia</span>
                                </div>
                            <?php endif; ?>

                            <div class="absolute inset-0 bg-utama/60 backdrop-blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center p-4 hidden md:flex text-center">
                                <p class="text-white font-bold text-sm leading-tight italic">"Melayani Masyarakat Desa Bukit Sere dengan Integritas"</p>
                            </div>
                        </div>

                        <div class="flex-grow flex flex-col">
                            <div class="bg-utama text-white py-2 md:py-3 px-2 text-center">
                                <h4 class="text-[9px] md:text-xs font-black uppercase tracking-tighter md:tracking-widest leading-none">
                                    <?php echo htmlspecialchars($pejabat['jabatan']); ?>
                                </h4>
                            </div>
                            <div class="p-3 md:p-5 text-center bg-white border-t border-gray-50">
                                <p class="font-bold text-gray-800 text-[11px] md:text-base leading-tight">
                                    <?php echo htmlspecialchars($pejabat['nama']); ?>
                                </p>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
            <?php else: ?>
                <div class="col-span-full py-20 text-center bg-white rounded-3xl border-2 border-dashed border-gray-100">
                    <i class="bi bi-people text-6xl text-gray-200"></i>
                    <p class="text-gray-400 font-bold mt-4 uppercase tracking-widest">Data Aparat Belum Tersedia</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

</main>