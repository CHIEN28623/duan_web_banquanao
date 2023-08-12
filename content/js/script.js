const modalbg = document.getElementById("modal-bg");
const modalSwitch = document.getElementById("modal-switch");
const modalBox = document.getElementById("modal-box");
const modalClose = document.getElementById("modal-close");
const modalContainer = document.getElementById("modal-container");

function changeQuantity(action, itemId, size) {
  const xhr = new XMLHttpRequest();
  xhr.open(
    "GET",
    `/site/update-quantity.php?action=${action}&id=${itemId}&size=${size}`,
    true
  );
  xhr.onload = function () {
    if (xhr.status === 200) {
      const response = JSON.parse(xhr.responseText);
      console.log(xhr.responseText);

      const totalPriceItem = document.getElementById(`totalPrice_${itemId}`);
      const quantityInput = document.getElementById(`quantity_${itemId}`);
      const totalItem = document.getElementById(`totalItem`);
      const total = document.getElementById(`total`);
      const totalAbove = document.getElementById(`totalAbove`);
      totalPriceItem.innerText = `${formatNumber(response.totalPriceItem)} VND`;
      quantityInput.value = `${response.quantity}`;
      totalItem.innerText = `${response.totalItem} sản phẩm`;
      total.innerText = `${formatNumber(response.total)} VND`;
      totalAbove.innerText = `${formatNumber(response.total)} VND`;
    }
  };
  xhr.send();
}

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

function formatNumber(number) {
  return number.toLocaleString("en-US").replace(/,/g, ".");
}
