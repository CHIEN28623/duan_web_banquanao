<h3 class="font-bold text-3xl text-center pt-8 text-neutral-700">
  Comment Details
</h3>

<form action="index.php?product_id=<?= $product_id ?>" method="post" class="admin pl-24 mt-10">
  <table>
    <thead>
      <tr>
        <th></th>
        <th>Content</th>
        <th>Date</th>
        <th>User Id</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($items as $item) {
        extract($item);
        ?>
        <tr>
          <th><input type="checkbox" name="ma_bl[]" value="<?= $commentId ?>"></th>
          <td>
            <?= $body ?>
          </td>
          <td>
            <?= $created_at ?>
          </td>
          <td>
            <?= $user_id ?>
          </td>
          <td>
            <a href="index.php?btn_delete&commentId=<?= $commentId ?>&product_id=<?= $product_id ?>"
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