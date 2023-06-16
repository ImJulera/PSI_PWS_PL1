<?php
require_once './controllers/BaseController.php';

class BaseAuthController extends BaseController
{
    public function __construct(){
        $auth = new Auth();

        if(!$auth->isLoggedIn()){
            header('Location: ./?' . INVALID_ACCESS_ROUTE);
        }
    }
}