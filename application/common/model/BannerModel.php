<?php
namespace app\common\model;
use think\Db;
use think\Log;

class BannerModel extends BaseModel
{
	//指定完整数据表名(仅供Db:table()使用)
    protected $name = 'banner';           //指定数据表名
    //关闭自动写入时间戳字段
    protected $autoWriteTimestamp = false;
    //获取器（定义不存在的字段）
    public function getStatusNameAttr($value,$data)
    {
        $status = [1=>'显示',2=>'关闭'];
        return $status[$data['ban_view']];
    }
    //添加数据
	public function insertBanner($data)
	{
		try {
            $res = $this->save($data);
            return $res;
        } catch (\Exception $e) {
            Log::error('新增一条轮播图失败，位置 common/BannerModel/insertBanner,出错原因:' . $e->getMessage());
            return -1;
        }

	}
	 /** 通过条件查询轮播图
     * @param $map  //查询条件
     *@param  $page   //查询条件
     * @time  2017-09-06 23:01
     * @return array|false|int|\PDOStatement|string|\think\Collection|\think\Model
     */
    public  function  selectPageByMap($map,$page){
        try {
            $result  =  $this->where($map)->page($page['pageIndex'],$page['pageSize'])->order('ban_createtime desc')->select();
            return $result;
        } catch (\Exception $e) {
            Log::error('通过条件分页查询轮播图出现错误，位置 common/BannerModel/selectPageByMap,出错原因:'.$e->getMessage());
            return -1;
        }
    }
     /** 通过条件获取查询的轮播图总数
     * @param $map  //查询条件
     * @time  2017-09-06 23:01
     * @return array|false|int|\PDOStatement|string|\think\Collection|\think\Model
     */
    public  function  selectCountByMap($map){
        try {
            $result  =  $this->where($map)->count();
            return $result;
        } catch (\Exception $e) {
            Log::error('通过条件获取查询的轮播图总数出现错误，位置 common/BannerModel/selectCountByMap,出错原因:'.$e->getMessage());
            return -1;
        }
    }
    /** 通过条件查询指定轮播图数据（如果唯一值不是null 查询指定一条记录）
     * @param $map  //查询条件
     * @param  null $unique   //是否唯一
     * @return array|false|int|\PDOStatement|string|\think\Collection|\think\Model
     */
    public  function  selectInfoByMap($map,$unique=null){
        try {
            if (!empty($unique)) {
                $result =$this->where($map)->find();
            } else {
                $result = $this->where($map)->select();
            }
            return $result;
        } catch (\Exception $e) {
            Log::error('通过条件查询指定轮播数据出现错误，位置 common/BannerModel/selectInfoByMap,出错原因:'.$e->getMessage());
            return -1;
        }
    }
     /** 通过ID修改轮播图信息
     * @param $data  //需要修改的文章数据信息
     * @time 2017-09-11  10：27
     * @return array|false|int|\PDOStatement|string|\think\Collection|\think\Model
     */
    public  function  editArticleById($data){
        try {
            $result  =  $this->save($data,['id'=>$data['id']]);
            return $result;
        } catch (\Exception $e) {
            Log::error('通过ID修改轮播图信息出现错误，位置 common/BannerModel/editArticleById,出错原因:'.$e->getMessage());
            return -1;
        }
    }
    /**
     * 通过id删除轮播图信息
     * @param $id    // 文章的id
     * @return int 返回的值进行判断是否删除
     *  @time  2017-09-11 13:48
     */
    public  function  delArticleById($id){
        try{
            $res =  $this->where('id',$id)->delete();
            return $res;
        }catch (\Exception $e){
            Log::info('通过id删除轮播图信息出现错误.错误位置common/BannerModel/delArticleById. 错误原因:' .$e->getMessage());
            return -1;
        }
    }
}