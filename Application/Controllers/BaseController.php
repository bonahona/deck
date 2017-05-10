<?php
require_once(APPLICATION_ROOT . '/' . APPLICATION_FOLDER . '/Utilities/FacebookHelper.php');
require_once(APPLICATION_ROOT . '/' . APPLICATION_FOLDER . '/Utilities/DataSourcesHelper.php');
class BaseController extends Controller
{
    public $LoadedFeeds = array();


    public function BeforeAction()
    {
        if(!$this->IsLoggedIn()){
            return $this->Redirect('/login/', array('ref' => $this->RequestString));
        }

        $currentUser = $this->GetLocalUser();
        $topMenuItems = $this->Models->UserPage->Where(array('LocalUserId' => $currentUser->Id, 'IsActive' => 1, 'ShowInMenu' => 1, 'IsDeleted' => 0));
        $this->Set('TopMenuItems', $topMenuItems);

        $isAdmin = ($this->GetLocalUser()->UserLevel > 0);
        $this->Set('IsAdmin', $isAdmin);
    }

    protected function GetLocalUser()
    {
        $facebookUserId = $this->GetCurrentUser()->getId();
        $localUser = $this->Models->LocalUser->Where(array('FacebookUserId' => $facebookUserId))->First();
        return $localUser;
    }

    protected function LoadFeed($templateFeedId)
    {
        $this->LoadedFeeds[] = $templateFeedId;
    }

    protected function GetTemplatePaths()
    {
        $result = array();
        foreach($this->LoadedTemplates as $loadedTemplate){
            $result[] = $loadedTemplate['TemplatePath'];
        }

        $result = array_unique($result);
        return $result;
    }

    protected  function GetTemplateNames()
    {
        $result = array();
        foreach($this->LoadedTemplates as $loadedTemplate){
            $result[] = $loadedTemplate['TemplateName'];
        }

        $result = array_unique($result);
        return $result;
    }
}