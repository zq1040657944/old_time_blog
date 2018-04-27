<?php
namespace app\admin\controller;

use app\common\model\SystemModel;
use app\common\model\ArticleModel;
use app\common\model\ArticleTagModel;

class System extends Base
{
    /**
     * 网站系统管理
     * @return mixed
     */
    public  function  index(){
        $cacheData['type'] = 'file';
        $cacheData['diff'] = 'path';
        $cacheData['path'] = BASE_PATH.'/cache';
        setCache($cacheData);
        //获取网站基本设置缓存
        $base_system =  cache('blog_base_system');
        if(empty($base_system)){
            //获取文章标签总数据
            $articleTag = New ArticleTagModel();
            $articleTag_count = $articleTag->selectCountByMap();
            $base_system['tag_count'] = $articleTag_count;
            // 获取文章总数数据
            $article = New ArticleModel();
            $where = '1=1';
            $article_count = $article->selectCountByMap($where);
            $base_system['article_count'] = $article_count;
            $base_system['create_date'] = '2018-04-13';
            $base_system['last_update'] = '2018-04-13';
        }
        //获取网站设置
        $system = new SystemModel();
        $system_type = "网站设置";
        $site_Info = $system->findSystem($system_type);
        //获取seo设置的内容
        $system_type = "SEO设置";
        $seo_Info = $system->findSystem($system_type);
        $this->assign([
            'base_system' => $base_system,
            'site_Info'   => $site_Info,
            'seo'         => $seo_Info
        ]);
        return $this->fetch();
    }
    /**
     * 新增配置
     * @return \think\response\Json
     *所有文件配置均写到配置缓存当中，并没有使用到数据库
     */
    public  function  add_base(){
        if(request()->isAjax()){
            $data = request()->post();
            $cacheData['type'] = 'file';
            $cacheData['diff'] = 'path';
            $cacheData['path'] = BASE_PATH.'/cache';
            setCache($cacheData);
            cache('blog_base_system', $data, 0);
            return json(['code'=>1,'msg'=>'操作成功']);
        }
    }
    /**
     * 新增网站基本设置
     * @return \think\response\Json
     */
    public function add_system()
    {
        if(request()->isAjax()){
            $data = request()->post();
            $data['system_type'] = "网站设置";
            $system = New SystemModel();
            $system->insertSystem($data);
            return json(['code'=>1,'msg'=>'操作成功']);
        }
    }
    /**
     * 修改网站基本设置
     * @return \think\response\Json
     */
    public function edit_system()
    {
        if(request()->isAjax()){
            $data = request()->post();
            $system = New SystemModel();
            $res = $system->editSystem($data);
            return json(['code'=>1,'msg'=>'操作成功']);
        }
    }
    //SEO设置
    public function add_seo()
    {
       if(request()->isAjax()){
            $data = request()->post();
            $data['system_type'] = "SEO设置";
            $system = New SystemModel();
            $system->insertSystem($data);
            return json(['code'=>1,'msg'=>'操作成功']);
        }
    }
}
