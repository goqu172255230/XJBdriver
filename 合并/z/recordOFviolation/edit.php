<?php

// 接收要修改的数据 ID
if (empty($_GET['id'])) {
  exit('<h1>必须传入指定参数</h1>');
}

$id = $_GET['id'];

// 1. 建立连接
$conn = mysqli_connect('localhost', 'root', 'root', 'yzm');

if (!$conn) {
  exit('<h1>连接数据库失败</h1>');
}

// 2. 开始查询
// 因为 ID 是唯一的 那么找到第一个满足条件的就不用再继续了 limit 1
$query = mysqli_query($conn, "select * from user where id = {$id} limit 1;");

if (!$query) {
  exit('<h1>查询数据失败</h1>');
}

$users = mysqli_fetch_assoc($query);

if (!$users) {
  exit('<h1>找不到你要编辑的数据</h1>');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>管理系统</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <nav class="navbar navbar-expand navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="index.php">管理系统</a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
  
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">用户管理</a>
      </li>
    </ul>
  </nav>
  <main class="container">
    <h1 class="heading">编辑 "<?php echo $users['car_number']; ?>"</h1>
   <form action="edit.php" 
    	method="post" enctype="multipart/form-data" autocomplete="off" >
    	<div class="form-group">
    		<label for="photo_s">图片</label>
    		<input type="file" class="form-control" id="photo_s" name="photo_s" />
    	</div>
    	<div class="form-group">
    		<label for="data">日期</label>
    		<input type="date" class="form-control" id="data" name="data" value="<?php echo $users['data'];?>" />
    	</div>
    		<div class="form-group">
    		<label for="car_number">车号</label>
    		<input type="text" class="form-control" id="car_number" name="car_number" value="<?php echo $users['car_number'];?>" />
    	</div>
    		<div class="form-group">
    		<label for="user_name">驾驶员</label>
    		<input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $users['user_name'];?>" />
    	</div>
    		<div class="form-group">
    		<label for="lamp_number">信号灯编号</label>
    		<input type="text" class="form-control" id="lamp_number" name="lamp_number" value="<?php echo $users['lamp_number'];?>" />
    	</div>
    		<div class="form-group">
    		<label for="adders">地点</label>
    		<input type="text" class="form-control" id="adders" name="adders" value="<?php echo $users['adders'];?>" />
    	</div>
    	<button class="btn btn-primary">保存</button>
    </form>
  </main>
</body>
</html>
