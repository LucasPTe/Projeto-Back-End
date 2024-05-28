document.addEventListener("DOMContentLoaded", function () {
  const chk = document.getElementById("chk");
  const body = document.body;

  const isDarkMode = localStorage.getItem("dark-mode") === "true";
  if (isDarkMode) {
    body.classList.add("dark-mode");
    chk.checked = true;
  }

  chk.addEventListener("change", function () {
    if (chk.checked) {
      body.classList.add("dark-mode");
      localStorage.setItem("dark-mode", "true");
    } else {
      body.classList.remove("dark-mode");
      localStorage.setItem("dark-mode", "false");
    }
  });
});
