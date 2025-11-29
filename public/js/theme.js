function setupThemeToggle() {
  const html = document.documentElement;
  const toggleButtons = document.querySelectorAll(".theme-toggle-btn");
  const appLogos = document.querySelectorAll(".app-logo-img");
  const themeText = document.getElementById("themeText");

  function updateUI() {
    const isDark = html.classList.contains("dark");

    toggleButtons.forEach((btn) => {
      const icon = btn.querySelector("ion-icon");
      if (icon) {
        if (isDark) {
          icon.setAttribute("name", "moon");
        } else {
          icon.setAttribute("name", "sunny");
        }
      }

      const dot = btn.querySelector("#themeDot");

      if (dot) {
        if (isDark) {
          dot.classList.add("translate-x-full", "border-white");
          dot.classList.remove("border-gray-300");
        } else {
          dot.classList.remove("translate-x-full", "border-white");
          dot.classList.add("border-gray-300");
        }
      }
    });

    appLogos.forEach((logo) => {
      logo.src = isDark ? "/assets/logowhite.png" : "/assets/logo.png";
    });

    if (themeText) {
      themeText.innerText = isDark ? "Mode Gelap" : "Mode Terang";
    }
  }

  const savedTheme = localStorage.getItem("theme");
  const systemDark = window.matchMedia("(prefers-color-scheme: dark)").matches;

  if (savedTheme === "dark" || (!savedTheme && systemDark)) {
    html.classList.add("dark");
  } else {
    html.classList.remove("dark");
  }

  updateUI();

  if (toggleButtons.length > 0) {
    toggleButtons.forEach((btn) => {
      btn.addEventListener("click", () => {
        html.classList.toggle("dark");

        if (html.classList.contains("dark")) {
          localStorage.setItem("theme", "dark");
        } else {
          localStorage.setItem("theme", "light");
        }

        updateUI();

        const icon = btn.querySelector("ion-icon");
        if (icon) {
          icon.classList.add(
            "rotate-[360deg]",
            "transition-transform",
            "duration-500"
          );
          setTimeout(() => {
            icon.classList.remove("rotate-[360deg]");
          }, 500);
        }
      });
    });
  }
}
