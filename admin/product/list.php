<h3 class="font-bold text-3xl text-center pt-8 text-neutral-700">Product Manager</h3>


<form action="index.php" method="post" class="admin pl-24 mt-10">
  <table>
    <thead>
      <tr>
        <th></th>
        <th>Product Id</th>
        <th>Product Name</th>
        <th>Product Image</th>
        <th>Product Price</th>
        <th>Product View</th>
        <th></th>
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
            <?= $product_id ?>
          </td>
          <td>
            <?= $name ?>
          </td>
          <td>
            <img src="/<?= $image ?>" alt="" style="width: 90px; height: 90px" class="ml-4">
          </td>

          <td>
            <?= number_format($price, 0, ',', '.') ?> VND
          </td>
          <td>
            <?= $view ?>
          </td>
          <td>
            <a href="index.php?btn_edit&product_id=<?= $product_id ?>" class="link link-secondary mr-1">Edit</a>
            <a href="index.php?btn_delete&product_id=<?= $product_id ?>" class="link link-secondary remove">Remove</a>
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
      <tr>
        <td colspan="7">

          <a href="index.php?btn_new" class="ml-4 link-primary">Add new product</a>
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