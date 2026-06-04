<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Bukit Sere</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'utama': '#0d47a1',   /* Biru Utama */
                        'aksen': '#ffc107',   /* Emas Aksen */
                        'latar': '#f8fafc',   /* Background */
                        'gelap': '#1e293b',   /* Teks Utama */
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Poppins', sans-serif; overflow-x: hidden; }
        @keyframes ticker { 0% { transform: translateX(100%); } 100% { transform: translateX(-100%); } }
        .animate-ticker { animation: ticker 25s linear infinite; }
    </style>
</head>
<body class="bg-latar">

    <nav class="bg-utama text-white sticky top-0 z-[100] shadow-lg">
        <div class="container mx-auto px-4 md:px-10">
            <div class="flex justify-between items-center h-20 md:h-24">
                
                <a href="index.php" class="flex items-center space-x-3 group">
                    <img src="images/logo.png" alt="Logo" class="h-10 md:h-14 w-auto bg-white p-1 rounded-lg">
                    <div class="leading-tight">
                        <span class="block text-lg md:text-2xl font-bold tracking-tight uppercase italic">Bukit Sere</span>
                        <small class="text-[10px] md:text-xs font-medium text-blue-200 uppercase tracking-widest">Bacan Selatan</small>
                    </div>
                </a>

                <div class="hidden lg:flex items-center space-x-7 text-[13px] font-semibold uppercase tracking-wider">
                    <a href="index.php?page=home" class="hover:text-aksen transition">Beranda</a>
                    <a href="index.php?page=profil" class="hover:text-aksen transition">Profil</a>
                    
                    <div class="relative group">
                        <button class="hover:text-aksen flex items-center transition">
                            Data <i class="bi bi-chevron-down ml-1 text-[10px]"></i>
                        </button>
                        <div class="absolute bg-white text-gelap mt-2 w-64 rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all border-t-4 border-utama overflow-hidden">
                            <a href="index.php?page=infografis-penduduk" class="block px-5 py-3 hover:bg-latar hover:text-utama border-b border-gray-50 transition text-xs font-bold">Demografi Penduduk</a>
                            <a href="index.php?page=infografis-apbd" class="block px-5 py-3 hover:bg-latar hover:text-utama border-b border-gray-50 transition text-xs font-bold">Transparansi APBDes</a>
                            <a href="index.php?page=sotk" class="block px-5 py-3 hover:bg-latar transition text-xs font-bold">Struktur Organisasi</a>
                        </div>
                    </div>

                    <a href="index.php?page=berita" class="hover:text-aksen transition">Kabar Desa</a>

                    <div class="relative group">
                        <button class="hover:text-aksen flex items-center transition">
                            Media <i class="bi bi-chevron-down ml-1 text-[10px]"></i>
                        </button>
                        <div class="absolute bg-white text-gelap mt-2 w-56 rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all border-t-4 border-utama overflow-hidden">
                            <a href="index.php?page=galeri-foto" class="block px-5 py-3 hover:bg-latar hover:text-utama border-b border-gray-50 transition text-xs font-bold">Galeri Foto</a>
                            <a href="index.php?page=galeri-video" class="block px-5 py-3 hover:bg-latar transition text-xs font-bold">Dokumentasi Video</a>
                        </div>
                    </div>

                    <a href="index.php?page=layanan_mandiri" class="hover:text-aksen transition">Layanan</a>
                    
                    <a href="index.php?page=kritik_saran" class="bg-aksen text-utama px-6 py-2.5 rounded-full font-bold hover:brightness-110 shadow-md transition uppercase text-xs">
                        Hubungi Kami
                    </a>
                </div>

                <button id="nav-toggle" class="lg:hidden text-3xl text-aksen focus:outline-none">
                    <i class="bi bi-list"></i>
                </button>
            </div>
        </div>

        <div id="nav-menu" class="hidden lg:hidden bg-utama border-t border-white/10 px-6 py-8 space-y-4 max-h-[80vh] overflow-y-auto">
            <a href="index.php?page=home" class="block text-sm font-bold border-b border-white/10 pb-2">Beranda</a>
            <a href="index.php?page=profil" class="block text-sm font-bold border-b border-white/10 pb-2">Profil Desa</a>
            
            <p class="text-[10px] uppercase text-blue-300 font-black tracking-widest mt-4">Data Desa</p>
            <div class="pl-4 space-y-3">
                <a href="index.php?page=infografis-penduduk" class="block text-sm font-medium">Demografi Penduduk</a>
                <a href="index.php?page=infografis-apbd" class="block text-sm font-medium">Transparansi APBDes</a>
                <a href="index.php?page=sotk" class="block text-sm font-medium">Struktur Organisasi</a>
            </div>

            <p class="text-[10px] uppercase text-blue-300 font-black tracking-widest mt-4">Informasi & Media</p>
            <div class="pl-4 space-y-3">
                <a href="index.php?page=berita" class="block text-sm font-medium">Kabar Desa</a>
                <a href="index.php?page=galeri-foto" class="block text-sm font-medium">Galeri Foto</a>
                <a href="index.php?page=galeri-video" class="block text-sm font-medium">Dokumentasi Video</a>
            </div>

            <a href="index.php?page=layanan_mandiri" class="block text-sm font-bold border-b border-white/10 pt-4 pb-2">Layanan Mandiri</a>
            <a href="index.php?page=kritik_saran" class="block bg-aksen text-utama p-4 rounded-xl font-bold text-center uppercase shadow-lg">Hubungi Kami</a>
        </div>
    </nav>

    <?php
        // Mengambil pengumuman aktif dari database
        $query_pengumuman = mysqli_query($koneksi, "SELECT judul FROM pengumuman WHERE status = 'aktif'");
        if($query_pengumuman && mysqli_num_rows($query_pengumuman) > 0):
    ?>
    <div class="bg-aksen border-b border-utama/10 overflow-hidden py-2 shadow-inner">
        <div class="whitespace-nowrap flex animate-ticker">
            <?php while($pengumuman = mysqli_fetch_assoc($query_pengumuman)): ?>
                <span class="mx-10 font-bold text-utama text-[11px] md:text-sm uppercase flex items-center italic">
                    <i class="bi bi-megaphone-fill mr-3"></i> <?php echo htmlspecialchars($pengumuman['judul']); ?>
                </span>
            <?php endwhile; ?>
            <?php 
                mysqli_data_seek($query_pengumuman, 0); 
                while($pengumuman = mysqli_fetch_assoc($query_pengumuman)): 
            ?>
                <span class="mx-10 font-bold text-utama text-[11px] md:text-sm uppercase flex items-center italic">
                    <i class="bi bi-megaphone-fill mr-3"></i> <?php echo htmlspecialchars($pengumuman['judul']); ?>
                </span>
            <?php endwhile; ?>
        </div>
    </div>
    <?php endif; ?>

    <script>
        const btnToggle = document.getElementById('nav-toggle');
        const mobileMenu = document.getElementById('nav-menu');
        
        if(btnToggle && mobileMenu) {
            btnToggle.onclick = () => {
                mobileMenu.classList.toggle('hidden');
                // Ubah icon saat diklik (opsional)
                const icon = btnToggle.querySelector('i');
                icon.classList.toggle('bi-list');
                icon.classList.toggle('bi-x-lg');
            }
        }
    </script>