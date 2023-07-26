<h3 class="font-bold text-3xl text-center pt-8 text-neutral-700">Comment Manager</h3>

<form action="index.php" method="post" class="admin pl-24 mt-10">
  <table>
    <thead>
      <tr>
        <th>Total Comments</th>
        <th>Product Name</th>
        <th>First Date</th>
        <th>Last Date</th>
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
            <?= $quantity ?>
          </td>
          <td>
            <?= $name ?>
          </td>
          <td>
            <?= $firstDate ?>
          </td>
          <td>
            <?= $lastDate ?>
          </td>


          <td>
            <a href="index.php?btn_edit&product_id=<?= $product_id ?>" class="link-secondary">Details</a>
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