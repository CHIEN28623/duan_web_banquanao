<h3 class="font-bold text-3xl text-center pt-8 text-neutral-700">Category Manager</h3>

<form action="category" method="post" class="pl-24 mt-10">
  <div class="admin-input">
    <label>Category Id</label>
    <input name="category_id" value="<?= $category_id ?>" readonly>
  </div>
  <div class="admin-input">
    <label>Category Name</label>
    <input name="name" value="<?= $name ?>">
  </div>
  <div>
    <button name="btn_update" class="button-red">Confirm</button>
    <button type="reset" class="button-white mx-5">Nhập lại</button>
    <a href="index.php?btn_list" class="link-primary">Danh sách</a>
  </div>
</form>

<?php
if (strlen($MESSAGE)) {
  echo "<h5 class='text-[20px] ml-24 mt-6 text-red-500'>$MESSAGE</h5>";
}
?>