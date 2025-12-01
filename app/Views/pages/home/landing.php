<header
    class="sticky top-0 z-50 w-full bg-mainBg/80 backdrop-blur-xl border-b border-mainGray transition-colors duration-300">
    <nav class="container mx-auto px-6 py-4 flex justify-between items-center">

      <a href="/" class="group relative">
        <img src="/assets/logo.png" class="w-32 md:w-36 hover:opacity-80 transition-opacity block dark:hidden"
          alt="Logo JMK25 Light">
        <img src="/assets/logowhite.png" class="w-32 md:w-36 hover:opacity-80 transition-opacity hidden dark:block"
          alt="Logo JMK25 Dark">
      </a>

      <a href="/user/signin"
        class="px-8 py-2.5 rounded-xl font-bold border-2 border-mainGray text-mainText hover:bg-accent hover:text-mainBg hover:border-accent transition-all duration-300">
        Login
      </a>

    </nav>
  </header>
<section class="relative w-full bg-mainBg text-mainText py-28 overflow-hidden">

  <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-accent/5 rounded-full blur-3xl pointer-events-none">
  </div>

  <div class="w-full max-w-7xl mx-auto px-6 md:px-12 flex flex-col md:flex-row items-center gap-16 lg:gap-24">

    <div class="w-full md:w-1/2 flex justify-center md:justify-start relative z-10">
      <div
        class="relative w-80 aspect-[4/5] bg-secondBg rounded-3xl border-4 border-mainText shadow-[12px_12px_0px_0px_var(--mainText)] transform -rotate-2 hover:rotate-0 transition-all duration-500 group">
        <div class="w-full h-4/5 bg-gray-200 rounded-t-2xl overflow-hidden border-b-2 border-mainText">
          <img src="/assets/gacor.jpeg" alt="Hero Meme" class="w-full h-full object-cover">
        </div>
        <div class="h-1/5 flex items-center justify-between px-6 bg-mainBg rounded-b-2xl">
          <div>
            <p class="font-bold text-base">Meme_Skripsi.jpg</p>
            <p class="text-sm text-mainText/60">2.4k Likes</p>
          </div>
          <ion-icon name="heart" class="text-mainText text-2xl"></ion-icon>
        </div>
      </div>
    </div>

    <div class="w-full md:w-1/2 space-y-6 z-10">
      <div
        class="inline-block px-4 py-1.5 rounded-full border border-mainGray bg-transparent text-sm font-bold text-mainText mb-2">
        Resmi dibuka untuk mahasiswa gabut
      </div>

      <h1 class="text-5xl md:text-6xl lg:text-7xl font-black leading-none tracking-tight">
        Jawara <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-purple-600">Meme
          Kampus</span>
      </h1>

      <p class="text-lg text-mainText/70 leading-relaxed max-w-lg">
        Platform resmi untuk menyalurkan aspirasi lewat gambar lucu.
        Sindir dosen, keluhkan UKT, atau sekadar shitposting tanpa takut di-DO.
      </p>

      <div class="flex flex-wrap gap-4 pt-6">
        <a href="/user/signin"
          class="px-8 py-4 rounded-xl bg-mainText text-mainBg font-bold text-lg hover:scale-105 transition-transform shadow-lg">
          Mulai Eksplore
        </a>
        <a href="/user/signin"
          class="px-8 py-4 rounded-xl border-2 border-mainGray bg-transparent text-mainText font-bold text-lg hover:bg-mainGray/10 transition-colors">
          Lihat Trending
        </a>
      </div>
    </div>

  </div>
</section>


