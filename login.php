<?php
include ('conexao.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: index.php');
    exit();
} 

$usuario = mysqli_real_escape_string($_POST['usuario']);
$senha = mysqli_real_escape_string($_POST['senha']);

$query = "select user_id, user_name from users where users = '{usuario}' and senha = md5('{senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

exit;

if($row == 1){
    $_SESSION['usuario'] = $usuario;
    header('Location: painel.php');
    exit();
}else{
    $_SESSION['nao autenticado'] = true;
    header('Location: index.php');
    exit();
}

?>