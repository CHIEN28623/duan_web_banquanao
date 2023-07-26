<?php
require "search.php";
?>

<section class="bg-gray-100 pb-8 mt-4">

  <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

    <nav id="store" class="w-full z-30 top-0 px-6 py-1">
      <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

        <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
          Special Products
        </a>

      </div>
    </nav>

    <?php
    foreach ($items as $item) {
      extract($item);
      ?>

    <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
      <a href="../product/product-details&id=<?php echo $product_id ?>">
        <img class="hover:grow hover:shadow-lg" src="/<?= $image ?>">
        <div class="pt-3 flex items-center justify-between">
          <p class="font-bold text-xl">
            <?= $name ?>
          </p>

        </div>
        <p class="flex gap-3">
          <s class="pt-1 text-gray-900">
            <?= number_format($price) ?> <span class="text-gray-500">VND</span>
          </s>
          <span class="pt-1 text-blue-500">
            <?= number_format($price - $price * $discount / 100) ?> VND
          </span>
        </p>
      </a>
    </div>
    <?php
    }
    ?>

  </div>

</section>

<?php foreach ($categories as $category) { ?>

<section class="bg-white py-8">

  <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

    <nav id="store" class="w-full z-30 top-0 px-6 py-1">
      <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

        <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
          <?= $category['name'] ?>
        </a>
      </div>
    </nav>

    <?php
      $items = product_select_by_category($category['category_id']);
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
            <?= number_format($price) ?> <span class="text-gray-500">VND</span>
          </s>
          <span class="pt-1 text-blue-500">
            <?= number_format($price - $price * $discount / 100) ?> VND
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