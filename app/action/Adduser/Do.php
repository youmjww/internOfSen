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

        'mailaddres' => [
            'mailaddres' => 'メールアドレス',
            'required' => true,
            'type' => VAR_TYPE_STRING,
        ],
    );
}

class Sample_Action_AdduserDo extends Sample_ActionClass
{

    private function setUser()
    {
        // フォームのデータを変数に持っておいてescapeする
        $username = $this->af->get('username');
        $password = $this->af->get('password');
        $mailaddres = $this->af->get('mailaddres');
        $escapeUsername = pg_escape_string($username);
        $escapePassword = pg_escape_string($password);
        $escapeMailaddres = pg_escape_string($mailaddres);

        require_once('adodb5/adodb.inc.php');

        $db = $this->backend->getDB();

        // dbに値をセットする
        $db->query("INSERT INTO users(id,name,password,mailaddres) values (nextval('userId'),'$escapeUsername','$escapePassword','$escapeMailaddres');");

    }

    public function prepare()
    {

        // 必須入力が入力されていなければ
        if ($this->af->validate() > 0) {
            return 'addUser';
        }

        $this->setUser();

        return null;
    }

    public function perform()
    {
        $username = $this->af->get('username');
        $this->af->set('setResult', "ユーザーの追加が完了しました。$username");
        return 'addUser';
    }

    function authenticate()
    {
        if ( !$this->session->isStart() ) {
           return 'login';
        }
    }
}
