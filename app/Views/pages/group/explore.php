<?php

$groups = $model['groups'] ?? [];
$users = $model['users'] ?? [];
$users_explore = $model['users_explore'] ?? [];

?>

<main class="max-w-2xl mx-auto min-h-screen flex flex-col">

  <div class="sticky top-0 z-50 shrink-0 backdrop-blur-md">
    <?php require_once __DIR__ . '/../../partials/MainHeader.php'; ?>
  </div>

  <div class="mb-6 relative">
    <form action="/explore" method="post">
      <input type="text" name="explore" placeholder="Cari grup atau teman..."
        class="w-full rounded-full py-3 px-12 focus:outline-none transition-all border border-transparent focus:border-[var(--accent)] placeholder-opacity-60"
        style="background-color: var(--secondBg); color: var(--mainText);">
    </form>

    <ion-icon name="search-outline" class="absolute left-4 top-1/2 -translate-y-1/2 text-xl"
      style="color: var(--mainText); opacity: 0.5;"></ion-icon>
  </div>


  <?php if (!$users_explore): ?>
    <div class="flex p-1 rounded-full mb-8 relative" style="background-color: var(--secondBg);">

      <div id="tab-slider"
        class="absolute left-1 top-1 bottom-1 w-[49%] rounded-full transition-all duration-300 z-0 shadow-sm"
        style="background-color: var(--mainText);"></div>

      <button onclick="switchTab('groups')" id="btn-groups"
        class="flex-1 py-2 text-center text-sm font-bold relative z-10 transition-all duration-300"
        style="color: var(--mainBg);"> Grup Komunitas
      </button>

      <button onclick="switchTab('users')" id="btn-users"
        class="flex-1 py-2 text-center text-sm font-bold relative z-10 transition-all duration-300"
        style="color: var(--mainText); opacity: 0.9;"> Teman Baru
      </button>
    </div>
    <div id="section-groups" class="animate-fade-in">
      <h2 class="font-bold text-xl mb-4 pl-2 flex items-center gap-2">
        <ion-icon name="people-circle-outline" class="text-2xl" style="color: var(--accent);"></ion-icon>
        Grup Rekomendasi
      </h2>

      <div class="space-y-3">
        <?php foreach ($groups as $grp): ?>
          <div class="flex items-center justify-between p-2 pr-4 rounded-full transition-all hover:brightness-110"
            style="background-color: var(--secondBg);">

            <div class="flex items-center gap-4">
              <div class="w-12 h-12 rounded-full overflow-hidden border-2" style="border-color: var(--mainBg);">
                <img src="<?= $grp['icon'] ?>" class="w-full h-full object-cover">
              </div>
              <div class="flex flex-col">
                <span class="font-bold text-lg leading-none tracking-wide" style="color: var(--mainText);">
                  <?= $grp['name'] ?>
                </span>
                <span class="text-xs mt-1" style="color: var(--mainText); opacity: 0.7;">
                  <?= $grp['desc'] ?>
                </span>
              </div>
            </div>

            <?php if ($grp['is_joined']): ?>

              <button disabled
                class="bg-gray-600 text-white px-6 py-2 rounded-full font-bold text-sm cursor-default opacity-80 border border-gray-500">
                Joined
              </button>

            <?php else: ?>

              <button onclick="handleJoin(this, '<?= $grp['id'] ?>')"
                class="bg-black text-white px-6 py-2 rounded-full font-bold text-sm hover:bg-gray-900 border border-gray-700 transition-transform active:scale-95">
                Join
              </button>

            <?php endif; ?>

          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div id="section-users" class="hidden animate-fade-in">
      <h2 class="font-bold text-xl mb-4 pl-2 flex items-center gap-2">
        <ion-icon name="person-add-outline" class="text-2xl" style="color: var(--accent);"></ion-icon>
        Teman Baru
      </h2>

      <div class="space-y-3">
        <?php foreach ($users as $usr): ?>
          <div class="flex items-center justify-between p-2 pr-4 rounded-full transition-all hover:brightness-110"
            style="background-color: var(--secondBg);">

            <div class="flex items-center gap-4">
              <div class="w-12 h-12 rounded-full overflow-hidden border-2" style="border-color: var(--mainBg);">
                <img src="<?= $usr['pict'] ?>" class="w-full h-full object-cover">
              </div>
              <div class="flex flex-col">
                <span class="font-bold text-lg leading-none" style="color: var(--mainText);">
                  <?= $usr['name'] ?>
                </span>
                <span class="text-xs mt-1" style="color: var(--mainText); opacity: 0.7;">
                  <?= $usr['username'] ?>
                </span>
              </div>
            </div>

            <?php if ($usr['is_followed']): ?>

              <button disabled
                class="px-6 py-2 rounded-full font-bold text-sm border transition-transform cursor-default opacity-100 text-white"
                style="background-color: var(--accent); border-color: var(--accent);">
                Followed
              </button>

            <?php else: ?>

              <button onclick="handleFollow(this, '<?= $usr['id'] ?>')"
                class="px-6 py-2 rounded-full font-bold text-sm border transition-transform active:scale-95 hover:brightness-110"
                style="border-color: var(--accent); color: var(--accent);">
                Follow
              </button>

            <?php endif; ?>

          </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php else: ?>
    <h2 class="font-bold text-xl mb-4 pl-2 flex items-center gap-2">Hasil pencarian</h2>
    <ul role="list" class="grid gap-x-8 gap-y-12 sm:grid-cols-2 sm:gap-y-16 xl:col-span-2">
      <?php foreach ($users_explore as $user): ?>
        <li>
          <div class="flex items-center gap-x-6">
            <img src="https://wallpapers.com/images/hd/placeholder-profile-icon-8qmjk1094ijhbem9.jpg" alt=""
              class="size-16 rounded-full outline-1 -outline-offset-1 outline-black/5 dark:outline-white/10" />
            <div>
              <h3 class="text-base/7 font-semibold tracking-tight text-gray-900 dark:text-white"><?= $user["username"] ?>
              </h3>
              <p class="text-sm/6 font-semibold text-indigo-600 dark:text-indigo-400"><?= $user["user_display"] ?></p>
            </div>
          </div>
        </li>
      <?php endforeach ?>
    </ul>
  <?php endif ?>


  <style>
    .animate-fade-in {
      animation: fadeIn 0.4s ease-out;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>