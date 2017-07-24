<?php

class Sample_Form_AdduserDo extends Sample_ActionForm
{
    public $form = array(
        'username'  =>  [
            'name'  =>  'ユーザーネーム',
            'required' => true,
            'type' => VAR_TYPE_STRING,
        ],

        'password' => [
            'name' => 'パスワード',
            'required' => true,
            'type' => VAR_TYPE_STRING,
        ],

        'mailaddress' => [
            'mailaddress' => 'メールアドレス',
            'required' => true,
            'type' => VAR_TYPE_STRING,
        ],
    );
}

class Sample_Action_AdduserDo extends Sample_ActionClass
{

    private function setUser($username, $mailaddres, $password)
    {
        require_once('adodb5/adodb.inc.php');

        $db = $this->backend->getDB();

        // dbに値をセットする
        $db->query("INSERT INTO users(id,name,password,mailaddres) values (nextval('userId'),'$username','$password','$mailaddres');");

    }

    private function checkRegistered($mailaddres)
    {
        require_once('adodb5/adodb.inc.php');
        $db = $this->backend->getDB();

        $result = $db->query("select name from users where mailaddres='$mailaddres';")->getRows()[0]['name'];

        if( $result )
        {
            return true;
        }
        return false;
    }

    public function prepare()
    {
        // フォームのデータを変数に持っておいてescapeする
        // 2つ以上のメソッドで呼び出したかったので、こっちに持ってきました
        $username = $this->af->get('username');
        $password = $this->af->get('password');
        $mailaddres = $this->af->get('mailaddress');
        $escapeUsername = pg_escape_string($username);
        $escapePassword = pg_escape_string($password);
        $escapeMailaddres = pg_escape_string($mailaddres);


        // 必須入力が入力されていなければ
        if ($this->af->validate() > 0) {
            return 'addUser';
        }

        // 登録済みのメアドじゃないことを確認して登録する
        $check = $this->checkRegistered($escapeMailaddres);
        if ( !$check )
        {
            $this->setUser($escapeUsername, $escapeMailaddres, $escapePassword);
            $this->af->set('setResult', "ユーザーの追加が完了しました。$username");
            return null;
        }

        // エラー時
        $this->af->set('setResult', "入力されたメールアドレスはすでに使われています$mailaddres");
        return null;
    }

    public function perform()
    {
        return 'addUser';
    }

    function authenticate()
    {
        if ( !$this->session->isStart() ) {
           return 'login';
        }
    }
}
