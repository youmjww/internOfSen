<?php
require_once dirname(__FILE__) . '/../../app/Sample_Controller.php';

Sample_Controller::main('Sample_Controller', array(
 'index',
 'user_*',
));
