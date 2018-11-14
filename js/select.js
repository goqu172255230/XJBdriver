function my$(id) {
	return document.getElementById(id);
}
//
//var ids = new Array("maincontent", "loco", "drv", "lianx", "weiz");
//
//for(var i = 0; i < ids.length; i++) {
// my$('ids[i]').onclick = function () {
// if (my$("dv").className != "cls") {
//    my$("dv").className = "cls";
//   
// } else {
//    my$("dv").className = "block";
//  }	
// }
//}
   
function shouye() {
	my$('maincontent').style.display = 'block';
	my$('loco').style.display = 'none';
	my$('drv').style.display = 'none';
	my$('lianx').style.display = 'none';
	my$('weiz').style.display = 'none'
}

function jiche() {
	my$('maincontent').style.display = 'none';
	my$('drv').style.display = 'none';
	my$('weiz').style.display = 'none';
	my$('lianx').style.display = 'none';
	my$('loco').style.display = 'block'
}

function siji() {
	my$('maincontent').style.display = 'none';
	my$('loco').style.display = 'none';
	my$('weiz').style.display = 'none';
	my$('lianx').style.display = 'none';
	my$('drv').style.display = 'block'
}

function weizhang() {
	my$('maincontent').style.display = 'none';
	my$('loco').style.display = 'none';
	my$('drv').style.display = 'none';
	my$('lianx').style.display = 'none';
	my$('weiz').style.display = 'block'
}

function lianxi() {
	my$('maincontent').style.display = 'block';
	my$('loco').style.display = 'none';
	my$('drv').style.display = 'none';
	my$('weiz').style.display = 'none';
	my$('lianx').style.display = 'none';
	alert("请联系QQ或者QQ群\n\n\t205306626")
} //	"javascript:window.alert('确定吗？')"

// window.onload=function(){
// 	my$(maincontent).on
// }
  

 function query() {
	var ss = (window.ActiveXObject) ? "此浏览器支持ActiveXObject" : "此浏览器不支持ActiveXObject";

	//alert(navigator.appVersion);

	var xx = my$("support");

	var a = (navigator.appVersion + ";").split(";");

	xx.innerHTML = "浏览器名称：" + navigator.appName + "<br>" +
		"浏览器平台：" + navigator.platform + "<br>" +
		"浏览器版本：" + a[1].replace("MS", "") + "<br>" +
		"<br><b>" + ss + "</b><br><br>";

	var o = new ActiveXObject("Scripting.FileSystemObject");
	var od = o.GetDrive("E");
	xx.innerHTML += ("E盘的卷名称是：" + od.VolumeName);

	//连接数据库
	var db = new ActiveXObject("ADODB.Connection");
	db.open("Provider=SQLOLEDB.1;Data Source=.;User ID=sa;Password=1234;Initial Catalog=san");
	var rs;
	var yy;
	if(my$('drv').style.display == 'block') {
		rs = db.Execute("select * from tb_Drivers");
		yy = my$("sp");
	} else if(my$('loco').style.display == 'block') {
		rs = db.Execute("select * from tb_Drivers");
		yy = my$("sp1");
	} else if(my$('weiz').style.display == 'block') {
		rs = db.Execute("select * from TrafficLCLogs");
		yy = my$("sp2");
	}
	var c = rs.Fields.Count - 1;

	//拼接表的字段名称
	var str = "<table border=2 width=100%><tr>";
	for(var i = 0; i <= c; i++) {
		str += "<td>" + rs.Fields(i).Name + "</td>";
	}

	str += "</tr>";

	//拼接表的数据
	while(!rs.EOF) {
		str += "<tr>";
		for(var i = 0; i <= c; i++) {
			str += "<td>" + rs.Fields(i).Value + "</td>";
		}
		str += "</tr>";

		rs.moveNext();
	}

	str += "</table>";

	yy.innerHTML = str;

	rs.Close();
	db.Close();
}