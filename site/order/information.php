<?php
$cart = $_SESSION['cart'];
$total = 0;
$totalItem = 0;

foreach ($cart as $item) {
  $total += $item['price'] * $item['quantity'];
  $totalItem += $item['quantity'];
}
?>
<div class="relative mx-auto w-full bg-white mt-4">
  <div class="grid min-h-screen grid-cols-10">
    <div class="col-span-full py-6 px-4 sm:py-12 lg:col-span-6 lg:py-24">
      <div class="mx-auto w-full max-w-lg">
        <h1 class="relative text-2xl font-medium text-gray-700 sm:text-3xl">Thông tin thanh toán<span
            class="mt-2 block h-1 w-10 bg-blue-600 sm:w-20"></span></h1>
        <form action="index.php?total=<?= $total + 50000 ?>" method="post" class="mt-10 flex flex-col space-y-4">
          <div><label for="fullname" class="text-xs font-semibold text-gray-500">Họ và tên</label><input id="fullname"
              name="fullname" placeholder="Nguyễn Văn A" value="<?= $_SESSION['fullname'] ?>"
              class="mt-1 block w-full border rounded border-gray-300 bg-gray-50 py-3 px-4 text-sm placeholder-gray-300 shadow-sm outline-none transition focus:ring-2 focus:ring-blue-500"
              required />
          </div>
          <div class="relative"><label for="phone_number" class="text-xs font-semibold text-gray-500">Số điện
              thoại</label><input type="number" id="phone_number" name="phone_number" placeholder="1234-5678-23123"
              class="border block w-full rounded border-gray-300 bg-gray-50 py-3 px-4 pr-10 text-sm placeholder-gray-300 shadow-sm outline-none transition focus:ring-2 focus:ring-blue-500" /><img
              src="/images/uQUFIfCYVYcLK0qVJF5Yw.png" alt="" class="absolute bottom-3 right-3 max-h-4" /></div>
          <div class="relative"><label for="address" class="text-xs font-semibold text-gray-500">Địa chỉ giao
              hàng</label><input type="text" id="address" required name="address" placeholder="xxxxxxxxx"
              class="border block w-full rounded border-gray-300 bg-gray-50 py-3 px-4 pr-10 text-sm placeholder-gray-300 shadow-sm outline-none transition focus:ring-2 focus:ring-blue-500" /><img
              src="/images/uQUFIfCYVYcLK0qVJF5Yw.png" alt="" class="absolute bottom-3 right-3 max-h-4" /></div>
          <div class="relative"><label for="email" class="text-xs font-semibold text-gray-500">Email</label><input
              type="email" id="email" name="email" placeholder="xxxxxxxxx@example.com" required
              value="<?= $_SESSION['email'] ?>"
              class="border block w-full rounded border-gray-300 bg-gray-50 py-3 px-4 pr-10 text-sm placeholder-gray-300 shadow-sm outline-none transition focus:ring-2 focus:ring-blue-500" /><img
              src="/images/uQUFIfCYVYcLK0qVJF5Yw.png" alt="" class="absolute bottom-3 right-3 max-h-4" /></div>
          <?php
          if (!empty($_SESSION['user_id'])) { ?>
            <button type="submit" name="success"
              class="mt-4 inline-flex w-full items-center justify-center rounded bg-indigo-600 py-2.5 px-4 text-base font-semibold tracking-wide text-white text-opacity-80 outline-none ring-offset-2 transition hover:text-opacity-100 focus:ring-2 focus:ring-indigo-500 sm:text-lg">Xác
              nhận đơn hàng</button>
          <?php } else { ?>
            <a href="/site/account/login.php"
              class="cursor-pointer mt-4 inline-flex w-full items-center justify-center rounded bg-indigo-600 py-2.5 px-4 text-base font-semibold tracking-wide text-white text-opacity-80 outline-none ring-offset-2 transition hover:text-opacity-100 focus:ring-2 focus:ring-indigo-500 sm:text-lg">Vùi
              lòng đăng nhập để đặt hàng!</a>
          <?php } ?>
        </form>

      </div>
      <div class="mx-auto w-full max-w-lg">
        <p class="mt-8 text-lg font-medium">Chọn dịch vụ vận chuyển</p>
        <form class="mt-5 grid gap-6">
          <div class="relative">
            <input class="peer hidden" id="radio_1" type="radio" name="radio" checked />
            <span
              class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
            <label
              class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4"
              for="radio_1">
              <img class="w-14 object-contain"
                src="data:image/png;base64,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"
                alt="" />
              <div class="ml-5">
                <span class="mt-2 font-semibold">Viettel Post</span>
                <p class="text-slate-500 text-sm leading-6">Vận chuyển: 2-4 Ngày</p>
              </div>
            </label>
          </div>
          <div class="relative">
            <input class="peer hidden" id="radio_2" type="radio" name="radio" checked />
            <span
              class="peer-checked:border-gray-700 absolute right-4 top-1/2 box-content block h-3 w-3 -translate-y-1/2 rounded-full border-8 border-gray-300 bg-white"></span>
            <label
              class="peer-checked:border-2 peer-checked:border-gray-700 peer-checked:bg-gray-50 flex cursor-pointer select-none rounded-lg border border-gray-300 p-4"
              for="radio_2">
              <img class="w-14 object-contain"
                src="data:image/jpeg;base64,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"
                alt="" />
              <div class="ml-5">
                <span class="mt-2 font-semibold">Giao hàng nhanh</span>
                <p class="text-slate-500 text-sm leading-6">Vận chuyển: 2-4 ngày</p>
              </div>
            </label>
          </div>
        </form>
      </div>
    </div>

    <div class="relative col-span-full flex flex-col py-6 pl-8 pr-4 sm:py-12 lg:col-span-4 lg:py-24">

      <div>
        <img src="" alt="" class="absolute inset-0 h-full w-full object-cover" />
        <div class="absolute inset-0 h-full w-full bg-gradient-to-t from-indigo-800 to-indigo-400 opacity-95"></div>
      </div>

      <div class="relative">


        <ul class="space-y-5">
          <?php foreach ($_SESSION['cart'] as $item) { ?>
            <li class="flex justify-between">
              <div class="inline-flex">
                <img src="/<?= $item['image'] ?>" alt="" class="max-h-24" />
                <div class="ml-3">
                  <p class="text-base font-semibold text-white">
                    <?= $item['quantity'] ?> x
                    <?= $item['name'] ?>
                  </p>
                  <p class="text-sm font-medium text-white text-opacity-80">
                    <?= $item['category'] ?>
                  </p>
                </div>
              </div>
              <p class="text-sm font-semibold text-white">
                <?= number_format($item['price'], 0, ',', '.') ?> VND
              </p>
            </li>
          <?php } ?>
        </ul>


        <div class="space-y-2 mt-8">
          <p class="flex justify-between text-lg font-bold text-white"><span>Tổng giá</span><span>
              <?= number_format($total, 0, ',', '.') ?> VND
            </span>
          </p>
          <p class="flex justify-between text-sm font-medium text-white"><span>Khuyến mãi giảm
              giá</span><span>
              <?= number_format($_SESSION['promo'] * $total / 100, 0, ',', '.') ?> VND
            </span></p>
          <p class="flex justify-between text-sm font-medium text-white"><span>Phí vận chuyển</span><span>50.000
              VND</span></p>
          <p class="flex justify-between text-lg font-bold text-white"><span>Tổng hoá đơn</span><span>
              <?= number_format($total + 50000 - $_SESSION['promo'] * $total / 100, 0, ',', '.') ?> VND
            </span>
          </p>
        </div>
      </div>
      <div class="relative mt-10 text-white">
        <h3 class="mb-5 text-lg font-bold">Hỗ trợ</h3>
        <p class="text-sm font-semibold">+84 364350578 <span class="font-light">(Số máy nóng)</span></p>
        <p class="mt-1 text-sm font-semibold">support@nhom1.com <span class="font-light">(Email)</span></p>
        <p class="mt-2 text-xs font-medium">Gọi cho chúng tôi nêu có bất cứ vấn đề gì phát sinh</p>
      </div>
      <div class="relative mt-10 flex">
        <p class="flex flex-col"><span class="text-sm font-bold text-white">Cam kết hoàn trả</span><span
            class="text-xs font-medium text-white">trong vòng 30 ngày mua hàng</span></p>
      </div>
    </div>
  </div>
</div>