<?php 
    $user = $model['user'] ?? [];
?>

<main class="max-w-3xl mx-auto min-h-screen flex flex-col font-sans">

  <div class="sticky top-0 z-50 shrink-0 backdrop-blur-md bg-mainBg/90">
    <?php require_once __DIR__ . '/../../partials/MainHeader.php'; ?>
  </div>

  <div class="max-w-2xl mx-auto w-full px-4 mt-8 pb-20">

    <div class="p-4 md:p-8">

      <form action="/user/update" method="POST" enctype="multipart/form-data" class="space-y-8">

        <div class="flex flex-col items-center justify-center">
          <div class="relative group cursor-pointer">

            <div class="w-32 h-32 rounded-full overflow-hidden relative border-4 border-mainGray/50">
              <img id="profile-preview"
                src="<?= $user['user_pict'] ? '/assets/' . $user['user_pict'] : '/assets/default.jpg' ?>"
                class="w-full h-full object-cover transition-opacity duration-300 group-hover:opacity-75">

              <div
                class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <ion-icon name="camera" class="text-3xl text-white drop-shadow-md"></ion-icon>
              </div>
            </div>

            <input type="file" name="user_pict" id="user_pict"
              class="absolute inset-0 w-100 h-full opacity-0 cursor-pointer rounded-full" accept="image/*"
              onchange="previewImage(this)">
          </div>
          <p class="text-xs text-mainGray mt-4 font-medium">Ketuk foto untuk mengganti avatar</p>
        </div>

        <div class="space-y-6">

          <div>
            <label class="block text-xs font-bold text-mainGray uppercase tracking-wider mb-2 ml-3">Nama
              Tampilan</label>
            <div class="relative group">
              <div class="absolute left-4 top-1/2 -translate-y-1/2 text-mainGray/70 text-lg flex">
                <ion-icon name="person-outline"></ion-icon>
              </div>
              <input type="text" name="user_display" value="<?= htmlspecialchars($user['user_display'] ?? '') ?>"
                class="w-full bg-transparent border border-mainGray/50 focus:border-blue-600 rounded-2xl py-3.5 pl-12 pr-4 text-mainText outline-none transition-colors placeholder-mainGray/40 font-medium"
                placeholder="Nama panggilan Anda">
            </div>
          </div>

          <div>
            <label class="block text-xs font-bold text-mainGray uppercase tracking-wider mb-2 ml-3">Bio</label>
            <div class="relative group">
              <div class="absolute left-4 top-4 text-mainGray/70 text-lg flex">
                <ion-icon name="document-text-outline"></ion-icon>
              </div>
              <textarea name="user_bio" rows="3"
                class="w-full bg-transparent border border-mainGray/50 focus:border-blue-600 rounded-2xl py-3.5 pl-12 pr-4 text-mainText outline-none transition-colors resize-none placeholder-mainGray/40 leading-relaxed font-medium"
                placeholder="Ceritakan sedikit tentang diri Anda..."><?= htmlspecialchars($user['user_bio'] ?? '') ?></textarea>
            </div>
          </div>

        </div>

        <div class="h-px bg-mainGray/20 my-6"></div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
          <div>
            <label class="block text-xs font-bold text-mainGray uppercase tracking-wider mb-2 ml-3">Username</label>
            <div class="relative">
              <input type="text" value="@<?= htmlspecialchars($user['username'] ?? '') ?>" disabled
                class="w-full bg-transparent border border-mainGray/30 rounded-2xl px-4 py-3.5 text-mainGray/60 font-mono text-sm cursor-not-allowed select-none">
              <ion-icon name="lock-closed" class="absolute right-4 top-1/2 -translate-y-1/2 text-mainGray/30">
              </ion-icon>
            </div>
          </div>

          <div>
            <label class="block text-xs font-bold text-mainGray uppercase tracking-wider mb-2 ml-3">Email</label>
            <div class="relative">
              <input type="email" value="<?= htmlspecialchars($user['user_email'] ?? '') ?>" disabled
                class="w-full bg-transparent border border-mainGray/30 rounded-2xl px-4 py-3.5 text-mainGray/60 font-mono text-sm cursor-not-allowed select-none">
              <ion-icon name="lock-closed" class="absolute right-4 top-1/2 -translate-y-1/2 text-mainGray/30">
              </ion-icon>
            </div>
          </div>
        </div>

        <div class="flex items-center gap-4 mt-8 pt-2">
          <a href="/profile"
            class="flex-1 py-3.5 text-center text-mainText font-bold rounded-2xl bg-transparent border border-mainGray/50 hover:bg-mainGray/10 transition-colors">
            Batal
          </a>
          <button type="submit"
            class="flex-1 py-3.5 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-2xl shadow-lg transition-colors flex items-center justify-center gap-2">
            <ion-icon name="save-outline" class="text-lg"></ion-icon>
            Simpan
          </button>
        </div>

      </form>
    </div>

  </div>
</main>

<script>
function previewImage(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      document.getElementById('profile-preview').src = e.target.result;
    }
    reader.readAsDataURL(input.files[0]);
  }
}
</script>