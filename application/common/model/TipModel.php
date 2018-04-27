<?php

namespace app\common\model;

use think\Model;
use think\Log;

class TipModel extends Model
{
    //指定完整数据表名(仅供Db:table()使用)
    protected $name = 'tip';           //指定数据表名
    //关闭自动写入时间戳字段
    protected $autoWriteTimestamp = true;
    //数据完成
    protected $insert = ['ip'];

    //自动完成写入ip
    protected function setIpAttr()
    {
        return request()->ip();
    }
    //获取器（定义不存在的字段）
    public function getStatusNameAttr($value, $data)
    {
        $status = [1 => '正常', 0 => '草稿'];
        return $status[$data['tip_status']];
    }
    /**
     * 新增一条网站通告
     * @param $data
     * @time  2018-04-20 21:37
     * @return false|int
     */
    public function addTip($data)
    {
        try {
            $res = $this->save($data);
            return $res;
        } catch (\Exception $e) {
            Log::error('添加网站通告错误，位置 common/TipModel/addTip,出错原因:' . $e->getMessage());
            return -1;
        }
    }
    /** 通过条件分页查询网站通告
     * @param $map //查询条件
     * @param  $page //查询条件
     * @time  2018-04-20 21:50
     * @return array|false|int|\PDOStatement|string|\think\Collection|\think\Model
     */
    public function selectPageByMap($map, $page)
    {
        try {
            $result = $this->where($map)->page($page['pageIndex'], $page['pageSize'])->order('create_time desc')->select();
            return $result;
        } catch (\Exception $e) {
            Log::error('通过条件分页查询网站通告出现错误，位置 common/TipModel/selectPageByMap,出错原因:' . $e->getMessage());
            return -1;
        }
    }
    /** 通过条件获取查询网站通告总数
     * @param $map //查询条件
     * @time  2018-04-20 21:52
     * @return array|false|int|\PDOStatement|string|\think\Collection|\think\Model
     */
    public function selectCountByMap($map)
    {
        try {
            $result = $this->where($map)->count();
            return $result;
        } catch (\Exception $e) {
            Log::error('通过条件获取查询网站通告总数出现错误，位置 common/TipModel/selectCountByMap,出错原因:' . $e->getMessage());
            return -1;
        }
    }

    /** 通过条件查询指定网站通告（如果唯一值不是null 查询指定一条记录）
     * @param $map //查询条件
     * @param  null $unique //是否唯一
     * @return array|false|int|\PDOStatement|string|\think\Collection|\think\Model
     */
    public function selectInfoByMap($map, $unique = null)
    {
        try {
            if (!empty($unique)) {
                $result = $this->where($map)->find();
            } else {
                $result = $this->where($map)->select();
            }
            return $result;
        } catch (\Exception $e) {
            Log::error('通过条件查询指定网站通告出现错误，位置 common/TipModel/selectInfoByMap,出错原因:' . $e->getMessage());
            return -1;
        }
    }

    /**
     * 通过ID修改一条网站通告
     * @param $data
     * @time  2017-09-14 13:38
     * @return false|int
     */
    public function editTipById($data)
    {
        try {
            $res = $this->save($data,['id' => $data['id']]);
            return $res;
        } catch (\Exception $e) {
            Log::error('通过ID修改一条网站通告出现错误，位置 common/TipModel/editTipById,出错原因:' . $e->getMessage());
            return -1;
        }
    }
    /**
     * 通过id删除网站通告
     * @param $id
     * @return int
     */
    public function deleteTipById($id)
    {
        try {
            $res = $this->where('id', $id)->delete();
            return $res;
        } catch (\Exception $e) {
            Log::error('通过id删除我的微语言言出现错误，位置 common/SaidModel/deleteSadById,出错原因:' . $e->getMessage());
            return -1;
        }
    }
}