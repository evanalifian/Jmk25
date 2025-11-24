<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">

  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img id="app-logo" class="mx-auto h-12 w-auto object-contain" src="/assets/logo.png" alt="Jmk25 Logo" />

    <h2 class="mt-8 text-center text-2xl/9 font-bold tracking-tight text-mainText">
      Sign up dulu, bro
    </h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <?= isset($model) ? $model["err_msg"] : null ?>
    <form action="/user/signup" method="POST" class="space-y-6">

      <div>
        <label for="username" class="block text-sm/6 font-medium text-mainText/80">Username</label>
        <div class="mt-2">
          <input type="text" id="username" name="username"
            class="block w-full rounded-lg border-0 bg-secondBg px-4 py-3 text-mainText shadow-sm ring-1 ring-inset ring-mainGray/20 placeholder:text-mainText/30 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm/6 transition-all outline-none"
            placeholder="Pilih username kerenmu" />
        </div>
      </div>

      <div>
        <label for="user_display" class="block text-sm/6 font-medium text-mainText/80">Display Name</label>
        <div class="mt-2">
          <input id="user_display" type="user_display" name="user_display" autocomplete="current-user_display"
            class="block w-full rounded-lg border-0 bg-secondBg px-4 py-3 text-mainText shadow-sm ring-1 ring-inset ring-mainGray/20 placeholder:text-mainText/30 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm/6 transition-all outline-none"
            placeholder="Masukkan username kerenmu" />
        </div>
      </div>

      <div>
        <label for="email" class="block text-sm/6 font-medium text-mainText/80">Email</label>
        <div class="mt-2">
          <input id="email" type="email" name="email" autocomplete="current-email"
            class="block w-full rounded-lg border-0 bg-secondBg px-4 py-3 text-mainText shadow-sm ring-1 ring-inset ring-mainGray/20 placeholder:text-mainText/30 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm/6 transition-all outline-none"
            placeholder="Masukkan username kerenmu" />
        </div>
      </div>

      <div>
        <label for="password" class="block text-sm/6 font-medium text-mainText/80">Password</label>
        <div class="mt-2">
          <input id="password" type="password" name="password" autocomplete="current-password"
            class="block w-full rounded-lg border-0 bg-secondBg px-4 py-3 text-mainText shadow-sm ring-1 ring-inset ring-mainGray/20 placeholder:text-mainText/30 focus:ring-2 focus:ring-inset focus:ring-blue-500 sm:text-sm/6 transition-all outline-none"
            placeholder="••••••••" />
        </div>
      </div>

      <div>
        <button type="submit"
          class="flex w-full justify-center rounded-lg bg-blue-600 px-3 py-3 text-sm/6 font-bold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 transition-colors">
          Sign up
        </button>
      </div>
    </form>

    <p class="mt-10 text-center text-sm/6 text-mainText/60">
      Udah punya akun?
      <a href="/user/signin" class="font-semibold text-blue-500 hover:text-blue-400 hover:underline transition-all">
        Sign in di sini
      </a>
    </p>
  </div>
</div>