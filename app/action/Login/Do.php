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
        // ログインできたらSessionスタート
        $password = $this->config->get('password');
        if ( $password === $this->af->get('password')) {
            $this->session->start();
            return 'index';
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
