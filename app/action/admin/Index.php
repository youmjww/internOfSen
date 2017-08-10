<?php

class Sample_Form_AdminIndex extends Sample_ActionForm
{
    public $form = array(
    );
}

class Sample_Action_AdminIndex extends Sample_ActionClass
{
    public function prepare()
    {
        return null;
    }

    public function perform()
    {
       return 'index';
    }

    function authenticate()
    {
        if ( !$this->session->isStart() ) {
            return 'login';
       }
    }
}
