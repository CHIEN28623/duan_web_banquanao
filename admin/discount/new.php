<h3 class="font-bold text-3xl text-center pt-8 text-neutral-700">Thêm mã giảm giá mới</h3>

<form action="index.php" method="post" class="pl-24 mt-10">
  <input hidden name="category_id" value="Auto Number" readonly>

  <div class="admin-input">
    <label>Nội dung mã giảm giá</label>
    <input name="name" placeholder="Nội dung">
    <label>Phần trăm giảm giá</label>
    <input type="number" min="1" max="100" name="percent" placeholder="Phần trăm">
  </div>
  <div>
    <button name="btn_insert" type="submit" class="button-red">Add</button>
    <button type="reset" class="button-white mx-5">Reset</button>
    <a href="index.php?btn_list" class="link-primary hover:underline">List</a>
  </div>
</form>

<?php
if (strlen($MESSAGE)) {
  echo "<h5 class='text-[20px] ml-24 mt-6 text-red-500'>$MESSAGE</h5>";
}
?>