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

        'group' => array(
            'type' => VAR_TYPE_STRING,
        ),

        'newGroupName' => array(
            'type' => VAR_TYPE_STRING,
            'required' => true,
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

    private function setGroupName ($newGroupName, $filepath)
    {
        $escapGroupName = pg_escape_string($newGroupName);
        require_once('adodb5/adodb.inc.php');
        $db = $this->backend->getDB();
        $db->query("update photos set groupName = '$escapGroupName' where filepath = '$filepath';");

    }

    private function groupFilter($group, $allPhoto)
    {
        // phpのデフォルトが参照渡しか値渡しかわからないけど、怖いから配列をコピーしておく
        $copyAllPhoto = $allPhoto;

        if ($group === NULL || $group === 'all')
        {
            return $copyAllPhoto;
        }

        $result = [];
        foreach ($copyAllPhoto as $photo)
        {
            if($photo['groupname'] === $group)
            {
                $result[] = $photo;
            }
        }
        return $result;
    }

    public function prepare()
    {
        return null;
    }

    public function perform()
    {
        $selectGroup = $this->af->get('group');

        if ( $this->af->get('memo') != NULL)
        {
            $this->setMemo ($this->af->get('memo'), $this->af->get('name'));
        }

        if ($this->af->get('newGroupName') != NULL)
        {
           $this->setGroupName ($this->af->get('newGroupName'), $this->af->get('name'));
            $selectGroup = $this->af->get('newGroupName');
        }

        $userId = $this->session->get('userName')['userId'];

        require_once('adodb5/adodb.inc.php');
        $db = $this->backend->getDB();

        // 写真を表示する用
        $allPhoto = $db->query("select filepath, memo, groupName from photos where userid = '$userId'  order by timestamp;")->getRows(['']);
        $allPhoto = $this->groupFilter($selectGroup, $allPhoto);
        $this->af->setApp( 'allPhoto', $allPhoto );

        // プルダウン用
        $group = $db->query("select groupName from photos where userid = '$userId'")->getRows(['groupname']);
        $preGroup = ['all'];


        foreach($group as $value){
            array_push ( $preGroup, $value['groupname'] );
        }


        $this->af->setApp('nowSelect', $selectGroup);
        $this->af->setApp('groupList', array_unique($preGroup));
        return 'viewAllPhoto';
    }

    function authenticate()
    {
        if ( !$this->session->isStart() ) {
            return 'login';
        }
    }
}
