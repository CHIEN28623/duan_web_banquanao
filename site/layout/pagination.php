<div class="pagination flex justify-center mt-8">
  <ul class="flex list-none m-0 p-0 gap-2">
    <?php

    if ($page > 1) {
      ?>
    <li>
      <a href="index.php?filter=<?= $filter ?>&category_id=<?= $category_id ?>&page=<?= $page - 1 ?>"
        class="block py-2 px-4 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 active:bg-blue-500 active:text-white font-medium">
        Trước
      </a>
    </li>
    <?php
    }
    ?>
    <?php
    for ($i = 1; $i <= $totalPage; $i++) {
      ?>
    <li>
      <a href="index.php?filter=<?= $filter ?>&category_id=<?= $category_id ?>&page=<?= $i ?>"
        class="block py-2 px-4  border border-gray-300 rounded-lg text-gray-700   active:text-white font-medium <?= ($i == $page) ? 'bg-blue-500 text-white' : 'bg-white hover:bg-gray-100' ?>">
        <?= $i ?>
      </a>
    </li>
    <?php
    }
    ?>
    <?php
    if ($page < $totalPage) {
      ?>
    <li>
      <a href="index.php?filter=<?= $filter ?>&category_id=<?= $category_id ?>&page=<?= $page + 1 ?>"
        class="block py-2 px-4 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 active:bg-blue-500 active:text-white font-medium">
        Sau
      </a>
    </li>
    <?php
    }
    ?>
  </ul>
</div>