<?php

require_once './controllers/BaseController.php';
require_once './controllers/SiteController.php';
require_once './controllers/AuthController.php';
require_once './controllers/BackofficeController.php';
require_once './controllers/EmpresaController.php';
require_once './controllers/IvaController.php';
require_once './controllers/ServicoController.php';
require_once './controllers/UserController.php';
require_once './controllers/FolhaController.php';
require_once './controllers/LinhaObraController.php';


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
        'index' => ['GET', 'EmpresaController', 'index'],
        'edit' => ['GET', 'EmpresaController', 'edit'],
        'update' => ['POST', 'EmpresaController', 'update']
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
    'user' => [
        'index' => ['GET', 'UserController', 'index'],
        'create' => ['GET', 'UserController', 'create'],
        'store' => ['POST', 'UserController', 'store'],
        'edit' => ['GET', 'UserController', 'edit'],
        'update' => ['POST', 'UserController', 'update'],
        'delete' => ['GET', 'UserController', 'delete']
    ],
    'folha' => [
        'index' => ['GET', 'FolhaController', 'index'],
        'create' => ['GET', 'FolhaController', 'create'],
        'store' => ['GET', 'FolhaController', 'store'],
        'update' => ['GET', 'FolhaController', 'update'],
        'show' => ['GET', 'FolhaController', 'show'],
        'selectClient' => ['GET', 'FolhaController', 'selectClient'],
        'print' => ['GET', 'FolhaController', 'print'],
        'pay' => ['GET', 'FolhaController', 'pay'],
    ],
    'linhaObra' => [
        'index' => ['GET', 'LinhaObraController', 'index'],
        'create' => ['GET', 'LinhaObraController', 'create'],
        'store' => ['POST', 'LinhaObraController', 'store'],
        'edit' => ['GET', 'LinhaObraController', 'edit'],
        'update' => ['POST', 'LinhaObraController', 'update'],
        'delete' => ['GET', 'LinhaObraController', 'delete'],
        'selectServico' => ['POST', 'LinhaObraController', 'selectServico'],
        'searchServico' => ['POST', 'LinhaObraController', 'selectServico'],
        'addServico' => ['POST', 'LinhaObraController', 'addServico'],
    ],
];
