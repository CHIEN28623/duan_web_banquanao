<h3 class="font-bold text-3xl text-center pt-2 text-neutral-700">Cập nhật trạng thái</h3>

<form action="index.php" method="post" enctype="multipart/form-data" class="pl-24 mt-10 pr-10">
  <div class="grid grid-cols-2">
    <div class="admin-input">
      <label>Mã đơn hàng</label>
      <input name="order_id" readonly value="<?= $item['order_id'] ?>">
    </div>
    <div class="admin-input">
      <label>Tên người đặt</label>
      <input name="fullname" value="<?= $item['fullname'] ?>">
    </div>
    <div class="admin-input">
      <label>Tổng giá</label>
      <input name="total_price" type="text" value="<?= $item['total_price'] ?>">
    </div>
    <div class="admin-input">
      <label>Thời gian tạo</label>
      <span>
        <?= $item['created_at'] ?>
      </span>
    </div>

    <div class="admin-input">
      <label>Trạng thái</label>
      <select name="status" style="width: 460px">
        <?php if ($item['status'] != 2) { ?>
        <option value="0" <?php if ($item['status'] == 0)
            echo 'selected'; ?>>Đang chờ xác nhận</option>
        <option value="1" <?php if ($item['status'] == 01)
            echo 'selected'; ?>>Đang giao hàng</option>
        <?php } ?>
        <option value="2" <?php if ($item['status'] == 2)
          echo 'selected'; ?>>Giao hàng thành công</option>
      </select>
    </div>
  </div>

  <div class="flex gap-10">
    <div class="admin-input">

      <div>
        <button name="btn_update" type="submit" class="button-red">Update</button>
        <button type="reset" class="button-white mx-5">Reset</button>
        <a href="index.php?btn_list" class="link-primary hover:underline">List</a>
      </div>
</form>

<?php
if (strlen($MESSAGE)) {
  echo "<h5 class='text-[20px] ml-24 mt-6 text-red-500'>$MESSAGE</h5>";
}
?>