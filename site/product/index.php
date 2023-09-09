<?php
require_once '../../global.php';

extract($_REQUEST);

if (exist_param("account")) {
  $VIEW_NAME = "account/profile.php";
} else if (exist_param("product-details")) {
  $VIEW_NAME = "product/products.php";
} else {
  require_once '../../dao/product.php';
  require_once '../../dao/category.php';
  $categories = category_select_all();
  $filter = null;


  if (!isset($category_id)) {
    $category_id = $categories[0]['category_id'];
  }

  $products_per_page = 8;

  $totalPage = ceil(product_count_by_category($category_id) / $products_per_page);

  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = 1;
  }

  if (isset($_GET['filter'])) {
    $filter = $_GET['filter'];
  }

  $start_limit = ($page - 1) * $products_per_page;

  if ($filter) {
    if ($filter == 'highToLow') {
      $products = product_pagination_by_category_price_desc($category_id, $start_limit, $products_per_page);
    } else if ($filter == 'lowToHigh') {
      $products = product_pagination_by_category_price_asc($category_id, $start_limit, $products_per_page);
    }

  } else {
    $products = product_pagination_by_category_id($category_id, $start_limit, $products_per_page);
  }


  $VIEW_NAME = "product/all_products.php";

}

require '../layout.php';