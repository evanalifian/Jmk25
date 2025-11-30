<?php
$group = $model['group'] ?? [];
$posts = $model['posts'] ?? [];
$members = $model['members'] ?? [];
$myId = $model['current_user_id'] ?? 0; // ID yang sedang login
?>

<main class="max-w-2xl mx-auto min-h-screen flex flex-col">

  <div class="sticky top-0 z-50 shrink-0 backdrop-blur-md">
    <?php require_once __DIR__ . '/../../partials/MainHeader.php'; ?>
  </div>
  <?php if (empty($group)): ?>
  <div class="flex flex-col items-center justify-center h-[70vh] text-center px-6">
    <h2 class="text-2xl font-bold text-mainText mb-2">Belum Tergabung</h2>
    <p class="text-mainGray text-lg max-w-sm leading-relaxed">
      Belum ada grup yang Anda masuki.<br>
      Silahkan <span class="text-blue-500 font-bold">cari Grup</span> pada menu sidebar!
    </p>
    <a href="/explore"
      class="mt-8 px-8 py-3 bg-blue-600 hover:bg-blue-500 text-white font-bold rounded-full transition-all shadow-lg shadow-blue-600/20 active:scale-95">
      Cari Grup
    </a>
  </div>

  <?php else: ?>

  <div class="mb-0 border-b border-mainGray/20 pb-0 bg-mainBg top-16 z-30">
    <div class="px-4 pt-6 flex justify-between items-start mb-4">
      <div class="flex gap-4 items-center">
        <div class="w-20 h-20 rounded-2xl bg-gray-800 overflow-hidden shadow-sm border border-mainGray/20">
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

      <?php if ($myId != $group['owner_id']): ?>
      <div>
        <form action="/group/leave" method="POST" onsubmit="return confirm('Yakin ingin keluar?');">
          <input type="hidden" name="group_id" value="<?= $group['id'] ?>">
          <button type="submit"
            class="px-6 py-2 bg-red-600 hover:bg-red-500 text-white text-sm font-bold rounded-full transition-all shadow-md active:scale-95">
            Keluar
          </button>
        </form>
      </div>
      <?php endif; ?>

    </div>

    <div class="flex px-4 text-sm font-medium text-mainGray gap-6">
      <button onclick="switchView('posts')" id="tab-posts"
        class="pb-3 text-blue-500 border-b-2 border-blue-500 transition-all">Postingan</button>
      <button onclick="switchView('members')" id="tab-members"
        class="pb-3 hover:text-mainText border-b-2 border-transparent transition-all">Anggota</button>
    </div>
  </div>

  <div class="flex-1 mt-2 bg-secondBg rounded-t-[2.5rem] relative shadow-[inner_0_10px_20px_rgba(0,0,0,0.05)] pb-10">

    <div id="view-posts" class="animate-fade-in pt-6 pb-20 flex flex-col">
      <?php if (!empty($posts)): ?>
      <?php foreach ($posts as $d): ?>
      <div class="flex flex-col p-5 border-b border-mainGray hover:bg-mainGray/5 transition-colors">
        <div class="flex items-center gap-3 mb-2">
          <div class="w-10 h-10 rounded-full bg-gray-300 overflow-hidden shrink-0">
            <img src="<?= htmlspecialchars($d['user_pict']) ?>" class="w-full h-full object-cover">
          </div>
          <div class="flex flex-col leading-tight">
            <p class="font-bold text-mainText text-sm"><?= htmlspecialchars($d['username']); ?></p>
            <span class="text-xs text-mainGray"><?= htmlspecialchars($d['time']); ?></span>
          </div>
        </div>
        <p class="text-mainText text-[15px] mb-3"><?= htmlspecialchars($d['caption']) ?></p>
        <?php if (!empty($d['media_url'])): ?>
        <div class="rounded-2xl overflow-hidden border border-mainGray bg-black/5">
          <img src="<?= htmlspecialchars($d['media_url']) ?>" class="w-full h-auto max-h-[500px] object-contain">
        </div>
        <?php endif; ?>
        <?php if (file_exists(__DIR__ . '/../../partials/Interact.php'))
                                    require __DIR__ . '/../../partials/Interact.php'; ?>
      </div>
      <?php endforeach; ?>
      <?php else: ?>
      <div class="py-20 text-center text-mainText/50 flex flex-col items-center">
        <p>Belum ada postingan.</p>
      </div>
      <?php endif; ?>
    </div>

    <div id="view-members" class="hidden animate-fade-in px-4 pt-6">

      <h3 class="font-bold text-sm text-blue-500 uppercase tracking-wide mb-3 px-2">Pemilik Grup</h3>
      <div class="space-y-3 mb-6">
        <?php foreach ($members as $m): ?>
        <?php if ($m['id'] == $group['owner_id']): ?>
        <div class="flex items-center justify-between p-3 rounded-xl hover:bg-mainGray/5 transition-colors">
          <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-full bg-gray-700 overflow-hidden relative border-2 border-yellow-500">
              <img src="https://i.pinimg.com/736x/0b/07/50/0b0750a69b4812b8bc68688808d38e40.jpg"
                class="w-full h-full object-cover">
            </div>
            <div>
              <p class="font-bold text-mainText text-sm flex items-center gap-1">
                <?= $m['name'] ?>
                <ion-icon name="star" class="text-yellow-500 text-xs"></ion-icon>
              </p>
              <p class="text-xs text-mainGray">@<?= $m['username'] ?></p>
            </div>
          </div>
          <span class="text-xs font-bold text-yellow-500 bg-yellow-500/10 px-3 py-1 rounded-full">Owner</span>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>
      </div>

      <h3 class="font-bold text-sm text-mainGray uppercase tracking-wide mb-3 px-2">Anggota Lainnya</h3>
      <div class="space-y-1">
        <?php foreach ($members as $m): ?>
        <?php if ($m['id'] != $group['owner_id']): ?>

        <div class="flex items-center justify-between p-3 rounded-xl hover:bg-mainGray/5 transition-colors group">

          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-gray-700 overflow-hidden">
              <img src="https://i.pinimg.com/1200x/8d/e5/84/8de5841f06b0eefb417b54634ac7b8d2.jpg"
                class="w-full h-full object-cover">
            </div>
            <div>
              <p class="font-medium text-mainText text-sm"><?= $m['name'] ?></p>
              <p class="text-xs text-mainGray">@<?= $m['username'] ?></p>
            </div>
          </div>

          <?php if ($myId == $group['owner_id']): ?>

          <form action="/group/kick" method="POST"
            onsubmit="return confirm('Keluarkan @<?= $m['username'] ?> dari grup?');">
            <input type="hidden" name="group_id" value="<?= $group['id'] ?>">
            <input type="hidden" name="member_id" value="<?= $m['id'] ?>">

            <button type="submit"
              class="text-xs font-bold px-3 py-1.5 rounded-lg border border-red-500/30 text-red-500 hover:bg-red-500 hover:text-white transition-colors opacity-0 group-hover:opacity-100">
              Keluarkan
            </button>
          </form>

          <?php endif; ?>

        </div>
        <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </div>

  </div>

  <?php endif; ?>
  </div>
</main>