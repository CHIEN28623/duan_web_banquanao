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
        <th>User Email</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($items as $item) {
        extract($item);
        ?>
        <tr>
          <th><input type="checkbox" name="ma_bl[]" value="<?= $comment_id ?>"></th>
          <td>
            <?= $body ?>
          </td>
          <td>
            <?= $created_at ?>
          </td>
          <td>
            <?= $email ?>
          </td>
          <td>
            <a href="index.php?btn_delete&comment_id=<?= $comment_id ?>&product_id=<?= $product_id ?>"
              class="link-secondary remove">Xóa</a>
          </td>
        </tr>
        <?php
      }
      ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="5" class="mt-[100px]">
          <?php require_once "../components/pagination.php" ?>
        </td>
      </tr>

      <tr>
        <td colspan="5">
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