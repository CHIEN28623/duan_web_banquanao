<h3 class="font-bold text-3xl text-center pt-2 text-neutral-700">Quản lý sản phẩm</h3>

<form action="index.php" method="post" enctype="multipart/form-data" class="pl-24 mt-10 pr-10">
  <div class="grid grid-cols-2">
    <div class="admin-input">
      <label>Product Name</label>
      <input name="name">
    </div>
    <div class="admin-input">
      <label>Price</label>
      <input name="price" type="number">
    </div>
    <div class="admin-input">
      <label>Discount (%)</label>
      <input name="discount" type="number">
    </div>
    <div class="admin-input">
      <label>Image</label>
      <input name="image" type="file">
    </div>
    <div class="admin-input">
      <label>Số lượng size S</label>
      <input name="size_S" type="number">
    </div>
    <div class="admin-input">
      <label>Số lượng size M</label>
      <input name="size_M" type="number">
    </div>
    <div class="admin-input">
      <label>Số lượng size L</label>
      <input name="size_L" type="number">
    </div>
    <div class="admin-input w-[450px]">
      <label>Category</label>
      <select name="category_id">
        <?php foreach ($category_select_list as $category) {
          echo '<option value="' . $category['category_id'] . '">' . $category['name'] . '</option>';
        }
        ?>
      </select>
    </div>
  </div>
  <div>

  </div>
  <div>
    <div class="admin-input">
      <label>Views</label>
      <input name="view" readonly value="0">
    </div>
  </div>
  <div>
    <div class="admin-input">
      <label>Description</label>
      <textarea name="description" rows="2"></textarea>
    </div>
    <div>
      <button name="btn_insert" type="submit" class="button-red">Add</button>
      <button type="reset" class="button-white mx-5">Reset</button>
      <a href="index.php?btn_list" class="link-primary hover:underline">List</a>
    </div>
  </div>
</form>

<?php
if (strlen($MESSAGE)) {
  echo "<h5 class='text-[20px] ml-24 mt-6 text-red-500'>$MESSAGE</h5>";
}
?>