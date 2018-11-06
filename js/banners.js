const express=require('express');
const mysql=require('mysql');

const db=mysql.createPool({host: "localhost", user: "root", password: "", database: "learner"});

module.exports=function (){
  var router=express.Router();

  router.get('/', (req, res)=>{
  	// 判断act的类型是删除还是修改
    switch(req.query.act){
    	// 如果是修改，那就是先取出数据
      case 'mod':
      	// 先查数据
        db.query(`SELECT * FROM banner_table WHERE id=${req.query.id}`, (err, data)=>{
          if(err){
          	// 打印错误但是不影响后续
            console.error(err);
            res.status(500).send('database error').end();
          }else if(data.length==0){
          	// id找不到
            res.status(404).send('data not found').end();
          }else{
          	// 再把数据渲染
            db.query('SELECT * FROM banner_table', (err, banners)=>{
              if(err){
                console.error(err);
                res.status(500).send('database error').end();
              }else{
                res.render('admin/banners.ejs', {banners, mod_data: data[0]});
              }
            });
          }
        });
        break;
      case 'del':
      	// 删除
        db.query(`DELETE FROM banner_table WHERE ID=${req.query.id}`, (err, data)=>{
          if(err){
            console.error(err);
            res.status(500).send('database error').end();
          }else{
          	// 重定向
            res.redirect('/admin/banners');
          }
        });
        break;
      default:
      	// 正常显示
        db.query('SELECT * FROM banner_table', (err, banners)=>{
          if(err){
            console.error(err);
            res.status(500).send('database error').end();
          }else{
            res.render('admin/banners.ejs', {banners});
          }
        });
        break;
    }
  });
  router.post('/', (req, res)=>{
    var title=req.body.title;
    var description=req.body.description;
    var href=req.body.href;

    if(!title || !description || !href){
      res.status(400).send('arg error').end();
    }else{
    	// 修改
      if(req.body.mod_id){
        db.query(`UPDATE banner_table SET \
          title='${req.body.title}',\
          description='${req.body.description}',\
          href='${req.body.href}' \
          WHERE ID=${req.body.mod_id}`,
          (err, data)=>{
            if(err){
              console.error(err);
              res.status(500).send('database error').end();
            }else{
            	// 返回回去
              res.redirect('/admin/banners');
            }
          }
        );
      }else{
      	//添加
        db.query(`INSERT INTO banner_table (title, description, href) VALUE('${title}', '${description}', '${href}')`, (err, data)=>{
          if(err){
            console.error(err);
            res.status(500).send('database error').end();
          }else{
            res.redirect('/admin/banners');
          }
        });
      }
    }
  });

  return router;
};
