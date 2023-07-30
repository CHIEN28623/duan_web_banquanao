<div class="container mx-auto p-4">
  <h1 class="text-3xl font-bold mb-4">Your Orders</h1>
  <div class="flex flex-col">
    <!-- Cart items -->
    <div class="bg-white p-4 shadow-md rounded-lg mb-4">
      <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-bold">Product Title 1</h2>
      </div>
      <div class="flex items-center space-x-4">
        <img src="https://pubcdn.ivymoda.com/files/news/2023/07/24/21931621c250a1fcaa13c4416591083a.jpg" alt="Product 1"
          class="w-20 h-20 object-cover rounded-lg mr-4">
        <div class="flex space-x-4">
          <p class="text-gray-600">Price: $20</p>
          <p class="text-gray-600">Quantity: 1</p>
          <p class="text-gray-600">Order ID: ABC123</p>
          <p class="text-gray-600">Order Date: 2023-07-26</p>
          <p class="text-gray-600">Delivery Status: In Transit</p>
        </div>
        <div class="ml-auto space-x-2">
          <button
            class="bg-blue-500 text-white py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Edit</button>
          <button
            class="bg-red-500 text-white py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Delete</button>
        </div>
      </div>
    </div>

    <div class="bg-white p-4 shadow-md rounded-lg mb-4">
      <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-bold">Product Title 2</h2>
        <button class="text-red-500">Remove</button>
      </div>
      <div class="flex items-center space-x-4">
        <img src="https://pubcdn.ivymoda.com/files/news/2023/07/24/21931621c250a1fcaa13c4416591083a.jpg" alt="Product 2"
          class="w-20 h-20 object-cover rounded-lg mr-4">
        <div class="flex space-x-4">
          <p class="text-gray-600">Price: $30</p>
          <p class="text-gray-600">Quantity: 2</p>
          <p class="text-gray-600">Order ID: XYZ456</p>
          <p class="text-gray-600">Order Date: 2023-07-28</p>
          <p class="text-gray-600">Delivery Status: Delivered</p>
        </div>
        <div class="ml-auto space-x-2">
          <button
            class="bg-blue-500 text-white py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Edit</button>
          <button
            class="bg-red-500 text-white py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Delete</button>
        </div>
      </div>
    </div>
    <!-- End of cart items -->

  </div>
</div>