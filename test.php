<?php
     require_once 'core/Usuario.class.php';
     
     // Criando um objeto do tipo Usuario
     
     $usuario = new Usuario();
     // Carregando os atributos do objeto
     $usuario->setEmailUsuario('rogerio@gmail.com');
     $usuario->setSenhaUsuario('12345');
     $usuario->setStatusUsuario('1');
     $usuario->setDataCriacaoUsuario('31/03/2016 10:08:25');
     
     // Listando as informações do objeto
     
     echo $usuario->getEmailUsuario() . '<br/>';
     echo $usuario->getSenhaUsuario() . '<br/>';
     echo $usuario->getStatusUsuario() . '<br/>';
     echo $usuario->getDataCriacaoUsuario(TRUE);
     
     //$usuario->insert();
     
//     if($usuario->insert()){
//         echo '<script>alert("sucesso!")</script>';
//        }
//    
//     
//       echo 'teste';

     $arrayUsuarios = $usuario->select();
     
     $i = 0;
     
     while($i < count($arrayUsuarios)){
         echo $arrayUsuarios[$i]['email_usuario']. '</br>';
         echo $arrayUsuarios[$i]['cod_usuario']. '</br>';
          echo $arrayUsuarios[$i]['senha_usuario']. '</br>';
          $i++;
     }
     
     echo '<br/>';
     
     echo $usuario->urlAtual() . '<br/>';
     echo $usuario->paginaAtual();