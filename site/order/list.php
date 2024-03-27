<section class="container mx-auto mt-10">
  <div class="flex shadow-md my-10">
    <div class="bg-white px-10 py-10 lg:w-3/4">
      <div class="flex justify-between border-b pb-8">
        <h1 class="font-semibold text-2xl">Danh sách đơn hàng của bạn</h1>

      </div>
      <div class="flex mt-10 mb-5">
        <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/5">Mã đơn hàng</h3>
        <h3 class="font-semibold  text-gray-600 text-xs uppercase w-1/5 text-center">Trạng thái</h3>
        <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5 text-center">Địa chỉ</h3>
        <h3 class="font-semibold  text-gray-600 text-xs uppercase w-1/5 text-center">Tổng giá</h3>
        <h3 class="font-semibold  text-gray-600 text-xs uppercase w-1/5 text-center ml-8">Số điện thoại</h3>
        <h3 class="font-semibold  text-gray-600 text-xs uppercase w-1/5 text-center"></h3>
      </div>
      <!-- product -->
      <?php foreach ($orders as $item) { ?>
        <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
          <div class="flex w-1/5">
            <div class="w-20 pl-10">
              <?= $item['order_id'] ?>
            </div>
            <div class="flex flex-col justify-between ml-4 flex-grow">
            </div>
          </div>
          <div class="flex justify-center w-1/5">

            <span class="mx-2 border text-center">
              <?php if ($item['status'] == 0) {
                echo "Đang chờ xác nhận";
              } else if ($item['status'] == 1) {
                echo "Đang giao hàng";
              } else {
                echo "Đã giao hàng";
              }


              ?>
            </span>



          </div>
          <span class="text-center w-2/5 font-semibold text-sm">
            <?= $item['address'] ?>
          </span>
          <span class="text-center w-1/5 font-semibold text-sm ml-[-40px]">
            <?= number_format($item['total_price'], 0, ',', '.') ?>
            VND
          </span>
          <span class="text-center w-1/5 font-semibold text-sm ">
            <?= $item['phone_number'] ?>
          </span>
          <a href="/duan1/site/order/index.php?order_detail&id=<?= $item['order_id'] ?>"
            class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 text-center text-sm text-white uppercase w-[140px] ">Chi
            tiết</a>
        </div>
      <?php } ?>

      <!-- product -->



      <a href="/duan1/site/product" class="flex font-semibold text-indigo-600 text-sm mt-10">

        <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512">
          <path
            d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
        </svg>
        Tiếp tục mua hàng
      </a>
    </div>



  </div>
</section>