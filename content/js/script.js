const modalbg = document.getElementById("modal-bg");
const modalSwitch = document.getElementById("modal-switch");
const modalBox = document.getElementById("modal-box");
const modalClose = document.getElementById("modal-close");
const modalContainer = document.getElementById("modal-container");
console.log(modalClose);
modalbg.addEventListener("click", function () {
  modalBox.classList.add("hidden");
  modalbg.classList.add("hidden");
});

modalClose.addEventListener("click", function () {
  modalBox.classList.add("hidden");
  modalbg.classList.add("hidden");
  modalContainer.classList.add("hidden");
  window.location.href = "";
});
