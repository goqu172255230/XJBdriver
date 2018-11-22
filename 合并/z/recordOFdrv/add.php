<?php
function add_drv(){
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
  
    if (empty($_POST['remarks'])) {
    $GLOBALS['error_message'] = '请输入备注';
    return;
  }
  
  

  $workNumber = $_POST['workNumber'];
  $fullName = $_POST['fullName'];
  $subordinateDepartment = $_POST['subordinateDepartment'];
  $typeOFwork = $_POST['typeOFwork'];
   $dateOFbirth = $_POST['dateOFbirth'];
   $identificationNumber=$_POST['identificationNumber'];
   $timeOFentry = $_POST['timeOFentry'];
   $telephone = $_POST['telephone'];
   $culturalFeatures = $_POST['culturalFeatures'];
   $politicalOutlookh = $_POST['politicalOutlook'];
   $remarks = $_POST['remarks'];

if (empty($_FILES['imgs'])) {
    $GLOBALS['error_message'] = '请上传图像';
    return;
}
 $ext = pathinfo($_FILES['imgs']['name'], PATHINFO_EXTENSION);
  // => jpg
$target = '../uploads/imgs-' . uniqid() . '.' . $ext;

 if (!move_uploaded_file($_FILES['imgs']['tmp_name'], $target)) {
    $GLOBALS['error_message'] = '上传图像失败';
    return;
  }
  $imgs = substr($target, 2);


$conn = mysqli_connect('localhost', 'root', 'root', 'yzm');

  if (!$conn) {
    $GLOBALS['error_message'] = '连接数据库失败';
    return;
  }

  // 2. 开始查询
  $query = mysqli_query($conn, "insert into drvmotive values ('{$workNumber}', '{$fullName}', 
  '{$subordinateDepartment}', '{$typeOFwork}','{$dateOFbirth}','{$identificationNumber}', '{$timeOFentry}', '{$telephone}', 
  '{$culturalFeatures}', '{$politicalOutlookh}', '{$remarks}', '{$imgs}' );");

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
  add_drv();
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
    <h1 class="heading">添加</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" 
    	method="post" enctype="multipart/form-data" autocomplete="off" >
    	<div class="form-group">
    		<label for="workNumber">工号</label>
    	<input type="text" class="form-control" id="workNumber" name="workNumber" size="20" maxlength="20" placeholder="请输入工号，不可为空" />
    	</div>
    	<div class="form-group">
    		<label for="imgs">照片</label>
    	<input type="file" class="form-control" id="imgs" name="imgs"  />
    	</div>
    	<div class="form-group">
    		<label for="fullName">姓名</label>
    		<input type="text" class="form-control" id="fullName" name="fullName" size="20" maxlength="20" /></td>
    	</div>
    		<div class="form-group">
    		<label for="subordinateDepartment">所属部门 </label>
    		<input type="text" class="form-control" id="subordinateDepartment" name="subordinateDepartment" size="20" maxlength="20" />
    	</div>
    		<div class="form-group">
    		<label for="typeOFwork">工种</label>
    		<input type="text" class="form-control" id="typeOFwork" name="typeOFwork" size="20" maxlength="20" />
    	</div>
    		<div class="form-group">
    		<label for="dateOFbirth">出生日期</label>
    		<input type="date"  class="form-control" id="dateOFbirth" name="dateOFbirth" size="20" maxlength="20" />
    	</div>
    		<div class="form-group">
    		<label for="identificationNumber">证件号码</label>
    		<input type="text"  class="form-control" id="identificationNumber" name="identificationNumber" size="20" maxlength="20" />
    	</div>
    	
    	</div>
    		<div class="form-group">
    		<label for="timeOFentry">入职时间</label>
    		<input type="date" class="form-control" id="timeOFentry" name="timeOFentry" size="20" maxlength="20" />
    	</div>
    	</div>
    		<div class="form-group">
    		<label for="telephone">电话</label>
    		<input type="text" class="form-control" id="telephone" name="telephone" size="20" maxlength="20" />
    	</div></div>
    		<div class="form-group">
    		<label for="culturalFeatures">文化面貌</label>
    		<input type="text" class="form-control" id="culturalFeatures" name="culturalFeatures" size="20" maxlength="20" />
    	</div>
    	</div>
    		<div class="form-group">
    		<label for="politicalOutlook">政治面貌</label>
    		<input type="text" class="form-control" id="politicalOutlook" name="politicalOutlook" size="20" maxlength="20" />
    	</div>
    	</div>
    		<div class="form-group">
    		<label for="remarks">备注</label>
    		<textarea id="remarks" class="form-control" id = "remarks" name="remarks" cols="70" rows="5"></textarea>
    	</div>  	
    	<button class="btn btn-primary">保存</button>
    </form>
  </main>
</body>
</html>
