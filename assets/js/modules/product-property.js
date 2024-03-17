for (let i = 1; i < 5; i++) {
  const el = document.getElementById("tab" + i);

  if (el) {
    el.onclick = function () {
      document.getElementById("tab" + i + "Content").classList.toggle("show");
    };
  }
}
