<?php
require_once ('BaseController.php');
class UserPagesController extends BaseController
{
    public function BeforeRender()
    {
        $feedJavascriptLink = '/javascript/feed/' . implode('/', $this->LoadedFeeds);

        $this->ClearJavascript();

        $this->EnqueueJavascript($this->Html->Js('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', false));
        $this->EnqueueJavascript($this->Html->Js('https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', false));
        $this->EnqueueJavascript($this->Html->Js('bootstrap.min.js'));
        $this->EnqueueJavascript($this->Html->Js('handlebars.min.js'));
        $this->EnqueueJavascript($this->Html->Js($feedJavascriptLink, false));
        $this->EnqueueJavascript($this->Html->Js('functions.js'));

        $loadedTemplatePaths = array();
        foreach($this->LoadedFeeds as $loadedFeed){
            $feedType = $this->Models->FeedType->Find($loadedFeed);
            $loadedTemplatePaths[] = $feedType->TemplatePath;
        }
        $loadedTemplatePaths = array_unique($loadedTemplatePaths);
        $this->Set('LoadedTemplatePaths', $loadedTemplatePaths);
    }

    public function Details($userPageName)
    {
        $userPage = $this->Models->UserPage->Where(array('NavigationName' => $userPageName, 'IsDeleted' => 0, 'IsActive' => 1))->First();

        if($userPage == null){
            return  $this->HttpNotFound();
        }

        $sortedUserFeeds = $userPage->UserFeeds->Where(array('IsDeleted' => 0))->OrderBy('LaneId');

        $userFeeds = array();
        for ($i = 0; $i < 4; $i++){
            $userFeeds[$i] = array(
                'width' => 3,
                'feed' => null
            );
        }

        foreach($sortedUserFeeds as $sortedUserFeed){
            $userFeeds[$sortedUserFeed->LaneId] = array(
                'width' => $sortedUserFeed->Width,
                'feed' => $sortedUserFeed
            );
        }
        $this->Title = $userPage->PageTitle . ' - Deck';
        $this->Set('UserPage', $userPage);
        $this->Set('UserFeeds', $userFeeds);

        foreach($sortedUserFeeds as $userFeed){
            $this->LoadFeed($userFeed->FeedTypeId);
        }

        return $this->View();
    }
}