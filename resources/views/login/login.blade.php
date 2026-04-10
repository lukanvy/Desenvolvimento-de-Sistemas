<?php
include("app/Models/User.php");

if(isset($_POST['email'])&& strlen($_POST['email'])>0){

    if(isset($_SESSION))
        session_start();

    $_SESSION['email'] = $mysqli->escape_string($_POST['email']);
    $_SESSION['senha'] = md5(md5($_POST['senha']));

    $sql_code = "SELECT senha,id FROM users WHERE email = '$_SESSION[email]'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
    $dado = $sql_query->fetch_assoc();
    $total = $sql_query->num_rows;

    if($total == 0){
        $erro[] = "Usuário não cadastrado";
    }else{
        if($dado['senha'] == $_SESSION['senha']){
            $_SESSION['users'] = $dado['id'];
            $sucesso[] = "Login realizado com sucesso!";
        }else{
            $erro[] = "Senha incorreta!";
        }
    }
    

}
?>

<html>
<head>
  <meta charset="UTF-8">
  <title>Sistema de Gestão de Estagiários</title>
</head>
<body>
    <?php
    if(count($erro) > 0){
        foreach($erro as $msg){
            echo "<p style='color: red;'>$msg</p>";
        }
    }
    <form method="POST" action="/login">
          <p>
      <img src="imagens/logo-up.png" alt="Logo UP" width="150">
    </p>
        <p>input value:"<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" name:"email" placeholder:"E-mail" type:"text"</p>
        <p>input name:"senha" placeholder:"Password" type:"password"</p>
        <p> <a href="">Esqueci minha senha</a></p>
       <p><button type="submit">Entrar</button></p>
    </form>
</body>
</html>