<?php

class Sample_Form_AddphotoDo extends Sample_ActionForm
{
    public $form = array(
        'photo'  =>  [
            'type'  => VAR_TYPE_FILE,
            'name'  => '写真',
            'required'  => true,
        ],

        'newGroupName'  =>  [
            'type'  => VAR_TYPE_STRING,
            'name'  => 'グループ',
        ],

        'pullList'  =>  [
            'type'  => VAR_TYPE_STRING,
            'name'  => 'グループ',
        ],


    );
}

class Sample_Action_AddphotoDo extends Sample_ActionClass
{
    private function makeRandStr($length) {
        $str = array_merge(range('a', 'z'), range('0', '9'), range('A', 'Z'));
        $r_str = null;
        for ($i = 0; $i < $length; $i++) {
            $r_str .= $str[rand(0, count($str) - 1)];
        }
        return $r_str;
    }

    private function checkPhotoType ( $path )
    {
        if ( exif_imagetype($path) !== false )
        {
            return true;
        }

        return false;
    }

    private function setPhoto ( $photoFile, $userId, $group )
    {
        $newFileName = $this->makeRandStr(10);

        if (is_uploaded_file($photoFile["tmp_name"])) 
        {
            if (move_uploaded_file ($photoFile["tmp_name"], "./userPhoto/" .$newFileName))
            {
                chmod("./userPhoto/" . $newFileName, 0644);
                $this->af->setApp('message', $photoFile["name"] . "をアップロードしました。");


                // ファイルのアップロードに成功したら、DBにパスの保存をする
                $nowUnixTime = time();
                $nowTime = date( "Y/m/d H:i:s", $nowUnixTime );
                require_once('adodb5/adodb.inc.php');
                $db = $this->backend->getDB();
                $db->query("INSERT INTO photos(id,filePath,userid,timestamp, goulp) values (nextval('photoId'),'./userPhoto/$newFileName','$userId', '$nowTime', '$group' );");
            }
            else
            {
                $this->af->setApp('message', '・画像をアップロード出来ません'  );
            }
        }
        else 
        {
            $this->af->setApp('message', '・写真が選択されていません'  );
        }
    }


    private function getGroup($userId)
    {
        require_once('adodb5/adodb.inc.php');
        $db = $this->backend->getDB();
        $preGroup =  $db->query("select goulp from photos where userid = '$userId';")->getRows();

        $result = [];
        foreach ($preGroup as $group)
        {
            $result[] = $group['goulp'];
        }

        return array_unique($result);

    }

    public function prepare()
    {
        $userId = $this->session->get('userName')['userId'];
        $result = $this->getGroup($userId);
        $this->af->setApp('group',$result);


        if ( $this->af->validate() > 0 )
        {
            return 'addPhoto';
        }

        if ($this->checkPhotoType($this->af->get('photo')['tmp_name']) === false)
        {
            $this->af->setApp('message', '・選択されたファイルは写真ではありません');
            return 'addPhoto';
        }
        return null;
    }

    public function perform()
    {
        $userId = $this->session->get('userName')['userId'];
        $data = $this->af->get('photo');
        $selectGroup;

        if (!$this->af->get('pullList'))
        {
            $selectGroup = $this->af->get('newGroupName');
        } else {
            $selectGroup = $this->af->get('pullList');
        }

        $this->setPhoto($data, $userId, $selectGroup);
        return 'addPhoto';

    }

    function authenticate()
    {
        if ( !$this->session->isStart() ) {
            return 'login';
        }
    }
}
