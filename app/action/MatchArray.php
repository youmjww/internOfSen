<?php
/**
 *  MatchArray.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  matchArray Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_MatchArray extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
       'User[name]' => array(
           'name' => '名前',
           'type' => VAR_TYPE_STRING,
           'form_type' => FORM_TYPE_TEXT,
       ),
       'User[phone][home]' => array(
           'name' => '自宅電話番号',
           'type' => VAR_TYPE_STRING,
           'form_type' => FORM_TYPE_TEXT,
       ),
       'User[phone][mobile]' => array(
           'name' => '携帯電話番号',
           'type' => VAR_TYPE_STRING,
           'form_type' => FORM_TYPE_TEXT,
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
 *  matchArray action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_MatchArray extends Sample_ActionClass
{
    /**
     *  preprocess of matchArray Action.
     *
     *  @access public
     *  @return string    forward name(null: success.
     *                                false: in case you want to exit.)
     */
    public function prepare()
    {
        return null;
    }

    /**
     *  matchArray action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        var_dump($this->action_form->get('User'));
        return 'matchArray';
    }
}
