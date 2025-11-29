<?php 
if(isset($_SESSION['login']['id_user'])){
    $userId = $_SESSION['login']['id_user'];
} else {
    $userId = 0;
}

$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$isHomeActive = ($currentPath === '/' || $currentPath === '/index.php'); // Check if it's the home path

function getIconName($path, $name, $currentPath) {
    $isActive = (strpos($currentPath, $path) === 0 && $path !== '/') || ($path === '/' && ($currentPath === '/' || $currentPath === '/index.php'));
    
    return $isActive ? $name : $name . '-outline';
}

?>
<nav id="sidebar-nav"
  class="fixed z-40 transition-all duration-300 bg-mainBg
            -bottom-2 left-0 w-full h-16 flex flex-row justify-between items-center
            md:border-t-0 md:top-0 md:h-screen md:w-auto md:px-4 md:py-3 md:flex-col md:space-y-2 border-t border-gray-800">

  <a href="/" class="hidden md:block p-3 mb-2 opacity-80 hover:opacity-100 transition-opacity outline-none">
    <img class="app-logo-img w-12 h-8 object-contain" src="/assets/logo.png" alt="Logo">
  </a>

  <div class="hidden md:block flex-grow"></div>

  <div class="w-full flex flex-row justify-around items-center md:flex-col md:w-auto md:space-y-4">

    <a href="/" id="nav-home" class="sidebar-icon group p-3 duration-300 transition-colors outline-none 
            <?= $isHomeActive ? 'text-mainText' : '' ?>">
      <ion-icon name="<?= getIconName('/', 'home', $currentPath); ?>"
        class="text-3xl <?= $isHomeActive ? 'text-mainText' : 'text-mainGray group-hover:text-mainText' ?> transition-colors">
      </ion-icon>
    </a>


    <a href="/group" id="nav-grup" class="sidebar-icon group p-3 duration-300 transition-colors outline-none">
      <ion-icon name="<?= getIconName('/group', 'people', $currentPath); ?>"
        class="text-3xl text-mainGray group-hover:text-mainText transition-colors">
      </ion-icon>
    </a>

    <a href="/explore" id="nav-search" class="sidebar-icon group p-3 duration-300 transition-colors outline-none">
      <ion-icon name="<?= getIconName('/search', 'search', $currentPath); ?>"
        class="text-3xl text-mainGray group-hover:text-mainText transition-colors">
      </ion-icon>
    </a>

    <a href="/create" id="nav-add" class="sidebar-icon group p-3 duration-300 transition-colors outline-none">
      <ion-icon name="<?= getIconName('/create', 'add-circle', $currentPath); ?>"
        class="text-[2.1rem] text-mainGray group-hover:text-mainText transition-colors"></ion-icon>
    </a>

    <a href="bookmark" id="nav-bookmark" class="sidebar-icon group p-3 duration-300 transition-colors outline-none">
      <ion-icon name="<?= getIconName('/bookmark', 'bookmark', $currentPath); ?>"
        class="text-3xl text-mainGray group-hover:text-mainText transition-colors">
      </ion-icon>
    </a>

    <a href="/profile" id="nav-person" class="sidebar-icon group p-3 duration-300 transition-colors outline-none">
      <ion-icon name="<?= getIconName('/profile', 'person', $currentPath); ?>"
        class="text-3xl text-mainGray group-hover:text-mainText transition-colors">
      </ion-icon>
    </a>

  </div>

  <div class="hidden md:block flex-grow"></div>

  <div class="hidden md:flex flex-col items-center space-y-2 mb-4">

    <div class="relative">

      <?php require_once __DIR__ . '/../partials/SidebarModal.php'; ?>

      <button id="menuTrigger" onclick="toggleMenu()"
        class="sidebar-icon group p-3 duration-300 transition-colors cursor-pointer outline-none block">
        <ion-icon name="menu-outline" class="text-3xl text-mainGray group-hover:text-mainText transition-colors">
        </ion-icon>
      </button>

    </div>

  </div>
</nav>

<script>
function toggleMenu() {
  const popup = document.getElementById('menuPopup');

  if (!popup) {
    console.error("Element #menuPopup tidak ditemukan! Cek path require_once PHP nya.");
    return;
  }

  if (popup.classList.contains('hidden')) {
    popup.classList.remove('hidden');
    setTimeout(() => {
      popup.classList.remove('opacity-0', 'scale-95', 'translate-y-2');
      popup.classList.add('opacity-100', 'scale-100', 'translate-y-0');
    }, 10);
  } else {
    popup.classList.add('opacity-0', 'scale-95', 'translate-y-2');
    popup.classList.remove('opacity-100', 'scale-100', 'translate-y-0');
    setTimeout(() => {
      popup.classList.add('hidden');
    }, 200);
  }
}

window.addEventListener('click', function(e) {
  const popup = document.getElementById('menuPopup');
  const trigger = document.getElementById('menuTrigger');

  if (popup && trigger && !trigger.contains(e.target) && !popup.contains(e.target)) {
    if (!popup.classList.contains('hidden')) {
      toggleMenu();
    }
  }
});
</script>