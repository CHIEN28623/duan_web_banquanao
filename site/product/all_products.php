<section class="bg-white dark:bg-gray-900">
  <div class="container px-6 py-8 mx-auto">
    <div class="lg:flex lg:-mx-2">
      <div class="space-y-3 lg:w-1/5 lg:px-2 lg:space-y-4">
        <?php
        foreach ($categories as $category) {
          ?>
        <a href='index.php?category_id=<?= $category['category_id'] ?>' class='block font-medium  <?php if ($category_id == $category['category_id']) {
              echo "text-blue-500";
            } else {
              echo "text-gray-500";
            }

            ?>  hover:underline'>
          <?= $category['name'] ?>
        </a>
        <?php
        }
        ?>
      </div>

      <div class="mt-6 lg:mt-0 lg:px-2 lg:w-4/5 ">
        <div class="flex items-center justify-between text-sm tracking-widest uppercase ">
          <p class="text-gray-500 ">
            <?= count($products) ?> Items
          </p>
          <div class="flex items-center gap-[10px]">
            <p class="text-gray-500 ">Sort</p>
            <select
              class="font-medium text-gray-700 p-2 rounded-md bg-transparent border border-blue-500 focus:outline-none"
              id="filter-select">
              <option value="#">Recommended</option>
              <option value="hightToLow">High To Low</option>
              <option value="lowToHigh">Low To High</option>
            </select>
          </div>
        </div>

        <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
          <?php foreach ($products as $product) { ?>
          <a class="flex flex-col items-center justify-center w-full max-w-lg mx-auto"
            href="index.php?product-details&id=<?= $product['product_id'] ?>">
            <img class="object-cover w-full rounded-md cursor-pointer hover:grow" src="/<?= $product['image'] ?>"
              alt="T-Shirt">
            <h4 class="mt-2 text-lg font-medium text-gray-700 ">
              <?= $product['name'] ?>
            </h4>
            <p class="flex gap-3">
              <s class="pt-1 text-gray-900">
                <?= number_format($product['price']) ?> <span class="text-gray-500">VND</span>
              </s>
              <span class="pt-1 text-blue-500">
                <?= number_format($product['price'] - $product['price'] * $product['discount'] / 100) ?> VND
              </span>
            </p>

          </a>
          <?php } ?>
        </div>




      </div>
    </div>
  </div>
</section>