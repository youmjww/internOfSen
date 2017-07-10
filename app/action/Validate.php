<?php
/**
 *  Validate.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  validate Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_Validate extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
       'mailaddress' => [
           'name'   => 'メールアドレス',
           'min' => '4',
           'max' => '8',
           'required'   => true,
           'type'   => VAR_TYPE_STRING,
       ],
    );
}

class Sample_Action_Validate extends Sample_ActionClass
{
    public function prepare()
    {
        if ($this->af->validate() > 0) {
            $error = 'メアドがなんかおかしいです';
            $this->af->set('error', $error);
            return null;
        }
        return 'validate';
    }

    public function perform()
    {
        return 'validate';
    }
}
