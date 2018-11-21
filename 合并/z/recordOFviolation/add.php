<?php
function add_user(){
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
  

  $data = $_POST['data'];
  $car_number = $_POST['car_number'];
  $user_name = $_POST['user_name'];
  $lamp_number = $_POST['lamp_number'];
   $adders = $_POST['adders']; 
  

if (empty($_FILES['photo_s'])) {
    $GLOBALS['error_message'] = '请上传图像';
    return;
  }
 $ext = pathinfo($_FILES['photo_s']['name'], PATHINFO_EXTENSION);
  // => jpg
$target = '../uploads/photo_s-' . uniqid() . '.' . $ext;

 if (!move_uploaded_file($_FILES['photo_s']['tmp_name'], $target)) {
    $GLOBALS['error_message'] = '上传图像失败';
    return;
  }
  $photo_s = substr($target, 2);


$conn = mysqli_connect('localhost', 'root', 'root', 'yzm');

  if (!$conn) {
    $GLOBALS['error_message'] = '连接数据库失败';
    return;
  }

  // 2. 开始查询
  $query = mysqli_query($conn, "insert into user values (null, '{$data}', '{$car_number}', '{$user_name}', '{$lamp_number}','{$adders}','{$photo_s}');");

  if (!$query) {
    $GLOBALS['error_message'] = '查询过程失败';
    return;
  }

  $affected_rows = mysqli_affected_rows($conn);

  if ($affected_rows !== 1) {
    $GLOBALS['error_message'] = '添加数据失败';
    return;
  }

  // 响应
  header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  add_user();
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
    <h1 class="heading">添加</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" 
    	method="post" enctype="multipart/form-data" autocomplete="off" >
    	<div class="form-group">
    		<label for="photo_s">图片</label>
    		<input type="file" class="form-control" id="photo_s" name="photo_s" />
    	</div>
    	<div class="form-group">
    		<label for="data">日期</label>
    		<input type="date" class="form-control" id="data" name="data" />
    	</div>
    		<div class="form-group">
    		<label for="car_number">车号</label>
    		<input type="text" class="form-control" id="car_number" name="car_number" />
    	</div>
    		<div class="form-group">
    		<label for="user_name">驾驶员</label>
    		<input type="text" class="form-control" id="user_name" name="user_name" />
    	</div>
    		<div class="form-group">
    		<label for="lamp_number">信号灯编号</label>
    		<input type="text" class="form-control" id="lamp_number" name="lamp_number" />
    	</div>
    		<div class="form-group">
    		<label for="adders">地点</label>
    		<input type="text" class="form-control" id="adders" name="adders" />
    	</div>
    	<button class="btn btn-primary">保存</button>
    </form>
  </main>
</body>
</html>
