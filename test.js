//var sql=require('mssql');
//var conn_str="Driver={SQL Server Native Client 11.0};Server={.};Database={.};uid=sa;PWD=1234;";
// 
//sql.open(conn_str, function (err, conn) {
//      if (err) {
//          console.log('发生错误');
//      }
//
//      sql.queryRaw(conn_str, "select * from tb", function (err, results) {
//          if (err) {
//              console.log(err);
//          }
//          else {
//              for (var i = 0; i < results.rows.length; i++) {
//                  console.log(results.rows[i][0] + results.rows[i][1]);
//              }
//          }
//      })
//
//  })
//

var express = require('express');
var app = express();
var db = require('./db');

db.sql('select * from TB', function(err, result) {

	if(err) {
		console.log(err);
		return;
	}

	app.get('/', function(req, res) {
		res.send(result.recordsets[0][1].TITLE);
	})
	console.log('ok', result);
});
app.listen(3000);

//
//var db = require('./db');
//db.sql('select * from TB',function(err,result){
//if (err) {
//  console.log(err);
//  return;
//}
//console.log('用户总数为 :',result.length);
//});