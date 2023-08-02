<h3 class="font-bold text-3xl text-center pt-8 text-neutral-700">Order Manager</h3>

<form action="index.php" method="post" class="admin pl-24 mt-10">
  <table>
    <thead>
      <tr>
        <th>id Order</th>
        <th>Name User</th>
        <th>Tutal_price</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Date</th>
        <th>Status</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      
      foreach ($items as $item) {

        extract($item);
        ?>
        <tr>
          <td>
            <?= $order_id ?>
          </td>
          <td>
            <?= $fullname ?>
          </td>
          <td>
            <?= $tutal_price ?>
          </td>
          <td>
            <?= $address ?>
          </td>
          <td>
            <?= $phone_number ?>
          </td>
          <td>
            <?= $date ?>
          </td>
          <td>
          <select>
            <option value="0">Đang chuẩn bị</option>
            <option value="1">Đang giao hàng</option>
            <option value="2">Giao hàng thành công</option>
      </select>
          </td>

          <td>
            <a href="">Lưu</a>
          <a href="index.php?btn_edit&order_id=<?= $order_id ?>" class="link-secondary">Details</a>
          </td>
        </tr>
        <?php
      }
      ?>
    </tbody>

  </table>
</form>

<?php
if (strlen($MESSAGE)) {
  echo "<h5 class='text-[20px] ml-24 mt-6 text-red-500'>$MESSAGE</h5>";
}
?>

<script src="../../content/js/xshop-list.js"></script>