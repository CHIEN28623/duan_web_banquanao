<?php

require_once '../../global.php';
require_once '../../dao/user.php';

if (isset($_POST)) {
  extract($_POST);

  if (isset($fullname)) {
    $image = $_SESSION['image'];
    $updatedPassword = $_SESSION['password'];

    if (!empty($_FILES['image'])) {
      $image = save_file('image', '/content/images/user/');
      $image = '/content/images/user/' . $image;
    }

    if (isset($oldPassword) && isset($newPassword)) {
      $updatedPassword = $newPassword;
    }


    customers_update($fullname, $updatedPassword, $image, $_SESSION['user_id']);
    $_SESSION['fullname'] = $fullname;
    $_SESSION['image'] = $image;
  }
}


?>


<!-- component -->
<form class="py-20 bg-gray-100  bg-opacity-50" method="post" enctype="multipart/form-data" action="">
  <div class="mx-auto container max-w-3xl md:w-3/4 shadow-md">
    <div class="bg-gray-100 p-4 border-t-2 bg-opacity-5 border-red-400 rounded-t">
      <div class="max-w-sm mx-auto md:w-full md:mx-0">
        <div class="inline-flex items-center space-x-4">
          <img class="w-10 h-10 object-cover rounded-full" alt="User avatar" src="<?= $_SESSION['image'] ?>" />

          <h1 class="text-gray-600">
            <?= $_SESSION['fullname'] ?>
          </h1>
        </div>
      </div>
    </div>
    <div class="bg-white space-y-6">
      <div class="md:inline-flex space-y-4 md:space-y-0 w-full p-4 text-gray-500 items-center">
        <h2 class="md:w-1/3 max-w-sm mx-auto">Account</h2>
        <div class="md:w-2/3 max-w-sm mx-auto">
          <label class="text-sm text-gray-400">Email</label>
          <div class="w-full inline-flex border">
            <div class="pt-2 w-1/12 bg-gray-100 bg-opacity-50">
              <svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
            </div>
            <input type="email" class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
              placeholder="email@example.com" value="<?= $_SESSION['email'] ?>" disabled />
          </div>
        </div>
      </div>

      <hr />
      <div class="md:inline-flex  space-y-4 md:space-y-0  w-full p-4 text-gray-500 items-center">
        <h2 class="md:w-1/3 mx-auto max-w-sm">Personal info</h2>
        <div class="md:w-2/3 mx-auto max-w-sm space-y-5">
          <div>
            <label class="text-sm text-gray-400">Full name</label>
            <div class="w-full inline-flex border">
              <div class="w-1/12 pt-2 bg-gray-100">
                <svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
              </div>
              <input type="text" name="fullname" class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                placeholder="Your name" value="<?= $_SESSION['fullname'] ?>" />
            </div>
          </div>
          <div>
            <label class="text-sm text-gray-400">Image</label>
            <div class="w-full inline-flex border">
              <div class="pt-2 w-1/12 bg-gray-100">
                <svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                </svg>
              </div>
              <input type="file" name="image" class="w-11/12 focus:outline-none focus:text-gray-600 p-2" />
            </div>
          </div>
        </div>
      </div>

      <hr />

      <div class="md:inline-flex  space-y-4 md:space-y-0  w-full p-4 text-gray-500 items-center">
        <h2 class="md:w-1/3 mx-auto max-w-sm">Change password</h2>
        <div class="md:w-2/3 mx-auto max-w-sm space-y-5">
          <div>
            <label class="text-sm text-gray-400">Old password</label>
            <div class="w-full inline-flex border">
              <div class="w-1/12 pt-2 bg-gray-100">
                <svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
              </div>
              <input type="password" name="oldPassword" class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                placeholder="*******" />
            </div>
          </div>
          <div>
            <label class="text-sm text-gray-400">New Password</label>
            <div class="w-full inline-flex border">
              <div class="pt-2 w-1/12 bg-gray-100">
                <svg fill="none" class="w-6 text-gray-400 mx-auto" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>

              </div>
              <input type="password" name="newPassword" class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                placeholder="*******" />
            </div>
          </div>
        </div>
      </div>

      <hr />


      <div class="md:inline-flex w-full space-y-4 md:space-y-0 p-8 text-gray-500 text-center">
        <button
          class="text-white mx-auto max-w-sm rounded-md text-center bg-red-400 py-2 px-4 inline-flex items-center focus:outline-none md:float-right hover:bg-red-600"
          type="submit">
          <svg fill="none" class="w-4 text-white mr-2" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
          </svg>
          Update
        </button>
      </div>


    </div>
  </div>
</form>