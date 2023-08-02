<?php

if (isset($_POST['newComment'])) {
  extract($_POST);
  comments_insert($newComment, $_SESSION['user_id'], $product_id);
  $comments = comments_select_by_product($product_id);
}

?>

<section class="bg-gray-100  py-8 lg:py-16">
  <div class="max-w-2xl mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-lg lg:text-3xl font-bold text-gray-900 ">Discussion (
        <?= comments_count($product_id) ?> )
      </h2>
    </div>
    <form class="mb-6" method="post" action="">
      <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200">
        <label for="comment" class="sr-only text-gray-800">Your comment</label>
        <textarea id="comment" rows="6" name="newComment"
          class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none "
          placeholder="Write a comment..." required></textarea>
      </div>
      <button type="submit" <?php if (!is_logged_in())
        echo "disabled" ?>
          class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-sky-500 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800 disabled:opacity-40 disabled:bg-slate-400 cursor-pointer">
          Post comment
        </button>
      <?php if (!is_logged_in())
        echo "<span class='text-red-400'>You need log in to comment!</span>" ?>
      </form>
      <h3>Or</h3>
      <form class="mb-6 flex items-center gap-7 rounded-[6px] bg-white px-5 py-9" method="post" action="">
        <div class="rating">
          <ion-icon class="s1" name="star"></ion-icon>
          <ion-icon class="s2" name="star"></ion-icon>
          <ion-icon class="s3" name="star"></ion-icon>
          <ion-icon class="s4" name="star"></ion-icon>
          <ion-icon class="s5" name="star"></ion-icon>

        </div>
        <button type="submit" <?php if (!is_logged_in())
        echo "disabled" ?>
          class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-sky-500 rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800 disabled:opacity-40 disabled:bg-slate-400 cursor-pointer">
          Rating
        </button>
      <?php if (!is_logged_in())
        echo "<span class='text-red-400'>You need log in to comment!</span>" ?>
      </form>

    <?php foreach ($comments as $c) {
        extract($c);
        extract(users_select_by_id($user_id));
        ?>

      <article class="p-6 mb-6 text-base bg-white rounded-lg ">
        <div class="flex justify-between items-center mb-2 relative">
          <div class="flex items-center">
            <p class="inline-flex items-center mr-3 text-sm text-gray-900 "><img class="mr-2 w-6 h-6 rounded-full"
                src="<?= $image ?>" alt="Michael Gough"><?= $fullname ?>
            </p>
            <p class=" text-sm text-gray-600 "><time pubdate datetime=" 2022-02-08" title="February 8th, 2022">
                <?= $created_at ?>
              </time></p>
          </div>

        </div>
        <p class="text-gray-500 ">
          <?= $body ?>
        </p>

      </article>
    <?php } ?>

  </div>
</section>