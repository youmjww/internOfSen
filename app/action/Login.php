<?php
/**
 *  Login.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  login Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_Login extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
        'password' => array(
            // Form definition
            'type'        => VAR_TYPE_STRING,    // Input type
            'form_type'   => FORM_TYPE_TEXT,  // Form type
            'name'        => 'password',        // Display name
        ),
    );

}

class Sample_Action_Login extends Sample_ActionClass
{
    public function prepare()
    {
        //print_r($rs->getRows());

        return null;
    }

   public function perform()
    {
        return 'login';
    }
}
