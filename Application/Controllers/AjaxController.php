<?php
require_once(APPLICATION_FOLDER . '/Utilities/FacebookHelper.php');
class AjaxController extends Controller
{
    public function BeforeAction()
    {
        if(!$this->IsLoggedIn()){
            return $this->NoResponse();
        }
    }

    public function NoResponse()
    {
        $data = array(
            'success' => 0,
            'message' => 'Not logged  in'
        );

        return $this->Json($data);
    }

    protected function SendData($data)
    {
        $data = array(
            'success' => 1,
            'data'  => $data
        );

        return $this->Json($data);
    }
}