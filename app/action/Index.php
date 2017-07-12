<?php

class Sample_Form_Index extends Sample_ActionForm
{
    public $form = array(
    );
}

class Sample_Action_Index extends Sample_ActionClass
{
    public function prepare()
    {
        return null;
    }

    public function perform()
    {
        $this->af->set( 'user', '一般' );
        $ethna_mail =& new Ethna_MailSender($this->backend);
        $ethna_mail->send('youmjww@gmail.com',
            'welcome.tpl',
            array('username' => $regist_user));

        return 'index';
    }

    function authenticate()
    {
        if ( !$this->session->isStart() ) {
            return 'login';
    }
    }
}
