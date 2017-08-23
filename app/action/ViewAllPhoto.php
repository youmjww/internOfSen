<?php

class Sample_Form_ViewAllPhoto extends Sample_ActionForm
{

    var $form = array(
        'memo' => array(
            'type' => VAR_TYPE_STRING,
            'max' => 80,
        ),
 
        'name' => array(
            'type' => VAR_TYPE_STRING,
        ),
    );
}


class Sample_Action_ViewAllPhoto extends Sample_ActionClass
{
    private function setMemo ( $memo, $filepath )
    {
        $escapeMemo = pg_escape_string($memo);
        require_once('adodb5/adodb.inc.php');
        $db = $this->backend->getDB();
        $db->query("update photos set memo = '$escapeMemo' where filepath = '$filepath';");

    }
    public function prepare()
    {
        return null;
    }

    public function perform()
    {
        if ( $this->af->get('memo') != NULL)
        {
            $this->setMemo ($this->af->get('memo'), $this->af->get('name'));
        }

        $userId = $this->session->get('userName')['userId'];

        require_once('adodb5/adodb.inc.php');
        $db = $this->backend->getDB();
        $allPhoto = $db->query("select filepath, memo from photos where userid = '$userId'  order by timestamp;")->getRows(['']);
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
