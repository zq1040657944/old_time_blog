<?php

namespace app\admin\controller;
use app\common\model\AdminModel;
use think\Cache;
use think\captcha\Captcha;
use think\Controller;
use think\Loader;
use think\Log;

class Login extends Controller
   {

      /**
       * 登录页面
       */
    public  function  index()
    {
         return $this->fetch();
    }

    /**
     * 登录方法
     */
    public function login()
    {
        $user = new AdminModel();
        if (request()->isAjax()) {
            $data['username'] = $_POST['username'];
            $data['password'] = md5($_POST['password']);
            //验证验证码是否正确
            $code = $_POST['code'];
            $captcha = new Captcha();
            if (!$captcha->check($code)) {
                return json(['code' => -1, 'msg' => "验证码不正确"]);
            }
            //数据验证
            $validate = Loader::validate('Admin');
            if(!$validate->scene('login')->check(request()->post())){
                return json(['code' => -1, 'msg' => $validate->getError()]);
            }

                $res = $user->selectInfoByMap($data,1);
                if(empty($res)){
                    return json(['code' => -1, 'msg' => "账号密码不正确,登录失败"]);
                }
                if ( $res && $res->toArray() != -1 ) {
                    if ($res['status']==0) {
                        return json(['code' => -1, 'msg' => "账号处于禁用状态!"]);
                    }else{
                        //把用户信息保存到session中
                        session('qf_blog_admin',$res);
                        return json(['code' => 1, 'url' => url('admin/Index/index'), 'msg' => '登录成功,正在跳转...']);
                    }
                } else {
                    return json(['code' => -1, 'msg' => "程序异常！"]);
                }
        }
    }



    /**
     * @return mixed
     * 生成验证码
     */
    public function checkVerify()
    {
        $config =  [
            // 验证码字体大小
            'fontSize'    =>    30,
            'codeSet' => '0123456789',
            'useZh'=>false,
            // 验证码位数
            'length'      => 4,
        ];
        $captcha = new Captcha($config);
        return $captcha->entry();
    }
    /**
     * 空操作
     */
    public  function  _empty(){
        return $this->fetch('Error/404');
        // $this->error('空操作，正在跳转','Index/main');
    }

}




