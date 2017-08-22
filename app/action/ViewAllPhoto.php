<?php

class Sample_Form_ViewAllPhoto extends Sample_ActionForm
{
    public $form = array(
    );
}


class Sample_Action_ViewAllPhoto extends Sample_ActionClass
{
    public function prepare()
    {

        return null;
    }

    public function perform()
    {
        $userId = $this->session->get('userName')['userId'];

        require_once('adodb5/adodb.inc.php');
        $db = $this->backend->getDB();
        $allPhoto = $db->query("select filepath from photos where userid = '$userId';")->getRows(['filepath']);

        $this->af->setApp( 'allPhoto', $allPhoto );

        return 'viewAllPhoto';
    }

    function authenticate()
    {
        if ( !$this->session->isStart() ) {
            return 'login';
        }
    }
}
