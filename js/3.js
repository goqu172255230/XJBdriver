var express=require('express');
var app=express();
var sql=require('mssql');

var config={
	user: 'sa',
    password: '1234',
    server: 'localhost',
    database: 'Test',
    port: 1433,
    options: {
      // Use this if you're on Windows Azure  
    }
};
app.get('/api/user',function(req,res){
	sql.connect(config).then(function()
	{
		new sql.request().Input('input_paraneter',sql.INT,1002)
		.query('select * from tb').then(function(recordset){
		console.dir(recordset);
		res.json(recordset);
		}).catch(function(err){
			console.log(err);
			res.send(err);
		});
	}).catch(function(err){
		console.log(err);
		res.send(err);
	});
});
app.post('api/user',function(req,res){
	//操作数据库代码
})
app.delete('api/user/:usrId',function(req,res){
	
})
app.listen(8080,function(){
	console.log('app listening on 8080');
});
