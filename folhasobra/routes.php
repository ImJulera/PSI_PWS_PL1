<?php

require_once './controllers/BaseController.php';
require_once './controllers/SiteController.php';
require_once './controllers/AuthController.php';
require_once './controllers/BackofficeController.php';
require_once './controllers/EmpresaController.php';
require_once './controllers/IvaController.php';
require_once './controllers/ServicoController.php';

return [
    'defaultRoute' => ['GET', 'SiteController', 'index'],
    'site' => [
        'index' => ['GET', 'SiteController', 'index'],
    ],
    'login' => [
        'index' => ['GET', 'AuthController', 'index'],
        'login' => ['POST', 'AuthController', 'login'],
        'logout' => ['GET', 'AuthController', 'logout']
    ],
    'backoffice' => [
        'index' => ['GET', 'BackofficeController', 'index'],
    ],
    'empresa' => [
        'index' => ['GET', 'EmpresaController', 'index']
    ],
    'iva' => [
        'index' => ['GET', 'IvaController', 'index'],
        'create' => ['GET', 'IvaController', 'create'],
        'store' => ['POST', 'IvaController', 'store'],
        'edit' => ['GET', 'IvaController', 'edit'],
        'update' => ['POST', 'IvaController', 'update'],
        'delete' => ['GET', 'IvaController', 'delete']
    ],
    'servico' => [
        'index' => ['GET', 'ServicoController', 'index'],
        'create' => ['GET', 'ServicoController', 'create'],
        'store' => ['POST', 'ServicoController', 'store'],
        'edit' => ['GET', 'ServicoController', 'edit'],
        'update' => ['POST', 'ServicoController', 'update'],
        'delete' => ['GET', 'ServicoController', 'delete']
    ],
];