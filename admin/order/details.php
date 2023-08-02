<h3 class="font-bold text-3xl text-center pt-8 text-neutral-700">
  Order Details
</h3>

<form action="index.php?product_id=<?= $product_id ?>" method="post" class="admin pl-24 mt-10">
  <table>
    <thead>
      <tr>
        <th></th>
        <th>Product</th>
        <th>Quantity</th>
        <th>Price</th>
        <th></th>
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
            <?= $quantity ?>
          </td>
          <td>
            <?= $price ?>
          </td>
          <td>
            <a href="index.php?btn_delete&comment_id=<?= $comment_id ?>&product_id=<?= $product_id ?>"
              class="link-secondary">Xóa</a>
          </td>
        </tr>
        <?php
      }
      ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="4">
          <button id="check-all" type="button" class="button-red">Chọn tất cả</button>
          <button id="clear-all" type="button" class="button-white mx-5">Bỏ chọn tất cả</button>
          <button id="btn-delete" name="btn_delete" class="button-red">Xóa các mục chọn</button>
        </td>
      </tr>
    </tfoot>
  </table>
</form>

<script src="../../content/js/xshop-list.js"></script>

<?php
if (strlen($MESSAGE)) {
  echo "<h5 class='text-[20px] ml-24 mt-6 text-red-500'>$MESSAGE</h5>";
}
?>