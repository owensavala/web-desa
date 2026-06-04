<?php 
    // Mengambil data dari tabel profil_desa
    $query = mysqli_query($koneksi, "SELECT * FROM profil_desa WHERE id = 1");
    $profil = @mysqli_fetch_assoc($query); 

    // Memecah Misi menjadi array agar bisa di-looping
    $misi_list = isset($profil['misi']) ? explode("\n", $profil['misi']) : [];
?>

<main class="space-y-6 md:space-y-10 pb-16">

    <section class="text-center py-6 md:py-12 bg-utama rounded-xl shadow-lg text-white" data-aos="fade-down">
        <h1 class="text-2xl md:text-5xl font-black uppercase tracking-tighter">Profil Desa</h1>
        <p class="text-[10px] md:text-lg font-medium text-blue-200 mt-2 uppercase tracking-[0.3em]">Mengenal Lebih Dekat Desa Bukit Sere</p>
    </section>

    <section class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 md:p-12" data-aos="fade-up">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-20">
            <div class="space-y-4">
                <h2 class="text-xl md:text-3xl font-black border-l-4 md:border-l-8 border-utama pl-4 md:pl-6 text-gelap uppercase tracking-tight">Visi</h2>
                <div class="bg-latar p-6 rounded-2xl border-l-4 border-aksen italic shadow-inner">
                    <p class="text-sm md:text-2xl text-gray-700 leading-relaxed font-medium">
                        "<?php echo htmlspecialchars($profil['visi'] ?? 'Visi belum diatur.'); ?>"
                    </p>
                </div>
            </div>

            <div class="space-y-4">
                <h2 class="text-xl md:text-3xl font-black border-l-4 md:border-l-8 border-utama pl-4 md:pl-6 text-gelap uppercase tracking-tight">Misi</h2>
                <ul class="space-y-3 md:space-y-4">
                    <?php foreach ($misi_list as $index => $item_misi) : ?>
                        <?php if (!empty(trim($item_misi))) : ?>
                            <li class="flex items-start gap-3 md:gap-4">
                                <span class="flex-shrink-0 w-6 h-6 md:w-8 md:h-8 bg-utama text-white rounded-full flex items-center justify-center text-[10px] md:text-sm font-bold shadow-md">
                                    <?php echo $index + 1; ?>
                                </span>
                                <p class="text-xs md:text-lg text-gray-600 font-medium leading-snug md:leading-relaxed">
                                    <?php echo htmlspecialchars(trim($item_misi)); ?>
                                </p>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>

    <section class="bg-white rounded-xl shadow-sm p-6 md:p-12 border border-gray-100" data-aos="fade-up">
        <h2 class="text-xl md:text-3xl font-black border-l-4 md:border-l-8 border-utama pl-4 md:pl-6 text-gelap uppercase tracking-tight mb-6">Sejarah Desa</h2>
        <div class="text-gray-600 leading-relaxed text-xs md:text-lg text-justify space-y-4">
            <?php echo nl2br(htmlspecialchars($profil['sejarah'] ?? 'Sejarah belum ditambahkan.')); ?>
        </div>
    </section>

    <section class="bg-white rounded-xl shadow-sm p-6 md:p-12 border border-gray-100" data-aos="fade-up">
        <h2 class="text-xl md:text-3xl font-black border-l-4 md:border-l-8 border-utama pl-4 md:pl-6 text-gelap uppercase mb-8">Informasi Geografis</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-start">
            <div class="md:col-span-5 space-y-6">
                <div class="bg-latar p-6 rounded-2xl border border-gray-100 shadow-inner">
                    <p class="font-black text-utama uppercase tracking-widest text-xs md:text-sm mb-4 border-b pb-2">Batas Wilayah</p>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <p class="text-[10px] md:text-xs font-bold text-gray-400 uppercase">Utara</p>
                            <p class="text-xs md:text-base font-bold text-gray-700"><?php echo htmlspecialchars($profil['batas_utara'] ?? '-'); ?></p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-[10px] md:text-xs font-bold text-gray-400 uppercase">Selatan</p>
                            <p class="text-xs md:text-base font-bold text-gray-700"><?php echo htmlspecialchars($profil['batas_selatan'] ?? '-'); ?></p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-[10px] md:text-xs font-bold text-gray-400 uppercase">Barat</p>
                            <p class="text-xs md:text-base font-bold text-gray-700"><?php echo htmlspecialchars($profil['batas_barat'] ?? '-'); ?></p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-[10px] md:text-xs font-bold text-gray-400 uppercase">Timur</p>
                            <p class="text-xs md:text-base font-bold text-gray-700"><?php echo htmlspecialchars($profil['batas_timur'] ?? '-'); ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-utama text-white p-6 rounded-2xl shadow-lg flex items-center justify-between">
                    <div>
                        <p class="text-[10px] md:text-xs font-bold uppercase text-blue-200">Luas Wilayah</p>
                        <h4 class="text-lg md:text-3xl font-black tracking-tight"><?php echo htmlspecialchars($profil['luas_desa'] ?? '0'); ?></h4>
                    </div>
                    <i class="bi bi-map-fill text-4xl md:text-6xl text-aksen opacity-30"></i>
                </div>
            </div>

            <div class="md:col-span-7 h-[300px] md:h-[450px] rounded-2xl overflow-hidden border-4 border-latar shadow-md">
                <?php 
                    $map_data = $profil['gambar_peta'] ?? '';
                    if (preg_match('/src="([^"]+)"/', $map_data, $match)) { $map_link = $match[1]; } else { $map_link = $map_data; }
                ?>
                <iframe src="<?php echo htmlspecialchars($map_link); ?>" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>

</main>