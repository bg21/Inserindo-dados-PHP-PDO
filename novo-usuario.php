<?php
    include('config.php');
    if(isset($_POST['acao'])){
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $criptografada = password_hash($senha, PASSWORD_DEFAULT);

        if($usuario == '' || $senha == ''){
            echo 'Preencha o campo.';
        }else{
            $sql = $pdo->prepare("INSERT INTO tb_usuarios VALUES (null, ?, ?)");
            $sql->execute([$usuario, $criptografada]);
            echo 'Usuário cadastrado com sucesso';
        }
    }   
?>
<form method="post">
    <input type="text" name="usuario" placeholder="Usuário">
    <input type="password" name="senha" placeholder="Senha">
    <input type="submit" name="acao" value="Criar">
</form>