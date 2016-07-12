<?php
require_once 'sm_site.php';
require_once 'core/Usuario.class.php';
$usuario = new Usuario();
$usuario->validarAcesso();

$nome = "Página protegida do meu site";
$sm->assign("nome","$nome");
$sm->display("paginaprotegida_site.html");
