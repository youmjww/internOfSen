<?php

class Sample_Form_AdduserDo extends Sample_ActionForm
{
    public $form = array(
        'username'  =>  [
            'name'  =>  'ユーザーネーム',
            'required'  =>  true,
            'type'      =>  VAR_TYPE_STRING
         ],
        'password' => [
            'name'  =>  'パスワード',
            'required'  =>  true,
            'type'  =>  VAR_TYPE_STRING,
        ],

        'mailaddres' => [
            'name'  =>  'メールアドレス',
            'required'  =>  true,
            'type'  =>  VAR_TYPE_STRING,
        ],

   );
}





class Sample_Action_AdduserDo extends Sample_ActionClass
{
    public function prepare()
    {

         var_dump( $this->af->get('username') );
        var_dump( $this->af->get('mailaddres') );
         exit( $this->af->get('password') );

        if ($this->af->validate() > 0) {
            require_once('adodb5/adodb.inc.php');
            $db = $this->backend->getDB();
            $rs = $db->query('SELECT * FROM test');
            
            return 'endregist';
        }
        return null;
    }

    public function perform()
    {
        return 'addUser';
    }
}
