<?php
require "../../global.php";
require "../../dao/user.php";


$error = [];

if (exist_param("logout")) {
  session_unset();
  header("location: /site/homepage/index.php");
}

if (isset($_COOKIE['email']) && isset($_COOKIE['pass'])) {
  $email = $_COOKIE['email'];
  $password = $_COOKIE['pass'];
} else {
  $email = "";
  $password = "";
}


if ($_POST) {
  extract($_POST);

  if (users_exist($email)) {
    $user = users_select_by_email($email);
    if ($user['password'] != $password) {
      $error['password'] = "Password is not correct!";
    } else {

      if (exist_param("remember")) {
        add_cookie("email", $user['email'], 30);
        add_cookie("pass", $user['password'], 30);
      } else {
        delete_cookie("email");
        delete_cookie("pass");
      }
      $_SESSION['email'] = $user['email'];
      $_SESSION['fullname'] = $user['fullname'];
      $_SESSION['is_admin'] = $user['is_admin'];
      $_SESSION['password'] = $user['password'];
      $_SESSION['user_id'] = $user['user_id'];
      $_SESSION['image'] = $user['image'];

      if ($user['is_admin'] == 1) {
        header("location: /admin");
      } else {
        header("location: /site/homepage/index.php");
      }

    }
  } else {
    $error['email'] = "Email is not exist!";
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../output.css" />
  <title>Sign in</title>
</head>


<body>
  <section class="bg-gray-50">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="/site/homepage/index.php" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
        <svg class="fill-current text-gray-800 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
          viewBox="0 0 24 24">
          <path
            d="M5,22h14c1.103,0,2-0.897,2-2V9c0-0.553-0.447-1-1-1h-3V7c0-2.757-2.243-5-5-5S7,4.243,7,7v1H4C3.447,8,3,8.447,3,9v11 C3,21.103,3.897,22,5,22z M9,7c0-1.654,1.346-3,3-3s3,1.346,3,3v1H9V7z M5,10h2v2h2v-2h6v2h2v-2h2l0.002,10H5V10z" />
        </svg>
        Men's Fashion
      </a>
      <div class="w-full bg-white rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0 ">
        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
          <h1 class="text-xl font-bold leading-tight tracking-tight md:text-2xl text-gray-900">
            Sign in to your account
          </h1>
          <form class="space-y-4 md:space-y-6" action="" method="post">
            <div>
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your email</label>
              <input type="email" name="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                placeholder="name@company.com" required <?php if (isset($_COOKIE['email']))
                  echo "value=" . $_COOKIE['email'] ?> />
                <?php
                if (isset($error['email'])) {
                  echo '<p class="alert">' . $error['email'] . '</p>';
                }
                ?>
            </div>
            <div>
              <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
              <input type="password" name="password" id="password" placeholder="••••••••"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-[#2563eb] block w-full p-2.5"
                required value="<?php if (isset($_COOKIE['pass']))
                  echo $_COOKIE['pass'] ?>" />
                <?php
                if (isset($error['password'])) {
                  echo '<p class="alert">' . $error['password'] . '</p>';
                }
                ?>
            </div>
            <div class="flex items-center justify-between">
              <div class="flex items-center gap-2">
                <input type="checkbox" name="remember" id="remember" checked />
                <label for="remember">Remember me?</label>
              </div>
              <a href="#" class="text-sm font-medium text-primary-600 hover:underline">Forgot password?</a>
            </div>
            <button type="submit"
              class="w-full text-white bg-[#2563eb] hover:bg-[#1d4ed8] rounded-lg text-sm px-5 py-4 text-center">
              Sign in
            </button>
            <p class="text-sm font-light text-gray-500 400 text-center">
              Don’t have an account yet?
              <a href="./register.php" class="font-medium text-[#2563eb] hover:underline">Sign up</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>

</html>