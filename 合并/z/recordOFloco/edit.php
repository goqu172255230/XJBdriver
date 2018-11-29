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
$query = mysqli_query($conn, "select * from locomotive where id = {$id} limit 1;");

if (!$query) {
  exit('<h1>查询数据失败</h1>');
}
//存放保存数据
$users_loco = mysqli_fetch_assoc($query);

if (!$users_loco) {
  exit('<h1>找不到你要编辑的数据</h1>');
}
function edit_loco(){
	global $users_loco;
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
  
   
  $users_loco['license_n'] = $_POST['license_n'];
  $users_loco['title'] = $_POST['title'];
  $users_loco['sub_dep'] = $_POST['sub_dep'];
  $users_loco['brand_name'] = $_POST['brand_name'];
   $users_loco['buytime'] = $_POST['buytime'];
   $users_loco['fanumber']=$_POST['fanumber'];
   $users_loco['nextdata'] = $_POST['nextdata'];
   $users_loco['forhome'] = $_POST['forhome'];
   $users_loco['beizhu'] = $_POST['beizhu'];
   $users_loco['admins'] = $_POST['admins'];

  
  if(isset($_FILES['imgloco'])&& $_FILES['imgloco']['error']===UPLOAD_ERR_OK)
{
	$ext = pathinfo($_FILES['imgloco']['name'], PATHINFO_EXTENSION);

$target = '../uploads/imgloco-' . uniqid() . '.' . $ext;

 if (!move_uploaded_file($_FILES['imgloco']['tmp_name'], $target)) {
    $GLOBALS['error_message'] = '上传图像失败';
    return;
  }
  $users_loco['imgloco'] = substr($target, 2);
}  


$conn = mysqli_connect('localhost', 'root', 'root', 'yzm');

if (!$conn) {
  exit('<h1>连接数据库失败</h1>');
}
 $query = mysqli_query($conn, "update  locomotive set license_n = '{$users_loco['license_n']}',
  title = '{$users_loco['title']}', 
  sub_dep ='{$users_loco['sub_dep']}', 
  brand_name= '{$users_loco['brand_name']}', buytime='{$users_loco['buytime']}',
  fanumber='{$users_loco['fanumber']}',nextdata ='{$users_loco['nextdata']}',
  forhome ='{$users_loco['forhome']}',beizhu ='{$users_loco['beizhu']}',
  admins ='{$users_loco['admins']}',
  imgloco='{$users_loco['imgloco']}'
   where id='{$users_loco['id']}';");

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
  edit_loco();
  header('Location: ../index.php');
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
    <h1 class="heading">编辑"<?php echo $users_loco['id']; ?>"</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $users_loco['id'];?>" 
    	method="post" enctype="multipart/form-data" autocomplete="off" >
    	<div class="form-group">
    		<label for="license_n">车号</label>
    	<input type="text" class="form-control" id="license_n" name="license_n" value="<?php echo $users_loco['license_n'];?>" size="20" maxlength="20" placeholder="请输入车号，不可为空" />
    	</div>
    	
    	 <!--<div class="form-group"> 
        <label for="gender">性别</label>
        <select class="form-control" id="gender" name="gender">
          <option value="-1">请选择性别</option>
          <option value="1"<?php echo $user['gender'] === '1' ? ' selected': ''; ?>>男</option>
          <option value="0"<?php echo $user['gender'] === '0' ? ' selected': ''; ?>>女</option>
        </select>
      </div>-->
      
    	<div class="form-group">
    		<label for="imgloco">照片</label>
    	<input type="file" class="form-control" id="imgloco" name="imgloco"  />
    	</div>
    	<div class="form-group">
    		<label for="title">标题</label>
    		<input type="text" class="form-control" id="title" name="title" value="<?php echo $users_loco['title'];?>" size="20" maxlength="20" /></td>
    	</div>
    		<div class="form-group">
    		<label for="sub_dep">所属部门 </label>
    		<input type="text" class="form-control" id="sub_dep" value="<?php echo $users_loco['sub_dep'];?>" name="sub_dep" size="20" maxlength="20" />
    	</div>
    		<div class="form-group">
    		<label for="brand_name">牌号</label>
    		<input type="text" class="form-control" id="brand_name" value="<?php echo $users_loco['brand_name'];?>" name="brand_name" size="20" maxlength="20" />
    	</div>
    		<div class="form-group">
    		<label for="buytime">购买日期</label>
    		<input type="date"  class="form-control" id="buytime" value="<?php echo $users_loco['buytime'];?>" name="buytime" size="20" maxlength="20" />
    	</div>
    		<div class="form-group">
    		<label for="fanumber">发动机号</label>
    		<input type="text"  class="form-control" id="fanumber" value="<?php echo $users_loco['fanumber'];?>" name="fanumber" size="20" maxlength="20" />
    	</div>
    	
    	</div>
    		<div class="form-group">
    		<label for="nextdata">下次保养时间</label>
    		<input type="date" class="form-control" id="nextdata" value="<?php echo $users_loco['nextdata'];?>" name="nextdata" size="20" maxlength="20" />
    	</div>
    	</div>
    		<div class="form-group">
    		<label for="forhome">厂家</label>
    		<input type="text" class="form-control" id="forhome" value="<?php echo $users_loco['forhome'];?>" name="forhome" size="20" maxlength="20" />
    	</div></div>
    		<div class="form-group">
    		<label for="beizhu">备注</label>
    		<input type="text" class="form-control" id="beizhu" value="<?php echo $users_loco['beizhu'];?>" name="beizhu" size="20" maxlength="20" />
    	</div>
    	</div>
    		<div class="form-group">
    		<label for="admins">管理员</label>
    		<input type="text" class="form-control" id="admins" value="<?php echo $users_loco['admins'];?>" name="admins" size="20" maxlength="20" />
    	</div>
  	
    	<button class="btn btn-primary">保存</button>
    </form>
  </main>
</body>
</html>
