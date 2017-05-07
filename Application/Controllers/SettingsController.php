<?php
require_once(APPLICATION_ROOT . '/' . APPLICATION_FOLDER . '/Utilities/DataSourcesHelper.php');
require_once('BaseController.php');
class SettingsController extends BaseController
{
    public function BeforeAction()
    {
        parent::BeforeAction();

        $this->EnqueueJavascript($this->Html->Js('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', false));
        $this->EnqueueJavascript($this->Html->Js('https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', false));
        $this->EnqueueJavascript($this->Html->Js('bootstrap.min.js'));
        $this->EnqueueJavascript($this->Html->Js('handlebars.min.js'));
        $this->EnqueueJavascript($this->Html->Js('backend.js'));
    }

    public function Index()
    {
        $this->Title = 'Settings';

        $localUser = $this->GetLocalUser();
        $this->Set('LocalUser', $localUser);

        return $this->View();
    }

    public function Create()
    {
        if(!$this->IsPost()){
            return $this->Redirect('/Settings');
        }

        $localUser = $this->GetLocalUser();
        if($localUser == null){
            return $this->HttpNotFound();
        }

        $userPage = $this->Data->Parse('UserPage', $this->Models->UserPage);
        $userPage->NavigationName = strtolower($userPage->NavigationName);
        $userPage->LocalUserId = $localUser->Id;

        $userPage->Save();

        return $this->Redirect('/Settings');
    }

    public function Edit($id)
    {
        $this->Title = 'Edit Page';

        $userPage = $this->Models->UserPage->Find($id);
        if($userPage == null){
            return $this->HttpNotFound();
        }

        $localUser = $this->GetLocalUser();
        $this->Set('LocalUser', $localUser);
        $this->Set('DataFeeds', FEEDS);

        $laneFeeds = array(null, null, null, null);
        foreach($userPage->UserFeeds as $userFeed){
            $laneFeeds[$userFeed->LaneId] = FEEDS[$userFeed->FeedType];
        }

        $this->Set('LaneFeeds', $laneFeeds);

        if($this->IsPost()){
            $userPage = $this->Data->DbParse('UserPage', $this->Models->UserPage);
            $userPage->Save();
            $this->Set('UserPage', $userPage);
            return $this->View();
        }else{

            $this->Set('UserPage', $userPage);
            return $this->View();
        }
    }

    protected function Error($message)
    {
        return $this->Json(array(
            'success' => 0,
            'message' => $message
        ));
    }

    public function AddToLane()
    {
        if(!$this->IsLoggedIn()){
            return $this->Error('Must be logged in.');
        }

        $laneId = str_replace('lane-', '', $this->Post['laneId']);
        $feedTypeId = $this->Post['feedId'];
        $pageId = $this->Post['pageId'];
        $width = $this->Post['width'];

        $userPage = $this->Models->UserPage->Find($pageId);
        if($userPage == null){
            return $this->Error('Userfeed not found');
        }

        if($this->Models->UserFeed->Any(array('UserPageId' => $pageId, 'LaneId' => $laneId, 'IsDeleted' => 0))){
            return $this->Error('Lane already taken');
        }

        if($this->Models->UserFeed->Any(array('UserPageId' => $pageId, 'FeedType' => $feedTypeId, 'IsDeleted' => 0))){
            return $this->Error('Userpage already contains this feed');
        }

        $newUserFeed = $this->Models->UserFeed->Create(array('UserPageId' => $pageId, 'LaneId' => $laneId, 'Width' => $width, 'FeedType' => $feedTypeId));
        $newUserFeed->Save();

        $feedType = FEEDS[$feedTypeId];

        $result = array(
            'laneId' => $laneId,
            'icon' => $feedType['Icon'],
            'title' => $feedType['Title'],
            'description' => $feedType['Description']
        );

        return  $this->Json(array(
            'success' => 1,
            'data' => $result
        ));
    }

    public function RemoveFromLane()
    {
        return  $this->Json(array('success' => 1));
    }
}