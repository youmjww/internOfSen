<?php
/**
 *  Index.php
 *
 *  @author     {$author}
 *  @package    Sample
 */

/**
 *  Index view implementation.
 *
 *  @author     {$author}
 *  @access     public
 *  @package    Sample
 */
class Sample_View_Index extends Sample_ViewClass
{
    /**
     *  preprocess before forwarding.
     *
     *  @access public
     */
    public function preforward()
    {
        // フォーム値の取得
        $id = $this->af->get('id');

        // フォーム値の設定
        // テンプレートに値を渡す
        $this->af->set('id', $id+1);


    }
}

