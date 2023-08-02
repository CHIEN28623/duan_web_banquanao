<div class="container w-[96%]">
    <div class="container mx-auto w-[500px] py-10">
        <h2 class="text-center text-2xl font-bold mb-6">Thông Tin Đặt Hàng</h2>

        <form action="/site/order?thanhtoan" method="post">
            <?php foreach ($users as $item) {
                extract($item); ?>
                <input type="text" name="fullname" placeholder="Tên người dùng" class="block w-full border 
                border-gray-400 rounded px-4 py-2 mb-4" value="<?= $item['fullname'] ?>" />
                <input type="text" name="phone_number" placeholder="Số điện thoại (bắt buộc)" class="block w-full border 
                border-gray-400 rounded px-4 py-2 mb-4" value="<?= $item['phone_number'] ?>" />
                <input type="text" name="address" placeholder="Địa điểm nhận hàng (bắt buộc)" class="block w-full border 
                border-gray-400 rounded px-4 py-2 mb-4" value="<?= $item['address'] ?>" />
                <div>
                <?php } ?>
                <button class="font-bold bg-blue-500 hover:bg-blue-600 text-white rounded px-4 py-2 w-full"
                    name="thanhtoan" type="submit">Thanh toán</button>
            </div>
        </form>
    </div>
</div>