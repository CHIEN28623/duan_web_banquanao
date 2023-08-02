<h3 class="font-bold text-3xl text-center pt-8 text-neutral-700">Category Manager</h3>

<form action="index.php" method="post" class="admin pl-24 mt-10">
  <table>
    <thead>
      <tr>
        <th></th>
        <th>Category Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($items as $item) {
        extract($item);
        ?>
      <tr>
        <th><input type="checkbox" name="category_id[]" value="<?= $category_id ?>"></th>

        <td>
          <?= $name ?>
        </td>
        <td>
          <a href="index.php?btn_edit&category_id=<?= $category_id ?>" class="link-secondary">Edit</a>
          <a href="index.php?btn_delete&category_id=<?= $category_id ?>" class="link-secondary remove">Remove</a>
        </td>
      </tr>
      <?php
      }
      ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="4">
          <button id="check-all" type="button" class="button-red">Select all</button>
          <button id="clear-all" type="button" class="button-white mx-5">Unselect all</button>
          <button id="btn-delete" name="btn_delete" class="button-red">Delete all selection </button>
          <a href="index.php" class="ml-4 link-primary">Add new category</a>
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