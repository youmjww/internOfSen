<?php
/**
 *  ReadFile.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  readFile Form implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Form_ReadFile extends Sample_ActionForm
{
    /**
     *  @access protected
     *  @var    array   form definition.
     */
    public $form = array(
        'sample_file' => array(
            'type' => VAR_TYPE_FILE,
        ),

        'sample_array' => array(
          'type' => array(VAR_TYPE_STRING),
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
 *  readFile action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_ReadFile extends Sample_ActionClass
{
    /**
     *  preprocess of readFile Action.
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
     *  readFile action implementation.
     *
     *  @access public
     *  @return string  forward name.
     */
    public function perform()
    {
        var_dump($this->af->get('sample_array'));
        var_dump($this->af->get('sample_file'));
        return 'readFile';
    }
}
