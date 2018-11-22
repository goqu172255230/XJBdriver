<?php

// 接收要修改的数据 ID
if (empty($_GET['workNumber'])) {
  exit('<h1>必须传入指定参数</h1>');
}

$workNumber = $_GET['workNumber'];

// 1. 建立连接
$conn = mysqli_connect('localhost', 'root', 'root', 'yzm');

if (!$conn) {
  exit('<h1>连接数据库失败</h1>');
}

// 2. 开始查询
// 因为 ID 是唯一的 那么找到第一个满足条件的就不用再继续了 limit 1
$query = mysqli_query($conn, "select * from drvmotive where workNumber = {$workNumber} limit 1;");

if (!$query) {
  exit('<h1>查询数据失败</h1>');
}
//存放保存数据
$users_drv = mysqli_fetch_assoc($query);

if (!$users_drv) {
  exit('<h1>找不到你要编辑的数据</h1>');
}
function edit_drv(){
	global $users_drv;
	if (empty($_POST['workNumber'])) {
    $GLOBALS['error_message'] = '请选择工号';
    return;
 }
   if (empty($_POST['fullName'])) {
    $GLOBALS['error_message'] = '请输入姓名';
    return;
  }
	 if (empty($_POST['subordinateDepartment'])) {
    $GLOBALS['error_message'] = '请输入所属部门';
    return;
  } 
  if (empty($_POST['typeOFwork'])) {
    $GLOBALS['error_message'] = '请输入工种';
    return;
  }
   if (empty($_POST['dateOFbirth'])) {
    $GLOBALS['error_message'] = '请输入出生日期';
    return;
  }
    if (empty($_POST['identificationNumber'])) {
    $GLOBALS['error_message'] = '请输入证件号码';
    return;
  }
    if (empty($_POST['timeOFentry'])) {
    $GLOBALS['error_message'] = '请输入入职时间';
    return;
  }
    if (empty($_POST['telephone'])) {
    $GLOBALS['error_message'] = '请输入电话';
    return;
  }
    if (empty($_POST['culturalFeatures'])) {
    $GLOBALS['error_message'] = '请输入文化面貌';
    return;
  }
    if (empty($_POST['politicalOutlook'])) {
    $GLOBALS['error_message'] = '请输入政治面貌';
    return;
  }
  
   
  $users_drv['workNumber'] = $_POST['workNumber'];
  $users_drv['fullName'] = $_POST['fullName'];
  $users_drv['subordinateDepartment'] = $_POST['subordinateDepartment'];
  $users_drv['typeOFwork'] = $_POST['typeOFwork'];
   $users_drv['dateOFbirth'] = $_POST['dateOFbirth'];
   $users_drv['identificationNumber']=$_POST['identificationNumber'];
   $users_drv['timeOFentry'] = $_POST['timeOFentry'];
   $users_drv['telephone'] = $_POST['telephone'];
   $users_drv['culturalFeatures'] = $_POST['culturalFeatures'];
   $users_drv['politicalOutlook'] = $_POST['politicalOutlook'];
   $users_drv['remarks'] = $_POST['remarks'];
  
  if(isset($_FILES['imgs'])&& $_FILES['imgs']['error']===UPLOAD_ERR_OK)
{
	$ext = pathinfo($_FILES['imgs']['name'], PATHINFO_EXTENSION);

$target = '../uploads/imgs-' . uniqid() . '.' . $ext;

 if (!move_uploaded_file($_FILES['imgs']['tmp_name'], $target)) {
    $GLOBALS['error_message'] = '上传图像失败';
    return;
  }
  $users_drv['imgs'] = substr($target, 2);
}  


$conn = mysqli_connect('localhost', 'root', 'root', 'yzm');

if (!$conn) {
  exit('<h1>连接数据库失败</h1>');
}
 $query = mysqli_query($conn, "update  drvmotive set workNumber = '{$users_drv['workNumber']}',
  fullName = '{$users_drv['fullName']}', 
  subordinateDepartment ='{$users_drv['subordinateDepartment']}', 
  typeOFwork= '{$users_drv['typeOFwork']}', dateOFbirth='{$users_drv['dateOFbirth']}',
  identificationNumber='{$users_drv['identificationNumber']}',timeOFentry ='{$users_drv['timeOFentry']}',
  telephone ='{$users_drv['telephone']}',culturalFeatures ='{$users_drv['culturalFeatures']}',
  politicalOutlook ='{$users_drv['politicalOutlook']}',remarks ='{$users_drv['remarks']}',
  imgs='{$users_drv['imgs']}'
   where 1=1;");

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
  edit_drv();
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
    <h1 class="heading">编辑"<?php echo $users_drv['workNumber']; ?>"</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>?workNumber=<?php echo $users_drv['workNumber'];?>" 
    	method="post" enctype="multipart/form-data" autocomplete="off" >
    	<div class="form-group">
    		<label for="workNumber">工号</label>
    	<input type="text" class="form-control" id="workNumber" name="workNumber" value="<?php echo $users_drv['workNumber'];?>" size="20" maxlength="20" placeholder="请输入工号，不可为空" />
    	</div>
    	<div class="form-group">
    		<label for="imgs">照片</label>
    	<input type="file" class="form-control" id="imgs" name="imgs"  />
    	</div>
    	<div class="form-group">
    		<label for="fullName">姓名</label>
    		<input type="text" class="form-control" id="fullName" name="fullName" value="<?php echo $users_drv['fullName'];?>" size="20" maxlength="20" /></td>
    	</div>
    		<div class="form-group">
    		<label for="subordinateDepartment">所属部门 </label>
    		<input type="text" class="form-control" id="subordinateDepartment" value="<?php echo $users_drv['subordinateDepartment'];?>" name="subordinateDepartment" size="20" maxlength="20" />
    	</div>
    		<div class="form-group">
    		<label for="typeOFwork">工种</label>
    		<input type="text" class="form-control" id="typeOFwork" value="<?php echo $users_drv['typeOFwork'];?>" name="typeOFwork" size="20" maxlength="20" />
    	</div>
    		<div class="form-group">
    		<label for="dateOFbirth">出生日期</label>
    		<input type="date"  class="form-control" id="dateOFbirth" value="<?php echo $users_drv['dateOFbirth'];?>" name="dateOFbirth" size="20" maxlength="20" />
    	</div>
    		<div class="form-group">
    		<label for="identificationNumber">证件号码</label>
    		<input type="text"  class="form-control" id="identificationNumber" value="<?php echo $users_drv['identificationNumber'];?>" name="identificationNumber" size="20" maxlength="20" />
    	</div>
    	
    	</div>
    		<div class="form-group">
    		<label for="timeOFentry">入职时间</label>
    		<input type="date" class="form-control" id="timeOFentry" value="<?php echo $users_drv['timeOFentry'];?>" name="timeOFentry" size="20" maxlength="20" />
    	</div>
    	</div>
    		<div class="form-group">
    		<label for="telephone">电话</label>
    		<input type="text" class="form-control" id="telephone" value="<?php echo $users_drv['telephone'];?>" name="telephone" size="20" maxlength="20" />
    	</div></div>
    		<div class="form-group">
    		<label for="culturalFeatures">文化面貌</label>
    		<input type="text" class="form-control" id="culturalFeatures" value="<?php echo $users_drv['culturalFeatures'];?>" name="culturalFeatures" size="20" maxlength="20" />
    	</div>
    	</div>
    		<div class="form-group">
    		<label for="politicalOutlook">政治面貌</label>
    		<input type="text" class="form-control" id="politicalOutlook" value="<?php echo $users_drv['politicalOutlook'];?>" name="politicalOutlook" size="20" maxlength="20" />
    	</div>
    	</div>
    		<div class="form-group">
    		<label for="remarks">备注</label>
    		<textarea id="remarks" class="form-control" id = "remarks"  name ="remarks" ><?php echo $users_drv['remarks'];?></textarea>
    	</div>  	
    	<button class="btn btn-primary">保存</button>
    </form>
  </main>
</body>
</html>
