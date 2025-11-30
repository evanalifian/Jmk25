<div id="menuPopup"
  class="hidden opacity-0 absolute bottom-0 left-16 ml-2 w-64 bg-white dark:bg-[#181818] border border-gray-200 dark:border-gray-800 rounded-2xl shadow-[0_10px_40px_-10px_rgba(0,0,0,0.1)] dark:shadow-[0_10px_40px_-10px_rgba(0,0,0,0.5)] z-50 transition-all duration-300 ease-out transform translate-y-2 scale-95 origin-bottom-left backdrop-blur-sm">

  <div class="flex flex-col py-2">

    <button id="themeBtn"
      class="theme-toggle-btn relative flex items-center justify-between px-4 py-3 w-full text-left transition-colors hover:bg-gray-50 dark:hover:bg-white/5 group">

      <div class="flex items-center gap-3">
        <div
          class="relative w-5 h-5 flex items-center justify-center transition-transform duration-500 rotate-0 dark:-rotate-180">
          <ion-icon id="themeIcon" name="moon-outline" class="text-xl text-gray-600 dark:text-gray-300"></ion-icon>
        </div>
        <span id="themeText" class="text-sm font-medium text-gray-700 dark:text-gray-200">Mode Gelap</span>
      </div>

      <div id="toggleTrack"
        class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:bg-indigo-600 transition-colors duration-300 ease-in-out relative">
        <div id="themeDot"
          class="absolute top-[2px] left-[2px] bg-white border-gray-300 border h-5 w-5 rounded-full shadow-sm transition-all duration-300 ease-[cubic-bezier(0.4,0.0,0.2,1)] dark:translate-x-full dark:border-white">
        </div>
      </div>

    </button>

    <a href="/group/create"
      class="flex items-center gap-3 px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-white/5 transition-colors">
      <ion-icon name="add-circle-outline" class="text-xl text-gray-500 dark:text-gray-400"></ion-icon>
      <span class="text-sm font-medium">Buat Grup</span>
    </a>

    <div class="h-px bg-gray-100 dark:bg-gray-800 my-1 mx-3"></div>

    <a href="/user/logout"
      class="flex items-center gap-3 px-4 py-3 text-red-500 hover:bg-red-50 dark:hover:bg-red-900/10 transition-colors">
      <ion-icon name="log-out-outline" class="text-xl"></ion-icon>
      <span class="text-sm font-medium">Log out</span>
    </a>
  </div>
</div>