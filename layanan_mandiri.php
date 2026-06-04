<?php 
    include 'koneksi.php';
    // Ambil data dan urutkan berdasarkan kategori, lalu nama dokumen
    $query = mysqli_query($koneksi, "SELECT * FROM dokumen_layanan ORDER BY kategori ASC, nama_dokumen ASC");
    
    // Kelompokkan hasil ke dalam array
    $dokumen_per_kategori = [];
    while($row = mysqli_fetch_assoc($query)) {
        $dokumen_per_kategori[$row['kategori']][] = $row;
    }
?>

<main class="space-y-10 md:space-y-16 pb-20">

    <section class="bg-utama text-white rounded-2xl shadow-lg p-8 md:p-12 border border-blue-400/20 text-center" data-aos="fade-down">
        <h1 class="text-2xl md:text-5xl font-black uppercase tracking-tighter leading-none">Layanan Mandiri</h1>
        <div class="w-16 md:w-24 h-1 bg-aksen mx-auto mt-4 rounded-full"></div>
        <p class="text-xs md:text-lg text-blue-100 font-medium opacity-80 mt-4 uppercase tracking-widest max-w-2xl mx-auto leading-relaxed">
            Pusat unduhan formulir administrasi. Isi berkas dari rumah untuk mempercepat proses layanan di Kantor Desa.
        </p>
    </section>

    <section class="container mx-auto px-2 md:px-0" data-aos="fade-up">
        <div class="space-y-4">
            <?php if(!empty($dokumen_per_kategori)): $i = 0; ?>
                <?php foreach($dokumen_per_kategori as $kategori => $dokumen_list): $i++; ?>
                    
                    <div class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm transition-all duration-300">
                        <button onclick="toggleLayanan(<?php echo $i; ?>)" 
                                class="w-full flex justify-between items-center p-5 md:p-7 bg-gray-50/50 hover:bg-latar transition group">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 md:w-12 md:h-12 bg-utama text-white rounded-xl flex items-center justify-center shadow-md">
                                    <i class="bi bi-folder-fill text-xl md:text-2xl text-aksen"></i>
                                </div>
                                <h3 class="text-sm md:text-xl font-black text-gelap uppercase tracking-tight"><?php echo htmlspecialchars($kategori); ?></h3>
                            </div>
                            <i id="icon-layanan-<?php echo $i; ?>" class="bi bi-chevron-down text-xl text-gray-400 transition-transform duration-300"></i>
                        </button>

                        <div id="content-layanan-<?php echo $i; ?>" class="hidden">
                            <div class="p-4 md:p-8 space-y-4 bg-white border-t border-gray-50">
                                <?php foreach($dokumen_list as $doc): ?>
                                    <div class="group p-4 md:p-6 rounded-2xl border border-gray-50 bg-latar/30 hover:bg-white hover:shadow-md transition-all flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                        <div class="space-y-1">
                                            <h5 class="text-sm md:text-lg font-bold text-gelap uppercase"><?php echo htmlspecialchars($doc['nama_dokumen']); ?></h5>
                                            <p class="text-[10px] md:text-sm text-gray-500 font-medium leading-relaxed italic">
                                                <i class="bi bi-info-circle mr-1"></i> <?php echo htmlspecialchars($doc['keterangan']); ?>
                                            </p>
                                        </div>
                                        <a href="dokumen/<?php echo htmlspecialchars($doc['nama_file']); ?>" 
                                           class="w-full md:w-auto flex items-center justify-center bg-utama text-white px-6 py-3 rounded-xl font-black text-[10px] md:text-xs tracking-widest hover:brightness-110 shadow-lg transition active:scale-95 uppercase" 
                                           download>
                                            <i class="bi bi-cloud-arrow-down-fill mr-2 text-aksen text-base"></i> Unduh Berkas
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            <?php else: ?>
                <div class="py-20 text-center bg-white rounded-3xl border-2 border-dashed border-gray-100">
                    <i class="bi bi-file-earmark-x text-6xl text-gray-200"></i>
                    <p class="text-gray-400 font-bold mt-4 uppercase tracking-widest text-sm">Belum ada dokumen yang tersedia.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

</main>

<script>
    function toggleLayanan(id) {
        const content = document.getElementById('content-layanan-' + id);
        const icon = document.getElementById('icon-layanan-' + id);
        
        // Animasi rotasi ikon
        icon.classList.toggle('rotate-180');
        
        // Slide Toggle sederhana
        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
        } else {
            content.classList.add('hidden');
        }
    }
</script>