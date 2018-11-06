var mssql = require('mssql');
var db = {};
var config = {
	user: 'sa',
	password: '1234',
	server: 'localhost',
	database: 'Test',
	port: 1433,
	connectionString: "Driver={SQL Server Native Client 11.0};Server=#{server}\\sql;Database=#{database};Uid=#{user};Pwd=#{password};",
	options: {
		//      encrypt: true // Use this if you're on Windows Azure  

	},
	pool: {
		min: 0,
		max: 10,
		idleTimeoutMillis: 3000
	}
};

//执行sql,返回数据.  
db.sql = function(sql, callBack) {
	var connection = new mssql.ConnectionPool(config, function(err) {
		if(err) {
			console.log(err);
			return;
		}
		var ps = new mssql.PreparedStatement(connection);
		ps.prepare(sql, function(err) {
			if(err) {
				console.log(err);
				return;
			}
			ps.execute('', function(err, result) {
				if(err) {
					console.log(err);
					return;
				}

				ps.unprepare(function(err) {
					if(err) {
						console.log(err);
						callback(err, null);
						return;
					}
					callBack(err, result);
				});
			});
		});
	});
};

module.exports = db;