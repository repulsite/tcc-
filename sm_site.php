<?php
require_once 'inc/smarty/libs/Smarty.class.php';
$sm = new Smarty;
$sm->template_dir = "site/view/";
$sm->compile_dir = "inc/smarty/templates_c";
