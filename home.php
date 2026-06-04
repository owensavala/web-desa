<?php 
    $profil_q = mysqli_query($koneksi, "SELECT * FROM profil_desa LIMIT 1");
    $profil = mysqli_fetch_assoc($profil_q) ?: [];
    $demo_q = mysqli_query($koneksi, "SELECT * FROM demografi LIMIT 1");
    $demo = mysqli_fetch_assoc($demo_q) ?: [];
    $apbd_q = mysqli_query($koneksi, "SELECT * FROM apbdes_summary ORDER BY tahun DESC LIMIT 1");
    $apbd = mysqli_fetch_assoc($apbd_q) ?: [];
    $query_sotk   = mysqli_query($koneksi, "SELECT * FROM sotk ORDER BY urutan ASC LIMIT 4");
    $query_berita = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal_posting DESC LIMIT 4");
    $res_g = mysqli_query($koneksi, "SELECT * FROM galeri_foto ORDER BY id DESC LIMIT 6");
    $galeri_list = ($res_g) ? mysqli_fetch_all($res_g, MYSQLI_ASSOC) : [];
?>

<div class="space-y-12 md:space-y-28 pb-10 overflow-hidden bg-slate-50/50">

    <section class="py-10 md:py-24 bg-white relative">
        <div class="container mx-auto px-4 md:px-12 max-w-7xl">
            <div class="flex flex-col md:flex-row items-center gap-8 md:gap-20">
                <div class="w-full md:w-5/12" data-aos="fade-up">
                    <div class="relative z-10 border-[8px] md:border-[12px] border-white shadow-2xl rounded-[2rem] md:rounded-[2.5rem] overflow-hidden">
                        <img src="images/<?php echo $profil['sambutan_foto'] ?? 'default.jpg'; ?>" class="w-full aspect-[4/5] object-cover">
                    </div>
                </div>
                <div class="w-full md:w-7/12 space-y-4 md:space-y-6 text-center md:text-left" data-aos="fade-up">
                    <span class="inline-block px-4 py-1 bg-utama/10 text-utama text-[10px] font-black uppercase tracking-widest rounded-full">Sambutan</span>
                    <h2 class="text-3xl md:text-6xl font-black text-gelap leading-tight tracking-tighter">Membangun Desa <br class="hidden md:block"> <span class="text-utama italic">Lebih Mandiri.</span></h2>
                    <p class="text-gray-500 text-sm md:text-lg italic leading-relaxed text-justify md:text-left">
                        "<?php echo nl2br($profil['sambutan_isi'] ?? 'Selamat Datang.'); ?>"
                    </p>
                    <div class="pt-6 border-t border-gray-100 flex flex-col md:flex-row items-center gap-4">
                        <h4 class="text-lg font-black text-gelap uppercase"><?php echo $profil['sambutan_nama_pejabat'] ?? 'Kades'; ?></h4>
                        <span class="hidden md:block w-12 h-1 bg-aksen rounded-full"></span>
                        <p class="text-xs font-bold text-utama/60 uppercase tracking-widest">Kepala Desa Bukit Sere</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container mx-auto px-4 md:px-12" data-aos="zoom-in">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-8">
            <?php 
                $stats = [
                    ['val' => (int)($demo['total_penduduk'] ?? 0), 'label' => 'Total Warga', 'icon' => 'people'],
                    ['val' => (int)($demo['total_kk'] ?? 0), 'label' => 'Kepala Keluarga', 'icon' => 'house'],
                    ['val' => (int)($demo['total_laki'] ?? 0), 'label' => 'Laki-Laki', 'icon' => 'gender-male'],
                    ['val' => (int)($demo['total_perempuan'] ?? 0), 'label' => 'Perempuan', 'icon' => 'gender-female']
                ];
                foreach($stats as $s):
            ?>
            <div class="bg-utama p-6 md:p-8 rounded-[1.5rem] md:rounded-[2.5rem] text-white shadow-xl relative overflow-hidden group">
                <i class="bi bi-<?php echo $s['icon']; ?> absolute -right-2 -bottom-2 text-6xl md:text-8xl opacity-10 group-hover:scale-110 transition"></i>
                <h3 class="text-2xl md:text-5xl font-black mb-1"><?php echo number_format($s['val']); ?></h3>
                <p class="text-[9px] font-bold uppercase tracking-widest text-blue-200"><?php echo $s['label']; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="container mx-auto px-4 md:px-12" data-aos="fade-up">
        <div class="bg-gelap rounded-[2rem] md:rounded-[3rem] p-6 md:p-16 text-white shadow-2xl">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 md:mb-12 gap-4 text-center md:text-left">
                <div>
                    <h2 class="text-2xl md:text-5xl font-black italic uppercase">Transparansi Dana</h2>
                    <p class="text-blue-300 font-bold text-[10px] mt-1 uppercase tracking-widest">Tahun Anggaran <?php echo date('Y'); ?></p>
                </div>
                <a href="index.php?page=infografis-apbd" class="w-full md:w-auto px-8 py-3 bg-white/10 text-white rounded-full font-black text-[10px] uppercase tracking-widest border border-white/20">Laporan Lengkap</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8">
                <div class="bg-white/5 border border-white/10 p-6 md:p-8 rounded-[1.5rem] md:rounded-[2rem]">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-[10px] font-black text-emerald-400 uppercase tracking-widest">Pendapatan</span>
                        <i class="bi bi-wallet2 text-emerald-400"></i>
                    </div>
                    <h4 class="text-xl md:text-4xl font-black">Rp <?php echo number_format((float)($apbd['total_pendapatan'] ?? 0)); ?></h4>
                </div>
                <div class="bg-white/5 border border-white/10 p-6 md:p-8 rounded-[1.5rem] md:rounded-[2rem]">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-[10px] font-black text-rose-400 uppercase tracking-widest">Belanja</span>
                        <i class="bi bi-cart-check text-rose-400"></i>
                    </div>
                    <h4 class="text-xl md:text-4xl font-black">Rp <?php echo number_format((float)($apbd['total_belanja'] ?? 0)); ?></h4>
                </div>
            </div>
        </div>
    </section>

    <section class="container mx-auto px-4 md:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <div class="lg:col-span-8 space-y-10" data-aos="fade-up">
                <div class="flex items-center justify-between border-b-4 border-aksen pb-4">
                    <h2 class="text-3xl md:text-4xl font-black text-gelap italic uppercase tracking-tighter">Kabar Desa</h2>
                    <a href="index.php?page=berita" class="text-utama font-black text-xs uppercase tracking-widest hover:text-aksen transition">Lihat Semua Berita <i class="bi bi-arrow-right ml-2"></i></a>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <?php if($query_berita): while($b = mysqli_fetch_assoc($query_berita)): ?>
                    <a href="index.php?page=detail_berita&id=<?php echo $b['id']; ?>" class="group bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 border border-gray-100 flex flex-col h-full">
                        <div class="aspect-video overflow-hidden relative">
                            <div class="absolute top-4 left-4 z-20 bg-utama text-white text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-widest">Update</div>
                            <img src="images/<?php echo $b['gambar']; ?>" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                        </div>
                        <div class="p-8 flex-grow">
                            <div class="flex items-center gap-2 text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3">
                                <i class="bi bi-calendar3"></i>
                                <span><?php echo date('d F Y'); ?></span>
                            </div>
                            <h5 class="text-lg font-black text-gelap leading-tight line-clamp-2 uppercase italic group-hover:text-utama transition"><?php echo $b['judul']; ?></h5>
                        </div>
                    </a>
                    <?php endwhile; endif; ?>
                </div>
            </div>

            <div class="lg:col-span-4 space-y-8" data-aos="fade-left">
                <div>
                    <h2 class="text-3xl md:text-4xl font-black text-gelap italic uppercase tracking-tighter border-b-4 border-utama pb-4 mb-8">Lokasi Kami</h2>
                    <div class="rounded-[2.5rem] overflow-hidden shadow-2xl h-[400px] border-[8px] border-white relative group">
                        <?php 
                            $map_data = $profil['gambar_peta'] ?? '';
                            if (preg_match('/src="([^"]+)"/', $map_data, $match)) { $map_link = $match[1]; } else { $map_link = $map_data; }
                        ?>
                        <iframe src="<?php echo htmlspecialchars($map_link); ?>" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>

                <div class="bg-utama rounded-[2.5rem] p-8 text-white shadow-xl relative overflow-hidden">
                    <div class="relative z-10 space-y-6">
                        <h4 class="text-xl font-black uppercase italic leading-none">Pusat Bantuan</h4>
                        <p class="text-blue-200 text-xs leading-relaxed">Silakan kunjungi kantor desa atau hubungi layanan mandiri untuk keperluan administrasi.</p>
                        <div class="space-y-4">
                            <div class="flex items-center gap-4 bg-white/10 p-4 rounded-2xl border border-white/10">
                                <i class="bi bi-geo-alt-fill text-aksen text-2xl"></i>
                                <div>
                                    <p class="text-[8px] font-black uppercase text-blue-300">Alamat</p>
                                    <p class="text-[10px] font-bold leading-tight">Bukit Sere, Bacan Selatan, Halmahera Selatan</p>
                                </div>
                            </div>
                            <a href="index.php?page=layanan_mandiri" class="block w-full text-center bg-aksen text-utama py-4 rounded-2xl font-black text-xs uppercase tracking-[0.2em] hover:brightness-110 transition">Layanan Digital</a>
                        </div>
                    </div>
                    <i class="bi bi-info-circle absolute -bottom-6 -right-6 text-9xl opacity-10"></i>
                </div>
            </div>
        </div>
    </section>

    <section class="container mx-auto px-4 md:px-12 pb-10" data-aos="zoom-in">
        <div class="text-center mb-8">
            <h2 class="text-2xl md:text-4xl font-black text-gelap uppercase italic">Dokumentasi</h2>
            <div class="w-16 h-1 bg-aksen mx-auto mt-2 rounded-full"></div>
        </div>
        <div class="grid grid-cols-3 lg:grid-cols-6 gap-2 md:gap-4">
            <?php foreach ($galeri_list as $g): ?>
            <div class="aspect-square rounded-xl md:rounded-2xl overflow-hidden shadow-lg border-2 md:border-4 border-white">
                <img src="images/<?php echo $g['nama_file'] ?? 'default.jpg'; ?>" class="w-full h-full object-cover">
            </div>
            <?php endforeach; ?>
        </div>
    </section>

</div>