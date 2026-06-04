<?php
    // Satu baris sederhana untuk ambil data footer
$fo = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM footer_settings LIMIT 1")) ?: [];
?>
<footer class="bg-gelap text-white pt-16 pb-8 border-t border-white/5">
    <div class="container mx-auto px-4 md:px-12 grid grid-cols-1 md:grid-cols-3 gap-12 pb-12 border-b border-white/10">
        <div class="space-y-4">
            <h4 class="text-xl font-black uppercase italic">Desa Bukit Sere</h4>
            <p class="text-gray-400 text-sm leading-relaxed">Website resmi transparansi dan pelayanan digital pemerintah Desa Bukit Sere.</p>
        </div>
        <div class="space-y-4">
            <h5 class="text-sm font-black uppercase text-aksen">Kontak</h5>
            <ul class="text-gray-400 text-sm space-y-2">
                <li><i class="bi bi-geo-alt-fill text-aksen mr-2"></i> <?php echo htmlspecialchars($fo['alamat'] ?? '-'); ?></li>
                <li><i class="bi bi-telephone-fill text-aksen mr-2"></i> <?php echo htmlspecialchars($fo['telepon'] ?? '-'); ?></li>
            </ul>
        </div>
        <div class="space-y-4">
            <h5 class="text-sm font-black uppercase text-aksen">Sosial Media</h5>
            <div class="flex gap-3">
                <a href="<?php echo $fo['link_facebook'] ?? '#'; ?>" class="w-10 h-10 bg-white/5 hover:bg-aksen rounded-xl flex items-center justify-center transition-all"><i class="bi bi-facebook"></i></a>
                <a href="<?php echo $fo['link_instagram'] ?? '#'; ?>" class="w-10 h-10 bg-white/5 hover:bg-aksen rounded-xl flex items-center justify-center transition-all"><i class="bi bi-instagram"></i></a>
                <a href="<?php echo $fo['link_tiktok'] ?? '#'; ?>" class="w-10 h-10 bg-white/5 hover:bg-aksen rounded-xl flex items-center justify-center transition-all"><i class="bi bi-tiktok"></i></a>
                <a href="<?php echo $fo['link_youtube'] ?? '#'; ?>" class="w-10 h-10 bg-white/5 hover:bg-aksen rounded-xl flex items-center justify-center transition-all"><i class="bi bi-youtube"></i></a>
            </div>
        </div>
    </div>
    <p class="pt-8 text-center text-[10px] font-black text-gray-500 uppercase tracking-widest">&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($fo['alamat'] ?? '-'); ?>. All Rights Reserved.</p>
</footer>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    // 1. Jalankan Animasi
    AOS.init({ duration: 800, once: true });

    // 2. Fungsi Pindah Slider
    let currentIndex = 0;
    const wrapper = document.getElementById('slider-wrapper');
    function moveSlide(step) {
        if(!wrapper) return;
        const total = wrapper.children.length;
        currentIndex = (currentIndex + step + total) % total;
        wrapper.style.transform = `translateX(-${currentIndex * 100}%)`;
    }
    if(wrapper) { setInterval(() => moveSlide(1), 7000); }

    // 3. Nav Mobile
    document.getElementById('nav-toggle').onclick = () => {
        document.getElementById('nav-menu').classList.toggle('hidden');
    }
</script>
</body>
</html>