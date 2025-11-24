<main class="max-w-2xl mx-auto min-h-screen flex flex-col">
  
  <div class="sticky top-0 z-50 shrink-0 backdrop-blur-md">
    <?php require_once __DIR__ . '/../../partials/MainHeader.php'; ?>
  </div>
  
  <div class="flex-1 mt-2 bg-secondBg rounded-t-[2.5rem] relative shadow-[inner_0_10px_20px_rgba(0,0,0,0.05)] pb-10">
    
    <div class="pt-6 pb-20 flex flex-col">
      <?php if ($model["data"]): ?>
      <?php foreach ($model["data"] as $d): ?>

      <div class="flex flex-col p-5 border-b border-mainGray hover:bg-mainGray/5 transition-colors">

        <div class="flex items-center gap-3 mb-2">
          <div class="w-10 h-10 rounded-full bg-gray-300 overflow-hidden shrink-0">
            <ion-icon name="person" class="w-full h-full p-2 text-gray-500 bg-gray-200"></ion-icon>
          </div>
          <div class="flex flex-col leading-tight">
            <div class="flex items-center gap-1">
              <p class="font-bold text-mainText text-sm hover:underline cursor-pointer">
                <?= htmlspecialchars($d['user_display']); ?>
              </p>
              <ion-icon name="checkmark-circle" class="text-blue-500 text-sm"></ion-icon>
            </div>
            <div class="flex items-center gap-1 text-xs text-gray-500">
              <p>@<?= strtolower(htmlspecialchars($d['username'])); ?></p>
              <span class="text-[10px]">•</span>
              <p class="hover:underline cursor-pointer"><?= strtolower(htmlspecialchars($d['upload_created_at'])); ?></p>
            </div>
          </div>
          <div class="flex-grow"></div>
          <button class="text-mainText hover:bg-blue-500/10 hover:text-blue-500 p-2 rounded-full transition-colors">
            <ion-icon name="ellipsis-horizontal"></ion-icon>
          </button>
        </div>

        <p onclick="openComment(
            '<?= $d['id'] ?? rand(1,100) ?>', 
            '<?= htmlspecialchars($d['username']) ?>', 
            `<?= htmlspecialchars($d['upload_caption']) ?>`
          )"
          class="text-mainText text-[15px] mb-3 leading-relaxed whitespace-pre-line cursor-pointer hover:opacity-75 transition-opacity">
          <?= htmlspecialchars($d['upload_caption']) ?>
        </p>

        <div class="rounded-2xl overflow-hidden border border-mainGray bg-black/5">
          <img src="<?= htmlspecialchars($d['foto_img_url']) ?>" alt="Meme"
            onclick="openImageModal('<?= htmlspecialchars($d['foto_img_url']) ?>')"
            class="w-full h-auto max-h-[600px] object-contain hover:opacity-95 transition-opacity cursor-pointer">
        </div>

        <?php require __DIR__ . '/../../partials/Interact.php'; ?>

      </div>
      <?php endforeach; ?>
      <?php else: ?>

      <div class="py-20 text-center text-mainText/50 flex flex-col items-center">
        <ion-icon name="images-outline" class="text-5xl mb-4 opacity-50"></ion-icon>
        <p>Belum ada meme yang tersedia saat ini.</p>
      </div>

      <?php endif; ?>

    </div>
  </div>

  <?php require_once __DIR__ . '/../../partials/ImageModal.php'; ?>
  <?php require_once __DIR__ . '/../../partials/Comment.php'; ?>

</main>