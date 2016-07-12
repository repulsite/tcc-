<?php
session_start();
require_once 'core/Usuario.class.php';
require_once 'core/Paginas.class.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$usuario = new Usuario();
$usuario->setEmailUsuario($email);
$usuario->setSenhaUsuario($senha);

$arrayUser = $usuario->login();
if(count($arrayUser) > 0){
    //echo 'Sucesso';
    $usuario->setCodUsuario($arrayUser[0]['cod_usuario']);
    $usuario->setEmailUsuario($arrayUser[0]['email_usuario']);
    $usuario->setSenhaUsuario($arrayUser[0]['senha_usuario']);
    $usuario->setStatusUsuario($arrayUser[0]['status_usuario']);
    $usuario->setDataCriacaoUsuario($arrayUser[0]['data_criacao_usuario']);

    // Buscando as páginas permitidas
   $arrayNomePagina = $usuario->buscarPaginasPermitidas();
   
    $_SESSION['cod_usuario'] = $usuario->getCodUsuario();
    $_SESSION['email_usuario'] = $usuario->getEmailUsuario();
    $_SESSION['senha_usuario'] = $usuario->getSenhaUsuario();
    $_SESSION['status_usuario'] = $usuario->getStatusUsuario();
    $_SESSION['data_criacao_usuario'] = $usuario->getDataCriacaoUsuario();
    // Lógica para pegar os arquivos criados e não cadastrados e juntar com os arquivos permitidos para o usuário
    $paginas =  new Paginas();
    $arrayPaginasDir = $paginas->listarArquivosDiretorio();
    $arrayObjectPaginasParaCadastro = $paginas->listarArquivos_Banco_e_Diretorio_ou_Diretorio_para_Cadastro($arrayPaginasDir);
    $arrayUrlParaCadastro = array();
    $i = 0;
    while($i < count($arrayObjectPaginasParaCadastro)){
    $arrayUrlParaCadastro[] = $arrayObjectPaginasParaCadastro[$i]->getUrlPaginas();
    $i++;
    }
    $result = array_merge($arrayNomePagina,$arrayUrlParaCadastro);
   
//         foreach ($result as $value) {
//             echo $value. '<br/>';
// }
    
    $_SESSION['paginasPermitidasParaAcesso'] = $result;
    $paginaIndex = $usuario->buscarPaginasIndex($arrayNomePagina);
    echo '<script>';
       echo "location.href='$paginaIndex'";
    echo'</script>';
}else{
    echo 'Falha';
} 
