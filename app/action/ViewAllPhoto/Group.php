<?php

class Sample_Form_ViewAllPhotoGroup extends Sample_ActionForm
{

    var $form = array(
        'group' => array(
            'type' => VAR_TYPE_STRING,
        ),
    );
}


class Sample_Action_ViewAllPhotoGroup extends Sample_ActionClass
{
    public function prepare()
    {
        return null;
    }

    public function perform()
    {
        echo ($this->af->get('group'));
        return 'viewAllPhoto';
    }

    function authenticate()
    {
        if ( !$this->session->isStart() ) {
            return 'login';
        }
    }
}
