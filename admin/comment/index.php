<?php
require "../../global.php";
require "../../dao/comment.php";
require "../../dao/statistic.php";


extract($_REQUEST);
if (exist_param("product_id")) {
  if (exist_param("btn_delete")) {
    comments_delete($comment_id);
    $MESSAGE = "Delete successfully!";
  }
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = 1;
  }
  $comments_per_page = 10;
  $totalPage = ceil((comments_count($product_id)) / $comments_per_page);
  $start_limit = ($page - 1) * $comments_per_page;
  $end_limit = $comments_per_page;

  $items = comments_pagination_by_product($product_id, $start_limit, $end_limit);

  if (count($items) == 0) {
    $items = statistic_comment();
    $VIEW_NAME = "comment/list.php";
  } else {
    $VIEW_NAME = "comment/details.php";
  }
} else {
  try {
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    } else {
      $page = 1;
    }
    $commentss_per_page = 10;
    $totalPage = ceil((count_products_has_comments()) / $commentss_per_page);
    $start_limit = ($page - 1) * $commentss_per_page;
    $end_limit = $commentss_per_page;

    $items = statistic_comment_pagination($start_limit, $end_limit);
  } catch (Exception $exc) {
    echo $exc->getMessage();
  }
  $VIEW_NAME = "comment/list.php";
}

require "../layout.php";

?>