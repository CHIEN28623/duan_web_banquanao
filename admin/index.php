<?php
require "../global.php";

if (is_logged_in() && is_admin()) {
  header("Location: admin/homepage/index.php");

  exit;
} else {
  header("Location: /site/homepage/index.php");
}

// exit;
?>