<section id="trending" class="w-full py-28">
  <div class="w-full max-w-7xl mx-auto px-6 md:px-12">

    <div class="flex justify-between items-end mb-12">
      <div>
        <h2 class="text-3xl md:text-4xl font-black text-mainText">Lagi Rame</h2>
        <p class="text-lg text-mainText/60 mt-2">Meme yang bikin satu kampus geger hari ini.</p>
      </div>
      <a href="/user/signin" class="hidden md:flex items-center gap-2 text-accent font-bold text-lg hover:underline">
        Lihat Semua <ion-icon name="arrow-forward"></ion-icon>
      </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

      <div
        class="bg-mainBg rounded-2xl border border-mainGray overflow-hidden hover:translate-y-[-8px] transition-transform shadow-lg group">
        <div class="h-48 bg-gray-300 overflow-hidden">
          <img src="https://images.unsplash.com/photo-1531259683007-016a7b628fc3?auto=format&fit=crop&w=400&q=80"
            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
        </div>
        <div class="p-6">
          <div class="flex items-center gap-2 mb-3">
            <ion-icon name="person-circle" class="text-2xl text-mainText/50"></ion-icon>
            <span class="text-sm font-bold text-mainText/70">@semester_tua</span>
          </div>
          <h3 class="font-bold text-xl text-mainText mb-1">POV: Nunggu Dosen 3 Jam</h3>
        </div>
      </div>

      <div
        class="bg-mainBg rounded-2xl border border-mainGray overflow-hidden hover:translate-y-[-8px] transition-transform shadow-lg group">
        <div class="h-48 bg-gray-300 overflow-hidden">
          <img src="https://images.unsplash.com/photo-1586486855514-8c633cc6fd38?auto=format&fit=crop&w=400&q=80"
            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
        </div>
        <div class="p-6">
          <div class="flex items-center gap-2 mb-3">
            <ion-icon name="person-circle" class="text-2xl text-mainText/50"></ion-icon>
            <span class="text-sm font-bold text-mainText/70">@maba_polos</span>
          </div>
          <h3 class="font-bold text-xl text-mainText mb-1">Ekspektasi vs Realita Kantin</h3>
        </div>
      </div>

      <div
        class="bg-mainBg rounded-2xl border border-mainGray overflow-hidden hover:translate-y-[-8px] transition-transform shadow-lg group">
        <div class="h-48 bg-gray-300 overflow-hidden flex items-center justify-center bg-pattern">
          <p class="text-mainText/40 font-black text-2xl rotate-[-10deg]">TEXT ONLY MEME</p>
        </div>
        <div class="p-6">
          <div class="flex items-center gap-2 mb-3">
            <ion-icon name="person-circle" class="text-2xl text-mainText/50"></ion-icon>
            <span class="text-sm font-bold text-mainText/70">@admin_confess</span>
          </div>
          <h3 class="font-bold text-xl text-mainText mb-1">Info parkiran penuh gan</h3>
        </div>
      </div>

    </div>

    <div class="mt-12 text-center md:hidden">
      <a href="/user/signin" class="inline-flex items-center gap-2 text-accent font-bold text-lg hover:underline">
        Lihat Semua <ion-icon name="arrow-forward"></ion-icon>
      </a>
    </div>

  </div>
</section>


<section class="w-full bg-mainBg py-28">
  <div class="w-full max-w-7xl mx-auto px-6 md:px-12 text-center">

    <h2 class="text-4xl md:text-5xl font-black text-mainText mb-16">Kenapa Harus Join?</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

      <div class="flex flex-col items-center space-y-6 p-6 rounded-3xl transition-colors duration-300">
        <div
          class="w-20 h-20 rounded-3xl bg-secondBg border border-mainGray flex items-center justify-center text-mainText shadow-sm">
          <ion-icon name="people" class="text-5xl"></ion-icon>
        </div>
        <div>
          <h3 class="text-2xl font-bold text-mainText mb-2">Komunitas Solid</h3>
          <p class="text-mainText/60 leading-relaxed">
            Temukan teman seperjuangan yang sama-sama pusing mikirin tugas akhir.
          </p>
        </div>
      </div>

      <div class="flex flex-col items-center space-y-6 p-6 rounded-3xl transition-colors duration-300">
        <div
          class="w-20 h-20 rounded-3xl bg-secondBg border border-mainGray flex items-center justify-center text-mainText shadow-sm">
          <ion-icon name="happy" class="text-5xl"></ion-icon>
        </div>
        <div>
          <h3 class="text-2xl font-bold text-mainText mb-2">100% Lucu</h3>
          <p class="text-mainText/60 leading-relaxed">
            Jaminan ngakak atau uang kembali (tapi ini gratis sih, jadi yaudah).
          </p>
        </div>
      </div>

      <div class="flex flex-col items-center space-y-6 p-6 rounded-3xl transition-colors duration-300">
        <div
          class="w-20 h-20 rounded-3xl bg-secondBg border border-mainGray flex items-center justify-center text-mainText shadow-sm">
          <ion-icon name="shield-checkmark" class="text-5xl"></ion-icon>
        </div>
        <div>
          <h3 class="text-2xl font-bold text-mainText mb-2">Aman Terkendali</h3>
          <p class="text-mainText/60 leading-relaxed">
            Identitas aman, bebas berekspresi selama tidak melanggar aturan kampus.
          </p>
        </div>
      </div>

    </div>
  </div>
</section>


<section class="w-full bg-secondBg py-28">
  <div class="w-full max-w-7xl mx-auto px-6 md:px-12">

    <div
      class="w-full bg-mainBg rounded-[3rem] border-2 border-mainText p-12 md:p-16 text-center shadow-[12px_12px_0px_0px_var(--mainText)] relative overflow-hidden">

      <div class="absolute top-0 left-0 w-full h-full bg-accent/5 z-0"></div>

      <div class="relative z-10 space-y-8">
        <h2 class="text-4xl md:text-5xl font-black text-mainText leading-tight">
          Punya Meme Nganggur?
        </h2>
        <p class="text-xl text-mainText/70 max-w-2xl mx-auto">
          Jangan cuma disimpen di galeri HP. Upload sekarang dan jadilah legenda kampus!
        </p>
        <div class="pt-4">
          <a href="/user/signin"
            class="inline-block px-12 py-5 rounded-full bg-accent text-mainBg font-bold text-xl hover:shadow-2xl hover:-translate-y-1 transition-all">
            Upload Meme Sekarang
          </a>
        </div>
      </div>

    </div>
  </div>
</section>