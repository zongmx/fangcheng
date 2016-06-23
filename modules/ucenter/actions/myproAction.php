<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;
use Frame;
use FC;

/**
 * 用户的所有动作行为
 */
class UcenterAction extends Action
{

    /**
     * 管理我的项目
     *
     * @param Application $application            
     */
    public function executeMypro(Application $application, Request $request)
    {
        $q = $request->get('q');
        FC\Session::initSession();
        $passport_type = $_SESSION['userinfo']['passport_type'];
        
        switch ($q) {
            // 品牌 以 b 开头
            case 'bdel': // 删除我的品牌
                return $this->bdel($application, $request);
                break;
            case 'bedit': // 编辑我的品牌
                return $this->bedit($application, $request);
                break;
            case 'badd': // 增加我的品牌
                return $this->badd($application, $request);
                break;
            // 商业体 以 m 开头
            case 'mdel':
                return $this->mdel($application, $request);
                break;
            case 'medit':
                return $this->medit($application, $request);
                break;
            case 'madd': // 增加我管理的商业体
                return $this->madd($application, $request);
                break;
        }
    }

    /*
     * 增加 我管理的商业体项目
     */
    public function madd(Application $application, Request $request)
    {
        FC\Session::initSession();
        $passport_id = $_SESSION['userinfo']['passport_id'];
        if (REQUEST_METHOD == 'GET') { // 显示相关的页面
            $this->actionUrl = $request->getRequestUri();
            $this->userinfo=$_SESSION['userinfo'];
            $this->q=$request->get('q');
            $this->setView('myAddEditMall');
        } else { // 提交数据
            $passportMall = new \Model\Passport\Mall();
            $data = [];
            $data['mall_name'] = $request->get('mall_name');
            $data['mall_id'] = $request->get('mall_id');
            $data['passport_id'] = $passport_id;
            $data['passport_mall_ctime'] = date('Y-m-d H:i:s', time());
            $data['area_id'] = $request->get('area_id');
            $re=$this->boolExisit($data['mall_id'], $passport_id,2);
            if (!$re['result']){
                return $re;
            }
            $result = $passportMall->add($data);
            if ($result) {
                return [
                    'result' => 1,
                    'resultMsg' => "添加成功"
                ]
                ;
            } else {
                return [
                    'result' => 0,
                    'resultMsg' => "添加失败"
                ]
                ;
            }
        }
    }
    /*
     * 增加 我管理的品牌项目
     */
    public function badd(Application $application, Request $request)
    {
        FC\Session::initSession();
        $passport_id = $_SESSION['userinfo']['passport_id'];
        if (REQUEST_METHOD == 'GET') { // 显示相关的页面
            $this->actionUrl = $request->getRequestUri();
            $this->userinfo=$_SESSION['userinfo'];
            $this->q=$request->get('q');
            $this->setView('myAddEditBrand');
        } else { // 提交数据
            $passportBrand = new \Model\Passport\Brand();
            $data = [];
            $data['brand_name'] = $request->get('brand_name');
            $data['brand_id'] = $request->get('brand_id');
            $data['category_ids'] = $request->get('category_ids');
            $data['category_ids_other'] = $request->get('category_ids_other');
            $data['passport_brand_style'] = $request->get('passport_brand_style');
            $data['passport_id'] = $passport_id;
            $data['passport_brand_ctime'] = date('Y-m-d H:i:s', time());
            $data['area_ids'] = $request->get('area_ids');
            $re=$this->boolExisit($data['brand_id'], $passport_id,1);
            if (!$re['result']){
                return $re;
            }
            $result = $passportBrand->add($data);
            if ($result) {
                return [
                    'result' => 1,
                    'resultMsg' => "添加成功"
                ]
                ;
            } else {
                return [
                    'result' => 0,
                    'resultMsg' => "添加失败"
                ]
                ;
            }
        }
    }

