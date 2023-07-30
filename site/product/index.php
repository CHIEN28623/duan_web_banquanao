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

  if (isset($category_id)) {
    $products = product_select_by_category($category_id);
  } else {
    $category_id = $categories[0]['category_id'];
    $products = product_select_by_category($category_id);
  }

  if (isset($filter)) {
    if ($filter == "highToLow") {
      usort($products, function ($a, $b) {
        return $a['price'] - $b['price'];
      });
    } else if ($filter == "lowToHigh") {
      usort($products, function ($a, $b) {
        return $b['price'] - $a['price'];
      });
    }
  }

  $VIEW_NAME = "product/all_products.php";

}

require '../layout.php';