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

    /**
     *  Form input value convert filter : sample
     *
     *  @access protected
     *  @param  mixed   $value  Form Input Value
     *  @return mixed           Converted result.
     */
    /*
    protected function _filter_sample($value)
    {
        //  convert to upper case.
        return strtoupper($value);
    }
    */
}

/**
 *  login action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_Login extends Sample_ActionClass
{
    /**
     *  preprocess of login Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {
        /**
        if ($this->af->validate() > 0) {
            // forward to error view (this is sample)
            return 'error';
        }
        $sample = $this->af->get('sample');
        */
        return null;
    }

    /**
     *  login action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        return 'login';
    }
}
