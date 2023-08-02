<?php
require "../global.php";
session_start();

if (is_logged_in() && is_admin()) {
  header("Location: admin/homepage/index.php");

  exit;
} else {
  header("Location: /site/homepage/index.php");
}

// exit;
?>