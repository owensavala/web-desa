<main class="space-y-10 md:space-y-16 pb-20">

    <section class="bg-utama text-white rounded-2xl shadow-lg p-8 md:p-12 border border-blue-400/20 text-center" data-aos="fade-down">
        <h1 class="text-2xl md:text-5xl font-black uppercase tracking-tighter leading-none">Kritik & Saran</h1>
        <div class="w-16 md:w-24 h-1 bg-aksen mx-auto mt-4 rounded-full"></div>
        <p class="text-xs md:text-lg text-blue-100 font-medium opacity-80 mt-4 uppercase tracking-widest max-w-2xl mx-auto leading-relaxed">
            Suara Anda adalah modal pembangunan kami. Sampaikan masukan untuk kemajuan Desa Bukit Sere.
        </p>
    </section>

    <section class="container mx-auto px-4 md:px-0">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden" data-aos="fade-up">
                <div class="p-6 md:p-12">
                    
                    <?php if (isset($_GET['status']) && $_GET['status'] == 'sukses'): ?>
                        <div class="mb-8 flex items-center p-4 md:p-6 bg-emerald-50 border-l-4 border-emerald-500 rounded-xl text-emerald-700 shadow-inner">
                            <i class="bi bi-check-circle-fill text-2xl md:text-3xl mr-4"></i>
                            <div>
                                <p class="font-black uppercase text-xs md:text-sm tracking-widest">Berhasil Terkirim!</p>
                                <p class="text-[10px] md:text-xs font-medium">Terima kasih! Masukan Anda telah kami terima dan akan segera ditindaklanjuti.</p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <form action="proses_saran.php" method="POST" class="space-y-6 md:space-y-8">
                        
                        <div class="space-y-2">
                            <label for="nama" class="block text-[10px] md:text-xs font-black text-gray-400 uppercase tracking-[0.2em] ml-2">Nama Lengkap / Samaran</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-utama">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <input type="text" id="nama" name="nama" 
                                       class="w-full bg-latar border-2 border-transparent focus:border-utama focus:bg-white rounded-2xl py-3 md:py-4 pl-12 pr-4 outline-none transition-all font-semibold text-gelap text-sm md:text-base placeholder:text-gray-400 shadow-inner" 
                                       placeholder="Tuliskan nama Anda di sini..." required>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="komentar" class="block text-[10px] md:text-xs font-black text-gray-400 uppercase tracking-[0.2em] ml-2">Pesan, Kritik, atau Saran</label>
                            <div class="relative">
                                <span class="absolute top-4 left-4 text-utama">
                                    <i class="bi bi-chat-left-dots-fill"></i>
                                </span>
                                <textarea id="komentar" name="komentar" rows="6" 
                                          class="w-full bg-latar border-2 border-transparent focus:border-utama focus:bg-white rounded-2xl py-3 md:py-4 pl-12 pr-4 outline-none transition-all font-semibold text-gelap text-sm md:text-base placeholder:text-gray-400 shadow-inner resize-none" 
                                          placeholder="Tuliskan masukan Anda secara detail di sini..." required></textarea>
                            </div>
                        </div>

                        <div class="pt-4">
                            <button type="submit" 
                                    class="w-full bg-utama text-white py-4 md:py-5 rounded-2xl font-black text-xs md:text-sm uppercase tracking-[0.3em] shadow-lg hover:shadow-utama/30 hover:brightness-110 active:scale-95 transition-all flex items-center justify-center">
                                <i class="bi bi-send-fill mr-3 text-aksen"></i> Kirim Masukan Sekarang
                            </button>
                            <p class="text-center text-[9px] md:text-[10px] text-gray-400 font-bold mt-4 uppercase tracking-widest italic">
                                <i class="bi bi-shield-lock-fill mr-1 text-aksen"></i> Privasi identitas Anda akan tetap terjaga secara aman.
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main>