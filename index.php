<?php 
    include 'koneksi.php';
    include 'header.php'; 

    if (!isset($_GET['page']) || $_GET['page'] == 'home') {
        $query_slider = mysqli_query($koneksi, "SELECT * FROM slider ORDER BY urutan ASC");
        if ($query_slider && mysqli_num_rows($query_slider) > 0) {
            echo '<div class="relative w-full overflow-hidden bg-gelap group" id="slider-container">';
            echo '<div class="relative h-[450px] md:h-[650px] flex transition-transform duration-700 ease-in-out" id="slider-wrapper">';
            while ($slide = mysqli_fetch_assoc($query_slider)) {
                echo '
                <div class="min-w-full relative h-full">
                    <div class="absolute inset-0 bg-black/30 z-10"></div>
                    <img src="images/'.htmlspecialchars($slide['gambar']).'" class="w-full h-full object-cover" alt="Slider">
                    <div class="absolute inset-0 flex items-center justify-center z-20">
                        <div class="text-center px-4 md:px-12 space-y-4">
                            <h2 class="text-white text-3xl md:text-7xl font-black drop-shadow-2xl uppercase italic">'.htmlspecialchars($slide['judul']).'</h2>
                            <div class="w-20 md:w-40 h-2 bg-aksen mx-auto rounded-full shadow-lg"></div>
                            <p class="text-aksen text-lg md:text-4xl font-bold drop-shadow-lg">'.htmlspecialchars($slide['subjudul']).'</p>
                        </div>
                    </div>
                </div>';
            }
            echo '</div>';
            echo '<button onclick="moveSlide(-1)" class="absolute left-6 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-aksen text-white p-4 rounded-2xl transition-all z-30 opacity-0 group-hover:opacity-100 hidden md:block border border-white/20"><i class="bi bi-chevron-left text-3xl"></i></button>
                  <button onclick="moveSlide(1)" class="absolute right-6 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-aksen text-white p-4 rounded-2xl transition-all z-30 opacity-0 group-hover:opacity-100 hidden md:block border border-white/20"><i class="bi bi-chevron-right text-3xl"></i></button>';
            echo '</div>';
        }
    }
?>
<main class="min-h-screen">
    <?php
    $page = $_GET['page'] ?? 'home';
    switch ($page) {
        case 'home': include 'home.php'; break;
        case 'profil': include 'profil.php'; break;
        case 'infografis-penduduk': include 'infografis-penduduk.php'; break;
        case 'infografis-apbd': include 'infografis-apbd.php'; break;
        case 'sotk': include 'sotk.php'; break;
        case 'berita': include 'berita.php'; break;
        case 'detail_berita': include 'detail_berita.php'; break;
        case 'galeri-foto': include 'galeri-foto.php'; break;
        case 'galeri-video': include "video.php"; break;
        case 'layanan_mandiri': include 'layanan_mandiri.php'; break;
        case 'kritik_saran': include 'kritik_saran.php'; break;
        default: include 'home.php'; break;
    }
    ?>
</main>

<?php include 'footer.php'; ?>