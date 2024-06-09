document.addEventListener("DOMContentLoaded", function () {
  const darkModeToggle = document.getElementById("chk");
  const isDarkMode = localStorage.getItem("darkMode") === "enabled";

  if (isDarkMode) {
    enableDarkMode();
    darkModeToggle.checked = true;
  }

  darkModeToggle.addEventListener("change", function () {
    if (darkModeToggle.checked) {
      enableDarkMode();
      localStorage.setItem("darkMode", "enabled");
    } else {
      disableDarkMode();
      localStorage.setItem("darkMode", null);
    }
  });

  function enableDarkMode() {
    document.body.classList.add("dark-mode");
    // Adiciona classe dark-mode apenas aos elementos que você quer estilizar
    document.querySelectorAll(".light-mode").forEach(function (element) {
      element.classList.add("dark-mode");
    });
  }

  function disableDarkMode() {
    document.body.classList.remove("dark-mode");
    // Remove classe dark-mode apenas dos elementos estilizados
    document.querySelectorAll(".dark-mode").forEach(function (element) {
      element.classList.remove("dark-mode");
    });
  }
});