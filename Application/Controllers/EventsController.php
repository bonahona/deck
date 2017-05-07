<?php
require_once('AjaxController.php');
class EventsController extends AjaxController
{
    public function Index()
    {
        $this->Title = 'Events';

        return $this->View();
    }

    public function PendingEvents()
    {
        $facebookHelper = new FacebookHelper();
        $userId = $this->GetCurrentUser()['id'];
        $accessToken = $_SESSION['fb_access_token'];

        return $this->Json(array(
            'success' => 1,
            'data' => array(
                'events' => $this->GetPendingEvents($facebookHelper, $userId, $accessToken, false),
            )));
    }

    public function ComingEvents()
    {
        $facebookHelper = new FacebookHelper();
        $userId = $this->GetCurrentUser()['id'];
        $accessToken = $_SESSION['fb_access_token'];

        return $this->Json(array(
            'success' => 1,
            'data' => array(
                'events' => $this->GetComingEvents($facebookHelper, $userId, $accessToken, false)
            )));
    }

    public function DismissEvent()
    {
        if(!isset($_POST['eventId'])){
            return $this->Json(array(
                'success' => 0
            ));
        }

        $eventId = $_POST['eventId'];
        $userId = $this->GetCurrentUser()['id'];

        $eventStatus  = $this->Models->EventStatus->Where(array('UserId' => $userId, 'EventId' => $eventId))->First();
        if($eventStatus != null){
            $eventStatus->IsDismissed = 1;
            $eventStatus->IsSeen = 1;
            $eventStatus->Save();
        }else {
            $eventStatus = $this->Models->EventStatus->Create(array('UserId' => $userId, 'EventId' => $eventId));
            $eventStatus->IsDismissed = 1;
            $eventStatus->IsSeen = 1;
            $eventStatus->Save();
        }

        return $this->Json(array(
            'success' => 1
        ));
    }

    public function SeenEvent()
    {
        if(!isset($_POST['eventId'])){
            return $this->Json(array(
                'success' => 0
            ));
        }

        $eventId = $_POST['eventId'];
        $userId = $this->GetCurrentUser()['id'];

        $eventStatus  = $this->Models->EventStatus->Where(array('UserId' => $userId, 'EventId' => $eventId))->First();
        if($eventStatus != null){
            $eventStatus->IsSeen = 1;
            $eventStatus->Save();
        }else {
            $eventStatus = $this->Models->EventStatus->Create(array('UserId' => $userId, 'EventId' => $eventId));
            $eventStatus->IsDismissed = 0;
            $eventStatus->IsSeen = 1;
            $eventStatus->Save();
        }

        return $this->Json(array(
            'success' => 1
        ));
    }

    public function Attend()
    {
        $facebookHelper = new FacebookHelper();
        $accessToken = $_SESSION['fb_access_token'];

        if(!isset($_POST['eventId'])){
            return $this->Json(array('success' => 0));
        }

        $eventId = $_POST['eventId'];
        $response = json_decode($facebookHelper->SetEventAttend($facebookHelper->GetFacebook(), $eventId, $accessToken), true);

        if($response['success'] == 0){
            return $this->Json(array('succes' => 0));
        }else {
            return $this->Json(array('success' => 1));
        }
    }

    public function Maybe()
    {
        $facebookHelper = new FacebookHelper();
        $accessToken = $_SESSION['fb_access_token'];

        if(!isset($_POST['eventId'])){
            return $this->Json(array('success' => 0));
        }

        $eventId = $_POST['eventId'];
        $response = json_decode($facebookHelper->SetEventMaybe($facebookHelper->GetFacebook(), $eventId, $accessToken), true);

        if($response['success'] == 0){
            return $this->Json(array('succes' => 0));
        }else {
            return $this->Json(array('success' => 1));
        }
    }

