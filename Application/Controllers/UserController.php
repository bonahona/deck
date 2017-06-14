<?php
require_once('BaseController.php');
class UserController extends BaseController
{
    public function BeforeAction()
    {
        if(!$this->IsLoggedIn() && !$this->Action == "Login"){
            $this->Redirect('/User/Login', array('ref' => $this->RequestUri));
        }
    }


    public function Login($ref = null)
    {
        $this->Title = 'Login';

        $facebookHelper = new FacebookHelper();
        $fb = $facebookHelper->GetFacebook();
        $loginHelper = $fb->getRedirectLoginHelper();
        $permissions = ['public_profile', 'user_events', 'rsvp_event'];
        $loginUrl = $loginHelper->getLoginUrl('http://deck.fyrvall.local/User/LoginCallback', $permissions);
        $this->Set('LoginUrl', $loginUrl);

        return $this->View();
    }

    public function LoginLocal($ref = null)
    {
        $this->Title = 'Local Login';

        if($this->IsPost()){

        }else{
            $localUser = $this->Models->LocalUser>Create();
            $this->Set('LocalUser', $localUser);
            return $this->View();
        }
    }

    public function LoginCallback()
    {
        $facebookHelper = new FacebookHelper();
        $fb = $facebookHelper->GetFacebook();
        $loginHelper = $fb->getRedirectLoginHelper();
        try {
            $accessToken = $loginHelper->getAccessToken();
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (!isset($accessToken)) {
            die('Something went wrong');
        }

        // Get a long lived access token
        $oAuth2Client = $fb->getOAuth2Client();
        if (! $accessToken->isLongLived()) {
            // Exchanges a short-lived access token for a long-lived one
            try {
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                echo "<p>Error getting long-lived access token: " . $loginHelper->getMessage() . "</p>\n\n";
                exit;
            }
        }

        $_SESSION['fb_access_token'] = $accessToken;

        $facebookUser = $facebookHelper->GetUserProfile($fb, $accessToken);

        $facebookUserId = $facebookUser->getId();
        $localUser = $this->Models->LocalUser->Where(array('FacebookUserId' => $facebookUserId))->First();
        if($localUser == null){
            $localUser = $this->Models->LocalUser->Create(array('FacebookUserId'  => $facebookUserId));
            $localUser->save();
        }

        //$_SESSION['fb_user'] = $facebookUser;
        $this->SetLoggedInUser($facebookUser);
        return $this->Redirect('/');
    }

    public function Logout()
    {
        unset($_SESSION['CurrentUser']);
        unset($_SESSION['fb_access_token']);

        return $this->Redirect('/');
    }
}