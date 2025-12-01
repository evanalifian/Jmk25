<?php 
    $menus = $model['menus'] ?? [];
    $currentMenu = $menus[0] ?? ['text' => 'Menu', 'url' => '#', 'active' => false]; 
    
    foreach ($menus as $menu) {
        if (isset($menu['active']) && $menu['active'] === true) {
            $currentMenu = $menu;
            break;
        }
    }
    
    $menuCount = count($menus);
    $isDropdownDisabled = ($menuCount <= 1);

    $currentPath = strtok($_SERVER['REQUEST_URI'], '?');
    
    $showBackButton = ($currentPath !== '/' && $currentPath !== '/index.php');
?>

<header class="sticky top-0 z-50 w-full bg-mainBg/90 backdrop-blur-md transition-colors duration-300">

  <div class="flex items-center justify-center h-16 relative max-w-2xl mx-auto px-4">

    <?php if ($showBackButton): ?>
    <a href="javascript:history.back()"
      class="absolute left-4 w-10 h-10 rounded-full flex items-center justify-center hover:bg-mainGray/20 transition-colors cursor-pointer text-mainText">
      <ion-icon name="arrow-back" class="text-xl"></ion-icon>
    </a>
    <?php endif; ?>
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

  </div>
</header>