<?php
function add_loco(){
	if (empty($_POST['license_n'])) {
    $GLOBALS['error_message'] = '请选择车号';
    return;
 }
   if (empty($_POST['title'])) {
    $GLOBALS['error_message'] = '请输入标题';
    return;
  }
	 if (empty($_POST['sub_dep'])) {
    $GLOBALS['error_message'] = '请输入所属部门';
    return;
  } 
  if (empty($_POST['brand_name'])) {
    $GLOBALS['error_message'] = '请输入牌号';
    return;
  }
   if (empty($_POST['buytime'])) {
    $GLOBALS['error_message'] = '请输入购买日期';
    return;
  }
    if (empty($_POST['fanumber'])) {
    $GLOBALS['error_message'] = '请输入发动机号';
    return;
  }
    if (empty($_POST['nextdata'])) {
    $GLOBALS['error_message'] = '请输入下次保养时间';
    return;
  }
    if (empty($_POST['forhome'])) {
    $GLOBALS['error_message'] = '请输入厂家';
    return;
  }
    if (empty($_POST['beizhu'])) {
    $GLOBALS['error_message'] = '请输入备注';
    return;
  }
    if (empty($_POST['admins'])) {
    $GLOBALS['error_message'] = '请输入管理员';
    return;
  }

//  <div class="form-group">
//      <label for="gender">性别</label>
//      <select class="form-control" id="gender" name="gender">
//        <option value="-1">请选择性别</option>
//        <option value="1">男</option>
//        <option value="0">女</option>
//      </select>
//    </div>

  $license_n = $_POST['license_n'];
  $title = $_POST['title'];
  $sub_dep = $_POST['sub_dep'];
  $brand_name = $_POST['brand_name'];
   $buytimeh = $_POST['buytime'];
   $fanumber=$_POST['fanumber'];
   $nextdata = $_POST['nextdata'];
   $forhome = $_POST['forhome'];
   $beizhu = $_POST['beizhu'];
   $admins = $_POST['admins'];

if (empty($_FILES['imgloco'])) {
    $GLOBALS['error_message'] = '请上传图像';
    return;
}
 $ext = pathinfo($_FILES['imgloco']['name'], PATHINFO_EXTENSION);
  // => jpg
$target = '../uploads/imgloco-' . uniqid() . '.' . $ext;

 if (!move_uploaded_file($_FILES['imgloco']['tmp_name'], $target)) {
    $GLOBALS['error_message'] = '上传图像失败';
    return;
  }
  $imgloco = substr($target, 2);


$conn = mysqli_connect('localhost', 'root', 'root', 'yzm');

  if (!$conn) {
    $GLOBALS['error_message'] = '连接数据库失败';
    return;
  }

  // 2. 开始查询
  $query = mysqli_query($conn, "insert into locomotive values (null,'{$license_n}', '{$title}', 
  '{$sub_dep}', '{$brand_name}','{$buytimeh}','{$fanumber}', '{$nextdata}', '{$forhome}', 
  '{$beizhu}', '{$admins}', '{$imgloco}' );");

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
  header('Location: ../index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  add_loco();
  
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
    <a class="navbar-brand" href="http://www.z.com/index.php">机车管理系统</a>
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
    		<label for="license_n">车号</label>
    	<input type="text" class="form-control" id="license_n" size="20" name="license_n" maxlength="20" placeholder="请输入车号，不可为空" />
    	</div>
    	<div class="form-group">
    		<label for="imgloco">照片</label>
    	<input type="file" class="form-control" id="imgloco" name="imgloco"  />
    	</div>
    	<div class="form-group">
    		<label for="title">标题</label>
    		<input type="text" class="form-control" id="title" name="title" size="20" maxlength="20" /></td>
    	</div>
    		<div class="form-group">
    		<label for="sub_dep">所属部门 </label>
    		<input type="text" class="form-control" id="sub_dep" name="sub_dep" size="20" maxlength="20" />
    	</div>
    		<div class="form-group">
    		<label for="brand_name">牌号</label>
    		<input type="text" class="form-control" id="brand_name" name="brand_name" size="20" maxlength="20" />
    	</div>
    		<div class="form-group">
    		<label for="buytime">购买时间</label>
    		<input type="date"  class="form-control" id="buytime" name="buytime" size="20" maxlength="20" />
    	</div>
    		<div class="form-group">
    		<label for="fanumber">发动机号</label>
    		<input type="text"  class="form-control" id="fanumber" name="fanumber" size="20" maxlength="20" />
    	</div>
    	
    	</div>
    		<div class="form-group">
    		<label for="nextdata">下次保养时间</label>
    		<input type="date" class="form-control" id="nextdata" name="nextdata" size="20" maxlength="20" />
    	</div>
    	</div>
    		<div class="form-group">
    		<label for="forhome">厂家</label>
    		<input type="text" class="form-control" id="forhome" name="forhome" size="20" maxlength="20" />
    	</div></div>
    		<div class="form-group">
    		<label for="beizhu">备注</label>
    		<input type="text" class="form-control" id="beizhu" name="beizhu" size="20" maxlength="20" />
    	</div>
    	</div>
    		<div class="form-group">
    		<label for="admins">管理员</label>
    		<input type="text" class="form-control" id="admins" name="admins" size="20" maxlength="20" />
    	</div>
 	
    	<button class="btn btn-primary">保存</button>
    </form>
  </main>
</body>
</html>
