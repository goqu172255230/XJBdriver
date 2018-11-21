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
		<div class="nodeSmall" id="node_small">
			<a href="#"></a>
			<div class="erweima hide" id="er">
				<img src="../img/456.png">
			</div>
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
			<!--机车页面主体-->
			<div class="center">
				<!--        <input type="image" src="../img/Alert.png" align="center" /> &nbsp &nbsp <br><br>-->
				<input type="submit" name="add" value="增加" onclick="add1()" /> &nbsp;
				<input type="text" name="selectall" id="show_idloco" value="" /> &nbsp;
				<input type="submit" name="selectall" value="查询" onclick="showdataloco()" /> &nbsp;
				<input type="submit" name="delete" value="删除" /> &nbsp;
				<input type="submit" name="modify" value="修改" />&nbsp;
				<div style="height: 50px;"></div>
				<form action="{:url('Index/Index/floco')}" method="post">
					<table border="2" class="width1" cellspacing="0" cellpadding="0" id="tableloco">
						<button id="bitton_1" type="submit" hidden value="提交" /> &nbsp;
						<br><br><br>
						<tr>
							<td><label>车号</label></td>
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
						</tr>
					</table>

					<p id="msg"></p>

				</form>
			</div>
		</div>

		<div id="drv" align="center" style="display: none">
			<!--司机页面主体-->
			<div class="center">
				<input type="submit" name="add" value="增加" onclick="add2()" /> &nbsp;
				<input type="text" name="selectall" id="show_iddrv" value="" /> &nbsp;
				<input type="submit" name="selectall" value="查询" onclick="showdatadrv()" /> &nbsp;
				<input type="submit" name="delete" value="删除" /> &nbsp;
				<input type="submit" name="modify" value="修改" />&nbsp;
				<div style="height: 50px;"></div>
				<form action="{:url('Index/Index/fdrv')}" method="post">
					<table border="2" class="width1" cellspacing="0" cellpadding="0" id="tabledrv">
						<button id="bitton_2" type="submit" hidden value="提交" />&nbsp;
						<br><br><br>
						<tr>
							<td><label>工号</label></td>
							<td><input type="text" id="workNumber" name="workNumber2" size="20" maxlength="20" placeholder="请输入工号，不可为空" /></td>
							<td></td>
							<td><label>姓名</label></td>
							<td><input type="text" id="fullName" name="fullName2" size="20" maxlength="20" /></td>
						</tr>
						<tr>
							<td><label>所属部门</label></td>
							<td><input type="text" id="subordinateDepartment" name="subordinateDepartment2" size="20" maxlength="20" /></td>
							<td></td>
							<td><label>工种</label></td>
							<td><input type="text" id="typeOFwork" name="typeOFwork2" size="20" maxlength="20" /></td>
						</tr>
						<tr>
							<td><label>出生日期</label></td>
							<td><input type="date" id="dateOFbirth" name="dateOFbirth2" size="20" maxlength="20" /></td>
							<td></td>
							<td><label>证件号码</label></td>
							<td><input type="text" id="identificationNumber" name="identificationNumber2" size="20" maxlength="20" /></td>
						</tr>
						<tr>
							<td><label>入职时间</label></td>
							<td><input type="date" id="timeOFentry" name="timeOFentry2" size="20" maxlength="20" /></td>
							<td></td>
							<td><label>电话</label></td>
							<td><input type="text" id="telephone" name="telephone2" size="20" maxlength="20" /> </td>
						</tr>
						<tr>
							<td><label>文化面貌</label> </td>
							<td><input type="text" id="culturalFeatures" name="culturalFeatures2" size="20" maxlength="20" /> </td>
							<td></td>
							<td><label>政治面貌</label> </td>
							<td><input type="text" id="politicalOutlook" name="politicalOutlook2" size="20" maxlength="20" /></td>
						</tr>
						<tr>
							<td><label>备注</label></td>
							<td colspan="4"><textarea id="remarks" name="remarks2" cols="70" rows="5"></textarea></td>
						</tr>

					</table>

				</form>
			</div>

			<div class="maincontent-bottom">
				&nbsp;
			</div>
		</div>

		<div id="weiz" align="center" style="display: none">
			<!--违章抓拍页面主体-->
			<h1><a href="add.php">添加</a></h1>	
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
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					 <?php while ($item = mysqli_fetch_assoc($query)): ?>
					  <tr>
					  	 <th scope="row"><?php echo $item['id'] ?></th>
					  	 <td><img src="<?php echo $item['photo_s']; ?>" clas="rounded" alt="<?php echo $item['car_number']; ?>"></td>
					  	 <td><?php echo $item['data']; ?></td>
					  	 <td><?php echo $item['car_number']; ?></td>
					  	 <td><?php echo $item['user_name']; ?></td>
					  	 <td><?php echo $item['lamp_number']; ?></td>
					  	 <td><?php echo $item['adders']; ?></td>
					  	 <td>
					  	 	<a href="edit.php ?id= <?php echo $item['id'] ?>"><button>编辑</button></a>
					  	 	 <a  href="delete.php?id= <?php echo $item['id'] ?>"><button>删除</button></a>
					  	 </td>
         				</tr>
					  <?php endwhile ?>
				</tbody>
			</table>

		</div>

		<div class="maincontent-bottom">
			&nbsp;
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