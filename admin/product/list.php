<h3 class="font-bold text-3xl text-center pt-8 text-neutral-700">Quản lý sản phẩm</h3>

<form action="index.php" type="post" class="flex items-center gap-[10px] ml-[20%]  mt-4">
  <p class="text-black ">Phân loại</p>
  <select class="font-medium text-black p-2 rounded-md bg-transparent border border-blue-500 focus:outline-none"
    id="filter-select" name="filter">
    <option value="">Mới nhất</option>
    <option value="highToLow" <?php if ($_GET['filter'] == "highToLow")
      echo "selected" ?>>Giá từ cao đến thấp
    </option>
    <option value="lowToHigh" <?php if ($_GET['filter'] == "lowToHigh")
      echo "selected" ?>>Giá từ thấp tới cao
    </option>
  </select>


  <p class="text-black ">Phân theo danh mục</p>
  <select class="font-medium text-black p-2 rounded-md bg-transparent border border-blue-500 focus:outline-none"
    id="filter-select" name="category_id">
    <option value="">Chọn danh mục</option>
    <?php foreach ($category_select_list as $category) { ?>
    <option value="<?= $category['category_id'] ?>" <?php if ($_GET["category_id"] == $category['category_id'])
          echo "selected" ?>><?= $category['name'] ?></option>
    <?php }
    ?>
  </select>
  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
    Lọc
  </button>
</form>


<form action="index.php" method="post" class="admin pl-10 mt-10">
  <table>
    <thead>
      <tr>
        <th></th>
        <th>Tên sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Giá</th>
        <th>Lượt xem</th>
        <th>Số lượng Size S </th>
        <th>Số lượng Size M </th>
        <th>Số lượng Size L </th>

        <th></th>
      </tr>
    </thead>
    <tbody class="products">
      <?php
      foreach ($items as $item) {
        ?>
      <tr>
        <td><input type="checkbox" name="category_id[]" value="<?= $item['category_id'] ?>"></td>
        <td>
          <?= $item['name'] ?>
        </td>
        <td>
          <img src="/<?= $item['image'] ?>" alt="" style="width: 70px; height: 70px" class="ml-4">
        </td>

        <td>
          <?= number_format($item['price'], 0, ',', '.') ?> VND
        </td>
        <td>
          <?= $item['view'] ?>
        </td>
        <td>
          <?= $item['size_S'] ?>
        </td>
        <td>
          <?= $item['size_M'] ?>
        </td>
        <td>
          <?= $item['size_L'] ?>
        </td>

        <td>
          <a href="index.php?btn_edit&product_id=<?= $item['product_id'] ?>" class="link link-secondary mr-1">Edit</a>
          <a href="index.php?btn_delete&product_id=<?= $item['product_id'] ?>"
            class="link link-secondary remove">Remove</a>
        </td>
      </tr>
      <?php
      }
      ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="9">
          <?php
          require_once "../components/pagination.php"
            ?>
        </td>
      </tr>
      <tr>
        <td colspan="9">

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