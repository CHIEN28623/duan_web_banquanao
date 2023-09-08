const modalbg = document.getElementById("modal-bg");
const modalSwitch = document.getElementById("modal-switch");
const modalBox = document.getElementById("modal-box");
const modalClose = document.getElementById("modal-close");
const modalContainer = document.getElementById("modal-container");

const applyBtn = document.getElementById("apply-promo");
const discardBtn = document.getElementById("discard-promo");

const promoContainer = document.getElementById("promo-container");

const appliedElements = document.querySelectorAll(".applied");
const discardedElements = document.querySelectorAll(".discarded");

discardBtn?.addEventListener("click", function () {
  // call ajax to check if the promo code is valid
  const xhr = new XMLHttpRequest();
  xhr.open("GET", `/site/discard-promo.php`, true);
  xhr.onload = function () {
    if (xhr.status === 200) {
      const response = JSON.parse(xhr.responseText);
      console.log(response);
      const total = document.getElementById("total");
      const promo = document.getElementById("promoPrice");
      total.innerText = `${formatNumber(response.total)} VND`;
      promo.innerText = `0 VND`;
      appliedElements.forEach((element) => {
        element.style.display = "none";
      });
      promoContainer.innerHTML = response.html;

      applyEvent();
    }
  };
  xhr.send();
});

applyBtn?.addEventListener("click", function () {
  console.log("click");
  const promoCode = document.getElementById("promo").value;

  // call ajax to check if the promo code is valid
  const xhr = new XMLHttpRequest();
  xhr.open("GET", `/site/check-promo.php?promo=${promoCode}`, true);
  xhr.onload = function () {
    if (xhr.status === 200) {
      const response = JSON.parse(xhr.responseText);
      console.log(response);
      alert(response.message);
      const total = document.getElementById("total");
      const promo = document.getElementById("promoPrice");
      total.innerText = `${formatNumber(response.total)} VND`;
      promo.innerText = `${formatNumber(response.promo)} VND`;
      discardedElements.forEach((element) => {
        element.style.display = "none";
      });

      promoContainer.innerHTML = response.html;

      discardEvent();
    }
  };
  xhr.send();
});

function discardEvent() {
  const discardBtn = document.getElementById("discard-promo");

  discardBtn?.addEventListener("click", function () {
    // call ajax to check if the promo code is valid
    const xhr = new XMLHttpRequest();
    xhr.open("GET", `/site/discard-promo.php`, true);
    xhr.onload = function () {
      if (xhr.status === 200) {
        const response = JSON.parse(xhr.responseText);
        const total = document.getElementById("total");
        const promo = document.getElementById("promoPrice");
        total.innerText = `${formatNumber(response.total)} VND`;
        promo.innerText = `0 VND`;
        appliedElements.forEach((element) => {
          element.style.display = "none";
        });
        promoContainer.innerHTML = response.html;
        console.log(response.html);
        applyEvent();
      }
    };
    xhr.send();
  });
}

function applyEvent() {
  const applyBtn = document.getElementById("apply-promo");

  applyBtn?.addEventListener("click", function () {
    console.log("click");
    const promoCode = document.getElementById("promo").value;

    // call ajax to check if the promo code is valid
    const xhr = new XMLHttpRequest();
    xhr.open("GET", `/site/check-promo.php?promo=${promoCode}`, true);
    xhr.onload = function () {
      if (xhr.status === 200) {
        const response = JSON.parse(xhr.responseText);
        console.log(response);
        alert(response.message);
        const total = document.getElementById("total");
        const promo = document.getElementById("promoPrice");
        total.innerText = `${formatNumber(response.total)} VND`;
        promo.innerText = `${formatNumber(response.promo)} VND`;
        discardedElements.forEach((element) => {
          element.style.display = "none";
        });

        promoContainer.innerHTML = response.html;

        discardEvent();
      }
    };
    xhr.send();
  });
}

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
      const promo = document.getElementById("promoPrice");
      promo.innerText = `${formatNumber(response.promo)} VND`;
      totalPriceItem.innerText = `${formatNumber(response.totalPriceItem)} VND`;
      quantityInput.value = `${response.quantity}`;
      totalItem.innerText = `${response.totalItem} sản phẩm`;
      total.innerText = `${formatNumber(response.total)} VND`;
      totalAbove.innerText = `${formatNumber(response.totalAbove)} VND`;
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
