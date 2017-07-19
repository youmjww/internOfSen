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
           'name'   => 'mailaddress',
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
        $mailaddress = $this->af->get('mailaddress');
        $password = $this->af->get('password');

        require_once('adodb5/adodb.inc.php');

        $db = $this->backend->getDB();
        $result = $db -> query("select id from users where mailaddres='$mailaddress' and password='$password'");
        $inCorrect = $result->getRows()[0][id];

        // ログインできたらSessionスタート
        if($this->af->validate() === 0)
        {   // validateを確認した後にDBを見に行くのを保証するためにネストしました
            if ( $inCorrect ) {
                $this->session->start();
                return 'index';
             }
        }

        return null;
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
