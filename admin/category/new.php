<h3 class="font-bold text-3xl text-center pt-8 text-neutral-700">Category Manager</h3>

<form action="index.php" method="post" class="pl-24 mt-10">
  <div class="admin-input">
    <label>Category ID</label>
    <input name="category_id" value="Auto Number" readonly>
  </div>

  <div class="admin-input">
    <label>Category Name</label>
    <input name="name" placeholder="Name">
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