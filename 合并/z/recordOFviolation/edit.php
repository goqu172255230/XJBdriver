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
//存放保存数据
$users = mysqli_fetch_assoc($query);

if (!$users) {
  exit('<h1>找不到你要编辑的数据</h1>');
}
function edit(){
	global $users;
		if (empty($_POST['data'])) {
    $GLOBALS['error_message'] = '请选择日期';
    return;
  }

   if (empty($_POST['car_number'])) {
    $GLOBALS['error_message'] = '请输入车号';
    return;
  }
	 if (empty($_POST['user_name'])) {
    $GLOBALS['error_message'] = '请输入驾驶员';
    return;
  } 
  if (empty($_POST['lamp_number'])) {
    $GLOBALS['error_message'] = '请输入信号灯编号';
    return;
  }
   if (empty($_POST['adders'])) {
    $GLOBALS['error_message'] = '请输入地点';
    return;
  }
  
  $users['data'] = $_POST['data'];
  $users['car_number'] = $_POST['car_number'];
  $users['user_name'] = $_POST['user_name'];
  $users['lamp_number'] = $_POST['lamp_number'];
  $users['adders'] = $_POST['adders']; 
  
  if(isset($_FILES['photo_s'])&& $_FILES['photo_s']['error']===UPLOAD_ERR_OK)
{
	$ext = pathinfo($_FILES['photo_s']['name'], PATHINFO_EXTENSION);

$target = '../uploads/photo_s-' . uniqid() . '.' . $ext;

 if (!move_uploaded_file($_FILES['photo_s']['tmp_name'], $target)) {
    $GLOBALS['error_message'] = '上传图像失败';
    return;
  }
  $users['photo_s'] = substr($target, 2);
}  


$conn = mysqli_connect('localhost', 'root', 'root', 'yzm');

if (!$conn) {
  exit('<h1>连接数据库失败</h1>');
}
 $query = mysqli_query($conn, "update  user set data = '{$users['data']}', car_number = '{$users['car_number']}', lamp_number ='{$users['lamp_number']}', user_name= '{$users['user_name']}', adders='{$users['adders']}',photo_s='{$users['photo_s']}' where 1=1;");

  if (!$query) {
    $GLOBALS['error_message'] = '查询过程失败';
    return;
  }

  $affected_rows = mysqli_affected_rows($conn);

  if ($affected_rows !== 1) {
    $GLOBALS['error_message'] = '修改数据失败';
    return;
  }

  // 响应
  header('Location: ../index.php');


}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  edit();
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
    <a class="navbar-brand" href="http://www.z.com/index.php">管理系统</a>
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
   <form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $users['id'];?>" 
    	method="post" enctype="multipart/form-data" autocomplete="off" >
    		<!--<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $users['id'];?>"/>-->  	
    	<div class="form-group">
    		<img src="<?php echo $users['photo_s'];?> " />
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
