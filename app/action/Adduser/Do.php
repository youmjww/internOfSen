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

        if ($this->af->validate() > 0) {
            return 'endregist';
        }
        return null;
    }

    public function perform()
    {
        return 'addUser';
    }
}
