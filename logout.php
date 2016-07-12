<?php
session_start(); // Abre a sessão
session_unset(); // Esvazia os valores da sessão
session_destroy(); // Destroi os valores da sessão
$pg = $_REQUEST['pg']; // O $pg receberá uma variável da página com um determinado valor               

switch ($pg) {
    case 'sp':
        echo '<script>';
        echo 'location.href="sempermissao.php"';
        echo '</script>';
        
        break;
    case 'fl';
       echo '<script>';
        echo 'location.href="frmlogin.php"';
        echo '</script>';
    default:
        break;
}
