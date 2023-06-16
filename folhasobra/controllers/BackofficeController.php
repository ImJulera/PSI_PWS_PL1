<?php
require_once './controllers/BaseAuthController.php';

class BackofficeController extends BaseAuthController
{
    public function index(){
        $this->renderView('backoffice', 'index');
    }
}