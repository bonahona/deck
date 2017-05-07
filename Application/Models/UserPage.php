<?php
class UserPage extends Model
{
    public $TableName = 'userpage';

    public function GetLink()
    {
        return '/pages/' . $this->NavigationName . '/';
    }

    public function GetNotificationCount()
    {
        return 0;
    }
}