    public function Decline()
    {
        $facebookHelper = new FacebookHelper();
        $accessToken = $_SESSION['fb_access_token'];

        if(!isset($_POST['eventId'])){
            return $this->Json(array('success' => 0));
        }

        $eventId = $_POST['eventId'];
        $response = $facebookHelper->SetEventDeclined($facebookHelper->GetFacebook(), $eventId, $accessToken);

        return $this->Json(array('success' => 1, 'data' => $response));
    }

    protected function GetPendingEvents($facebookHelper, $userId, $accessToken, $notSeenOnly)
    {
        $pendingEventResponse = json_decode($facebookHelper->GetEventsNotReplied($facebookHelper->GetFacebook(), $userId, $accessToken), true);

        $result = array();

        $now = time();
        foreach($pendingEventResponse['data'] as $event){

            $eventStatus = $this->Models->EventStatus->Where(array('UserId' => $userId, 'EventId' => $event['id']))->First();
            if($eventStatus != null && $eventStatus->IsDismissed == 1){
                continue;
            }

            if($eventStatus != null && $eventStatus->IsSeen == 1 && $notSeenOnly){
                continue;
            }

            $eventStartTime = strtotime($event['start_time']);

            if($eventStartTime > $now) {
                $result[] = $this->FormatEvent($event, $facebookHelper, $userId);
            }
        }

        // Sort them from closes in time to the one longest away
        usort($result, array($this, 'DateTimeCompareAsc'));

        return $result;
    }

    protected function GetComingEvents($facebookHelper, $userId, $accessToken, $notSeenOnly)
    {
        $pendingEventResponse = json_decode($facebookHelper->GetEvents($facebookHelper->GetFacebook(), $userId, $accessToken), true);

        $result = array();

        $now = time();
        foreach($pendingEventResponse['data'] as $event){

            $eventStatus = $this->Models->EventStatus->Where(array('UserId' => $userId, 'EventId' => $event['id']))->First();
            if($eventStatus != null && $eventStatus->IsDismissed == 1){
                continue;
            }

            if($eventStatus != null && $eventStatus->IsSeen == 1 && $notSeenOnly){
                continue;
            }

            $eventStartTime = strtotime($event['start_time']);

            if($eventStartTime > $now) {
                $result[] = $this->FormatEvent($event, $facebookHelper, $userId);
            }
        }

        // Sort them from closes in time to the one longest away
        usort($result, array($this, 'DateTimeCompareAsc'));

        return $result;
    }

    protected  function FormatEvent($event, $facebookHelper, $userId)
    {
        $event['event_link'] = sprintf('https://www.facebook.com/events/%s/', $event['id']);
        $event['display_start_time'] = date('l d/m H:i', $facebookHelper->ParseFacebookDateTime($event['start_time']));
        $event['timestamp'] = $facebookHelper->ParseFacebookDateTime($event['start_time']);

        if(isset($event['description'])) {
            $event['description'] = $facebookHelper->FormatDescription($event['description']);
        }else{
            $event['description'] = '';
        }

        if($this->GetIsSeen($userId, $event['id'])){
            $event['panel_type'] = 'panel-default';
        }else{
            $event['panel_type'] = 'panel-primary not-seen';
        }

        if($event['rsvp_status'] == 'attending'){
            $event['glyphicon_type'] = 'glyphicon-ok-sign';
        }else if($event['rsvp_status'] == 'unsure'){
            $event['glyphicon_type'] = 'glyphicon-question-sign';
        }else{
            $event['glyphicon_type'] = 'glyphicon-alert';
        }

        return $event;
    }

    protected function GetIsSeen($userId, $eventId)
    {
        return $this->Models->EventStatus->Any(array('UserId' => $userId, 'EventId' => $eventId, 'IsSeen' => 1));
    }

    protected function DateTimeCompareAsc($a, $b)
    {
        $aStartTime = strtotime($a['start_time']);
        $bStarttime = strtotime($b['start_time']);

        if($aStartTime == $bStarttime){
            return 0;
        } else if($aStartTime < $bStarttime){
            return -1;
        }else if($aStartTime > $bStarttime){
            return 1;
        }

        // This probably will never happen
        return 0;
    }

}