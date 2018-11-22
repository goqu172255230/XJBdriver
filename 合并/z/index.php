<?php


// 1. 建立连接
$conn = mysqli_connect('localhost', 'root', 'root', 'yzm');

mysqli_set_charset($conn,'utf8');
if (!$conn) {
  exit('<h1>连接数据库失败</h1>');
}

// 2. 开始查询
$query = mysqli_query($conn, 'select * from user;');

if (!$query) {
  exit('<h1>查询数据失败</h1>');
}

$query1 =mysqli_query($conn,'select * from drvmotive ;');

if (!$query1) {
  exit('<h1>查询数据失败</h1>');
}
$query2 =mysqli_query($conn,'select * from locomotive ;');

if (!$query2) {
  exit('<h1>查询数据失败</h1>');
}
// 3. 遍历结果集
// while ($item = mysqli_fetch_assoc($query)) {
//   $data[] = $item;
// }

?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>管理</title>
		<link rel="stylesheet" type="text/css" href="../css/cs.css" />
	<script>
			function my$(id) {
				return document.getElementById(id);
			}
		</script>
	</head>
 
	<body>
		<!--页面顶部-->
		<div class="top">
			<div class="container">
				<div class="top-nav clearfix">
					<a></a> <span></span>
				</div>
			</div>

		</div>
		<!--页面中部-->
		<div class="headertitle">
			<div class="header-title">
				<a href="#">管理界面</a>
				<!--/* 放图片底部放字，网络不好才显示：<a href="#"class="lr">管理界面</a> */-->
			</div>
		</div>

		<!--页面导航-->
		<div class="header">

			<div class="header-nav">

				<ul class="nav-list clearfix">
					<li class="nav-itemm">

						<a href="#" onclick="
			my$('maincontent').style.display='block';
			my$('loco').style.display='none';
			my$('drv').style.display='none';
			my$('weiz').style.display='none'
			">
							<img src="../img/main.png" width="150px" height="100px" /> 首页
						</a>
					</li>

					<li class="nav-item">

						<a href="#" onclick="
				my$('maincontent').style.display='none';
				my$('drv').style.display='none';
				my$('weiz').style.display='none';
				my$('loco').style.display='block'">

							<img src="../img/two.png" width="150px" height="100px" /> 机车管理

						</a>
					</li>

					<li class="nav-item">
						<a href="#" onclick="
			my$('maincontent').style.display='none';
			my$('loco').style.display='none';
			my$('weiz').style.display='none';
			my$('drv').style.display='block'">

							<img src="../img/three.png" width="150px" height="100px" /> 司机管理
						</a>
					</li>

					<li class="nav-item">
						<a href="#" onclick="
			my$('maincontent').style.display='none';
			my$('loco').style.display='none';
			my$('drv').style.display='none';
			my$('weiz').style.display='block'">
							<img src="../img/i.png" width="150px" height="100px" /> 违章管理
						</a>
					</li>

					<li class="nav-item">
						<a href="#"><img src="../img/four.png" width="150px" height="100px" /> 联系方式</a>

					</li>
				</ul>

			</div>
			<div class="maincontent-bottom">
				&nbsp;
			</div>
		</div>
		<!--//下面是后加的特效-->

		<div class="mm" id="dv">
		</div>
		
		<!--//正文-->
		<div id="maincontent" style=" display: block;">
			<!--页面主体 -->
			<div class="contenttext">
				<!--页面字体-->
				<h1 class="headlines"><a href="#" title="欢迎,感谢您的支持" >欢迎来到网站</a> </h1>
				<!-- <p > 	<img src="../img/Alert.png" alt="fotos"align="right"> -->
				<p>
					<h2 style="text-align: left;">
					徐州翔和高科电气有限公司于2009年02月09日在徐州市工商行政管理局登记成立。法定代表人赵湘玲，公司经营范围包括电气设备、计算机软件、通讯设备（地面卫星接收设施及无线电发射设备除外）等。
				</h2>
					<h3>经营范围:</h3> &nbsp;&nbsp;电气设备、计算机软件、通讯设备（地面卫星接收设施及无线电发射设备除外）开发、销售及技术服务；

				</p>
				<p>计算机系统集成；矿山机械设备及配件、建筑工程用机械及配件制造、销售；自动化监控设备安装。</p>
				<p>(依法须经批准的项目，经相关部门批准后方可开展经营活动）</p>
				<p>
					<h3>所属行业</h3> 电气机械和器材制造业
					<h3>成立日期</h3> 2005-05-25
					<h3>公司类型</h3> 有限责任公司
					<h3>营业期限</h3> 2009-02-09 - 2049-02-08
					<h3>法定代表人</h3> 赵湘玲
				</p>
				<h3>企业地址:徐州市城北开发区时代大道1号</h3>

				
			</div>

			<div class="contentcolumn">
				<!--页面主体右边部分-->
				<h3><span>最新消息</span> </h3>
				<ul>
					<li>
						<a href="#">1.</a>
					</li>
					<li>
						<a href="#">2.</a>
					</li>
					<li>
						<a href="#">3.</a>
					</li>
					<li>
						<a href="#">4.</a>
					</li>
					<li>
						<a href="#">5.</a>
					</li>
				</ul>
				<h3><span>产品</span> </h3>
				<ul>
					<li>
						<a href="#">1.</a>
					</li>
					<li>
						<a href="#">2.</a>
					</li>
					<li>
						<a href="#">3.</a>
					</li>
					<li>
						<a href="#">4.</a>
					</li>
					<li>
						<a href="#">5.</a>
					</li>
				</ul>

				<h3><span>客户</span></h3>
				<ul>
					<li>
						<a href="#"><cite> 华中地区 </cite></a>
						<p>河南地区</p>
					</li>
					<li>
						<a href="#"><cite> 华东地区 </cite></a>
						<p>上海地区</p>
					</li>
				</ul>
			</div>

			<!--放置空盒子-->
			<div class="maincontent-bottom">
				&nbsp;
			</div>
		</div>

		<!--onload="init()"-->
		<div id="loco" style="display: none">
	<table border="2" cellpadding="9" class="width1">
				<caption></caption>
					<thead>
					<tr>		
						<th><label>车号</label></th>
						<th><label>照片</label></th>				
						<th><label>标题</label></th>	
						<th><label>所属部门</label></th>
						<th><label>牌号</label></th>
						<th><label>购买日期</label></th>
						<th><label>发动机号</label></th>
					</tr>
					<tr>
						<th><label>下次保养</label></th>
						<th><label>厂家</label></th>
						<th><label>备注</label></th>
						<th><label>管理员</label></th>
						<th>操作</th>
						<th><a href="recordOFloco/add.php">添加</a></th>
					</tr>
				</thead>
				<tbody> 
					
						<?php while ($itemloco = mysqli_fetch_assoc($query2)): ?>		
					  <tr>
					  	 <th scope="row"><?php echo $itemloco['license_n'] ?></th>
					  	 <td><img src="<?php echo $itemloco['imgs']; ?>" class="rounded" alt="<?php echo $itemloco['license_n']; ?>"></td>
					  	 <td><?php echo $itemloco['title']; ?></td>
					  	 <td><?php echo $itemloco['sub_dep']; ?></td>
					  	 <td><?php echo $itemloco['brand_name']; ?></td>
					  	 <td><?php echo $itemloco['buytime']; ?></td>
					  	 <td><?php echo $itemloco['fanumber']; ?></td>	  
					  </tr>
						<tr>
					 	 <td><?php echo $itemloco['nextdata']; ?></td>
					  	 <td><?php echo $itemloco['forhome']; ?></td>
					  	 <td><?php echo $itemloco['beizhu']; ?></td>
					  	 <td><?php echo $itemloco['user']; ?></td>	  	 
					  	 <td>
					  	 	<a href="recordOFloco/edit.php?license_n=<?php echo $itemloco['license_n'] ?> "><button>编辑</button></a>
					  	 	 <a  href="recordOFloco/delete.php?license_n=<?php echo $itemloco['license_n'] ?>"><button>删除</button></a>
					  	 </td>
         				</tr>
					  <?php endwhile ?>
				</tbody>
							<!--<tr>
							<td><input type="text" id="chehao" size="20" name="license_n" maxlength="20" placeholder="请输入车号，不可为空" /></td>
							<td></td>
							<td><label>标题</label></td>
							<td><input type="text" id="biaoti" size="20" name="title1" maxlength="20" /></td>
						</tr>
						<tr>
							<td><label>所属部门</label></td>
							<td><input type="text" id="suoshubumeng" size="20" name="sub_dep1" maxlength="20" /></td>
							<td></td>
							<td><label>牌号</label></td>
							<td><input type="text" id="paihao" size="20" name="brand_name1" maxlength="20" /></td>
						</tr>
						<tr>
							<td><label>购买日期</label></td>
							<td><input type="date" id="goumairiqi" name="buytime1" size="20" maxlength="20" /></td>
							<td></td>
							<td><label>发动机号</label></td>
							<td><input type="text" id="fadongjihao" name="fanumber1" size="20" maxlength="20" /></td>
						</tr>
						<tr>
							<td><label>下次保养</label></td>
							<td><input type="date" id="xiacibaoyang" name="nextdata1" size="20" maxlength="20" /></td>
							<td></td>
							<td><label>厂家</label></td>
							<td><input type="text" id="changjia" name="forhome1" size="20" maxlength="20" /></td>
						</tr>
						<tr>
							<td><label>备注</label></td>
							<td colspan="4"><textarea id="beizhu" name="beizhu1" cols="70" rows="5" maxlength="500"></textarea></td>
						</tr>
						<tr>
							<td><label>管理员</label></td>
							<td><input type="text" id="guanliyuan" name="user1" size="20" maxlength="20" /></td>
						</tr>-->
					</table>

					<p id="msg"></p>

				</form>
			</div>
		</div>

		<div id="drv" align="center" style="display: none">
			<!--司机页面主体-->
<table border="2" cellpadding="9" class="width1">
				<caption></caption>
				
				<thead>
					<tr>
						
						<th><label>工号</label></th>
						<th><label>照片</label></th>				
						<th><label>姓名</label></th>	
						<th><label>所属部门</label></th>
						<th><label>工种</label></th>
						<th><label>出生日期</label></th>
						<th><label>证件号码</label></th>
					</tr>
					<tr>
						<th><label>入职时间</label></th>
						<th><label>电话</label></th>
						<th><label>文化面貌</label></th>
						<th><label>政治面貌</label></th>
						<th><label>备注</label></th>
						<th>操作</th>
						<th><a href="recordOFdrv/add.php">添加</a></th>
					</tr>
				</thead>
				<tbody> 
					
						<?php while ($itemloco = mysqli_fetch_assoc($query1)): ?>		
					  <tr>
					  	 <th scope="row"><?php echo $itemloco['workNumber'] ?></th>
					  	 <td><img src="<?php echo $itemloco['imgs']; ?>" class="rounded" alt="<?php echo $itemloco['workNumber']; ?>"></td>
					  	 <td><?php echo $itemloco['fullName']; ?></td>
					  	 <td><?php echo $itemloco['subordinateDepartment']; ?></td>
					  	 <td><?php echo $itemloco['typeOFwork']; ?></td>
					  	 <td><?php echo $itemloco['dateOFbirth']; ?></td>
					  	 <td><?php echo $itemloco['identificationNumber']; ?></td>	  
					  </tr>
						<tr>
					 	 <td><?php echo $itemloco['timeOFentry']; ?></td>
					  	 <td><?php echo $itemloco['telephone']; ?></td>
					  	 <td><?php echo $itemloco['culturalFeatures']; ?></td>
					  	 <td><?php echo $itemloco['politicalOutlook']; ?></td>
					  	 <td><?php echo $itemloco['remarks']; ?></td>		  	 
					  	 <td>
					  	 	<a href="recordOFdrv/edit.php?workNumber=<?php echo $itemloco['workNumber'] ?> "><button>编辑</button></a>
					  	 	 <a  href="recordOFdrv/delete.php?workNumber=<?php echo $itemloco['workNumber'] ?>"><button>删除</button></a>
					  	 </td>
         				</tr>
					  <?php endwhile ?>
				</tbody>
				
					</table>	
			</div>

			<div class="maincontent-bottom">
				&nbsp;
			</div>
		</div>

		<div id="weiz" align="center" style="display: none">
			<!--违章抓拍页面主体-->
			<table border="2" cellpadding="9" class="width1">
				<caption></caption>
				<thead>
					<tr>
						<th>#</th>
						<th>抓拍图片</th>	
						<th>日期</th>
						<th>车号</th>
						<th>驾驶员</th>
						<th>信号灯编号</th>
						<th>地点</th>
						<th>操作<a href="recordOFviolation/add.php">-----添加</a></th>
					</tr>
				</thead>
				<tbody>
					 <?php while ($item = mysqli_fetch_assoc($query)): ?>
					  <tr>
					  	 <th scope="row"><?php echo $item['id'] ?></th>
					  	 <td><img src="<?php echo $item['photo_s']; ?>" class="rounded" alt="<?php echo $item['car_number']; ?>"></td>
					  	 <td><?php echo $item['data']; ?></td>
					  	 <td><?php echo $item['car_number']; ?></td>
					  	 <td><?php echo $item['user_name']; ?></td>
					  	 <td><?php echo $item['lamp_number']; ?></td>
					  	 <td><?php echo $item['adders']; ?></td>
					  	 <td>
					  	 	<a href="recordOFviolation/edit.php?id=<?php echo $item['id'] ?> "><button>编辑</button></a>
					  	 	 <a  href="recordOFviolation/delete.php?id=<?php echo $item['id'] ?>"><button>删除</button></a>
					  	 </td>
         				</tr>
					  <?php endwhile ?>
				</tbody>
			</table>

		</div>

		<div class="maincontent-bottom">
			&nbsp;
		</div>
		<div class="nodeSmall" id="node_small">
			<a href="#"></a>
			<div class="erweima hide"  id="er">
				<img src="../img/456.png">
			</div>
		</div>
		<footer>
			<p class="iv">
				<a href="#">网页设计者：www</a>
			</p>
		</footer>
		<script type="text/javascript" src="../js/click.js">	
	</script>
	</body>

</html>