<?php

class Sample_Form_AddphotoDo extends Sample_ActionForm
{
    public $form = array(
        'photo'  =>  [
            'type'  => VAR_TYPE_FILE,
            'name'  => '写真',
            'required'  => true,
        ],
    );
}

class Sample_Action_AddphotoDo extends Sample_ActionClass
{
    function makeRandStr($length) {
        $str = array_merge(range('a', 'z'), range('0', '9'), range('A', 'Z'));
        $r_str = null;
        for ($i = 0; $i < $length; $i++) {
            $r_str .= $str[rand(0, count($str) - 1)];
        }
        return $r_str;
    }

    private function setPhoto ( $photoFile, $userId )
    {
        $newFileName = $this->makeRandStr(10);

        if (is_uploaded_file($photoFile["tmp_name"])) 
        {
            if (move_uploaded_file ($photoFile["tmp_name"], "./userPhoto/" .$newFileName))
            {
                chmod("./userPhoto/" . $newFileName, 0644);
                echo $photoFile["name"] . "をアップロードしました。";

                // ファイルのアップロードに成功したら、DBにパスの保存をする
                require_once('adodb5/adodb.inc.php');
                $db = $this->backend->getDB();
                // dbに値をセットする
                $db->query("INSERT INTO photos(id,filePath,userid) values (nextval('photoId'),'./userPhoto/$newFileName','$userId');");


            }
            else
            {
                echo "ファイルをアップロードできません。";
            }
        }
        else 
        {
            echo "ファイルが選択されていません。";
        }
    }

    public function prepare()
    {
        // ここでは、うまく行かなかったので、画像ファイルかどうかの判定は後日対応します。
        // 後でエラーを出す
        if ( $this->af->validate() > 0 )
        {
            return 'addPhoto';
        }

        return null;
    }

    public function perform()
    {
        $userId = $this->session->get('userName')['userId'];
        $data = $this->af->get('photo');

        $this->setPhoto($data, $userId);
        return 'addPhoto';

    }

    function authenticate()
    {
        if ( !$this->session->isStart() ) {
            return 'login';
        }
    }
}
