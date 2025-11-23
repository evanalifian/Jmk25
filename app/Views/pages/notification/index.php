<div class="min-h-screen bg-mainBg text-mainText pt-20 pb-24 md:pl-24 md:pt-8 transition-colors duration-300">
    
    <div class="max-w-2xl mx-auto px-4">
        
        <!-- HEADER UTAMA -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Notifikasi</h1>
            <button class="text-accent text-sm font-medium hover:underline">Tandai semua sudah dibaca</button>
        </div>

        <!-- SECTION 1: BELUM DIBACA (BARU) -->
        <div class="mb-8">
            <h3 class="text-sm font-semibold text-mainGray mb-3 px-2">Baru</h3>
            
            <div class="space-y-2">
                <!-- Item: Belum Dibaca (Background SecondBg + Dot Indikator) -->
                <div class="flex items-center gap-4 p-4 rounded-2xl bg-secondBg hover:bg-mainGray/20 transition-colors cursor-pointer group relative overflow-hidden">
                    
                    <!-- Indikator Belum Dibaca (Titik Biru) -->
                    <div class="absolute left-2 top-1/2 -translate-y-1/2 w-1.5 h-1.5 bg-accent rounded-full"></div>

                    <div class="relative ml-2">
                        <div class="w-12 h-12 rounded-full bg-gray-700 overflow-hidden border border-mainGray">
                            <img src="/assets/default.jpg" class="w-full h-full object-cover">
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center text-white border-2 border-secondBg">
                            <ion-icon name="person-add" class="text-xs"></ion-icon>
                        </div>
                    </div>
                    <div class="flex-grow">
                        <p class="text-sm text-mainText">
                            <span class="font-bold">budi_santoso</span> mulai mengikuti Anda.
                        </p>
                        <p class="text-xs text-accent font-medium mt-1">Baru saja</p>
                    </div>
                    <button class="px-4 py-1.5 bg-accent text-white text-xs font-bold rounded-full hover:opacity-90 transition-opacity">
                        Ikuti Balik
                    </button>
                </div>
                <div class="flex items-center gap-4 p-4 rounded-2xl bg-secondBg hover:bg-mainGray/20 transition-colors cursor-pointer group relative overflow-hidden">
                    
                    <!-- Indikator Belum Dibaca (Titik Biru) -->
                    <div class="absolute left-2 top-1/2 -translate-y-1/2 w-1.5 h-1.5 bg-accent rounded-full"></div>

                    <div class="relative ml-2">
                        <div class="w-12 h-12 rounded-full bg-gray-700 overflow-hidden border border-mainGray">
                            <img src="/assets/default.jpg" class="w-full h-full object-cover">
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center text-white border-2 border-secondBg">
                            <ion-icon name="person-add" class="text-xs"></ion-icon>
                        </div>
                    </div>
                    <div class="flex-grow">
                        <p class="text-sm text-mainText">
                            <span class="font-bold">budi_santoso</span> mulai mengikuti Anda.
                        </p>
                        <p class="text-xs text-accent font-medium mt-1">Baru saja</p>
                    </div>
                    <button class="px-4 py-1.5 bg-accent text-white text-xs font-bold rounded-full hover:opacity-90 transition-opacity">
                        Ikuti Balik
                    </button>
                </div>
            </div>
        </div>

        <!-- DIVIDER / PEMISAH -->
        <div class="border-b border-mainGray/20 mb-8"></div>

        <!-- SECTION 2: SUDAH DIBACA (Minggu Ini) -->
        <div>
            <h3 class="text-sm font-semibold text-mainGray mb-3 px-2">Minggu Ini</h3>

            <div class="space-y-2">

                <!-- Item: Sudah Dibaca (Background Transparan/MainBg) -->
                <div class="flex items-center gap-4 p-4 rounded-2xl hover:bg-secondBg transition-colors cursor-pointer group opacity-90">
                    <div class="relative">
                        <div class="w-12 h-12 rounded-full bg-gray-700 overflow-hidden border border-mainGray">
                            <img src="/assets/default.jpg" class="w-full h-full object-cover">
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-red-500 rounded-full flex items-center justify-center text-white border-2 border-mainBg">
                            <ion-icon name="heart" class="text-xs"></ion-icon>
                        </div>
                    </div>
                    <div class="flex-grow">
                        <p class="text-sm text-mainText/80 group-hover:text-mainText transition-colors">
                            <span class="font-bold">siti_aminah</span> menyukai postingan Anda: "Liburan seru di Bali..."
                        </p>
                        <p class="text-xs text-mainGray mt-1">2 jam yang lalu</p>
                    </div>
                    <div class="w-10 h-10 rounded bg-gray-600 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?auto=format&fit=crop&w=100" class="w-full h-full object-cover opacity-80 group-hover:opacity-100">
                    </div>
                </div>

                <!-- Item: Sudah Dibaca -->
                <div class="flex items-center gap-4 p-4 rounded-2xl hover:bg-secondBg transition-colors cursor-pointer group opacity-90">
                    <div class="relative">
                        <div class="w-12 h-12 rounded-full bg-gray-700 overflow-hidden border border-mainGray">
                            <img src="/assets/default.jpg" class="w-full h-full object-cover">
                        </div>
                        <div class="absolute -bottom-1 -right-1 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center text-white border-2 border-mainBg">
                            <ion-icon name="chatbubble" class="text-xs"></ion-icon>
                        </div>
                    </div>
                    <div class="flex-grow">
                        <p class="text-sm text-mainText/80 group-hover:text-mainText transition-colors">
                            <span class="font-bold">ani_kue</span> berkomentar: "Wah, resepnya boleh dibagi dong kak!"
                        </p>
                        <p class="text-xs text-mainGray mt-1">1 hari yang lalu</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>