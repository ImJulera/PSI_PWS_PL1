<?php

class LinhaObra extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('quantidade'),
        array('valor_unitario'),
        array('valor_iva'),
        array('servico_id'),
        array('folha_id'),
    );

    static $belongs_to = array(
        array('servico'),
        array('folha'),
    );
}