    /*
     * 编辑 我管理的商业体项目
     */
    public function medit(Application $application, Request $request)
    {
        FC\Session::initSession();
        $passport_id = $_SESSION['userinfo']['passport_id'];
        $passportMall = new \Model\Passport\Mall();
        $passport_type=$_SESSION['userinfo']['passport_type'];
        if (REQUEST_METHOD == 'GET') { // 显示相关的页面
            $this->setView('myAddEditMall');
            $this->actionUrl = $request->getRequestUri();
            $passport_mall_id = $request->get('id');
            $passportMallInfo = $passportMall->find($passport_mall_id);
            $info = [
                'mall_name' => $passportMallInfo['mall_name'],
                'mall_id' => $passportMallInfo['mall_id'],
                'passport_mall_id' => $passportMallInfo['passport_mall_id'],
                'area_id' => $passportMallInfo['area_id'],
            ];
            $c = FC\GetValue::getinfo('fangcheng_v2', 'area', $info['area_id']);
            $info['area_name'] = $c['resuleMsg']['area_name'];
            $info['url'] = $request->get('url');
            $info['q']=$request->get('q');
            $info['userinfo']=$_SESSION['userinfo'];
            $this->resultArray = $info;
        } else { // 提交数据
            $passport_mall_id = $request->get('passport_mall_id');
            $data = [];
            $data['mall_name'] = $request->get('mall_name');
            $data['mall_id'] = $request->get('mall_id');
            $data['passport_id'] = $passport_id;
            $data['passport_mall_utime'] = date('Y-m-d H:i:s', time());
            $data['area_id'] = $request->get('area_id');
            $result = $passportMall->setId($passport_mall_id)->edit($data);
            if ($result) {
                return [
                    'result' => 1,
                    'resultMsg' => "编辑成功",
                ]
                ;
            } else {
                return [
                    'result' => 0,
                    'resultMsg' => "编辑失败",
                ];
            }
        }
    }
    /*
     * 编辑 我管理的品牌项目
     */
    public function bedit(Application $application, Request $request)
    {
        FC\Session::initSession();
        $passport_id = $_SESSION['userinfo']['passport_id'];
        $passportBrand = new \Model\Passport\Brand();
        
        if (REQUEST_METHOD == 'GET') { // 显示相关的页面
            $this->setView('myAddEditBrand');
            $this->actionUrl = $request->getRequestUri();
            $passport_brand_id = $request->get('id');
            $passportBrandInfo = $passportBrand->find($passport_brand_id);
            $info = [
                'brand_name' => $passportBrandInfo['brand_name'],
                'brand_id' => $passportBrandInfo['brand_id'],
                'category_ids' => $passportBrandInfo['category_ids'],
                'category_ids_other' => $passportBrandInfo['category_ids_other'],
                'passport_brand_style' => $passportBrandInfo['passport_brand_style'],
                'passport_brand_id' => $passportBrandInfo['passport_brand_id'],
                'area_ids' => implode(',', $passportBrandInfo['area_ids']),
                'category_ids_str' => $this->getCatShow($passportBrandInfo['category_ids'], $passportBrandInfo['category_ids_other'])
            ];
            /**
             * 解析身份
             */
            if ($info['passport_brand_style'] == 1) {
                $info['passport_brand_style_str'] = '直营';
            } elseif ($info['passport_brand_style'] == 2) {
                $info['passport_brand_style_str'] = '加盟';
            } elseif ($info['passport_brand_style'] == 3) {
                $info['passport_brand_style_str'] = '代理';
            }
            $brand_area = FC\GetValue::getInfoList('fangcheng_v2', 'area', $info['area_ids'], 'area_name');
            $info['area'] = $brand_area['result'] ? $brand_area['resuleMsg'] : '';
            $info['userinfo']=$_SESSION['userinfo'];
            $info['url'] = $request->get('url');
            $info['q']=$request->get('q');
            $this->resultArray = $info;
        } else { // 提交数据
            $passport_brand_id = $request->get('passport_brand_id');
            $data = [];
            $data['brand_name'] = $request->get('brand_name');
            $data['brand_id'] = $request->get('brand_id');
            $data['category_ids'] = $request->get('category_ids');
            $data['category_ids_other'] = $request->get('category_ids_other');
            $data['passport_brand_style'] = $request->get('passport_brand_style');
            $data['passport_id'] = $passport_id;
            $data['passport_brand_utime'] = date('Y-m-d H:i:s', time());
            $data['area_ids'] = $request->get('area_ids');
            $result = $passportBrand->setId($passport_brand_id)->edit($data);
            if ($result) {
                return [
                    'result' => 1,
                    'resultMsg' => "编辑成功",
                ]
                ;
            } else {
                return [
                    'result' => 0,
                    'resultMsg' => "编辑失败",
                ];
            }
        }
    }

