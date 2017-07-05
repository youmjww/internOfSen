<?php
/**
 *  Index.php
 *
 *  @author    {$author}
 *  @package   Sample
 */

/**
 *  Index form implementation
 *
 *  @author    {$author}
 *  @access    public
 *  @package   Sample
 */

class Sample_Form_Index extends Sample_ActionForm
{
    /**
     * @access private
     * @var array フォーム値定義
     */
    var $form = array(
        'id' => array(
            'type' => VAR_TYPE_INT,
        ),

        'name' => array(
            'type' => VAR_TYPE_STRING,
        ),
    );
}

/**
 *  Index action implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_Action_Index extends Sample_ActionClass
{
    /**
     *  preprocess Index action.
     *
     *  @access    public
     *  @return    string  Forward name (null if no errors.)
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
     *  Index action implementation.
     *
     *  @access    public
     *  @return    string  Forward Name.
     */
    public function perform()
    {

        return 'index';
    }
}
