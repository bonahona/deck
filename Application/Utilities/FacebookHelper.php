<?php
require_once('./vendor/autoload.php');

const FACEBOOK_APP_ID = '1753132431671912';
const FACEBOOK_APP_SECRET = 'c028a82dfaf1f9c1a65dbf011e792286';
const FACEBOOK_DEFAULT_VERSION = 'v2.8';

class FacebookHelper
{
    public function GetFacebook()
    {
        $result = new Facebook\Facebook([
            'app_id' => FACEBOOK_APP_ID,
            'app_secret' => FACEBOOK_APP_SECRET,
            'default_graph_version' => FACEBOOK_DEFAULT_VERSION,
        ]);

        return $result;
    }

    public function GetFacebookApp()
    {
        $result = new \Facebook\FacebookApp(FACEBOOK_APP_ID, FACEBOOK_APP_SECRET);
        return $result;
    }

    public function GetUserProfile($fb, $accessToken)
    {
        $response = $fb->get('/me?fields=id,name', $accessToken);
        $user = $response->getGraphUser();
        return $user;
    }

    public function GetEventsNotReplied($fb, $userId, $accessToken)
    {
        $response = $fb->get(sprintf('/%s/events/not_replied?fields=name,description,cover,rsvp_status,start_time,owner,place,picture{url}', $userId), $accessToken);
        return $response->getBody();
    }

    public function GetEvents($fb, $userId, $accessToken)
    {
        $response = $fb->get(sprintf('/%s/events?fields=name,description,cover,rsvp_status,start_time,owner,place,picture{url}',$userId), $accessToken);
        return $response->getBody();
    }

    public function SetEventAttend($fb, $eventId, $accessToken)
    {
        $response = $fb->post(sprintf('/%s/attending', $eventId), array(), $accessToken);
        return $response->getBody();
    }

    public function SetEventMaybe($fb, $eventId, $accessToken)
    {
        $response = $fb->post(sprintf('/%s/maybe', $eventId), array(), $accessToken);
        return $response->getBody();
    }

    public function SetEventDeclined($fb, $eventId, $accessToken)
    {
        $response = $fb->post(sprintf('/%s/declined', $eventId), array(), $accessToken);
        return $response->getBody();
    }

    public function ParseFacebookDateTime($facebookDateTime)
    {
        $properDateTime = explode('+', $facebookDateTime)[0];
        return strtotime($properDateTime);
    }

    public function FormatDescription($description)
    {
        return str_replace("\n", '<br/>', $description);
    }
}