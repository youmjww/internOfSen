<?php

class Sample_Form_Addphoto extends Sample_ActionForm
{
        public $form = array(
    );

}

class Sample_Action_AddPhoto extends Sample_ActionClass
{
    private function getGroup($userId)
    {
        require_once('adodb5/adodb.inc.php');
        $db = $this->backend->getDB();
        $preGroup =  $db->query("select groupName from photos where userid = '$userId';")->getRows();

        $result = [];
        foreach ($preGroup as $group)
        {
           $result[] = $group['groupname'];
        }

        return array_unique($result);

    }

    public function prepare()
    {
        $userId = $this->session->get('userName')['userId'];
        $result = $this->getGroup($userId);
        $this->af->setApp('group',$result);
        return null;
    }


    public function perform()
    {
        return 'addPhoto';
    }
}
