<?php
namespace app\admin\controller;

use app\common\model\BannerModel;
class Banner extends Base
{
	//轮播图管理
	public function index()
	{
		$admin = new BannerModel();
		if(request()->isGet())
		{
			$data = request()->param();
            if (!empty($data['page'])) {
                if (!empty($data['key'])) {
                    $map['ban_title'] = ['like', "%$data[key]%"];
                } else {
                    $map = [];
                }
                $page['pageIndex'] = request()->param('page');
                $page['pageSize'] = request()->param('limit');
                $list = $admin->selectPageByMap($map, $page);
                foreach ($list as $k => $v) {
                    $v['statusName'] = $v['ban_view'];
                    $list[$k] = $v;
                }
                $result['code'] = 0;
                $result['msg'] = "";
                $result['count'] = $admin->selectCountByMap($map);
                $result['data'] = $list;
                return json($result);
		}
		return $this->fetch();
	  }
		
	}
	//轮播图添加
	public function add()
	{
		$banner = New BannerModel();
		if (request()->isPost()) {
            $data = request()->post();
            $data['ban_img'] = session('img_url');
            $data['ban_createtime'] = date("Y-m-d H:i:s",time());
            $data['ban_edittime'] = date("Y-m-d H:i:s",time());
            unset($data['__token__']);
            unset($data['file']);
            $res = $banner->insertBanner($data);
            if ($res == -1) {
                return json(['code' => -1, 'msg' => '出现错误，请联系作者']);
            } else {
                return json(['code' => 1, 'msg' => '新增轮播图成功！']);
            }
        }
		return $this->fetch();
	}
	//轮播图上传图片
	public function upload()
	{
		//获取文件上传
        $arr = $_FILES["file"];
        if(is_uploaded_file($arr['tmp_name'])) {  
        //把文件转存到你希望的目录（不要使用copy函数）  
        $uploaded_file=$arr['tmp_name'];  
        //我们给每个用户动态的创建一个文件夹  
        $user_path='/uploads';  
        //判断该用户文件夹是否已经有这个文件夹  
        if(!file_exists($user_path)) {  
            mkdir($user_path);  
        }  
        $file_true_name=$arr['name'];  
        $move_to_file=$user_path."/".time().rand(1,1000).substr($file_true_name,strrpos($file_true_name,"."));
        session('img_url',$move_to_file);
        if(move_uploaded_file($uploaded_file,iconv("utf-8","gb2312",$move_to_file))) {  
            return array('code' => -1);
        } else {  
            echo array('code' => 2);  
        }  
	    } else {  
	        echo array('code' => 2);   
	    } 
	}
    //轮播图修改
    public function edit()
    {
        $banner = New BannerModel();
        if (request()->isGet()) {
            $id = input('param.id');
            $banner['id'] = $id;
            $data['ban_img'] = session('img_url');
            $banner_info = $banner->selectInfoByMap($banner, 1);
            $this->assign([
                'banner' => $banner_info,
            ]);
            return $this->fetch();
        }
        if (request()->isAjax()) {
            $data = request()->post();
            $data['ban_edittime'] = date("Y-m-d H:i:s",time());
            //可以注册
            //释放掉表单令牌数据
            unset($data['__token__']);
            unset($data['file']);
            $res = $banner->editArticleById($data);
            if ($res == -1) {
                return json(['code' => -1, 'msg' => '出现错误，请联系管理员']);
            } else {
                return json(['code' => 1, 'msg' => '修改轮播图成功']);
            }
        }
    }
    /**
     * 根据ID删除轮播图信息
     */
    public function delete()
    {
         $banner = New BannerModel();
        if (request()->isAjax()) {
            $id = request()->param('id');
            $res = $banner->delArticleById($id);
            if ($res == -1) {
                return json(['code' => '-1', 'msg' => '删除轮播图出现错误，请联系管理员']);
            } else {
                if ($res) {
                    return json(['code' => '1', 'msg' => '删除轮播图成功', 'url' => url('Banner/index')]);
                } else {
                    return json(['code' => '-1', 'msg' => '删除轮播图失败']);
                }
            }
        }
    }

}