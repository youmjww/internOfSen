<?php

class Sample_Form_LogoutDo extends Sample_ActionForm
{
    public $form = array(
    );

}

class Sample_Action_LogoutDo extends Sample_ActionClass
{
    public function prepare()
    {
        return null;
    }

    public function perform()
    {
        if( $this->session->destroy() )
        {
            return 'login';
        }
        return null;
    }
}
