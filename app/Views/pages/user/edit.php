<?php 
    include __DIR__ . '/../../template/header.php'; 
    include __DIR__ . '/../../partials/MainHeader.php'; 
    include __DIR__ . '/../../template/sidebar.php';
    
    // Ambil data user dari model yang dikirim controller
    $user = $model['user'] ?? [];
?>

<div class="min-h-screen bg-mainBg text-mainText pt-20 pb-24 md:pl-20 md:pt-10 transition-colors duration-300">
    
    <div class="max-w-xl mx-auto px-4">
        
        <div class="flex items-center gap-3 mb-8">
            <a href="/profile" class="p-2 rounded-full hover:bg-mainGray/20 transition-colors">
                <ion-icon name="arrow-back" class="text-xl"></ion-icon>
            </a>
            <h1 class="text-2xl font-bold">Edit Profil</h1>
        </div>

        <div class="bg-secondBg p-8 rounded-3xl shadow-lg border border-mainGray/10">
            
            <form action="/update" method="POST" enctype="multipart/form-data" class="space-y-6">
                
                <div class="flex flex-col items-center justify-center mb-6">
                    <div class="relative group cursor-pointer">
                        <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-mainBg shadow-md">
                            <img id="profile-preview" 
                                 src="<?= $user['user_pict'] ? '/assets/' . $user['user_pict'] : '/assets/default.jpg' ?>" 
                                 class="w-full h-full object-cover transition-opacity group-hover:opacity-75">
                        </div>
                        
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <ion-icon name="camera" class="text-3xl text-white drop-shadow-md"></ion-icon>
                        </div>

                        <input type="file" name="user_pict" id="user_pict" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*" onchange="previewImage(this)">
                    </div>
                    <p class="text-xs text-mainGray mt-3">Klik foto untuk mengganti</p>
                </div>

                <div>
                    <label class="block text-sm font-bold text-mainText mb-2 ml-1">Nama Tampilan</label>
                    <input type="text" name="user_display" value="<?= htmlspecialchars($user['user_display'] ?? '') ?>"
                        class="w-full bg-mainBg border border-mainGray/30 rounded-xl px-4 py-3 text-mainText focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-all placeholder-mainGray/50"
                        placeholder="Nama panggilan Anda">
                </div>

                <div>
                    <label class="block text-sm font-bold text-mainText mb-2 ml-1">Bio</label>
                    <textarea name="user_bio" rows="3"
                        class="w-full bg-mainBg border border-mainGray/30 rounded-xl px-4 py-3 text-mainText focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-all resize-none placeholder-mainGray/50"
                        placeholder="Ceritakan sedikit tentang diri Anda..." maxlength="50"><?= htmlspecialchars($user['user_bio'] ?? '') ?></textarea>
                </div>

                <div class="border-t border-mainGray/20 my-6"></div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    
                    <div>
                        <label class="block text-xs font-bold text-mainGray uppercase mb-2 ml-1">Username</label>
                        <div class="relative">
                            <input type="text" value="@<?= htmlspecialchars($user['username'] ?? '') ?>" disabled
                                class="w-full bg-mainGray/10 border border-transparent rounded-xl px-4 py-3 text-mainGray cursor-not-allowed select-none">
                            <ion-icon name="lock-closed" class="absolute right-4 top-1/2 -translate-y-1/2 text-mainGray/50"></ion-icon>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-mainGray uppercase mb-2 ml-1">Email</label>
                        <div class="relative">
                            <input type="email" value="<?= htmlspecialchars($user['user_email'] ?? '') ?>" disabled
                                class="w-full bg-mainGray/10 border border-transparent rounded-xl px-4 py-3 text-mainGray cursor-not-allowed select-none">
                            <ion-icon name="lock-closed" class="absolute right-4 top-1/2 -translate-y-1/2 text-mainGray/50"></ion-icon>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-4 mt-8 pt-4">
                    <a href="/profile" class="flex-1 py-3 text-center text-mainText font-bold rounded-xl border border-mainGray/30 hover:bg-mainGray/10 transition-colors">
                        Batal
                    </a>
                    <button type="submit" class="flex-1 py-3 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transition-transform active:scale-95">
                        Simpan Perubahan
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>