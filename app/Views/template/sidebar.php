<nav id="sidebar-nav" class="fixed z-50 transition-all duration-300 bg-mainBg
            -bottom-2 left-0 w-full h-16 px-4 flex flex-row justify-between items-center
            md:border-t-0 md:top-0 md:h-screen md:w-auto md:px-4 md:py-3 md:flex-col md:space-y-2">

  <a href="#" class="hidden md:block p-3 mb-2 opacity-80 hover:opacity-100 transition-opacity">
    <img id="app-logo" class="w-10 h-8 object-contain" src="/assets/logowhite.png" alt="Logo">
  </a>

  <div class="hidden md:block flex-grow"></div>

  <div class="w-full flex flex-row justify-around items-center md:flex-col md:w-auto md:space-y-4">

    <a href="/" id="nav-home" data-icon="home" class="sidebar-icon group p-3 duration-300 transition-colors">
      <ion-icon name="home" class="text-3xl text-mainText transition-colors"></ion-icon>
    </a>

    <a href="/search" id="nav-search" data-icon="search" class="sidebar-icon group p-3 duration-300 transition-colors">
      <ion-icon name="search-outline" class="text-3xl text-mainGray group-hover:text-mainText transition-colors">
      </ion-icon>
    </a>

    <a href="/create" id="nav-add" data-icon="add-circle"
      class="sidebar-icon group p-3 duration-300 transition-colors">
      <ion-icon name="add-circle-outline"
        class="text-[2.1rem] text-mainGray group-hover:text-mainText transition-colors"></ion-icon>
    </a>

    <a href="/notifications" id="nav-notifications" data-icon="notifications"
      class="sidebar-icon group p-3 duration-300 transition-colors">
      <ion-icon name="notifications-outline" class="text-3xl text-mainGray group-hover:text-mainText transition-colors">
      </ion-icon>
    </a>

    <a href="/profile" id="nav-person" data-icon="person" class="sidebar-icon group p-3 duration-300 transition-colors">
      <ion-icon name="person-outline" class="text-3xl text-mainGray group-hover:text-mainText transition-colors">
      </ion-icon>
    </a>

  </div>

  <div class="hidden md:block flex-grow"></div>

  <div class="hidden md:flex flex-col items-center space-y-2 mb-2">

    <button class="theme-toggle-btn group p-3 cursor-pointer flex items-center justify-center transition-colors">
      <ion-icon name="moon-outline"
        class="text-3xl text-mainGray group-hover:text-mainText transition-transform duration-500 rotate-0">
      </ion-icon>
    </button>

    <a href="#" id="nav-filter" data-icon="filter" class="sidebar-icon group p-3 duration-300 transition-colors">
      <ion-icon name="filter-outline" class="text-3xl text-mainGray group-hover:text-mainText transition-colors">
      </ion-icon>
    </a>
  </div>

</nav>