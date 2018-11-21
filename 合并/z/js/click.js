//var ids = new Array("maincontent", "loco", "drv", "lianx", "weiz");
//
//for(var i = 0; i < ids.length; i++) {
//	if(my$("" + ids[i] + "").onclick) {
//		my$("" + ids[i] + "").display = "block";
//
//	} else {
//		my$("" + ids[i] + "").display = "none";
//	}
//}
var aObj = my$("node_small").getElementsByTagName("a")[0];

aObj.onmouseover = function() {
	my$("er").className = "erweima show";
};

aObj.onmouseout = function() {
	my$("er").className = "erweima hide";
};

function getScroll() {
	return {
		top: window.pageYOffset || document.body.scrollTop || document.documentElement.scrollTop || 0,
		left: window.pageXOffset || document.body.scrollLeft || document.documentElement.scrollLeft || 0

	};
}
document.onmousemove = function(e) {
	my$("im").style.left = e.clientX + 1 + "px";
	my$("im").style.top = e.clientY + 1 + "px";
}

function getFirstElement(element) {
	if(element.firstElementChild) {
		return element.firstElementChild;
	} else {
		var node = element.firstChild;
		while(node && node.nodeType != 1) {
			node = node.nextSibling;
		}
		return node;
	}
}
var timeI = setInterval(function() {
	animate(my$("dv"), 1700);

	function animate(element, target) {

		clearInterval(element.timeId);
		element.timeId = setInterval(function() {

			var current = element.offsetLeft;

			var step = (target - current) / 10;
			step = step > 0 ? Math.ceil(step) : Math.floor(step);
			current += step;
			element.style.left = current + "px";
			if(current == target) {
				target = 0;

			}
		}, 20);
	}

}, 1000);

var trs = my$("j_tb").getElementsByTagName("tr");
for(var i = 0; i < trs.length; i++) {
	trs[i].style.backgroundColor = i % 2 == 0 ? "red" : "yellow";
	//鼠标进入
	trs[i].onmouseover = mouseoverHandle;
	//鼠标离开
	trs[i].onmouseout = mouseoutHandle;
}

var lastColor = "";

function mouseoverHandle() {
	lastColor = this.style.backgroundColor;
	this.style.backgroundColor = "green";
}

function mouseoutHandle() {
	this.style.backgroundColor = lastColor;
}

my$("link").onclick = function() {
	my$("login").style.display = "block";
	my$("bg").style.display = "block";
};

my$("closeBtn").onclick = function() {
	my$("login").style.display = "none";
	my$("bg").style.display = "none";
};

my$("title").onmousedown = function(e) {
	var spaceX = e.clientX - my$("login").offsetLeft;
	var spaceY = e.clientY - my$("login").offsetTop;

	document.onmousemove = function(e) {

		var x = e.clientX - spaceX + 250;
		var y = e.clientY - spaceY - 140;
		my$("login").style.left = x + "px";
		my$("login").style.top = y + "px";

	}

};

my$("title").onmouseup = function() {
	document.onmousemove = null;

	document.onmousemove = function(e) {
		my$("im").style.left = e.clientX + 1 + "px";
		my$("im").style.top = e.clientY + 1 + "px";
	}

};

//
//
//my$("closeButton").onclick=function () {
//  //设置最下面的div的高渐渐的变成0
//  animate(my$("bottomPart"),{"height":0},function () {
//    animate(my$("box1"),{"width":0});
//  });
//};
//