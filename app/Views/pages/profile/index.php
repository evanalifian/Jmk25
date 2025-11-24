
<main class="max-w-2xl mx-auto min-h-screen flex flex-col">
  
  <div class="sticky top-0 z-50 shrink-0  backdrop-blur-md">
    <?php require_once __DIR__ . '/../../partials/MainHeader.php'; ?>
    </div>
    
    <div class="flex-1 mt-2 bg-secondBg rounded-t-[2.5rem] relative shadow-[inner_0_10px_20px_rgba(0,0,0,0.05)] pb-10">
      
      <div class="flex flex-col min-h-full">
        
        <div class="pt-8 pb-2 flex flex-col">

          <div class="flex gap-5 px-6">
            
            <div class="w-20 h-20 rounded-full bg-gray-800 border-2 border-mainGray shrink-0 overflow-hidden">
              <img src="https://api.dicebear.com/9.x/avataaars/svg?seed=Felix" class="w-full h-full object-cover">
            </div>

            <div class="flex-1 flex flex-col">

              <div class="flex justify-between items-start">
                <div>
                  <?php if ($model["data"]): ?>
                  <?php foreach ($model["data"] as $k => $v): ?>
                  <h2 class="text-xl font-bold text-mainText leading-tight"><?= $v['user_display']?></h2>
                  <p class="text-sm text-mainGray"><?= $v['username'] ?></p>
                </div>
                
                <button class="p-1 rounded-full hover:bg-mainGray/10 text-mainText transition-colors">
                  <ion-icon name="ellipsis-horizontal" class="text-xl"></ion-icon>
                </button>
              </div>

              <p class="mt-2 text-[13px] text-mainText leading-snug"><?= $v['user_bio'] ?></p>

              <div class="flex gap-5 mt-3 text-xs text-mainText font-medium">
                <div class="cursor-pointer hover:underline flex gap-1">
                  <span class="font-bold">142</span> <span class="opacity-60">Post</span>
                </div>
                <div class="cursor-pointer hover:underline flex gap-1">
                  <span class="font-bold">10</span> <span class="opacity-60">Following</span>
                </div>
                <div class="cursor-pointer hover:underline flex gap-1">
                  <span class="font-bold">8.5K</span> <span class="opacity-60">Followers</span>
                </div>
              </div>
            </div>
          </div>
          <div class="flex w-full border-b border-mainGray mt-6">
            <div
              class="flex-1 py-3 flex justify-center items-center cursor-pointer border-b-2 border-mainText transition-colors hover:bg-mainGray/5">
            </div>
            <div
              class="flex-1 py-3 flex justify-center items-center cursor-pointer transition-colors hover:bg-mainGray/5">
              <ion-icon name="save-outline" class="text-xl text-mainGray"></ion-icon>
            </div>
          </div>
        </div>

        <div class="pb-20 flex flex-col">


              <div class="flex flex-col p-5 border-b border-mainGray hover:bg-mainGray/5 transition-colors">

                <div class="flex items-center gap-3 mb-2">
                  <div class="w-10 h-10 rounded-full bg-gray-300 overflow-hidden shrink-0">
                    <ion-icon name="person" class="w-full h-full p-2 text-gray-500 bg-gray-200"></ion-icon>
                  </div>
                  <div class="flex flex-col leading-tight">
                    <div class="flex items-center gap-1">
                      <p class="font-bold text-mainText text-sm hover:underline cursor-pointer">
                        <?= htmlspecialchars($v['user_display']); ?>
                      </p>
                      <ion-icon name="checkmark-circle" class="text-blue-500 text-sm"></ion-icon>
                    </div>
                    <div class="flex items-center gap-1 text-xs text-gray-500">
                      <p>@<?= strtolower(htmlspecialchars($v['username'])); ?></p>
                      <span class="text-[10px]">•</span>
                      <p class="hover:underline cursor-pointer"><?= strtolower(htmlspecialchars($v['upload_created_at'])); ?>
                      </p>
                    </div>
                  </div>
                  <div class="flex-grow"></div>
                  <button class="text-mainText hover:bg-blue-500/10 hover:text-blue-500 p-2 rounded-full transition-colors">
                    <ion-icon name="ellipsis-horizontal"></ion-icon>
                  </button>
                </div>

                <p onclick="openComment(
            '<?= $v['id'] ?? rand(1, 100) ?>', 
            '<?= htmlspecialchars($v['username']) ?>', 
            `<?= htmlspecialchars($v['upload_caption']) ?>`
          )"
                  class="text-mainText text-[15px] mb-3 leading-relaxed whitespace-pre-line cursor-pointer hover:opacity-75 transition-opacity">
                  <?= htmlspecialchars($v['upload_caption']) ?>
                </p>

                <div class="rounded-2xl overflow-hidden border border-mainGray bg-black/5">
                  <img src="<?= htmlspecialchars($v['foto_img_url']) ?>" alt="Meme"
                    onclick="openImageModal('<?= htmlspecialchars($v['foto_img_url']) ?>')"
                    class="w-full h-auto max-h-[600px] object-contain hover:opacity-95 transition-opacity cursor-pointer">
                </div>

                <?php require __DIR__ . '/../../partials/Interact.php'; ?>

              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="py-20 text-center text-mainText/50">Belum ada meme.</div>
          <?php endif; ?>
        </div>
      </div>
    </div>
</main>
