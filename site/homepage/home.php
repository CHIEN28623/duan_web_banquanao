<?php
require "search.php";
?>



<?php foreach ($categories as $category) { ?>

  <section class="bg-white py-4">

    <div class="container mx-auto flex items-center flex-wrap pt-4 pb-4">

      <nav id="store" class="w-full z-30 top-0 px-6 py-1 flex">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

          <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
            <?= $category['name'] ?>
          </a>
        </div>
        <div class="flex hover:underline">
          <a href="../product/index.php?category_id=<?= $category['category_id'] ?>" class="py-2 px-4 text-center text-gray-700 font-semibold hover:underline whitespace-nowrap">Xem thêm!
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
            </svg>

          </a>
        </div>
      </nav>

      <?php
      $items = product_select_by_category($category['category_id']);

      // Lặp qua từng sản phẩm trong mảng $items
      foreach ($items as $item) {
        extract($item);
      ?>
        <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
          <a href="../product?product-details&id=<?php echo $product_id ?>">
            <img class="hover:grow hover:shadow-lg" src="/<?= $image ?>">
            <div class="pt-3 flex items-center justify-between">
              <p class="font-bold text-xl">
                <?= $name ?>
              </p>
            </div>
            <p class="flex gap-3">
              <s class="pt-1 text-gray-900">
                <?= number_format($price, 0, ',', '.') ?> <span class="text-gray-500">VND</span>
              </s>
              <span class="pt-1 text-blue-500">
                <?= number_format($price - $price * $discount / 100, 0, ',', '.') ?> VND
              </span>
            </p>
          </a>
        </div>
      <?php
      }
      ?>

    </div>

  </section>

<?php } ?>