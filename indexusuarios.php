<?php

require_once 'sm.php';
require_once 'core/Usuario.class.php';
$usuario = new Usuario();
$usuario->validarAcesso();

$sm->assign("nome","Usuários");
$sm->display("indexusuarios.html"); 
