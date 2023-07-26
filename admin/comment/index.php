<?php
require "../../global.php";
require "../../dao/comment.php";
require "../../dao/statistic.php";


extract($_REQUEST);
if (exist_param("product_id")) {
  if (exist_param("btn_delete")) {
    comments_delete($commentId);
    $MESSAGE = "Delete successfully!";
  }
  $items = comments_select_by_product($product_id);

  if (count($items) == 0) {
    $items = statistic_comment();
    $VIEW_NAME = "comment/list.php";
  } else {
    $VIEW_NAME = "comment/details.php";
  }
} else {
  try {
    $items = statistic_comment();
  } catch (Exception $exc) {
    echo $exc->getMessage();
  }
  $VIEW_NAME = "comment/list.php";
}

require "../layout.php";

?>