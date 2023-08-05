<h3 class="font-bold text-3xl text-center pt-8 text-neutral-700">
  Chi tiết đơn hàng
</h3>

<form action="index.php?product_id=<?= $product_id ?>" method="post" class="admin pl-[320px] mt-10">
  <table>
    <thead>
      <tr>
        <th></th>
        <th>Tên sản phẩm</th>
        <th>Kích cỡ</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th>Mã đơn</th>
      </tr>
    </thead>
    <tbody>
      <?php
      ($items);
      foreach ($items as $item) {
        extract($item);
        ?>
      <tr>
        <th><input type="checkbox" name="ma_bl[]" value="<?= $comment_id ?>"></th>
        <td>
          <?= $name ?>
        </td>
        <td>
          <?= $size ?>
        </td>
        <td>
          <?= $quantity ?>
        </td>
        <td>
          <?= number_format($price * (100 - $discount) / 100, 0, ',', '.') ?> VND
        </td>
        <td>
          <?= $order_id ?>
        </td>

      </tr>
      <?php
      }
      ?>
    </tbody>

  </table>
</form>

<a href="index.php?btn_list" class="link-secondary ml-[540px] text-[20px]">Trờ về</a>

<script src="../../content/js/xshop-list.js"></script>

<?php
if (strlen($MESSAGE)) {
  echo "<h5 class='text-[20px] ml-24 mt-6 text-red-500'>$MESSAGE</h5>";
}
?>