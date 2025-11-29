<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $model["title"] ?? "Jawara Meme Kampus" ?></title>
  <meta name="description" content="<?= $model["description"] ?? "" ?>">

  <script>
  if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)')
      .matches)) {
    document.documentElement.classList.add('dark')
  } else {
    document.documentElement.classList.remove('dark')
  }
  </script>

  <link rel="stylesheet" href="/css/global.css">
</head>

<body class="bg-mainBg text-mainText transition-colors duration-300 font-sans antialiased">

  <header
    class="sticky top-0 z-50 w-full bg-mainBg/80 backdrop-blur-xl border-b border-mainGray transition-colors duration-300">
    <nav class="container mx-auto px-6 py-4 flex justify-between items-center">

      <a href="/" class="group relative">
        <img src="/assets/logo.png" class="w-32 md:w-36 hover:opacity-80 transition-opacity block dark:hidden"
          alt="Logo JMK25 Light">
        <img src="/assets/logowhite.png" class="w-32 md:w-36 hover:opacity-80 transition-opacity hidden dark:block"
          alt="Logo JMK25 Dark">
      </a>

      <a href="/user/signin"
        class="px-8 py-2.5 rounded-xl font-bold border-2 border-mainGray text-mainText hover:bg-accent hover:text-mainBg hover:border-accent transition-all duration-300">
        Login
      </a>

    </nav>
  </header>