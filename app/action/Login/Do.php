<?php
/**
 *  Login/Do.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  login_do Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
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
           'type'   =>  VAR_TYPE_STRING,
       ],

       'password' => [
           'name'   => 'パスワード',
           'required'   => true,
           'type'   =>  VAR_TYPE_STRING,
       ],
    );
}

/**
 *  login_do action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_LoginDo extends Sample_ActionClass
{
    public function prepare()
    {
        if($this->af->validate() > 0)
        {
            return 'login';
        }

        //メールアドレスとパスワードを取得してescape
        $mailaddress = $this->af->get('mailaddress');
        $password = $this->af->get('password');
        $escapeMailaddress = pg_escape_string($mailaddress);
        $escapePassword = pg_escape_string($password);

        //　ユーザー認証
        require_once('adodb5/adodb.inc.php');
        $db = $this->backend->getDB();
        $getId = $db -> query("select id from users where mailaddres='$escapeMailaddress' and password='$escapePassword'")->getRows()[0]['id'];

        $um =  new Sample_UserManager;
        $result = $um->auth($getId);
        if (Ethna::isError($result)) {
            $this->ae->addObject(null, $result);
            return 'login';
        }


        //ユーザー名を取得
        $userName = $db->query("select name from users where mailaddres='$escapeMailaddress'")->getRows()[0]['name'];
        $userId =  $db->query("select id from users where mailaddres='$escapeMailaddress'")->getRows()[0]['id'];


        // ログインできたらSessionスタート
        $this->session->start();
        $this->session->set('userName',$userName);

        $this->session->start();
        $this->session->set('userId',$userId);

        return 'index';

    }

    /**
     *  login_do action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        return 'login';
    }
}
