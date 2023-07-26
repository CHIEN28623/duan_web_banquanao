<h3 class="font-bold text-3xl text-center pt-2 text-neutral-700">Product Manager</h3>
<form action="index.php" method="post" enctype="multipart/form-data" class="pl-24 mt-10 pr-10">
  <div class="grid grid-cols-2">
    <div class="admin-input">
      <label>Product Id</label>
      <input name="product_id" readonly value="<?= $product_id ?>">
    </div>
    <div class="admin-input">
      <label>Product Name</label>
      <input name="name" value="<?= $name ?>">
    </div>
    <div class="admin-input">
      <label>Price</label>
      <input name="price" type="number" value="<?= $price ?>">
    </div>
    <div class="admin-input">
      <label>Discount (%)</label>
      <input name="discount" type="number" value="<?= $discount ?>">
    </div>
    <div class="admin-input">
      <label>Image</label>
      <div class="flex items-center">
        <img src="/<?= $image ?>" alt="" class="w-16 h-16">
        <input name="image" type="file">
        <input type="text" name="defaultImage" value=<?= $image ?> hidden>
      </div>
    </div>
    <div class="admin-input w-[450px]">
      <label>Category</label>
      <select name="category_id">
        <?php foreach ($category_select_list as $category) { ?>
          <option <?php if ($category['category_id'] == $category_id)
            echo "selected" ?>
            value="<?= $category['category_id'] ?>"> <?= $category['name'] ?> </option>;
        <?php } ?>
      </select>
    </div>
  </div>
  <div>

  </div>
  <div>
    <div class="admin-input">
      <label>Views</label>
      <input name="view" readonly value="<?= $view ?>">
    </div>
  </div>
  <div>
    <div class="admin-input">
      <label>Description</label>
      <textarea name="description" rows="4"><?= $description ?></textarea>
    </div>
    <div>
      <button name="btn_update" type="submit" class="button-red">Update</button>
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