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
class UcenterAction extends Action
{

    /**
     * 我的账户
     *
     * @param Application $application            
     */
    public function executeDopassportapply(Application $application, Request $request)
    {
        FC\Session::initSession();
        $this->setLayout();
        $this->setView();
        $demand_id = $request->get('demand_id');
        $apply_id = $request->get('apply_id');
        $dotype = $request->get('dotype');
        $desc = $request->get('desc');
        if (empty($dotype)){
            $this->headerTo('/error/404');
        }
        $r = \FC\Cs::doPassportApply($dotype,$apply_id,$demand_id);
        return $r;
	}
}