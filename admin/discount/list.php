<h3 class="font-bold text-3xl text-center pt-8 text-neutral-700">Quản lý mã giảm giá</h3>

<form action="index.php" method="post" class="admin pl-24 mt-10">
  <table>
    <thead>
      <tr>
        <th></th>
        <th>Tên mã giảm giá</th>
        <th>Phần trăm giảm</th>
        <th>Tên người tạo</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($items as $item) {
        extract($item);
        ?>
        <tr>
          <th><input type="checkbox" name="category_id[]" value="<?= $sale_code_id ?>"></th>

          <td>
            <?= $content ?>
          </td>
          <td>
            <?= $percent ?>
          </td>
          <td>
            <?= $fullname ?>
          </td>
          <td>
            <a href="index.php?btn_delete&sale_code_id=<?= $sale_code_id ?>" class="link-secondary remove">Xoá</a>
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
          <button id="btn-delete" name="btn_delete" class="button-red">Xoá tất cả các mục đã chọn </button>
          <a href="index.php" class="ml-4 link-primary">Thêm mã giảm giá </a>
        </td>
      </tr>
    </tfoot>
  </table>
</form>

<?php
if (strlen($MESSAGE)) {
  echo "<h5 class='text-[20px] ml-24 mt-6 text-red-500'>$MESSAGE</h5>";
}
?>

<script src="../../content/js/xshop-list.js"></script>