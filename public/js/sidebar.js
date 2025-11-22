function setupSidebarActiveState() {
  const currentPath = window.location.pathname;

  const sidebarLinks = document.querySelectorAll(".sidebar-icon");

  sidebarLinks.forEach((link) => {
    const href = link.getAttribute("href");
    const iconElement = link.querySelector("ion-icon");
    const iconNameBase = link.dataset.icon;

    if (href === currentPath || (currentPath === "/" && href === "/")) {
      if (iconNameBase) {
        iconElement.setAttribute("name", iconNameBase);
      }

      link.classList.remove("text-mainGray", "hover:bg-mainGray");

      iconElement.classList.add("text-mainText");
      iconElement.classList.remove("text-mainGray");
    } else {
      if (iconNameBase) {
        iconElement.setAttribute("name", iconNameBase + "-outline");
      }

      link.classList.add("text-mainGray", "hover:bg-mainGray");

      iconElement.classList.remove("text-mainText");
      iconElement.classList.add("text-mainGray");
    }
  });
}

document.addEventListener("DOMContentLoaded", setupSidebarActiveState);
