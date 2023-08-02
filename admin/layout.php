<?php
session_start();

if (is_logged_in() && is_admin()) {
} else {
  header("Location: /site/homepage/index.php");
}

// exit;
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link href="../../output.css" rel="stylesheet">
  <script src="../../content/js/jquery.min.js" type="text/javascript"></script>
  <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"
    integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
  <script src="/admin/js/script.js" defer></script>
</head>

<body class="bg-[#F3F1EF]">

  <div class="flex ">
    <nav class="flex flex-col gap-4 pt-10 pl-12 ">
      <h1 class="font-bold  text-left pl-0 text-xl">Admin Panel</h1>
      <div class="flex flex-col items-start ml-5  gap-3 mb-10">
        <img src="<?= $_SESSION['image'] ?>" alt="" class="w-[100px] h-[100px] rounded-full">
        <p class="pl-1 text-neutral-600 font-bold text-[18px]">
          <?= $_SESSION['fullname'] ?>
        </p>

        <a class="flex cursor-pointer hover:underline" href="/site/homepage/">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
          </svg>
          Back to website
        </a>
      </div>




      <?php require 'menu.php'; ?>

    </nav>
    <div class="bg-white w-full h-full min-h-[100vh]   mt-4 mr-7">
      <?php require $VIEW_NAME; ?>
    </div>
  </div>

</body>

</html>