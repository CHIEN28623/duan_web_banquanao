<?php
function pdo_get_connection()
{
  $dburl = "mysql:host=127.0.0.1:3306;dbname=ecommerce";
  $username = 'root';
  $password = 'leeareum1';

  $pdo = new PDO($dburl, $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $pdo;

}

function pdo_execute($sql)
// Thực thi câu lệnh sql truy vấn dữ liệu (SELECT)
// execute bidn the markers with the values in the array
{
  $sql_args = array_slice(func_get_args(), 1);
  try {
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute($sql_args);
  } catch (PDOException $e) {
    throw $e;
  } finally {
    unset($conn);
  }
}

function pdo_execute_and_return($sql)
{
  $sql_args = array_slice(func_get_args(), 1);
  try {
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    if ($stmt->execute($sql_args)) {
      $order_id = $conn->lastInsertId();
      return $order_id;
    }
  } catch (PDOException $e) {
    throw $e;
  } finally {
    unset($conn);
  }
}

function pdo_query($sql)
// Thực thi câu lệnh sql truy vấn một bản ghi (SELECT)
{
  $sql_args = array_slice(func_get_args(), 1);
  try {
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute($sql_args);
    $rows = $stmt->fetchAll();
    return $rows;
  } catch (PDOException $e) {
    throw $e;
  } finally {
    unset($conn);
  }
}

function pdo_query_one($sql)
// Thực thi câu lệnh sql truy vấn một giá trị
{
  $sql_args = array_slice(func_get_args(), 1);
  try {
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute($sql_args);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
  } catch (PDOException $e) {
    throw $e;
  } finally {
    unset($conn);
  }

}

/**
 * Summary of pdo_query_value
 * @param mixed $sql
 * @return mixed
 * Thực thi câu lệnh sql truy vấn một giá trị 
 * (SELECT) và trả về giá trị đầu tiên của bản ghi
 * @return mixed
 */
function pdo_query_value($sql)
{
  $sql_args = array_slice(func_get_args(), 1);
  try {
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute($sql_args);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return array_values($row)[0];
  } catch (PDOException $e) {
    throw $e;
  } finally {
    unset($conn);
  }

}