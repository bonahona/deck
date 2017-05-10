<?php
require_once('BaseController.php');
class HomeController extends BaseController
{
    public function Index()
    {
        $this->Title = 'Deck';
        return $this->View();
    }

    public function NotFound()
    {
        $this->Title = 'Error 404';
        return $this->View();
    }
}