<?php

namespace app\index\controller;

use think\Db;
use think\Request;
use think\Controller;
header("Content-Type: text/html;charset=utf-8");
class Index extends controller
{
    public function index()
    {
        $data = Db::table('user')->select();
        $this->assign('data', $data);
//          var_dump($data)
        return view();
        //判断页面是否提交

    }
    public function jiche()
    {
        if (request()->isPost()) {
            $data = [
                'id' => input('id'),
                'license_n' => input('license_n'),//这两句是接收form表提交的数据
                'title' => input('title'),//这两句是接收form表提交的数据
                'sub_dep' => input('sub_dep'),//这两句是接收form表提交的数据
                'brand_name' => input('brand_name'),//这两句是接收form表提交的数据
                'buytime' => input('buytime'),//这两句是接收form表提交的数据
                'fanumber' => input('fanumber'),//这两句是接收form表提交的数据
                'nextdata' => input('nextdata'),//这两句是接收form表提交的数据
                'forhome' => input('forhome'),//这两句是接收form表提交的数据
                'beizhu' => input('beizhu'),//这两句是接收form表提交的数据
                'user' => input('user'),//这两句是接收form表提交的数据
            ];
            if (Db::name('locomotive')->insert($data)) {//使用Db方法向数据表admin中添加数据
                return $this->success('添加管理员成功！', 'index');
            } else {
                return $this->error('添加管理员失败！');
            }

            return;
        }
    }
    public function ok()
    {
        if (request()->isPost()) {
            $data = [
                'id' => input('id'),
                'data' => input('data'),//这两句是接收form表提交的数据
                'user_name' => input('user_name'),//这两句是接收form表提交的数据
                'car_number' => input('car_number'),//这两句是接收form表提交的数据
                'lamp_number' => input('lamp_number'),//这两句是接收form表提交的数据
                'adders' => input('adders'),//这两句是接收form表提交的数据
            ];
            if (Db::name('user')->insert($data)) {//使用Db方法向数据表admin中添加数据

                return $this->success('添加汽车成功！', 'index');
            } else {
                return $this->error('添加汽车失败！');
            }

            return;
        }
    }
    //定义操作成功的方法
    public function postMassage(Request $request)
    {
        $license_n   = $request->param('license_n');
        $messages = Db::name('locomotive')->where('license_n',$license_n)->find();
        if (empty($messages)) {
            return json(['status' => 'ok','code' => 400,'message' => '暂时不存在！换一个吧！',]);
        }
        return $messages;
      //  dump($messages);exit;


    }

}
