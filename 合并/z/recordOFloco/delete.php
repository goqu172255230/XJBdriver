<?php

// 接收要删除的数据 ID
if (empty($_GET['license_n'])) {
  exit('<h1>必须传入指定参数</h1>');
}

$license_n = $_GET['license_n']; // => 1,2,3

// 1. 建立连接
$conn = mysqli_connect('localhost', 'root', 'root', 'yzm');

if (!$conn) {
  exit('<h1>连接数据库失败</h1>');
}

// 2. 开始查询
$query = mysqli_query($conn, 'delete from locomotive where license_n in (' . $license_n . ');');

if (!$query) {
  exit('<h1>查询数据失败</h1>');
}

$affected_rows = mysqli_affected_rows($conn);

if ($affected_rows <= 0) {
  exit('<h1>删除失败</h1>');
}

header('Location: ../index.php');
