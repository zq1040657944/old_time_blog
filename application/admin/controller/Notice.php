<?php
namespace app\admin\controller;

use app\common\model\TipModel;
class Notice extends Base
{
    public function index()
    {
        $tip = new TipModel();
        if (request()->isGet()) {
            $data = request()->param();
            if (!empty($data['page'])) {
                if (!empty($data['key'])) {
                    $map['id'] = $data['key'];
                } else {
                    $map = [];
                }
                $page['pageIndex'] = request()->param('page');
                $page['pageSize'] = request()->param('limit');
                $list = $tip->selectPageByMap($map, $page);
                foreach ($list as $k => $v) {
                    $v['statusName'] = $v['status_name'];
                    $list[$k] = $v;
                }
                $result['code'] = 0;
                $result['msg'] = "";
                $result['count'] = $tip->selectCountByMap($map);
                $result['data'] = $list;
                return json($result);
            } else {
                return $this->fetch();
            }
        }
    }
    /**
     * @return mixed|\think\response\Json
     * 添加我的微语言
     */
    public function add()
    {
        $tip = new TipModel();
        if (request()->isGet()) {
            return $this->fetch();
        }
        if (request()->isAjax()) {
            $data = request()->post();
            $data['tip_os'] = get_os();
            $data['tip_address'] = get_address_by_ip(request()->ip());
            unset($data['file']);
            $res = $tip->addTip($data);
            if ($res == -1) {
                return json(['code' => -1, 'msg' => '程序异常！']);
            } else {
                if ($res) {
                    return json(['code' => 1, 'msg' => '新增网站通知成功']);
                } else {
                    return json(['code' => -1, 'msg' => '新增网站通知失败']);
                }
            }
        }
    }


    /**
     * 修改网站通告
     * @return mixed|\think\response\Json
     */
    public function edit()
    {
        $tip = new TipModel();
        if (request()->isGet()) {
            $tip_map['id'] = request()->param('id');
            $result = $tip->selectInfoByMap($tip_map, 1);
            $this->assign('tip', $result);
            return $this->fetch();
        }
        if (request()->isAjax()) {
            $data = request()->post();
            $data['tip_os'] = get_os();
            $data['tip_address'] = get_address_by_ip(request()->ip());
            unset($data['file']);
            $res = $tip->editTipById($data);
            if ($res == -1) {
                return json(['code' => -1, 'msg' => '程序异常！']);
            } else {
                if ($res) {
                    return json(['code' => 1, 'msg' => '修改网站通告成功']);
                } else {
                    return json(['code' => -1, 'msg' => '修改网站通告失败']);
                }
            }
        }
    }

    /**
     * 删除网站通告
     * @return \think\response\Json
     */
    public function delete()
    {
        $tip = new TipModel();
        if (request()->isAjax()) {
            $id = request()->param('id');
            $res = $tip->deleteTipById($id);
            if ($res == -1) {
                return json(['code' => -1, 'msg' => '程序异常！']);
            } else {
                if ($res) {
                    return json(['code' => 1, 'msg' => '删除网站通知成功']);
                } else {
                    return json(['code' => -1, 'msg' => '删除删除网站通知失败']);
                }
            }
        }
    }



}