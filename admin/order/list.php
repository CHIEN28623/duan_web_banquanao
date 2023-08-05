<h3 class="font-bold text-3xl text-center pt-8 text-neutral-700">Quản lý đơn hàng</h3>

<div class="admin pl-24 mt-10">

  <table>
    <thead>
      <tr>
        <th>Mã đơn</th>
        <th>Tổng giá</th>
        <th>Số điện thoại</th>
        <th>Ngày tạo đơn</th>
        <th>Trạng thái đơn</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php

      foreach ($items as $item) {

        extract($item);

        ?>

      <input type="text" name="order_id" value="<?= $order_id ?>" hidden>
      <tr>
        <td>
          <?= $order_id ?>
        </td>

        <td>
          <?= number_format($total_price, 0, ',', '.') ?> VND
        </td>

        <td>
          <?= $phone_number ?>
        </td>
        <td>
          <?= date('d-m-Y', strtotime($created_at)) ?>
        </td>
        <td>
          <?php if ($status == 0) { 
              echo "Đang chờ xác nhận";
             } else if ($status == 1) {
              echo "Đang giao hàng";
             } else {
              echo "Giao hàng thành công";
             }
             
             
             ?>

        </td>

        <td>
          <a href="index.php?btn_edit&order_id=<?= $order_id ?>" class="link-secondary">Edit</a>
          <a href="index.php?order_id=<?= $order_id ?>" class="link-secondary">Details</a>
        </td>
      </tr>

      <?php
      }
      ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="7">
          <?php
          require_once "../components/pagination.php"
            ?>
        </td>
      </tr>
    </tfoot>

  </table>
</div>

<?php
if (strlen($MESSAGE)) {
  echo "<h5 class='text-[20px] ml-24 mt-6 text-red-500'>$MESSAGE</h5>";
}
?>

<script src="../../content/js/xshop-list.js"></script>