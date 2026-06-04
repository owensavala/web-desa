<?php
include 'koneksi.php';

// Ambil ID dari URL
$id = isset($_GET['id']) ? mysqli_real_escape_string($koneksi, $_GET['id']) : 0;

// Query ambil data berita utama
$query = mysqli_query($koneksi, "SELECT * FROM berita WHERE id = '$id'");
$berita = mysqli_fetch_assoc($query);

// Jika berita tidak ditemukan (Empty State)
if (!$berita) {
    echo "
    <main class='container mx-auto px-4 py-20 text-center'>
        <div class='bg-white p-12 rounded-3xl shadow-sm border border-gray-100 inline-block'>
            <i class='bi bi-search text-6xl text-gray-200 mb-4 block'></i>
            <h3 class='text-2xl font-black text-gelap uppercase tracking-tighter'>Berita Tidak Ditemukan</h3>
            <p class='text-gray-400 mt-2 mb-8'>Maaf, artikel yang Anda cari telah dihapus atau dipindahkan.</p>
            <a href='index.php?page=berita' class='bg-utama text-white px-8 py-3 rounded-xl font-bold shadow-lg hover:brightness-110 transition'>Kembali ke Berita</a>
        </div>
    </main>";
    exit;
}
?>

<main class="space-y-8 md:space-y-12 pb-20">

    <nav class="container mx-auto px-4 md:px-10" data-aos="fade-right">
        <ol class="flex items-center space-x-2 text-[10px] md:text-xs font-bold uppercase tracking-widest text-gray-400">
            <li><a href="index.php?page=home" class="hover:text-utama transition">Beranda</a></li>
            <li><i class="bi bi-chevron-right text-[8px]"></i></li>
            <li><a href="index.php?page=berita" class="hover:text-utama transition">Berita</a></li>
            <li><i class="bi bi-chevron-right text-[8px]"></i></li>
            <li class="text-utama truncate max-w-[150px] md:max-w-xs"><?php echo htmlspecialchars($berita['judul']); ?></li>
        </ol>
    </nav>

    <section class="container mx-auto px-4 md:px-0" data-aos="fade-up">
        <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            
            <div class="relative aspect-video md:h-[500px] overflow-hidden">
                <img src="images/<?php echo htmlspecialchars($berita['gambar']); ?>" 
                     class="w-full h-full object-cover" 
                     alt="Gambar Berita">
                <div class="absolute inset-0 bg-gradient-to-t from-gelap/60 to-transparent"></div>
            </div>

            <div class="p-6 md:p-16">
                <h1 class="text-2xl md:text-5xl font-black text-gelap leading-tight uppercase tracking-tighter mb-6">
                    <?php echo htmlspecialchars($berita['judul']); ?>
                </h1>

                <div class="flex flex-wrap items-center gap-4 md:gap-8 pb-8 mb-8 border-b border-gray-100 text-[10px] md:text-xs font-black uppercase tracking-[0.2em] text-gray-400">
                    <span class="flex items-center"><i class="bi bi-calendar3 mr-2 text-utama text-base"></i> <?php echo date('d F Y', strtotime($berita['tanggal_posting'])); ?></span>
                    <span class="flex items-center"><i class="bi bi-person-fill mr-2 text-utama text-base"></i> Admin Desa</span>
                    <span class="flex items-center bg-latar text-utama px-3 py-1 rounded-full"><i class="bi bi-tag-fill mr-2"></i> Warta Desa</span>
                </div>

                <div class="prose prose-blue max-w-none text-gray-600 leading-[1.8] md:leading-[2.2] text-sm md:text-xl text-justify font-medium space-y-6">
                    <?php echo nl2br(htmlspecialchars($berita['isi'])); ?>
                </div>

                <div class="mt-12 pt-8 border-t border-gray-50">
                    <a href="index.php?page=berita" class="inline-flex items-center bg-latar text-utama px-8 py-3 rounded-full font-bold text-xs md:text-sm hover:bg-utama hover:text-white transition-all shadow-sm">
                        <i class="bi bi-arrow-left-circle-fill mr-3 text-lg"></i> Kembali ke Kabar Desa
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="container mx-auto px-4 md:px-0" data-aos="fade-up">
        <div class="max-w-4xl mx-auto">
            <h4 class="text-lg md:text-2xl font-black text-gelap uppercase tracking-tighter mb-8 flex items-center">
                <span class="w-8 h-1 bg-aksen mr-4 rounded-full"></span> Berita Terkait Lainnya
            </h4>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php
                    // Ambil 3 berita terbaru selain berita yang sedang dibuka
                    $query_terkait = mysqli_query($koneksi, "SELECT * FROM berita WHERE id != '$id' ORDER BY tanggal_posting DESC LIMIT 3");
                    
                    if(mysqli_num_rows($query_terkait) > 0):
                        while($terkait = mysqli_fetch_assoc($query_terkait)):
                ?>
                    <a href="index.php?page=detail_berita&id=<?php echo $terkait['id']; ?>" class="group">
                        <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden shadow-sm hover:shadow-xl transition-all h-full flex flex-col">
                            <div class="aspect-video overflow-hidden">
                                <img src="images/<?php echo htmlspecialchars($terkait['gambar']); ?>" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition duration-500" 
                                     alt="Berita Terkait">
                            </div>
                            <div class="p-4 flex-grow flex flex-col justify-between">
                                <h6 class="font-bold text-gelap text-sm md:text-base leading-snug group-hover:text-utama transition line-clamp-2 uppercase">
                                    <?php echo htmlspecialchars($terkait['judul']); ?>
                                </h6>
                                <div class="mt-3 flex items-center text-[9px] md:text-[10px] font-black text-gray-400 uppercase tracking-widest">
                                    <i class="bi bi-clock-history mr-2 text-aksen"></i> <?php echo date('d M Y', strtotime($terkait['tanggal_posting'])); ?>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php 
                        endwhile; 
                    else:
                ?>
                    <div class="col-span-full py-10 text-center bg-gray-50 rounded-2xl border-2 border-dashed border-gray-100">
                        <p class="text-gray-400 font-bold uppercase tracking-widest text-[10px]">Belum ada berita terkait lainnya.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

</main>