<main class="max-w-2xl mx-auto h-screen flex flex-col overflow-hidden">

  <div class="z-20 shrink-0">
    <?php require_once __DIR__ . '/../../partials/MainHeader.php'; ?>
  </div>

  <div
    class="flex-1 mt-2 bg-secondBg rounded-t-[2.5rem] overflow-y-auto relative shadow-[inner_0_10px_20px_rgba(0,0,0,0.05)] no-scrollbar">

    <div class="flex flex-col min-h-full">

      <div class="pt-8 pb-2 flex flex-col">

        <div class="flex gap-5 px-6">

          <div class="w-20 h-20 rounded-full bg-gray-800 border-2 border-mainGray shrink-0 overflow-hidden">
            <img src="https://api.dicebear.com/9.x/avataaars/svg?seed=Felix" class="w-full h-full object-cover">
          </div>

          <div class="flex-1 flex flex-col">

            <div class="flex justify-between items-start">
              <div>
                <h2 class="text-xl font-bold text-mainText leading-tight">Admin Jawara</h2>
                <p class="text-sm text-mainGray">@admin_jmk25</p>
              </div>

              <button class="p-1 rounded-full hover:bg-mainGray/10 text-mainText transition-colors">
                <ion-icon name="ellipsis-horizontal" class="text-xl"></ion-icon>
              </button>
            </div>

            <p class="mt-2 text-[13px] text-mainText leading-snug">
              Tukang repost meme dari internet. <br>
              Anak IT yang sukanya ngoding sambil ngopi ☕.
            </p>

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
            <ion-icon name="cube-outline" class="text-xl text-mainText"></ion-icon>
          </div>
          <div
            class="flex-1 py-3 flex justify-center items-center cursor-pointer transition-colors hover:bg-mainGray/5">
            <ion-icon name="save-outline" class="text-xl text-mainGray"></ion-icon>
          </div>
        </div>
      </div>

      <div class="pb-20 flex flex-col">

        <?php $memes = $model['data']['memes'] ?? []; ?>

        <?php if (!empty($memes)): ?>
        <?php foreach ($memes as $meme): ?>

        <div class="flex flex-col p-5 border-b border-mainGray hover:bg-mainGray/5 transition-colors">

          <div class="flex items-center gap-3 mb-2">
            <div class="w-10 h-10 rounded-full bg-gray-300 overflow-hidden shrink-0">
              <img src="https://api.dicebear.com/9.x/avataaars/svg?seed=<?= urlencode($meme['author']) ?>"
                class="w-full h-full object-cover">
            </div>
            <div class="flex flex-col leading-tight">
              <p class="font-bold text-mainText text-sm"><?= htmlspecialchars($meme['author']) ?></p>
              <p class="text-xs text-mainText/60">@<?= htmlspecialchars($meme['subreddit']) ?></p>
            </div>
          </div>

          <p class="text-mainText text-[15px] mb-3"><?= htmlspecialchars($meme['title']) ?></p>

          <div class="rounded-xl overflow-hidden border border-mainGray bg-black">
            <img src="<?= htmlspecialchars($meme['url']) ?>" class="w-full h-auto max-h-[500px] object-contain">
          </div>

          <div class="mt-3">
            <?php require __DIR__ . '/../../partials/Interact.php'; ?>
          </div>

        </div>

        <?php endforeach; ?>
        <?php else: ?>
        <div class="py-20 text-center text-mainText/50">Belum ada meme.</div>
        <?php endif; ?>

      </div>

    </div>
  </div>
</main>