<?php
require_once(APPLICATION_FOLDER . '/Utilities/FacebookHelper.php');
class BaseController extends Controller
{
    public function BeforeAction()
    {
        if(!$this->IsLoggedIn()){
            return $this->Redirect('/login/', array('ref' => $this->RequestString));
        }
    }
}