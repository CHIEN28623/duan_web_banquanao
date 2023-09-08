<?php
require "../dao/discount.php";

session_start();
extract($_GET);

$cart = $_SESSION['cart'];
$total = 0;
$totalItem = 0;

foreach ($cart as $item) {
  $total += $item['price'] * $item['quantity'];
  $totalItem += $item['quantity'];
}

$_SESSION['promo'] = 0;

$response;
$response['total'] = $total;
$response['html'] = '          <div class=" py-4 lg:py-10 discarded">
<label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">Mã giảm giá</label>
<input type="text" id="promo" name="promo" placeholder="Nhập mã giảm giá" class="border p-2 text-sm w-full">
</div>
<button id="apply-promo" class="bg-red-500 hover:bg-red-600 px-5 py-2 text-sm text-white uppercase discarded">Áp
dụng</button>';

echo json_encode($response);