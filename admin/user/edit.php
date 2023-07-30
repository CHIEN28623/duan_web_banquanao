<h3 class="font-bold text-3xl text-center pt-2 text-neutral-700">Edit User</h3>

<form action="index.php" method="post" enctype="multipart/form-data" class="pl-24 mt-10 pr-10">
  <div class="grid grid-cols-2">
    <div class="admin-input">
      <label>User Id</label>
      <input name="user_id" readonly value="<?= $user_id ?>">
    </div>
    <div class="admin-input">
      <label>Full Name</label>
      <input name="fullname" value="<?= $fullname ?>">
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
      <input name="email" type="email" readonly value="<?= $email ?>">
    </div>
    <div class="admin-input">
      <label>Image</label>
      <input name="image" type="file">
    </div>
  </div>

  <div class="flex gap-10">
    <div class="admin-input">

      <div class="admin-input">
        <label>Is admin?</label>
        <div>
          <label class="mr-5 flex gap-2 "><input name="is_admin" value="1" type="radio" <?php if ($is_admin == 1)
            echo "checked" ?>>True</label>
            <label class="mr-5 flex gap-2 text-[10px]"><input name="is_admin" value="0" type="radio" <?php if ($is_admin == 0)
            echo "checked" ?>>false</label>
          </div>
        </div>

      </div>
      <div>
        <button name="btn_update" type="submit" class="button-red">Update</button>
        <button type="reset" class="button-white mx-5">Reset</button>
        <a href="index.php?btn_list" class="link-primary hover:underline">List</a>
      </div>
  </form>

  <?php
          if (strlen($MESSAGE)) {
            echo "<h5 class='text-[20px] ml-24 mt-6 text-red-500'>$MESSAGE</h5>";
          }
          ?>