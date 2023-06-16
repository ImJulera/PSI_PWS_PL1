<?php

class Empresa extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('designacao_social'),
        array('email'),
        array('telefone'),
        array('nif'),
        array('morada'),
        array('codigo_postal'),
        array('localidade'),
        array('capital_social')
    );
}