<?php 
    $menus = $model['menus'] ?? [];
    $currentMenu = $menus[0]; 
    
    foreach ($menus as $menu) {
        if (isset($menu['active']) && $menu['active'] === true) {
            $currentMenu = $menu;
            break;
        }
    }
    
    $menuCount = count($menus);
    $isDropdownDisabled = ($menuCount <= 1);
?>

<header class="sticky top-0 z-50 w-full bg-mainBg/90 backdrop-blur-md transition-colors duration-300">

  <div class="flex items-center justify-center h-16 relative max-w-2xl mx-auto">

    <div id="dropdownButton" class="group flex items-center gap-2 px-4 py-2 rounded-full transition-all cursor-pointer select-none 
      <?= $isDropdownDisabled ? 'pointer-events-none' : 'hover:bg-mainGray/20' ?>">

      <span class="text-lg font-bold text-mainText">
        <?= htmlspecialchars($currentMenu['text']) ?>
      </span>

      <?php if (!$isDropdownDisabled): ?>
      <div class="w-5 h-5 rounded-full border border-mainGray flex items-center justify-center">
        <ion-icon name="chevron-down" class="text-xs text-mainText"></ion-icon>
      </div>
      <?php endif; ?>

    </div>

    <?php if (!$isDropdownDisabled): ?>
    <div id="dropdownMenu"
      class="hidden absolute top-14 left-1/2 -translate-x-1/2 bg-secondBg border border-mainGray rounded-2xl shadow-2xl w-56 z-50 overflow-hidden">
      <div class="py-1">
        <?php foreach ($menus as $menu): ?>
        <a href="<?= htmlspecialchars($menu['url']) ?>"
          class="flex items-center justify-between px-4 py-3 text-sm text-mainText hover:bg-mainGray/20 transition-colors">
          <span class="<?= $menu['active'] ? 'font-bold' : 'font-medium' ?>">
            <?= htmlspecialchars($menu['text']) ?>
          </span>
          <?php if($menu['active']): ?>
          <div class="border-sm border-mainText rounded-[50%]">
            <ion-icon name="checkmark-circle" class="text-lg text-accent"></ion-icon>
          </div>
          <?php endif; ?>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endif; ?>

    <div
      class="absolute right-4 w-5 h-5 flex items-center justify-center text-mainGray/60 border border-mainGray rounded-full hover:bg-mainGray/20 hover:text-mainText transition-colors cursor-pointer">
      <ion-icon name="ellipsis-horizontal" class="text-sm"></ion-icon>
    </div>

  </div>
</header>