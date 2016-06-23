<?php
use Frame\Foundation\Application;
use Frame\Http\Request;
use Frame\Foundation\Action;

/**
 * 用户的所有动作行为
 */
class DemoActions extends Action
{
    public function executeIndex(Application $application, Request $request){
          $this->setView('index');
    }
}


