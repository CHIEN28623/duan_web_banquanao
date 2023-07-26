<h3 class="font-bold text-3xl text-center pt-2 text-neutral-700">User Manager</h3>

<form action="index.php" method="post" enctype="multipart/form-data" class="pl-24 mt-10 pr-10">
  <div class="grid grid-cols-2">
    <div class="admin-input">
      <label>User Id</label>
      <input name="user_id" readonly value="Auto generated">
    </div>
    <div class="admin-input">
      <label>Full Name</label>
      <input name="fullname">
    </div>
    <div class="admin-input">
      <label>Password</label>
      <input name="password" type="password">
    </div>
    <div class="admin-input">
      <label>Password Confirm</label>
      <input name="passwordConfirm" type="password">
    </div>
    <div class="admin-input">
      <label>Email</label>
      <input name="email" type="email" required>
    </div>
    <div class="admin-input">
      <label>Image</label>
      <input name="image" type="file">
    </div>
  </div>

  <div class="flex gap-10">
    <div class="admin-input">
      <label>Is admin?</label>
      <div>
        <label class="mr-5 flex gap-2 "><input name="is_admin" value="1" type="radio" checked>True</label>
        <label class="mr-5 flex gap-2 text-[10px]"><input name="is_admin" value="0" type="radio">false</label>
      </div>
    </div>

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