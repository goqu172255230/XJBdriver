const express=require('express');
const mysql=require('mysql');

var db=mysql.createPool({host: 'localhost', user: 'root', password: '', database: 'leaner'});

module.exports=function (){
  var router=express.Router();

  return router;
};
