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
           'max' => '20',
           'required'   => true,
           'filter' => 'numeric_zentohan,alphabet_zentohan,ltrim,rtrim,ntrim',  //全角を半角に変換して、左右の空白を削除してる
           'custom' => 'checkMailaddress',
           'type'   => VAR_TYPE_STRING,
       ],
    );

    /**
    * フォーム値変換フィルタ: サンプル
    *
    * @access protected
    * @param mixed $value フォーム値
    * @return mixed 変換結果
    */
    function _filter_sample($value)
    {
        return strtoupper($value);
    }

    /**
    * チェックメソッド: サンプル
    *
    * @access public
    * @param string $name フォーム項目名
    */
    function checkSample($name)
    {
        if (strtotime($this->form_vars[$name]) > time()) {
            $this->ae->add($name, "{form}には未来の時間を入力してください", E_FORM_INVALIDVALUE);
        }
    }
}

class Sample_Action_Validate extends Sample_ActionClass
{
    public function prepare()
    {
        if ($this->af->validate() > 0) {

            var_dump($this->af->validate('sample'));
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
