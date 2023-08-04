<?php
require_once '../../global.php';
require_once '../../dao/user.php';
require_once '../../dao/category.php';
require_once '../../dao/product.php';
require_once '../../dao/comment.php';


extract(product_select_by_id($_GET['id']));
product_increase_view($product_id);
$category = category_select_by_id($category_id)['name'];
$_SESSION['cart'] = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();


if (isset($_POST['add'])) {
  extract($_POST);

  // add cart to session

  $new_cart = array(
    'id' => $product_id,
    'quantity' => $quantity,
    'size' => $size,
    'category' => $category,
    'name' => $name,
    'price' => $price - $price * $discount / 100,
    'image' => $image
  );

  // Nếu trùng size và id thì tăng số lượng
  $isNotExist = true;
  foreach ($_SESSION['cart'] as $key => $item) {
    if ($item['id'] == $product_id && $item['size'] == $size) {
      $isNotExist = false;
      $_SESSION['cart'][$key]['quantity'] += $quantity;
      echo "<script>window.location.href='product';</script>";
      exit;
    }
  }

  if ($isNotExist) {
    array_push($_SESSION['cart'], $new_cart);
  }


  echo "<script>window.location.href='product';</script>";
}
?>

<section class="text-gray-700 body-font overflow-hidden bg-white">
  <div class="container px-5 py-24 mx-auto">
    <div class="lg:w-4/5 mx-auto flex flex-wrap">
      <img alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200"
        src="/<?= $image ?>">
      <form class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0" method="post" action="">
        <input type="text" name="product-details" hidden>
        <input type="text" name="id" value="<?= $product_id ?>" hidden>
        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">
          <?= $name ?>
        </h1>
        <div class="flex mb-4">
          <div class="flex items-center">
            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <title>First star</title>
              <path
                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
              </path>
            </svg>
            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <title>Second star</title>
              <path
                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
              </path>
            </svg>
            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <title>Third star</title>
              <path
                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
              </path>
            </svg>
            <svg aria-hidden="true" class="w-5 h-5 text-gray-600" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <title>Fourth star</title>
              <path
                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
              </path>
            </svg>
            <svg aria-hidden="true" class="w-5 h-5 text-gray-600 " fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <title>Fifth star</title>
              <path
                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
              </path>
            </svg>
            <p class="ml-2 text-sm font-medium text-gray-500 ">4.95 out of 5</p>
          </div>
          <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200">
            <a class="text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                viewBox="0 0 24 24">
                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
              </svg>
            </a>
            <a class="ml-2 text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                viewBox="0 0 24 24">
                <path
                  d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                </path>
              </svg>
            </a>
            <a class="ml-2 text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                viewBox="0 0 24 24">
                <path
                  d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                </path>
              </svg>
            </a>
          </span>
        </div>
        <p class="leading-relaxed">
          <?= $description ?>
        </p>
        <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
          <label for="size" class="block font-medium text-gray-700 w-[120px]">Select size:</label>
          <select id="size" name="size"
            class="block w-[200px] py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            <option value="S" class="text-gray-700">S</option>
            <option value="M" class="text-gray-700">M</option>
            <option value="L" class="text-gray-700">L</option>
          </select>

        </div>

        <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
          <div class="flex">
            <span class="mr-3">Quantity</span>
            <input type="number" name="quantity" class="border-2 rounded-[5px] text-center w-[100px] border-slate-400"
              value="1" />
          </div>

        </div>

        <div class="flex flex-col gap-4">
          <div class="flex gap-2">
            <s class="title-font font-medium text-xl text-gray-900">
              <?= number_format($price, 0, ',', '.'); ?> VND
            </s>
            <span class="title-font font-medium text-2xl text-red-500">
              <?= number_format($price - $price * $discount / 100, 0, ',', '.'); ?> VND
            </span>
          </div>
          <div>
            <button type="submit" name="add"
              class="flex mr-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded">Add
              to cart</button>
          </div>
        </div>
    </div>
    </form>
  </div>
  </div>
</section>

<?php
$comments = comments_select_by_product($product_id);
require "comments.php";
$items = product_select_by_category_except_product_id($category_id, $_GET['id']);
require "moreProducts.php"
  ?>