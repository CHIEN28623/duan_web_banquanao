<?php
$count = 0;

if (isset($_SESSION['cart'])) {
  foreach ($_SESSION['cart'] as $item) {
    $count += $item['quantity'];
  }
}

?>

<div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3 md:px-6">

  <label for="menu-toggle" class="cursor-pointer md:hidden block">
    <svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
      viewBox="0 0 20 20">
      <title>Menu</title>
      <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
    </svg>
  </label>
  <input class="hidden" type="checkbox" id="menu-toggle" />

  <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1" id="menu">
    <nav>
      <ul class="md:flex items-center justify-between text-base text-gray-700 pt-4 md:pt-0">
        <li><a class="inline-block no-underline hover:text-black hover:underline py-2 px-4" href="/index.php">Trang
            chủ</a>
        </li>
        <li><a class="inline-block no-underline hover:text-black hover:underline py-2 px-4"
            href="/site/product/index.php">Sản phẩm</a></li>
        <?php if ($_SESSION['is_admin'] == 1) { ?>
        <li><a class="inline-block no-underline hover:text-black hover:underline py-2 px-4"
            href="/admin/homepage/index.php">Admin</a>
        </li>
        <?php } ?>
      </ul>
    </nav>
  </div>



  <div class="order-1 md:order-2">
    <a class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl "
      href="/site/homepage/index.php">
      <svg class="fill-current text-gray-800 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
        viewBox="0 0 24 24">
        <path
          d="M5,22h14c1.103,0,2-0.897,2-2V9c0-0.553-0.447-1-1-1h-3V7c0-2.757-2.243-5-5-5S7,4.243,7,7v1H4C3.447,8,3,8.447,3,9v11 C3,21.103,3.897,22,5,22z M9,7c0-1.654,1.346-3,3-3s3,1.346,3,3v1H9V7z M5,10h2v2h2v-2h6v2h2v-2h2l0.002,10H5V10z" />
      </svg>
      Men's Fashion
    </a>
  </div>

  <div class="order-2 md:order-3 flex items-center justify-between" id="nav-content">

    <?php
    if (isset($_SESSION['image'])) {
      echo "<a class='inline-block no-underline hover:text-black' href='/site/account?profile'><img src='" . $_SESSION['image'] . "' alt='avatar' class='rounded-full h-8 w-8 object-cover'></a>";

    } else {
      echo '
      <a class="inline-block no-underline hover:text-black cursor-pointer" href="/site/account/login.php">
      <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
        viewBox="0 0 24 24">
        <circle fill="none" cx="12" cy="7" r="3" />
        <path
          d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5S14.757 2 12 2zM12 10c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3S13.654 10 12 10zM21 21v-1c0-3.859-3.141-7-7-7h-4c-3.86 0-7 3.141-7 7v1h2v-1c0-2.757 2.243-5 5-5h4c2.757 0 5 2.243 5 5v1H21z" />
      </svg>
    </a>
      ';
    }
    ?>

    <?php
    if (isset($_SESSION['fullname'])) {
      echo '<a class="text-gray-600 no-underline hover:text-black hover:underline mx-3 cursor-pointer" href="/site/account/login.php?logout" > Đăng xuất </a>';

    }


    ?>

    <a class="pl-3 inline-block no-underline hover:text-black relative" href="/site/homepage?cart">
      <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
        viewBox="0 0 24 24">
        <path
          d="M21,7H7.462L5.91,3.586C5.748,3.229,5.392,3,5,3H2v2h2.356L9.09,15.414C9.252,15.771,9.608,16,10,16h8c0.4,0,0.762-0.238,0.919-0.606l3-7c0.133-0.309,0.101-0.663-0.084-0.944C21.649,7.169,21.336,7,21,7zM17.341,14h-6.697L8.371,9h11.112L17.341,14z" />
        <circle cx="10.5" cy="18.5" r="1.5" />
        <circle cx="17.5" cy="18.5" r="1.5" />
      </svg>
      <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
      <span
        class="cart-number absolute top-[-6px] right-[-5px] bg-red-500 text-white rounded-full text-xs w-4 h-4 flex items-center justify-center"><?= count($_SESSION['cart']) ?></span>
      <?php } ?>
    </a>

    <a href="/site/order/index.php?list">
      <svg xmlns=" http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="w-6 h-6 ml-4 cursor-pointer">
        <path stroke-linecap="round" stroke-linejoin="round"
          d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
      </svg>
    </a>


  </div>
</div>