<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $model["title"] ?></title>
  <meta name="description" content="<?= isset($model["description"]) ? $model["description"] : null ?>">

  <script>
  const savedTheme = localStorage.getItem("theme");
  const systemDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
  const html = document.documentElement;

  if (savedTheme === "dark" || (!savedTheme && systemDark)) {
    html.classList.add("dark");
  } else {
    html.classList.remove("dark");
  }
  </script>

  <link rel="stylesheet" href="/css/global.css">
</head>

<body class="bg-mainBg text-mainText transition-colors duration-300">