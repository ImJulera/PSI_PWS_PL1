<?php

class Servico extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('referencia'),
        array('descricao'),
        array('preco')
    );

    static $belongs_to = array(
        array('iva'),
    );
}