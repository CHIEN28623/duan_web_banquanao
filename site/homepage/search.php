<form class="w-[50%] mx-auto mt-4" action="index.php">
  <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
  <div class="relative">
    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
      <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="none" stroke="currentColor" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
      </svg>
    </div>
    <input type="search" id="default-search" name="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 outline-none 
      placeholder=" Search products...">
    <button type="submit"
      class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 0">Tìm
      kiếm</button>
  </div>
</form>

<?php if (isset($searchedItems)) { ?>

  <section class="bg-white pb-8">

    <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

      <nav id="store" class="w-full z-30 top-0 px-6 py-1">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-2 py-3">

          <a class="uppercase tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="#">
            Sản phẩm tìm kiếm
          </a>


        </div>
      </nav>

      <?php
      foreach ($searchedItems as $item) {
        extract($item);
        ?>

        <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
          <a href="../product?product-details&id=<?php echo $product_id ?>">
            <img class="hover:grow hover:shadow-lg" src="/<?= $image ?>">
            <div class="pt-3 flex items-center justify-between">
              <p class="font-bold text-xl">
                <?= $name ?>
              </p>
              <svg class="h-6 w-6 fill-current text-gray-500 hover:text-black" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24">
                <path
                  d="M12,4.595c-1.104-1.006-2.512-1.558-3.996-1.558c-1.578,0-3.072,0.623-4.213,1.758c-2.353,2.363-2.352,6.059,0.002,8.412 l7.332,7.332c0.17,0.299,0.498,0.492,0.875,0.492c0.322,0,0.609-0.163,0.792-0.409l7.415-7.415 c2.354-2.354,2.354-6.049-0.002-8.416c-1.137-1.131-2.631-1.754-4.209-1.754C14.513,3.037,13.104,3.589,12,4.595z M18.791,6.205 c1.563,1.571,1.564,4.025,0.002,5.588L12,18.586l-6.793-6.793C3.645,10.23,3.646,7.776,5.205,6.209 c0.76-0.756,1.754-1.172,2.799-1.172s2.035,0.416,2.789,1.17l0.5,0.5c0.391,0.391,1.023,0.391,1.414,0l0.5-0.5 C14.719,4.698,17.281,4.702,18.791,6.205z" />
              </svg>
            </div>
            <p class="flex gap-3">
              <s class="pt-1 text-gray-900">
                <?= number_format($price, 0, ',', '.') ?> <span class="text-gray-500">VND</span>
              </s>
              <span class="pt-1 text-red-500">
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