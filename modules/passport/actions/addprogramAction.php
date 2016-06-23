<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;
use Frame;
use FC;


/**
 * 用户的所有动作行为
 *
 */
class PassportAction extends Action
{

    /**
     * 欢迎页面
     *
     * @param Application $application            
     * @param Request $request            
     */
    public function executeAddprogram(Application $application, Request $request)
    {
        FC\Session::initSession();
        $baseUrl = $request->get('url', '/');
        $url = base64_decode($baseUrl);
        $url = Frame\Util\UString::base64_encode($url);
        $url = $baseUrl;
        $passport_id = $_SESSION['userinfo']['passport_id'];
        $type = $_SESSION['userinfo']['passport_type'];
        //z判断用户是不是已经有了项目  如果有了就不用做新添加了
        $res = $this->checkProgram($passport_id, $type);
        if ($res) {
            $this->headerTo($baseUrl);
        }
        switch ($type) {
            case 1:
                $this->headerTo('/passport/addprogramone/url/' . $url);
                break;
            case 2:
                $this->headerTo('/passport/addprogramtwo/url/' . $url);
                break;
            case 3:
                $this->headerTo('/passport/addprogramthree/url/' . $url);
                break;
            case 4:
                $this->headerTo('/passport/addprogramfour/url/' . $url);
                break;
        }
    }

    /**
     * 检测用户
     */
    private function checkProgram($passport_id, $type)
    {
        if ($type == 1) {
            $return = ($this->hasBrand($passport_id) > 0) ? true : false;
        } elseif ($type == 2 || $type == 3) {
            $return = ($this->hasMall($passport_id) > 0) ? true : false;
        } elseif ($type == 4) {
            $returnMall = $this->hasMall($passport_id);
            $returnBrand = $this->hasBrand($passport_id);
            if ($returnBrand || $returnMall) {
                $return = true;
            } else {
                $return = false;
            }
        }
        return $return;
    }
    /**
     * 用户是不是有品牌信息
     */
    private  function hasBrand($passport_id)
    {
        $db = DB();
        $where = [
            'passport_id' => $passport_id,
            'passport_brand_status' => 1
        ];
        $res = $db->select(' count(1) as count ')
            ->from('passport_brand')
            ->where($where)
            ->query();
        return $res[0]['count'];
    }
    /**
     * 用户是不是有商业体
     * */
    private function hasMall($passport_id)
    {
    	$db = DB();
    	$where = [
    			'passport_id' => $passport_id,
    			'passport_mall_status' => 1
    			];
    	$res = $db->select(' count(1) as count ')
    	->from('passport_mall')
    	->where($where)
    	->query();
    	return $res[0]['count'];
    }
}