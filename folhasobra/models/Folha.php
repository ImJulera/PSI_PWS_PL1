<?php

class Folha extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('client_id'),
        array('user_id')
    );

    static $belongs_to = array(
        array('user'),
        array('cliente', 'class_name'=>'User','foreign_key'=>'client_id')
    );


    static $has_many = array(
        array('linha_obras')
    );
}