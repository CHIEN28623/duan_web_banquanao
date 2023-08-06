<section class="container mx-auto mt-10">
  <div class="flex shadow-md my-10">
    <div class="w-3/4 bg-white px-10 py-10">
      <div class="flex justify-between border-b pb-8">
        <h1 class="font-semibold text-2xl">Chi tiết mã đơn
          <?= $order_id ?>
          <h2 class="font-semibold text-2xl">
            <?= $totalItem ?> sản phẩm
          </h2>
      </div>
      <div class="flex mt-10 mb-5">
        <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Chi tiết sản phẩm</h3>
        <h3 class="font-semibold  text-gray-600 text-xs uppercase w-1/5 text-center">Số lượng</h3>
        <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center">Đơn giá</h3>
        <h3 class="font-semibold  text-gray-600 text-xs uppercase w-1/5 text-center">Tổng giá</h3>
        <h3 class="font-semibold  text-gray-600 text-xs uppercase w-1/5 text-center">Kích cỡ</h3>
      </div>
      <!-- product -->
      <?php foreach ($order_items as $item) { ?>
        <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
          <div class="flex w-2/5">
            <div class="w-20">
              <img class="h-24" src="/<?= $item['image'] ?>" alt="">
            </div>
            <div class="flex flex-col justify-between ml-4 flex-grow">
              <span class="font-bold text-sm">
                <?= $item['name'] ?>
              </span>
              <span class="text-red-500 text-xs">
                <?= $item['category_name'] ?>
              </span>
            </div>
          </div>
          <div class="flex justify-center w-1/5">

            <span class="mx-2 border text-center w-8">
              <?= $item['quantity'] ?>
            </span>



          </div>
          <span class="text-center w-1/5 font-semibold text-sm">
            <?= number_format($item['price'] - $item['price'] * $item['discount'] / 100, 0, ',', '.') ?> VND
          </span>
          <span class="text-center w-1/5 font-semibold text-sm">
            <?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?>
            VND
          </span>
          <span class="text-center w-1/5 font-semibold text-sm ">
            Size
            <?= substr($item['size'], 5) ?>
          </span>
        </div>
      <?php } ?>

      <!-- product -->



      <a href="/site/order?list" class="flex font-semibold text-indigo-600 text-sm mt-10">

        <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
          <path
            d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
        </svg>
        Quay lại danh sách đơn hàng
      </a>
    </div>


  </div>
</section>