    /*
     * 删除 我管理的品牌项目
     */
    public function bdel(Application $application, Request $request)
    {
        FC\Session::initSession();
        $passport_id = $_SESSION['userinfo']['passport_id'];
        $passport_brand_id = $request->get('id');
        $fangcDb =DB();
        $c = $fangcDb->update('passport_brand')
            ->set([
            'passport_brand_status' => 0
        ])
            ->where([
            'passport_brand_id' => $passport_brand_id,
            'passport_id' => $passport_id
        ])
            ->query();
        if ($c){
            $url="/ucenter/mybrand";
            $this->headerTo($url);
        }
        else
        {
            $url="/ucenter/mypro/bedit/id/".$passport_brand_id;
            $this->headerTo($url);
        }
        /* return [
            'result' => $c,
            'resultMsg' => $c > 0 ? "删除成功" : "删除失败"
        ]; */
    }

    /*
     * 删除 我管理的商业体项目
     */
    public function mdel(Application $application, Request $request)
    {
        FC\Session::initSession();
        $passport_id = $_SESSION['userinfo']['passport_id'];
        $passport_mall_id = $request->get('id');
        $fangcDb =DB();
        $c = $fangcDb->update('passport_mall')
            ->set([
            'passport_mall_status' => 0
        ])
            ->where([
            'passport_mall_id' => $passport_mall_id,
            'passport_id' => $passport_id
        ])
            ->query();
        
        if ($c){
            $url="/ucenter/mymall";
            $this->headerTo($url);
        }
        else 
        {
            $url="/ucenter/mypro/medit/id/{$passport_mall_id}";
            $this->headerTo($url);
        }
       /*  return [
            'result' => $c,
            'resultMsg' => $c > 0 ? "删除成功" : "删除失败"
        ]; */
    }

    /*
     * 根据业态ids 获取业态展示
     */
    public function getCatShow($cateids, $category_ids_other)
    {
        $cc = FC\Comm::getCategoryDeepName($cateids);
        if (count(explode('-', $cc)) > 1) {
            $return['c_all'] = empty($category_ids_other) ? $cc : $cc . "<p>{$category_ids_other}</p>";
            preg_match_all('/<p>([^-]*)-([^<]*)?<\/p>/', $cc, $m);
            $cone = implode(',', $m[1]);
            $ctwo = implode(',', $m[2]);
        } else {
            $cc = str_replace('<p>', '', $cc);
            $cc = str_replace('</p>', '', $cc);
            $cone = $cc;
            $return['c_all'] = empty($val['category_ids_other']) ? $cc : $cc . "<p>{$category_ids_other}</p>";
        }
        if (! empty($category_ids_other)) {
            $cone = $cone . " " . '其他';
            $return['cone'] = $cone;
            $ctwo = $ctwo . $category_ids_other;
            $return['ctwo'] = $ctwo;
        } else {
            $return['cone'] = $cone;
            $return['ctwo'] = $ctwo;
        }
        $return['category_ids'] = implode(',', $cateids);
        unset($cone);
        unset($ctwo);
        return $return;
    }

    /*
     * 根据type 和 id 判断 是不是已经存在了这个项目
     * $type :1 品牌 2 商业体
     * $passport_id 用户通行证ID
     * $id 商业体 或者 品牌 ID
     */
    public function boolExisit($id, $passport_id, $type=1)
    {
        $db = DB();
        $result=null;
        if ($type == 1) {
            $result = $db->select('1')
                ->from('passport_brand')
                ->where([
                        'passport_id' => $passport_id,
                        'brand_id' => $id,
                        'passport_brand_status' => 1
                    ])
                ->query();
        }else{
            $result = $db->select('1')
            ->from('passport_mall')
            ->where([
                'passport_id' => $passport_id,
                'mall_id' => $id,
                'passport_mall_status' => 1
            ])
            ->query();
        }
       if($result){
           $return=[
               'result'=>false,
               'detailes'=>'已经存在'
           ];
       }else{
           $return=[
               'result'=>true,
               'detailes'=>'可以添加此项目到您名下'
           ];
       }
       return $return;
    }
}