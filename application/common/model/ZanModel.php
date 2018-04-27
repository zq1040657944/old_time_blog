<?phpnamespace app\common\model;use think\Model;use think\Log;class ZanModel extends Model{    //指定完整数据表名(仅供Db:table()使用)    protected $name = 'zan';           //指定数据表名    //关闭自动写入时间戳字段    protected $autoWriteTimestamp = false;    //获取器(存在的字段)    /* public function getStatusAttr($value)     {         $status = [1=>'正常',0=>'禁用'];         return $status[$value];     }*/    //数据完成    protected $insert = ['ip','create_time'];    //自动完成写入ip    protected function setIpAttr()    {        return request()->ip();    }    protected function setCreateTimeAttr()    {        return time();    }    // 属性获改器    protected function getCreateTimeAttr($datetime)    {        return date('Y-m-d H:i:s', $datetime);    }    /** 通过条件查询点赞（如果唯一值不是null 查询指定一条记录）     * @param $map //查询条件     * @param  null $unique //是否唯一     * @return array|false|int|\PDOStatement|string|\think\Collection|\think\Model     */    public function selectInfoByMap($map, $unique = null)    {        try {            if (!empty($unique)) {                $result = $this->where($map)->find();            } else {                $result = $this->where($map)->order('create_time desc')->select();            }            return $result;        } catch (\Exception $e) {            Log::error('通过条件查询点赞出现错误，位置 common/ZanModel/selectInfoByMap,出错原因:' . $e->getMessage());            return -1;        }    }    /** 通过条件分页查询留言     * @param $map //查询条件     * @param  $page //查询条件     * @time  2017-09-13 23:18     * @return array|false|int|\PDOStatement|string|\think\Collection|\think\Model     */    public function selectPageByMap($map, $page)    {        try {            $result = $this->where($map)->page($page['pageIndex'], $page['pageSize'])->order('create_time desc')->select();            return $result;        } catch (\Exception $e) {            Log::error('通过条件分页查询留言出现错误，位置 common/MessageModel/selectPageByMap,出错原因:' . $e->getMessage());            return -1;        }    }    /** 通过条件获取查询留言总数     * @param $map //查询条件     * @time  2017-09-13 23:18     * @return array|false|int|\PDOStatement|string|\think\Collection|\think\Model     */    public function selectCountByMap($map)    {        try {            $result = $this->where($map)->count();            return $result;        } catch (\Exception $e) {            Log::error('通过条件获取查询留言总数出现错误，位置 common/MessageModel/selectCountByMap,出错原因:' . $e->getMessage());            return -1;        }    }    /**     * 新增一条点赞信息     * @param $data     * @time  2017-09-17 10:48     * @return false|int     */    public function insertZan($data)    {        try {            $res = $this->save($data);            return $res;        } catch (\Exception $e) {            Log::error('新增一条点赞信息出现错误，位置 common/ZanModel/insertMessage,出错原因:' . $e->getMessage());            return -1;        }    }}