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

$discount = discount_select_by_content($promo);

$response;
$response['total'] = $total;

if (!$discount) {
  $response['message'] = "Mã giảm giá không tồn tại";
  echo json_encode($response);
} else {
  $response['percent'] = $discount['percent'];
  $response['promo'] = $total * $discount['percent'] / 100;
  $_SESSION['promo'] = $discount['percent'];
  $response['message'] = "Áp dụng mã giảm giá thành công";
  $response['total'] = $total - $total * $discount['percent'] / 100;
  $response['html'] = '<div class="flex justify-between mt-10 mb-5 applied">
  <span class="font-semibold text-sm uppercase">Đã dùng mã giảm giá</span>
  <span class="font-semibold text-sm" id="promoPrice">'
    . $_SESSION['promo'] . '%
</span>
</div>
<button id="discard-promo" class="bg-red-500 hover:bg-red-600 px-5 py-2 text-sm text-white uppercase applied">Bỏ
  mã giảm
  giá</button>';
  echo json_encode($response);
}