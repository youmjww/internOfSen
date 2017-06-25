<?php
class Sample_Form_LoginDo extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
       'mailaddress' => [
           'name'   => 'メールアドレス',
           'required'   => true,
           'type'   => VAR_TYPE_STRING,
       ],
       'password' => [
           'name'   => 'パスワード',
           'required'   => true,
           'type'   =>  VAR_TYPE_STRING,
       ],
    );

}

class Sample_Action_LoginDo extends Sample_ActionClass
{
    public function prepare()
    {
        //pwが入っていなかったらログイン画面に戻る
        if($this->af->validate()) {
            return 'login';
        }

        // nullを返した場合のみperformが呼び出される
        return null;
    }

    //このmethodはprepareがnullを返した場合のみ呼び出される
    public function perform()
    {
        //　(処理を止めてフォームに表示するってかなり強引だな・・・)
        die($this->af->get('mailaddress'));
        return 'index';
    }
}
