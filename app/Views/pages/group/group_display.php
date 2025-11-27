<?php 
    // 1. Panggil Template Utama
    include __DIR__ . '/../../template/header.php'; 
    include __DIR__ . '/../../partials/MainHeader.php'; 
    include __DIR__ . '/../../template/sidebar.php';
    
    // 2. AMBIL DATA
    // Jika controller tidak mengirim data group (null), maka defaultnya array kosong []
    $group = $model['group'] ?? []; 
    $posts = $model['posts'] ?? [];
?>

<div class="min-h-screen bg-mainBg text-mainText pt-20 pb-24 md:pl-20 md:pt-4 transition-colors duration-300">
    
    <div class="max-w-2xl mx-auto">

        <?php if (empty($group)): ?>
            
            <div class="flex flex-col items-center justify-center h-[70vh] text-center px-6 animate-fade-in">
                <div class="w-24 h-24 bg-mainGray/10 rounded-full flex items-center justify-center mb-6 border border-mainGray/20">
                    <ion-icon name="people-circle-outline" class="text-6xl text-mainGray"></ion-icon>
                </div>
                
                <h2 class="text-2xl font-bold text-mainText mb-2">Belum Tergabung</h2>
                <p class="text-mainGray text-lg max-w-sm leading-relaxed">
                    Belum ada grup yang Anda masuki.<br>
                    Silahkan <span class="text-blue-500 font-bold">cari Grup</span> pada menu sidebar!
                </p>

                <a href="/explore" class="mt-8 px-8 py-3 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-full transition-all shadow-lg shadow-blue-600/20 active:scale-95">
                    Cari Grup
                </a>
            </div>

        <?php else: ?>

            <div class="mb-6 border-b border-mainGray/20 pb-4">
                <div class="px-4 pt-6 flex justify-between items-start">
                    <div class="flex gap-4 items-center">
                        <div class="w-20 h-20 rounded-2xl bg-gray-800 overflow-hidden shadow-sm">
                            <img src="<?= $group['icon'] ?? '/assets/default_group.jpg' ?>" class="w-full h-full object-cover">
                        </div>
                        <div>
                            <h1 class="text-xl md:text-2xl font-bold text-mainText">
                                <?= $group['name'] ?? 'Nama Grup' ?>
                            </h1>
                            <p class="text-mainGray text-sm flex items-center gap-1 mt-1">
                                <ion-icon name="people"></ion-icon> 
                                <?= $group['member_count'] ?? '0' ?> Anggota
                            </p>
                        </div>
                    </div>
                    <div>
                        <button class="px-6 py-2 bg-red-600 hover:bg-red-500 text-white text-sm font-bold rounded-full transition-all active:scale-95 shadow-md shadow-red-600/20">
                            Keluar
                        </button>
                    </div>
                </div>

                <div class="flex mt-6 px-4 text-sm font-medium text-mainGray overflow-x-auto scrollbar-hide gap-6">
                    <button class="pb-3 text-blue-500 border-b-2 border-blue-500 whitespace-nowrap font-bold">Postingan</button>
                    <button class="pb-3 hover:text-mainText whitespace-nowrap transition-colors">Anggota</button>
                </div>
            </div>

            <div class="pt-6 pb-20 flex flex-col">
                <?php if (!empty($posts)): ?>
                    <?php foreach ($posts as $d): ?>
                    <div class="flex flex-col p-5 border-b border-mainGray hover:bg-mainGray/5 transition-colors">
                        
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-10 h-10 rounded-full bg-gray-300 overflow-hidden shrink-0">
                                <?php if(!empty($d['user_pict'])): ?>
                                    <img src="<?= htmlspecialchars($d['user_pict']) ?>" class="w-full h-full object-cover">
                                <?php else: ?>
                                    <ion-icon name="person" class="w-full h-full p-2 text-gray-500 bg-gray-200"></ion-icon>
                                <?php endif; ?>
                            </div>
                            <div class="flex flex-col leading-tight">
                                <div class="flex items-center gap-1">
                                    <p class="font-bold text-mainText text-sm hover:underline cursor-pointer">
                                        <?= htmlspecialchars($d['username']); ?>
                                    </p>
                                    <ion-icon name="checkmark-circle" class="text-blue-500 text-sm"></ion-icon>
                                </div>
                                <div class="flex items-center gap-1 text-xs text-gray-500">
                                    <p>@<?= strtolower(htmlspecialchars($d['username'])); ?></p>
                                    <span class="text-[10px]">•</span>
                                    <p class="hover:underline cursor-pointer"><?= strtolower(htmlspecialchars($d['time'])); ?></p>
                                </div>
                            </div>
                            <div class="flex-grow"></div>
                            <button class="text-mainText hover:bg-blue-500/10 hover:text-blue-500 p-2 rounded-full transition-colors">
                                <ion-icon name="ellipsis-horizontal"></ion-icon>
                            </button>
                        </div>

                        <p onclick="openComment('<?= $d['id'] ?? rand(1,100) ?>', '<?= htmlspecialchars($d['username']) ?>', `<?= htmlspecialchars($d['caption']) ?>`)"
                            class="text-mainText text-[15px] mb-3 leading-relaxed whitespace-pre-line cursor-pointer hover:opacity-75 transition-opacity">
                            <?= htmlspecialchars($d['caption']) ?>
                        </p>

                        <?php if(!empty($d['media_url'])): ?>
                        <div class="rounded-2xl overflow-hidden border border-mainGray bg-black/5">
                            <img src="<?= htmlspecialchars($d['media_url']) ?>" alt="Meme"
                                onclick="openImageModal('<?= htmlspecialchars($d['media_url']) ?>')"
                                class="w-full h-auto max-h-[600px] object-contain hover:opacity-95 transition-opacity cursor-pointer">
                        </div>
                        <?php endif; ?>

                        <?php 
                            if(file_exists(__DIR__ . '/../../partials/Interact.php')) {
                                require __DIR__ . '/../../partials/Interact.php'; 
                            }
                        ?>

                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="py-20 text-center text-mainText/50 flex flex-col items-center">
                        <ion-icon name="images-outline" class="text-5xl mb-4 opacity-50"></ion-icon>
                        <p>Belum ada meme yang tersedia di grup ini.</p>
                    </div>
                <?php endif; ?>
            </div>

        <?php endif; ?> </div>
</div>