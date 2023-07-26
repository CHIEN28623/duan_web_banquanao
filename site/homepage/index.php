<?php
require_once '../../global.php';

if (exist_param("account")) {
  $VIEW_NAME = "account/profile.php";
} else if (exist_param("product-details")) {
  $VIEW_NAME = "product/index.php";
} else if (exist_param("cart")) {
  $VIEW_NAME = "cart/index.php";
} else if (exist_param("search")) {
  require_once '../../dao/product.php';
  $searchedItems = product_select_by_keyword($_GET['search']);

  $VIEW_NAME = "homepage/search.php";

} else {
  require_once '../../dao/product.php';
  require_once '../../dao/category.php';
  $categories = category_select_all();

  $VIEW_NAME = "homepage/home.php";
}

require '../layout.php';